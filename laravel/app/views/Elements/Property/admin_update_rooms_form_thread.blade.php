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
				<label class="control-label">I am / we are</label>
				<div class="controls">
					{{ Form::select('i_am_we_are', array(''=>'Select your gender(s)')+Config::get('constants.I_AM_WE_ARE') , null, array('id'=>'room_size', 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('i_am_we_are') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Looking for</label>
				<div class="controls">
					{{ Form::select('looking_for',Config::get('constants.LOOKING_FOR'), null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('looking_for') }} </span>
				</div>
			</div> 
			
			<?php 
			$is_buddy_ups = $data->is_buddy_ups;
			unset($data->is_buddy_ups);  ?>
			
			<div class="control-group">
				<label class="control-label">Buddy ups</label>
				<div class="controls">
					{{ Form::checkbox('is_buddy_ups', 1,($is_buddy_ups==1)?true:false,array('id'=>'is_buddy_ups')) }}
					<span class="red">{{ $errors->first('looking_for') }} </span>
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
			
			<div class="control-group">
				<label class="control-label">Your budget <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::text('rent_amt', null, array('placeholder'=>'$0.00', 'class' => 'span11'))}}
					<span class="red">{{ $errors->first('rent_amt') }} </span>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Your budget type <span class='red bold'>*</span></label>
				<div class="controls">
					{{ Form::select('rent_amt_type',array(''=>'Per week or month?...')+Config::get('constants.ROOM_COST_TYPE'), null, array('class' => 'span11'))}}
					<span class="red">{{ $errors->first('rent_amt_type') }} </span>
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
		
			<div class="room_cls roomHtml"><?php
				
				$roomArr = Input::old('roomArr'); ?>
			
				@if(!empty($roomArr)) 
				
					@foreach($roomArr as $room_key=>$room_val)  
					
						<div class="title_cls">Room {{$room_key}}</div>
			
						<div class="control-group">
							<label class="control-label">Available? <span class='red bold'>*</span></label>
							<div class="controls controls_cls">
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][available_type]', '1') }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.1')}}</label>
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][available_type]', '2') }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.2')}}</label>
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][available_type]') }} </span>
							</div>
						</div> 
							
						<div class="control-group">
							<label class="control-label">Cost of room <span class='red bold'>*</span></label>
							<div class="controls">
								{{ Form::text('roomArr['.$room_key.'][room_cost]', null, array('class' => 'span4'))}}
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_cost]') }} </span>
							</div>
							<div style="padding: 0px;" class="controls">
								<label class="span4">{{ Form::radio('roomArr['.$room_key.'][room_cost_type]', '1') }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.1')}}</label>
								<label class="span6">{{ Form::radio('roomArr['.$room_key.'][room_cost_type]', '2') }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.2')}}</label>
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_cost_type]') }} </span>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label">Size of room <span class='red bold'>*</span></label>
							<div class="controls controls_cls">
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '1') }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.1')}}</label>
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '2') }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.2')}}</label>
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_size_type]') }} </span>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Amenities</label>
							<div class="controls controls_cls">
								@foreach($amenities as $key_amenitie=>$amenitie_val)
									<label>{{ Form::checkbox('roomArr['.$room_key.'][amenitie_id][]', $key_amenitie) }}&nbsp;{{$amenitie_val}}</label>
								@endforeach
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Security Deposit</label>
							<div class="controls">
								{{ Form::text('roomArr['.$room_key.'][security_deposit]', null, array('class' => 'span4'))}}
								<span class="red">{{ $errors->first('security_deposit') }} </span>
							</div>
						</div>
				
				
					@endforeach
					
				@else 
					
					<?php 
					$room_key=1;
					$get_room_data = GeneralHelper::getProperyRoomByPropertyId($data->id); ?>
				
					@foreach($get_room_data as $room_val)  
					
						<?php //echo '<pre>'; print_r($room_val); ?>
					
						<div class="title_cls">Room {{$room_key}}</div>
			
						<div class="control-group">
							<label class="control-label">Available? <span class='red bold'>*</span></label>
							<div class="controls controls_cls">
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][available_type]', '1', ($room_val->is_available==1)?true:false) }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.1')}}</label>
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][available_type]', '2', ($room_val->is_available==2)?true:false) }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.2')}}</label>
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][available_type]') }} </span>
							</div>
						</div> 
							
						<div class="control-group">
							<label class="control-label">Cost of room <span class='red bold'>*</span></label>
							<div class="controls">
								{{ Form::text('roomArr['.$room_key.'][room_cost]', $room_val->room_cost, array('class' => 'span4'))}}
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_cost]') }} </span>
							</div>
							<div style="padding: 0px;" class="controls">
								<label class="span4">{{ Form::radio('roomArr['.$room_key.'][room_cost_type]', '1', ($room_val->room_cost_type==1)?true:false) }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.1')}}</label>
								<label class="span6">{{ Form::radio('roomArr['.$room_key.'][room_cost_type]', '2',($room_val->room_cost_type==2)?true:false) }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.2')}}</label>
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_cost_type]') }} </span>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label">Size of room <span class='red bold'>*</span></label>
							<div class="controls controls_cls">
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '1', ($room_val->room_size==1)?true:false) }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.1')}}</label>
								<label class="span3">{{ Form::radio('roomArr['.$room_key.'][room_size_type]', '2', ($room_val->room_size==2)?true:false) }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.2')}}</label>
								<span class="red">{{ $errors->first('roomArr['.$room_key.'][room_size_type]') }} </span>
							</div>
						</div>
						
						<?php 
						$room_amenities_ids = explode(',',$room_val->amenities_ids);  ?>
						
						<div class="control-group">
							<label class="control-label">Amenities</label>
							<div class="controls controls_cls">
								@foreach($amenities as $key_amenitie=>$amenitie_val) <?php
									$check_amenities = (in_array($key_amenitie,$room_amenities_ids))?true:false; ?>
									<label>{{ Form::checkbox('roomArr['.$room_key.'][amenitie_id][]', $key_amenitie,$check_amenities) }}&nbsp;{{$amenitie_val}}</label>
								@endforeach
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Security Deposit</label>
							<div class="controls">
								{{ Form::text('roomArr['.$room_key.'][security_deposit]', $room_val->security_deposit, array('class' => 'span4'))}}
								<span class="red">{{ $errors->first('security_deposit') }} </span>
							</div>
						</div><?php $room_key++; ?>
				
				
					@endforeach 
				 
					
				@endif
				
			</div>
			
			
			
		
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
				<label class="control-label">Days available</label>
				<div class="controls"> 
					{{ Form::select('days_available_type',Config::get('constants.DAYS_AVAILABLE'), null, array('class' => 'span5'))}}
					<span class="red">{{ $errors->first('days_available_type') }} </span>
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
				<label class="control-label">DSS?</label>
				<div class="controls controls_cls">
					{{ Form::checkbox('is_dss', 1,null,array('id'=>'is_dss')) }}
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Pets</label>
				<div class="controls controls_cls">
					{{ Form::select('is_pets',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'span5'))}}
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Your preferred language</label>
				<div class="controls controls_cls">
				{{ Form::select('language_id',$languages, null, array('class' => 'span5'))}}
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Your nationality</label>
				<div class="controls controls_cls">
				{{ Form::select('country_id',$nationality, null, array('class' => 'span5'))}}
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Your Interests</label>
				<div class="controls controls_cls">
				{{ Form::text('your_interests', null, array('class' => 'span5'))}}
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Minimum age</label>
				<div class="controls"><?php 
					for($j=16; $j<100; $j++){
						$minimum_ageArr[$j] = $j;
					} ?>
					{{ Form::select('minimum_age',array(''=>'Please select')+$minimum_ageArr, null, array('class' => 'span5'))}}
					<span class="red">{{ $errors->first('minimum_age') }} </span>
				</div>
			</div> 
			
			<div class="control-group">
				<label class="control-label">Maximum age</label>
				<div class="controls"><?php 
					for($j=16; $j<100; $j++){
						$maximum_ageArr[$j] = $j;
					} ?>
					{{ Form::select('maximum_age',array(''=>'Please select')+$maximum_ageArr, null, array('class' => 'span5'))}}
					<span class="red">{{ $errors->first('maximum_age') }} </span>
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