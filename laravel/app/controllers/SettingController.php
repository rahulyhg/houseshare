<?php
    class SettingController extends BaseController {  
		public function __construct(){
	
			$this->beforeFilter(function(){
				if(Auth::guest())
					return Redirect::to('/');
	
			},['except' => ['']]);
		}
		
		
		
		public function admin_general_setting($type = 1){
			if(!empty($_POST)){
				$rules = array();
				$message = array();
				$fields = DB::table('settings')->count();
				
				for($k=1; $k <= $fields; $k++){
					$rules = array_add($rules, 'value'.$k, 'required');
					$message = array_add($message, 'value'.$k .'.required', Input::get('label'.$k) .' should not be left empty.');
				}
				$message = array_dot($message);
				
				$validator = Validator::make( Input::all(), $rules, $message); 
				if ($validator->fails()) {
					//echo "<pre>"; print_r($validator->errors()); die;
					Session::flash('errormessage', 'Settings could not be updated, Please correct errors');
					return Redirect::to('admin/settings/general')->withErrors($validator)->withInput(Input::all());
				} else {
					for($k=1; $k <= $fields; $k++){
						DB::table('settings')->where('id', Input::get('id'.$k))->update(array('value' => Input::get('value'.$k)));
					}
					return Redirect::to('admin/settings/general')->with('message','Settings have been updated successfully!');
				}
			}
			
			
			if(Auth::user()->role_id == '1'){
				$settings = DB::table('settings')->orderBy('id')->get();
				return View::make('backend.settings.admin_general_setting')->with('settings',$settings);
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		
		
		public function email_templates(){ 
		
			if(Auth::user()->role_id == '1'){
				
				$filters = array();
				$templates = Template::sortable();
				$search_sess = array();
				
				if (Session::has('templatesearch') and (isset($_GET['page']) and $_GET['page']>=1) OR (isset($_GET['s']) and $_GET['s'])) {
					$_POST = Session::get('templatesearch');
				}else{
					Session::forget('templatesearch');
				}
				
				if(! empty($_POST)){
					//echo $_POST['country_id']; die;
					if(isset($_POST['name']) and $_POST['name']!=''){
						$name = $_POST['name'];
						$templates = $templates->where('templates.name', 'like','%'.trim( $name).'%');
						$search_sess['name'] = $name;
						Session::put('templatesearch',$search_sess) ; 
					}
				}else{
					$_POST = Session::forget('templatesearch');

				}
				
				$data = $templates->paginate(Config::get('constants.PAGINATION'));
				
				return View::make('backend.settings.email_templates', compact('data'));
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
		public function update_template($id = null){
			$template = Template::find($id);
			
			if(! empty($_POST)){
				$validator = Template::validate(Input::all());
					
				if($validator->fails()){
					Session::flash('errormessage', 'Email Template could not be updated, Please correct errors');
					return Redirect::to('admin/settings/update-template/' .$id)->withErrors($validator)->withInput(Input::all());
				}else{
					$template->subject 		= Input::get('subject');
					$template->content 		= Input::get('content');
				}
				
				if($template->save()){
					return Redirect::to('admin/settings/email-templates')->with('message', 'Email Template has been updated successfully!');
				}else{
					return Redirect::to('admin/settings/update-templates/' .$id)->with('errormessage', 'Email Template could not be updated,please try again!!');
				}
			}
			
			return View::make('backend.settings.update_template', compact('template'));
		}
		
		public function admin_plans(){
			
			$data =  Plan::sortable();
			$search_sess = array();
			
			if(Session::has('plansearch') and ((isset($_GET['page']) and $_GET['page']>=1 ) OR (isset($_GET['o']) and $_GET['o']))) {
				$_POST = Session::get('plansearch');
			} else {
				Session::forget('plansearch');
			}
			
			if(! empty($_POST)){
				if(isset($_POST['title']) and $_POST['title']!=''){
					$title = $_POST['title'];
					$data = $data->where('plans.title', 'like','%'.trim( $title).'%');
					$search_sess['title'] = $title;
					Session::put('plansearch',$search_sess) ; 
				}
			} 
			$data = $data->orderBy('id','desc')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.settings.admin_plans')->with(compact('data'));
		}
		
		
	
		public function admin_plan_status($id){
			
			if(Auth::user()->role_id == '1'){
				$plan = Plan::find($id);
			
				if($plan->status==1){
					$plan->status = 0;
				}else {
					$plan->status = 1;
				}
				
				if ($plan->save()){
					Session::flash('message', 'Plan Status has been changed!');
					return Redirect::to('admin/settings/plans');
				}
				return Redirect::to('admin/settings/plans');
			}else{
				return Redirect::to('admin/dashboard');
			}
		}
		
	
		public function admin_plan_edit($id = null){
			if(!empty($_POST)){
				$validator = Plan::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('error-message', 'Plan could not be updated, Please correct errors');
					return Redirect::to('admin/settings/plan_edit/'.$id)->withErrors($validator)->withInput();
				} else {
					$plan  = Plan::find($id);
					$plan->title = Input::get('title');
					$plan->pay_type = Input::get('pay_type');
					$plan->price = Input::get('price');
					$plan->status = Input::get('status');
					if($plan->save()){
						return Redirect::to('admin/settings/plans')->with('message', 'Plan has been updated successfully!');
					}else{
						return Redirect::to('admin/settings/plan_edit/' .$id)->with('message', 'Plan could not be updated,please try again!!');
					}
				}
			}
			$plan = Plan::find($id);
			return View::make('backend.settings.admin_plan_edit')->with(compact('plan'));
		}
		
		
		
		public function admin_add_plan(){
			if(! empty($_POST)){
				$validator = Plan::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('error-message', 'Plan could not be created, Please correct errors');
					return Redirect::to('admin/settings/add_plan')->withErrors($validator)->withInput(Input::all());
				} else {
					$plan  = new Plan();
					$myPlan  = $plan->save_data(Input::all());
					if($myPlan){
						return Redirect::to('admin/settings/plans')->with('message', 'Plan has been created successfully!');
					}else{
						return Redirect::to('admin/settings/add_plan')->with('message', 'Plan could not be created, please try again!!');
					}
				}
			}
			
			return View::make('backend.settings.admin_add_plan');
		}
		
		public function admin_card_templates(){
			
			$data =  CardTemplate::sortable();
			if(Session::has('cardTempsearch') and isset($_GET['page']) and $_GET['page']>=1) {
				$_POST = Session::get('cardTempsearch');
			}
			
			if(! empty($_POST)){
				if(isset($_POST['title']) and $_POST['title']!=''){
					$title = $_POST['title'];
					$data = $data->where('card_templates.title', 'like','%'.trim( $title).'%');
					Session::put('cardTempsearch.title',$title) ; 
				}
			} else{
				Session::forget('cardTempsearch');
			}
			
			$data = $data->orderBy('id','DESC')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.settings.admin_card_templates')->with(compact('data'));
		}
		
		
		
		public function admin_add_card_template(){
			if(! empty($_POST)){
				$validator = CardTemplate::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('error-message', 'Card Template could not be created, please correct errors');
					return Redirect::to('admin/settings/add_card_template')->withErrors($validator)->withInput(Input::all());
				} else {
					$card_temp 			 = new CardTemplate();
					$card_temp->title	 = Input::get('title');
					$card_temp->tpl_html = Input::get('tpl_html');
					$card_temp->admin_tpl_html = Input::get('admin_tpl_html');
					$card_temp->status	 = Input::get('status');
					$card_temp->type	 = Input::get('type');	
					$card_temp->mobile_tpl_html	 = Input::get('mobile_tpl_html');
					if(Input::get('type') == 1){
						$card_temp->user_id	 = Input::get('user_id');
					}else{
						$card_temp->user_id	 = '';
					}
					$photo = Input::file('photo');
					if($photo){
						$card_template  = new CardTemplate();
						$photo_name = $card_template->uploadImages($photo,  'card_templates', Config::get('constants.CARD_TEMPLATE_THUMB_WIDTH'), Config::get('constants.CARD_TEMPLATE_SMALL_WIDTH'));
						$card_temp->image = $photo_name;
					}
					if($card_temp->save()){
						return Redirect::to('admin/settings/card_templates')->with('message', 'Card Template has been created successfully!');
					} else{
						return Redirect::to('admin/settings/card_templates')->with('message', 'Card Template could not be created, please try again!!');
					}
				}
			}
			return View::make('backend.settings.admin_add_card_template')->with(compact('data'));
		}
		
		
		public function admin_edit_card_template($id = null){
			if(! empty($_POST)){
				$validator = CardTemplate::validate_edit(Input::all());
				if($validator->fails()) {
					Session::flash('error-message', 'Card template could not be updated, Please correct errors');
					return Redirect::to('admin/settings/edit_card_template/'.$id)->withErrors($validator)->withInput();
				} else {
					$card_temp  = CardTemplate::find($id);
					$card_temp->title	 = Input::get('title');
					$card_temp->tpl_html = Input::get('tpl_html');
					$card_temp->admin_tpl_html = Input::get('admin_tpl_html');
					$card_temp->status	 = Input::get('status');
					$card_temp->type	 = Input::get('type');
					$card_temp->mobile_tpl_html	 = Input::get('mobile_tpl_html');
					if(Input::get('type') == 1){
						$card_temp->user_id	 = Input::get('user_id');
					}else{
						$card_temp->user_id	 = '';
					}
					$photo = Input::file('photo');
					if($photo){
						if(Input::get('card_template_img')) {
							$path_small	= 'upload/card_templates/small/'.Input::get('card_template_img');
							$path_thumb	= 'upload/card_templates/thumb/'.Input::get('card_template_img');
							$path_large	= 'upload/card_templates/large/'.Input::get('card_template_img');
							if(file_exists($path_small)){
								unlink($path_small);
								unlink($path_thumb);
								unlink($path_large);
							}
						}
						$card_template  = new CardTemplate();
						$photo_name = $card_template->uploadImages($photo,  'card_templates', Config::get('constants.CARD_TEMPLATE_THUMB_WIDTH'), Config::get('constants.CARD_TEMPLATE_SMALL_WIDTH'));
						$card_temp->image = $photo_name;
					}
					if($card_temp->save()){
						return Redirect::to('admin/settings/card_templates')->with('message', 'Card template has been updated successfully!');
					}else{
						return Redirect::to('admin/settings/edit_card_template/' .$id)->with('message', 'Card template could not be updated,please try again!!');
					}
				}
			}
			$data = CardTemplate::find($id);
			return View::make('backend.settings.admin_edit_card_template')->with(compact('data'));
		}
		
		
		
		public function admin_card_template_status($id){
			$card_temp = CardTemplate::find($id);
		
			if($card_temp->status==1){
				$card_temp->status = 0;
			}else {
				$card_temp->status = 1;
			}
			
			if ($card_temp->save()){
				Session::flash('message', 'Card Template Status has been changed!');
				return Redirect::to('admin/settings/card_templates');
			}
			return Redirect::to('admin/settings/card_templates');
			
		}
		
		
		
		public function admin_icons(){
			$data = Icon::sortable()->orderBy('id','desc')->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.settings.admin_icons')->with(compact('data'));
		}
		
		
		
		public function admin_add_icon(){
			if(! empty($_POST)){
				$validator = Icon::validate('add', Input::all());
				if ( $validator->fails() ) {
					Session::flash('error-message', 'Icon could not be saved, Please correct errors');
					return Redirect::to('admin/settings/add_icon')->withErrors($validator)->withInput();
				} else {
					$icon 					= new Icon();
					$icon->icon_type		= Input::get('icon_type');
					$icon->icon_title 		= Input::get('icon_title');
					$icon->status 			= Input::get('status');
					$iconImage 				= Input::file('icon_image'); 
					
					if($iconImage){
						$slug				= preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(Input::get('icon_title')));
						$ext 				= strtolower(File::extension($iconImage->getClientOriginalName()));
						$icon_name 			= date("ymdhis")."-".$slug.'.'. $ext;
						$upload_success		= $iconImage->move('upload/icons/', $icon_name);
						$icon->icon_image 	= $icon_name; 
					} 
					if($icon->save()){
						return Redirect::to('admin/settings/icons')->with('message', 'Icon has been added successfully!');
					}else{
						return Redirect::to('admin/settings/add_icon')->with('message', 'Icon could not be saved,please try again!!');
					}
				}
			}
			return View::make('backend.settings.admin_add_icon');
		}
		
		
		
		public function admin_edit_icon($id = null){
			if(! empty($_POST)){
				$validator = Icon::validate('edit', Input::all());
				if ( $validator->fails() ) {
					Session::flash('error-message', 'Icon could not be saved, Please correct errors');
					return Redirect::to('admin/settings/edit_icon/'.$id)->withErrors($validator)->withInput();
				} else {
					$icon 					= Icon::find($id);
					$icon->icon_type		= Input::get('icon_type');
					$icon->icon_title 		= Input::get('icon_title');
					$icon->status 			= Input::get('status');
					$iconImage 				= Input::file('icon_image'); 
					
					if($iconImage){
						if($icon->icon_image !='' AND file_exists('upload/icons/'.$icon->icon_image)){
							unlink('upload/icons/'.$icon->icon_image);
						}
						$slug				= preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(Input::get('icon_title')));
						$ext 				= strtolower(File::extension($iconImage->getClientOriginalName()));
						$icon_name 			= date("ymdhis")."-".$slug.'.'. $ext;
						$upload_success		= $iconImage->move('upload/icons/', $icon_name);
						$icon->icon_image 	= $icon_name;
					} 
					if($icon->save()){
						return Redirect::to('admin/settings/icons')->with('message', 'Icon has been updated successfully!');
					}else{
						return Redirect::to('admin/settings/edit_icon/'.$id)->with('message', 'Icon could not be updated,please try again!!');
					}
				}
			}
			$icon 					= Icon::find($id);
			return View::make('backend.settings.admin_edit_icon')->with(compact('icon'));
		}
		
	
    }
	
	