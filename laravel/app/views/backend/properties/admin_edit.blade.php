@extends('backend/layouts/default')
@section('title')
	Update Property
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/properties') }}" title="Go to Properties" class="tip-bottom"><i class="icon-list"></i>Properties</a> 
		<a href="javascript:;" class="current">Update Property</a> 
	</div>
	
	<h1>Update Property</h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::model($data, array('url' => array('admin/properties/edit', $data->id),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
			
				@if($data->ad_type==1) 
					@include('Elements/Property/admin_update_rooms_form_first') 
				@elseif($data->ad_type==2)
					@include('Elements/Property/admin_update_rooms_form_second') 
				@else
					@include('Elements/Property/admin_update_rooms_form_thread') 
				@endif
			
				
				
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