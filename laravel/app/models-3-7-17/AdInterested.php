<?php
class AdInterested extends Eloquent {

	use SortableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ad_interesteds';
	
	/**
	 * The table fields to be filled or updated.
	 *
	 * @var array
	 */
	 
	protected $fillable = array('property_id', 'user_id', 'is_interested');
	
	public $timestamps = false;
	
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