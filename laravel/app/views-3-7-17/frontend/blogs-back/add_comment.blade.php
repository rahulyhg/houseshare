@if(Auth::check())
<div class="headding-black"><h2>{{Lang::get('ViewMessage.Comments')}}</h2></div>
<div id="show_alert"><?php echo (isset($data_arr['flash_msg']))?$data_arr['flash_msg']:''; ?></div>

	<div class="row">
		<div class="col-lg-12">
			<form id="commentForm" action="javascript:void(0);" name="commentForm"><?php 
				$message 	= (isset($data_arr['message']))?$data_arr['message']:null; ?>
			
				{{ Form::hidden('blog_id', $data->id, array('id' => 'blog_id')) }}
				<div class="form-group">
					{{Form::textarea('message', $message, array('placeholder' => Lang::get('ViewMessage.Your_comment_goes_here'), 'id' => 'cmt_msg', 'class'=>'form-control', 'autocomplete'=>'off', 'style'=>'width:100%;resize:none', 'rows' => 2))}}
					<span id="error_comment"  class="red show_error_msg"></span>
				</div>
				<div class="button review-submit">
					<button id="send_comment" type="submit" onclick="submit_form()" class="btn btn-success chang-button-style small-bu courses-bu">
						{{ Lang::get('ViewMessage.Submit') }}
					</button>
				</div>
			</form>
		</div>
	</div>


@include('frontend/blogs/view_total_comments')
@else
	{{ Form::hidden('blog_id', $data->id, array('id' => 'blog_id')) }}
@endif