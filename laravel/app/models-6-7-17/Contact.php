<?php

class Contact extends Eloquent {

	use SortableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contacts';
	
	/**
	 * The table fields to be filled or updated.
	 *
	 * @var array
	 */
	 
	protected $fillable = array('name', 'email', 'message', 'status');
	
	/**
	 * The validation rules for form fields.
	 *
	 * @var array
	 */
	 
	
	public static function validate($input){
		
		$rules = array(
			'name'   	=> 'required',
			'email' 	=> 'required|email',
			'message' 	=> 'required',
			//'captcha'	=> 'required|isValidCaptcha',
		);
		
		$messages = array(
			'name.required'	 		=> 'Name is required.',
			'email.required'	 		=> 'Email is required.',
			'email.email'	 		=> 'Email Invalid',
			'message.required'	 		=> 'Message is required.', 
			//'captcha.required'	 		=> 'Captcha is required.',  
		);
		/*
		Validator::extend('isValidCaptcha', function ($attribute, $value, $parameters){
			$isTrue  = Captcha::check($value);
			return $isTrue;
		});
		
        Validator::replacer('isValidCaptcha', function($message, $attribute, $rule, $parameters) {
			return 'Invalid Captcha';
		}); */
        return Validator::make($input, $rules, $messages);
	} 
	 
	
}
