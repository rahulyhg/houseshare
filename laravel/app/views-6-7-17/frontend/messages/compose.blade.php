@extends('frontend/layouts/default')
@section('title')
Compose Message
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
						
						<h3>Compose</h3>
						<ul class="nav nav-pills">
							<li class="{{($controller=='MessageController' && in_array($current_action,array('compose')))?'active':''}}"><a href="{{URL::to('/compose')}}">Compose</a></li>
							<li class="{{($controller=='MessageController' && in_array($current_action,array('index')))?'active':''}}"><a href="{{URL::to('messages')}}">Inbox</a></li>
							<li class="{{($controller=='MessageController' && in_array($current_action,array('send')))?'active':''}}"><a href="{{URL::to('/send')}}">Sent</a></li>
							<li><a href="javascript:;" onclick="deleteMessage()" class="trash">Deteled</a></li>
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane fade in active"> 
										
								<div class="col-md-1">&nbsp;</div>
								<div class="col-md-10">
								
									{{ Form::open(array('url' => array('/compose'), 'name'=>'composeForm', 'id'=>'composeForm', 'files'=>true)) }}
										
										<div class="msg-btn-1">
											<a href="javascript:;">  <h5><b>New Message</b></h5> </a>
										</div>
										
										<div class="mid-bg">
										
											<div class="form-group marg {{ ($errors->first('email') || $errors->first('user_id'))?'has-error':''}}"> 
												{{ Form::select('user_id[]', $member, null, array('multiple', 'size'=>5, "id"=>"user_role",'style'=>'border: 1px solid #ccc; height:100px;', 'class' => 'form-control frm-info'))}}
												<span class="help-block"> {{$errors->first('user_id')}} </span>
											</div> 
											 
											<div class="form-group marg {{ ($errors->first('subject'))?'has-error':''}}"> 
												{{ Form::text('subject',null, array('id'=>'subject', 'placeholder'=> 'Subject', 'style'=>'border: 1px solid #ccc;',  'class'=>'form-control frm-info'))}}
												<span class="help-block"> {{$errors->first('subject')}} </span>
											</div>
											
											<div class="form-group marg1  {{ ($errors->first('message'))?'has-error':''}}">					
												{{ Form::textarea('message',null, array('rows'=>7, 'placeholder'=> 'Message...', 'style'=>'border: 1px solid #ccc;', 'class'=>'ckeditor form-control jui'))}} 
												<span class="help-block"> {{$errors->first('message')}} </span>
											</div>  
											
										</div>
										
										<div class="row"> 
											<div class="col-md-5 col-sm-5 col-xs-5">
												<div class="btn-mg">  
													<a href="javascript:;" onclick="document.getElementById('composeForm').submit();" class="btn-snd submit button"> Send </a> 
												</div>
											</div>
										</div>
									
									{{Form::close()}}
								
								</div>
								<div class="col-md-1">&nbsp;</div>
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