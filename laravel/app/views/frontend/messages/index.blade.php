@extends('frontend/layouts/default')
@section('title')
Inbox Message
@stop

@section('content') 

<?php 
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
$current_action = (isset($action[1]) and $action[1])?$action[1]:''; ?>

<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
				
				<div class="right-side-content"> 
					
					@include('Elements/User/my_account_top')
					
					<div class="tab-content" style="padding:0 10px 10px">
						
						<h3>My messages</h3>
						<ul class="nav nav-pills">
							<li class="{{($controller=='MessageController' && in_array($current_action,array('compose')))?'active':''}}"><a href="{{URL::to('/compose')}}">Compose</a></li>
							<li class="{{($controller=='MessageController' && in_array($current_action,array('index')))?'active':''}}"><a href="{{URL::to('messages')}}">Inbox</a></li>
							<li class="{{($controller=='MessageController' && in_array($current_action,array('send')))?'active':''}}"><a href="{{URL::to('/send')}}">Sent</a></li>
							<li><a href="javascript:;" onclick="deleteMessage()" class="trash">Deteled</a></li>
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane fade in active">
								
								<h3>Inbox</h3>
								<div>
									<div class="mail-option">
										<div class="chk-all">
											<input class="ckbCheckAll mail-checkbox mail-group-checkbox" type="checkbox">
											<div class="btn-group">
												<a data-toggle="dropdown" href="javascript:;" class=" btn mini all" aria-expanded="false">All</a>
											</div>
										</div>
										<div class="btn-group">
											<a href="javascript:window.location.reload();" class="btn mini tooltips" aria-expanded="false">
												<i class=" fa fa-refresh"></i>
											</a>
										</div>
									</div>
								</div>
								
								<table class="table table-inbox table-hover">
									<tbody>
										
										@if(!$data->isEmpty())
										@foreach($data as $val)
										<tr onclick="hideShowdiv('{{$val->id}}','{{($val->read_status==1)?'':'unread'}}')" class="{{($val->read_status==1)?'':'unread'}} unread-cls-{{$val->id}}">
											<td class="inbox-small-cells">
												<input type="checkbox" class="member_id mail-checkbox" name="member_id" value="{{$val->id}}">
											</td>
											<td data-toggle="modal" data-target="#message_popup_{{$val->id}}" class="view-message  dont-show">{{$val->first_name.' '.$val->last_name}}</td><?php 
												$messages_title = !empty($val->messages_title)?strip_tags($val->messages_title):''; 
												$messages_content = !empty($val->messages_content)?strip_tags($val->messages_content):''; 
												$messages_title_show = ($messages_title)?'<b>'.$messages_title.'</b> - ':'';
											$full_messages = $messages_title_show.$messages_content; ?>
											<td data-toggle="modal" data-target="#message_popup_{{$val->id}}" class="view-message ">{{(strlen($full_messages)>45?substr($full_messages,0,45).'...':$full_messages)}}</td>
											<td class="view-message  inbox-small-cells"></td>
											<td class="view-message  text-right">{{ GeneralHelper::get_time_formate($val->created_at, false) }}</td>
										</tr>
										
										<!-- Modal -->
										<div id="message_popup_{{$val->id}}" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Message Details ({{$val->first_name.' '.$val->last_name}})</h4>
													</div>
													<div class="">
														<div style="padding-top: 2%;" class="col-sm-12">
															<div class="col-sm-2">
																<label><b>Subject:</b></label>
															</div>
															<div class="col-sm-10">
																<p>{{$val->messages_title}}</p>
															</div>
														</div>
														<div class="col-sm-12">
															<div class="col-sm-2">
																<label><b>Message:</b></label>
															</div>
															<div class="col-sm-10">
																<p>{{$val->messages_content}}</p>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div> 
										
										
										@endforeach
										@else
										<tr class="">
											<td colspan="6" class="no_records">Record not found.</td> 
										</tr>
										@endif  
									</tbody>
								</table>
								
								<div style="float:right;" class="full-pagging">
									{{ $data->links()}}
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="left-sidebar-menu">
					@include('Elements/User/my_account_left_side')
				</div>	
				
			</div>
		</div>
	</div>
</div> 


<script type="text/javascript"> 
	
	$(document).ready(function () {
        $(".ckbCheckAll").click(function () {
			
			if($(".ckbCheckAll").is(':checked')){
				$('.member_id').prop("checked", true);
				} else {
				$('.member_id').prop("checked", false);
			}                
            
		});
		
		
	});
	
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
		if(type=='unread'){
			$('.unread-cls-'+id).removeClass('unread');
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