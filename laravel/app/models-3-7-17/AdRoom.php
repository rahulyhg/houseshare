<?php

class AdRoom extends Eloquent {

	use SortableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ad_rooms';
	
	/**
	 * The table fields to be filled or updated.
	 *
	 * @var array
	 */
	 
	protected $fillable = array('property_id', 'is_available', 'room_cost', 'room_cost_type', 'room_size', 'amenities_ids', 'security_deposit');
	
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