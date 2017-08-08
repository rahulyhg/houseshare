@extends('frontend/layouts/default')
@section('title')
Profile
@stop

@section('content') 

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			<div class="col-md-9">
				
				@include('frontend/users/group_top_menu')
				
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
				
				
				<div class="collapse" id="collapseUPDATEPROFILE">
					<div class="panel-heading over">
						
					</div>  
					<div class="create-xpand">
						
						{{ Form::open(array('url' => array('/update-profile'), 'name'=>'SearchGroup', 'files'=>true)) }} 
						
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group"><?php
								$array_type = array('1'=>'Full Name ('.Auth::user()->first_name.')','2'=>'Username ('.Auth::user()->username.')',) ?>  
								{{ Form::select('name_type',$array_type, Auth::user()->name_type, array('required'=>true, 'class'=>'form-control slct'))}}    
								</div>
							</div> 
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::text('designation',Auth::user()->designation, array('placeholder'=> 'Tag Line', 'required'=>true, 'class'=>'form-control slct'))}}  
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::text('city',Auth::user()->city, array('placeholder'=> 'City', 'required'=>true, 'class'=>'form-control slct'))}}  
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									{{ Form::text('state',Auth::user()->state, array('placeholder'=> 'State', 'required'=>true, 'class'=>'form-control slct'))}}  
								</div>
							</div> 
							<div class="col-sm-4">
								<div class="form-group">
									<input type="submit" class="allgrp-create" value="Update">
								</div>
							</div>  
						</div>    
						{{Form::close()}}
					</div>
				</div>
				
				<div class="">
					<div class="prof-page1 m-t-30"> 
						<div class="row over">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3 p-r-o">
										<div class="prof-page-left text-center"> 
											<p style="position: absolute; right: 0px; text-align: right ! important;"><a data-toggle="collapse" href="#collapseUPDATEPROFILE" aria-expanded="false" aria-controls="collapseUPDATEPROFILE" title="Edit Profile"><i class="fa fa-edit"></i></a></p>
											<div class="clr"></div>
											<?php
												$image_path_user = 'img/c8.png'; 
												if(Auth::user()->photo && file_exists('upload/users/profile-photo/thumb/'.Auth::user()->photo)) {
													$image_path_user = '/upload/users/profile-photo/thumb/'.Auth::user()->photo;
												}else if(Auth::user()->photo && file_exists('img/'.Auth::user()->photo)) {
													$image_path_user = '/img/'.Auth::user()->photo;
												} ?>   
												<button type="button" class="week-no" data-toggle="modal" data-target="#myModal">  
													{{HTML::image($image_path_user, Auth::user()->first_name, array('id'=>'image_name', 'class'=>'border-radius-img-cls', 'width'=>'90'))}}  
												</button>
												<h4><b>{{GeneralHelper::getUserName(Auth::user()->id)}}</b></h4>
												<p> {{ ucwords(Auth::user()->designation) }} </p> 
												<p> <?php echo (Auth::user()->city!='')?'<i class="fa fa-map-marker"></i>':''; ?> {{ ucwords(Auth::user()->city) }}{{ (Auth::user()->state)?' , '.ucwords(Auth::user()->state):'' }} </p>
												<a href="javascript:;" class="snd"> Send Message </a>
												<ul class="prof-page-left-ul">
													<li> <div class="pright">Total Posts</div> <div class="pright"><span> {{ GeneralHelper::getTotalPostByuUser(Auth::id()) }} </span></div>  </li>
													<li><div class="pright"> {{ (Auth::user()->earn_points)>1?'Points':'Point' }} </div> <div class="pright"><span> {{ Auth::user()->earn_points  }} </span></div> </li>
													<li><div class="pright"> Member Since </div><div class="pright"> <span>{{ date('M d, Y', strtotime(Auth::user()->created_at)) }}</span></div> </li>
													<li><div class="pright"> Last Active on </div> <div class="pright"><span>{{ date('M d, Y', strtotime(Auth::user()->last_active_date)) }}</span></div> </li>
												</ul> 
										</div>
									</div>
									<div class="col-md-9"> 
										
										
										
										<div class="prfle-page-right"> 
											<h4 class="pl-20"><b> About&nbsp;&nbsp;<a href="javascript:;" id="about_us_pencil"><i class="fa fa-edit"></i></a></b></h4>
											<p class="pl-20">
												<div style="white-space:unset;" class="about_us_cls" id="about_us" data-pk="3" data-type="textarea" data-toggle="manual" data-title="Enter notes" data-placement="top">
													{{ Auth::user()->about_us }}
												</div></p>
												<hr>
												
												<ul class="nav nav-pills gen-act">
													<li class="active"><a data-toggle="pill" href="#General">General</a></li>
													<li><a data-toggle="pill" href="#Activity">Activity</a></li> 
												</ul>
												
												
												<div class="tab-content">
													<div id="General" class="tab-pane fade in active"><?php
														
														$get_user_qualification = GeneralHelper::getUserQualification(Auth::id());
													$get_user_experience 	= GeneralHelper::getUserExperience(Auth::id()); ?>
													
													
													<ul class="prfle-page-right-ul">
														<li> <b> Qualification </b></li> 
														<li><a href="javascript:;" id="qualification_add" data-type="text" data-pk="1" data-title="Enter value"><i class="fa fa-plus"></i>&nbsp;Add</a></li> 
														@if(!empty($get_user_qualification))
														@foreach($get_user_qualification as $qualification_val) 
														<li><a style="border-bottom: unset; color: unset;" href="javascript:;" onclick="qualificationEdit({{$qualification_val->id}})" id="qualification_edit_{{$qualification_val->id}}">{{$qualification_val->title}}</a> </li>  
														@endforeach 
														@endif
													</ul>
													
													
													
													<ul class="prfle-page-right-ul">
														<li><b>Experience</b></li>
														<li><a href="javascript:;" id="experience_add" data-type="text" data-pk="1" data-title="Enter value"><i class="fa fa-plus"></i>&nbsp;Add</a></li> 
														@if(!empty($get_user_experience))
														@foreach($get_user_experience as $experience_val) 
														<li><a style="border-bottom: unset; color: unset;" href="javascript:;" onclick="experienceEdit({{$experience_val->id}})" id="experience_edit_{{$experience_val->id}}">{{$experience_val->title}}</a></li>  
														@endforeach
														@endif
													</ul>
													
													
													</div>
													
													<div id="Activity" class="tab-pane fade">
														<?php /*<ul class="prfle-page-right-ul">
															<li> <b> Experience </b></li>
															<li> Masters in IT from Satndaford  Universitu-2011 Batch </li>
															<li> Bachelors in IT from Satndaford  Universitu-2011 Batch </li>
															</ul>
															<ul class="prfle-page-right-ul">
															<li> <b> Qualification </b></li>
															<li> Masters in IT from Satndaford  Universitu-2011 Batch </li>
															<li> Bachelors in IT from Satndaford  Universitu-2011 Batch </li>
														</ul>*/ ?>
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
	<?php 
	$base_url = Config::get('constants.SITE_URL'); ?>	
	<script type="text/javascript">
		
		
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
		
		
		$.fn.editable.defaults.mode = 'inline';  
		
		$('#address').editable({
			url: '/post',
			value: {
				city: "Moscow", 
				street: "Lenina", 
				building: "12"
			},
			validate: function(value) {
				if(value.city == '') return 'city is required!'; 
			},
			display: function(value) {
				if(!value) {
					$(this).empty();
					return; 
				}
				var html = '<b>' + $('<div>').text(value.city).html() + '</b>, ' + $('<div>').text(value.street).html() + ' st., bld. ' + $('<div>').text(value.building).html();
				$(this).html(html); 
			}         
		}); 
		
		
		$('#qualification_add').editable({
			url: "{{URL::to('qualification-add')}}",
			title: 'Enter value', 
			value: '', 
			success: function(response, newValue) {
				location.reload();
			}
		});  
		
		$('#experience_add').editable({
			url: "{{URL::to('experience-add')}}",
			title: 'Enter value', 
			value: '', 
			success: function(response, newValue) {
				location.reload();
			}
		});   
		
		
		
		$('#about_us').editable({
			url: "{{URL::to('user-profile-update')}}",
			title: 'Enter About',
			rows: 3,
			inputclass :'textarea_edit_cls'
		});
		
		
		$('#about_us_pencil').click(function(e) {
			e.stopPropagation();
			e.preventDefault();
			$('#about_us').editable('toggle');
		}); 
		
		function qualificationEdit(id) { 
			$('#qualification_edit_'+id).editable({
				type: 'text',
				pk: 1,
				url: "{{URL::to('qualification-edit')}}",
				title: 'Enter value'
			}); 
		}
		
		function experienceEdit(id) { 
			$('#experience_edit_'+id).editable({
				type: 'text',
				pk: 1,
				url: "{{URL::to('experience-edit')}}",
				title: 'Enter value'
			}); 
		}
		
	</script>
	
@stop																	