<?php
    class FaqController extends BaseController {  
		public function __construct(){
			$this->beforeFilter(function(){
				if(Auth::guest())
					return Redirect::to('/');
	
			},['except' => ['index']]);
		}
		
		public function index(){
			$data  =  DB::table('faqs')->where('status', 1)->orderBy('created_at', 'DESC')->get();
			return View::make('frontend.faqs.faqs')->with('data',$data);
		}
		
		public function admin_index(){
			$faqs =  Faq::sortable();
			$faqs = $faqs->paginate(Config::get('constants.PAGINATION'));
			return View::make('backend.faqs.admin_index')->with('faqs',$faqs);
		}
	
	
		public function admin_status($id){
			$faq = Faq::find($id);
			if($faq->status==1){
				$faq->status = 0;
			}else {
				$faq->status = 1;
			}
			
			if ($faq->save()){
				Session::flash('message', 'Status has been changed successfully!');
				return Redirect::to('admin/faqs');
			}
			return Redirect::to('admin/faqs');
		}
	
		public function admin_remove($id = null){
			$faq = Faq::find($id);
			
			if ($faq->delete()){
				Session::flash('message', 'FAQ has been removed successfully!');
				return Redirect::to('admin/faqs');
			}else{
				Session::flash('errormessage', 'FAQ could not be removed, please try again!');
				return Redirect::to('admin/faqs');
			}
			return Redirect::to('admin/faqs');
		}
		
		
		
		
		public function admin_add(){
			if(! empty($_POST)){
				$validator = Faq::validate(Input::all());
					
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'FAQ could not be added, Please correct errors');
					return Redirect::to('admin/faqs/add')->withErrors($validator)->withInput(Input::all());
				} else {
					$faq 			= new Faq();
					$faq->question 	= Input::get('question');
					$faq->answer 	= Input::get('answer');
					$faq->status 	= Input::get('status');
					
					if($faq->save()){
						return Redirect::to('admin/faqs')->with('message', 'FAQ has been added successfully!');
					}else{
						return Redirect::to('admin/faqs/add')->with('errormessage', 'FAQ could not be added, please try again!!');
					}
				}
			}
			return View::make('backend.faqs.admin_add');
		}
		
		
		public function admin_edit($id = null){
			$faq 			= Faq::find($id);
			
			if(! empty($_POST)){
				$validator = Faq::validate(Input::all());
				if ( $validator->fails() ) {
					Session::flash('errormessage', 'FAQ could not be updated, Please correct errors');
					return Redirect::to('admin/faqs/edit/'.$id)->withErrors($validator)->withInput(Input::all());
				} else {
					$faq->question 	= Input::get('question');
					$faq->answer 	= Input::get('answer');
					$faq->status 	= Input::get('status');
					
					if($faq->save()){
						return Redirect::to('admin/faqs')->with('message', 'FAQ has been updated successfully!');
					}else{
						return Redirect::to('admin/faqs/edit/'.$id)->with('errormessage', 'FAQ could not be updated, please try again!!');
					}
				}
			}
			return View::make('backend.faqs.admin_edit')->with(compact('faq'));
		}
		
	}