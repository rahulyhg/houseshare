<?php

class Page extends Eloquent{
	use SortableTrait;

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	
	
	public static function validate($input) {
	
		$rules = array(
			'title'  => 'required'
		);
		
		$messages = array(
			'title.required' =>  'Page title is required',
		);

        return Validator::make($input, $rules, $messages);
	}
	

}
