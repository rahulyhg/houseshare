<div style="margin-top: 0px;" class="form-inner">
	<div class="pricing-plan-field-wrapper">
		<div class="col-md-12">
			<div class="alert alert-info alert-dismissible" role="alert">
				Get started with your free advert 
			</div>
			<div class="row">
			
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">I have</label>
						<div class="row">
							<div class="col-md-6"><?php 
								for($j=1; $j<13; $j++){
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

				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Rent<span class='red bold'>*</span></label>
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
				
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" for="Motivo">Security Deposit</label>
						<div class="row">
							<div class="col-md-12"> 
								{{ Form::text('security_deposit', null, array('placeholder'=>'$0.00', 'class' => 'form-control'))}}
								<span class="red">{{ $errors->first('rent_amt') }} </span>
							</div>
						</div>
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
					{{ Form::radio('i_am_type', '2' ,null,array('id'=>'radio4')) }}
					<label for="radio4">&nbsp;Live out landlord <small>(I own the property but don't live there)</small></label>
				</div>
				
				<div class="radio radio-danger">
					{{ Form::radio('i_am_type', '4' ,null,array('id'=>'radio6')) }}
					<label for="radio6">&nbsp;Agent <small>(I am advertising on a landlord's behalf)</small></label>
				</div>
				
				<div class="radio radio-danger">
					{{ Form::radio('i_am_type', '3' ,null,array('id'=>'radio5')) }}
					<label for="radio5">&nbsp;Current tenant/flatmate <small>(I am living in the property)</small></label>
				</div> 
				 
				<span class="red">{{ $errors->first('i_am_type') }} </span>
			</div>
			<div class="form-group">
				<label class="control-label" for="Motivo">My email is<span class='red bold'>*</span></label>
				{{ Form::text('my_email', $data->email, array('class' => 'form-control'))}}
				<span class="red">{{ $errors->first('my_email') }} </span>
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
						<label class="control-label" for="Motivo">Street name</label>
						{{ Form::text('street_name', null, array('id'=>'route', 'class' => 'form-control'))}}
					</div>
				</div>
			</div>
			<div class="row">
				<?php /*<div class="col-md-6">
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
				</div> */ ?>
			</div>
			
			<?php /*
			<div class="row">
			
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Rent</label>
						<div class="row">
							<div class="col-md-6"> 
								{{ Form::text('rent_amt', null, array('placeholder'=>'$0.00', 'class' => 'rent_amt form-control'))}}
								<span class="red">{{ $errors->first('rent_amt') }} </span>
							</div>
							<div style="padding-top: 6.6%;" class="col-md-6">
								{{ Form::select('rent_amt_type',array(''=>'Per week or month?...')+Config::get('constants.ROOM_COST_TYPE'), null, array('style'=>'margin-top: -16%;','class' => 'rent_amt_type form-control'))}}
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Security Deposit</label>
						<div class="row">
							<div class="col-md-6"> 
								{{ Form::text('security_deposit', null, array('placeholder'=>'$0.00', 'class' => 'form-control'))}}
								<span class="red">{{ $errors->first('rent_amt') }} </span>
							</div>
						</div>
					</div>
				</div>
				
			</div> */ ?>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Furnishings</label>
				<div class="radio radio-danger">
					{{ Form::radio('is_furnishings', '1',null,array('id'=>'radio9')) }}
					<label for="radio9">&nbsp;{{Config::get('constants.FURNISHED_TYPE.1')}}</label>
				</div>
				<div class="radio radio-danger">
					{{ Form::radio('is_furnishings', '2',null,array('id'=>'radio10')) }}
					<label for="radio10">&nbsp;{{Config::get('constants.FURNISHED_TYPE.2')}}</label>
				</div>
				<div class="radio radio-danger">
					{{ Form::radio('is_furnishings', '3',null,array('id'=>'is_furnishings_3')) }}
					<label for="is_furnishings_3">&nbsp;{{Config::get('constants.FURNISHED_TYPE.3')}}</label>
				</div>
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
				<label class="control-label" for="Motivo">References required?</label>
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
			
			<?php 
			$is_fees_apply = $data->is_fees_apply;
			unset($data->is_fees_apply);  ?>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Fees apply? <br><small>(e.g. admin fees, tenant referencing, fees for drawing up tenancy agreements)</small></label>
				<div class="checkbox checkbox-inline">
					{{ Form::checkbox('is_fees_apply', 1,($is_fees_apply==1)?true:false,array('id'=>'is_fees_apply')) }}
					<label for="is_fees_apply">
						Tick for Yes<br><small>(Landlords and Agents must disclose any non-optional fees when advertising rentals, according to CAP rules. You should itemise what the fees cover, and how much they will cost each tenant in your description lower down) </small> 
					</label>
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
			<div class="alert alert-info alert-dismissible" role="alert">Preferences For New Tenant</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Smoking</label>
						{{ Form::select('is_smoking',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'form-control'))}}
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
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" for="Motivo">Pets</label>
						{{ Form::select('is_pets',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'form-control'))}}
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
				<label class="control-label" for="Motivo">Company Name<span class='red bold'>*</span></label>
				<div class="row">
					<div class="col-md-12">
						{{ Form::text('company_name', null, array('class' => 'form-control'))}}
						<span class="red">{{ $errors->first('company_name') }} </span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="Motivo">Your name<span class='red bold'>*</span></label>
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