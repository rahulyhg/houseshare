<?php

class Message extends Eloquent{
	use SortableTrait;

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'messages';
	
	
	protected $fillable = array('parent_id', 'sender_id', 'receiver_id', 'messages_title', 'messages_content', 'read_status', 'approve_status', 'istrash', 'sender_delete', 'receiver_delete', 'is_important', 'file');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	
	
	public static function validate($input) {
	
		$rules = array(
			//'user_id'  => 'required',
			//'subject'  => 'required',
			//'user_id'  => 'required',
		);
		
		$messages = array(
			'user_id.required' =>  'Please select user.',
			//'subject.required' =>  'Subject is required',
			//'user_id.required' =>  'Email is required',
		);

        return Validator::make($input, $rules, $messages);
	}
	

}