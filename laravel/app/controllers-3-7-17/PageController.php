<?php
    class PageController extends BaseController {  
		public function __construct(){
			$this->beforeFilter(function(){
				if(Auth::guest())
					return Redirect::to('/');
	
			},['except' => ['index','pages','contact_us','admin_error','error','about_us','feedback_ajax','choose_plan','test']]);
		}
		
		public function index(){ 
			return View::make('frontend.pages.index');
		}
		
		public function choose_plan(){
			return View::make('frontend/pages/choose_plan');
		}
		
		public function admin_error(){
			return View::make('missing');
		}
		
		public function error(){
			return View::make('frontend/error');
		}
		
		
	
		
		public function admin_index(){
			if(Auth::user()->role_id == '1'){
				
				$filters = array();
				$pages =  Page::sortable();
				$search_sess = array();
				
				if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
					$_POST = Session::get('pagesearch');
				}else{
					Session::forget('pagesearch');
				} 
				
				if(! empty($_POST)){
					//echo $_POST['country_id']; die;
					if(isset($_POST['title']) and $_POST['title']!=''){
						$title = $_POST['title'];
						$pages = $pages->where('pages.title', 'like','%'.trim( $title).'%');
						$search_sess['title'] = $title;
						Session::put('pagesearch',$search_sess) ; 
					}
				}else{
					$_POST = Session::forget('pagesearch');
				}
				
				
				$pages =$pages->paginate(Config::get('constants.PAGINATION'));
				return View::make('backend.pages.admin_index')->with('pages',$pages);
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
	
	
		public function admin_status($id){
			if(Auth::user()->role_id == '1'){
				$page = Page::find($id);
				if($page->status==1){
					$page->status = 0;
				}else {
					$page->status = 1;
				}
				
				if ($page->save()){
					Session::flash('message', 'Status has been changed successfully!');
					return Redirect::to('admin/pages');
				}
				return Redirect::to('admin/pages');
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
	
	
		public function admin_edit($id) {
			if(Auth::user()->role_id == '1'){
				if(! empty($_POST)){
					$validator = Page::validate(Input::all());
					
					if ( $validator->fails() ) {
						Session::flash('errormessage', 'Page could not be updated, Please correct errors');
						return Redirect::to('admin/pages/edit/' .$id)->withErrors($validator);
					} else {
						$page = Page::find($id);
						$page->title = Input::get('title');
						//$page->slug = Str::slug($page->title);
						$page->status = Input::get('status');
						$page->meta_description = Input::get('meta_description');
						$page->content = Input::get('content');
						$page->meta_title = Input::get('meta_title');
						$page->meta_keywords = Input::get('meta_keywords');
						
						if($page->save()){
							return Redirect::to('admin/pages')->with('message', 'Page has been updated successfully!');
						}else{
							return Redirect::to('admin/pages/edit/' .$id)->with('errormessage', 'Page could not be updated,please try again!!');
						}
					}
				}
				$page = Page::find($id);
				return View::make('backend.pages.admin_edit')->with('page', $page);
			} else {
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		
		/*--------- Languages --------*/
		
		public function admin_languages() {
		
		
			if(Auth::user()->role_id == '1'){
				
				$filters = array();
				$data =  Language::sortable();
				$search_sess = array();
				
				if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
					$_POST = Session::get('pagesearch');
				}else{
					Session::forget('pagesearch');
				} 
				
				if(! empty($_POST)){
					if(isset($_POST['title']) and $_POST['title']!=''){
						$title = $_POST['title'];
						$data = $data->where('languages.name', 'like','%'.trim( $title).'%');
						$search_sess['title'] = $title;
						Session::put('pagesearch',$search_sess) ; 
					}
				}else{
					$_POST = Session::forget('pagesearch');
				}
				
				
				$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
				return View::make('backend.pages.admin_languages')->with(compact('data'));
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		public function admin_languages_status($id){
		
			if(Auth::user()->role_id == '1'){
				$data = Language::find($id);
				if($data->status==1){
					$data->status = 0;
				}else {
					$data->status = 1;
				}
				
				if ($data->save()){
					Session::flash('message', 'Status has been changed successfully!');
					return Redirect::to('admin/languages');
				}
				return Redirect::to('admin/languages');
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		public function admin_languages_remove($id =null){
		
			if(Auth::user()->role_id == '1'){
				$data = Language::find($id);
				if($data->delete()){
					Session::flash('message', 'Language has been removed successfully!');
					return Redirect::to('admin/languages');
				}else{
					Session::flash('errormessage', 'Language could not be removed, please try again!');
					return Redirect::to('admin/languages');
				}
			} else {
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		
		public function admin_languages_add(){
			 
			if(! empty($_POST)){
				$validator = Language::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'Language could not be added, Please correct errors');
					return Redirect::to('admin/languages/add')->withErrors($validator)->withInput(Input::all());
				} else {
				
					$projects = Language::create(Input::all());
				 	
					if($projects){
						return Redirect::to('admin/languages')->with('message', 'Language has been added successfully!');
					}else{
						return Redirect::to('admin/languages/add')->with('errormessage', 'Language could not be added, please try again!!');
					}
				}
			}
			return View::make('backend.pages.admin_languages_add');
		}
		
		
		public function admin_languages_edit($id = null){
		
			$data = Language::find($id);
			
			if(! empty($_POST)){
				$validator = Language::validate(Input::all());
				if($validator->fails() ) {
					Session::flash('errormessage', 'Language could not be updated, Please correct errors');
					return Redirect::to('admin/languages/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {
					$save_data  = $data->update(Input::all()); 
					if($save_data){
						return Redirect::to('admin/languages')->with('message', 'Language has been updated successfully!');
					}else{
						return Redirect::to('admin/languages/edit/'.$id)->with('errormessage', 'Language could not be updated, please try again!!');
					}
				}
			}
			return View::make('backend.pages.admin_languages_edit')->with(compact('data'));
		}		
		
		
		/*--------- Hobbies --------*/
		
		public function admin_hobbies() {
		
		
			if(Auth::user()->role_id == '1'){
				
				$filters = array();
				$data =  Hobby::sortable();
				$search_sess = array();
				
				if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
					$_POST = Session::get('pagesearch');
				}else{
					Session::forget('pagesearch');
				} 
				
				if(! empty($_POST)){
					if(isset($_POST['title']) and $_POST['title']!=''){
						$title = $_POST['title'];
						$data = $data->where('hobbies.name', 'like','%'.trim( $title).'%');
						$search_sess['title'] = $title;
						Session::put('pagesearch',$search_sess) ; 
					}
				}else{
					$_POST = Session::forget('pagesearch');
				}
				
				
				$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
				return View::make('backend.pages.admin_hobbies')->with(compact('data'));
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		public function admin_hobbies_status($id){
		
			if(Auth::user()->role_id == '1'){
				$data = Hobby::find($id);
				if($data->status==1){
					$data->status = 0;
				}else {
					$data->status = 1;
				}
				
				if ($data->save()){
					Session::flash('message', 'Status has been changed successfully!');
					return Redirect::to('admin/hobbies');
				}
				return Redirect::to('admin/hobbies');
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		public function admin_hobbies_remove($id =null){
		
			if(Auth::user()->role_id == '1'){
				$data = Hobby::find($id);
				if($data->delete()){
					Session::flash('message', 'Hobby has been removed successfully!');
					return Redirect::to('admin/hobbies');
				}else{
					Session::flash('errormessage', 'Hobby could not be removed, please try again!');
					return Redirect::to('admin/hobbies');
				}
			} else {
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		
		public function admin_hobbies_add(){
			 
			if(! empty($_POST)){
				$validator = Hobby::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'Hobby could not be added, Please correct errors');
					return Redirect::to('admin/hobbies/add')->withErrors($validator)->withInput(Input::all());
				} else {
				
					$projects = Hobby::create(Input::all());
				 	
					if($projects){
						return Redirect::to('admin/hobbies')->with('message', 'Hobby has been added successfully!');
					}else{
						return Redirect::to('admin/hobbies/add')->with('errormessage', 'Hobby could not be added, please try again!!');
					}
				}
			}
			return View::make('backend.pages.admin_hobbies_add');
		}
		
		
		public function admin_hobbies_edit($id = null){
		
			$data = Hobby::find($id);
			
			if(! empty($_POST)){
				$validator = Hobby::validate(Input::all());
				if($validator->fails() ) {
					Session::flash('errormessage', 'Hobby could not be updated, Please correct errors');
					return Redirect::to('admin/hobbies/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {
					$save_data  = $data->update(Input::all()); 
					if($save_data){
						return Redirect::to('admin/hobbies')->with('message', 'Hobby has been updated successfully!');
					}else{
						return Redirect::to('admin/hobbies/edit/'.$id)->with('errormessage', 'Hobby could not be updated, please try again!!');
					}
				}
			}
			return View::make('backend.pages.admin_hobbies_edit')->with(compact('data'));
		}	
		
		
		
		/*--------- Amenities --------*/
		
		public function admin_amenities() {
		
		
			if(Auth::user()->role_id == '1'){
				
				$filters = array();
				$data =  Amenity::sortable();
				$search_sess = array();
				
				if (Session::has('pagesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
					$_POST = Session::get('pagesearch');
				}else{
					Session::forget('pagesearch');
				} 
				
				if(! empty($_POST)){
					if(isset($_POST['title']) and $_POST['title']!=''){
						$title = $_POST['title'];
						$data = $data->where('amenities.name', 'like','%'.trim( $title).'%');
						$search_sess['title'] = $title;
						Session::put('pagesearch',$search_sess) ; 
					}
				}else{
					$_POST = Session::forget('pagesearch');
				}
				
				
				$data =$data->orderBy('created_at','DESC')->paginate(Config::get('constants.PAGINATION'));
				return View::make('backend.pages.admin_amenities')->with(compact('data'));
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		public function admin_amenities_status($id){
		
			if(Auth::user()->role_id == '1'){
				$data = Amenity::find($id);
				if($data->status==1){
					$data->status = 0;
				}else {
					$data->status = 1;
				}
				
				if ($data->save()){
					Session::flash('message', 'Status has been changed successfully!');
					return Redirect::to('admin/amenities');
				}
				return Redirect::to('admin/amenities');
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		public function admin_amenities_remove($id =null){
		
			if(Auth::user()->role_id == '1'){
				$data = Amenity::find($id);
				if($data->delete()){
					Session::flash('message', 'Amenity has been removed successfully!');
					return Redirect::to('admin/amenities');
				}else{
					Session::flash('errormessage', 'Amenity could not be removed, please try again!');
					return Redirect::to('admin/amenities');
				}
			} else {
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		
		public function admin_amenities_add(){
			 
			if(! empty($_POST)){
				$validator = Amenity::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'Amenity could not be added, Please correct errors');
					return Redirect::to('admin/amenities/add')->withErrors($validator)->withInput(Input::all());
				} else {
				
					$projects = Amenity::create(Input::all());
				 	
					if($projects){
						return Redirect::to('admin/amenities')->with('message', 'Amenity has been added successfully!');
					}else{
						return Redirect::to('admin/amenities/add')->with('errormessage', 'Amenity could not be added, please try again!!');
					}
				}
			}
			return View::make('backend.pages.admin_amenities_add');
		}
		
		
		public function admin_amenities_edit($id = null){
		
			$data = Amenity::find($id);
			
			if(! empty($_POST)){
				$validator = Amenity::validate(Input::all());
				if($validator->fails() ) {
					Session::flash('errormessage', 'Amenity could not be updated, Please correct errors');
					return Redirect::to('admin/amenities/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {
					$save_data  = $data->update(Input::all()); 
					if($save_data){
						return Redirect::to('admin/amenities')->with('message', 'Amenity has been updated successfully!');
					}else{
						return Redirect::to('admin/amenities/edit/'.$id)->with('errormessage', 'Amenity could not be updated, please try again!!');
					}
				}
			}
			return View::make('backend.pages.admin_amenities_edit')->with(compact('data'));
		}
		
		
		
	
	
	
		public function contact_us(){
		
			if(!empty($_POST)){ 
				$validator = Contact::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'Your contact information could not be saved, please correct errors.');
					return Redirect::to('contact-us')->withErrors($validator)->withInput(Input::except('captcha'));
				} else {
					$contact   = Contact::create(Input::all());
					if($contact){
						return Redirect::to('contact-us')->with('message', 'Your contact information has been submitted. Admin will review and will cotact you soon.');
					}else{
						return Redirect::to('contact-us')->with('errormessage', 'Oops!!Something went wrong, please try again.');
					}
				}
			} 
		
			return View::make('frontend.pages.contact_us');
		}
		
		
		
		public function about_us(){
			$data = DB::table('pages')->whereIn('slug',array('company','how-it-works','started'))->orderBy(DB::raw("FIELD(slug,'company','how-it-works','started')", 'asc'))->get();
			return View::make('frontend.pages.about_us',compact('data'));
		}
		 
	
		
		
		
		
		public function pages(){
			$slug = Route::input('slug');
			$data = DB::table('pages')->where('slug',$slug)->first();
			return View::make('frontend.pages.pages',compact('data'));
		}
		
		
		public function captcha_refresh(){
			return View::make('frontend.pages.captcha');
		}
		
	}