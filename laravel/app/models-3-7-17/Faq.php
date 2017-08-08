<?php

class Faq extends Eloquent{
	use SortableTrait;

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'faqs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	
	public function setUpdatedAt($value)
	{
		//Do-nothing
	}
	
	public function getUpdatedAtColumn()
	{
		//Do-nothing
	}
	
	
	public static function validate($input) {
		$rules = array(
			'question' => 'required',
			'answer' => 'required'
		);
		
		$messages = array(
			'question.required' => 'Question is required.',
			'answer.required' => 'Answer is required.'
		);

        return Validator::make($input, $rules, $messages);
	}

}
