@extends('frontend/layouts/default')
@section('title')
Dashboard
@stop

@section('content')

<?php 
	
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
	$current_action = (isset($action[1]) and $action[1])?$action[1]:'';
	
	//echo $controller;
	//echo '<br/>';
	//echo $current_action;  
	//die;

	
	$old_form_type = (Input::old('form_type'))?Input::old('form_type'):1;
?>

<script type="text/javascript">

	$(document).ready(function(){
		activaTab('menu_{{$old_form_type}}');
	});
		
	function activaTab(tab){
		$('.nav-tabs a[href="#' + tab + '"]').tab('show');
	};

</script>

<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
			
				<div class="right-side-content"> 
					
					<ul class="nav nav-tabs">
						<li class="{{($controller=='UserController' && in_array($current_action,array('myaccount')))?'active':''}}"><a class="outline-cls" href="{{URL::to('my-account')}}">My Account</a></li>
						<li><a class="outline-cls" href="#menu_2">Saved Ads(0)</a></li>
						<li><a class="outline-cls" href="#menu_3">Saved Search (0)</a></li>
						<li><a class="outline-cls" href="#menu_4">My Ads ({{ $my_ad_data->getTotal()}})</a></li>
						<li><a class="outline-cls" href="#menu_5">Who's interested (0)</a></li>
						<li><a class="outline-cls" href="#menu_6">Messages (0)</a></li>
						<li class="{{($controller=='UserController' && in_array($current_action,array('update_profile')))?'active':''}}"><a class="outline-cls" href="{{URL::to('update-profile')}}">Edit My Details</a></li>
					</ul>
					
					<div class="tab-content" style="padding:10px;">
					 
						@include('Elements/User/my_account_upgrade') 
						
						
						<div id="menu_2" class="tab-pane fade">
							@include('Elements/User/my_account_saved_ads')
						</div>
						
						<div id="menu_3" class="tab-pane fade">
							@include('Elements/User/my_account_saved_searches')
						</div>
						
						<div id="menu_4" class="tab-pane fade">
							@include('Elements/User/my_account_ads')
						</div>
						
						<div id="menu_5" class="tab-pane fade">
							@include('Elements/User/my_account_interested')
						</div>
						
						<div id="menu_6" class="tab-pane fade">
							@include('Elements/User/my_account_messages')
						</div>
						
						<div id="menu_7" class="tab-pane fade">
							@include('Elements/User/my_account_edit_profile')
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

@stop								