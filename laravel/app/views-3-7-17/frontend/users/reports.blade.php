@extends('frontend/layouts/default')
@section('title')
Reports
@stop

@section('content')  

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			<div class="col-md-9">
				
				@include('frontend/users/setting_top_menu')
				
				<div class="report-white m-t-35">
					
					<table class="table table-striped text-center gts">
						<thead>
							<tr>
								<th>{{ SortableTrait::link_to_sorting_action('message', 'Title' ) }}</th>
								<th>{{ SortableTrait::link_to_sorting_action('created_at', 'Date' ) }}</th> 
								<th>{{ SortableTrait::link_to_sorting_action('subject', 'Reason' ) }}</th>
								<th>{{ SortableTrait::link_to_sorting_action('m_action', 'M Action' ) }}</th>
								<th>{{ SortableTrait::link_to_sorting_action('first_name', 'Posted By' ) }}</th> 
								<th>Action</th> 
							</tr>
						</thead>
						<tbody>
						
							@if(! $data->isEmpty())
					
								@foreach($data as $val)  
									<tr>
										<td><a style="cursor: pointer;" class="box-select" data-toggle="collapse" data-target="#demo-content_{{$val->id}}" aria-expanded="true">{{strlen(strip_tags($val->message))>10?substr(strip_tags($val->message),0,10).'...':strip_tags($val->message)}}</a></td> 
										<td>{{date('M d,Y', strtotime($val->created_at))}}</td>   
										<td>{{($val->subject)?$val->subject:'---'}}</td>
										<td>{{ Config::get('constants.M_ACTION.'.$val->m_action) }}</td>
										<td>{{GeneralHelper::getUserName($val->user_id)}}</td>
										<td class="icons-dei-edt">
											@if($val->m_action!=2)
											<a href="{{URL::to('/report-edit/'.$val->id.'/'.Route::input('group_id'))}}"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
											<a href="#remove_{{ $val->id }}" data-toggle='modal' title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a> 
											@else
												---
											@endif 
										</td> 
									</tr>
									<tr id="demo-content_{{$val->id}}" class="collapse"> <td colspan="6"> 
										<div class="content-description">
											<div class="dt text-left"> 
												<p>{{GeneralHelper::getUserName($val->user_id)}}<span class="pull-right">{{ GeneralHelper::get_time_formate($val->created_at, false) }}</span></p>	
												<p>&nbsp;<span class="pull-right">
														@if($val->m_action!=2)
														<a href="{{URL::to('/report-edit/'.$val->id.'/'.Route::input('group_id'))}}"> <i class="fa fa-pencil"></i></a>
														<a href="#remove_{{ $val->id }}" data-toggle='modal' title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></a> 
														@endif
													</span></p>
											</div>
											
											<div class="wq text-left">
												<h4>{{($val->subject)?$val->subject:'---'}}</h4>
												<p>{{($val->message)?$val->message:'---'}}</p>
											</div>
											
											<div class="dty text-left"><?php
												$get_discussion_data = GeneralHelper::getDiscussionName($val->comment_discussion_id);
												$get_topic_data = GeneralHelper::getTopicName($val->comment_topic_id);
												$get_discussion_name = !empty($get_discussion_data->name)?$get_discussion_data->name:''; 
												$get_topic_name = !empty($get_topic_data->title)?$get_topic_data->title:'';  ?>
												<span>{{$get_discussion_name}} <br/>{{$get_topic_name}}</span>	
												<div class="checkbox">
													<label> 
														<p class="mkl">{{GeneralHelper::getUserName($val->comment_user_id)}}</p>
													</label>
												</div>
												<p>{{($val->comment_subject)?$val->comment_subject:'---'}}</p>
												<p style="border-bottom: unset;" id="comment_edit_{{$val->id}}" onclick="commentEdit({{$val->id}})">{{($val->comment)?$val->comment:'---'}}</p>
												 
											</div>
										</div>
									</td> 
									
									</tr>
									
									
									
									<div class="modal fade" id="remove_<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h3 class="modal-title">Remove</h3>
												</div>
												<div class="modal-body">Are you sure, you want to remove this report?</div>
												<div class="modal-footer">
													{{ HTML::linkAction('UserController@report_remove', 'Confirm', array($val->id,Route::input('group_id')), array('class'=>'btn btn-primary','title'=>'Confirm Remove')) }}
													<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
												</div>
											</div>
										</div>
									</div>
							
		
								@endforeach

							@else
								<tr>
									<td colspan="6">
									<p class="no_records">No records found</p>
									</td>
								</tr>
							@endif  
							
							
						</tbody>
					</table> 
					
				</div> 
				
				<div style="float:right;" class="full-pagging">
					{{ $data->links()}}
				</div>
				
				
			</div>
		</div>
	</div>
</section>  

<script>
	
	// $.fn.editable.defaults.mode = 'inline';  
	
	function commentEdit(id) { 
		/*$('#comment_edit_'+id).editable({ 
			title: 'Enter value', 
			//value: '',
			url: "{{URL::to('qualification-edit')}}", 
		}); */
	}
	 
</script>

@stop