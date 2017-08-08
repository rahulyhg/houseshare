<?php

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;


class UserController extends BaseController {  
	
	public function __construct(){
		$this->beforeFilter(function(){
			if(Auth::guest())
				return Redirect::to('/');
		},['except' => ['register','login','fb_login']]);
	}
	
	
	
	
	/*--------------------- Register ---------------------*/
	
	public function register() { 
		
		$user  = array();
		if(Auth::check()){ 
			$array_msg['type'] = '1';
			$array_msg['msg']  = 'You are already login.'; 
			echo json_encode($array_msg); die; 
		}
		
		if(!empty($_POST)){ 
			
			$validator = User::validate_front(Input::all());
			
			$users_exist = DB::table('users')->where('email',Input::get('email'))->count(); 
			
			if($users_exist==0) { 
				
				if($validator->fails()) { 
					$array_msg['type'] = '2';
					$array_msg['msg']  = 'User could not be register. Please correct errors.'; 
					echo json_encode($array_msg); die; 
				} else {  
				
					$data  = Input::except('password');
					$data['password']  = Hash::make(Input::get('password'));
					$data['status']    = 1;
					$data['role_id']   = 2;
					  
					$user = User::create($data); 
					if($user){
					
						$token = bin2hex(openssl_random_pseudo_bytes(20));
						$user_link = Config::get('constants.SITE_URL') .'active-profile/'. $token;
						User::where('id', $user->id)->update(array('varify_hash' => $token));
					
						$signUpMail  	= DB::table('templates')->where('slug', 'user-registration')->first();
						
						if($signUpMail){
							$usr_name		= $user->first_name." ".$user->last_name;
							$email			= $user->email; 
							$site_name 		= Session::get('SiteValue.site_name');
							$admin_email	= Session::get('SiteValue.admin_email'); 
							$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{LINK}', '{SITE}'), array($usr_name, $email, Input::get('password'), $user_link, $site_name), $signUpMail->content);
							$subject		= $signUpMail->subject;
							
							Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
								$message->from($admin_email, $site_name);
								$message->to($email, $usr_name)->subject($subject);
							});  
						} 
						
						$array_msg['type'] = '1';
						$array_msg['msg']  = 'You are registered successfully. please Login.'; 
						echo json_encode($array_msg); die;   
					} else { 
						$array_msg['type'] = '2';
						$array_msg['msg']  = 'User could not be register. Please correct errors.'; 
						echo json_encode($array_msg); die;  
					}
				}
				
			} else { 
				$array_msg['type'] = '2';
				$array_msg['msg']  = 'Email is already exist.'; 
				echo json_encode($array_msg); die; 
			}
		}    
	}
	
	
	/*--------------------- Facebook Login(If not Register then Register and Login) ---------------------*/
	public function fb_login(){
		 
		$data = User::where('email', '=', Input::get('email'))->first();
		
		if($data){
			if($data->status==1){
				Auth::login($data);
				if(Auth::check()){
					return 'succ';
				}
			}else{
				return 'error';
				Session::put('message', 'Your email is blocked');
			}
		}else{
			
			$fb_id = Input::get('id');
			
			$images_url = "https://graph.facebook.com/$fb_id/picture?type=large";
			$content = file_get_contents($images_url);
			
			$rand_img_namr  = strtotime(date('Y-m-d H:i:s')).'_'.rand(111111111,999999999);
			$image_name  = $rand_img_namr.".jpg";
			$fp          = fopen("upload/users/profile-photo/thumb/".$image_name, "w");
			fwrite($fp, $content);
			
			$fp          = fopen("upload/users/profile-photo/large/".$image_name, "w");
			fwrite($fp, $content);
			
			fclose($fp);
			
			$parts = explode("@", Input::get('email'));
			$username = isset($parts[0])?$parts[0]:Input::get('email');
		  	
			$password 			= rand(100000, 999999); 
			$gender 			= (strtolower(Input::get('gender')) == 'male')?1:2; 
			$user 				= new User();
			$user->email 		= Input::get('email');
			$user->password 	= Hash::make($password);
			$user->first_name 	= Input::get('first_name').' '.Input::get('last_name'); 
			$user->photo		= $image_name;        
			$user->gender 		= $gender ;  
			$user->status 		= 1;  
			$user->role_id 		= 2;  
			$user->is_fb 		= 0;  
			
			if($user->save()){ 
				$data = User::where('id',$user->id)->first();
				Auth::login($data);
				return 'succ'; 
			}
		} 
	}
	
	
	
	public function login(){ 
	
		$result = array();
		if(Auth::check()){
			if(Auth::user()->role_id==1){
				$result = array('success'  => 1);
				return Redirect::to('/profile');
			}else{
				return Redirect::to('/profile');
				$result = array('success'  => 1);
			}
		}
		if(!empty($_POST)) {  
				
			$email = Input::get('email');
			$password = Input::get('password'); 
			if (Auth::attempt(array('email'=>$email, 'password'=>$password, 'status'=>1, 'role_id'=>2),true)) {
				$result['type'] = '1';
				$result['msg']  = 'Login Successfully.'; 
			}else { 
				$result['type'] = '2';
				$result['msg']  = 'Login Failed, Password or Email not found.';  
				}
		 
		} 
		return json_encode($result); die;
	} 
	
	
	
	/*--------------------- Front Logout ---------------------*/
	public function logout(){
		Auth::logout();
		Session::flush();
		if (Session::has('message')){
			$message =  Session::get('message');
			return Redirect::to('/')->with('message', $message);
		}else{
			return Redirect::to('/');
		}
	}
	

	
	
	/*--------------------- Front My Account ---------------------*/
	public function myaccount(){
 
		$data  = DB::table('users')->leftjoin('countries', 'countries.id', '=', 'users.country_id')
		->select('users.*','countries.name as country_name')
		->where('users.id', Auth::id())->first();
		return View::make('frontend/users/myaccount')->with(compact('data'));
	}
	
	
	
	/*--------------------- Front update personal info ---------------------*/
	public function update_profile(){
	
		$data = User::find(Auth::id());
		
		if(!empty($_POST)){
		
			$data_post = Input::all();
			if(isset($data_post['form_number']) && $data_post['form_number']==4) {
				$data_post['looking_house_share'] = isset($data_post['looking_house_share'])?$data_post['looking_house_share']:0;
				$data_post['an_house_share']      = isset($data_post['an_house_share'])?$data_post['an_house_share']:0;
			}
		 
			$validator = User::validate_front_edit('admin_edit', Input::all(), Auth::id());
			if ( $validator->fails() ) {
				Session::flash('errormessage', 'Profile could not be updated, Please correct errors');
				return Redirect::to('update-profile')->withErrors($validator)->withInput(Input::except('photo','form_number'));
			} else {
				$save_data  = $data->update($data_post); 
				if($save_data){
					return Redirect::to('update-profile')->with('type', 'success')->with('message', 'Profile has been updated successfully.');
				}else{
					return Redirect::to('update-profile')->with('errormessage', 'Oops!! Something went wrong, please try again.');
				}
				return Redirect::to('update-profile');
			}
		} 
		$data  = DB::table('users')->leftjoin('countries', 'countries.id', '=', 'users.country_id')
		->select('users.*','countries.name as country_name')
		->where('users.id', Auth::id())->first();
		return View::make('frontend/users/update_profile')->with(compact('data'));
	} 
	
	 
	public function user_upload_img(){
	
		if(isset($_POST) == true){
			$photo     =  Input::file('image');
			$errors    =  array();
			$file_name =  $_FILES['image']['name'];
			$file_size =  $_FILES['image']['size'];
			$file_tmp  =  $_FILES['image']['tmp_name'];
			$file_type =  $_FILES['image']['type'];   
			
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			$extensions = array("jpeg","jpg","png"); 		
			if(in_array($file_ext,$extensions )=== false){
				$errors[]="extension not allowed, please choose a JPEG or PNG file.";
			} 
			
			$image_name = '';
			$user = new User();
			$photo_name = $user->saveProfileImage($photo,  'users/profile-photo', Config::get('constants.USER_THUMB_WIDTH'));
			
			if($photo_name) {
				$user_data = User::find(Auth::id());
				$oldPhoto =  $user_data->photo;
				if($oldPhoto !="" and file_exists('upload/users/profile-photo/large/'.$oldPhoto)){
					unlink('upload/users/profile-photo/large/'.$oldPhoto);
					unlink('upload/users/profile-photo/thumb/'.$oldPhoto);
				}
				User::where('id', Auth::id())->update(array('photo' => $photo_name));
				$image_name = URL::to('upload/users/profile-photo/thumb/'.$photo_name);
			} 
			echo $image_name;
		} 
	} 
	
	
	
	
	
	public function change_password($role_id = null, $id=null){
		if(!empty($_POST)){
			$validator = User::change_password(Input::all());
			if($validator->fails()) {
				return Redirect::to('update-profile')->withErrors($validator)->withInput(Input::except('photo','form_number'));
			} else {
				$user = User::find(Auth::id());
				$user->password 	= Hash::make(Input::get('password'));
				if($user->save()){
					return Redirect::to('update-profile')->with('message', 'User password has been changed successfully.');
				}
			}
		} 
	} 
	
	
	
	
	// My Ads
	public function my_ads(){
		$my_ad_data =  Property::sortable()->where('properties.user_id', Auth::id());
		$my_ad_data =  $my_ad_data->select('properties.*')->orderBy('properties.created_at','desc')->paginate(Config::get('constants.PAGINATION'));
		return View::make('frontend/users/my_ads')->with(compact('my_ad_data'));
	}
	
	
	// My Ads
	public function who_interested(){
		$my_ad_data =  Property::sortable()->rightjoin('ad_interesteds', 'ad_interesteds.property_id', '=', 'properties.id')->where('ad_interesteds.is_interested',1);;
		$my_ad_data =  $my_ad_data->select('properties.*')->where('ad_interesteds.user_id',Auth::id())->groupBy('properties.id')->orderBy('properties.created_at','desc')->paginate(Config::get('constants.PAGINATION'));
		return View::make('frontend/users/who_interested')->with(compact('my_ad_data'));
	}
	
	
	// My Ads
	public function saved_ads(){
		$my_ad_data =  Property::sortable()->rightjoin('ad_saved_ads', 'ad_saved_ads.property_id', '=', 'properties.id')->where('ad_saved_ads.is_interested',1);
		$my_ad_data =  $my_ad_data->select('properties.*')->where('ad_saved_ads.user_id',Auth::id())->groupBy('properties.id')->orderBy('properties.created_at','desc')->paginate(Config::get('constants.PAGINATION'));
		return View::make('frontend/users/saved_ads')->with(compact('my_ad_data'));
	}
	
	
	// Myad remove
	public function remove_my_ad($id =null) {
	
		$data = Property::find($id);
		if(empty($data) || $data->user_id!=Auth::id()) {
			return Redirect::to('/my-ads')->with('errormessage', 'Oops ! Something went wrong, please try again.');
		}  
	
		$property_exists = DB::table('properties')->where('id',$id)->where('user_id',Auth::id())->count();
		if($property_exists>0) {
			$data = Property::find($id); 
			if($data->delete()){
				return Redirect::to('my-ads')->with('message', 'Ad has been deleted successfully.');
			} else{
				return Redirect::to('my-ads')->with('message', 'Oops! Something went wrong, please try again.');
			}
		} else {
			return Redirect::to('my-ads')->with('errormessage', 'Oops! Something went wrong, please try again.');
		}
	} 
	
	// Myad status
	public function status_my_ad($id =null) {
	
		$data = Property::find($id);
		if(empty($data) || $data->user_id!=Auth::id()) {
			return Redirect::to('/my-ads')->with('errormessage', 'Oops ! Something went wrong, please try again.');
		}  
	
		$property_exists = DB::table('properties')->where('id',$id)->where('user_id',Auth::id())->count();
		if($property_exists>0) {
			$data = Property::find($id); 
			if($data->status==1){
				$data->status = 0;
			}else {
				$data->status = 1;
			}
			if($data->save()){
				return Redirect::to('my-ads')->with('message', 'Status has been changed successfully!');
			} else{
				return Redirect::to('my-ads')->with('message', 'Oops! Something went wrong, please try again.');
			}
		} else {
			return Redirect::to('my-ads')->with('errormessage', 'Oops! Something went wrong, please try again.');
		}
	}	
	
	
	
	// Myad images
	
	public function ad_images($id =null){
	
		$data = Property::find($id);
		if(empty($data) || $data->user_id!=Auth::id()) {
			return Redirect::to('/my-ads')->with('errormessage', 'Oops ! Something went wrong, please try again.');
		}  
	
		$property_exists = DB::table('properties')->where('id',$id)->where('user_id',Auth::id())->count();
		if($property_exists==0) {
			return Redirect::to('my-ads')->with('errormessage', 'Oops! Something went wrong, please try again.');
		}
		
		if(!empty($_POST)){
		
			$user = new User();
			$images = Input::file('images');
			if(!empty($images)) {
				$k=1;
				$ad_image_exists = DB::table('ad_images')->where('property_id',$id)->where('is_default',1)->count();
				foreach($images as $image_val) {
					if($image_val) {
						$post_data = array();
						$photo_name =  $user->saveProfileImage($image_val,'ads',Config::get('constants.ADS_THUMB_WIDTH'));
						$post_data['property_id'] = $id;
						if($k==1 && $ad_image_exists==0) {
							$post_data['is_default']  = 1;
						}
						$post_data['image']       = $photo_name;
						$save_img = AdImage::create($post_data); 
						$k++;
					} else {
						return Redirect::to('ad-images/'.$id)->with('errormessage', 'Please select images, please try again!!');
					}
				}
				return Redirect::to('ad-images/'.$id)->with('message', 'Ad images has been upload successfully!');
			} else {
				return Redirect::to('ad-images/'.$id)->with('errormessage', 'Ad images could not be upload, please try again!!');
			} 
		}
		
		$my_ad_image_data =  AdImage::sortable()->where('ad_images.property_id', $id);
		$my_ad_image_data =  $my_ad_image_data->select('ad_images.*')->orderBy('ad_images.created_at','desc')->paginate(Config::get('constants.PAGINATION'));
	 
		// Get Myads Data
		$my_ad_data =  Property::find($id); 
		return View::make('frontend/users/ad_images')->with(compact('data','my_ad_image_data','my_ad_data'));
	}
	
	
	// Myad remove img
	public function remove_ad_image($id =null, $ads_id=null) {
	
		$data = AdImage::find($id); 
		if($data->delete()){
			if($data->image !="" and file_exists('upload/ads/large/'.$data->image)){
				unlink('upload/ads/large/'.$data->image);
				unlink('upload/ads/thumb/'.$data->image);
			} 
			return Redirect::to('ad-images/'.$ads_id)->with('message', 'Ad image has been deleted successfully.');
		} else{
			return Redirect::to('ad-images/'.$ads_id)->with('message', 'Oops! Something went wrong, please try again.');
		}
	}	
	
	
	public function status_my_ad_image($id =null, $ads_id=null) {
		 
		$data = AdImage::find($id); 
		if($data->is_default==1){
			$data->is_default = 0;
		}else {
			AdImage::where('property_id', $ads_id)->update(array('is_default' => '0'));
			$data->is_default = 1;
		}
		if($data->save()){
			return Redirect::to('ad-images/'.$ads_id)->with('message', 'Status has been changed successfully!');
		} else{
			return Redirect::to('ad-images/'.$ads_id)->with('message', 'Oops! Something went wrong, please try again.');
		}
		 
	}	
	 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function admin_index($role_id = null){
	
		$filters = array();
		$users = User::sortable()->where('users.role_id', $role_id);
		
		$search_sess = array();
		
		if (Session::has('usearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
			$_POST = Session::get('usearch');
		}else{
			Session::forget('usearch');
		}
		
		if(!empty($_POST)){
		
			if(isset($_POST['first_name']) and $_POST['first_name']!=''){
				$first_name = $_POST['first_name'];
				$filters[] =  array('field' => 'first_name', 'value' => $first_name);
			}
			
			if(isset($_POST['email']) and $_POST['email']!=''){
				$email = $_POST['email'];
				$filters[] =  array('field' => 'email', 'value' => $email);
			}
			
			if(isset($_POST['gender']) and $_POST['gender']!=''){
				$gender = $_POST['gender'];
				$filters[] =  array('field' => 'gender', 'value' => $gender);
			}
			
			if(isset($_POST['uid']) and $_POST['uid']!=''){
				$uid = $_POST['uid'];
				$filters[] =  array('field' => 'uid', 'value' => $uid);
			}
			
			if(isset($_POST['status']) and $_POST['status']!=''){
				$status = $_POST['status'];
				$filters[] =  array('field' => 'status', 'value' => $status);
			}
			
			
			if(isset($_POST['country_id']) and $_POST['country_id']!=''){
				$country_id = $_POST['country_id'];
				$filters[] =  array('field' => 'country_id', 'value' => $country_id);
			}
			
			
			foreach ($filters as $filter) {
			
				if($filter['field'] == 'country_id' OR $filter['field'] == 'status'){
					$search_sess[$filter['field']] = (int)$filter['value'];	
					$users = $users->where('users.'.$filter['field'], '=', $filter['value']);
				}else if($filter['field'] == 'email'){
					$search_sess[$filter['field']] =  $filter['value'];	 		
					$users = $users->where('users.'.$filter['field'], $filter['value']);
				}else if($filter['field'] == 'gender'){
					$search_sess[$filter['field']] =  $filter['value'];	 		
					$users = $users->where('users.'.$filter['field'], $filter['value']);
				}else if($filter['field'] == 'first_name'){
					$search_sess[$filter['field']] =  $filter['value'];
					$user_name = $filter['value'];
					$full_name = explode(" ", $filter['value']);
					$first_name = isset($full_name[0])?$full_name[0]:"";
					$last_name = (isset($full_name[1]) and $full_name[1])?$full_name[1]:$first_name;
			
					$users = $users->where(function($query) use($user_name, $last_name){
							$query->where('users.first_name', 'like',trim($user_name).'%')
									->orWhere('users.last_name', 'like', trim($last_name).'%');
								});
				}
			}
			
			Session::put('usearch',$search_sess);
		}
		
		$users = $users->leftjoin('countries', 'countries.id', '=', 'users.country_id')
					//->select('users.*','countries.name as name')->orderBy('created_at','desc')->paginate(1);
					->select('users.*','countries.name as name')->orderBy('created_at','desc')->paginate(Config::get('constants.PAGINATION'));
		
		if(isset($_GET['s']) and $_GET['s']){
			$users->appends(array('s' => $_GET['s'],'o'=>$_GET['o']))->links();
		}
			
		$countries = DB::table('countries')->orderBy('name','ASC')->lists('name','id');
		return View::make('backend.users.admin_index', compact('users','countries'));
	}
	
	
	public function admin_view($role_id =null, $id =null){
		$user = DB::table('users')->where('users.id', $id)->leftjoin('countries', 'countries.id', '=', 'users.country_id')->select('users.*', 'countries.name as country_name')->first();
		return View::make('backend.users.admin_view', compact('user'));
	} 
	
	
	public function admin_add(){
		if(!empty($_POST)){
			$validator = User::validate('admin_add', Input::all());
			if ( $validator->fails() ) {
				Session::flash('error-message', 'User could not be saved, Please correct errors');
				return Redirect::to('admin/users/add')->withErrors($validator)->withInput(Input::except('password','photo'));
			} else {
				$user = new User();
				$savedUser = $user->save_data(Input::all());
				if ($savedUser){
					if($savedUser->role_id>2) {
						return Redirect::to('admin/users/3')->with('message', 'User has been registered successfully');
					} else {
						return Redirect::to('admin/users/'.$savedUser->role_id)->with('message', 'User has been registered successfully');
					}
				}
				return Redirect::to('admin/users/2');
			}
		}
		
		$countries = DB::table('countries')->orderBy('name','ASC')->lists('name','id');
		return View::make('backend.users.admin_add', compact('countries'));
	}
	
	
	 
	public function admin_edit($role_id = null, $id = null) {
		$data = User::find($id);
		
		if(!empty($_POST)){
			$validator = User::validate('admin_edit', Input::all(), $id);
			
			if ( $validator->fails() ) {
				Session::flash('error-message', 'User could not be updated, Please correct errors');
				return Redirect::to('admin/users/edit/'.$role_id.'/'.$id)->withErrors($validator)->withInput(Input::except('photo'));
			} else {
				$user = new User();
				$savedUser = $user->save_data(Input::all(), $id);
				
				if ($savedUser){
					if($savedUser->role_id>2) {
						return Redirect::to('admin/users/3')->with('message', 'User has been updated successfully');
					} else {
						return Redirect::to('admin/users/'.$savedUser->role_id)->with('message', 'User has been updated successfully');
					}
				}
				return Redirect::to('admin/users/'.$role_id);
			}
		}
		
		$countries = DB::table('countries')->orderBy('name','ASC')->lists('name','id');
		return View::make('backend.users.admin_edit')->with(compact('data','countries'));
	}

	
	
	public function admin_status($id){
		$user = User::find($id);
		$role_id = $user->role_id;
		if($user->status==1){
			$user->status = 0;
		}else {
			$user->status = 1;
		}
		
		if($user->save()){
			Session::flash('message', 'Status has been changed successfully!');
			if($role_id>2) {
				return Redirect::to('admin/users/3');
			} else {
				return Redirect::to('admin/users/'.$role_id);
			}
		}
		return Redirect::to('admin/users/'.$role_id);
	}
	
	
	
	public function admin_block($id){
		$user = User::find($id);
		$role_id = $user->role_id;
		if($user->status==1 OR $user->status==0){
			$user->status = 2;
			$block = "Blocked";
		}else {
			$user->status = 1;
			$block = "Unblocked";
		}
		
		if ($user->save()){
			Session::flash('message', 'User has been '.$block.' successfully!');
			if($role_id>2) {
				return Redirect::to('admin/users/3');
			} else {
				return Redirect::to('admin/users/'.$role_id);
			}
		}
		return Redirect::to('admin/users/'.$role_id);
	}
	
	
	
	public function admin_remove($id =null){
		$user 		= User::find($id);
		$photo 		= $user->photo;
		$role_id 	= $user->role_id;
		
		if($user->delete()){
			if($photo !='' AND file_exists('upload/users/profile-photo/large/'.$photo)){
				unlink('upload/users/profile-photo/large/'.$photo);
				unlink('upload/users/profile-photo/thumb/'.$photo);
			}
			if($role_id>2) {
				return Redirect::to('admin/users/3')->with('message', 'User has been deleted successfully.');
			} else {
				return Redirect::to('admin/users/'.$role_id)->with('message', 'User has been deleted successfully.');
			}
		}else{
			return Redirect::to('admin/users/'.$role_id)->with('message', 'User could not be deleted.');
		}
	}
	
	

	public function admin_change_password($role_id = null, $id=null){
		
		if(!empty($_POST)){
			$rules = array(
				'password'	  				=> 'required|min:6|confirmed',
				'password_confirmation'     => 'required',
			);
			$messages = array(
				'password.min' 		  => "Password length should not be less than 6 characters",
				'password.confirmed'  => "Password does not match",
			);
			$validator = Validator::make( Input::all(), $rules, $messages ); 
			
			if ($validator->fails()) {
				Session::flash('errormessage', 'Password could not be changed, Please correct errors');
				if($role_id>2) {
					return Redirect::to('admin/users/change_password/3/'.$id)->withErrors($validator);
				} else {
					return Redirect::to('admin/users/change_password/'.$role_id.'/'.$id)->withErrors($validator);
				}
			} else {
				$user = User::find($id);
				$user->password 	= Hash::make(Input::get('password'));
				if($user->save()){
					if($role_id == 1){
						if($role_id>2) {
							return Redirect::to('admin/users/change_password/3/'.$id)->with('message', 'Admin password has been changed successfully.');
						} else {
							return Redirect::to('admin/users/change_password/'.$role_id.'/'.$id)->with('message', 'Admin password has been changed successfully.');
						}
					}else{
						return Redirect::to('admin/users/'.$role_id)->with('message', 'User password has been changed successfully.');
					}
				}
			}
		}
		
		$data = User::find($id);
		return View::make('backend.users.admin_change_password', compact('data'));
	} 
}