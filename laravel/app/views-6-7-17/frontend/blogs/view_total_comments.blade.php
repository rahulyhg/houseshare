<div id ="totalComments">
	
	{{ Form::hidden('total_comment', count($comments), array('id' => 'total_comment')) }}
	
	@if(!empty($comments))
		@foreach($comments as $comment_val)
	 
			<div class="comment-wrapper">
				<div class="comment-wrapper-inner flex no-column no-wrap">
					<div class="left-side">
						{{GeneralHelper::showUserImg($comment_val->photo, 'img-responsive', '50px;', '', $comment_val->first_name)}}
					</div>
					<div class="right-side">
						<h4 class="dark">{{$comment_val->first_name.' '.$comment_val->last_name}}</h4>
						<p>{{$comment_val->message}}</p>
						<div class="comment-meta flex items-center no-wrap no-column">
							<h6>{{GeneralHelper::get_time_formate($comment_val->created_at)}}</h6>
						</div>
					</div>
				</div>
			</div>  
			 
		@endforeach
	@endif
</div>