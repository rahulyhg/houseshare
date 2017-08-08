<?php

class Template extends Eloquent{
	use SortableTrait;

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'templates';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */ 
	
 
	
	
	public static function validate($input) {
		$rules = array(
			'subject'  	   => 'required',
		);
		
		$messages = array(
			'subject.required' => 'Email subject is required.',
		);

        return Validator::make($input, $rules, $messages);
		
	}
	

}
