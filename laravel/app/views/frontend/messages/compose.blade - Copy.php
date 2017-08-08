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
					<div id="" class="tab-pane fade in active"> 
						
						<div class="row over">
						
							<div class="col-md-3"> 
								
								<ul class="inbx-left mt-21" style="margin-top: 11px;"><?php 
									$messages_count = GeneralHelper::messages_count();
									$important_count = GeneralHelper::important_count(); ?> 
									<li> <a href="{{URL::to('/messages/'.Route::Input('group_id'))}}"><i class="fa fa-envelope"></i> Inbox {{($messages_count)?'('.$messages_count.')':''}}</a> </li>
									<li> <a href="{{URL::to('/send/'.Route::Input('group_id'))}}"><i class="fa fa-inbox"></i> Sent </a> </li>
									<li> <a href="{{URL::to('/important/'.Route::Input('group_id'))}}"><i class="fa fa-star-o"></i> Important  {{($important_count)?'('.$important_count.')':''}}</a> </li>
									<li> <a href=""> Labels <i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i></a> </li>
								</ul> 
								
								<div class="msg-btn"> 
									<a  data-toggle="collapse" href="#collapsemember" aria-expanded="true" aria-controls="collapseExample">  <h5><b>MEMBERS</b></h5> </a>
								</div>
								
								<div style="overflow-y: scroll; max-height: 200px;" class="collapse in" id="collapsemember" aria-expanded="true">
									<div class="white-bg-compo">
										<div class="checkbox">
										
											@if(!empty($member))
											
											@foreach($member as $member_val)
										
											<label onclick="sendMail('test',{{$member_val->id}})"  class="chk-lbl">
												<input class="member_id"  type="checkbox" id="user_id_{{$member_val->id}}" name="user_id" value="{{$member_val->id}}">
												<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
												<p class="label_name_{{$member_val->id}}">Tet</p>
												<input class="member_name" type="checkbox" id="user_name_{{$member_val->id}}" name="user_name" value="Test">
											</label>
											
											@endforeach
											
											@else
											<label class="chk-lbl">
												<p class="no_records">No records found</p>
											</label>
											@endif 
											 
										</div>
									</div> 
								</div> 
							</div><?php
							
							$get_name = $get_id = $get_subject = '';
							if($message && $type=='reply'){
								$get_name = GeneralHelper::getUserName($message->sender_id);
								$get_id = $message->sender_id;
							} 
							
							if($type=='reply'){ 
								$get_subject = 'Re: '.$message->messages_title;
							} 
							
							if($type=='forward'){ 
								$get_subject = 'Fw: '.$message->messages_title;
							} 
							
							?>
							
							<div class="col-md-9">
								
								{{ Form::open(array('url' => array('/compose/'.Route::Input('group_id').'/'.Route::Input('message_id').'/'.Route::Input('type')), 'name'=>'composeForm', 'id'=>'composeForm', 'files'=>true)) }}
								
								<div class="msg-btn-1">
									<a href="javascript:;">  <h5><b>New Message</b></h5> </a>
								</div>
								<div class="mid-bg">
									
									<div class="form-group marg {{ ($errors->first('email') || $errors->first('user_id'))?'has-error':''}}"> 
										{{ Form::text('email',$get_name, array('id'=>'email', 'readonly'=>true, 'placeholder'=> 'To', 'class'=>'form-control frm-info'))}} 
									</div> 
									
									{{ Form::text('member_id',$get_id, array('id'=>'member_id', 'placeholder'=> 'To', 'style'=>'display:none;', 'class'=>'form-control frm-info'))}}
									
									<div class="form-group marg {{ ($errors->first('subject'))?'has-error':''}}"> 
										{{ Form::text('subject',$get_subject, array('id'=>'subject', 'placeholder'=> 'Subject', 'class'=>'form-control frm-info'))}}
									</div>
									
									<div class="form-group marg1  {{ ($errors->first('message'))?'has-error':''}}">					
										{{ Form::textarea('message',null, array('rows'=>7, 'placeholder'=> '', 'class'=>'ckeditor form-control jui'))}} 
										<span class="help-block"> {{$errors->first('message')}} </span>
									</div>  
									
								</div>
								
								<div class="row">
									<div class="col-md-7 col-sm-7 col-xs-7">
										<div class="srch-btn">
											
											<div class="form-group">
												<input type="file" name="file" class="file">
												<div class="input-group col-xs-12"> 
													<input type="text" class="form-control" disabled="" placeholder="Click to upload file">
													<span class="input-group-btn">
														<button class="browse btn btn-11" type="button"> Choose</button> 
													</span>
												</div>
											</div>
											
											
										</div>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-5">
										<div class="btn-mg">  <a href="javascript:;" onclick="document.getElementById('composeForm').submit();" class="btn-snd submit"> Send </a>  </div>
										
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
<?php /*
{{ HTML::style('css/frontend/css/jquery-ui.css') }}
{{ HTML::script('js/frontend/js/jquery-ui.js') }} */ ?>

<script type="text/javascript"> 
		
	function sendMail() {
		var items = $(".member_id");
		var result = [];
		var result_name = [];
		for (var i = 0; i < items.length; i++) {
			var item = $(items[i]);
			if (item.is(":checked")) { 
				label_name = $('.label_name_'+item.val()).text(); 
				result_name.push(label_name);
				result.push(item.val());
			}
		}
		
		var text = result.join(",");
		var text_name = result_name.join(",");
		$("#member_id").val(text);
		$("#email").val(text_name);
		
		 
	}  
	
	
	$(function(){
		$('.clickable').on('click',function(){
			var effect = $(this).data('effect');
			$(this).closest('.panel')[effect]();
		})
	})  
	
	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});
	
	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
	
</script> 


@stop																																