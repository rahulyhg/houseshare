@extends('frontend/layouts/default')
@section('title')
Inbox Message
@stop

@section('content') 

<?php 
$action  = (Route::currentRouteAction())?explode('@', Route::currentRouteAction()):'';
$controller		= (isset($action[0]) and $action[0])?$action[0]:'';
$current_action = (isset($action[1]) and $action[1])?$action[1]:''; ?>

<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
			
				<div class="right-side-content"> 
					
					@include('Elements/User/my_account_top')
					
					<div class="tab-content" style="padding:0 10px 10px">
					
						<h3>My messages</h3>
						<ul class="nav nav-pills">
							<li class="{{($controller=='MessageController' && in_array($current_action,array('index')))?'active':''}}"><a href="{{URL::to('messages')}}">Inbox</a></li>
							<li class="{{($controller=='MessageController' && in_array($current_action,array('send')))?'active':''}}"><a href="{{URL::to('/send')}}">Sent</a></li>
							<li><a href="javascript:;" onclick="deleteMessage()" class="trash">Deteled</a></li>
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane fade in active">
						
								<h3>Inbox</h3>
								<div>
									<div class="mail-option">
										<div class="chk-all">
											<input class="mail-checkbox mail-group-checkbox" type="checkbox">
											<div class="btn-group">
												<a data-toggle="dropdown" href="javascript:;" class="btn mini all" aria-expanded="false">All</a>
											</div>
										</div>
										<div class="btn-group">
											<a href="javascript:window.location.reload();" class="btn mini tooltips" aria-expanded="false">
												<i class=" fa fa-refresh"></i>
											</a>
										</div>
									</div>
								</div>
								
								<table class="table table-inbox table-hover">
									<tbody>
									
										@if(!$data->isEmpty())
											@foreach($data as $val)
												<tr class="unread">
													<td class="inbox-small-cells">
													   <input class="mail-checkbox" type="checkbox">
													</td>
													<td class="view-message  dont-show">{{$val->messages_title}}</td><?php 
													$messages_title = !empty($val->messages_title)?strip_tags($val->messages_title):''; 
													$messages_content = !empty($val->messages_content)?strip_tags($val->messages_content):''; 
													$messages_title_show = ($messages_title)?'<b>'.$messages_title.'</b> - ':'';
													$full_messages = $messages_title_show.$messages_content; ?>
													<td class="view-message ">{{(strlen($full_messages)>45?substr($full_messages,0,45).'...':$full_messages)}}</td>
													<td class="view-message  inbox-small-cells"></td>
													<td class="view-message  text-right">{{ GeneralHelper::get_time_formate($val->created_at, false) }}</td>
												</tr>
											@endforeach
										@else
											<tr class="">
												<td colspan="6" class="no_records">Record not found.</td> 
											</tr>
										@endif  
								  </tbody>
							   </table>
							</div>
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