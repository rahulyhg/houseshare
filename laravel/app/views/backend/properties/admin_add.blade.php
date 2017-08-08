@extends('backend/layouts/default')
@section('title')
Add Property
@stop

@section('content')


<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/properties') }}" title="Go to Propertys" class="tip-bottom"><i class="icon-list"></i>Propertys</a> 
		<a href="javascript:;" class="current">Add Property</a> 
	</div>
	
	<h1>Add Property</h1>
	
</div>

<div class="container-fluid">
	
	<hr>
	
	<div class="row-fluid">
		
		{{ Form::open(array('url' => array('admin/properties/add'),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
		<div class="span12 padding-left-cls">
			
			<div class="span6">
			
				<?php //echo '<pre>'; print_r(Input::old('roomArr')); die;  ?>
				
				<div class="widget-box">
					
					<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
						<h5>Add Property</h5>
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
									$room_sizeArr[$j] = $j.'&nbsp;room for rent';
								} ?>
								{{ Form::select('room_size',$room_sizeArr, null, array('onchange'=>'getRoom()', 'id'=>'room_size', 'class' => 'span11'))}}
								<span class="red">{{ $errors->first('room_size') }} </span>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label">Size & type of property</label>
							<div class="controls"><?php 
								for($j=2; $j<13; $j++){
									$bed_sizeArr[$j] = $j.'&nbsp;bed';
								} ?>
								{{ Form::select('bed_size',$bed_sizeArr, null, array('class' => 'span5'))}}
								<span class="red">{{ $errors->first('bed_size') }} </span>
								{{ Form::select('property_type',Config::get('constants.PROPERTY_TYPE'), null, array('class' => 'span6'))}}
								<span class="red">{{ $errors->first('property_type') }} </span>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label">There are already</label>
							<div class="controls"><?php 
								for($j=0; $j<11; $j++){
									$already_in_propertyArr[$j] = $j;
								} ?>
								{{ Form::select('already_in_property',$already_in_propertyArr, null, array('class' => 'span3'))}}
								<span class="help-block span8 help_cls">&nbsp;occupants in the property </span>
								<span class="red">{{ $errors->first('already_in_property') }} </span>
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
								<label>{{ Form::radio('i_am_type', '1') }}&nbsp;Live in landlord <small>(I own the property and live there)</small></label>
								<label>{{ Form::radio('i_am_type', '2') }}&nbsp;Live out landlord <small>(I own the property but don't live there)</small></label>
								<label>{{ Form::radio('i_am_type', '3') }}&nbsp;Current tenant/flatmate <small>(I am living in the property)</small></label>
								<label>{{ Form::radio('i_am_type', '4') }}&nbsp;Agent <small>(I am advertising on a landlord's behalf)</small></label>
								<label>{{ Form::radio('i_am_type', '5') }}&nbsp;Former flatmate <small>(I am moving out and need someone to replace me)</small></label>
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
						
						<div class="control-group">
							<label class="control-label">Transport</label>
							<div class="controls">
								{{ Form::text('transport', null, array('class' => 'span11'))}}
								<span class="red">{{ $errors->first('transport') }} </span>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label">Living Room?</label>
							<div class="controls controls_cls">
								<label>{{ Form::radio('living_room_type', '1') }}&nbsp;{{Config::get('constants.LIVING_ROOM.1')}}</label>
								<label>{{ Form::radio('living_room_type', '2') }}&nbsp;{{Config::get('constants.LIVING_ROOM.2')}}</label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Amenities</label>
							<div class="controls controls_cls">
								@foreach($amenities as $key_amenitie=>$amenitie_val)
									<label>{{ Form::checkbox('amenitie_id[]', $key_amenitie) }}&nbsp;{{$amenitie_val}}</label>
								@endforeach
							</div>
						</div>  
						
						<div class="form-actions">
							<div class="span8">&nbsp;</div>
							<button type="submit" class="btn btn-success">Save</button>
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
							
								<div class="title_cls">Room 1</div>
					
								<div class="control-group">
									<label class="control-label">Available? <span class='red bold'>*</span></label>
									<div class="controls controls_cls">
										<label class="span3">{{ Form::radio('roomArr[1][available_type]', '1') }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.1')}}</label>
										<label class="span3">{{ Form::radio('roomArr[1][available_type]', '2') }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.2')}}</label>
										<span class="red">{{ $errors->first('roomArr[1][available_type]') }} </span>
									</div>
								</div> 
									
								<div class="control-group">
									<label class="control-label">Cost of room <span class='red bold'>*</span></label>
									<div class="controls">
										{{ Form::text('roomArr[1][room_cost]', null, array('class' => 'span4'))}}
										<span class="red">{{ $errors->first('roomArr[1][room_cost]') }} </span>
									</div>
									<div style="padding: 0px;" class="controls">
										<label class="span4">{{ Form::radio('roomArr[1][room_cost_type]', '1') }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.1')}}</label>
										<label class="span6">{{ Form::radio('roomArr[1][room_cost_type]', '2') }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.2')}}</label>
										<span class="red">{{ $errors->first('roomArr[1][room_cost_type]') }} </span>
									</div>
								</div> 
								
								<div class="control-group">
									<label class="control-label">Size of room <span class='red bold'>*</span></label>
									<div class="controls controls_cls">
										<label class="span3">{{ Form::radio('roomArr[1][room_size_type]', '1') }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.1')}}</label>
										<label class="span3">{{ Form::radio('roomArr[1][room_size_type]', '2') }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.2')}}</label>
										<span class="red">{{ $errors->first('roomArr[1][room_size_type]') }} </span>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Amenities</label>
									<div class="controls controls_cls">
										@foreach($amenities as $key_amenitie=>$amenitie_val)
											<label>{{ Form::checkbox('roomArr[1][amenitie_id][]', $key_amenitie) }}&nbsp;{{$amenitie_val}}</label>
										@endforeach
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Security Deposit</label>
									<div class="controls">
										{{ Form::text('roomArr[1][security_deposit]', null, array('class' => 'span4'))}}
										<span class="red">{{ $errors->first('security_deposit') }} </span>
									</div>
								</div>
								
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
							<label class="control-label">References required?</label>
							<div class="controls controls_cls">
								<label class="span2">{{ Form::radio('is_references_required', '1') }}&nbsp;{{Config::get('constants.REFERENCES_REQUIRED.1')}}</label>
								<label>{{ Form::radio('is_references_required', '2') }}&nbsp;{{Config::get('constants.REFERENCES_REQUIRED.2')}}</label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Bills included</label>
							<div class="controls controls_cls">
								<label class="span2">{{ Form::radio('is_bills_included', '1') }}&nbsp;{{Config::get('constants.BILLS_INCLUDED.1')}}</label>
								<label class="span2">{{ Form::radio('is_bills_included', '2') }}&nbsp;{{Config::get('constants.BILLS_INCLUDED.2')}}</label>
								<label>{{ Form::radio('is_bills_included', '3') }}&nbsp;{{Config::get('constants.BILLS_INCLUDED.3')}}</label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Broadband included?</label>
							<div class="controls controls_cls">
								<label class="span2">{{ Form::radio('is_broadband_included', '1') }}&nbsp;{{Config::get('constants.REFERENCES_REQUIRED.1')}}</label>
								<label class="span2">{{ Form::radio('is_broadband_included', '2') }}&nbsp;{{Config::get('constants.REFERENCES_REQUIRED.2')}}</label>
							</div>
						</div>
				
						<div class="control-group">
							<label class="control-label">Smoking</label>
							<div class="controls controls_cls">
								{{ Form::select('is_smoking',array(''=>'No preference')+Config::get('constants.YES_NO'), null, array('class' => 'span5'))}}
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Gender</label>
							<div class="controls controls_cls">
								{{ Form::select('is_gender',array(''=>'No preference')+Config::get('constants.GENDER'), null, array('class' => 'span5'))}}
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
						
						<div class="control-group">
							<label class="control-label">Language</label>
							<div class="controls">
								{{ Form::select('language_id',$languages, null, array('class' => 'span5'))}}
								<span class="red">{{ $errors->first('language_id') }} </span>
							</div>
						</div> 
						
						<div class="control-group">
							<label class="control-label">Couples welcome?</label>
							<div class="controls controls_cls">
								<label class="span2">{{ Form::radio('is_couples_welcome', '1') }}&nbsp;{{Config::get('constants.YES_NO.1')}}</label>
								<label class="span2">{{ Form::radio('is_couples_welcome', '2') }}&nbsp;{{Config::get('constants.YES_NO.2')}}</label>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label">Misc</label>
							<div class="controls controls_cls">
								@foreach(Config::get('constants.MISC_TYPE') as $key_misc=>$misc_val)
									<label>{{ Form::checkbox('misc[]', $key_misc) }}&nbsp;{{$misc_val}}</label>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
	
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

@stop