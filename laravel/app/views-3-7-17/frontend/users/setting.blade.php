@extends('frontend/layouts/default')
@section('title')
User Setting
@stop

@section('content') 

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			
			<div class="col-md-9 subscription">
				
				@include('frontend/users/setting_top_menu')  
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3> Choose your profile picture </h3>
								<div style="display:none;" class="msg_cls alert alert-danger alert-dismissable">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<p></p>
								</div>
							</div>
							{{ Form::open(array('url' => array('/'), 'name'=>'SearchGroup', 'id'=>'img_upload', 'files'=>true)) }} 
							<div class="modal-body">
								<div class="bh-avtar pop-up">  
									<ul>
										<?php 
											for($k=1; $k<=19; $k++) { ?> 
											<li>
												<a onClick="chooseGallery('c{{$k}}.png')" href="javascript:;">
													{{HTML::image('img/c'.$k.'.png')}}  
												</a>
												</li><?php 
											} ?> 
									</ul>  
									
									<h3 class="TITLE"><span> OR </span></h3> 
									
									<div class="m-b-10">
										<input type="file" onchange="startUpload()" id="img_select" name="img_select" class="file"/> 
										<div class="input-group col-xs-12"> 
											<span class="input-group-btn">
												<button class="browse btn btn-primary input-lg browse-bnt" type="button"> Browse</button>&nbsp;&nbsp;
												<div id="loading_box_loading">
													{{HTML::image('img/ajax-loader.gif', 'Loding..', array('id'=>'loader_img', 'style'=>'display: none;'))}} 
												</div>
											</span>
										</div>
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-default clse" data-dismiss="modal">Close</button>
										<a href="javascript:;" class="b io"> DOWNLOAD </a>
									</div> 
								</div>
							</div>
							{{Form::close()}} 
						</div>
					</div>
				</div>
				
				<div class="tab-content">
					<div id="" class="tab-pane fade in active"> 
						
						<div class="m-t-31 setting">
							
							<div class="managegrpupdte-sec-1">
								<div class="row">  
									<div class="col-md-2 Change"> <?php
										$image_path_user = 'img/c8.png'; 
										if(Auth::user()->photo && file_exists('upload/users/profile-photo/thumb/'.Auth::user()->photo)) {
											$image_path_user = '/upload/users/profile-photo/thumb/'.Auth::user()->photo;
											}else if(Auth::user()->photo && file_exists('img/'.Auth::user()->photo)) {
											$image_path_user = '/img/'.Auth::user()->photo;
										} ?>  
										
										<a href="" class="week-no" data-toggle="modal" data-target="#myModal">
											{{HTML::image($image_path_user, Auth::user()->first_name, array('id'=>'image_name', 'style'=>'background:unset;', 'class'=>'border-radius-img-cls1', 'width'=>'90'))}}  
											
										Change </a> </div>
										
										<div class="col-md-10"> 
											
											{{ Form::model($data, array('url'=>url('/setting/'.Route::input('group_id')), 'id'=>'update_profile', 'files' => true)) }} 
											
											
											<div class="form-horizontal">
												<div class="form-group">
													<label class="control-label col-sm-3" for="email">Username</label>
													<div class="col-sm-9">
														{{ Form::text('username', null, array('readonly'=>true, 'class' => 'form-control gry'))}}
														<span class="help-block"> {{$errors->first('username')}} </span> 
													</div>
												</div>
											</div>
											
											
											<div class="items">
												
												<div class="form-horizontal">
													<div class="form-group">
														<label class="control-label col-sm-3" for="email">Email ID</label>
														<div class="col-sm-9">
															{{ Form::text('email', null, array('readonly'=>true, 'class' => 'form-control gry'))}} 
															<span class="help-block"> {{$errors->first('email')}} </span> 
															<a href="javascript:;" id="btnAdd" class="add_field_button"><i class="fa fa-plus"></i> Add another Email</a>
														</div>
													</div>
												</div><?php
												
												$get_user_email = GeneralHelper::getUserEmail(Auth::id());
												if(!empty($get_user_email)){
													foreach($get_user_email as $get_user_val){ ?> 
														<div class="delete_div_new_{{$get_user_val->id}} form-horizontal">
															<div class="form-group">
																<label class="control-label col-sm-3" for="email">Other Email</label>
																<div class="col-sm-8">
																	{{ Form::text('other_email[]', $get_user_val->email, array('class' => 'form-control gry'))}}  
																</div>
																<div class="col-sm-1">
																	@if($get_user_val->status==0)
																		<a onclick="deleteDiv('new_{{$get_user_val->id}}')" href="javascript:;" style="font-size: 24px; color: red;" class="remove_field"><i class="fa fa-times"></i></a>
																	@else
																		<a href="javascript:;" style="font-size: 24px; color: green;" class="remove_field"><i class="fa fa-check"></i></a>
																	@endif
																</div>
															</div>
														</div><?php 
													} 
												} ?> 
												
											</div>
											
											<div class="form-horizontal">
												<div class="form-group">
													<label class="control-label col-sm-3" for="email">Old Password</label>
													<div class="col-sm-9">
														{{ Form::password('old_password', array('autocomplete'=>'off', 'class' => 'form-control gry')) }} 
														<span class="help-block"> {{$errors->first('old_password')}} {{$errors->first('passcheck')}} </span> 
													</div>
												</div>
											</div>
											<div class="form-horizontal">
												<div class="form-group">
													<label class="control-label col-sm-3" for="email">New Password</label>
													<div class="col-sm-9">
														{{ Form::password('new_password', array('class' => 'form-control gry')) }} 
														<span class="help-block"> {{$errors->first('new_password')}} </span> 
													</div>
												</div>
											</div>
											<div class="form-horizontal">
												<div class="form-group">
													<label class="control-label col-sm-3" for="email">Date of Birth</label>
													<div class="col-sm-9">
														{{ Form::text('dob', null, array('class' => 'form-control gry datepicker'))}} 
														<span class="help-block"> {{$errors->first('dob')}} </span>
													</div>
												</div>
											</div>
											
											<div class="form-group display-table Comm">
												<div class="d"><label>Gender</label></div>
												<div class="radio radio-inline">
													{{ Form::radio('gender', 1, '', array('id'=>'inlineRadio1'))}}   
													<label for="inlineRadio1">Male </label>
												</div>
												
												<div class="radio radio-inline"> 
													{{ Form::radio('gender', 2, '', array('id'=>'inlineRadio2'))}}   
													<label for="inlineRadio2"> Female </label>
												</div>
												<span class="help-block"> {{$errors->first('gender')}} </span>
											</div>
											<div class="form-group display-table Comm">
												<div class="d"><label>Display Post</label></div>
												<div class="radio radio-inline">
													{{ Form::radio('name_type', 3, '', array('id'=>'inlineRadio3'))}}    
													<label for="inlineRadio3"> Anonymous </label>
												</div>
												
												<div class="radio radio-inline">
													{{ Form::radio('name_type', 2, '', array('id'=>'inlineRadio4'))}}   
													<label for="inlineRadio4"> Username </label>
												</div>
												
												<div class="radio radio-inline">
													{{ Form::radio('name_type', 1, '', array('id'=>'inlineRadio40'))}}   
													<label for="inlineRadio40"> Full Name </label>
												</div>
												
												<span class="help-block"> {{$errors->first('name_type')}} </span>
											</div>
											<div class="form-group display-table Comm">
												<div class="d"><label>Privacy</label></div>
												<div class="radio radio-inline">
													{{ Form::radio('privacy_type', 1, '', array('id'=>'inlineRadio5'))}}    
													<label for="inlineRadio5"> Open to all </label>
												</div>
												
												<div class="radio radio-inline">
													{{ Form::radio('privacy_type', 2, '', array('id'=>'inlineRadio6'))}}   
													<label for="inlineRadio6"> Closed </label>
												</div>					
												<div class="radio radio-inline">
													{{ Form::radio('privacy_type', 3, '', array('id'=>'inlineRadio7'))}}    
													<label for="inlineRadio7"> Open to members </label>
												</div>
											</div>
											<div class="text-center"> <a href="javascript:;" onclick="document.getElementById('update_profile').submit();" class="btn-snd submit disk"> Save </a> </div>
											
											{{Form::close()}}
											
											
											
											
											
											
											<div class="diactive">
												<h3> Deactivate Account </h3>
												
												{{ Form::model($data, array('url'=>url('/deactivate-account/'.Route::input('group_id')), 'class'=>'dcty', 'id'=>'deactivate_account', 'files' => true)) }}
												
												<div class="dcty">
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_type', 1, '', array(''))}}{{Config::get('constants.DEACTIVATE_TYPE.1')}}
														</label>
													</div>
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_type', 2, '', array(''))}}{{Config::get('constants.DEACTIVATE_TYPE.2')}}
														</label> 
													</div>
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_type', 3, '', array(''))}}{{Config::get('constants.DEACTIVATE_TYPE.3')}}
														</label> 
													</div>
													<span class="help-block"> {{$errors->first('deactivate_type')}} </span>
												</div>
												
												<h4> Choose any one reason</h4>
												<div class="dcty">
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_reason_type', 1, '', array(''))}}{{Config::get('constants.DEACTIVATE_REASON_TYPE.1')}}
														</label>
													</div>
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_reason_type', 2, '', array(''))}}{{Config::get('constants.DEACTIVATE_REASON_TYPE.2')}}
														</label> 
													</div>
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_reason_type', 3, '', array(''))}}{{Config::get('constants.DEACTIVATE_REASON_TYPE.3')}}
														</label> 
													</div>
													<div class="radio">
														<label>
															{{ Form::radio('deactivate_reason_type', 4, '', array(''))}}{{Config::get('constants.DEACTIVATE_REASON_TYPE.4')}}
														</label> 
													</div>
													<div class="radio ">
														<label>
															{{ Form::radio('deactivate_reason_type', 5, '', array(''))}}{{Config::get('constants.DEACTIVATE_REASON_TYPE.5')}}
															{{ Form::text('deactivate_reason', null, array('placeholder'=>'Please mention here your reason.', 'class' => 'form-control dt'))}}  
														</label>
													</div>
													<span class="help-block"> {{$errors->first('deactivate_reason_type')}}{{$errors->first('deactivate_reason')}} </span>
												</div>
												
												<div class="text-center"> <a href="javascript:;" onclick="document.getElementById('deactivate_account').submit();" class="btn-snd submit disk"> Deactivate </a> </div>
												{{Form::close()}}
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
	<?php 
	$base_url = Config::get('constants.SITE_URL'); ?>	
	<script type="text/javascript">
		
		
		$(document).ready(function() {
		
			var max_fields = 20; //maximum input boxes allowed
			var wrapper = $(".items"); //Fields wrapper
			var add_button = $(".add_field_button"); //Add button ID
			
			var x = 1; //initlal text box count
			$(add_button).click(function(e){ //on add input button click
				e.preventDefault();
				if(x < max_fields){ //max input box allowed
					x++; //text box increment
					$(wrapper).append('<div class="delete_div_'+x+' form-horizontal">'+
						'<div class="form-group">'+
							'<label class="control-label col-sm-3" for="email">Other Email</label>'+
							'<div class="col-sm-8">'+
								'<input class="form-control gry" required="required" id="other_email" type="email" name="other_email[]"/>'+  
							'</div>'+
							'<div class="col-sm-1"><a onclick="deleteDiv('+x+')" href="javascript:;" style="font-size: 24px; color: red;" class="remove_field"><i class="fa fa-times"></i></a></div>'+
						'</div>'+ 
					'</div>'); //add input box
				}
			}); 
		});
		
		function deleteDiv(id){ 
			$('.delete_div_'+id).remove();
		}
		
		
		
		
		
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
		});
		
		$(document).on('click', '.browse', function(){
			var file = $(this).parent().parent().parent().find('.file');
			file.trigger('click');
		});
		$(document).on('change', '.file', function(){
			$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
		});
		
		function startUpload(){
			
			$('#loader_img').show();
			
			var formData = new FormData();
			formData.append('file', $('input[type=file]')[0].files[0]);
			
			$.ajax({
				url: "{{URL::to('user-img-upload')}}",
				type: "POST",             // Type of request to be send, called as method
				dataType: "json",             // Type of request to be send, called as method
				data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false, 
				success: function(data){
					if(data.type==1){ 
						$('.msg_cls').show(); 
						$('.msg_cls p').text(data.msg); 
						$('#image_name').val(''); 
						$('#loader_img').hide();
						} else { 
						if(data.msg) {
							var img_url = '{{$base_url}}upload/users/profile-photo/thumb/'+data.msg; 
							$('#image_name').val(data.msg); 
							$("#image_name").attr("src",img_url); 
							$('#myModal').modal('hide');
							$('#loader_img').hide();
							} else { 
							$('.msg_cls').show(); 
							$('.msg_cls p').text('Please try again.');  
							$('#image_name').val('');
							$('#loader_img').hide();
						} 
					}
				},
				error: function(data,status,e){
					$('#image_name').val('');
					$('#loader_img').hide();
				}
			});
			return false;
		} 
		
		
		function chooseGallery(value) { 
			
			var img_url = '{{$base_url}}img/'+value;  
			$.ajax({
				url: "{{URL::to('user-img-save')}}",
				type: "POST",
				dataType: "json",
				data: { 'image': value }, 
				success: function(data){
					if(data.type==1){ 
						$('.msg_cls').show(); 
						$('.msg_cls p').text(data.msg); 
						$('#image_name').val(''); 
						$('#loader_img').hide();
						} else { 
						if(data.msg) {
							$('#image_name').val(value); 
							$("#image_name").attr("src",img_url); 
							$('#myModal').modal('hide');
							} else { 
							$('.msg_cls').show(); 
							$('.msg_cls p').text('Please try again.');  
							$('#image_name').val('');
							$('#loader_img').hide();
						} 
					}
				} 
			});  
		}
		
		
	</script>

@stop																																					