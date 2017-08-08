<?php
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
	$current_action = (isset($action[1]) and $action[1])?$action[1]:'';
	$group_data_select = GeneralHelper::getFirstSelectGroup(Route::input('group_id')); 
	//echo Auth::id(); die;
	//echo '<pre>'; print_r($group_data_select); die;
	//echo '<pre>'; print_r($action); die;
	
	?>

	<ul class="nav nav-pills tab-tab discussion1 report1">
		
		<li class="{{ ($controller=='UserController' && $current_action=='setting_admin')?'active':''; }}">
			<a href="{{URL::to('setting-admin/'.Route::input('group_id'))}}"><h5><b> Admin </b></h5></a>
		</li>
		
		@if($group_data_select->user_id==Auth::id())
		<li class="{{ ($controller=='UserController' && $current_action=='manage_group')?'active':''; }}">
			<a href="{{URL::to('manage-group/'.Route::input('group_id'))}}"><h5><b> Manage Group  </b></h5></a>
		</li>
		@endif
		
		<li class="{{ ($controller=='UserController' && $current_action=='setting')?'active':''; }}">
			<a href="{{URL::to('setting/'.Route::input('group_id'))}}"><h5><b> Settings</b></h5></a>
		</li>
		
		<li class="{{ ($controller=='UserController' && $current_action=='notification_setting')?'active':''; }}">
			<a href="{{URL::to('notification-setting/'.Route::input('group_id'))}}"><h5><b> Notifications</b></h5></a>
		</li>
		
		<li class="{{ ($controller=='UserController' && $current_action=='members')?'active':''; }}">
			<a href="{{URL::to('members/'.Route::input('group_id'))}}"><h5><b> Members</b></h5></a>
		</li>
		
		<li class="{{ ($controller=='UserController' && $current_action=='subscription')?'active':''; }}">
			<a href="{{URL::to('subscription/'.Route::input('group_id'))}}"><h5><b>Subscription </b></h5></a>
		</li>
		
		@if($group_data_select->user_id==Auth::id())
			<li class="{{ ($controller=='UserController' && $current_action=='reports')?'active':''; }}">
				<a href="{{URL::to('reports/'.Route::input('group_id'))}}"><h5><b>Report </b></h5></a>
			</li> 
		@endif
		
		<li class="{{ ($controller=='UserController' && $current_action=='approval')?'active':''; }}">
			<a href="{{URL::to('approval/'.Route::input('group_id'))}}"><h5><b>Approval </b></h5></a>
		</li>  
 
	</ul> 