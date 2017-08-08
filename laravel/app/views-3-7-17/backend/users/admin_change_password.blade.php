@extends('backend/layouts/default')
@section('title')
	Admin Management 
@stop
<?php
$role_id = Route::input('role_id');
$data_role =  Config::get('constants.USER_ROLES.'.$role_id); 
$data_role  = str_plural($data_role); ?>

@section('content')

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/users/'.$role_id) }}" title="Go to {{ $data_role}}" class="tip-bottom"><i class="icon-user"></i>{{ $data_role}}</a> 
		<a href="javascript:;" class="current">{{ $data_role}}</a> 
	</div>
	<h1>{{$data_role }} <small>General Information</small></h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::model($data,array('url' => array('admin/users/change_password',$data->role_id, $data->id), 'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>{{ 'Change Password : '.$data->first_name. ' ' .$data->last_name }}</h5>
						</div>
						
						<div class="widget-content nopadding"> 
							
							<div class="control-group">
								<label class="control-label">New Password<span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::password('password',  array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('password')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Confirm Password<span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::password('password_confirmation',  array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('password_confirmation') }} </span>
								</div>
							</div>  

							<div class="form-actions">
								<div class="span8">&nbsp;</div>
								<button type="submit" class="btn btn-success">Change</button>
								@if($data->role_id !=1)
									<a href="{{ URL::to('admin/users/'.$role_id) }}" ><button class="btn btn-default" type="button">Cancel</button></a>
								@endif
							</div>
							
						</div>
					</div> 
				</div>
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div>  
@stop