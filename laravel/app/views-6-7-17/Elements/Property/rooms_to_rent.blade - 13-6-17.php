{{ Form::model($get_form_data, array('url' => array('advertise/'.Route::input('slug')),'method' => 'PUT', 'id'=>'add_post_form', 'class' => 'job-post-form multisteps-form')) }}

	<fieldset style="{{($get_form_step==1)?'display:block':'display:none'}}">
		<h2 class="form-title text-center dark">Advertise your room</h2>
		<h3 class="step-title text-center dark">Step 1</h3>
		<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
			<li><span>1</span></li>
			<li><span>2</span></li>
			<li><span>3</span></li>
			<li><span>4</span></li>
			<li><span>5</span></li>
			<li><span>6</span></li>
		</ul>
		
		<input class="form-control" name="form_step" value="{{$get_form_step}}" type="hidden">
		
		<div class="form-inner">
			<div class="pricing-plan-field-wrapper">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">
						Get started with your free advert 
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="room_size">I have</label>
								<?php 
								for($j=1; $j<13; $j++){
									$room_sizeArr[$j] = $j.'&nbsp;room for rent';
								} ?>
								{{ Form::select('room_size',$room_sizeArr, null, array('onchange'=>'getRoom()', 'id'=>'room_size', 'class' => 'form-control'))}}
								<span class="red">{{ $errors->first('room_size') }} </span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Size & type of property</label>
								<div class="row">
									<div class="col-md-6"><?php 
										for($j=2; $j<13; $j++){
											$bed_sizeArr[$j] = $j.'&nbsp;bed';
										} ?>
										{{ Form::select('bed_size',$bed_sizeArr, null, array('class' => 'form-control'))}}
										<span class="red">{{ $errors->first('bed_size') }} </span>
									</div>
									<div class="col-md-6">
										{{ Form::select('property_type',Config::get('constants.PROPERTY_TYPE'), null, array('style'=>'margin-top: -16%;','class' => 'form-control'))}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">There are already</label>
								<?php 
								for($j=0; $j<11; $j++){
									$already_in_propertyArr[$j] = $j;
								} ?>
								{{ Form::select('already_in_property',$already_in_propertyArr, null, array('class' => 'form-control'))}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Postcode of property<span class='red bold'>*</span>&nbsp;(e.g. SE15 8PD) </label>
								{{ Form::text('post_code', null, array('class' => 'form-control'))}}
								<span class="red">{{ $errors->first('post_code') }} </span>
							</div>
						</div>
					</div>
					<div class="form-group">
					
						<label class="control-label" for="Motivo">I am a<span class='red bold'>*</span></label>
						<div class="radio radio-danger">
							{{ Form::radio('i_am_type', '1' ,null,array('id'=>'radio3')) }}
							<label for="radio3">&nbsp;Live in landlord <small>(I own the property and live there)</small></label>
						</div>
						
						<div class="radio radio-danger">
							{{ Form::radio('i_am_type', '2' ,null,array('id'=>'radio4')) }}
							<label for="radio4">&nbsp;Live out landlord <small>(I own the property but don't live there)</small></label>
						</div>
						
						<div class="radio radio-danger">
							{{ Form::radio('i_am_type', '3' ,null,array('id'=>'radio5')) }}
							<label for="radio5">&nbsp;Current tenant/flatmate <small>(I am living in the property)</small></label>
						</div>
						
						<div class="radio radio-danger">
							{{ Form::radio('i_am_type', '4' ,null,array('id'=>'radio6')) }}
							<label for="radio6">&nbsp;Agent <small>(I am advertising on a landlord's behalf)</small></label>
						</div>
						
						<div class="radio radio-danger">
							{{ Form::radio('i_am_type', '5' ,null,array('id'=>'radio7')) }}
							<label for="radio7">&nbsp;Former flatmate <small>(I am moving out and need someone to replace me)</small></label>
						</div> 
						<span class="red">{{ $errors->first('i_am_type') }} </span>
					</div>
					<div class="form-group">
						<label class="control-label" for="Motivo">My email is<span class='red bold'>*</span></label>
						{{ Form::text('email', null, array('class' => 'form-control'))}}
						<span class="red">{{ $errors->first('email') }} </span>
					</div>
				</div>
			</div>
			
			<div class="button-wrapper text-center">
				<input value="Continue to next step" name="1" type="submit" class="button"></button>
			</div>
			
		</div> 							
	</fieldset>

	<fieldset style="{{($get_form_step==2)?'display:block':'display:none'}}">
		
		<h2 class="form-title text-center dark">Advertise your room</h2>
		<h3 class="step-title text-center dark">Step 2</h3>
		
		<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="sub-active"><span>2</span></li>
			<li><span>3</span></li>
			<li><span>4</span></li>
			<li><span>5</span></li>
			<li><span>6</span></li>
		</ul>
		
		<div class="form-inner">
			<div class="form-fields-wrapper">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">
						More about the property
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Area<span class='red bold'>*</span></label>
								{{ Form::text('area', null, array('onFocus'=>'geolocate()', 'id'=>'autocomplete', 'class' => 'form-control'))}}
								<span class="red">{{ $errors->first('area') }} </span>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo"> Street name  </label>
								{{ Form::text('street_name', null, array('id'=>'route', 'class' => 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Postcode</label>
								<div>{{!empty($get_form_data['post_code'])?$get_form_data['post_code']:''}}</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Transport</label>
								<div class="row">
									<div class="col-md-12">
										{{ Form::text('transport', null, array('class' => 'form-control'))}}
										<span class="red">{{ $errors->first('transport') }} </span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="Motivo"> Living Room? </label>
						<div class="radio radio-danger">
							{{ Form::radio('living_room_type', '1',null,array('id'=>'radio9')) }}
							<label for="radio9">&nbsp;{{Config::get('constants.LIVING_ROOM.1')}}</label>
						</div>
						<div class="radio radio-danger">
							{{ Form::radio('living_room_type', '2',null,array('id'=>'radio10')) }}
							<label for="radio10">&nbsp;{{Config::get('constants.LIVING_ROOM.2')}}</label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="Motivo"> Amenities</label><br>
						@foreach($amenities as $key_amenitie=>$amenitie_val)
							<div class="checkbox checkbox-inline">
								{{ Form::checkbox('amenitie_id[]', $key_amenitie,null,array('id'=>'checkbox_id_'.$key_amenitie)) }}
								<label for="checkbox_id_{{$key_amenitie}}">&nbsp;{{$amenitie_val}}</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			
			<div class="button-wrapper text-center">
				<a href="{{URL::to('advertise-back/'.Route::input('slug').'/'.$get_form_step)}}"><button type="button" class="button">Back</button></a>
				<button type="submit" class="button">Continue to next step </button>
			</div>
		</div>
	</fieldset>
	 

	<fieldset style="{{($get_form_step==3)?'display:block':'display:none'}}"> 
		
		
		<h2 class="form-title text-center dark">Advertise your room</h2>
		<h3 class="step-title text-center dark">Step 3</h3>
		<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="sub-active"><span>3</span></li>
			<li><span>4</span></li>
			<li><span>5</span></li>
			<li><span>6</span></li>
		</ul> 
		<div class="form-inner">
			<div class="form-fields-wrapper">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">The rooms</div>
					
					<div class="room_cls roomHtml">
					
						<?php 
						$get_room_size = isset($get_form_data['room_size'])?$get_form_data['room_size']:1;
						
						for($room_key=1; $room_key<=$get_room_size; $room_key++) { ?>
						
							Room {{$room_key}}
							
							<div class="form-group">
								<label class="control-label" for="Motivo">Cost of room <span class='red bold'>*</span></label>
								<div class="row">
									<div class="col-md-4">
										{{ Form::text('roomArr['.$room_key.'][room_cost]', null, array('class' => 'span4'))}}
										<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_cost]') }} </span>
									</div>
									<div class="col-md-8">
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$room_key.'][room_cost_type]', '1',null,array('id'=>'room_cost_type_1_'.$room_key)) }}
											<label for="room_cost_type_1_{{$room_key}}">{{Config::get('constants.ROOM_COST_TYPE.1')}}</label>
										</div>
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$room_key.'][room_cost_type]', '2',null,array('id'=>'room_cost_type_2_'.$room_key)) }}
											<label for="room_cost_type_2_{{$room_key}}">{{Config::get('constants.ROOM_COST_TYPE.2')}}</label> 
										</div>
										<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_cost_type]') }} </span>
									</div>
								</div>
							</div> 
							
							<div class="form-group">
								<label class="control-label" for="Motivo">Size of room <span class='red bold'>*</span></label>
								<div class="row">
									<div class="col-md-8">
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '1',null, array('id'=>'room_size_type_1_'.$room_key)) }}
											<label for="room_size_type_1_{{$room_key}}">{{Config::get('constants.ROOM_SIZE_TYPE.1')}}</label>
										</div>
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '1',null, array('id'=>'room_size_type_2_'.$room_key)) }}
											<label for="room_size_type_2_{{$room_key}}">{{Config::get('constants.ROOM_SIZE_TYPE.2')}}</label>
										</div>
										<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_size_type]') }} </span>
									</div>
								</div>
							</div> 
							
							<div class="form-group">
								<label class="control-label" for="Motivo">Amenities</label>
								@foreach($amenities as $key_amenitie=>$amenitie_val)
									<div class="checkbox">
										{{ Form::checkbox('roomArr['.$room_key.'][amenitie_id][]', $key_amenitie,null,array('id'=>'amenitie_id_room_'.$key_amenitie.'_'.$room_key)) }}
										<label for="amenitie_id_room_{{$key_amenitie.'_'.$room_key}}">{{$amenitie_val}}</label>
									</div>
								@endforeach 
							</div>
							
							<div class="form-group">
								<label class="control-label" for="Motivo"> Security deposit</label>
								{{ Form::text('roomArr['.$room_key.'][security_deposit]', null, array('class' => 'form-control'))}}
							</div><?php 
						} ?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Available from </label>
						<div class="row">
							<div class="col-md-12">
								{{ Form::text('available_from', null, array('readonly'=>true, 'class' => 'form-control datepicker'))}}
								<span class="red">{{ $errors->first('available_from') }} </span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Minimum stay </label>
						{{ Form::select('minimum_stay_type',array(''=>'No Minimum')+Config::get('constants.MINIMUM_STAY'), null, array('class' => 'form-control'))}}
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Maximum stay </label>
						{{ Form::select('maximum_stay_type',array(''=>'No Maximum')+Config::get('constants.MAXIMUM_STAY'), null, array('class' => 'form-control'))}}
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Short Term Lets Considered? <br><small>(i.e. 1 week to 3 months) </small></label>
						<div class="checkbox checkbox-inline">
							{{ Form::checkbox('short_term', 1,null,array('id'=>'checkbox8')) }}
							<label for="checkbox8">
								Tick for Yes<br><small>(You may wish to specify rent differences in the description further down)</small> 
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo"> Days available  </label>
						{{ Form::select('days_available_type',Config::get('constants.DAYS_AVAILABLE'), null, array('class' => 'form-control'))}}
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo"> References required? </label>
						<div class="row">
							<div class="col-md-8">
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_references_required', '1',null,array('id'=>'inlineRadio3')) }}
									<label for="inlineRadio3">{{Config::get('constants.REFERENCES_REQUIRED.1')}}</label>
								</div>
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_references_required', '2',null,array('id'=>'inlineRadio4')) }}
									<label for="inlineRadio4">{{Config::get('constants.REFERENCES_REQUIRED.2')}}</label>
								</div>
							</div>
						</div>
					</div>
				 
					<div class="form-group">
						<label class="control-label" for="Motivo">Bills Included</label>
						<div class="row">
							<div class="col-md-8">
							
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_bills_included', '1',null,array('id'=>'inlineRadio5')) }}
									<label for="inlineRadio5">{{Config::get('constants.BILLS_INCLUDED.1')}}</label>
								</div>
								
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_bills_included', '2',null,array('id'=>'inlineRadio6')) }}
									<label for="inlineRadio6">{{Config::get('constants.BILLS_INCLUDED.2')}}</label>
								</div>
								
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_bills_included', '3',null,array('id'=>'inlineRadio7')) }}
									<label for="inlineRadio7">{{Config::get('constants.BILLS_INCLUDED.3')}}</label>
								</div> 
								
							</div>
						</div>
					</div>
					 
					<div class="form-group">
						<label class="control-label" for="Motivo">Broadband Included?</label>
						<div class="row">
							<div class="col-md-8">
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_broadband_included', '1',null,array('id'=>'inlineRadio8')) }}
									<label for="inlineRadio8">{{Config::get('constants.REFERENCES_REQUIRED.1')}}</label>
								</div>
								<div class="radio radio-info radio-inline">
									{{ Form::radio('is_broadband_included', '2',null,array('id'=>'inlineRadio9')) }}
									<label for="inlineRadio9">{{Config::get('constants.REFERENCES_REQUIRED.2')}}</label>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="button-wrapper text-center">
				<a href="{{URL::to('advertise-back/'.Route::input('slug').'/'.$get_form_step)}}"><button type="button" class="button">Back</button></a>
				<button type="submit" class="button">Continue to next step </button>
			</div>
		</div>
		
	</fieldset>


	<fieldset style="{{($get_form_step==4)?'display:block':'display:none'}}">
		
		<h2 class="form-title text-center dark">Advertise your room</h2>
		<h3 class="step-title text-center dark">Step 4</h2>
		<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="sub-active"><span>4</span></li>
			<li><span>5</span></li>
			<li><span>6</span></li>
		</ul>
		
		<div class="form-inner">
			<div class="form-fields-wrapper">
				<div class="col-md-12">
					<div class="alert alert-info alert-dismissible" role="alert">
						Preferences For New Flatmates 
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Smoking</label>
								{{ Form::select('is_smoking',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'form-control'))}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Gender<span class='red bold'>*</span></label>
								{{ Form::select('is_gender',array(''=>'No preference')+Config::get('constants.GENDER'), null, array('class' => 'form-control'))}}
								<span class="red">{{ $errors->first('is_gender') }}</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo"> Occupation</label>
								{{ Form::select('is_occupation',array(''=>'No preference')+Config::get('constants.OCCUPATION_TYPE'), null, array('class' => 'form-control'))}}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Pets</label>
								{{ Form::select('is_pets',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'form-control'))}}
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Ages</label>
								<div class="row">
									<div class="col-md-6"><?php 
										for($j=16; $j<100; $j++){
											$minimum_ageArr[$j] = $j;
										} ?>
										{{ Form::select('minimum_age',array(''=>'Please select')+$minimum_ageArr, null, array('class' => 'form-control'))}}
									</div>
									<div class="col-md-6"><?php 
										for($j=16; $j<100; $j++){
											$maximum_ageArr[$j] = $j;
										} ?>
										{{ Form::select('maximum_age',array(''=>'Please select')+$maximum_ageArr, null, array('class' => 'form-control'))}}
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Language</label>
								{{ Form::select('language_id',$languages, null, array('class' => 'form-control'))}}
							</div>
						</div>
						
					</div>
					
					
					<div class="row">
					
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo">Couples Welcome?</label>
								<div class="row">
									<div class="col-md-8">
										<div class="radio radio-info radio-inline">
											{{ Form::radio('is_couples_welcome', '1',null,array('id'=>'inlineRadio11')) }}
											<label for="inlineRadio11">{{Config::get('constants.YES_NO.1')}}</label>
										</div>
										<div class="radio radio-info radio-inline">
											{{ Form::radio('is_couples_welcome', '2',null,array('id'=>'inlineRadio12')) }}
											<label for="inlineRadio12">{{Config::get('constants.YES_NO.2')}}</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="Motivo"> Misc</label>
								@foreach(Config::get('constants.MISC_TYPE') as $key_misc=>$misc_val)
									<div class="checkbox">
										{{ Form::checkbox('misc[]', $key_misc,null,array('id'=>'checkbox_misc_'.$key_misc)) }}
										<label for="checkbox_misc_{{$key_misc}}">{{$misc_val}}</label>
									</div>
								@endforeach
								* Please specify rent adjustments in your advert description below. 
							</div>
						</div>
					</div> 
				</div>
			</div>
			
			<div class="button-wrapper text-center">
				<a href="{{URL::to('advertise-back/'.Route::input('slug').'/'.$get_form_step)}}"><button type="button" class="button">Back</button></a>
				<button type="submit" class="button">Continue to next step </button>
			</div>
			
		</div>
		
	</fieldset>


	<fieldset style="{{($get_form_step==5)?'display:block':'display:none'}}">
		
		<h2 class="form-title text-center dark">Advertise your room</h2>
		<h3 class="step-title text-center dark">Step 5</h3>
		<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
			<li class="sub-active"><span>5</span></li>
			<li><span>6</span></li>
		</ul>
		
		<div class="form-inner">
			<div class="form-fields-wrapper">
				<div class="col-md-12">
				
					<div class="alert alert-info alert-dismissible" role="alert">Your Advert & contact details</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Title</label>(short description - max 50 characters) 
						{{ Form::text('title', null, array('maxlength'=>50,'class' => 'form-control'))}}
						<span class="red">{{ $errors->first('title') }} </span>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Description</label>(No contact details permitted within description) 
						{{ Form::textarea('description', null, array('placeholder'=>'Your Message...','rows'=>3, 'class' => 'form-control'))}}
						<span class="red">{{ $errors->first('description') }} </span>
						Tips: Give more detail about the accommodation, who you are looking for and what a potential flatmate should expect living with you. You must write at least 25 words and can write as much as you like within reason. 
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Photos</label>
						<div>You will have the opportunity to add photos to your advert after step 6 </div>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Your name </label>
						<div class="row">
							<div class="col-md-6">
								{{ Form::text('first_name', null, array('class' => 'form-control'))}}
								<span class="red">{{ $errors->first('first_name') }} </span>
							</div>
							<div class="col-md-6">
								{{ Form::text('last_name', null, array('class' => 'form-control'))}}
								<span class="red">{{ $errors->first('last_name') }} </span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Telephone</label>
						{{ Form::text('telephone', null, array('class' => 'form-control'))}}
						(recommended - we only display to registered users) 
					</div>
					
					<div class="form-group">
						<label class="control-label" for="Motivo">Email</label>
						<div>As per your login details provided on the next step <br>
							(NOTE We never reveal your email address - users email you through our messaging system which we then forward to your email, thus protecting your privacy)
						</div>
					</div>
					
				</div>
			</div> 
			
			<div class="button-wrapper text-center">
				<a href="{{URL::to('advertise-back/'.Route::input('slug').'/'.$get_form_step)}}"><button type="button" class="button">Back</button></a>
				<button type="submit" class="button">Continue to next step </button>
			</div> 
			
		</div> 
		
	</fieldset>

{{Form::close()}}

 
{{ Form::model(null, array('url'=>url('login-register/'.Route::input('slug')), 'class'=>'form-horizontal1', 'id'=>'signup_form')) }} 

<fieldset style="{{($get_form_step==6)?'display:block':'display:none'}}">
	
	<h2 class="form-title text-center dark">Advertise your room </h2>
	<h3 class="step-title text-center dark">Step 6</h3>
	<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="sub-active"><span>6</span></li>
	</ul>
	
 
	<div class="form-inner">
	
		<div class="form-fields-wrapper">
		
			<div class="col-md-12">
			
				@if(Auth::check())
					
					<div class="alert alert-info alert-dismissible" role="alert">Email Alerts</div>
					<div class="row">
						<div class="col-md-12"> 
							<div class="form-group">
								<label for="">Daily Email Alerts</label>
								<div class="checkbox">
									{{ Form::checkbox('daily_email_alerts', 1,null,array('id'=>'checkbox1_con')) }}
									<label for="checkbox1_con">
										Yes, please send me daily summary emails of new Rooms Wanted adverts matching my requirements 
									</label>
								</div>
								<label for="">Instant Email Alerts</label>
								<div class="checkbox">
									{{ Form::checkbox('instant_email_alerts', 1,null,array('id'=>'checkbox2_con')) }}
									<label for="checkbox2_con">
										Yes, please send me emails of new Rooms Wanted adverts matching my requirements as soon as they are placed on the website 
									</label>
								</div>
							</div>
						</div>
					</div>
					
				@else 
					
					<div class="alert alert-info alert-dismissible" role="alert">
						Login information
					</div>
					<div class="row">
						<div class="col-md-6">
							Existing user? 
							<hr>
							<div class="form-group">
								<label class="control-label" for="Motivo">Email Address</label>
								{{ Form::text('login_email', null, array('autocomplete'=>'off', 'class'=>'form-control', 'id'=>'email', 'placeholder' =>'Email*'))}}  
								<span class="red">{{ $errors->first('login_email') }}</span>
							</div>
							<div class="form-group">
								<label class="control-label" for="Motivo">Password</label>
								{{ Form::password('login_password', array('autocomplete'=>'off', 'type'=>'password', 'class'=>'form-control', 'id'=>'password', 'placeholder' =>'Password*'))}}
								<span class="red">{{ $errors->first('login_password') }}</span>
							</div><?php /*
							<div class="form-group">
								<label class="control-label" for="Motivo"><a herf="#">Forgot Password</a></label>
							</div>*/ ?>
						</div>
						<div class="col-md-6">
							New user? 
							<hr>
							<div class="form-group">
								<label class="control-label" for="Motivo">Email</label>
								{{ Form::text('email', null, array('autocomplete'=>'off', 'class'=>'form-control', 'id'=>'email', 'placeholder' =>'Email*', 'data-bv-notempty-message'=>'false', ))}}  
								<span class="red">{{ $errors->first('email') }}</span>
							</div>
							<div class="form-group">
								<label class="control-label" for="Motivo">Confirm email</label>
								{{ Form::text('conf_email', null, array('autocomplete'=>'off', 'class'=>'form-control', 'id'=>'email', 'placeholder' =>'Confirm Email*', 'data-bv-notempty-message'=>'false', ))}}  
								<span class="red">{{ $errors->first('conf_email') }}</span>
							</div>
							<div class="form-group">
								<label class="control-label" for="Motivo">Password</label>
								{{ Form::password('password', array('autocomplete'=>'off', 'type'=>'password', 'class'=>'form-control', 'id'=>'password', 'placeholder' =>'Password*', 'data-bv-notempty-message'=>'false', ))}}
								<span class="red">{{ $errors->first('password') }}</span>
							</div>
							<div class="form-group">
								<label class="control-label" for="Motivo">Confirm Password</label>
								{{ Form::password('conf_password', array('autocomplete'=>'off', 'type'=>'password', 'class'=>'form-control', 'id'=>'password', 'placeholder' =>'Confirm password*', 'data-fv-identical'=>true, 'data-fv-identical-field'=>'password', 'data-bv-notempty-message'=>'false', ))}}
								<span class="red">{{ $errors->first('conf_password') }}</span>
							</div>
							<div class="form-group">
								<div class="checkbox">
									{{ Form::checkbox('notify_email_suitable', 1,null,array('id'=>'checkbox1_noti')) }}
									<label for="checkbox1_noti">
										Notify me by email of suitable flatmates (room wanted adverts)
									</label>
								</div>
								<div class="checkbox">
									{{ Form::checkbox('send_me_occasional', 1,null,array('id'=>'checkbox1_occasional')) }}
									<label for="checkbox1_occasional">
										Send me occasional newsletters
									</label><br>
									<small>(We NEVER pass on your details to third parties) </small>
								</div><?php /*
								<div class="form-group">
									<input class="form-control" id="Correo" name="Correo" placeholder="Where did you hear about us?" required="" type="text">
								</div> */ ?>
								<div class="form-group">
									<div class="form_input form_checkbox">
										<label class="hidden">
											<input name="inagreement" checked="" value="Y" type="checkbox">
										</label>
										*By registering, I agree to SpareRoom's
										<a target="_blank" href="{{URL::to('pages/conditions')}}">terms</a> and
										<a target="_blank" href="{{URL::to('pages/privacy-policy')}}">privacy policy</a>, and to receive emails from SpareRoom (you can unsubscribe any time).
									</div>
								</div>
							</div>
						</div>
					</div> 
				
				@endif 
				
			</div>
		</div>
		
		<div class="button-wrapper text-center">
			<a href="{{URL::to('advertise-back/'.Route::input('slug').'/'.$get_form_step)}}"><button type="button" class="button">Back</button></a>
			<button type="submit" class="button">Submit</button>
		</div>
	</div>

</fieldset>

{{Form::close()}}


<?php /*

<fieldset>
	<h2 class="form-title text-center dark">Place an ad</h2>
	<h3 class="step-title text-center dark">
	You've successfully posted a job</h2>
	<ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
		<li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
	</ul>
	<!-- end .steps-progress-bar -->
	<div class="form-inner">
		<h2 class="text-center job-post-success">Congratulations!</h2>
		<p class="text-center">You’ve successfully posted a new job. Let’s see who you’re gonna hire. Whenever you want to edit your job, please go to your <a href="#0">Dashboard</a>> <a href="#0">Manage Jobs</a>. Thank you for using our job board!</p>
		<div class="button-wrapper text-center">
			<button type="button" class="button">View job now</button>
		</div>
		<!-- end .button-wrapper -->
	</div>
	<!-- end .form-inner -->	
</fieldset> */ ?>




<script type="text/javascript">

    var placeSearch, autocomplete;
    var componentForm = {
        //street_number: 'short_name',
        route: 'long_name',
        //locality: 'long_name',
       // administrative_area_level_1: 'short_name',
       // country: 'long_name',
       // postal_code: 'short_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')),
            {types: ['geocode']}
		);
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        
        var place = autocomplete.getPlace();
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
			var addressType = place.address_components[i].types[0];
			if (componentForm[addressType]) {
				var val = place.address_components[i][componentForm[addressType]];
				document.getElementById(addressType).value = val;
			}
        }
    }
 
    function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
    }
	
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{Config::get('constants.API_KEY_GOOGLE')}}&libraries=places&callback=initAutocomplete" async defer></script>

<script type="text/javascript">
	
	function getRoom(){
	
		var room_rent_type = $('#room_size').val();
		
		$.ajax({
			url: "{{URL::to('admin/get-room-html')}}",
			type: "POST", 
			dataType: "html",
			data: {room_rent_type:room_rent_type},
			success: function(data){
				$('.roomHtml').html(data);
			},
			error: function(data,status,e){
				 
			}
		});
	}
	
</script>

