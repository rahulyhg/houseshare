@extends('frontend/layouts/default')

@section('title')
Housesharemarket
@stop

@section('content')

<?php // Property top Slider  ?>
<?php /*@include('Elements/Property/property_top_slider') */ ?>

<?php // Property top Search  ?>
@include('Elements/Property/property_list_search') 


<div class="section candidate-dashboard-content solid-light-grey-bg">
	
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
				
				<div class="right-side-content">
					<div class="tab-content candidate-dashboard">
						@include('Elements/Property/property_list')
					</div>
				</div>
				
				<div class="left-sidebar-menu">
					@include('Elements/Property/property_list_left') 
				</div>
				
			</div>
		</div>
	</div>
</div>

<style>
	h6 {
	color: #627199;
	font-size: 9px;
	font-weight: 700;
	line-height: 14px;
	text-transform: uppercase;
	}	
	
	.section.solid-blue-bg > .inner {
		background: #fff none repeat scroll 0 0;
	}
	
@media only screen and (max-width: 320px), only screen and (max-device-width: 479px) {
	
.select-style {
    background: rgba(0, 0, 0, 0) url("./img/arrow.png") no-repeat scroll 96% 50%;
    border-radius: 4px;
    overflow: hidden;
    width: 100%;
}


}


@media only screen and (max-width: 480px), only screen and (max-device-width: 767px) {

.select-style {
    background: rgba(0, 0, 0, 0) url("./img/arrow.png") no-repeat scroll 96% 50%;
    border-radius: 4px;
    overflow: hidden;
    width: 100%;
}

}



	
</style>
@stop