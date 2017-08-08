<?php
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Support\ServiceProvider;


class AdminController extends BaseController {   



	public function __construct(){
		$this->beforeFilter(function(){
			
			if(Auth::guest())
				return Redirect::to('admin');
		},['except' => ['getLogin', 'postLogin','front_index','contact','frontLogin','user_register','postContactUs']]);
	}
	
	
	
	public function getDashBoard(){	
		return View::make('backend.dashboard');
	}
 
	

 
	public function getLogin(){
		
		if (Auth::check()) {
			if(Auth::user()->role_id == 1) {
				return Redirect::to('admin/dashboard');
			} elseif(Auth::user()->status == 1 ) {
				return Redirect::to('/');
			}
		}
		return View::make('backend.adminlogin.admin_login');
	} 
 
 

	public function postLogin(){
		if(Auth::check()){
			return Redirect::to('/dashboard');
		}
		if(! empty($_POST)){
			$input = Input::all();

			$rules = array(
				'email'  => 'required',
				'password'  => 'required',
			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails()) {	
				return Redirect::to('admin')->with('message', 'Incorrect username/password')->withInput(Input::except('password'));
			}else {
				$usernameinput = Input::get('email');
				$password = Input::get('password');
				
				$field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
				$credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));
				if (Auth::attempt(array($field => $usernameinput, 'password' => $password),true)) {	
					$user_id = Auth::user()->id;
					$user = DB::table('users')
							->where('id', '=', $user_id)
							->first(array('role_id'));
					if($user->role_id == '1'){
						return Redirect::to('admin/dashboard');
					}else{
						return Redirect::to('admin/logout')->with('message', 'You are not authorised to visit admin area of this site!');
					}
				}else {		
					return Redirect::to('admin')->with('message', 'Incorrect username/password')->withInput(Input::except('password'));
				}
			}
		}else{
			return Redirect::to('admin');
		}
	}
	
	
	public function getLogout(){
		Auth::logout();
		if (Session::has('message')){
			$message =  Session::get('message');
			return Redirect::to('admin')->with('message', $message);
		}else{
			return Redirect::to('admin');
		}
	}
	
	
	
	
	
	public function admin_update_profile(){
		$data = User::find(Auth::id());
		
		if(!empty($_POST)){
		
			$validator = User::validate('admin_edit', Input::all(), Auth::id());
			
			if ( $validator->fails() ) {
				Session::flash('message', 'Profile could not be updated, Please correct errors');
				return Redirect::to('admin/update_profile')->withErrors($validator)->withInput(Input::except('password','photo'));
			} else {
				$user = new User();
				$savedUser = $user->save_data(Input::all(), Auth::id());
				if($savedUser){
					return Redirect::to('admin/update_profile')->with('message', 'Profile has been updated successfully');;
				}
				return Redirect::to('admin/update_profile');
			}
		}
		$countries = DB::table('countries')->orderBy('name','ASC')->lists('name','id');
		return View::make('backend.users.admin_update_profile')->with(compact('data','countries'));
	}
	 
}