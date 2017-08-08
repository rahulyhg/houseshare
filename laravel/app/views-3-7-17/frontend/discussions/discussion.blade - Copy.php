@extends('frontend/layouts/default')
@section('title')
Discussion
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
								
								<div class="row m-t-30 text-center">
									
									<div class="col-md-2 col-sm-2 p-r-0 m-b-10 col-2">
										<div class="dropdown rorid">
											<button class="dropbtn"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> </button>
											<div class="dropdown-content"> <a href="#">All</a> <a href="#">Read</a> <a href="#">Unread</a><a href="#">Expand</a> <a href="#">Collapse</a> </div>
										</div>
										<a href="" class="rori b"> <i class="fa fa-filter" aria-hidden="true"></i> </a>
									</div>
									
									<div class="col-md-8 col-sm-8 col-8">
										{{ Form::open(array('url' => array('/discussion/'.Route::input('group_id').'/'.Route::input('topic_id')), 'name'=>'SearchGroup')) }}
										<div class="input-group add-on">
											{{ Form::text('name',isset($_POST['name'])?$_POST['name']:null, array('placeholder'=> 'Search','class'=>'form-control bor-no'))}} 
											<div class="input-group-btn">
												<button class="btn btn-default ck" type="submit"><i class="glyphicon glyphicon-search"></i></button>
											</div>
										</div>
										{{Form::close()}}
									</div>
									
									<div class="col-md-2 col-sm-2 p-l-0"> 
										<a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="rrri width100"><b> POST </b></a> 
									</div> 
									
									<div class="AD">
										<div style="margin-left: 1%;" class="collapse {{ ($errors->first('subjects') || $errors->first('subjects'))?'in':''}}" id="collapseExample">
											
											{{ Form::open(array('url' => array('/topic-created/'.Route::input('topic_id')), 'name'=>'SearchGroup')) }}
											
											<div style="margin-top:4%;">  
												<section class="panel-body">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">					 
																{{ Form::text('subjects',null, array('placeholder'=> 'Enter Subject', 'class'=>'form-control jui'))}}
																<span class="help-block"> {{$errors->first('subjects')}} </span>
															</div>
														</div>
														
														<div class="col-md-12">
															<div class="form-group">					
																{{ Form::textarea('description',null, array('rows'=>3, 'placeholder'=> 'About Topic', 'class'=>'ckeditor form-control jui'))}} 
																<span class="help-block"> {{$errors->first('description')}} </span>
															</div> 	
														</div> 
														<div class="col-md-8"> 
															
															{{ Form::file('file', array('class'=>'file'))}}  
															<div class="input-group col-xs-12">  
																<input class="form-control borno" placeholder="Choose upload to file" name="srch-term" id="srch-term" disabled="" type="text">
																<span class="input-group-btn">
																	<button class="browse btn btn-default ck bl" type="button">CHOOSE</button>
																	<button class="btn btn-default ck gr" type="submit">SUBMIT</button>
																</span>
															</div> 
														</div>
													</div>  
												</section> 
											</div>
											{{Form::close()}}
										</div>
									</div> 
									
								</div>
								
								
								
								
								
								
								<div class="white">
									<div class="announce discuss disscussion1-acc-re">
										<div class="content">
											
											<div class="menu ds1">
												
												<ul class="responsive-accordion responsive-accordion-default bm-larger">
												
													@if(! $data->isEmpty())
														
														@foreach($data as $val) 
													
															<li>
																<div class="responsive-accordion-head">
																	<div class="row do--">
																		<a href="javascript:;"><span class="ink animate-ink"></span>
																			<div class="col-md-11 col-sm-11 col-xs-10 bnm padd-r-o">
																				{{ GeneralHelper::showUserImg($val->photo, 'pull-left hlj', $val->first_name,'50px') }} 
																				<b class="DD">{{ GeneralHelper::getUserName($val->user_id)}}</b><br>
																				<span class="yoi">Subject: {{$val->subjects}}</span> 
																			</div>
																		</a> 
																	</div>
																	<i class="responsive-accordion-plus fa-fw">+</i>
																	<i class="responsive-accordion-minus fa-fw f-s-17">X</i>
																</div>
																
																<div class="responsive-accordion-panel">  
																
																	<ul class="submenu">
																		<div class="append_html_{{$val->id}}">
																			<li style="padding:10px 17px 9px 1px;"> 
																				<span class="pull-right"> {{ GeneralHelper::get_time_formate($val->created_at, false) }}</span>
																				<p class="iop-">{{$val->comment}}</p>
																				<ul class="wqe">
																				
																					<li id="like_{{ $val->id }}"><?php 
																						$tot_post_like = 0;
																						if($val->like_id){
																							$explode_array = explode(',', $val->like_id); 
																							$tot_post_like = count($explode_array);   
																						} ?>
																																							
																						@if($val->like_id and in_array(Auth::id(), explode(',', $val->like_id))) 
																							<a href="javascript:void(0);" onclick="unlike('{{ $val->id }}');" title="Not Like">
																								<i class="fa fa-thumbs-down"></i>{{$tot_post_like}} Likes
																							</a> 
																						@else 
																							<a href="javascript:void(0);" onclick="add_like('{{ $val->id }}');" title="Like">
																								<i class="fa fa-thumbs-up"></i>{{$tot_post_like}} Likes
																							</a>  															 
																						@endif  
																					</li><?php
																					
																					$reply_count = Comment::getTreeFormatRepliesCount($val->id); ?> 
																					
																					<li><a href="javascript:;" onclick="replyShow('{{$val->id}}')" >{{$reply_count}} Replies</a></li>
																					<li><a href="javascript:;"><i class="fa fa-share-alt"></i></a></li>
																					<li class="pull-right"><a onclick="reportcontent({{$val->id}})" href="javascript:;"><i class="fa fa-flag"></i></a></li>
																				</ul>
																			</li>
																		</div>
																		
																		<?php // echo $tree_format_data = Comment::getTreeFormatReplies($val->id); ?> 
																		<?php /*
																		<li>
																			{{ Form::open(array('url' => array('/discussion/'.Route::input('group_id').'/'.Route::input('topic_id')), 'id'=>'comment_'.$val->id, 'name'=>'comment_'.$val->id, 'files'=>true)) }}
																			<div class="row"> 
																			 
																				{{ Form::text('parent_id',$val->id, array('id'=> 'parent_id', 'required'=>true, 'style'=>'display:none;', 'class'=>'form-control slct'))}}  
																				{{ Form::text('nest_level',1, array('id'=> 'nest_level', 'required'=>true, 'style'=>'display:none;', 'class'=>'form-control slct'))}}  
																			
																				<div class="col-md-6">
																					<div class="form-group pt-10">
																						{{ Form::text('subjects',null, array('placeholder'=> 'Enter Subjects', 'required'=>true,  'class'=>'form-control k dis'))}}
																					</div>
																				</div>
																					
																				<div class="col-md-12">
																					<div class="form-group">					
																						{{ Form::textarea('description',null, array('rows'=>3, 'placeholder'=> 'Comment', 'required'=>true, 'class'=>'form-control jui'))}} 
																						<span class="help-block"> {{$errors->first('description')}} </span>
																					</div> 	
																				</div>  
																				
																				<div class="col-md-8"> 
																					{{ Form::file('file', array('class'=>'file'))}}  
																					<div class="input-group col-xs-12" style="margin-bottom:20px;">  
																						<input class="form-control borno" placeholder="Choose upload to file" name="srch-term" id="srch-term" disabled="" type="text">
																						<span class="input-group-btn">
																							<button class="browse btn btn-default ck bl" type="button">CHOOSE</button>
																							<button onclick="commentSave('{{$val->id}}')" class="btn btn-default ck gr" type="button">SUBMIT</button>
																						</span>
																					</div> 
																				</div>
																				
																			</div> 
																			  
																			{{Form::close()}} 
																		</li>
																		*/ ?>
																		
																	</ul>
																</div>
															
															</li> 
															
														@endforeach
															
													@else
														<li class="item col-xs-12 col-lg-11">
															<p style="padding:2%;" class="no_records">No records found</p>
														</li>
													@endif 
													
												</ul>
												
											</div> 
										</div>
									</div>  
								</div> 
								
								
								
								<div id="report_contentModal" class="modal fade" tabindex="-1" role="dialog">
									<!-- Modal content-->
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												Report Content
											</div>
											 
											<div class="col-lg-12 succes_msg" style="display:none;">
												<div class="alert alert-success fade in" style="text-align: center; padding: 8px; margin-top: 2%; margin-bottom: 2%;">
													
												</div>
											</div> 
											
											<div class="modal-body">
											

											
												{{ Form::open(array('url' => array('/report-content'), 'name'=>'report_content', 'id'=>'report_content', 'files'=>true)) }} 
													<div class="form-group mt-21">	
													 
														{{ Form::text('report_content_id',null, array('id'=> 'report_content_id', 'required'=>true, 'style'=>'display:none;', 'class'=>'form-control slct'))}}  
														  
														{{ Form::textarea('message',$val->message, array('rows'=>3, 'id'=> 'message_content', 'required'=>true, 'placeholder'=> 'Write your report...', 'class'=>'form-control'))}} 
														<span class="help-block error_msg"></span>
													</div> 	
												{{Form::close()}}
											</div>
											<div class="modal-footer">
												<a href="javascript:;" onclick="reportcontentSubmit()" class="submit"> Submit </a>&nbsp;
												<button type="button" class="btn btn-outline dark" data-dismiss="modal">Cancel</button> 
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


<style>
	.cke_combo_button { padding:0px!important; }	
</style>
{{ HTML::script('js/frontend/js/jquery.form.js') }}

<script type="text/javascript">
	
	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});
		
	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
	
	
	
	function commentSave(id){   
		
		var form_data = new FormData(document.getElementById("comment_"+id));
		$.ajax({
			url: "{{ URL::to('/post-comment-save/'.Route::input('group_id').'/'.Route::input('topic_id')) }}",
			type: "POST",
			data: form_data,
			processData: false,
			contentType: false,
			success: function(data){  
				replyShow(id,true);
			},
			complete: function(){ 
				$('#comment_'+id)[0].reset();
			} 
		});
		
	}  	
	
	
	function replyShow(id, type_form = false){ 
		
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"position: absolute; margin-left: 93px; height: 14px; top: 14px;")) }}</span>';
		jQuery("#like_"+id).append(img); 
		jQuery.ajax({
			type: 'post',
			dataType: 'html',
			url: "{{ URL::to('/reply-data') }}", 
			data: { id: id, type_form: type_form }, 
			success: function(data){  
				//alert('.append_html_'+id+" div");
				jQuery('.append_html_'+id+' div').remove();
				jQuery('.append_html_'+id).append(data);
			},
			complete: function(){
				jQuery(".loading1").remove(); 
			} 
		});
	}
	
	
	function hideShow(cls) { 
		$(".comman_cls_rj").hide(); 
		$("."+cls).toggle(); 
	} 	
	
	function reportcontent(id){
		$('#report_content_id').val(id);
		$('#report_contentModal').modal('show'); 
	} 	
 	
	function reportcontentSubmit(){   
		
		var message_content = $('#message_content').val();
		if(message_content==''){
			$('.error_msg').text('Message is required.');
			return false;
		}
	
		jQuery.ajax({
			type: 'post',
			dataType: 'json',
			url: "{{ URL::to('/report-content') }}",
			data: $("#report_content").serialize(),
			success: function(data){
				$('.error_msg').text(''); 
				$('.succes_msg').show(); 
				$('.succes_msg div').text(data.msg); 
			},
			complete: function(){
				
				$('#report_content')[0].reset();
				$('.error_msg').text(''); 
				
				setTimeout(function() {
					$('#report_contentModal').modal('hide');
					$('.succes_msg').hide();
					$('.succes_msg div').text('');
				}, 4000); 
				
			} 
		});
	
	}  
	
	function add_like(id){
	
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"position: absolute; margin-left: 5px; height: 14px; top: 14px;")) }}</span>';
		jQuery("#like_"+id).append(img);
		$("#like_"+id+' a').prop('onclick',null).off('click');
		jQuery.ajax({
			type: 'post',
			url: "{{ URL::to('/post-like') }}",
			data: "id="+id,
			success: function(data){
				jQuery('#like_'+id).html(data);
			},
			complete: function(){
				jQuery(".loading1").remove(); 
			} 
			});
	}
	
	function unlike(id){
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"position: absolute; margin-left: 5px; height: 14px; top: 14px;")) }}</span>';
		jQuery("#like_"+id).append(img);
		
		$("#like_"+id+' a').prop('onclick',null).off('click');
		
		jQuery.ajax({
			type: 'post',
			url: "{{ URL::to('/post-un-like') }}",
			data: "id="+id,
			success: function(data){
				jQuery('#like_'+id).html(data);
			},
			complete: function(){
				jQuery(".loading1").remove(); 
			} 
		});
	}
	
	
	$(document).ready(function() {  
		
	});
	
	$(function(){
		$('.clickable').on('click',function(){
			var effect = $(this).data('effect');
			$(this).closest('.panel')[effect]();
		})
	})
</script> 
 
@stop