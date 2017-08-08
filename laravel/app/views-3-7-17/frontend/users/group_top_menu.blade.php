<?php
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
	$current_action = (isset($action[1]) and $action[1])?$action[1]:'';
	$group_data_select = GeneralHelper::getFirstSelectGroup(Route::input('group_id'));  ?>
	
	<ul class="nav nav-pills tab-tab discussion1">
		<li class="{{ ($controller=='DiscussionController' && ($current_action=='discussion_created' || $current_action=='discussion' || $current_action=='discussion_edit'))?'active':'' }}">
			<a href="{{URL::to('/discussion/'.$group_data_select->id)}}"><i class="fa fa-comments"></i>
				<h5><b>Discussion </b></h5>
			</a>
		</li> 
		<li class="{{ ($controller=='GroupController' && $current_action=='announcement')?'active':'' }}">
			<a href="{{URL::to('/announcement/'.$group_data_select->id) }}"><i class="fa fa-bullhorn"></i>
				<h5><b>Announcement </b></h5>
			</a>
		</li> 
		<li class="{{ ($controller=='GroupController' && $current_action=='about')?'active':'' }}">
			<a href="{{URL::to('/about/'.$group_data_select->id) }}"><i class="fa fa-question"></i>
				<h5><b>About </b></h5>
			</a>
		</li>  
	</ul>