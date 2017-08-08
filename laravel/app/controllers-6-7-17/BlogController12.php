<?php
	class BlogController extends BaseController {  
	
		public function __construct(){
			$this->beforeFilter(function(){
			
				if(Auth::guest())
				return Redirect::to('/login');
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
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		public function admin_index(){
			
			$blogs = Blog::sortable();
			$filters = array();
			$search_sess = array();
			
			if (Session::has('blogsearch') and isset($_GET['page']) and $_GET['page']>=1) {
				$_POST = Session::get('blogsearch');
			}
			
			if(! empty($_POST)){
				//echo $_POST['country_id']; die;
				if(isset($_POST['title']) and $_POST['title']!=''){
					$title = $_POST['title'];
					$filters[] =  array('field' => 'title', 'value' => $title);
				}
				
				
				if(isset($_POST['status']) and $_POST['status']!=''){
					$status = $_POST['status'];
					$filters[] =  array('field' => 'status', 'value' => $status);
				}
				
				
				if(isset($_POST['subject_id']) and $_POST['category_id']!=''){
					$category_id = $_POST['category_id'];
					$filters[] =  array('field' => 'category_id', 'value' => $category_id);
				}
				
				
				foreach ($filters as $filter) {
					if($filter['field'] == 'category_id' OR $filter['field'] == 'status'){
						$search_sess[$filter['field']] = (int)$filter['value'];	
						$blogs = $blogs->where('blogs.'.$filter['field'], '=', $filter['value']);
					}else if($filter['field'] == 'title'){
						$search_sess[$filter['field']] =  $filter['value'];	 		
						$blogs = $blogs->where('blogs.'.$filter['field'], 'like','%'.trim( $filter['value']).'%');
					}
				}
			}
			
			Session::put('blogsearch',$search_sess) ; 
			
			$data = $blogs->leftjoin('users','users.id','=','blogs.user_id')
				->leftjoin('subjects','subjects.id','=','blogs.subject_id')
				->select('blogs.*','users.first_name','users.last_name', 'subjects.name as sub_name')
				->orderBy('blogs.created_at','desc')
				->paginate(Config::get('constants.PAGINATION'));
			$categories = DB::table('subjects')->where('status',1)->lists('name','id');
			return View::make('backend.blogs.admin_index',compact('data', 'categories'));
		}
		
		
		
		
		public function admin_add(){
			if(! empty($_POST)){ 
				$validator = Blog::validate(Input::all());
					
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'Blog could not be created, please correct errors.');
					return Redirect::to('admin/blogs/add')->withErrors($validator)->withInput(Input::except('image'));
				} else {
					$data  				= Input::except('image');
					$data['user_id']  	= Auth::id();
					$file = Input::file('image'); 
					if($file){
						$ext = strtolower(File::extension($file->getClientOriginalName()));
						$name = date("ymdhis") .'_'. rand(1000, 9999) .'.'. $ext;
						$upload_success = $file->move('upload/blogs/', $name);
						$data['image'] = $name; 
					} 
					
					$blog 						= Blog::create($data);
				$value = Str::slug($data['title']);
					if ($blog){
						$id  = $blog->id;
						Blog::generateSlug($value, $id);
						return Redirect::to('admin/blogs')->with('message','Blog has been created successfully.');
					}else{
						Session::flash('errormessage', 'Oops something went wrong, please try again.');
						return Redirect::to('admin/blogs/add')->withInput(Input::except('image'));
					}
				}
			}
			
			return View::make('backend.blogs.admin_add');
		}
		
		
		
		public function admin_edit($id = null){
			$blog = Blog::leftjoin('subjects', 'blogs.subject_id', '=', 'subjects.id')->where('blogs.id', $id)->first(array('blogs.*', 'subjects.name as subject_name'));
			
			if(! empty($_POST)){ 
				$validator = Blog::validate(Input::all());
					
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'Blog could not be updated, please correct errors.');
					return Redirect::to('admin/blogs/edit/'.$id)->withErrors($validator)->withInput(Input::except('image'));
				} else {
					$data  				= Input::except('image');
					$data['user_id']  	= Auth::id();
					$file = Input::file('image'); 
					if($file){
						if($blog->image != "" and file_exists('upload/blogs/'.$blog->image)){
							unlink('upload/blogs/'.$blog->image);
						}
						
						$ext = strtolower(File::extension($file->getClientOriginalName()));
						$name = date("ymdhis") .'_'. rand(1000, 9999) .'.'. $ext;
						$upload_success = $file->move('upload/blogs/', $name);
						$data['image'] = $name; 
					} 
					$blog 						= Blog::find($id);
					$blogUpdate						= $blog->update($data);
				
					if ($blogUpdate){
						return Redirect::to('admin/blogs')->with('message','Blog has been updated successfully.');
					}else{
						Session::flash('errormessage', 'Oops something went wrong, please try again.');
						return Redirect::to('admin/blogs/edit/'.$id)->withInput(Input::except('image'));
					}
				}
			}
			
			return View::make('backend.blogs.admin_edit',compact('blog'));
		}
		
		
		
		public function admin_view($id = null){
			$data = DB::table('blogs')->where('blogs.id',$id)->leftjoin('users','users.id','=','blogs.user_id')
				->leftjoin('subjects','blogs.subject_id','=','subjects.id')
				->first(array('blogs.*','users.first_name','users.last_name','users.photo as user_photo','subjects.name as sub_name'));
			
			$comments = DB::table('blog_comments')->where('blog_comments.blog_id',$id)
							->leftjoin('users','users.id','=','blog_comments.user_id')->orderBy('blog_comments.created_at','desc')
							->select('blog_comments.*', 'users.photo', 'users.first_name', 'users.last_name')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.blogs.admin_view',compact('data','comments'));
		}
		
		
		
		public function admin_remove_comment($id = null){
			$blogComment  = BlogComment::find($id);
			$blog_id  = $blogComment->blog_id;
			if($blogComment->delete()){
				return Redirect::to('admin/blogs/view/'.$blog_id.'#blog_comments')->with('message', 'Blog comment has been removed successfully.');
			}else{
				return Redirect::to('admin/blogs/view/'.$blog_id.'#blog_comments')->with('errormessage', 'Oops ! Something went wrong, please try again.');
			}
		}
			
			
			
		public function update_comment_status($id=null){
			$blogComment  			= BlogComment::find($id);
			$blogComment->status  	= ($blogComment->status == 1)?0:1;
			if($blogComment->save()){
				return Redirect::to('admin/blogs/view/'.$blogComment->blog_id.'#blog_comments')->with('message','Comments status has been Successfuly');
			}else{
				return Redirect::to('admin/blogs/view/'.$blogComment->blog_id.'#blog_comments')->with('errormessage', 'Oops ! Something went wrong, please try again.');
			}
		}
			
		
		
		
		public function admin_status($id=null){
			$blog  = Blog::find($id);
			$blog->status  = ($blog->status == 1)?0:1;
			if($blog->save()){
				return Redirect::to('admin/blogs')->with('message','Blog status has been Successfuly');
			}else{
				return Redirect::to('admin/blogs')->with('errormessage', 'Oops ! Something went wrong, please try again.');
			}
		}
		
		
		
		
		public function admin_remove($id = null){
			$blog 		 = Blog::find($id);
			$image  	 = $blog->image;
			if($blog->delete()){
				if($image != "" and file_exists('upload/blogs/'.$image)){
					unlink('upload/blogs/'.$image);
				}
				return Redirect::to('admin/blogs')->with('message','Blog has been removed successfuly');
			}else{
				return Redirect::to('admin/blogs')->with('errormessage', 'Oops ! Something went wrong, please try again.');
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
						return Redirect::to('/admin_category_edit')->with('message', 'Property has been updated successfully!');
					}else{
						return Redirect::to('/admin_category_edit/'.$id)->with('errormessage', 'Property could not be updated, please try again!!');
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