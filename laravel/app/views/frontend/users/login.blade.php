@extends('frontend/layouts/default')
@section('title')
{{ Lang::get('ViewMessage.Login') }}
@stop

@section('content')
	<div class="container">
		<div class="courses-bg">
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="modal-dialog width-none" id="fb_register">
						<div class="loginmodal-container">
							
							<h1>{{ Lang::get('ViewMessage.Login') }}</h1><br>
							  
							@include('frontend/alert_message')
							 
							{{ Form::open(array('url'=>url('/login'))) }}
								<div class="form-group">
									{{ Form::text('email', null, array('placeholder'=> Lang::get('ViewMessage.Email')))}}
									<span class="error">{{ $errors->first('email')}}</span>
								</div>
								<div class="form-group">
									{{ Form::password('password', array('placeholder'=>Lang::get('ViewMessage.Password')))}}
									<span class="error">{{ $errors->first('password')}}</span>
								</div>
								<div class="form-group">
									{{ Form::submit(Lang::get('ViewMessage.Login'), array('class' => 'login loginmodal-submit login-bg')) }}
								</div>
							{{Form::close()}}
							
							<div class="login-help">
								<a href="{{URL::to('forgot-password')}}">{{ Lang::get('ViewMessage.Forgot_Password') }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
	
	<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">

	FB.init({appId:'<?php echo Session::get('SiteValue.facebook_api_id'); ?>',status:true,cookie:true,xfbml:true,oauth:true}); 


	function LoginWithfb(){
	
		FB.login(function(response) {
			//console.log(response);
			if (response.authResponse) {
				//console.log(response.authResponse);
				FB.api('/me?fields=id,name,birthday,bio,first_name,last_name,email,link,gender,hometown', function(responseme) {
					//FB.api('/me', function(responseme) {
					
					console.log(responseme);
					
					var first_name='', last_name='', name='', gender='', dob='', about_me='', hometown='' ;
					
					var fb_id=responseme.id; 
					
					var email=responseme.email;
					
					if(typeof(responseme.name) != "undefined"){
						name=responseme.name;  
					}
					
					if(typeof(responseme.first_name) != "undefined"){
						first_name=responseme.first_name;  
					}
					
					if(typeof(responseme.last_name) != "undefined"){
						last_name=responseme.last_name;  
					}
					
					if(typeof(responseme.birthday) != ''){
						var date = new Date(responseme.birthday);
						dob = date.getFullYear() +'-'+ (date.getMonth() + 1) + '-' + date.getDate();
					} 
					
					if(typeof(responseme.gender) != "undefined"){
						gender=responseme.gender; 
					}
					
					if(typeof(responseme.bio) != "undefined"){
						about_me=responseme.bio;
					}
					
					if(typeof(responseme.hometown) != "undefined" && responseme.hometown !== null) {
						hometown=responseme.hometown.name;
					}
					
					var link=responseme.link; 
					
					jQuery.ajax({
						type: "POST",
						url: "{{URL::to('fb_login')}}",
						data: "id="+fb_id+"&role_id=2&fb_register=0&first_name="+first_name+"&last_name="+last_name+"&name="+name+"&email="+email+"&dob="+dob+"&gender="+gender+"&about_me="+about_me+"&hometown="+hometown+"&link="+link,  
						dataType:"html", 
						success: function(data){  
							if(data=="succ"){
								window.location.href = '{{URL::to("myaccount")}}';
							}else if(data=="error"){
								window.location.href = '{{URL::to("login")}}';
							}else{
								jQuery('#fb_register').html(data);
							}
						}
					}) ;
				});
			}
		}, {scope:"email,user_photos,user_birthday,user_location,user_about_me,user_hometown,user_location"}); 
	}
</script>
@stop							