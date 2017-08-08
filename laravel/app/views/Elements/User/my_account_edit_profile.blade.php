{{ HTML::script('js/frontend/comman.js') }}
<?php /*<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> */ ?>
<h3>Edit my details</h3>
<div class="container">
	<div class="row">
	
		<?php 
			$old_form_number = (Input::old('confirm_form_number'))?Input::old('confirm_form_number'):1;
			
			//$data = Input::old();
			
			//echo '<pre>'; print_r(Input::old()); die; 
		?>
	
		<div class="col-md-4" id="border1">
		
			{{ Form::model($data, array('url'=>url('/update-profile'), 'name'=>'form_number_1', 'files' => true)) }}
			
				{{ Form::hidden('form_type', 7)}}
				{{ Form::hidden('form_number', 1)}}
				
				<input name="confirm_form_number" value="1" type="hidden"> 
				
				<div class="padding-form form-inner">
					<div class="form-fields-wrapper">
						<div class="form-group-wrapper flex space-between items-center">
							<h3>Change your name</h3>
							<div class="form-group">
								<p class="label">First Name<sup>*</sup></p>
								{{ Form::text('first_name', null, array())}}
								<span class="red">{{ $errors->first('first_name') }} </span>
							</div>
							<div class="form-group">
								<p class="label">Last Name</p>
								{{ Form::text('last_name', null, array())}}
								<span class="red">{{ $errors->first('last_name') }} </span>
							</div>
							<div class="form-group">
								<p class="label">Your Password<sup>*</sup></p>
								{{ Form::password('cur_password', array())}}
								@if($old_form_number==1) 
									<span class="red">{{ $errors->first('cur_password') }} </span>
								@endif
							</div>
						</div>
					</div>
					<div class="button-wrapper text-center">
						<button type="submit" class="button previous">Save changes</button>
					</div>
				</div>
			{{Form::close()}}
			
		</div>
		
		<div class="col-md-4" id="border1">
		
			{{ Form::model($data, array('url'=>url('/update-profile'), 'name'=>'form_number_2', 'files' => true)) }}
			
				{{ Form::hidden('form_type', 7)}}
				{{ Form::hidden('form_number', 2)}}
				<input name="confirm_form_number" value="2" type="hidden">  
			
				<div class="padding-form form-inner">
					<div class="form-fields-wrapper">
						<div class="form-group-wrapper flex space-between items-center">
							<h3>Change email address</h3>
							<div class="form-group">
								<p class="label">Email (used to log in)<sup>*</sup></p>
								{{ Form::text('email', null, array())}}
								<span class="red">{{ $errors->first('email') }} </span>
							</div>
							<div class="form-group">
								<p class="label">Confirm Email<sup>*</sup></p>
								{{ Form::text('confirm_email', null, array())}}
								<span class="red">{{ $errors->first('confirm_email') }} </span>
							</div>
							<div class="form-group">
								<p class="label">Your Password<sup>*</sup></p>
								{{ Form::password('cur_password', array())}}
								@if($old_form_number==2) 
									<span class="red">{{ $errors->first('cur_password') }} </span>
								@endif
							</div>
						</div>
					</div>
					<div class="button-wrapper text-center">
						<button type="submit" class="button previous">Save changes</button>
					</div>
				</div>
			{{Form::close()}}
			
		</div>
		
		<div style="clear:both"></div>
		
		<div class="col-md-4" id="border1">
		
			{{ Form::open(array('url'=>url('/change-password'))) }}
			
				{{ Form::hidden('form_type', 7)}}
				{{ Form::hidden('form_number', 3)}}
				<input name="confirm_form_number" value="3" type="hidden">  
		
				<div class="padding-form form-inner">
					<div class="form-fields-wrapper">
						<div class="form-group-wrapper flex space-between items-center">
							
							<h3>Change your password</h3>
							
							<div class="form-group">
								<p class="label">Your current password<sup>*</sup></p>
								{{ Form::password('cur_password', array(''))}}
								<span class="red">{{ $errors->first('cur_password')}}</span>
							</div>
							
							<div class="form-group">
								<p class="label">Choose new password<sup>*</sup></p>
								{{ Form::password('new_password', array(''))}}
								<span class="red">{{ $errors->first('new_password')}}</span>
							</div>
							
							<div class="form-group">
								<p class="label">Confirm new password<sup>*</sup></p>
								{{ Form::password('new_password_confirmation', array(''))}}
								<span class="red">{{ $errors->first('new_password_confirmation')}}</span>
							</div>
						</div>
					</div>
					
					<div class="button-wrapper text-center">
						<button type="submit" class="button previous">Save changes</button>
					</div>
					
				</div>
			
			{{Form::close()}}
			
		</div>
		
		<div class="col-md-4" id="border1">
		
			{{ Form::model($data, array('url'=>url('/update-profile'), 'name'=>'form_number_2', 'files' => true)) }}
			
				{{ Form::hidden('form_type', 7)}}
				{{ Form::hidden('form_number', 4)}}
				<input name="confirm_form_number" value="4" type="hidden">  
		
				<div class="padding-form form-inner">
					<div class="form-fields-wrapper">
						<div class="form-group-wrapper flex space-between items-center">
							<h3>Change your status</h3>
							<div class="form-group">
								<br> <br>  
								What do you use House Share market for? 
								<br> <br> <br> 
								<div class="checkbox checkbox-inline">
									{{ Form::checkbox('looking_house_share', 1, null ,array('id'=>'checkbox40'))}}
									<label for="checkbox40">I am looking for an apartment or house share</label>
								</div>
								<div class="checkbox checkbox-inline">
									{{ Form::checkbox('an_house_share', 1, null, array('id'=>'checkbox41'))}}
									<label for="checkbox41">I have an apartment or house shares</label>
								</div>
							</div>
						</div>
					</div>
					<div class="button-wrapper text-center">
						<button type="submit" class="button previous">Save changes</button>
					</div>
				</div>
				
			{{Form::close()}}
		</div>
		
		
		<div style="clear:both"></div>
		
		<div class="col-md-4" id="border1">
			<div class="padding-form form-inner">
				<div class="form-fields-wrapper">
					<div class="form-group-wrapper flex space-between items-center">
						<h3>Your profile photo</h3>
						<div class="form-group">
						
							<div class="row">
								<div class="column-small-12 padd0 align-center">
									<div id="drop-box">
										{{GeneralHelper::showUserImg(Auth::user()->photo, 'img-responsive img_user', '', '', Auth::user()->first_name)}}
									</div>
									<div style="text-align: center;" id="text-msg"></div>
								</div>
								<div class="column-small-12 padd0">
									<input type="file" name="upl" id="upl" />
								</div>
							</div>
							
						</div>
					</div>
					<!-- end .form-group-wrapper -->									
				</div>
				<!-- end .form-field-wrapper --><?php /*
				<div class="button-wrapper text-center">
					<button type="button" class="button previous">Save changes</button>
				</div> */ ?>
				<!-- end .button-wrapper -->			    		
			</div>
		</div>
		
		<div class="col-md-4" id="border1">
		
			{{ Form::model($data, array('url'=>url('/update-profile'), 'name'=>'form_number_2', 'files' => true)) }}
			
				{{ Form::hidden('form_type', 7)}}
				{{ Form::hidden('form_number', 3)}}
				<input name="confirm_form_number" value="3" type="hidden">  
		
				<div class="padding-form form-inner">
					<div class="form-fields-wrapper">
						<div class="form-group-wrapper flex space-between items-center">
							
							<h3>Social Media Profile</h3>
							
							<div class="form-group">
								<p class="label">Facebook</p>
								{{ Form::text('facebook', null, array())}}
								<span class="red">{{ $errors->first('facebook') }} </span>
							</div>
							
							<div class="form-group">
								<p class="label">Google Plus</p>
								{{ Form::text('google_plus',null, array())}}
								<span class="red">{{ $errors->first('google_plus')}}</span>
							</div>
							
							<div class="form-group">
								<p class="label">Twitter</p>
								{{ Form::text('twitter',null,array())}}
								<span class="red">{{ $errors->first('twitter')}}</span>
							</div>
							
							<div class="form-group">
								<p class="label">Linkedin</p>
								{{ Form::text('linkedin',null, array())}}
								<span class="red">{{ $errors->first('linkedin')}}</span>
							</div>
						</div>
					</div>
					
					<div class="button-wrapper text-center">
						<button type="submit" class="button previous">Save changes</button>
					</div>
					
				</div>
			
			{{Form::close()}}
			
		</div>
		
		<?php /*
		<div class="col-md-4" id="border1">
			<div class="form-inner">
				<div class="form-fields-wrapper">
					<div class="form-group-wrapper flex space-between items-center">
					
						<?php //<div class="fb-login-button" data-width="20" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div> ?>
					
						<h3>Connect to Facebook</h3>
						<div class="form-group">
							Click to connect a Facebook account with the email <br>address demo@gmail.com.
						</div>
						<div class="btn-group btn-group-justified">
							<a href="#" class="btn btn-primary"><i class="ion-social-facebook"></i> Facebook</a> 
						</div>
					</div>
					<!-- end .form-group-wrapper -->									
				</div>
				<!-- end .form-field-wrapper -->
				<div class="button-wrapper text-center">
					<button type="button" class="button previous">Save changes</button>
				</div>
				<!-- end .button-wrapper -->			    		
			</div>
		</div> */ ?>
		
		
	</div>
</div>														