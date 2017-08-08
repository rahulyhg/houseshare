<?php
    class BlogController extends BaseController {  
	
		public function __construct(){
			$this->beforeFilter(function(){
				if(Auth::guest())
					return Redirect::to('/');
	
			},['except' => ['index', 'view', 'view_total_comments']]);
		
		
		
		}
		
		public function index($category_id=null) {
		
			$data  = Blog::sortable();
			
			if($category_id) {
				$data = $data->where('blogs.subject_id',$category_id); 
			}
			
			$data = $data->select('blogs.*', 'users.first_name','users.last_name','users.photo', DB::raw("(SELECT COUNT(id) as count FROM blog_comments as c where c.blog_id=blogs.id) as blog_count"));
			$data = $data->leftjoin('users','users.id','=','blogs.user_id')->where('blogs.status', 1); 
			$data = $data->orderBy('blogs.created_at','desc')
					->paginate(Config::get('constants.FRONT_PAGINATION'));
					
			return View::make('frontend/blogs/index', compact('data'));
		}
		
		
		public function view($slug = null){
		
			$data = DB::table('blogs')->leftjoin('users','users.id','=','blogs.user_id')
					->leftjoin('subjects','subjects.id','=','blogs.subject_id')->where('blogs.status', 1)->where('blogs.slug', $slug)
					->select('blogs.*','users.first_name','users.last_name', 'users.photo', 'subjects.name as sub_name', DB::raw("(SELECT COUNT(id) as count FROM blog_comments as c where c.blog_id=blogs.id) as blog_count"))->first();
			
			$comments = DB::table('blog_comments')->where('blog_comments.blog_id',$data->id)->where('blog_comments.status', 1)
						->leftjoin('users','users.id','=','blog_comments.user_id')
						->select('blog_comments.*', 'users.photo', 'users.first_name', 'users.last_name',  'users.role_id')->orderBy('blog_comments.created_at','desc')
						->get();	
						
			
			//echo '<pre>'; print_r($comments); die; 
				
			return View::make('frontend/blogs/view', compact('data', 'comments'));	
		}
		
		
		public function view_total_comments(){
			$blog_id 		= Input::get('blog_id');
			$total_comment	= Input::get('total_comment');
			
			$comments = DB::table('blog_comments')->where('blog_comments.blog_id',$blog_id)->where('blog_comments.status', 1)
							->leftjoin('users','users.id','=','blog_comments.user_id')
							->select('blog_comments.*','users.photo', 'users.first_name', 'users.last_name',  'users.role_id')->orderBy('blog_comments.created_at','desc')->get();
			
			$total_new_comment  = count($comments);
			return View::make('frontend.blogs.view_total_comments',compact('comments', 'total_new_comment'));
		}
		
		
		public function submit_comment(){
		
			$dataArr   	= Input::all();
			$blog_id 	= Input::get('blog_id');
			$dataArr['user_id'] = Auth::id();
			$dataArr['status'] = 1;
			$flash_msg	= '';
			$data_arr	= array();
			
			if(Input::get('blog_id')){
			
				$blog_comment = BlogComment::create($dataArr);
				$flash_msg = '<div id="alert_msg" class="alert alert-success show_error_msg"><button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button><span id="myData">'.Lang::get('ControllerMessage.comment_submiit_success_msg').'</span></div>';
				$data_arr['flash_msg'] 	= $flash_msg;
				
			
				$data = DB::table('blogs')->leftjoin('users','users.id','=','blogs.user_id')
					->leftjoin('subjects','subjects.id','=','blogs.subject_id')->where('blogs.status', 1)->where('blogs.id', $blog_id)
					->first(array('blogs.*','users.first_name','users.last_name', 'subjects.name as sub_name'));
				
				$comments = DB::table('blog_comments')->where('blog_comments.blog_id',$blog_id)->where('blog_comments.status', 1)
							->leftjoin('users','users.id','=','blog_comments.user_id')
							->select('blog_comments.*', 'users.photo', 'users.first_name', 'users.last_name',  'users.role_id')->orderBy('blog_comments.created_at','desc')
							->get();
				
				return View::make('frontend.blogs.add_comment', compact('data', 'comments', 'data_arr'));  
			}
		}
		
		/*--------- Languages --------*/
	/*	
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
		*/
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
		
		
		
		
		
		
		
		
		
		/*------------- Blog Category List ----------------*/
		
		public function admin_categories() {
				
			$filters = array();
			$data =  BlogCategory::sortable();
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
			return View::make('backend.blogs.admin_categories')->with(compact('data'));
	 
		}
		
		
		
		// Status Update Property
		public function admin_category_status($id){
		 
			$data = BlogCategory::find($id);
			if($data->status==1){
				$data->status = 0;
			} else {
				$data->status = 1;
			} 
			if ($data->save()){
				Session::flash('message', 'Status has been changed successfully!');
				return Redirect::to('admin/blogs/categories');
			}
			return Redirect::to('admin/blogs/categories');
	 
		}
		
		
		
		
		// Edit Property
		public function admin_category_edit($id = null){
		
		//die;
			$data = BlogCategory::find($id);
			
			if(! empty($_POST)){
				$validator = BlogCategory::validate(Input::all());
				if($validator->fails() ) {
					Session::flash('errormessage', 'Property could not be updated, Please correct errors');
					return Redirect::to('admin/blogs/category-edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {  
					$post_data = Input::all(); 
					$save_data  = $data->update($post_data); 
					if($save_data){ 
						return Redirect::to('admin/blogs/categories')->with('message', 'Category has been updated successfully!');
					}else{
						return Redirect::to('admin/blogs/categories'.$id)->with('errormessage', 'Category could not be updated, please try again!!');
					}
				}
			}
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			return View::make('backend.blogs.admin_category_edit')->with(compact('data','amenities','languages'));
		}	
		
		
		// Remove Blog Category
		public function admin_remove_category($id =null){
		 
			$data = BlogCategory::find($id);
			if($data->delete()){
				
				
				Session::flash('message', 'Category has been removed successfully!');
				return Redirect::to('admin/blogs/categories');
			}else{
				Session::flash('errormessage', 'Category could not be removed, please try again!');
				return Redirect::to('admin/blogs/categories');
			}
			 
		} 
		
		
public function admin_category_add(){
			 
			if(!empty($_POST)){
			
				
				$validator = BlogCategory::validate(Input::all());
				if($validator->fails()) { 
					Session::flash('errormessage', 'Category could not be added, Please correct errors');
					return Redirect::to('admin/blogs/categories/add')->withErrors($validator)->withInput(Input::all());
				} else {
				
					 
					$post_data = Input::all();
					

					
					

					
					$projects = BlogCategory::create($post_data); 
				 	
					
						return Redirect::to('admin/blogs/categories')->with('message', 'Category has been save successfully.');
					
				}
			}
			
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			return View::make('backend.blogs.admin_category_add',compact('amenities','languages'));
		}
		
		
	/*	public function admin_index() {
				
			$filters = array();
			$data =  BlogCategory::sortable();
			$search_sess = array();
			
			if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
				$_POST = Session::get('pagesearch');
			}else{
				Session::forget('pagesearch');
			} 
			
			if(! empty($_POST)){
				if(isset($_POST['name']) and $_POST['name']!=''){
					$name = $_POST['name'];
					$data = $data->where('categories.title', 'like','%'.trim( $name).'%');
					$search_sess['name'] = $name;
				}
				
				if(isset($_POST['status']) and $_POST['status']!=''){
					$status = $_POST['status'];
					$data = $data->where('categories.status', $status);
					$search_sess['status'] = $status;
				}
				Session::put('pagesearch',$search_sess) ; 
			}else{
				$_POST = Session::forget('pagesearch');
			}
			
			
			$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.blogs.admin_index')->with(compact('data'));
	 
		}
		
		*/
		public function admin_index_blog() {
				
			$filters = array();
			$data =  Blog::sortable();
			$search_sess = array();
			
			if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
				$_POST = Session::get('pagesearch');
			}else{
				Session::forget('pagesearch');
			} 
			
			if(! empty($_POST)){
				if(isset($_POST['title']) and $_POST['title']!=''){
					$title = $_POST['title'];
					$data = $data->where('blogs.title', 'like','%'.trim( $title).'%');
					$search_sess['title'] = $title;
				}
				
				if(isset($_POST['status']) and $_POST['status']!=''){
					$status = $_POST['status'];
					$data = $data->where('blogs.status', $status);
					$search_sess['status'] = $status;
				}
				Session::put('pagesearch',$search_sess) ; 
			}else{
				$_POST = Session::forget('pagesearch');
			}
			
			
			$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.blogs.admin_index_blog')->with(compact('data'));
	 
		}
		
		
		// Blog Status Update Property
		public function admin_blog_status($id){
		 
			$data = Blog::find($id);
			if($data->status==1){
				$data->status = 0;
			} else {
				$data->status = 1;
			} 
			if ($data->save()){
				Session::flash('message', 'Status has been changed successfully!');
				return Redirect::to('admin/blogs');
			}
			return Redirect::to('admin/blogs');
	 
		}
		
		
		// Remove Blog 
		public function admin_remove_blogs($id =null){
		 
			$data = Blog::find($id);
			if($data->delete()){
				
				
				Session::flash('message', 'Blog has been removed successfully!');
				return Redirect::to('admin/blogs');
			}else{
				Session::flash('errormessage', 'Blog could not be removed, please try again!');
				return Redirect::to('admin/blogs');
			}
			 
		} 
	

	// Edit Blog
		public function admin_blog_edit($id = null){
		
			$data = Blog::find($id);
			
			if(! empty($_POST)){
				$validator = Blog::validate(Input::all());
				if($validator->fails() ) {
					Session::flash('errormessage', 'Blog could not be updated, Please correct errors');
					return Redirect::to('admin/blogs/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {  
					$post_data = Input::all(); 
					$save_data  = $data->update($post_data); 
					if($save_data){ 
						return Redirect::to('/admin/blogs')->with('message', 'Blog has been updated successfully!');
					}else{
						return Redirect::to('/admin/blogs'.$id)->with('errormessage', 'Blog could not be updated, please try again!!');
					}
				}
			}
			$amenities = DB::table('amenities')->orderBy('name','ASC')->lists('name','id');
			$languages = DB::table('languages')->orderBy('name','ASC')->lists('name','id');
			return View::make('backend.blogs.admin_blog_edit')->with(compact('data','amenities','languages'));
		}	
		

	public function admin_index() {
				
			$filters = array();
			$data =  Blog::sortable();
			$search_sess = array();
			
			if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
				$_POST = Session::get('pagesearch');
			}else{
				Session::forget('pagesearch');
			} 
			
			if(! empty($_POST)){
				if(isset($_POST['name']) and $_POST['name']!=''){
					$name = $_POST['name'];
					$data = $data->where('blogs.title', 'like','%'.trim( $name).'%');
					$search_sess['name'] = $name;
				}
				
				if(isset($_POST['status']) and $_POST['status']!=''){
					$status = $_POST['status'];
					$data = $data->where('blogs.status', $status);
					$search_sess['status'] = $status;
				}
				Session::put('pagesearch',$search_sess) ; 
			}else{
				$_POST = Session::forget('pagesearch');
			}
			
			
			$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.blogs.admin_index_blog')->with(compact('data'));
	 
		}
		
		
		
		
		
		
		
		
		
		
		
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
