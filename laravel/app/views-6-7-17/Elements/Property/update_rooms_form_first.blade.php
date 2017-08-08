<div style="margin-top: 0px;" class="form-inner">
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
	 
</div> 	 


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
				<?php /*
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
				</div>*/ ?>
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
				<label class="control-label" for="Motivo"> Amenities</label><br><?php
				$project_amenities_ids = GeneralHelper::getAmenitiesByPropertyId($data->id); ?>
				@foreach($amenities as $key_amenitie=>$amenitie_val) <?php
					$amenitie_yes_no = null;
					if(in_array($key_amenitie,$project_amenities_ids)) {
						$amenitie_yes_no = true;
					} ?>												
					<div class="checkbox checkbox-inline">
						{{ Form::checkbox('amenitie_id[]', $key_amenitie,$amenitie_yes_no,array('id'=>'checkbox_id_'.$key_amenitie)) }}
						<label for="checkbox_id_{{$key_amenitie}}">&nbsp;{{$amenitie_val}}</label>
					</div>
				@endforeach
			</div>
		</div>
	</div> 
</div>  


<div class="form-inner">
	<div class="form-fields-wrapper">
		<div class="col-md-12">
		
			<div class="alert alert-info alert-dismissible" role="alert">The rooms</div>
			
			<div class="room_cls roomHtml">
			
			
			
				<?php 
				 
				if(Input::old('room_size')) { 
				
					$get_room_size = Input::old('room_size');
					
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
										{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '2',null, array('id'=>'room_size_type_2_'.$room_key)) }}
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
					}
				} else {  
					
					$get_room_data = GeneralHelper::getProperyRoomByPropertyId($data->id);
					
					if(!empty($get_room_data)) { 
						$k=1;
						foreach($get_room_data as $get_room_val) { //echo '<pre>'; print_r($get_room_val); ?>
					
							Room {{$k}}
							
							<div class="form-group">
								<label class="control-label" for="Motivo">Cost of room <span class='red bold'>*</span></label>
								<div class="row">
									<div class="col-md-4">
										{{ Form::text('roomArr['.$k.'][room_cost]', $get_room_val->room_cost, array('class' => 'span4'))}}
										<span class="red">{{ $errors->first('roomArr['.$k.'][room_cost]') }} </span>
									</div>
									<div class="col-md-8">
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$k.'][room_cost_type]', '1',($get_room_val->room_cost_type==1)?true:null,array('id'=>'room_cost_type_1_'.$k)) }}
											<label for="room_cost_type_1_{{$k}}">{{Config::get('constants.ROOM_COST_TYPE.1')}}</label>
										</div>
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$k.'][room_cost_type]', '2',($get_room_val->room_cost_type==2)?true:null,array('id'=>'room_cost_type_2_'.$k)) }}
											<label for="room_cost_type_2_{{$k}}">{{Config::get('constants.ROOM_COST_TYPE.2')}}</label> 
										</div>
										<span class="red">{{ $errors->first('roomArr['.$k.'][room_cost_type]') }} </span>
									</div>
								</div>
							</div> 
							
							<div class="form-group">
								<label class="control-label" for="Motivo">Size of room <span class='red bold'>*</span></label>
								<div class="row">
									<div class="col-md-8">
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$k.'][room_size_type]', '1',($get_room_val->room_size==1)?true:null, array('id'=>'room_size_type_1_'.$k)) }}
											<label for="room_size_type_1_{{$k}}">{{Config::get('constants.ROOM_SIZE_TYPE.1')}}</label>
										</div>
										<div class="radio radio-info radio-inline">
											{{ Form::radio('roomArr['.$k.'][room_size_type]', '2',($get_room_val->room_size==2)?true:null, array('id'=>'room_size_type_2_'.$k)) }}
											<label for="room_size_type_2_{{$k}}">{{Config::get('constants.ROOM_SIZE_TYPE.2')}}</label>
										</div>
										<span class="red">{{ $errors->first('roomArr['.$k.'][room_size_type]') }} </span>
									</div>
								</div>
							</div> 
							
							<div class="form-group">
								<label class="control-label" for="Motivo">Amenities</label><?php
								$amenities_ids = ($get_room_val->amenities_ids)?explode(',',$get_room_val->amenities_ids):array();  ?>
								@foreach($amenities as $key_amenitie=>$amenitie_val) <?php
									$amenitie_yes_no = null;
									if(in_array($key_amenitie,$amenities_ids)) {
										$amenitie_yes_no = true;
									} ?>
									<div class="checkbox">
										{{ Form::checkbox('roomArr['.$k.'][amenitie_id][]', $key_amenitie,$amenitie_yes_no,array('id'=>'amenitie_id_room_'.$key_amenitie.'_'.$k)) }}
										<label for="amenitie_id_room_{{$key_amenitie.'_'.$k}}">{{$amenitie_val}}</label>
									</div>
								@endforeach 
							</div>
							
							<div class="form-group">
								<label class="control-label" for="Motivo"> Security deposit</label>
								{{ Form::text('roomArr['.$k.'][security_deposit]', $get_room_val->security_deposit, array('class' => 'form-control'))}}
							</div><?php 
							$k++;
						}
						
					} 
				}?>
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
			
			<?php 
			$short_term = $data->short_term;
			unset($data->short_term);
			
			//echo '<pre>'; print_r($data); die; ?>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Short Term Lets Considered? <br><small>(i.e. 1 week to 3 months) </small></label>
				<div class="checkbox checkbox-inline">
					{{ Form::checkbox('short_term', 1,($short_term==1)?true:false,array('id'=>'checkbox8')) }}
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
</div> 



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
						<label class="control-label" for="Motivo"> Misc</label><?php 
						$data_misc = ($data->misc)?explode(',',$data->misc):array(); 
						unset($data->misc); ?>
						@foreach(Config::get('constants.MISC_TYPE') as $key_misc=>$misc_val)
							<div class="checkbox"><?php 
								$yes_no = false;
								if(in_array($key_misc,$data_misc)) {
									$yes_no = true;
								} ?>
								{{ Form::checkbox('misc[]', $key_misc,$yes_no,array('id'=>'checkbox_misc_'.$key_misc)) }}
								<label for="checkbox_misc_{{$key_misc}}">{{$misc_val}}</label>
							</div>
						@endforeach
					</div>
				</div>
				 
			</div> 
		</div>
	</div>
</div>



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
				{{ Form::textarea('description', null, array('placeholder'=>'Your Message...', 'style'=>'border:1px solid #ededed;', 'rows'=>3, 'class' => 'form-control'))}}
				<span class="red">{{ $errors->first('description') }} </span>
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
			</div> 
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Status</label>
				{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'form-control'))}}
			</div> 
			
		</div>
	</div>
</div> 