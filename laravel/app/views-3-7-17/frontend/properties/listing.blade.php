@extends('frontend/layouts/default')

@section('title')
Housesharemarket
@stop

@section('content')

<?php // Property top Slider  ?>
@include('Elements/Property/property_top_slider') 

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
	

.select-style {
   width: 100% !important;
   border-radius: 4px;
   overflow: hidden;
   background: url("./images/arrow.png") no-repeat 96% 50%;
   border: 1px solid #ccc;
   margin-bottom: 10px;
   }
   .select-style select {
   padding: 14px 0;
   width: 100%;
   border: none;
   box-shadow: none;
   background: transparent;
   background-image: none;
   -webkit-appearance: none;
   }
   .select-style select:focus {
   outline: none;
   }
   .multisteps-form input:not([type="submit"]):not([type="file"]):not([type="checkbox"]):not([type="radio"]):not([type="file"]), select.form-control {
   padding:4px !important;
   }
	
</style>
@stop