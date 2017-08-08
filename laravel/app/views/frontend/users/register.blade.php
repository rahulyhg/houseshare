@extends('frontend/layouts/default')
@section('title')
	{{Lang::get('ViewMessage.Register')}}
@stop

@section('content')
	<div class="container">
		<div class="courses-bg">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="modal-dialog width-none" id="fb_register">
						<div class="loginmodal-container">
							<h1>{{Lang::get('ViewMessage.Register')}}</h1><br> 
							
							@include('frontend/alert_message')
							 
							{{ Form::model($user, array('url'=>url('/register'))) }} 
								<div  class="university_no" style="{{(Input::old('role_id') == 4)?'display:none;':''}}">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												{{ Form::text('first_name', null, array('placeholder'=>'First Name*'))}}
												<span class="error">{{ $errors->first('first_name')}}</span>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												{{ Form::text('last_name', null, array('placeholder'=>'Last Name (Optional)'))}}
												<span class="error">{{ $errors->first('last_name')}}</span>
											</div>
										</div>
									</div>
								</div>
								 
								<div class="form-group">
									{{ Form::text('email', null, array('placeholder'=>'Email Address*'))}}
									<span class="error">{{ $errors->first('email')}}</span>
								</div>
									
								<div class="form-group">
									{{ Form::password('password', array('placeholder'=>'Password*'))}}
									<span class="error">{{ $errors->first('password')}}</span>
								</div>
			 
								<div class="form-group">
									{{ Form::text('dob', null, array('class' => 'datepicker', 'readonly' => 'readonly', 'placeholder' =>'Date Of Birth (Optional)'))}}
									<span class="error">{{ $errors->first('dob')}}</span>
								</div> 
								 
								<div class="form-group">
									{{ Form::text('street_1', null, array('placeholder'=>'Address (Optional)'))}}
									<span class="error">{{ $errors->first('street_1')}}</span>
								</div>
								
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											{{ Form::text('city', null, array('placeholder' =>'City (Optional)'))}}
											<span class="error">{{ $errors->first('city')}}</span>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											{{ Form::text('state', null, array('placeholder' =>'State (Optional)'))}}
											<span class="error">{{ $errors->first('state')}}</span>
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											{{ Form::text('zip', null, array('placeholder' =>'Zip Code (Optional)'))}}
											<span class="error">{{ $errors->first('zip')}}</span>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											{{ Form::select('country_id', array(''=>'Select Country')+$countries, null, array())}}
											<span class="error">{{ $errors->first('country_id')}}</span>
										</div>	
									</div>
								</div>
								
								<div class="row"> 
									<div class="col-lg-12 col-sm-12">
										<div class="form-group">
											{{ Form::select('profession_id', array(''=>'Select Your Profession')+$professions, null, array())}}
											<span class="error">{{ $errors->first('profession_id')}}</span>
										</div>	
									</div>
								</div>
								
								<div class="form-group chek_con">
									{{ Form::checkbox('reminders', 1)}}<span style="color:#fff;">&nbsp;&nbsp;Send me reminders (State renewal notices, subscription expiration) <a href="#" style="font-weight:bold;"></a></span>
									<br /><span class="error">{{ $errors->first('reminders')}}</span>
								</div>
								
								<div class="form-group chek_con">
									{{ Form::checkbox('newsletter', 1)}}<span style="color:#fff;">&nbsp;&nbsp;Send me your monthly newsletter (New and updated courses, annoucements) <a href="#" style="font-weight:bold;"></a></span>
									<br /><span for="" class="error">{{ $errors->first('newsletter')}}</span>
								</div>	
								
								 
								{{ Form::submit(Lang::get('ViewMessage.Register'), array('class' => 'login loginmodal-submit login-bg')) }}
							{{Form::close()}}
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div> 
	<script type="text/javascript">
	 jQuery(document).ready(function(){ 
		 jQuery(".datepicker").datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			pickerPosition: "bottom-left"
		}); 
	}); 
	</script>
@stop							