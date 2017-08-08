@extends('backend/layouts/default')
<?php
	$role_id = Route::input('role_id');
	$data_role =  Config::get('constants.USER_ROLES.'.$role_id); 
	$data_role  = str_plural($data_role);
?>
@section('title')
	User Management  
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/users/2') }}" title="Go to Users" class="tip-bottom"><i class="icon-home"></i>Users</a> 
		<a href="javascript:;" class="current">Create New User</a> 
	</div>
	
	<h1>User <small>General Information</small></h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::open(array('url' => array('admin/users/add'), 'class' => 'form-horizontal', 'name'=>'User','files' => true)) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
							<h5>Create New User</h5>
						</div>
						
						<div class="widget-content nopadding"> 
							
							<div class="control-group">
								<label class="control-label">User Type</label>
								<div class="controls">
									{{ Form::select('role_id', Config::get('constants.USER_ROLES'), null, array("id"=>"user_role", 'class' => 'span11'))}}
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Email <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('email', null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('email') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Password <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::password('password', array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('password') }} </span>
								</div>
							</div> 
							
							<div class="control-group">
								<label class="control-label">First Name<span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('first_name', null, array('id' => 'firstname', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('first_name') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Last Name</label>
								<div class="controls">
									{{ Form::text('last_name', null, array('id' => 'lastname', 'class' => 'span11'))}}
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Gender</label>
								<div class="controls">
									{{ Form::select('gender',array(''=>'Please select') + Config::get('constants.GENDER'), null, array('class' => 'span11'))}}
								</div>
							</div> 
							
							<div class="control-group">
								<label class="control-label">Image</label>
								<div class="controls">
									{{ Form::file('photo', array('id' => 'photo', 'class' => 'span11')) }}
									<span class="help-block">*(Allowed Format: JPEG,jpg,png,gif)</span>
									<span class="red">{{ $errors->first('photo')}}</span>
								</div>
							</div>  
							
							@if(Route::currentRouteName() != 'admin_update_profile')
								<div class="control-group">
									<label class="control-label">Status</label>
									<div class="controls">
										{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'span11'))}}
									</div>
								</div>
							@endif

							<div class="form-actions">
								<div class="span8">&nbsp;</div>
								<button type="submit" class="btn btn-success">Save</button>
								<a href="{{ URL::to('admin/users/2') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div>
					</div> 
				</div>


				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
							<h5>Create New User</h5>
						</div>
						
						<div class="widget-content nopadding"> 
							
							<div class="control-group">
								<label class="control-label">Description</label>
								<div class="controls">
									{{ Form::textarea('description', null, array('rows'=>2, 'id' => 'description', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('description') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Street</label>
								<div class="controls">
									{{ Form::text('street_1', null, array('id' => 'street1', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('street_1')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Landmark</label>
								<div class="controls">
									{{ Form::text('street_2', null, array('id' => 'street_2', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('street_2')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">City</label>
								<div class="controls">
									{{ Form::text('city', null, array('id' => 'city', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('city')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Zip / Postal Code</label>
								<div class="controls">
									{{ Form::text('zip', null, array('id' => 'zip', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('zip')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">State</label>
								<div class="controls">
									{{ Form::text('state', null, array('id' => 'state', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('state')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Country</label>
								<div class="controls">
									{{ Form::select('country_id', array(''=>'Select Country') + $countries, null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('country_id')}}</span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Mobile</label>
								<div class="controls">
									{{ Form::text('mobile', null, array('id' => 'mobile', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('mobile')}}</span>
								</div>
							</div>
						 
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop