<?php
    class BlogController extends BaseController {  
	
		public function __construct(){
			$this->beforeFilter(function(){
				if(Auth::guest())
					return Redirect::to('/');
	
			},['except' => ['']]);
		
		
		
		}
		
		public function index(){ 
			return View::make('frontend.pages.index');
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
			 
			if(!empty($_POST)) { 
				$validator = Blog::validate(Input::all());
				if($validator->fails()) { 
					Session::flash('errormessage', 'Blog could not be added, Please correct errors');
					return Redirect::to('admin/blogs/add')->withErrors($validator)->withInput(Input::except('image'));
				} else {

					$post_data = Input::all(); 
					$image = Input::file('image');
					 
					if(!empty($image)) {
						$user_model = new User();
						$images_name = $user_model->saveProfileImage($image,'blogs',200);
						if($images_name) {
							$post_data['image'] = $images_name;
						}
					}
					

		
					
					
					$slug = Str::slug(Input::get('title'));
					$post_data['slug'] = $slug; 
					$save_data = Blog::create($post_data); 
					if($save_data) {
						return Redirect::to('admin/blogs')->with('message', 'Blog has been save successfully.');
					} else {
						return Redirect::to('admin/blogs/add')->with('message', 'Blog could not be updated, Please correct errors');
					}
				}
			}
			$category = DB::table('subjects')->orderBy('name','ASC')->lists('name','id');
			return View::make('backend.blogs.admin_add',compact('category'));
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
				if(isset($_POST['name']) and $_POST['name']!=''){
					$name = $_POST['name'];
					$data = $data->where('categories.name', 'like','%'.trim( $name).'%');
					$search_sess['name'] = $name;
				}
				
				if(isset($_POST['status']) and $_POST['status']!=''){
					$status = $_POST['status'];
					$data = $data->where('BlogCategory.status', $status);
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
				 	
					
						return Redirect::to('admin/blogs/categories')->with('message', 'Category has been Save successfully.');
					
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
			if(!empty($_POST)){
				$validator = Blog::validate(Input::all());
				if($validator->fails()) {
					Session::flash('errormessage', 'Blog could not be updated, Please correct errors');
					return Redirect::to('admin/blogs/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {  
					$post_data = Input::all(); 
					$image = Input::file('image');
					$old_photo = $data->image;
					if($image){
						if($old_photo !="" and file_exists('upload/blogs/large/'.$old_photo)){
							unlink('upload/blogs/large/'.$old_photo);
							unlink('upload/blogs/thumb/'.$oldPhoto);
						}	
						if(!empty($image)) {
							$user_model = new User();
							$images_name = $user_model->saveProfileImage($image,'blogs',200);
							if($images_name) {
								$post_data['image'] = $images_name;
							}
						} 
					} 
					
					if($post_data['image']==''){
						unset($post_data['image']);
					}
					
					//echo '<pre>'; print_r($post_data); die; 	
					
					$save_data  = $data->update($post_data);  
					if($save_data){ 
						return Redirect::to('/admin/blogs')->with('message', 'Blog has been updated successfully!');
					} else {
						return Redirect::to('/admin/blogs'.$id)->with('errormessage', 'Blog could not be updated, please try again!!');
					}
				}
			} 
			$category = DB::table('subjects')->orderBy('name','ASC')->lists('name','id'); 
			return View::make('backend.blogs.admin_blog_edit')->with(compact('data','category'));
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
		
		
		
		
	// List Comment	 

	public function admin_blog_comment($blog_id){
		
		$data = BlogComment::where('blog_comments.blog_id',$blog_id)
		->leftjoin('blogs', 'blogs.id', '=', 'blog_comments.blog_id')
		->leftjoin('users', 'users.id', '=', 'blog_comments.user_id')
		->select('blog_comments.*', 'blogs.title', 'users.first_name', 'users.last_name');
		$data =$data->orderBy('blog_comments.created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
		
		return View::make('backend.blogs.admin_blog_comment', compact('data'));
	} 
	
		
		
		
		
		
		
		
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
