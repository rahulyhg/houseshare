<!DOCTYPE html>
<html lang="en">
    
	<head>
		<title>{{ Session::get('SiteValue.site_name')}} Admin Login</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="{{ URL::to('favicon.ico') }}">
		{{ HTML::style('css/admin/bootstrap.min.css') }}
		{{ HTML::style('css/admin/bootstrap-responsive.min.css') }}
		{{ HTML::style('css/admin/matrix-login.css') }}
		{{ HTML::style('css/admin/font-awesome/css/font-awesome.css') }}
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
	
    <body>
	
        <div id="loginbox">            
            {{ Form::open(array('url' => url('admin/login'), 'class'=>'form-vertical', 'id'=>'loginform')) }}
			
				@if(Session::has('message'))
				<div class="alert alert-error">
					{{ Session::get('message') }}
				</div>
				@endif
			
				 <div class="control-group normal_text"> 
					<h3>
						{{ HTML::image('img/logo.png', Session::get('SiteValue.site_name'), array()) }}
					</h3>
				</div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>{{ Form::text('email', Input::old('email'), array('class'=>'', 'placeholder'=>'Username','id'=>'input-username')) }}
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','id'=>'input-password')) }}
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!--<span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>-->
                    <span class="pull-left"><button style="margin-left: 73%;" type="submit" href="javascript:;" class="btn btn-success"> Login</button></span>
                </div>
			{{ Form::close() }}
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        
		{{ HTML::script('js/admin/jquery.min.js') }}
		{{ HTML::script('js/admin/matrix.login.js') }}
		
    </body>
</html>