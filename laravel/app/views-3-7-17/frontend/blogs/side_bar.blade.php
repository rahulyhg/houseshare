 <?php
$cur_sub_id  = (Route::currentRouteName() == 'blogs.view')?$data->subject_id:Route::input('id');
$subjects  = Subject::getSubjectsList('blogs'); ?>
<div class="drop-saddow-class margin-top-none">
	<div class="subject-nav">
		<ul>
			<li  class="{{($cur_sub_id == '')?'active':''}}">
				<a href="{{URL::to('blogs')}}">
					<i class="fa fa-caret-right size-ch" aria-hidden="true"></i>
					{{Lang::get('ViewMessage.All_Categories')}}
					<span>
						@if (function_exists('array_column'))
							{{ array_sum(array_column($subjects, 'course_count')) }}
						@else
							<?php $myCount = GeneralHelper::array_column2($subjects, 'course_count'); ?>
							{{ array_sum($myCount) }}
						@endif
					</span>
				</a>
			</li>
			@foreach($subjects as $subject)
				
				<li class="{{( $cur_sub_id== $subject['id'])?'active':''}}">
					<a href="{{URL::to('blogs/'.$subject['id'])}}">
						<i class="fa fa-caret-right size-ch" aria-hidden="true"></i>{{$subject['name']}}<span>{{$subject['course_count']}}</span>
					</a>
				</li>
			@endforeach
		</ul>
	</div>
</div>