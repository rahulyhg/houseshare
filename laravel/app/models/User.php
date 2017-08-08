<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Cookie\CookieJar;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait,SortableTrait ;
	


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	  public function getFullNameAttribute()
		{
			return preg_replace('/\s+/', ' ',$this->first_name.' '.$this->middle_name.' '.$this->last_name);
		}
	
	
	protected $fillable = array('role_id', 'email', 'password', 'first_name', 'last_name', 'dob', 'description', 'mobile', 'photo', 'gender', 'street_1', 'street_2', 'state', 'city', 'zip', 'country_id', 'status', 'is_fb', 'looking_house_share', 'an_house_share',
	                                'facebook', 'linkedin', 'google_plus', 'twitter','varify_hash');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	protected $defaultTimezone = null;
	
	
	
	public static function validate($type = null, $input, $id = null) {
		if($type == 'admin_edit'){
			$rules = array(
				'first_name' 	=> 'required',
				'photo'			=> 'mimes:jpg,gif,jpeg,bmp,png',
				'email'         => 'required|email|unique:users,email,'.$id,
			);
		}else{
			$rules = array(
				'first_name' 	=> 'required',
				'email'         => 'required|email|unique:users,email,'.$id,
				'photo'			=> 'mimes:jpg,gif,jpeg,bmp,png',
				'password'	  	=> array('required', 'min:6'),
			);
		}
		
		$messages = array(
			'first_name.required'  	 => 'First name is required.',
			'email.required' 	  	 => 'Email is required.',
			'gender.required' 	  	 => 'Gender is required.',
			'email.email'  		 	 => 'Invalid Email.',
			'email.unique' 		 	 => 'Email is already exist.',
			'password.min' 			 => 'Minimum length of password should be 6 characters.',
			'mobile.regex'        	 => 'Invalid mobile number',
			'street_1.required' 	 => 'Street #1 is required.',
			'city.required' 	 	 => 'City is required.'
		);

        return Validator::make($input, $rules, $messages);
	}
	
	public static function validate_front_edit($type = null, $input, $id = null) {
	
		//echo '<pre>'; print_r($input); die; 
	
		$form_number = !empty($input['form_number'])?$input['form_number']:1;
		
		$rules = array();
		
		if($form_number == 1) {
			$rules = array(
				'first_name' 	=> 'required',
				'cur_password'  => 'required | passcheck',
			);
		} else if($form_number == 2) {
			$rules = array(
				'email'         => 'required|email|unique:users,email,'.$id,
				'confirm_email' => 'required|same:email',
				'cur_password'  => 'required | passcheck',
			);
		}  else if($form_number == 4) {
			$rules = array();
		}  
		
		$messages = array(
		
			'first_name.required'  	 => 'First name is required.',
			'cur_password.required'  => 'Password is required.', 
			'cur_password.passcheck' => 'Current password is wrong.',
			
			'email.required' 	  	 => 'Email is required.',
			'email.email'  		 	 => 'Invalid Email.',
			'email.unique' 		 	 => 'Email is already exist.',
			'confirm_email.required' => 'Confirm email is required.',
			
			
		);
		
		Validator::extend('passcheck', function ($attribute, $value, $parameters) {
			//echo $value; die;
			//echo Hash::check($value, Auth::user()->getAuthPassword()); die;
			return Hash::check($value, Auth::user()->getAuthPassword());
		});
		
        return Validator::make($input, $rules, $messages);
	}
	
	
	
	public static function validate_front($input) {
 
		$rules = array(
			'first_name' 	=> 'required',
			'email'         => 'required|email|unique:users,email', 
			'password'	  	=> 'required',
			//'agree'	  	    => 'required',
			//'an_house_share' => 'required',
		);
		
		$messages = array(
			'first_name.required'  	 => 'Name is required.',
			'email.required' 	  	 => 'Email is required.',
			'gender.required' 	  	 => 'Gender is required.',
			'email.email'  		 	 => 'Invalid Email.',
			'email.unique' 		 	 => 'Email is already exist.',
			'password.required' 	 => 'Minimum length of password should be 6 characters.',
			'agree.required' 	 	 => 'Privacy policy is required.',
			'agree_1.required' 	 	 => 'Privacy policy is required.'
		);

        return Validator::make($input, $rules, $messages);
	}
	
	
	
	
	
	public static function change_password($input) {
		
		$rules = array(
			'cur_password'  			=> 'required | passcheck',
			'new_password'	  			=> array('required', 'min:6', 'confirmed'),
			'new_password_confirmation' => 'required',
		);
		
		$messages = array(
			'cur_password.required' 			=> 'Current password is required.', 
			'cur_password.passcheck'			=> 'Current password wrong.',
			'new_password.required'  			=> 'New password is required.',
		);
		
		Validator::extend('passcheck', function ($attribute, $value, $parameters) {
			return Hash::check($value, Auth::user()->getAuthPassword());
		});
		
        return Validator::make($input, $rules, $messages);
	}
	
	
	public function save_data($data = array(), $id = null){
	
		$user = ($id != "")?User::find($id):new User();
		$fields = array('role_id', 'email', 'password', 'first_name', 'last_name', 'office_name', 'office_website', 'description', 'mobile', 'photo', 'gender', 'street_1', 'street_2', 'state', 'city', 
		                   'facebook', 'linkedin', 'google_plus', 'twitter','zip', 'country_id', 'status', 'is_fb', 'looking_house_share', 'an_house_share');
		
		if(empty($data['photo'])) {
			unset($data['photo']);
		}
		
		$keys = array_keys($data);
		$photo = Input::file('photo');
		
		foreach($keys as $val){
			if($val == 'password'){
				$user->password = Hash::make($data['password']);
			} elseif(in_array($val, $fields)){
				$user->$val = $data[$val];
			}
		}
		
		if($photo){
			
			$oldPhoto = ($id != "")?$user->photo:'';
			if($oldPhoto !="" and file_exists('upload/users/profile-photo/large/'.$oldPhoto)){
				unlink('upload/users/profile-photo/large/'.$oldPhoto);
				unlink('upload/users/profile-photo/thumb/'.$oldPhoto);
			}
			$photo_name = $this->saveProfileImage($photo,  'users/profile-photo', Config::get('constants.USER_THUMB_WIDTH'));
			$user->photo = $photo_name;
		}
		
		if($user->save()){
			 
		}else{
			$user  = array();
		}
		return $user;
	}   
	
	
	
	public function saveProfileImage($file, $outer_folder = 'users/profile-photo', $newwidth =null){
		
		$large_image_path = 'upload/'.$outer_folder.'/large/';
		$small_image_path = 'upload/'.$outer_folder.'/thumb/';
		$ext = strtolower(File::extension($file->getClientOriginalName()));
		$filename = strtotime(date('Y-m-d H:i:s')).'_'.rand(111111111,999999999).'.'.$ext;
		$upload_success = $file->move($large_image_path, $filename);
		
		// Get new sizes
		list($ori_width, $ori_height) = getimagesize($large_image_path . $filename); 
		//echo $ori_width; die;
		$img_ratio = ($ori_width/$ori_height);
		//$newwidth = Config::get('constants.USER_THUMB_WIDTH');
		$newheight = $newwidth/$img_ratio;

		// Load
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		if($ext == "png"){
			$source = imagecreatefrompng($large_image_path . $filename);
		}elseif($ext == "gif"){
			$source = imagecreatefromgif($large_image_path . $filename);
		}else{
			$source = imagecreatefromjpeg($large_image_path . $filename);
			}
		
		imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $ori_width, $ori_height);
		
		if($ext == "png"){
			imagepng($thumb, $small_image_path. $filename);
		}elseif($ext == "gif"){
			imagegif($thumb, $small_image_path . $filename);
		}else{
			imagejpeg($thumb,$small_image_path. $filename);
		}
		return $filename;
	}
	
	
	public function videoUpload($file, $outer_folder = 'users/profile-photo') {
		$path = 'upload/'.$outer_folder.'/'; 
		$ext = strtolower(File::extension($file->getClientOriginalName()));
		$filename = strtotime(date('Y-m-d H:i:s')).'_'.rand(111111111,999999999).'.'.$ext;
		$upload_success = $file->move($path, $filename);
		return $filename;
	}
	
	
}
