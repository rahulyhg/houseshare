<?php 
	
class MessageController extends BaseController {  
	
	public function __construct(){
		$this->beforeFilter(function(){
			if(Auth::guest())
				return Redirect::to('/');
		},['except' => ['']]);
	}
	
  	public function index(){ 
		
		$data =  Message::sortable()->leftjoin('users', 'users.id', '=', 'messages.sender_id'); 
		if (Session::has('fcoursesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
			$_POST = Session::get('fcoursesearch');
		}else{
			Session::forget('fcoursesearch');
		}
		
		if(! empty($_POST)){ 
			if(isset($_POST['keyword']) and $_POST['keyword'] !=''){
				$keyword = $_POST['keyword'];
				Session::put('fcoursesearch.keyword', $keyword);
				
				$data = $data->where(function($query) use($keyword){
					$data =  $query->where('messages.messages_title', 'like', trim($keyword)."%")
							->orWhere('messages.messages_content', 'like', trim($keyword)."%") 
							->orWhere('users.email', 'like', trim($keyword)."%")
							->orWhere('users.last_name', 'like', trim($keyword)."%")
							->orWhere('users.first_name', 'like', trim($keyword)."%");
						}); 
			} 
		} 
		$data = $data->select('messages.*', 'users.first_name', 'users.last_name')->where('messages.receiver_id', Auth::id())->where('messages.istrash', 0)->where('messages.receiver_delete', 0)->orderBy('messages.updated_at', 'DESC')->paginate(Config::get('constants.FRONT_PAGINATION')); 
		  
		return View::make('frontend.messages.index', compact('data'));
	}
	
	
	public function important (){
	
		$join_groups = DB::table('join_groups')->where('user_id', Auth::id())->count();
		if($join_groups==0){
			return Redirect::to('/groups')->with('errormessage', 'Please create first group or join, please try again.');
		}  
		
		$data =  Message::sortable()->leftjoin('users', 'users.id', '=', 'messages.sender_id'); 
		if (Session::has('fcoursesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
			$_POST = Session::get('fcoursesearch');
		}else{
			Session::forget('fcoursesearch');
		}
		
		if(! empty($_POST)){ 
			if(isset($_POST['keyword']) and $_POST['keyword'] !=''){
				$keyword = $_POST['keyword'];
				Session::put('fcoursesearch.keyword', $keyword);
				
				$data = $data->where(function($query) use($keyword){
					$data =  $query->where('messages.messages_title', 'like', trim($keyword)."%")
							->orWhere('messages.messages_content', 'like', trim($keyword)."%") 
							->orWhere('users.email', 'like', trim($keyword)."%")
							->orWhere('users.username', 'like', trim($keyword)."%")
							->orWhere('users.first_name', 'like', trim($keyword)."%");
						}); 
			} 
		} 
		$data = $data->select('messages.*', 'users.id as user_id')->where('messages.receiver_id', Auth::id())->where('messages.istrash', 0)->where('messages.is_important', 1)->orderBy('messages.updated_at', 'DESC')->paginate(Config::get('constants.FRONT_PAGINATION')); 
		  
		return View::make('frontend.messages.important', compact('data'));
	}
	
	
  	public function send(){
		
		$data =  Message::sortable()->leftjoin('users', 'users.id', '=', 'messages.receiver_id'); 
		if (Session::has('fcoursesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
			$_POST = Session::get('fcoursesearch');
		}else{
			Session::forget('fcoursesearch');
		}
		
		if(! empty($_POST)){ 
			if(isset($_POST['keyword']) and $_POST['keyword'] !=''){
				$keyword = $_POST['keyword'];
				Session::put('fcoursesearch.keyword', $keyword);
				
				$data = $data->where(function($query) use($keyword){
					$data =  $query->where('messages.messages_title', 'like', trim($keyword)."%")
							->orWhere('messages.messages_content', 'like', trim($keyword)."%") 
							->orWhere('users.email', 'like', trim($keyword)."%")
							->orWhere('users.last_name', 'like', trim($keyword)."%")
							->orWhere('users.first_name', 'like', trim($keyword)."%");
						}); 
			} 
		} 
		$data = $data->select('messages.*', 'users.first_name', 'users.last_name')->where('messages.sender_delete', 0)->where('messages.sender_id', Auth::id())->where('messages.istrash', 0)->orderBy('messages.updated_at', 'DESC')->paginate(Config::get('constants.FRONT_PAGINATION')); 
		  
		return View::make('frontend.messages.send', compact('data'));
	}
	
	
  	public function compose($group_id=null,$message_id=null,$type=null){  
	
		$message  = DB::table('messages')->where('id', $message_id)->first(); 
	
		if(!empty($_POST)){
			$validator = Message::validate(Input::all());
			if ( $validator->fails() ) {
				Session::flash('errormessage', 'Message could not be send, Please correct errors');
				return Redirect::to('/compose')->withErrors($validator)->withInput(Input::except('file'));
			} else {
				
				$data = Input::except('file');
				
				$member_idArr = isset($data['user_id'])?$data['user_id']:array();
				
				if(!empty($member_idArr)){
				
					foreach($member_idArr as $member_id) { 
					 
						$data_save = array();
						$file = Input::file('file');
						if($file){
							$ext = strtolower(File::extension($file->getClientOriginalName()));
							$save_path = 'upload/messages';
							$filename = date("ymdhis") .'_'. rand(11111111111,9999999999).'.'.$ext;
							$upload_success = $file->move($save_path, $filename);
							$data_save['file']	= $filename;
						}  
						
						$data_save['parent_id']     = ($message)?$message->id:0; 
						$data_save['sender_id']     = Auth::user()->id;
						$data_save['receiver_id']   = $member_id;
						$data_save['messages_title']   = $data['subject'];
						$data_save['messages_content']   = $data['message']; 
						
						$message  = Message::create($data_save); 
						
					} 
					
					return Redirect::to('/messages')->with('message', 'Message has been send successfully');
					
				} else {
					return Redirect::to('/compose')->with('errormessage', 'Please select user, please try again.');
				} 
			}
		}   
		
			$member = User::select(
            DB::raw("CONCAT(first_name,' > ',email) AS name"),'id')
            ->where('status', 1)
            ->where('role_id','!=', 1)
			->orderBy('name','ASC')
            ->lists('name', 'id');
		
		 
		//echo '<pre>'; print_r($member); die; 
		
		return View::make('frontend.messages.compose', compact('member','message','type'));
	}	
	
	
  	public function important_is(){  
	
		$data = Input::all(); 
		
		$id = isset($data['id'])?$data['id']:'';
		$is_important = isset($data['is_important'])?$data['is_important']:''; 
		
		if($is_important){
			$is_important = 0;
		} else {
			$is_important = 1;
		} 
		
		Message::where('id',$id)->update(array('is_important' => $is_important)); 
		
		$important_count = DB::table('messages')->where('messages.receiver_id', Auth::id())->where('messages.istrash', 0)->where('messages.is_important', 1)->count();

		$result = array('type'=>'success','msg'=>$is_important,'important_count'=>$important_count);  
		return json_encode($result); 
	}
	
	
	public function download($id=null){
	
		$comment = Message::find($id);
		if(!empty($comment)) {
			$file_name = $comment->file; 
			if($file_name){
				$file = "upload/messages/" . $file_name ;
				if (file_exists($file)) {
					header('Content-Description: Download a File');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename="'.basename($file).'"');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					readfile($file);
					exit;
				}else{
					return Redirect::back()->with('message', 'File could not found.');
				}
			}
		}
		return Redirect::back()->with('message', 'File could not found.');
	} 
	
	public function delete_message(){ 
		$result = array();
		if(!empty($_POST)){  
			$data = Input::all();  
			$member_id = isset($data['member_id'])?$data['member_id']:'';
			$member_idArr = array();
			if($member_id){
				$member_idArr = explode(',',$member_id); 
				if($member_idArr){
					foreach($member_idArr as $member_id_val) {
						$get_first = DB::table('messages')->where('id', $member_id_val)->first(); 
						if($get_first->sender_id==Auth::id()) {
							DB::table('messages')->where('id', $member_id_val)->update(['sender_delete' => '1']); 
						} else {
							DB::table('messages')->where('id', $member_id_val)->update(['receiver_delete' => '1']); 
						}
					}
				} 
			}  
			$result = array('success'=>'Message has been delete successfully.');  
		} else {
			$result = array('error'=>'Oops ! Something went wrong, please try again.');  
		}
		echo json_encode($result); die; 
	} 	
	
	public function update_message(){ 
		$result = array();
		if(!empty($_POST)){  
			$data = Input::all();  
			$member_id = isset($data['member_id'])?$data['member_id']:''; 
			if($member_id){
				DB::table('messages')->where('id', $member_id)->update(['read_status' => '1']);  
			}  
			$result = array('success'=>'Message has been update successfully.');  
		} else {
			$result = array('error'=>'Oops ! Something went wrong, please try again.');  
		}
		echo json_encode($result); die; 
	} 
	
	
	
	public function select_user(){
		$user_name = Input::get('term'); 
		if($user_name=='')die; 
		$user_data =DB::table('users')->where('users.status', 1)->whereIn('users.role_id', array(3))
				->where(function($query) use($user_name){
					$query->where('users.first_name', 'like',trim($user_name).'%')
							->orWhere('users.username', 'like', trim($user_name).'%')
							->orWhere('users.email', $user_name);
						})->select('users.email', 'users.first_name', 'users.id')->get();
		$data = array();
		
		if($user_data){
			foreach($user_data as $val){
				$data[] = array(
					'label' => $val->first_name.' ('.$val->email.') ',
					'value' =>$val->first_name.' ('.$val->email.') ',
					'user_id' => $val->id
				);
			}
		}
		
		echo json_encode($data);
			flush();
			die;
	}

	 
	
	
	
}