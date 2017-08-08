<?php 
$oldrole_id = (Input::old('role_id')); ?>
<div class="row">
	<div class="col-lg-6">
	
		<div class="form-group">
			<label for="role_id" class="control-label col-lg-4">User Type</label>
			<div class="col-lg-8 font0">
				{{ Form::select('role_id', Config::get('constants.USER_ROLES'), null, array("id"=>"user_role", 'class' => 'form-control'))}}
			</div>
		</div>
		
		<div class="form-group">
			<label for="username" class="control-label col-lg-4">Email <span class='red bold'>*</span></label>
			<div class="col-lg-8">
				{{ Form::text('email', null, array('class' => 'form-control'))}}
				<span class="red">{{ $errors->first('email')}}</span>
			</div>
		</div>
		
		@if(Route::currentRouteName() == 'users.admin_add')
		<div class="form-group">
			<label for="password" class="control-label col-lg-4">Password<span class='red bold'>*</span></label>
			<div class="col-lg-8">
				{{ Form::password('password',  array('class' => 'form-control'))}}
				<span class="red">{{ $errors->first('password')}}</span>
			</div>
		</div>
		@endif
		
		<div class="form-group">
			<label for="firstname" class="control-label col-lg-4">First Name<span class='red bold'>*</span></label>
			<div class="col-lg-8">
				{{ Form::text('first_name', null, array('id' => 'firstname', 'class' => 'form-control')) }}
				<span class="red">{{ $errors->first('first_name') }} </span>
			</div>
		</div>
		
		<div class="form-group">
			<label for="lastname" class="control-label col-lg-4">Last Name</label>
			<div class="col-lg-8">
				{{ Form::text('last_name', null, array('id' => 'lastname', 'class' => 'form-control'))}}
				<span class="red">{{ $errors->first('last_name') }} </span>
			</div>
		</div>
		
		<div class="form-group">
			<label for="gender" class="control-label col-lg-4">Gender </label>
			<div class="col-lg-8 font0">
				{{ Form::select('gender',array(''=>'Please select') + Config::get('constants.GENDER'), null, array('class' => 'form-control'))}}
			</div>
		</div>
		
		<div class="form-group">
			<label for="office_name" class="control-label col-lg-4">Office Name</label>
			<div class="col-lg-8">
				{{ Form::text('office_name', null, array('id' => 'office_name', 'class' => 'form-control')) }}
				<span class="red">{{ $errors->first('office_name') }} </span>
			</div>
		</div> 
		
		<div class="form-group">
			<label for="office_website" class="control-label col-lg-4">Office Website</label>
			<div class="col-lg-8">
				{{ Form::text('office_website', null, array('id' => 'office_website', 'class' => 'form-control')) }}
				<span class="red">{{ $errors->first('office_website') }} </span>
			</div>
		</div> 
		
		<div class="form-group">
			<label for="photo" class="control-label col-lg-4">{{ 'Image' }} </label>
			<div class="col-lg-8">
				{{ Form::file('photo', array('id' => 'photo', 'class' => 'form-control')) }}
				<small class="green">*(Allowed Format: JPEG,jpg,png,gif)</small><br />
				<span class="red">{{ $errors->first('photo')}}</span>
			</div>
			@if(Route::currentRouteName() != 'users.admin_add')
			<div class="col-lg-6" style="text-align:right;">
				@if ($data->photo !='' and  file_exists('upload/users/profile-photo/thumb/'.$data->photo))
				{{ HTML::image('upload/users/profile-photo/thumb/'.$data->photo,'', array('style'=>'width:40px;height:40px;')) }}
				@endif
			</div>
			@endif
		</div>

		@if(Route::currentRouteName() != 'admin_update_profile')
			<div class="form-group">
				<label for="status" class="control-label col-lg-4">Status </label>
				<div class="col-lg-8">
					{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'form-control'))}}
				</div>
			</div>
		@endif
		
	</div>
	
	
	<div class="col-lg-6">
		
		<div class="form-group">
			<label for="description" class="control-label col-lg-4">Description</label>
			<div class="col-lg-8">
				{{ Form::textarea('description', null, array('rows'=>3, 'id' => 'description', 'class' => 'form-control')) }}
				<span class="red">{{ $errors->first('description') }} </span>
			</div>
		</div>
		
		<div class="form-group">
			<label for="street_1" class="control-label col-lg-4">Street</label>
			<div class="col-lg-8">
				{{ Form::text('street_1', null, array('id' => 'street1', 'class' => 'form-control')) }}
				<span class="red">{{ $errors->first('street_1')}}</span>
			</div>
		</div>
		
		<div class="form-group">
			<label for="street_2" class="control-label col-lg-4">Landmark</label>
			<div class="col-lg-8">
				{{ Form::text('street_2', null, array('id' => 'street2', 'class' => 'form-control')) }}
			</div>
		</div>
		
		<div class="form-group">
			<label for="city" class="control-label col-lg-4">City</label>
			<div class="col-lg-8">
				{{ Form::text('city', null, array('id' => 'city', 'class' => 'form-control'))}}
				<span class="red">{{ $errors->first('city')}}</span>
			</div>
		</div>
		<div class="form-group">
			<label for="zip" class="control-label col-lg-4">Zip / Postal Code</label>
			<div class="col-lg-8">
				{{ Form::text('zip', null, array('class' => 'form-control'))}}
			</div>
		</div>
		
		<div class="form-group">
			<label for="username" class="control-label col-lg-4">State</label>
			<div class="col-lg-8">
				{{ Form::text('state', null, array('class' => 'form-control'))}}
			</div>
		</div>
		
		<div class="form-group">
			<label for="country_id" class="control-label col-lg-4">Country </label>
			<div class="col-lg-8">
				{{ Form::select('country_id', array(''=>'Select Country') + $countries, null, array('class' => 'form-control'))}}
				<span class="red">{{ $errors->first('country_id')}}</span>
			</div>
		</div>
		
		<div class="form-group">
			<label for="mobile" class="control-label col-lg-4">Mobile</label>
			<div class="col-lg-8">
				{{ Form::text('mobile', null, array('class' => 'form-control'))}}
				<span class="red">{{ $errors->first('mobile')}}</span>
			</div>
		</div>
		
		
	</div>
	
	
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#user_role').change( function() { ;
				if($('#user_role').val()==2) {
					$('.is_allow_seller').show();
					} else {
					$('.is_allow_seller').hide();
				}
			});
		});
	</script>
</div>