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
									
									@if(Route::input('topic_id'))
										<div class="col-md-2 col-sm-2 p-l-0"> 
											<a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="rrri width100"><b> POST </b></a> 
										</div> 
									@endif
									
									<div class="AD">
										<div style="margin-left: 1%;" class="collapse {{ ($errors->first('subjects') || $errors->first('subjects'))?'in':''}}" id="collapseExample">
											
											{{ Form::open(array('url' => array('/topic-created/'.Route::input('group_id').'/'.Route::input('topic_id')), 'name'=>'SearchGroup', 'files'=>true)) }}
											
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
																				<dl class="iop-">{{$val->comment}}</dl> 
																				{{ GeneralHelper::getImageExt($val->file,$val->id) }} 
																				 
																			    <ul class="wqe">
																				
																					<li id="like_{{ $val->id }}"><?php 
																						$tot_post_like = 0;
																						if($val->like_id){
																							$explode_array = explode(',', $val->like_id); 
																							$tot_post_like = count($explode_array);   
																						} ?>
																																							
																						@if($val->like_id and in_array(Auth::id(), explode(',', $val->like_id))) 
																							<a href="javascript:void(0);" onclick="unlike('{{ $val->id }}');" title="Not Like">
																								<i class="fa fa-thumbs-down"></i>{{$tot_post_like}} <?php echo ($tot_post_like>1)?'Likes':'Like'; ?>
																							</a> 
																						@else 
																						
																							<?php
																							if($val->user_id != Auth::id()) { ?>
																								<a href="javascript:void(0);" onclick="add_like('{{ $val->id }}');" title="Like"><?php
																							} else { ?>
																								<a href="javascript:void(0);"><?php
																							} ?> 
																								<i class="fa fa-thumbs-up"></i>{{$tot_post_like}} <?php echo ($tot_post_like>1)?'Likes':'Like'; ?>
																							</a>  															 
																						@endif  
																					</li><?php
																					
																					$reply_count = Comment::getTreeFormatRepliesCount($val->id); ?> 
																					
																					<li><a href="javascript:;" id="reply_show_hide_{{$val->id}}" onclick="replyShow('{{$val->id}}','show')" >{{$reply_count}} <?php echo ($reply_count>1)?'Replies':'Reply'; ?></a></li>
																					<li><a href="javascript:;" data-toggle="modal" data-target=".share_{{$val->id}}"><i class="fa fa-share-alt"></i></a></li>
																					<li class="pull-right"><a onclick="reportcontent({{$val->id}})" href="javascript:;"><i class="fa fa-flag"></i></a></li>
																					 
																				</ul>
																			</li>
																		</div> 
																		
																	</ul>
																</div>
															
															</li> 
															
									
															<div class="modal share_{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
																<div class="modal-dialog">
																<div class="modal-content clearfix">

																	<div class="modal-header" style="height: 53px;">
																	  <h4 style="float: left; padding: 0%; margin: 2px;">Share On</h4>
																	  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																	</div>
																	<div class="popup-body">
																	  <div class="row">
																		<div class="col-xs-12"> 
																		<div class="form-group text-center" style="padding: 3% 0px 1%;">
																			<a onclick="ShareFunction('http://www.facebook.com/share.php?title={{$val->subjects}}&u={{URL::to('/post-detail/'.$val->id)}}',{{$val->id}});" href="javascript:;" class="facebook"><i class="fa fa-facebook unset_cls" aria-hidden="true"></i> Share on facebook</a>
																			<a onclick="ShareFunction('https://twitter.com/share?url={{URL::to('/post-detail/'.$val->id)}}&name=Simple Share Buttons&hashtags={{$val->subjects}}',{{$val->id}})" href="javascript:;" class="twitter"><i class="fa fa-twitter unset_cls" aria-hidden="true"></i> Share on twitter</a>
																			<a onclick="ShareFunction('https://plus.google.com/share?url={{URL::to('/post-detail/'.$val->id)}}',{{$val->id}});" href="javascript:;" class="facebook"><i class="fa fa-google unset_cls" aria-hidden="true"></i> Share on Google Plus</a>
																			<a onclick="ShareFunction('https://www.linkedin.com/shareArticle?mini=true&amp;url={{URL::to('/post-detail/'.$val->id)}}&amp;title={{$val->subjects}}&amp;summary=&amp;source=',{{$val->id}});" href="javascript:;" class="facebook"><i class="fa fa-linkedin unset_cls" aria-hidden="true"></i> Share on Linked In</a>
																			<a href="mailto:?Subject={{$val->subjects}}&Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{URL::to('/post-detail/'.$val->id)}}" class="facebook"><i class="fa fa-envelope unset_cls" aria-hidden="true"></i> Email to a friend</a>
																		</div>
																		</div>
																		</div>
																	</div>
																</div>
															  </div>
															</div>
															
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
													<div class="form-group"> 
														{{ Form::text('report_content_id',null, array('id'=> 'report_content_id', 'required'=>true, 'style'=>'display:none;', 'class'=>'form-control'))}}
														{{ Form::select('subject',Config::get('constants.REPORT_TYPE'), null, array('id'=> 'subject', 'required'=>true, 'class'=>'form-control'))}}  
													</div> 	
													<div class="form-group">  
														{{ Form::textarea('message',null, array('rows'=>3, 'id'=> 'message_content', 'required'=>true, 'placeholder'=> 'Write your report...', 'class'=>'form-control'))}} 
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
	
	.announce .menu .row {
    border-bottom: 0px solid rgba(232, 232, 232, 0.59);
}
	
</style> 



<script type="text/javascript"> 
	 
	function ShareFunction(url,id) {
	
		$.ajax({
			url: "{{ URL::to('/social_media_earn/') }}/"+id,
			type: "POST",
			dataType: 'json', 
			success: function(data){ 
 
			} 
		});
	
		mywindow=window.open(url,"mywindow","status=1,resizable=0,width=550,height=500");
		mywindow.moveTo(0, 0);
	} 

	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});
		
	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
	});
	 
	function commentSave(id){   
	 
		$("#comment_save_"+id).attr('onclick', ""); 
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"padding-left:2px; height: 20px; top: 0px;")) }}</span>'; 
		jQuery("#comment_save_"+id).after(img); 
		var form_data = new FormData(document.getElementById("comment_"+id));
		$.ajax({
			url: "{{ URL::to('/post-comment-save/'.Route::input('group_id').'/'.Route::input('topic_id')) }}",
			type: "POST",
			data: form_data,
			dataType: 'json',
			processData: false,
			contentType: false,
			success: function(data){ 
				if(data.type==1){
					replyShow(id,'show',true);
				} else {
					$("#comment_save_"+id).attr('onclick', "commentSave("+id+");");
					jQuery(".loading1").remove(); 
				} 
			},
			complete: function(){ 
				jQuery(".loading1").remove(); 
			} 
		});
		
	}  	
	
	
	function replyShow(id, hide_show_type , type_form = false){ 
		
		if(hide_show_type=='show'){
			$("#reply_show_hide_"+id).attr('onclick', "replyShow("+id+",'hide');"); 
		} else {
			$("#reply_show_hide_"+id).attr('onclick', "replyShow("+id+",'show');"); 
		}
		
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"position: absolute; margin-left: 93px; height: 14px; top: 14px;")) }}</span>';
		jQuery("#like_"+id).append(img); 
		jQuery.ajax({
			type: 'post',
			dataType: 'html',
			url: "{{ URL::to('/reply-data') }}", 
			data: { id: id, type_form: type_form }, 
			beforeSend: function(data){
				jQuery('.comman_form_cls').remove();
			},
			success: function(data){   
			
				var obj = jQuery.parseJSON(data);
				var count_val = obj.count;
				var count = (count_val>1)?count_val+' Replies':count_val+' Reply';
			
				//alert('.append_html_'+id+" div"); 
				jQuery('.append_html_'+id+' div').remove();
				if(hide_show_type=='show'){
					jQuery('a#reply_show_hide_'+id).text(count); 
					jQuery('.append_html_'+id).append(obj.html); 
					
				} 
				
			  	//CKEDITOR.replace("full-editor");
				
				$("#subject_text").focus();
				/*
				$('html, body').animate( 
				'slow', function() {
					$("input").focus();
				}); */  
				
				//$('input').focus();
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