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
									<div class="">
										<div class="announce discuss">
											<div class="content">
												<nav>
													<div id="menu" class="menu ds1">
														<ul class="">
															
															@if(! $data->isEmpty())
															@foreach($data as $val)
															
															<li>
																<a href="javascript:;" class=""> <span class="submenu-indicator">+</span></a>
																
																<div class="row do--">
																	<a href="javascript:;">
																		<span class="ink animate-ink" style="height: 0px; width: 0px; top: 16px; left: 85.25px;"></span>
																		<div class="col-md-11 col-sm-11 col-xs-10 bnm padd-r-o">
																			{{ GeneralHelper::showUserImg($val->photo, 'pull-left hlj', $val->first_name,'50px') }} 
																			<b>{{ GeneralHelper::getUserName($val->user_id)}}</b><br>
																			<span class="yoi">Subject: {{$val->subjects}}</span>
																			<div class="ed pull-right"><i class="fa fa-flag"></i></div>
																		</div>
																	</a>
																	<div class="col-md-1"> </div>
																</div>
																
																<ul class="submenu" style="display: none;">
																	
																	<li> <span class="pull-right">{{ GeneralHelper::get_time_formate($val->created_at, false) }} </span>
																		<p class="iop-">{{$val->comment}}</p>
																		<ul class="wqe">
																			<li><a href="#"> <i class="fa fa-thumbs-up"></i> 8 Likes</a></li> 
																			<li><a href="#"> 6 Replies </a></li>
																			<li><a href="#"> <i class="fa fa-share-alt"></i> </a></li>
																			<li class="pull-right"><a href="#"> <i class="fa fa-flag"></i> </a></li>
																		</ul>
																	</li>  
																	
																	
																	<?php  
																	echo $tree_format_data = Comment::getTreeFormatReplies($val->id); ?>
																	
																	<?php /*
																		
																		@if($tree_format_data)
																		@foreach($tree_format_data as $tree_format_val) 
																		<li class="padd-l-50"> <span class="pull-right"> {{ GeneralHelper::get_time_formate($tree_format_val->created_at, false) }} </span><b> {{ GeneralHelper::getUserName($tree_format_val->user_id)}} </b><br>
																		Subject: {{$tree_format_val->subjects}}
																		<p class="iop-">{{$tree_format_val->comment}}</p>
																		<ul class="wqe">
																		<li><a href="#"> <i class="fa fa-thumbs-up"></i> 8 Likes</a></li> 
																		<li><a href="#"> 6 Replies </a></li>
																		<li><a href="#"> <i class="fa fa-share-alt"></i> </a></li>
																		</ul>
																		</li> 
																		
																		@endforeach
																	@endif <?php */ ?>
																	
																	<li> 
																		{{ Form::open(array('url' => array('/topic-created/'.Route::input('topic_id')), 'name'=>'SearchGroup_'.$val->id)) }}
																		
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group pt-10">
																					<input class="form-control k dis" placeholder="Enter Subjects" id="usr" type="text">
																				</div>
																			</div>
																			
																			<div class="col-md-12">
																				<div class="form-group">					
																					{{ Form::textarea('description',null, array('rows'=>3, 'placeholder'=> 'Comment', 'class'=>'form-control jui'))}} 
																					<span class="help-block"> {{$errors->first('description')}} </span>
																				</div> 	
																			</div>  
																			
																			<div class="col-md-8"> 
																				{{ Form::file('file', array('class'=>'file'))}}  
																				<div class="input-group col-xs-12" style="margin-bottom:20px;">  
																					<input class="form-control borno" placeholder="Choose upload to file" name="srch-term" id="srch-term" disabled="" type="text">
																					<span class="input-group-btn">
																						<button class="browse btn btn-default ck bl" type="button">CHOOSE</button>
																						<button class="btn btn-default ck gr" type="submit">SUBMIT</button>
																					</span>
																				</div> 
																			</div> 
																		</div>  
																		{{Form::close()}} 
																	</li>  
																</ul>
															</li> 
															
															@endforeach
															
															@else
															<li class="item col-xs-12 col-lg-11">
																<p style="padding:2%;" class="no_records">No records found</p>
															</li>
															@endif 
															
														</ul>
													</div>
												</nav>
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


<script type="text/javascript">
	
	$(document).ready(function() {  
		
	});
	
	$(function(){
		$('.clickable').on('click',function(){
			var effect = $(this).data('effect');
			$(this).closest('.panel')[effect]();
		})
	})
</script> 

<script>
	$(function() {
		var Accordion = function(el, multiple) {
			this.el = el || {};
			this.multiple = multiple || false;
			
			// Variables privadas
			var links = this.el.find('.link');
			// Evento
			links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
		}
		
		Accordion.prototype.dropdown = function(e) {
			var $el = e.data.el;
			$this = $(this),
			$next = $this.next();
			
			$next.slideToggle();
			$this.parent().toggleClass('open');
			
			if (!e.data.multiple) {
				$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
			};
		}	
		
		var accordion = new Accordion($('#accordion'), false);
	});
	
</script> 
@stop