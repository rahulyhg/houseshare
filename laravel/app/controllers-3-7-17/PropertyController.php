<?php
    class PropertyController extends BaseController {  
	
		public function __construct(){
			$this->beforeFilter(function(){
				if(Auth::guest())
					return Redirect::to('/');
	
			},['except' => ['listing','place_an_ad','advertise_add','advertise_back','login_register','advertise-action','advertise_action','details','email_advertiser','advertise_success']]);
		}
		
		public function listing(){ 
		
			$filters = array();
			$data  =  Property::sortable(); 
			
			$search_sess = array();
			
			if (Session::has('adssearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
				$_POST = Session::get('adssearch');
			}else{
				Session::forget('adssearch');
			} 
			
			if(!empty($_POST)){
			
				//echo '<pre>'; print_r(Input::get('ad_type')); die; 
				
				if(isset($_POST['title']) and $_POST['title']!=''){
					$title = $_POST['title'];
					$data = $data->where('properties.title', 'like','%'.trim( $title).'%');
					$search_sess['title'] = $title;
				}
			
				if(Input::get('ad_type')!=''){
					$ad_type = Input::get('ad_type');
					$data = $data->where('properties.ad_type',$ad_type);
					$search_sess['ad_type'] = $ad_type;
				}
				
				if(Input::get('keyword')!=''){
					$keyword = Input::get('keyword');
					
						$data = $data->where(function($query) use($keyword){
							$query->where('properties.post_code', 'like',trim($keyword).'%')
							->orWhere('properties.title', 'like', trim($keyword).'%')
							->orWhere('properties.area', 'like', trim($keyword).'%');
								}); 
					$search_sess['keyword'] = $keyword;
				} 
				Session::put('adssearch',$search_sess); 
			}  
			
			if(Session::has('adssearch')=='') {
				$data = $data->where('properties.ad_type',1);
				$get_add_type = 1;
			} else {
				$get_add_type = Session::get('adssearch.ad_type');
			}
			
			$data = $data->select('properties.*')->where('properties.status',1)->groupBy('properties.id')->orderBy('created_at','DESC')->paginate(Config::get('constants.FRONT_PAGINATION'));
			
			if(isset($_GET['s']) and $_GET['s']){
				$data->appends(array('s' => $_GET['s'],'o'=>$_GET['o']))->links();
			}  
			
			return View::make('frontend.properties.listing',compact('data','get_add_type'));
		}  
		
		
		public function details($id=null){ 
		
			$data =  Property::where('properties.id',$id)
			->leftjoin('ad_interesteds', 'ad_interesteds.property_id', '=', 'properties.id')
			->leftjoin('languages', 'languages.id', '=', 'properties.language_id')
			->leftjoin('countries', 'countries.id', '=', 'properties.country_id')
			->leftjoin('users', 'users.id', '=', 'properties.user_id');
			$data = $data->select('properties.*','ad_interesteds.is_interested','languages.name as language_name','countries.name as country_name','users.first_name as user_first_name','users.last_name as user_last_name','users.email as user_email')->first();
			
			//echo '<pre>'; print_r($data); die; 
			
			return View::make('frontend.properties.details',compact('data'));
		}  
		
		
		public function email_advertiser($id=null){ 
		
			$data =  Property::where('properties.id',$id)->leftjoin('users', 'users.id', '=', 'properties.user_id');
			$data = $data->select('properties.*','users.first_name as user_first_name','users.last_name as user_last_name','users.email as user_email')->first();
			
		
			if(!empty($_POST)) {
			
				$input = Input::all();
				$rules = array(
					'message'  => 'required',
				);
				$messages = array(
					'message.required'  	=> 'Message is required.',
				);
				
				$validation = Validator::make($input, $rules,$messages);
				if ($validation->fails()) {	
					Session::flash('errormessage', 'Message could not be send, Please correct errors');
					return Redirect::to('email-advertiser/'.$id)->withErrors($validation)->withInput(Input::except('login_password'));
				} else { 
				
					$data_post = Input::all(); 
					$data_save['parent_id']          = 0; 
					$data_save['sender_id']          = Auth::user()->id;
					$data_save['receiver_id']        = $data->user_id;
					$data_save['messages_title']     = 'Re: '.$data['title'];
					$data_save['messages_content']   = $data_post['message']; 
					$save_data  = Message::create($data_save); 
					
					if($save_data){ 
						return Redirect::to('email-advertiser/'.$id)->with('message', 'Message has been send successfully!');
					}else{
						return Redirect::to('email-advertiser/'.$id)->with('errormessage', 'Message could not be send, please try again!!');
					}
				
				}
			}
		

			return View::make('frontend.properties.email_advertiser',compact('data'));
		}  
		
		
		public function place_an_ad(){ 
			Session::forget('advertiseadd');
			return View::make('frontend.properties.place_an_ad');
		} 
		
		public function add_interested(){ 
			
			$result = array();
			if(!empty($_POST)) {
				
				$get_interested = 0;
			
				$id = Input::get('id');
				$is_interested = Input::get('is_interested');
				$data = Property::find($id);
				if($data) {
					$ad_interested_save = '';
					$get_interested = ($is_interested==1)?0:1;
					$ad_interesteds = DB::table('ad_interesteds')->where('property_id',$id)->where('user_id',Auth::id())->first();
					if($ad_interesteds) {
					
						//echo '<pre>'; print_r($get_interested); die; 
					
						$ad_interested_save = AdInterested::where('id', $ad_interesteds->id)->update(array('is_interested' =>$get_interested));
					} else {
						$data_save = array('property_id'=>$id,'user_id'=>Auth::id(),'is_interested'=>1);
						$ad_interested_save = AdInterested::create($data_save); 
						$get_interested = 1;
					}
					if($ad_interested_save) {
						$result = array('success'=>1, 'msg'=>'Success','get_interested'=>$get_interested);
					} else {
						$result = array('success'=>0, 'msg'=>'Oops ! Something went wrong, please try again.','get_interested'=>$get_interested);
					}
				} else {
					$result = array('success'=>0, 'msg'=>'Oops ! Something went wrong, please try again.','get_interested'=>$get_interested);
				}
			} 
			echo json_encode($result); die; 
		}  
		
		public function add_savedad(){ 
			
			$result = array();
			if(!empty($_POST)) {
				
				$get_interested = 0;
			
				$id = Input::get('id');
				$is_interested = Input::get('is_interested');
				$data = Property::find($id);
				if($data) {
					$ad_interested_save = '';
					$get_interested = ($is_interested==1)?0:1;
					$ad_saved_ads = DB::table('ad_saved_ads')->where('property_id',$id)->where('user_id',Auth::id())->first();
					if($ad_saved_ads) {
					
						//echo '<pre>'; print_r($get_interested); die; 
					
						$ad_interested_save = AdSavedAd::where('id', $ad_saved_ads->id)->update(array('is_interested' =>$get_interested));
					} else {
						$data_save = array('property_id'=>$id,'user_id'=>Auth::id(),'is_interested'=>1);
						$ad_interested_save = AdSavedAd::create($data_save); 
						$get_interested = 1;
					}
					if($ad_interested_save) {
						$result = array('success'=>1, 'msg'=>'Success','get_interested'=>$get_interested);
					} else {
						$result = array('success'=>0, 'msg'=>'Oops ! Something went wrong, please try again.','get_interested'=>$get_interested);
					}
				} else {
					$result = array('success'=>0, 'msg'=>'Oops ! Something went wrong, please try again.','get_interested'=>$get_interested);
				}
			} 
			echo json_encode($result); die; 
		}  
		
		
		
		
		public function advertise_back($slug=null,$form_step=2){ 
			$get_form_step = $form_step-1;
			if($get_form_step==1){
				Session::forget('advertiseadd.step');
			} else {
				$get_form_step = $get_form_step-1;
				Session::put('advertiseadd.step',$get_form_step);
			}
			return Redirect::to('advertise/'.$slug);
		} 
		
		
		public function login_register($slug=null) { 
		
			if(!empty($_POST)) {  
			
				//echo '<pre>'; print_r(Session::get('advertiseadd.data')); die; 
			
				if(!Session::has('advertiseadd.data')) {
					Session::flash('errormessage', 'Advertise could not be added, Please correct errors');
					return Redirect::to('advertise/'.$slug);
				}
				
				$get_form_data = Session::get('advertiseadd.data');
				
				if(Auth::check()) {
					$get_form_data['daily_email_alerts'] = Input::get('daily_email_alerts');
					$get_form_data['instant_email_alerts'] = Input::get('instant_email_alerts');
					 
					$get_form_data = Session::get('advertiseadd.data');
					
					if(!empty($get_form_data)) {
					
						$post_data = $get_form_data;
						
						$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
						$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
						
						if(isset($post_data['amenitie_id'])) {
							unset($post_data['amenitie_id']);
						}
						
						if(isset($post_data['roomArr'])) {
							unset($post_data['roomArr']);
						} 
						
						$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
						if(!empty($misc_Arr)){
							$post_data['misc'] = join(',',$misc_Arr);
						}
						$post_data['user_id'] = Auth::id();
						$post_data['status']  = 1;
						
						$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
						$post_data['ad_type'] = $ad_type;
						
						$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
						if($my_email) {
							$post_data['email'] = $my_email;
						} 
						
						$projects = Property::create($post_data);  
						
						if($projects){
						
							$order_num = sprintf("HM-%007d", $projects->id);
							Property::where('id', $projects->id)->update(array('order_number' => $order_num));
						
							// Save Room Data
							if(!empty($get_room_arr)){
								foreach($get_room_arr as $get_room_val){
								
									$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
									$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
									if(!empty($amenitie_id)) {
										$amenitie_id = join(',',$amenitie_id);
									}
									$get_room_val['amenities_ids'] = $amenitie_id;
									$get_room_val['room_size'] = $room_size_type;
									$get_room_val['property_id'] = $projects->id; 
									AdRoom::create($get_room_val);
								}
							} 
							
							// Save Room Data
							if(!empty($amenitie_id_arr)){
								foreach($amenitie_id_arr as $amenitie_val){
									$amenitie_val_save = array();
									$amenitie_val_save['amenitie_id'] = $amenitie_val;
									$amenitie_val_save['property_id'] = $projects->id;  
									AdAmenitie::create($amenitie_val_save);
								}
							}
							
							$add_url     = URL::to('details/'.$projects->id);
							$add_id	     = $order_num;
							$add_title	 = $projects->title;
							
							$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
							$user = DB::table('users')->where('id', $projects->user_id)->first();
							if($signUpMail){
								$usr_name		= $user->first_name." ".$user->last_name;
								$email			= $user->email; 
								$site_name 		= Session::get('SiteValue.site_name');
								$admin_email	= Session::get('SiteValue.admin_email'); 
								$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
								$subject		= $signUpMail->subject;
								/*
								Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
									$message->from($admin_email, $site_name);
									$message->to($email, $usr_name)->subject($subject);
								});  */
							}  
							Session::forget('advertiseadd');
							return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
						}
					}  
					 
				} else {
			
					$login_email    = Input::get('login_email');
					$login_password = Input::get('login_password');
					
					if($login_email){
					
						$input = Input::all();
						
						$rules = array(
							'login_email'  => 'required',
							'login_password'  => 'required',
						);
						$messages = array(
							'login_email.required'  	=> 'Email is required.',
							'login_password.required'  	=> 'Password is required.',
						);
						
						$validation = Validator::make($input, $rules,$messages);
						if ($validation->fails()) {	
							Session::flash('errormessage', 'Login Failed, Password or Email not found.');
							return Redirect::to('advertise/'.$slug)->withErrors($validation)->withInput(Input::except('login_password'));
						} else {
							if (Auth::attempt(array('email'=>$login_email, 'password'=>$login_password, 'status'=>1, 'role_id'=>2),true)) {
								
								$get_form_data = Session::get('advertiseadd.data');
								
								if(!empty($get_form_data)) {
								
									$post_data = $get_form_data;
									
									$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
									$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
									
									if(isset($post_data['amenitie_id'])) {
										unset($post_data['amenitie_id']);
									}
									
									if(isset($post_data['roomArr'])) {
										unset($post_data['roomArr']);
									} 
									
									$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
									if(!empty($misc_Arr)){
										$post_data['misc'] = join(',',$misc_Arr);
									}
									$post_data['user_id'] = Auth::id();
									$post_data['status']  = 1;
									
									$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
									$post_data['ad_type'] = $ad_type;
									
									$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
									if($my_email) {
										$post_data['email'] = $my_email;
									} 
									
									$projects = Property::create($post_data);  
									
									if($projects){
									
										$order_num = sprintf("HM-%007d", $projects->id);
										Property::where('id', $projects->id)->update(array('order_number' => $order_num));
									
										// Save Room Data
										if(!empty($get_room_arr)){
											foreach($get_room_arr as $get_room_val){
											
												$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
												$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
												if(!empty($amenitie_id)) {
													$amenitie_id = join(',',$amenitie_id);
												}
												$get_room_val['amenities_ids'] = $amenitie_id;
												$get_room_val['room_size'] = $room_size_type;
												$get_room_val['property_id'] = $projects->id; 
												AdRoom::create($get_room_val);
											}
										} 
										
										// Save Room Data
										if(!empty($amenitie_id_arr)){
											foreach($amenitie_id_arr as $amenitie_val){
												$amenitie_val_save = array();
												$amenitie_val_save['amenitie_id'] = $amenitie_val;
												$amenitie_val_save['property_id'] = $projects->id;  
												AdAmenitie::create($amenitie_val_save);
											}
										}
										
										$add_url     = URL::to('details/'.$projects->id);
										$add_id	     = $order_num;
										$add_title	 = $projects->title;
										
										$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
										$user = DB::table('users')->where('id', $projects->user_id)->first();
										if($signUpMail){
											$usr_name		= $user->first_name." ".$user->last_name;
											$email			= $user->email; 
											$site_name 		= Session::get('SiteValue.site_name');
											$admin_email	= Session::get('SiteValue.admin_email'); 
											$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
											$subject		= $signUpMail->subject;
											/*
											Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
												$message->from($admin_email, $site_name);
												$message->to($email, $usr_name)->subject($subject);
											});  */
										}  
										Session::forget('advertiseadd');
										return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
									}
								}  
								
							} else {
								Session::flash('errormessage', 'Login Failed, Password or Email not found.');
								return Redirect::to('advertise/'.$slug);
							}
						}
						
					} else {
					
						$input = Input::all();
						
						$rules = array(
							'email'  => 'required|email|unique:users,email',
							'conf_email' => 'required|same:email',
							'password'  => 'required',
							'conf_password' => 'required|same:password',
						); 
									
						$messages = array(
							'post_code.required' 		=> 'Postcode is required.',   
							'i_am_type.required'	 	=> 'This field is required.',   
							'email.required'  		 	=> 'Email is required.',
							'email.email'  		 	 	=> 'Invalid Email.',
							'title.required' 			=> 'Title is required.',   
							'description.required' 		=> 'Description is required.',   
							'first_name.required' 		=> 'First name is required.',   
							'last_name.required' 		=> 'Last name is required.',   
							'area.required' 			=> 'This field is required.',   
							'is_gender.required' 		=> 'Gender is required.',   
						);
						
						$validation = Validator::make($input, $rules,$messages);
						if($validation->fails()) {	
							Session::flash('errormessage', 'User could not be register, Please correct errors');
							return Redirect::to('advertise/'.$slug)->withErrors($validation)->withInput(Input::except('login_password'));
						} else {
					
							$data              = Input::except('password');
							$data['password']  = Hash::make(Input::get('password'));
							$data['status']    = 1;
							$data['role_id']   = 2;
							$data['first_name']  = isset($get_form_data['first_name'])?$get_form_data['first_name']:'';
							$data['last_name']   = isset($get_form_data['last_name'])?$get_form_data['last_name']:'';
							
							 
							$user = User::create($data);  
							if($user) {
							
								$token = bin2hex(openssl_random_pseudo_bytes(20));
								$user_link = Config::get('constants.SITE_URL') .'active-profile/'. $token;
								User::where('id', $user->id)->update(array('varify_hash' => $token));
							
								$signUpMail  	   = DB::table('templates')->where('slug', 'user-registration')->first();
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
								
								if(Auth::attempt(array('email'=>$user->email, 'password'=>Input::get('password'), 'status'=>1, 'role_id'=>2),true)) {
								 
									$get_form_data = Session::get('advertiseadd.data');
									
									if(!empty($get_form_data)) {
										
										$post_data = $get_form_data;
										
										$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
										$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
										
										if(isset($post_data['amenitie_id'])) {
											unset($post_data['amenitie_id']);
										}
										
										if(isset($post_data['roomArr'])) {
											unset($post_data['roomArr']);
										} 
										
										$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
										if(!empty($misc_Arr)){
											$post_data['misc'] = join(',',$misc_Arr);
										}
										$post_data['user_id'] = Auth::id();
										$post_data['status']  = 1;
										
										$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
										$post_data['ad_type'] = $ad_type;
										
										$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
										if($my_email) {
											$post_data['email'] = $my_email;
										} 
										
										$projects = Property::create($post_data);  
										
										if($projects){
										
											$order_num = sprintf("HM-%007d", $projects->id);
											Property::where('id', $projects->id)->update(array('order_number' => $order_num));
										
											// Save Room Data
											if(!empty($get_room_arr)){
												foreach($get_room_arr as $get_room_val){
												
													$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
													$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
													if(!empty($amenitie_id)) {
														$amenitie_id = join(',',$amenitie_id);
													}
													$get_room_val['amenities_ids'] = $amenitie_id;
													$get_room_val['room_size'] = $room_size_type;
													$get_room_val['property_id'] = $projects->id; 
													AdRoom::create($get_room_val);
												}
											} 
											
											// Save Room Data
											if(!empty($amenitie_id_arr)){
												foreach($amenitie_id_arr as $amenitie_val){
													$amenitie_val_save = array();
													$amenitie_val_save['amenitie_id'] = $amenitie_val;
													$amenitie_val_save['property_id'] = $projects->id;  
													AdAmenitie::create($amenitie_val_save);
												}
											}
											
											$add_url     = URL::to('details/'.$projects->id);
											$add_id	     = $order_num;
											$add_title	 = $projects->title;
											
											$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
											if($signUpMail){
												$usr_name		= $user->first_name." ".$user->last_name;
												$email			= $user->email; 
												$site_name 		= Session::get('SiteValue.site_name');
												$admin_email	= Session::get('SiteValue.admin_email'); 
												$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
												$subject		= $signUpMail->subject;
												/*
												Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
													$message->from($admin_email, $site_name);
													$message->to($email, $usr_name)->subject($subject);
												});  */
											}  
											Session::forget('advertiseadd');
											return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
										}
									}   
									
								} else {
									Session::flash('errormessage', 'User could not be register. Please correct errors.');
									return Redirect::to('advertise/'.$slug);
								} 
							
							} else { 
								Session::flash('errormessage', 'User could not be register. Please correct errors.');
								return Redirect::to('advertise/'.$slug);
							}  
							
						}
					} 
				}
			}  
			//return Redirect::to('advertise/'.$slug);
		}  
		
		
		public function advertise_add($slug=null) {  
		
			//Session::forget('advertiseadd');
			
			$get_form_step = (Session::get('advertiseadd.step'))?Session::get('advertiseadd.step')+1:1;
			$get_form_data = Session::get('advertiseadd.data');
			
			if(!empty($_POST)){
			
				//echo '<pre>'; print_r(Input::all()); die; 
				$form_step = Input::get('form_step');
			
				$validator = Property::validate_front(Input::all(),$form_step,$slug);
				if($validator->fails()) {
					Session::flash('errormessage', 'Advertise could not be added, Please correct errors');
					return Redirect::to('advertise/'.$slug)->withErrors($validator)->withInput(Input::all());
				} else {
				
					$room_arr = Input::get('roomArr');
					
					if(!empty($room_arr) && $form_step==3) {
					
						$rules = array();
						$message = array();
						
						foreach($room_arr as $k=>$room_val){
						
							$fieldArr = array();
							
							$available_type = isset($room_val['available_type'])?$room_val['available_type']:'';
							if(empty($available_type)){
								//$fieldArr[] = 'available_type';
							}
							
							$room_cost = isset($room_val['room_cost'])?$room_val['room_cost']:'';
							if(empty($room_cost)){
								$fieldArr[] = 'room_cost';
							}
							
							$room_cost_type = isset($room_val['room_cost_type'])?$room_val['room_cost_type']:'';
							if(empty($room_cost_type)){
								$fieldArr[] = 'room_cost_type';
							}
							
							$room_size_type = isset($room_val['room_size_type'])?$room_val['room_size_type']:'';
							if(empty($room_size_type)){
								$fieldArr[] = 'room_size_type';
							}
							 
							if(!empty($fieldArr)) { 
								foreach($fieldArr as $val) { 
									$rules = array_add($rules, 'roomArr['.$k.']['.$val.']', 'required');
									$message = array_add($message, 'roomArr['.$k.']['.$val.'].required', 'This field is required.');
								} 
							}
						}
						
						$message = array_dot($message);
						$validator = Validator::make( Input::all(), $rules, $message); 
						if($validator->fails()) {
							Session::flash('errormessage', 'Advertise could not be added, Please correct errors');
							return Redirect::to('advertise/'.$slug)->withErrors($validator)->withInput(Input::all());
						}
						
					}   

					
					if($slug=='room-wanted' && $form_step==2) {
					
						Session::put('advertiseadd.data',Input::all());
			 
						if(Auth::check()) {
						
							$get_form_data = (Session::get('advertiseadd.data'))?Session::get('advertiseadd.data'):array();
							
							//echo '<pre>'; print_r($get_form_data); die; 
							
							$get_form_data['daily_email_alerts'] = Input::get('daily_email_alerts');
							$get_form_data['instant_email_alerts'] = Input::get('instant_email_alerts');
							
			 				if(!empty($get_form_data)) {
							
								$post_data = $get_form_data;
								
								$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
								$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
								
								if(isset($post_data['amenitie_id'])) {
									unset($post_data['amenitie_id']);
								}
								
								if(isset($post_data['roomArr'])) {
									unset($post_data['roomArr']);
								} 
								
								$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
								if(!empty($misc_Arr)){
									$post_data['misc'] = join(',',$misc_Arr);
								}
								$post_data['user_id'] = Auth::id();
								$post_data['status']  = 1;
								
								$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
								$post_data['ad_type'] = $ad_type;
								
								$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
								if($my_email) {
									$post_data['email'] = $my_email;
								} 
								
								$projects = Property::create($post_data);  
								
								if($projects){
								
									$order_num = sprintf("HM-%007d", $projects->id);
									Property::where('id', $projects->id)->update(array('order_number' => $order_num));
								
									// Save Room Data
									if(!empty($get_room_arr)){
										foreach($get_room_arr as $get_room_val){
										
											$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
											$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
											if(!empty($amenitie_id)) {
												$amenitie_id = join(',',$amenitie_id);
											}
											$get_room_val['amenities_ids'] = $amenitie_id;
											$get_room_val['room_size'] = $room_size_type;
											$get_room_val['property_id'] = $projects->id; 
											AdRoom::create($get_room_val);
										}
									} 
									
									// Save Room Data
									if(!empty($amenitie_id_arr)){
										foreach($amenitie_id_arr as $amenitie_val){
											$amenitie_val_save = array();
											$amenitie_val_save['amenitie_id'] = $amenitie_val;
											$amenitie_val_save['property_id'] = $projects->id;  
											AdAmenitie::create($amenitie_val_save);
										}
									}
									
									$add_url     = URL::to('details/'.$projects->id);
									$add_id	     = $order_num;
									$add_title	 = $projects->title;
									
									$user = DB::table('users')->where('id', $projects->user_id)->first();
									$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
									if($signUpMail){
										$usr_name		= $user->first_name." ".$user->last_name;
										$email			= $user->email; 
										$site_name 		= Session::get('SiteValue.site_name');
										$admin_email	= Session::get('SiteValue.admin_email'); 
										$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
										$subject		= $signUpMail->subject;
										/*
										Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
											$message->from($admin_email, $site_name);
											$message->to($email, $usr_name)->subject($subject);
										});  */
									}  
									
									Session::forget('advertiseadd');
									return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
								}
							}  
							
						} else {
						
							$get_form_data = Session::get('advertiseadd.data');
					
							$login_email    = Input::get('login_email');
							$login_password = Input::get('login_password');
							
							if($login_email){
							
								$input = Input::all();
								
								$rules = array(
									'login_email'  => 'required',
									'login_password'  => 'required',
								);
								$messages = array(
									'login_email.required'  	=> 'Email is required.',
									'login_password.required'  	=> 'Password is required.',
								);
								
								$validation = Validator::make($input, $rules,$messages);
								if ($validation->fails()) {	
									Session::flash('errormessage', 'Login Failed, Password or Email not found.');
									return Redirect::to('advertise/'.$slug)->withErrors($validation)->withInput(Input::except('login_password'));
								} else {
									if (Auth::attempt(array('email'=>$login_email, 'password'=>$login_password, 'status'=>1, 'role_id'=>2),true)) {
										
										if(!empty($get_form_data)) {
										
											$post_data = $get_form_data;
											
											$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
											$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
											
											if(isset($post_data['amenitie_id'])) {
												unset($post_data['amenitie_id']);
											}
											
											if(isset($post_data['roomArr'])) {
												unset($post_data['roomArr']);
											} 
											
											$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
											if(!empty($misc_Arr)){
												$post_data['misc'] = join(',',$misc_Arr);
											}
											$post_data['user_id'] = Auth::id();
											$post_data['status']  = 1;
											
											$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
											$post_data['ad_type'] = $ad_type;
											
											$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
											if($my_email) {
												$post_data['email'] = $my_email;
											} 
											
											$projects = Property::create($post_data);  
											
											if($projects){
											
												$order_num = sprintf("HM-%007d", $projects->id);
												Property::where('id', $projects->id)->update(array('order_number' => $order_num));
											
												// Save Room Data
												if(!empty($get_room_arr)){
													foreach($get_room_arr as $get_room_val){
													
														$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
														$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
														if(!empty($amenitie_id)) {
															$amenitie_id = join(',',$amenitie_id);
														}
														$get_room_val['amenities_ids'] = $amenitie_id;
														$get_room_val['room_size'] = $room_size_type;
														$get_room_val['property_id'] = $projects->id; 
														AdRoom::create($get_room_val);
													}
												} 
												
												// Save Room Data
												if(!empty($amenitie_id_arr)){
													foreach($amenitie_id_arr as $amenitie_val){
														$amenitie_val_save = array();
														$amenitie_val_save['amenitie_id'] = $amenitie_val;
														$amenitie_val_save['property_id'] = $projects->id;  
														AdAmenitie::create($amenitie_val_save);
													}
												}
												
												$add_url     = URL::to('details/'.$projects->id);
												$add_id	     = $order_num;
												$add_title	 = $projects->title;
												
												$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
												$user = DB::table('users')->where('id', $projects->user_id)->first();
												if($signUpMail){
													$usr_name		= $user->first_name." ".$user->last_name;
													$email			= $user->email; 
													$site_name 		= Session::get('SiteValue.site_name');
													$admin_email	= Session::get('SiteValue.admin_email'); 
													$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
													$subject		= $signUpMail->subject;
													/*
													Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
														$message->from($admin_email, $site_name);
														$message->to($email, $usr_name)->subject($subject);
													});  */
												}  
												
												Session::forget('advertiseadd');
												return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
											}
										}  
										
									} else {
										Session::flash('errormessage', 'Login Failed, Password or Email not found.');
										return Redirect::to('advertise/'.$slug);
									}
								}
								
							} else {
							
							
								$input = Input::all();
								$rules = array(
									'register_email'  => 'required|email|unique:users,email',
									'register_conf_email' => 'required|same:register_email',
									'register_password'  => 'required',
									'register_conf_password' => 'required|same:register_password',
								);
								
								//echo '<pre>'; print_r($rules); die; 
											
								$messages = array(
									'register_email.required'  	=> 'Email is required.',
									'register_email.email'  	=> 'Invalid Email.',
									'title.required' 			=> 'Title is required.',   
								);
								
								$validation = Validator::make($input, $rules,$messages);
								if ($validation->fails()) {	
									Session::flash('errormessage', 'User could not be register, Please correct errors');
									return Redirect::to('advertise/'.$slug)->withErrors($validation)->withInput(Input::except('login_password'));
								} else {
							
									$data_save               = Input::except('register_password');
									$data_save['first_name'] = Input::get('first_name');
									$data_save['last_name']  = Input::get('last_name');
									$data_save['email']      = Input::get('register_email');
									$data_save['password']   = Hash::make(Input::get('register_password'));
									$data_save['status']     = 1;
									$data_save['role_id']    = 2;
									
									//echo '<pre>'; print_r($data_save); die; 
									
									$user = User::create($data_save); 
									
									if($user) {
									
										$token = bin2hex(openssl_random_pseudo_bytes(20));
										$user_link = Config::get('constants.SITE_URL') .'active-profile/'. $token;
										User::where('id', $user->id)->update(array('varify_hash' => $token));
									
										$signUpMail = DB::table('templates')->where('slug', 'user-registration')->first();
										
										if($signUpMail){
										
											$usr_name		= $user->first_name." ".$user->last_name;
											$email			= $user->email; 
											$site_name 		= Session::get('SiteValue.site_name');
											$admin_email	= Session::get('SiteValue.admin_email'); 
											$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{LINK}', '{SITE}'), array($usr_name, $email, Input::get('register_password'), $user_link, $site_name), $signUpMail->content);
											$subject		= $signUpMail->subject;
											
											/*
											Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
												$message->from($admin_email, $site_name);
												$message->to($email, $usr_name)->subject($subject);
											});  */
										} 
										
										$register_password = Input::get('register_password');
										if (Auth::attempt(array('email'=>$email, 'password'=>$register_password, 'status'=>1, 'role_id'=>2),true)) {
										
											//echo '<pre>'; print_r($get_form_data); die; 
											$get_form_data = Session::get('advertiseadd.data');
											
											if(!empty($get_form_data)) {
											
												$post_data = $get_form_data;
												
												$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
												$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
												
												if(isset($post_data['amenitie_id'])) {
													unset($post_data['amenitie_id']);
												}
												
												if(isset($post_data['roomArr'])) {
													unset($post_data['roomArr']);
												} 
												
												$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
												if(!empty($misc_Arr)){
													$post_data['misc'] = join(',',$misc_Arr);
												}
												$post_data['user_id'] = Auth::id();
												$post_data['status']  = 1;
												
												$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
												$post_data['ad_type'] = $ad_type;
												
												$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
												if($my_email) {
													$post_data['email'] = $my_email;
												} 
												
												$projects = Property::create($post_data);  
												
												if($projects){
												
													$order_num = sprintf("HM-%007d", $projects->id);
													Property::where('id', $projects->id)->update(array('order_number' => $order_num));
												
													// Save Room Data
													if(!empty($get_room_arr)){
														foreach($get_room_arr as $get_room_val){
														
															$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
															$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
															if(!empty($amenitie_id)) {
																$amenitie_id = join(',',$amenitie_id);
															}
															$get_room_val['amenities_ids'] = $amenitie_id;
															$get_room_val['room_size'] = $room_size_type;
															$get_room_val['property_id'] = $projects->id; 
															AdRoom::create($get_room_val);
														}
													} 
													
													// Save Room Data
													if(!empty($amenitie_id_arr)){
														foreach($amenitie_id_arr as $amenitie_val){
															$amenitie_val_save = array();
															$amenitie_val_save['amenitie_id'] = $amenitie_val;
															$amenitie_val_save['property_id'] = $projects->id;  
															AdAmenitie::create($amenitie_val_save);
														}
													}
													
													$add_url     = URL::to('details/'.$projects->id);
													$add_id	     = $order_num;
													$add_title	 = $projects->title;
													
													$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
													if($signUpMail){
														$usr_name		= $user->first_name." ".$user->last_name;
														$email			= $user->email; 
														$site_name 		= Session::get('SiteValue.site_name');
														$admin_email	= Session::get('SiteValue.admin_email'); 
														$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
														$subject		= $signUpMail->subject;
														/*
														Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
															$message->from($admin_email, $site_name);
															$message->to($email, $usr_name)->subject($subject);
														});  */
													}  
													
													Session::forget('advertiseadd');
													return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
												}
											}  
										}
									
									} else { 
										Session::flash('errormessage', 'User could not be register. Please correct errors.');
										return Redirect::to('advertise/'.$slug);
									}  
								}
							} 
						}						
					} else {
						Session::put('advertiseadd.step',$form_step);
						Session::put('advertiseadd.data',Input::all());
					}
					return Redirect::to('advertise/'.$slug);
				}
			}
		
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			$nationality = DB::table('countries')->orderBy('name','ASC')->lists('name','id');
			
			return View::make('frontend.properties.advertise_add',compact('amenities','languages','nationality','get_form_step','get_form_data'));
			
		}  
		
		
		
		public function advertise_action($slug=null) {  
		
			$get_form_data = Session::get('advertiseadd');
			
			//echo 'get_form_data<pre>'; print_r($get_form_data); die; 
			
			if(!Session::has('advertiseadd.data')) {
				Session::flash('errormessage', 'Advertise could not be added, Please correct errors');
				return Redirect::to('advertise/'.$slug);
			} 
			
			if(!empty($get_form_data)) {
			
				$post_data = $get_form_data;
				
				$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
				$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
				
				if(isset($post_data['amenitie_id'])) {
					unset($post_data['amenitie_id']);
				}
				
				if(isset($post_data['roomArr'])) {
					unset($post_data['roomArr']);
				} 
				
				$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
				if(!empty($misc_Arr)){
					$post_data['misc'] = join(',',$misc_Arr);
				}
				$post_data['user_id'] = Auth::id();
				
				$ad_type = Config::get('constants.ADVERTISE_TYPE_NUMBER.'.$slug);
				$post_data['ad_type'] = $ad_type;
				
				$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
				if($my_email) {
					$post_data['email'] = $my_email;
				} 
				$post_data['status']  = 1;
				
				$projects = Property::create($post_data);  
				
				if($projects){
				
					$order_num = sprintf("HM-%007d", $projects->id);
					Property::where('id', $projects->id)->update(array('order_number' => $order_num));
				
					//echo '<pre>'; print_r($post_data); die; 
				
					// Save Room Data
					if(!empty($get_room_arr)){
						foreach($get_room_arr as $get_room_val){
						
							$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
							$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
							if(!empty($amenitie_id)) {
								$amenitie_id = join(',',$amenitie_id);
							}
							$get_room_val['amenities_ids'] = $amenitie_id;
							$get_room_val['room_size'] = $room_size_type;
							$get_room_val['property_id'] = $projects->id; 
							AdRoom::create($get_room_val);
						}
					} 
					
					// Save Room Data
					if(!empty($amenitie_id_arr)){
						foreach($amenitie_id_arr as $amenitie_val){
							$amenitie_val_save = array();
							$amenitie_val_save['amenitie_id'] = $amenitie_val;
							$amenitie_val_save['property_id'] = $projects->id;  
							AdAmenitie::create($amenitie_val_save);
						}
					}

					
					
					$add_url     = URL::to('details/'.$projects->id);
					$add_id	     = $order_num;
					$add_title	 = $projects->title;
					
					$signUpMail = DB::table('templates')->where('slug', 'property-add')->first();
					$user = DB::table('users')->where('id', $projects->user_id)->first();
					
					//echo '<pre>'; print_r($user)
					
					if($signUpMail){
						$usr_name		= $user->first_name." ".$user->last_name;
						$email			= $user->email; 
						$site_name 		= Session::get('SiteValue.site_name');
						$admin_email	= Session::get('SiteValue.admin_email'); 
						$message 		= str_replace(array('{NAME}', '{EMAIL}', '{PASSWORD}', '{SITE}', '{ADD_URL}', '{AD_ID}', '{AD_TITLE}'), array($usr_name, $email, Input::get('register_password'), $site_name, $add_url, $add_id, $add_title), $signUpMail->content);
						$subject		= $signUpMail->subject;
						
						Mail::send('frontend.emails.my_email', array('data'=>$message), function($message) use ($subject,$usr_name,$email, $site_name, $admin_email){
							$message->from($admin_email, $site_name);
							$message->to($email, $usr_name)->subject($subject);
						}); 
					}  
				
					Session::forget('advertiseadd');
					return Redirect::to('advertise-success/'.$projects->id)->with('message', 'Advertise has been added successfully!');
					
				}
			
			} 
		}
		
		
		public function advertise_success($id=null){
			$data = Property::find($id);
			return View::make('frontend.properties.advertise_success',compact('data'));
		}
		
		
		
		 
		
		public function ads_edit($id=null) {  
		
			$data = Property::find($id);
			if(empty($data) || $data->user_id!=Auth::id()) {
				return Redirect::to('/my-ads')->with('errormessage', 'Oops ! Something went wrong, please try again.');
			}  
			
			if(!empty($_POST)){ 
			
				$validator = Property::validate_front_edit(Input::all(),$data->ad_type);
				if($validator->fails()) {
					Session::flash('errormessage', 'Advertise could not be added, Please correct errors');
					return Redirect::to('ads-edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {
				
					$room_arr = Input::get('roomArr');
					
					if(!empty($room_arr)) {
					
						$rules = array();
						$message = array();
						
						foreach($room_arr as $k=>$room_val){
						
							$fieldArr = array();
							
							$available_type = isset($room_val['available_type'])?$room_val['available_type']:'';
							if(empty($available_type)){
								//$fieldArr[] = 'available_type';
							}
							
							$room_cost = isset($room_val['room_cost'])?$room_val['room_cost']:'';
							if(empty($room_cost)){
								$fieldArr[] = 'room_cost';
							}
							
							$room_cost_type = isset($room_val['room_cost_type'])?$room_val['room_cost_type']:'';
							if(empty($room_cost_type)){
								$fieldArr[] = 'room_cost_type';
							}
							
							$room_size_type = isset($room_val['room_size_type'])?$room_val['room_size_type']:'';
							if(empty($room_size_type)){
								$fieldArr[] = 'room_size_type';
							}
							 
							if(!empty($fieldArr)) { 
								foreach($fieldArr as $val) { 
									$rules = array_add($rules, 'roomArr['.$k.']['.$val.']', 'required');
									$message = array_add($message, 'roomArr['.$k.']['.$val.'].required', 'This field is required.');
								} 
							}
						}
						
						$message = array_dot($message);
						$validator = Validator::make(Input::all(), $rules, $message); 
						if($validator->fails()) {
							Session::flash('errormessage', 'Advertise could not be added, Please correct errors');
							return Redirect::to('ads-edit/'.$id)->withErrors($validator)->withInput(Input::all());
						}
						
					}   
				 
				
					$post_data = Input::all();
					
					$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
					$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
					
					if(isset($post_data['amenitie_id'])) {
						unset($post_data['amenitie_id']);
					}
					
					if(isset($post_data['roomArr'])) {
						unset($post_data['roomArr']);
					} 
					
					$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
					if(!empty($misc_Arr)){
						$post_data['misc'] = join(',',$misc_Arr);
					} else {
						$post_data['misc'] = null;
					}
					
					//echo '<pre>'; print_r($misc_Arr); die; 
					
					$post_data['is_dss'] = isset($post_data['is_dss'])?1:0;
					$post_data['short_term'] = isset($post_data['short_term'])?1:2;
					$post_data['is_fees_apply'] = isset($post_data['is_fees_apply'])?1:2;
					$post_data['is_buddy_ups'] = isset($post_data['is_buddy_ups'])?1:2;
					$my_email = isset($post_data['my_email'])?$post_data['my_email']:'';
					if($my_email) {
						$post_data['email'] = $my_email;
					} 
					
					//echo '<pre>'; print_r($post_data); die; 
					
					$projects  = $data->update($post_data);  
					
					if($projects){
					
						$order_num = sprintf("HM-%007d", $data->id);
						Property::where('id', $data->id)->update(array('order_number' => $order_num));
					
						// Save Room Data
						if(!empty($get_room_arr)){
						
							AdRoom::where('property_id', $data->id)->delete();
						
							foreach($get_room_arr as $get_room_val){
							
								$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
								$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
								if(!empty($amenitie_id)) {
									$amenitie_id = join(',',$amenitie_id);
								}
								$get_room_val['amenities_ids'] = $amenitie_id;
								$get_room_val['room_size'] = $room_size_type;
								$get_room_val['property_id'] = $data->id; 
								AdRoom::create($get_room_val);
							}
						} 
						
						// Save Room Data
						if(!empty($amenitie_id_arr)){
							AdAmenitie::where('property_id', $data->id)->delete();
							foreach($amenitie_id_arr as $amenitie_val){
								$amenitie_val_save = array();
								$amenitie_val_save['amenitie_id'] = $amenitie_val;
								$amenitie_val_save['property_id'] = $data->id;  
								AdAmenitie::create($amenitie_val_save);
							}
						}
						return Redirect::to('my-ads')->with('message', 'Ad has been updated successfully!');
					} else {
						Session::flash('errormessage', 'Ad could not be updated. Please correct errors.');
						return Redirect::to('ads-edit/'.$id);
					}  
				}
			}
		
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			$nationality = DB::table('countries')->orderBy('name','ASC')->lists('name','id');
			$get_form_step = '';
			return View::make('frontend.properties.ads_edit',compact('amenities','languages','nationality','data','get_form_step'));
			
		} 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function index(){ 
			return View::make('frontend.pages.index');
		}  
		
		/*--------- Languages --------*/
		
		public function admin_index() {
				
			$filters = array();
			$data =  Property::sortable();
			$search_sess = array();
			
			if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
				$_POST = Session::get('pagesearch');
			}else{
				Session::forget('pagesearch');
			} 
			
			if(! empty($_POST)){
				if(isset($_POST['title']) and $_POST['title']!=''){
					$title = $_POST['title'];
					$data = $data->where('properties.title', 'like','%'.trim( $title).'%');
					$search_sess['title'] = $title;
				}
				
				if(isset($_POST['status']) and $_POST['status']!=''){
					$status = $_POST['status'];
					$data = $data->where('properties.status', $status);
					$search_sess['status'] = $status;
				}
				Session::put('pagesearch',$search_sess) ; 
			}else{
				$_POST = Session::forget('pagesearch');
			}
			
			
			$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.properties.admin_index')->with(compact('data'));
	 
		}
		
		// Add Property
		
		public function admin_add(){
			 
			if(!empty($_POST)){
			
				//echo '<pre>'; print_r(Input::all()); die; 
			
				$validator = Property::validate(Input::all());
				if($validator->fails()) {
					Session::flash('errormessage', 'Property could not be added, Please correct errors');
					return Redirect::to('admin/properties/add')->withErrors($validator)->withInput(Input::all());
				} else {
				
					$room_arr = Input::get('roomArr');
					
					if(!empty($room_arr)){
					
						$rules = array();
						$message = array();
					
						foreach($room_arr as $k=>$room_val){
						
							$fieldArr = array();
							
							$available_type = isset($room_val['available_type'])?$room_val['available_type']:'';
							if(empty($available_type)){
								$fieldArr[] = 'available_type';
							}
							
							$room_cost = isset($room_val['room_cost'])?$room_val['room_cost']:'';
							if(empty($room_cost)){
								$fieldArr[] = 'room_cost';
							}
							
							$room_cost_type = isset($room_val['room_cost_type'])?$room_val['room_cost_type']:'';
							if(empty($room_cost_type)){
								$fieldArr[] = 'room_cost_type';
							}
							
							$room_size_type = isset($room_val['room_size_type'])?$room_val['room_size_type']:'';
							if(empty($room_size_type)){
								$fieldArr[] = 'room_size_type';
							}
							 
							if(!empty($fieldArr)) { 
								foreach($fieldArr as $val) { 
									$rules = array_add($rules, 'roomArr['.$k.']['.$val.']', 'required');
									$message = array_add($message, 'roomArr['.$k.']['.$val.'].required', 'This field is required.');
								} 
							}
						}
						
						$message = array_dot($message);
						$validator = Validator::make( Input::all(), $rules, $message); 
						if ($validator->fails()) {
							Session::flash('errormessage', 'Property could not be added, Please correct errors');
							return Redirect::to('admin/properties/add')->withErrors($validator)->withInput(Input::all());
						}
						
					} 
					
					$post_data = Input::all();
					
					$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
					$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
					
					if(isset($post_data['amenitie_id'])) {
						unset($post_data['amenitie_id']);
					}
					
					if(isset($post_data['roomArr'])) {
						unset($post_data['roomArr']);
					} 
					
					$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
					if(!empty($misc_Arr)){
						$post_data['misc'] = join(',',$misc_Arr);
					}
					$post_data['user_id'] = Auth::id();
					
					
					$projects = Property::create($post_data); 
				 	
					if($projects){
					
						// Save Room Data
						if(!empty($get_room_arr)){
							foreach($get_room_arr as $get_room_val){
							
								$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
								$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
								if(!empty($amenitie_id)) {
									$amenitie_id = join(',',$amenitie_id);
								}
								$get_room_val['amenities_ids'] = $amenitie_id;
								$get_room_val['room_size'] = $room_size_type;
								$get_room_val['property_id'] = $projects->id; 
								AdRoom::create($get_room_val);
							}
						} 
						
						// Save Room Data
						if(!empty($amenitie_id_arr)){
							foreach($amenitie_id_arr as $amenitie_val){
								$amenitie_val_save = array();
								$amenitie_val_save['amenitie_id'] = $amenitie_val;
								$amenitie_val_save['property_id'] = $projects->id;  
								AdAmenitie::create($amenitie_val_save);
							}
						} 
						
						return Redirect::to('admin/properties')->with('message', 'Property has been added successfully!');
					}else{
						return Redirect::to('admin/properties/add')->with('errormessage', 'Property could not be added, please try again!!');
					}
				}
			}
			
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			return View::make('backend.properties.admin_add',compact('amenities','languages'));
		}
		
		
		public function admin_get_room_html($id = null){
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$room_rent_type = Input::get('room_rent_type');
			$html = View::make('backend.properties.admin_get_room_html',compact('room_rent_type','amenities'));
			echo $html;
		}
		
		
		// Edit Property
		public function admin_edit($id = null){
		
			$data = Property::find($id);
			
			if(! empty($_POST)){
				$validator = Property::validate(Input::all());
				if($validator->fails() ) {
					Session::flash('errormessage', 'Property could not be updated, Please correct errors');
					return Redirect::to('admin/properties/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else { 
				
					$room_arr = Input::get('roomArr');
					
					if(!empty($room_arr)) {
					
						$rules = array();
						$message = array();
						
						foreach($room_arr as $k=>$room_val){
						
							$fieldArr = array();
							
							$available_type = isset($room_val['available_type'])?$room_val['available_type']:'';
							if(empty($available_type)){
								$fieldArr[] = 'available_type';
							}
							
							$room_cost = isset($room_val['room_cost'])?$room_val['room_cost']:'';
							if(empty($room_cost)){
								$fieldArr[] = 'room_cost';
							}
							
							$room_cost_type = isset($room_val['room_cost_type'])?$room_val['room_cost_type']:'';
							if(empty($room_cost_type)){
								$fieldArr[] = 'room_cost_type';
							}
							
							$room_size_type = isset($room_val['room_size_type'])?$room_val['room_size_type']:'';
							if(empty($room_size_type)){
								$fieldArr[] = 'room_size_type';
							}
							 
							if(!empty($fieldArr)) { 
								foreach($fieldArr as $val) { 
									$rules = array_add($rules, 'roomArr['.$k.']['.$val.']', 'required');
									$message = array_add($message, 'roomArr['.$k.']['.$val.'].required', 'This field is required.');
								} 
							}
						}
						
						$message = array_dot($message);
						$validator = Validator::make( Input::all(), $rules, $message); 
						if($validator->fails()) {
							Session::flash('errormessage', 'Property could not be added, Please correct errors');
							return Redirect::to('admin/properties/edit/'.$id)->withErrors($validator)->withInput(Input::all());
						}
						
					} 
					
					$post_data = Input::all();
					
					//echo '<pre>'; print_r($post_data); die; 
					
					$amenitie_id_arr = isset($post_data['amenitie_id'])?$post_data['amenitie_id']:'';
					$get_room_arr    = isset($post_data['roomArr'])?$post_data['roomArr']:'';
					
					if(isset($post_data['amenitie_id'])) {
						unset($post_data['amenitie_id']);
					}
					
					if(isset($post_data['roomArr'])) {
						unset($post_data['roomArr']);
					} 
					
					$misc_Arr = isset($post_data['misc'])?$post_data['misc']:'';
					if(!empty($misc_Arr)){
						$post_data['misc'] = join(',',$misc_Arr);
					} else {
						$post_data['misc'] = null;
					}
					
					//echo '<pre>'; print_r($post_data); die; 
				
					$save_data  = $data->update($post_data); 
					if($save_data){
					
						DB::table('ad_amenities')->where('property_id',$id)->delete();
						DB::table('ad_rooms')->where('property_id',$id)->delete();
					
						// Save Room Data
						if(!empty($amenitie_id_arr)){
							foreach($amenitie_id_arr as $amenitie_val){
								$amenitie_val_save = array();
								$amenitie_val_save['amenitie_id'] = $amenitie_val;
								$amenitie_val_save['property_id'] = $id;  
								AdAmenitie::create($amenitie_val_save);
							}
						} 
					 
					
						// Save Room Data
						if(!empty($get_room_arr)){
							foreach($get_room_arr as $get_room_val){
							
								$amenitie_id = isset($get_room_val['amenitie_id'])?$get_room_val['amenitie_id']:null;
								$room_size_type = isset($get_room_val['room_size_type'])?$get_room_val['room_size_type']:null;
								$available_type = isset($get_room_val['available_type'])?$get_room_val['available_type']:null;
								if(!empty($amenitie_id)) {
									$amenitie_id = join(',',$amenitie_id);
									unset($get_room_val['amenitie_id']);
								}
								
								$get_room_val['amenities_ids'] = $amenitie_id;
								$get_room_val['room_size'] = $room_size_type;
								$get_room_val['property_id'] = $id;
								$get_room_val['is_available'] = $available_type;
								
								//echo '<pre>'; print_r($get_room_val); die; 
								
								AdRoom::create($get_room_val);
							}
						}  
						
					
						return Redirect::to('admin/properties')->with('message', 'Property has been updated successfully!');
					}else{
						return Redirect::to('admin/properties/edit/'.$id)->with('errormessage', 'Property could not be updated, please try again!!');
					}
				}
			}
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			return View::make('backend.properties.admin_edit')->with(compact('data','amenities','languages'));
		}	
		
		
		// Status Update Property
		public function admin_status($id){
		 
			$data = Property::find($id);
			if($data->status==1){
				$data->status = 0;
			} else {
				$data->status = 1;
			} 
			if ($data->save()){
				Session::flash('message', 'Status has been changed successfully!');
				return Redirect::to('admin/properties');
			}
			return Redirect::to('admin/properties');
	 
		}
		
		// Remove Property
		public function admin_remove($id =null){
		 
			$data = Property::find($id);
			if($data->delete()){
				DB::table('ad_amenities')->where('property_id',$id)->delete();
				DB::table('ad_rooms')->where('property_id',$id)->delete();
				Session::flash('message', 'Property has been removed successfully!');
				return Redirect::to('admin/properties');
			}else{
				Session::flash('errormessage', 'Property could not be removed, please try again!');
				return Redirect::to('admin/properties');
			}
			 
		} 
		
	}