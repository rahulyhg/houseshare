<?php

class AdImage extends Eloquent {

	use SortableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ad_images';
	
	/**
	 * The table fields to be filled or updated.
	 *
	 * @var array
	 */
	 
	protected $fillable = array('property_id', 'is_default', 'image','img_type');
	
	/**
	 * The validation rules for form fields.
	 *
	 * @var array
	 */
	 
	
	public static function validate($input, $type=null){
		
		$rules = array(
			//'name'    => 'required',
		);
		
		$messages = array(
			'name.required' => 'Name is required.',   
		);
		 
        return Validator::make($input, $rules, $messages);
	} 
	 
	
}