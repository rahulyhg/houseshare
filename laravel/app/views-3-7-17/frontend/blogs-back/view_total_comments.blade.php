<div id ="totalComments">
	
	{{ Form::hidden('total_comment', count($comments), array('id' => 'total_comment')) }}
	
	@if(!empty($comments))
		@foreach($comments as $val)
			<div class="blog_comment"><?php
				$image_name  = ($val->role_id ==4)?$val->logo:$val->photo;
				$image_path  = ($val->role_id ==4)?'institutions':'users/profile/thumb';
				$name  = ($val->role_id ==4)?$val->institution_name:$val->first_name." ".$val->last_name; ?>
				
				{{GeneralHelper::showImage($image_name, '', '', '', $name, $image_path)}}
				<div class="right_blog_section">
					<h4>
						{{$name}}
						<span class="time-review">{{date('F d, Y h:iA', strtotime($val->created_at))}}</span>
					</h4>
					<p>{{$val->message}}</p>
				
				</div>
			</div>
		@endforeach
	@endif
</div>