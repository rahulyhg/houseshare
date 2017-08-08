@extends('frontend/layouts/default')
@section('title')
Support
@stop

@section('content') 

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			
			<div class="col-md-9">
				@include('frontend/users/group_top_menu')
				
				<div class="tab-content">
					<div id="" class="tab-pane fade in active">
						
						
						
						<div class="m-t-31 spprt1">
							<div class="row"> 
								<div class="col-md-8 col-sm-8">
									<div class="panel">
										<div class="panel-heading">
										<h5><b>Support</b></h5> </div>
										
										<div class="profile-padd-body support">
											<div class="">
												<div class="form-group">					
													<div class="row"><div class="col-md-2"><label for="name" class="lab-bh">Topic </label></div>
														<div class="col-md-10"><div class=""> <input type="text" class="form-control jui" placeholder="">
														</div>  </div></div> </div>
														
														<div class="form-group">					
															<div class="row"><div class="col-md-2"><label for="name" class="lab-bh">Category</label></div>
																<div class="col-md-10"><div class="">
																	<input type="text" class="form-control jui" placeholder="">
																</div>   </div>   </div> </div>
																
																<div class="announce-text-editor">
																	<div class="row"><div class="col-md-2"><label for="name" class="lab-bh">Description </label></div>			
																		<div class="col-md-10">
																			<textarea id="example-01"> </textarea>
																		</div> </div></div>   
																		<div class="text-center padding-15-0"><a href="" class="submit"> Send</a> </div>
											</div>
										</div>  </div> 
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="sidebar-right profile">
										<div class="sidebar-box mar-no">
											<div class="sidebar-box-head">
												<a href="#">View All</a>
											</div>
											<div class="sidebar-box-body">
												<div class="panel mar-no">
													
													<div class="panel-body  padd-no">
														<div class="lesslst">
															<ul class="q-left slidediv2 support">
																<li class="slidediv"><a href="#"><span class="pull-left QA">Q.</span><p class="slide-p1"> Should all state boards in India be banished and only CBSE be allowed to stay?</p> </a>  <div class="pull-right normal pos-top"> -Stephen </div> 
																	<div class="m-t-20"><a class="normal" href="#"><span class="pull-left QA">A.</span><p class="slide-p1">Due to a stronger emphasis on Science and Maths, I think CBSE seem relatively rational and level-headed. They generally don’t make strong claims unless they feel they can support them with facts and lorem.</p> </a> 
																	<div class="pull-right normal pos-top"> -Rachel </div> </div></li>
																	<li class="slidediv"><a href="#"><span class="pull-left QA">Q.</span><p class="slide-p1"> What are the benefits of having three education (State, CBSE and ICSE) boards in India?</p> </a> <div class="pull-right normal pos-top"> -Jane </div> 
																	<div class="m-t-20"><a class="normal" href="#"><span class="pull-left QA">A.</span><p class="slide-p1"> Walk me through a cash flow statement</p> </a> <div class="pull-right normal pos-top"> -Johan </div>  </div></li>
																	<li class="slidediv"><a href="#"><span class="pull-left QA">Q.</span><p class="slide-p1"> Is it possible for a company to show positive cash flows but be in grave trouble?</p> </a> <div class="pull-right normal pos-top"> -Rachel </div> 
																		<div class="m-t-20"><a class="normal" href="#"><span class="pull-left QA">A.</span><p class="slide-p1"> Due to a stronger emphasis on Science and Maths, I think CBSE seem relatively rational and level-headed. They generally don’t make strong claims unless they feel they can support them with facts and lorem.</p> </a>
																		<div class="pull-right normal pos-top"> -James </div> </div></li>
																		<li class="slidediv"><a href="#"><span class="pull-left QA">Q.</span><p class="slide-p1">Should all state boards in India be banished and only CBSE be allowed to stay?</p> </a> <div class="pull-right normal pos-top"> -Stephen </div> 
																			<div class="m-t-20"><a class="normal" href="#"><span class="pull-left QA">A.</span><p class="slide-p1"> Due to a stronger emphasis on Science and Maths, I think CBSE seem relatively rational and level-headed. They generally don’t make strong claims unless they feel they can support them with facts and lorem.</p> </a>
																			<div class="pull-right normal pos-top"> -Rachel </div> </div></li>
																			
																			
																			
															</ul>
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
	</div>
</section>

{{ HTML::script('js/frontend/js/jquery-smde.js') }} 
<script>
    $(function() {
        $('#example-01').SimpleMarkdownEditor({
            editor:     true,
            preview:    false,
            hideEditor: false,
            locale:     'en'
        });
    });
</script>
 
@stop															