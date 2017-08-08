<?php
	$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
	$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
	$current_action = (isset($action[1]) and $action[1])?$action[1]:'';
	$order_user ="";
	
	if($controller =="OrderController" && (in_array($current_action, array( 'view')))){
		$order_user = $data->user_id;
		$buytype 	= $data->buytype;
	}else{
		$buytype        = Route::input('buytype');
	} ?>
	<div class="side-bar"  style="{{$current_action == 'myaccount'?'margin-bottom:50px;':''}}">
		<div class="drop-saddow-class margin-top-none">
			<div class="subject-nav">
				<ul> <?php 
				
					$class = ($controller =="UserController" && (in_array($current_action, array( 'myaccount')))) ?'active':null;  ?>
					<li class="{{$class}}">
						<a  href="{{URL::to('myaccount')}}"><i aria-hidden="true" class="fa fa-caret-right size-ch"></i>{{Lang::get('ViewMessage.Dashboard')}}</a>
					</li><?php 
					
					$class = ($controller =="UserController" && (in_array($current_action, array( 'update_profile')))) ?'active':null;  ?>
					<li class="{{$class}}"> 
						<a href="{{URL::to('update-profile')}}"><i aria-hidden="true" class="fa fa-caret-right size-ch"></i>{{Lang::get('ViewMessage.Update_Profile')}}</a>
					</li><?php 
					
					$class = ($controller =="UserController" && (in_array($current_action, array( 'transcript')))) ?'active':null;  ?>
					<li class="{{$class}}"> 
						<a href="{{URL::to('transcript')}}"><i aria-hidden="true" class="fa fa-caret-right size-ch"></i>Transcript</a>
					</li><?php 
					
					$class = ($controller =="UserController" && (in_array($current_action, array( 'change_password')))) ?'active':null;  ?>
					<li class="{{$class}}"> 
						<a href="{{URL::to('change-password')}}"><i aria-hidden="true" class="fa fa-caret-right size-ch"></i>{{Lang::get('ViewMessage.Change_Password')}}</a>
					</li>
					 
					<?php /*$class = (($controller =="CourseController" && (in_array($current_action, array('all_chapters', 'my_courses', 'edit', 'add', 'edit_chapter', 'course_chapters', 'course_features', 'add_chapter', 'attachments')))) OR ($controller =="OrderController" && $buytype == 0 && (in_array($current_action, array( 'my_received_orders')))) OR ($controller =="OrderController" && $buytype == 0 &&  $order_user!= Auth::id() && (in_array($current_action, array( 'view'))))) ?'active':null;  ?>
					<li class="{{$class}}"> 
						<a href="{{URL::to('my-courses')}}"><i aria-hidden="true" class="fa fa-caret-right size-ch"></i>{{Lang::get('ViewMessage.My_Courses')}}</a>
					</li> */ ?>
					<li><a href="{{URL::to('logout')}}"><i aria-hidden="true" class="fa fa-caret-right size-ch"></i>{{Lang::get('ViewMessage.Logout')}}</a></li>
				</ul>
			</div>
		</div>  
	</div>