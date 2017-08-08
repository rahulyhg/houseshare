<?php

class Blog extends Eloquent{
	use SortableTrait;

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blogs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('title', 'slug', 'content', 'user_id', 'subject_id', 'status', 'image');
	

	public static function validate($input) {
		$rules = array(
			'title' => 'required',
			'subject_id' => 'required',
			'content' => 'required',
			'status' => 'required',
			//'subject_id' => 'required',
		);
		
		$messages = array(
			'title.required' => 'Title is required.',
			'subject_id.required' => 'Category is required.',
			'Content.required' => 'Content is required.',
			'Status.required' => 'Status is required.',
			//'subject_id.required' => 'Category is required.'
		);

		
        return Validator::make($input, $rules, $messages);
	}
	 

}
