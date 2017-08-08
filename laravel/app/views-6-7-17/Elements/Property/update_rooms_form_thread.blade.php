<div style="margin-top: 0px;" class="form-inner">
	<div class="pricing-plan-field-wrapper">
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				Get started with your room wanted advert 
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="room_size">I am / we are<span class='red bold'>*</span></label> 
						{{ Form::select('i_am_we_are', array(''=>'Select your gender(s)')+Config::get('constants.I_AM_WE_ARE') , null, array('id'=>'room_size', 'class' => 'form-control'))}}
						<span class="red">{{ $errors->first('i_am_we_are') }} </span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Looking for</label>
						<div class="row">
							<div class="col-md-12"> 
								{{ Form::select('looking_for',Config::get('constants.LOOKING_FOR'), null, array('class' => 'form-control'))}}
								<span class="red">{{ $errors->first('looking_for') }} </span>
							</div> 
						</div>
					</div>
				</div>
			</div>
			
			<?php 
			$is_buddy_ups = $data->is_buddy_ups;
			unset($data->is_buddy_ups);  ?>
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label" for="Motivo">Buddy ups</label>
						<div class="checkbox checkbox-inline">
							{{ Form::checkbox('is_buddy_ups', 1,($is_buddy_ups==1)?true:false,array('id'=>'is_buddy_ups')) }}
							<label for="is_buddy_ups">
								I/we are also interested in Buddying up<br><small>Tick this if you might like to Buddy Up with other room seekers to find a whole flat or house together and start a brand new flat/house share. </small> 
							</label>
						</div>
					</div>
				</div> 
			</div>
			 
		</div>
	</div>
</div>  

<div style="margin-top: 0px;" class="form-inner">
	<div class="form-fields-wrapper">
	
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				Your search
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
						<label class="control-label" for="Motivo">Your budget<span class='red bold'>*</span></label>
						<div class="row">
							<div class="col-md-6"> 
								{{ Form::text('rent_amt', null, array('placeholder'=>'$0.00', 'class' => 'rent_amt form-control'))}}
								<span class="red">{{ $errors->first('rent_amt') }} </span>
							</div>
							<div style="padding-top: 6.6%;" class="col-md-6">
								{{ Form::select('rent_amt_type',array(''=>'Per week or month?...')+Config::get('constants.ROOM_COST_TYPE'), null, array('style'=>'margin-top: -16%;','class' => 'rent_amt_type form-control'))}}
								<span class="red">{{ $errors->first('rent_amt_type') }} </span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">I am available to move in from</label>
				<div class="row">
					<div class="col-md-12">
						{{ Form::text('available_from', null, array('readonly'=>true, 'class' => 'form-control datepicker'))}}
						<span class="red">{{ $errors->first('available_from') }} </span>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Period accommodation needed for</label>
						{{ Form::select('minimum_stay_type',array(''=>'No Minimum')+Config::get('constants.MINIMUM_STAY'), null, array('class' => 'form-control'))}}
					</div>
				</div>	
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">to </label>
						{{ Form::select('maximum_stay_type',array(''=>'No Maximum')+Config::get('constants.MAXIMUM_STAY'), null, array('class' => 'form-control'))}}
					</div>
				</div> 
			</div>
			
			<div class="row">
				<div class="col-md-6">					
					<div class="form-group">
						<label class="control-label" for="Motivo">I want to stay in the accommodation</label>
						{{ Form::select('days_available_type',Config::get('constants.DAYS_AVAILABLE'), null, array('class' => 'form-control'))}}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">	
					<div class="form-group">
						<label class="control-label" for="Motivo">I would prefer these amenities</label><br><?php
						$project_amenities_ids = GeneralHelper::getAmenitiesByPropertyId($data->id); ?>
						@foreach($amenities as $key_amenitie=>$amenitie_val) <?php
							$amenitie_yes_no = null;
							if(in_array($key_amenitie,$project_amenities_ids)) {
								$amenitie_yes_no = true;
							} ?>
							<div class="checkbox checkbox-inline col-md-6">
								{{ Form::checkbox('amenitie_id[]', $key_amenitie,$amenitie_yes_no,array('id'=>'checkbox_id_'.$key_amenitie)) }}
								<label for="checkbox_id_{{$key_amenitie}}">&nbsp;{{$amenitie_val}}</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				About you 
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Ages</label><?php 
						for($j=16; $j<100; $j++){
							$minimum_ageArr[$j] = $j;
						} ?>
						{{ Form::select('minimum_age',array(''=>'Please select')+$minimum_ageArr, null, array('class' => 'form-control'))}}
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo"> Occupation</label>
						{{ Form::select('is_occupation',array(''=>'No preference')+Config::get('constants.OCCUPATION_TYPE'), null, array('class' => 'form-control'))}}
					</div>
				</div> 
			</div>
			
			<div class="row">
				<div class="col-md-12">					
					<div class="form-group">
						<label class="control-label" for="Motivo">DSS?</label>
						<div class="checkbox checkbox-inline">
							{{ Form::checkbox('is_dss', 1,null,array('id'=>'is_dss')) }}
							<label for="is_dss">
								<small>Yes, I will be using housing benefit to pay some or all my rent </small> 
							</label>
						</div>
					</div>
				</div>
			</div> 
			
			<div class="row">
				<div class="col-md-6">					
					<div class="form-group">
						<label class="control-label" for="Motivo">Do you smoke?</label>
						{{ Form::select('is_smoking',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'form-control'))}}
					</div>
				</div>
				<div class="col-md-6">					
					<div class="form-group">
						<label class="control-label" for="Motivo">Do you have any pets?</label>
						{{ Form::select('is_pets',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'form-control'))}}
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">					
					<div class="form-group">
						<label class="control-label" for="Motivo">Your sexual orientation</label>
						{{ Form::select('is_sexual_orientation',array(''=>'No preference')+Config::get('constants.SEXUAL_ORIENTATION'), null, array('class' => 'form-control'))}}
					</div>
				</div> 
			</div>
			
			<div class="row"> 					
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Your preferred language</label>
						{{ Form::select('language_id',$languages, null, array('class' => 'form-control'))}}
					</div>
				</div> 
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo"> Your nationality</label>
						{{ Form::select('country_id',$nationality, null, array('class' => 'form-control'))}}
					</div>
				</div>
			</div> 
			
			<div class="row"> 					
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Your Interests</label>
						{{ Form::text('your_interests', null, array('class' => 'form-control'))}}
					</div>
				</div> 
				<div class="col-md-6">&nbsp;</div>
			</div>
			
			<div class="row"> 					
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Your Name<span class='red bold'>*</span></label>
						{{ Form::text('first_name', null, array('placeholder'=>'First Name', 'class' => 'form-control'))}}
						<span class="red">{{ $errors->first('first_name') }} </span>
					</div>
				</div> 
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">&nbsp;</label>
						{{ Form::text('last_name', null, array('placeholder'=>'Last Name', 'class' => 'form-control'))}}
						<span class="red">{{ $errors->first('last_name') }} </span>
					</div>	
				</div>
			</div> 
			  
		</div> 
		
		
		<div class="col-md-12">
		
			<div class="alert alert-info alert-dismissible" role="alert">Advert details (optional)</div>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Title<span class='red bold'>*</span>&nbsp;</label>(short description - max 50 characters) 
				{{ Form::text('title', null, array('maxlength'=>50,'class' => 'form-control'))}}
				<span class="red">{{ $errors->first('title') }} </span>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Description<span class='red bold'>*</span>&nbsp;</label>(No contact details permitted within description) 
				{{ Form::textarea('description', null, array('placeholder'=>'Your Message...', 'style'=>'border:1px solid #ededed;', 'rows'=>3, 'class' => 'form-control'))}}
				<span class="red">{{ $errors->first('description') }} </span>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Buddy Up additional description</label> (Optional message shown to Buddy Up searches 
				{{ Form::textarea('buddy_description', null, array('placeholder'=>'Your Message...','style'=>'border:1px solid #ededed;','rows'=>3, 'class' => 'form-control'))}}
				<span class="red">{{ $errors->first('buddy_description') }} </span>
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

<style>
.steps-progress-bar {
margin: 45px auto 0;
max-width: 159px;
}	
</style>
