@extends('frontend/layouts/default')

@section('title')
Advertise your {{Session::get('SiteValue.site_name')}}
@stop

@section('content')

<div class="section job-post-form-section solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			
			<div class="job-post-form multisteps-form">
			
				@if(Route::input('slug')=='rooms-to-rent')
					@include('Elements/Property/rooms_to_rent')
				@elseif(Route::input('slug')=='whole-property-to-let')
					@include('Elements/Property/whole_property_to_let')
				@elseif(Route::input('slug')=='room-wanted')
					@include('Elements/Property/room_wanted')
				@endif
			
			</div>
			
		</div>
	</div>
</div> 


<script>
	
	jQuery(document).ready(function(){
	
		$('.datepicker').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});
		
		jQuery('#add_post_form').bootstrapValidator();
	});
	 
</script>

@stop																																				