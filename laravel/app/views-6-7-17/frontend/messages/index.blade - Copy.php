@extends('frontend/layouts/default')
@section('title')
Messages
@stop

@section('content') 

<?php
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
$current_action = (isset($action[1]) and $action[1])?$action[1]:''; ?> 

<section>
	<div class="container">
		<div class="row">
			 
			
			<div class="col-md-9">
				 
				
				
				
				<div class="tab-content">
					
					<div id="menu1" class="tab-pane fade in active">
						
						<div class="row over">
							<div class="col-md-12">
								
								<ul class="mssg1ul"> 
									<li> 
										<a href="{{URL::to('/compose/'.Route::Input('group_id'))}}" class="com"> <i class="fa fa-pencil-square-o"></i>COMPOSE</a> 
										<a href="javascript:window.location.reload();" class="rfrsh"> <i class="fa fa-refresh"></i> </a> 
										<a href="javascript:;" onclick="deleteMessage()" class="trash"> <i class="fa fa-trash-o"></i> </a>	
									</li>
									<li>  
										{{ Form::open(array('url' => array('/messages/'.Route::Input('group_id')), 'name'=>'Search', 'id'=>'messageForm', 'files'=>true)) }} 
										<div class="input-group add-on">
											{{ Form::text('keyword',isset($_POST['keyword'])?$_POST['keyword']:null, array('placeholder'=> 'Search', 'class'=>'form-control bor-no'))}}  
											<div class="input-group-btn">
												<button class="btn btn-default ck" type="submit"><i class="glyphicon glyphicon-search"></i></button>
											</div>
										</div>
										{{Form::close()}} 
									</li>
									<li> 
										<?php /*<a href="" class=""><i class="fa fa-angle-left"></i></a> 1-24 of 33 <a href="" class=""><i class="fa fa-angle-right"></i></a> */ ?>
									</li> 
								</ul> 
								
								
								<div class="row">
									<div class="col-md-3">
										<ul class="inbx-left mt-21"><?php 
											$messages_count = GeneralHelper::messages_count();
											$important_count = GeneralHelper::important_count(); ?> 
											<li> <a href="{{URL::to('/messages/'.Route::Input('group_id'))}}"><i class="fa fa-envelope"></i> Inbox {{($messages_count)?'('.$messages_count.')':''}}</a> </li>
											<li> <a href="{{URL::to('/send/'.Route::Input('group_id'))}}"><i class="fa fa-inbox"></i> Sent </a> </li>
											<li> <a href="{{URL::to('/important/'.Route::Input('group_id'))}}"><i class="fa fa-star-o"></i> <span class="inboxCount">Important  {{($important_count)?'('.$important_count.')':''}}</span></a> </li>
											<li> <a href=""> Labels <i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i></a> </li>
										</ul>
									</div>
									
									<div class="col-md-9"> 
										<div class="message1 white">
											<div class="">
												<div class="announce discuss">
													<div class="content">
														<nav>
															
															
															<div id="menu" class="menu"> 
																<ul> 
																	
																	@if(! $data->isEmpty())
																	
																	@foreach($data as $val)
																	
																	<li> 
																		
																		<div class="row gtd">
																			<div class="col-md-3 col-sm-3">
																				<div class="checkbox">
																					<label>
																						<input type="checkbox" class="member_id" name="member_id" value="{{$val->id}}">
																						<span class="cr thi"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
																						<p class="mkl">{{ $val->user_id}}</p>
																					</label>
																				</div>
																			</div> 
																			
																			<div class="col-md-1 col-sm-1"><?php 
																				$is_important = $val->is_important; ?>
																				<a id="important_hy_{{$val->id}}" onclick="important({{$val->id}},{{$is_important}})" href="javascript:;"><i  id="important_{{$val->id}}" class="fa fa-star{{($is_important)?'':'-o'}}"></i></a>
																			</div> 
																			<div class="col-md-5 col-sm-5"><?php 
																				$messages_title = !empty($val->messages_title)?strip_tags($val->messages_title):''; 
																				$messages_content = !empty($val->messages_content)?strip_tags($val->messages_content):''; 
																				$messages_title_show = ($messages_title)?'<b>'.$messages_title.'</b> - ':'';
																				$full_messages = $messages_title_show.$messages_content;
																			?>
																			<p style="cursor: pointer;" onclick="hideShowdiv('{{$val->id}}','show')" class="mkl text_link_{{$val->id}}">{{(strlen($full_messages)>45?substr($full_messages,0,45).'...':$full_messages)}}</p>
																			</div>
																			<div class="col-md-3 col-sm-3">
																				<p class="mkl">{{ GeneralHelper::get_time_formate($val->created_at, false) }}</p>
																			</div> 
																		</div>
																		
																		
																		<ul class="sub_text_{{$val->id}} submenu acc- comman_message"> 
																			<li>
																				<p><b>Subject :-</b> {{$val->messages_title}}</p>
																				<p>{{$val->messages_content}}</p>
																				
																				
																				<div style="padding: 0%;" class="col-md-11 col-sm-11 replyicon">
																					{{ GeneralHelper::getImageExt($val->file,$val->id,'messages/') }} 
																				</div>
																				<div style="padding: 0%;" class="col-md-1 col-sm-1 replyicon"> 
																					<a title="Reply" href="{{URL::to('/compose/'.Route::Input('group_id').'/'.$val->id.'/reply')}}"><i class="fa fa-reply" aria-hidden="true"></i></a>
																					<a title="Forward" href="{{URL::to('/compose/'.Route::Input('group_id').'/'.$val->id.'/forward')}}"><i class="fa fa-share" aria-hidden="true"></i></a> 
																				</div>

																				
																			</li> 
																		</ul>
																	</li> 
																	
																	@endforeach
																	
																	@else
																	<div class="row gtd"> 
																		<p class="no_records">No messages matched your search.</p> 
																	</div>
																	@endif  
																	
																	
																</ul> 
																
																
															</div> 
															
															
															
															
														</nav>
														
													</div>
													<div style="float:right;" class="full-pagging">
														{{ $data->links()}}
													</div>

												</div>
											</div>
										</div> 
									</div> 									
									
								</div>
							</div> 
						</div> 
					</div>
				</div> 
			</div> 
		</div>
	</div> 
</section>	



<script type="text/javascript"> 
	
	function important(id,is_important){
	
		$("#important_hy_"+id).attr('onclick', ""); 
		jQuery.ajax({
			type: "POST",
			url: "{{ URL::to('/important-is') }}",
			dataType: 'json',
			data: {id:id,is_important:is_important},  
			success: function(data){ 
				if(data.type=='success'){
					if(data.msg==0) {
					 	$("#important_"+id).removeClass( "fa-star" ).addClass( "fa-star-o" );
						$("#important_hy_"+id).attr('onclick', "important("+id+","+data.msg+")");
					} else {
						$("#important_"+id).removeClass( "fa-star-o" ).addClass( "fa-star" );
						$("#important_hy_"+id).attr('onclick', "important("+id+","+data.msg+")");
					} 
					$('.inboxCount').text('Important ('+data.important_count+')'); 
				}   
				
			}
		});
		//$("#important_hy_"+id).attr('onclick', "important("+id+","+is_important+")"); 
	}
	
	function hideShowdiv(id,type){
		
		$('.comman_message').hide();
		if(type=='show'){
			$('.text_link_'+id).attr('onclick', "hideShowdiv("+id+",'hide')"); 
			$('.sub_text_'+id).show();
			
			jQuery.ajax({
				type: "POST",
				url: "{{ URL::to('/update-message') }}",
				dataType: 'json',
				data: {member_id:id},  
				success: function(data){ 
					if(data.success){ 
					} 
				}
			});
			
			} else {
			$('.text_link_'+id).attr('onclick', "hideShowdiv("+id+",'show')"); 
			$('.sub_text_'+id).hide();
		}
	} 
	
	function deleteMessage(){
		var items = $(".member_id");
		var result = []; 
		for (var i = 0; i < items.length; i++) {
			var item = $(items[i]);
			if (item.is(":checked")) { 
				result.push(item.val());
			}
		} 
		var member_id = result.join(",");
		
		if(member_id){
			confirm_message = confirm('Are you sure, you want to remove this message?');
			if(confirm_message){ 
				jQuery.ajax({
					type: "POST",
					url: "{{ URL::to('/delete-message') }}",
					dataType: 'json',
					data: {member_id:member_id},  
					success: function(data){ 
						if(data.success){
							$('input:checkbox').removeAttr('checked');
							location.reload();
						} 
					}
				});
				
			}
		} else {
			alert('Please select message.');
		} 
	}
	
</script>


@stop																																