@extends('frontend/layouts/default')
@section('title')
My Ads
@stop

@section('content') 

<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
			
				<div class="right-side-content"> 
					
					@include('Elements/User/my_account_top')
					
					<div class="tab-content" style="padding:10px;">
						
						<h3>Ad Update ({{$data->title}})</h3>
				 
						<div class="row">
						
							{{ Form::model($data, array('url' => array('ads-edit/'.$data->id),'method' => 'PUT', 'id'=>'add_post_form', 'class' => 'job-post-form multisteps-form')) }}
							
								@if($data->ad_type==1) 
									@include('Elements/Property/update_rooms_form_first') 
								@elseif($data->ad_type==2)
									@include('Elements/Property/update_rooms_form_second') 
								@else
									@include('Elements/Property/update_rooms_form_thread') 
								@endif
						
								<div class="button-wrapper text-center">
									<a href="{{URL::to('my-ads')}}"><button type="button" class="button">Back</button></a>
									<button type="submit" class="button">Ad Update</button>
								</div>

							{{Form::close()}}
							
							
						</div>
					</div>
				</div>
				
				<div class="left-sidebar-menu">
					@include('Elements/User/my_account_left_side')
				</div>	
				
			</div>
		</div>
	</div>
</div> 

<script type="text/javascript">
	
	jQuery(document).ready(function(){
	
		$('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});
		
		jQuery('#add_post_form').bootstrapValidator();
	});

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