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
		
		
		
		
		
		
		
	}