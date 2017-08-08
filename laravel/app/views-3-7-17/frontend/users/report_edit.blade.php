@extends('frontend/layouts/default')
@section('title')
Update Report
@stop

@section('content') 

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			
			<div class="col-md-9 subscription">
			
				@include('frontend/users/setting_top_menu')  
				
				 
				
				<div class="tab-content">
					<div id="" class="tab-pane fade in active"> 
						
						<div class="m-t-31 setting">
							
							<div class="managegrpupdte-sec-1 report_edit_cls">
								<div class="row">   
									
									<div class="col-md-12 padding_cls0"> 
									
										{{ Form::model($comment, array('url'=>url('/report-edit/'.Route::input('id').'/'.Route::input('group_id')), 'id'=>'update_report', 'files' => true)) }} 
									 
								  		<div class="form-horizontal">
											<div class="form-group"> 
												<div class="col-sm-12">
													{{ Form::textarea('comment',null, array('rows'=>3, 'id'=> 'comment', 'required'=>true, 'placeholder'=> 'Write your report...', 'class'=>'form-control ckeditor'))}} 
													<span class="help-block"> {{$errors->first('comment')}} </span>  
												</div>
											</div>
										</div> 
										 
										<div class="text-center"> <a href="javascript:;" onclick="document.getElementById('update_report').submit();" class="btn-snd submit disk"> Update </a> </div>
										
										{{Form::close()}}  
										 
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
	 
		 CKEDITOR.config.height = '250px';
	
		 $(function () {
			$("#btnAdd").bind("click", function () {
				var div = $("<div />");
				div.html(GetDynamicTextBox(""));
				$("#TextBoxContainer").append(div);
			});
			$("#btnGet").bind("click", function () {
				var values = "";
				$("input[name=DynamicTextBox]").each(function () {
					values += $(this).val() + "\n";
				});
				alert(values);
			});
			$("body").on("click", ".remove", function () {
				$(this).closest("div").remove();
			});
		});
		function GetDynamicTextBox(value) {
		
			/*return '<input name = "DynamicTextBox" type="text" value = "' + value + '" />&nbsp;' +
					'<input type="button" value="Remove" class="remove" />'*/
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