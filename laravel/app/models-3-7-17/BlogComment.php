<?php

class BlogComment extends Eloquent{
	use SortableTrait;

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blog_comments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable = array('blog_id', 'user_id',  'status', 'message');
 
 

}
