<?php 
$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
$current_action = (isset($action[1]) and $action[1])?$action[1]:''; ?>
	
<ul class="nav nav-tabs">
	<li class="{{($controller=='UserController' && in_array($current_action,array('myaccount')))?'active':''}}"><a class="outline-cls" href="{{URL::to('my-account')}}">My Account</a></li>
	<li class="{{($controller=='UserController' && in_array($current_action,array('saved_ads')))?'active':''}}"><a class="outline-cls" href="{{URL::to('saved-ads')}}">Saved Ads ({{GeneralHelper::getSavedAdCount()}})</a></li>
	<?php /*<li><a class="outline-cls" href="javascript:;">Saved Search (0)</a></li>*/ ?>
	<li class="{{(($controller=='UserController' || $controller=='PropertyController') && in_array($current_action,array('my_ads','ad_images','ads_edit')))?'active':''}}"><a class="outline-cls" href="{{URL::to('my-ads')}}">My Ads ({{GeneralHelper::getMyadCount()}})</a></li>
	<li class="{{($controller=='UserController' && in_array($current_action,array('who_interested')))?'active':''}}"><a class="outline-cls" href="{{URL::to('who-interested')}}">Who's interested  ({{GeneralHelper::getInterestedCount()}})</a></li>
	<li class="{{($controller=='MessageController' && in_array($current_action,array('index','send','compose')))?'active':''}}"><a class="outline-cls" href="{{URL::to('messages')}}">Messages</a></li>
	<li class="{{($controller=='UserController' && in_array($current_action,array('update_profile')))?'active':''}}"><a class="outline-cls" href="{{URL::to('update-profile')}}">Edit My Details</a></li>
</ul>