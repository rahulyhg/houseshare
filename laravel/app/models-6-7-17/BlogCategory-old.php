<?php

class BlogCategory extends Eloquent {

	use SortableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_categories';
	
	/**
	 * The table fields to be filled or updated.
	 *
	 * @var array
	 */
	 
	protected $fillable = array('name', 'status');
	
	/**
	 * The validation rules for form fields.
	 *
	 * @var array
	 */
	 
	
	public static function validate($input, $type=null){
		
		$rules = array(
			'title'    => 'required',
			'description'    => 'required',
			'first_name'    => 'required',
			'last_name'    => 'required',
			'post_code'    => 'required',
			'i_am_type'    => 'required',
			'area'    => 'required',
		);
		
		$messages = array(
			'title.required' => 'Title is required.',   
			'description.required' => 'Description is required.',   
			'first_name.required' => 'First name is required.',   
			'last_name.required' => 'Last name is required.',   
			'post_code.required' => 'Postcode is required.',   
			'i_am_type.required' => 'This field is required.',   
			'area.required' => 'This field is required.',   
		);
		 
        return Validator::make($input, $rules, $messages);
	} 
	 
	
}