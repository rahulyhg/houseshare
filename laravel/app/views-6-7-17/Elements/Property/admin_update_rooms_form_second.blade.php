<div class="span6">

	<div class="widget-box">
	
		<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
			<h5>Update Property</h5>
		</div>
		
		
		<div class="widget-content nopadding">
		
			<div class="control-group">
				<label class="control-label">Title <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::text('title', null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('title') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Description <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::textarea('description', null, array('rows'=>3, 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('description') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">First Name <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::text('first_name', null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('first_name') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Last Name <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::text('last_name', null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('last_name') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Telephone</label>
				<div class="controls">
					{{ Form::text('telephone', null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('telephone') }} </span>
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label">I have</label>
				<div class="controls"><?php 
					for($j=1; $j<13; $j++){
						$bed_sizeArr[$j] = $j.'&nbsp;bed';
						} ?>
					{{ Form::select('bed_size',$bed_sizeArr, null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('bed_size') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Type</label>
				<div class="controls"> 
					{{ Form::select('property_type',Config::get('constants.PROPERTY_TYPE'), null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('property_type') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Rent</label>
				<div class="controls"> 
					{{ Form::text('rent_amt', null, array('placeholder'=>'$0.00', 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('rent_amt') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Rent Type</label>
				<div class="controls"> 
					{{ Form::select('rent_amt_type',array(''=>'Per week or month?...')+Config::get('constants.ROOM_COST_TYPE'), null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('rent_amt') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Security Deposit</label>
				<div class="controls"> 
					{{ Form::text('security_deposit', null, array('placeholder'=>'$0.00', 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('security_deposit') }} </span>
				</div>
			</div>  
			
			<div class="control-group">
				<label class="control-label">Postcode of property <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::text('post_code', null, array('class' => 'span11'))}}
					<span class="help-block span8 help_cls">&nbsp;(e.g. SE15 8PD)</span>
					<span class="red">{{ $errors->first('post_code') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">I am a <span class='red bold'>*</span></label>
				<div class="controls controls_cls">
					<label>{{ Form::radio('i_am_type', '2') }}&nbsp;Live out landlord <small>(I own the property but don't live there)</small></label>
					<label>{{ Form::radio('i_am_type', '4') }}&nbsp;Agent <small>(I am advertising on a landlord's behalf)</small></label>
					<label>{{ Form::radio('i_am_type', '3') }}&nbsp;Current tenant/flatmate <small>(I am living in the property)</small></label>
					<span class="red">{{ $errors->first('i_am_type') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">My email is</label>
				<div class="controls">
					{{ Form::text('email', null, array('class' => 'span11'))}}
					<span class="help-block span11 help_cls">&nbsp;(We will keep this safe and not display publicly) </span>
					<span class="red">{{ $errors->first('email') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Area <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::text('area', null, array('onFocus'=>'geolocate()', 'id'=>'autocomplete', 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('area') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Street name</label>
				<div class="controls">
					{{ Form::text('street_name', null, array('id'=>'route', 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('street_name') }} </span>
				</div>
			</div> 
			<?php /*
			<div class="control-group">
				<label class="control-label">Transport</label>
				<div class="controls">
					{{ Form::text('transport', null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('transport') }} </span>
				</div>
			</div>*/ ?> 
			
			<div class="control-group">
				<label class="control-label">Furnishings</label>
				<div class="controls controls_cls">
					<label>{{ Form::radio('is_furnishings', '1') }}&nbsp;{{Config::get('constants.FURNISHED_TYPE.1')}}</label>
					<label>{{ Form::radio('is_furnishings', '2') }}&nbsp;{{Config::get('constants.FURNISHED_TYPE.2')}}</label>
					<label>{{ Form::radio('is_furnishings', '3') }}&nbsp;{{Config::get('constants.FURNISHED_TYPE.3')}}</label>
				</div>
			</div> 
			
			
			<?php 
			$get_amenities_data = GeneralHelper::getAmenitiesByPropertyId($data->id);  
			
			?>
			
			<div class="control-group">
				<label class="control-label">Amenities</label>
				<div class="controls controls_cls">
					@foreach($amenities as $key_amenitie=>$amenitie_val) <?php
						$is_amenities = (in_array($key_amenitie,$get_amenities_data))?true:false; ?>
						<label>{{ Form::checkbox('amenitie_id[]', $key_amenitie,$is_amenities) }}&nbsp;{{$amenitie_val}}</label>
					@endforeach
				</div>
			</div>  
			
			<div class="form-actions">
				<div class="span8">&nbsp;</div>
				<button type="submit" class="btn btn-success">Update</button>
				<a href="{{ URL::to('admin/properties') }}" class="btn btn-default" >Cancel</a>
			</div>
			
		</div> 
	</div> 
</div>


<div class="span6">

	<div class="widget-box">
		
		<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
			<h5>Add Property</h5>
		</div>
		
		<div class="widget-content nopadding"> 
		
		 
			<div class="control-group">
				<label class="control-label">Available from</label>
				<div class="controls">
					{{ Form::text('available_from', null, array('readonly'=>true, 'class' => 'span11 datepicker'))}}
					<span class="red">{{ $errors->first('available_from') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Minimum stay</label>
				<div class="controls"> 
					{{ Form::select('minimum_stay_type',array(''=>'No Minimum')+Config::get('constants.MINIMUM_STAY'), null, array('class' => 'span5'))}}
					<span class="red">{{ $errors->first('minimum_stay_type') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Maximum stay</label>
				<div class="controls"> 
					{{ Form::select('maximum_stay_type',array(''=>'No Maximum')+Config::get('constants.MAXIMUM_STAY'), null, array('class' => 'span5'))}}
					<span class="red">{{ $errors->first('maximum_stay_type') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Short Term Lets Considered?</label>
				<div class="controls controls_cls">
					<label>{{ Form::checkbox('short_term', 1) }}&nbsp;Tick for Yes</label>
					<span class="help-block span11 help_cls">&nbsp;(You may wish to specify rent differences in the description further down) </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Days available</label>
				<div class="controls"> 
					{{ Form::select('days_available_type',Config::get('constants.DAYS_AVAILABLE'), null, array('class' => 'span5'))}}
					<span class="red">{{ $errors->first('days_available_type') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Fees apply?</label>
				<div class="controls controls_cls">
					<label>{{ Form::checkbox('is_fees_apply', 1) }}&nbsp;Tick for Yes</label>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">References required?</label>
				<div class="controls controls_cls">
					<label class="span2">{{ Form::radio('is_references_required', '1') }}&nbsp;{{Config::get('constants.REFERENCES_REQUIRED.1')}}</label>
					<label>{{ Form::radio('is_references_required', '2') }}&nbsp;{{Config::get('constants.REFERENCES_REQUIRED.2')}}</label>
				</div>
			</div> 
	
			<div class="control-group">
				<label class="control-label">Smoking</label>
				<div class="controls controls_cls">
					{{ Form::select('is_smoking',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'span5'))}}
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Occupation</label>
				<div class="controls controls_cls">
					{{ Form::select('is_occupation',array(''=>'No preference')+Config::get('constants.OCCUPATION_TYPE'), null, array('class' => 'span5'))}}
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Pets</label>
				<div class="controls controls_cls">
					{{ Form::select('is_pets',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'span5'))}}
				</div>
			</div>  
			
			<?php  
			$miscArr = array_values(explode(',',$data->misc));
			unset($data->misc);
			?>
			<div class="control-group">
				<label class="control-label">Misc</label>
				<div class="controls controls_cls">
					@foreach(Config::get('constants.MISC_TYPE') as $key_misc=>$misc_val) <?php
						$is_misc = (in_array($key_misc,$miscArr))?true:false; ?>
						<label>{{ Form::checkbox('misc[]', $key_misc, $is_misc) }}&nbsp;{{$misc_val}}</label>
					@endforeach
				</div>
			</div>
			
		</div>
	</div>
</div>