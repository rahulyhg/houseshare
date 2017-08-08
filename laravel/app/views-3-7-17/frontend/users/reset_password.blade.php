@extends('frontend/layouts/default') 
@section('title')
Change Password
@stop

@section('content')


<div class="container">
	<section>
		<div class="about-1 blue">
			<div class="">
				<div class="c">
					<h3>Change Password</h3> 
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="over g">
			<div class="row">
				<div class="col-lg-12 bhoechie-tab-container">
					
					
					<div class="col-lg-12 col-md-12 col-sm-12 bhoechie-tab"> 
						
						<div class="tab-content">
							<div id="" class="tab-pane fade in active"> 
								
								<div class="m-t-31 setting">
									
									<div style="border:0px;" class="managegrpupdte-sec-1">
										<div class="row">   
											
											<div class="col-md-6">  
											
												{{ Form::open(array('url' => array('settings/reset-password/'.Route::input('token')), 'name'=>'SearchGroup', 'id'=>'change_password', 'files'=>true)) }} 
											 
												<div class="form-horizontal">
													<div class="form-group">
														<label class="control-label col-sm-4" for="new_password">New Password</label>
														<div class="col-sm-8"> 
															{{ Form::password('new_password', array('class' => 'form-control gry'))}}
															<span class="help-block"> {{$errors->first('new_password')}} </span> 
														</div>
													</div>
												</div>						
												
												<div class="form-horizontal">
													<div class="form-group">
														<label class="control-label col-sm-4" for="new_password_confirmation">Confirm password</label>
														<div class="col-sm-8"> 
															{{ Form::password('new_password_confirmation', array('class' => 'form-control gry'))}}
															<span class="help-block"> {{$errors->first('new_password_confirmation')}} </span> 
														</div>
													</div>
												</div>
												 
												
												<div class="text-center"> <a href="javascript:;" onclick="document.getElementById('change_password').submit();" class="btn-snd submit disk"> Change Password </a> </div>
												
												{{Form::close()}} 
												
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
</div>



@stop									