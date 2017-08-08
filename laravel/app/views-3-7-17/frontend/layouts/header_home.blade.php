<?php
$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
$current_action = (isset($action[1]) and $action[1])?$action[1]:''; ?>


<header class="header">
	<div class="container clearfix">
		<div class="header-inner flex space-between items-center">
            <div class="left">
				<div class="logo">
					<a style="outline:0;" href="{{URL::to('/')}}">
						{{HTML::image('img/logo.png', 'logo',array('class'=>'img-responsive'))}}
					</a>
				</div>
			</div>
            <!-- end .left -->				
            <div class="right flex space-between no-column items-center">
				<div class="navigation">
					<nav class="main-nav">
						<ul class="list-unstyled">
							<li class="active"><a href="{{URL::to('/')}}">HOME</a></li>
							<li><a href="{{URL::to('/')}}">PLACE AN AD</a></li>
							<li><a href="{{URL::to('/')}}">BROWSE PROPERTIES</a></li>
							<li><a href="{{URL::to('my-account')}}">MY ACCOUNT</a></li>
						</ul>
					</nav>
					<a href="javascript:;" class="responsive-menu-open"><i class="ion-navicon"></i></a>
				</div>
				
				@if(Auth::check())
					
					<div class="button-group-merged flex no-column">
						<a class="button" href="{{URL::to('my-account')}}">Hi {{Auth::user()->first_name}}</a>
						<a class="button" href="{{URL::to('/logout')}}">Logout</a>
					</div>

				@else
					<div class="button-group-merged flex no-column">
						<a href="javascript:;" data-toggle="modal" data-target="#myModal" class="button" id="login">Log In</a>
					</div>
				@endif
				

			</div>
		</div>
	</div>
</header>	

 
<div class="responsive-menu">
	<a href="javascript:;" class="responsive-menu-close"><i class="ion-android-close"></i></a>
	<nav class="responsive-nav"></nav>
</div>

<!-- end .responsive-menu -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
            <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Login/Registration</h4>
			</div>
            <div class="modal-body">
				<div class="row">
					<div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;"> 
						
						<ul class="nav nav-tabs">
							<li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
							<li><a href="#Registration" data-toggle="tab">Registration</a></li>
						</ul>
						
						<!-- Tab panes -->
						<div class="tab-content">
						
				
							<div style="margin-bottom:10px; display:none;" class="alert add_msg_cls">
								<a href="#" class="close" data-dismiss="alert">&times;</a>
								<p style="color: unset;"></p>
							</div> 
						
							<div class="tab-pane active" id="Login">
							
								{{ Form::model(null, array('url'=>url('/login'), 'class'=>'form-horizontal', 'id'=>'signin_form')) }} 
							
									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Email</label>
										<div class="col-sm-10">
											{{ Form::text('email', null, array('autocomplete'=>'off', 'class'=>'form-control', 'id'=>'email', 'placeholder' =>'Email*', 'data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}  
										</div>
									</div>
									
									<div class="form-group">
										<label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-10">
											{{ Form::password('password', array('autocomplete'=>'off', 'type'=>'password', 'class'=>'form-control', 'id'=>'password', 'placeholder' =>'Password*', 'data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-2">&nbsp;</div>
										<div class="col-sm-10">
											{{ Form::submit('Sign In', array('class' => 'btn btn-primary btn-sm', 'id'=>'signin_form_button')) }} 
											<?php /*<a href="javascript:;">Forgot your password?</a> */ ?>
										</div>
									</div>
								{{Form::close()}}
								
							</div>
							
							<div class="tab-pane" id="Registration">
							
								{{ Form::model(null, array('url'=>url('/register'), 'class'=>'form-horizontal', 'id'=>'signup_form')) }} 
									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Name</label>
										<div class="col-sm-10">
											<div class="row">
												<div class="col-md-12">
													{{ Form::text('first_name', null, array('autocomplete'=>'off', 'class'=>'form-control', 'id'=>'first_name', 'placeholder' =>'Full name*', 'data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}} 
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label for="email" class="col-sm-2 control-label">Email</label>
										<div class="col-sm-10">
											{{ Form::email('email', null, array('autocomplete'=>'off', 'class'=>'form-control', 'id'=>'email', 'placeholder' =>'Email*', 'data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}  
										</div>
									</div>
									
									<div class="form-group">
										<label for="password" class="col-sm-2 control-label">Password</label>
										<div class="col-sm-10">
											{{ Form::password('password', array('autocomplete'=>'off', 'type'=>'password', 'class'=>'form-control', 'id'=>'password', 'placeholder' =>'Password*', 'data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}
										</div>
									</div>
									
									<div class="form-group">
										<label for="password" class="col-sm-2 control-label">Confirm password</label>
										<div class="col-sm-10">
											{{ Form::password('conf_password', array('autocomplete'=>'off', 'type'=>'password', 'class'=>'form-control', 'id'=>'password', 'placeholder' =>'Confirm password*', 'data-fv-identical'=>true, 'data-fv-identical-field'=>'password', 'data-fv-identical-message'=>'sasa', 'data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}
										</div>
									</div>
									
									<div class="form-group">
										<label for="Gender" class="col-sm-2 control-label">Gender</label>
										<div class="col-md-2">
											<label class="radio-inline">
												{{ Form::radio('gender', 1, array('data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}Male
											</label>
										</div>
										<div class="col-md-3">
											<label class="radio-inline">
												{{ Form::radio('gender', 2, array('data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false', ))}}Female
											</label>
										</div>
									</div>
									
									<div class="form-group">
										<label for="password" class="col-sm-2 control-label">Tick</label>
										<div class="col-sm-10">
											<div class="checkbox checkbox-inline">
												{{ Form::checkbox('agree', 0, '', array('id'=>'checkbox30','data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false'))}}
												<label for="checkbox30">
													I am looking for an apartment or house share 
												</label>
											</div>
											<div class="checkbox checkbox-inline">
												{{ Form::checkbox('agree_1', 0, '', array('id'=>'checkbox31','data-bv-notempty'=>'true', 'data-bv-notempty-message'=>'false'))}}
												<label for="checkbox31">
													I have an apartment or house share 
												</label>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-sm-2">
										</div>
										<div class="col-sm-10">
											{{ Form::submit('Save & Continue', array('class' => 'btn btn-primary btn-sm', 'id'=>'signup_form_button')) }} 
											<button data-dismiss="modal" aria-hidden="true" type="button" class="btn btn-default btn-sm">Cancel</button>
										</div>
									</div>
									
								{{Form::close()}}
								
							</div>
						</div>
						<div id="OR" class="hidden-xs">
							OR
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="row text-center sign-with">
							<div class="col-md-12">
								<h3>
									Sign in with
								</h3>
							</div>
							<div class="col-md-12">
								<div class="btn-group btn-group-justified">
									<a href="#" class="btn btn-primary"><i class="ion-social-facebook"></i> Facebook</a> 
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div> 

<style>
	.help-block { display:none !important; }
</style>

<script type="text/javascript"> 


	jQuery(document).ready(function() {
		
		
		jQuery('#signup_form').bootstrapValidator({  
 
			fields: { 
				password: {
					validators: {
						notEmpty: {
							message: 'The password is required and can\'t be empty'
						},
						identical: {
							field: 'confirmPassword',
							message: 'The password and its confirm are not the same'
						}
					}
				},
				conf_password: {
					validators: {
						notEmpty: {
							message: 'The confirm password is required and can\'t be empty'
						},
						identical: {
							field: 'password',
							message: 'The password and its confirm are not the same'
						}
					}
				} 
			}
		
		
		
		
		}).on('success.form.bv', function(e) {
		
			e.preventDefault();
			// Get the form instance
			var $form = $(e.target);
			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');
			// Use Ajax to submit form data
			$.post($form.attr('action'), $form.serialize(), function(result) {
				$(".add_msg_cls").hide();
				if(result.type==1){
					$(".add_msg_cls").show();
					$(".add_msg_cls").removeClass("alert-danger").addClass("alert-success");
					$('.add_msg_cls p').text(result.msg);
					$('#signup_form').bootstrapValidator('resetForm', true);
				} else {
					$(".add_msg_cls").show();
					$(".add_msg_cls").removeClass("alert-success").addClass("alert-danger");
					$('.add_msg_cls p').text(result.msg);  
				} 
				
			}, 'json');
		});		
		
		
		/*-------------- Login Form  -------------*/
		
		jQuery('#signin_form').bootstrapValidator({ 
		
		}).on('success.form.bv', function(e) {
		// Prevent form submission
			e.preventDefault();
			// Get the form instance
			var $form = $(e.target);
			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');
			// Use Ajax to submit form data
			$.post($form.attr('action'), $form.serialize(), function(result) {
				$(".add_msg_cls").hide();
				if(result.type==1){
					$(".add_msg_cls").show();
					$(".add_msg_cls").removeClass("alert-danger").addClass("alert-success");
					$('.add_msg_cls p').text(result.msg);
					$('#signin_form').bootstrapValidator('resetForm', true);
					//location.reload(true);
					window.location.href = "{{ URL::to('my-account') }}";
				} else {
					$(".add_msg_cls").show();
					$(".add_msg_cls").removeClass("alert-success").addClass("alert-danger");
					$('.add_msg_cls p').text(result.msg);  
				} 
				
			}, 'json');
		});
		
		
		
		/*-------------- Forgot Form  -------------*/
		
		jQuery('#forgot_form').bootstrapValidator({ 
		
		}).on('success.form.bv', function(e) {
		// Prevent form submission
			e.preventDefault();
			// Get the form instance
			var $form = $(e.target);
			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');
			// Use Ajax to submit form data
			$.post($form.attr('action'), $form.serialize(), function(result) {
				$(".add_msg_cls_login").hide();
				if(result.type==1){
					$(".add_msg_cls_login").show();
					$(".add_msg_cls_login").removeClass("alert-danger").addClass("alert-success");
					$('.add_msg_cls_login p').text(result.msg);
					$('#forgot_form').bootstrapValidator('resetForm', true);
					//location.reload(true);
					//window.location.href = "{{ URL::to('/') }}";
				} else {
					$(".add_msg_cls_login").show();
					$(".add_msg_cls_login").removeClass("alert-success").addClass("alert-danger");
					$('.add_msg_cls_login p').text(result.msg);  
				} 
				
			}, 'json');
		});
		
		
	});
	
	
	window.setTimeout(function() {
		$(".top_message_cls").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
	}, 4000);
</script>