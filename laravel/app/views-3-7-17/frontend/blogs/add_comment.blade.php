@if(Auth::check())

<h3>Leave a comment</h3>
 
<div id="show_alert"><?php echo (isset($data_arr['flash_msg']))?$data_arr['flash_msg']:''; ?></div>
 
<form id="commentForm" class="comment-form" action="javascript:void(0);" name="commentForm"><?php 
	$message 	= (isset($data_arr['message']))?$data_arr['message']:null; ?>
	{{ Form::hidden('blog_id', $data->id, array('id' => 'blog_id')) }}
	<div class="form-group">
		{{Form::textarea('message', $message, array('placeholder' => 'Submit comment', 'id' => 'cmt_msg', 'class'=>'form-control', 'autocomplete'=>'off', 'style'=>'width:100%;resize:none', 'rows' => 5))}}
		<span id="error_comment"  class="red show_error_msg"></span>
	</div> 
		<button type="submit" onclick="submit_form()" class="button">Submit comment</button> 
</form> 

<?php /*@include('frontend/blogs/view_total_comments') */ ?>
@else
	{{ Form::hidden('blog_id', $data->id, array('id' => 'blog_id')) }}
@endif