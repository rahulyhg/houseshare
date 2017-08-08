@extends('frontend/layouts/default')
@section('title')
{{ Lang::get('ViewMessage.Forgot_Password') }}
@stop

@section('content')
	<div class="container">
		<div class="courses-bg">
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="modal-dialog width-none">
						<div class="loginmodal-container">
							
							<h1>{{ Lang::get('ViewMessage.Forgot_Password') }}</h1><br>
							
							@include('frontend/alert_message')
							
						
							{{ Form::open(array('url'=>url('/forgot-password'))) }}
								<div class="form-group">
									{{ Form::text('email', null, array('placeholder'=>'Email'))}}
									<span class="error">{{ $errors->first('email')}}</span>
								</div>
								<div class="form-group">
									{{ Form::submit('Forgot Password', array('class' => 'login loginmodal-submit login-bg')) }}
								</div>
							{{Form::close()}}
							
							<div class="login-help">
								<span style="color:#fff">Return to</span> <a href="{{URL::to('login')}}" style="font-weight:bold;">{{ Lang::get('ViewMessage.Login') }}</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
@stop							