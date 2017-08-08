@extends('frontend/layouts/default')
@section('title')
	Update Discussion
@stop

@section('content') 

<?php
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
	$current_action = (isset($action[1]) and $action[1])?$action[1]:''; ?>

<section>
	<div class="container">
		<div class="row">
		   
			@include('frontend/users/group_left')  
		   
			<div class="col-md-9">
			
				@include('frontend/users/group_top_menu')  
				 
				
				<div class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
			  
						<div class="row over">
							<div class="col-md-12"> 
								{{ Form::open(array('url' => array('/discussion-edit/'.Route::input('group_id').'/'.Route::input('topic_id')), 'name'=>'SearchGroup', 'id'=>'discussionForm', 'files'=>true)) }} 
									<div class="create-diss1 white m-t-30">
										<div class="">
											<div class="form-group">					
												<label for="name" class="lab-bh">Discussion Name<span class="red">*</span></label>
												<div class="input-group">
												
													{{ Form::text('discussion_name',null, array('id'=>'discussion_name', 'placeholder'=> 'New Discussion', 'class'=>'form-control jui'))}} 
													{{ Form::text('discussion_name_id',null, array('id'=>'discussion_name_id', 'placeholder'=> 'New Discussion', 'style'=>'display:none;', 'class'=>'form-control jui'))}} 
													 
														<div class="input-group-btn">
															<div class="btn-group" role="group">
																
																<div class="dropdown dropdown-lg">
																	
																	<button type="button" class="btn btn-default ghy dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
																	<div class="dropdown-menu dropdown-menu-right" role="menu">
																		<ul class="oloi">
																			@if(!empty($discussion_data))
																				<li><a onclick="unsetdiscussionNameChanges()" href="javascript:;">Please Select Discussion</a></li> 
																				@foreach($discussion_data as $discussion_val) 
																					<li><a onclick="discussionNameChanges('{{$discussion_val->name}}','{{$discussion_val->id}}')" href="javascript:;">{{$discussion_val->name}}</a></li> 
																				@endforeach
																			@else
																				<li><a onclick="unsetdiscussionNameChanges()" href="javascript:;">Record not found.</a></li> 
																			@endif
																		</ul>
																	</div>
																 
																</div> 
																
															</div>
														</div>
													
													
												</div> 
												<span class="help-block"> {{$errors->first('discussion_name')}} </span>
											</div> 
											
											<div class="form-group discussion_topic" style="display:none;">	
												<label for="name" class="lab-bh">Discussion Name </label>		  
												<ul class="wel html_topic"> 
												</ul>
											</div>  
											 
											<div class="form-group">					
												<label for="topic_name" class="lab-bh">Topic Name<span class="red">*</span></label>
												{{ Form::text('topic_name',$topic_data->title, array('placeholder'=> 'New Topic', 'class'=>'form-control jui'))}}
												<span class="help-block"> {{$errors->first('topic_name')}} </span>
											</div>   
									  
											<div class="row"> 
												<div class="col-md-12">
													<div class="text-center"> 
														<a href="javascript:;" onclick="document.getElementById('discussionForm').submit();"  class="rrri"> Update </a> 
													</div>
												</div> 
											</div> 
										</div>
									</div> 
								{{Form::close()}}
							</div> 
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 

<script type="text/javascript">
 
	$(document).ready(function() { 
		<?php 
		$discussion_name_id =  Request::old('discussion_name_id');
		$discussion_name    =  Request::old('discussion_name'); 
		
		if($discussion_name_id=='' && $discussion_name==''){
			$discussion_name_id =  $discussion_data_edit->id;
			$discussion_name    =  $discussion_data_edit->name; 			
		} 
		
		if($discussion_name_id && $discussion_name){ ?>
			discussionNameChanges('{{$discussion_name}}','{{$discussion_name_id}}');<?php 
		} ?> 
	});
 
	function unsetdiscussionNameChanges(){ 
		$('.discussion_topic').hide(); 
		$('#discussion_name').val('');
		$('#discussion_name').attr('readonly', false);
		$('#discussion_name_id').val(''); 
	}
 
	function discussionNameChanges(name, id){ 
		$('.discussion_topic').show();
		$.ajax({
			url: "{{URL::to('get-topic-list/"+id+"')}}",
			type: "POST",             
			dataType: "html", 
			success: function(data){
				$('.html_topic').html(data);
				$('#discussion_name').val(name);
				$('#discussion_name').attr('readonly', true);
				$('#discussion_name_id').val(id);
			} 
		}); 
	} 
		
	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});
		
	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});

</script>

	 
@stop							