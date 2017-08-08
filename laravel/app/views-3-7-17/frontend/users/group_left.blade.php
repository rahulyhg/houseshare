<?php 
$group_data = GeneralHelper::getGroupList(); 
$group_data_select = GeneralHelper::getFirstSelectGroup(Route::input('group_id')); ?>

<div class="col-md-3 left-discussion1"> 
	
	<div class="blue post-color" style="{{($group_data_select->color)?'background-color:#'.$group_data_select->color.';':''}}">
		<div style="cursor: pointer;" onclick="groupListShow()" class="on-pro">
			{{ GeneralHelper::showGroupImg($group_data_select->images,'') }} 
			<i class="fa fa-circle" aria-hidden="true"></i>
			<h4>{{ isset($group_data_select->name)?$group_data_select->name:'' }}</h4> 
			
			@if(!empty($group_data))
			<div class="btn-group" style="position:unset;">
				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
				<ul id="myDropdown" class="dropdown-menu"  style="background:#a9a9a9; top:unset; left:20%; margin-top:4%;" role="menu">
					@foreach($group_data as $group_val)
						<li {{($group_val->id==$group_data_select->id)?'style="background-color:#fff;':'' }}"><a href="{{URL::to('/profile/'.$group_val->id)}}">{{$group_val->name}}</a></li>  
					@endforeach
				</ul>
			</div> 
			@endif 
		</div> 
	</div><?php
	
	$group_discussion_count =  GeneralHelper::getDiscussionCountByGroup($group_data_select->id);
	$group_topic_count 	    =  GeneralHelper::getTopicCountByGroup($group_data_select->id); 
	$group_post_count 	    =  GeneralHelper::getPostCountByGroup($group_data_select->id); ?>
	
	<ul class="hj">
		<li> {{$group_post_count}} <br>Posts </li>
		<li> {{ $group_discussion_count }} <br>Discussions </li>
		<li> {{ $group_topic_count }} <br>Topics </li>
	</ul>

	<div class="mt-25">
		<div class="blue post-color" style="{{($group_data_select->color)?'background-color:#'.$group_data_select->color.';':''}}">
			
			@if($group_data_select->user_id==Auth::id())
			<div class="q">
				<div class="ble w post-color" style="{{($group_data_select->color)?'background-color:#'.$group_data_select->color.';':''}}"> 
					<div class="dropdown rorid pull-right">
						<button class="bor-no padd-no"><i class="fa fa-cog yuy b"></i> </button>
						<div class="dropdown-content">
							<a onclick="actionGroup('lock-icon')" href="javascript:;">lock</a>
							<a onclick="actionGroup('unlock-icon')" href="javascript:;">Unlock</a>
							<a onclick="actionGroup('edit-icon')" href="javascript:;">Edit</a>
							<a onclick="actionGroup('delete-icon')" href="javascript:;">Delete</a>
						</div>
					</div> 
				</div>
			</div>
			@endif
			
			@if($group_data_select->user_id==Auth::id())
				<div class="text-center padd-10 mar-10"> 
					<a class="b j collapsed" href="{{URL::to('/discussion-created/'.$group_data_select->id)}}"> Discussion </a>
				</div>
			@endif
			
			<div class="rtr">
				<div class="">
					<ul id="accordion" class="accordion"><?php
						$selected_topic  = GeneralHelper::getSelectedTopic(Route::input('topic_id')); 
						$selected_discussion_id = !empty($selected_topic->discussion_id)?$selected_topic->discussion_id:'';
						
						$discussion_data = GeneralHelper::getDiscussionData($group_data_select->id);
						if(!empty($discussion_data)){
							foreach($discussion_data as $discussion_val){ ?>
								<li class="{{ ($selected_discussion_id==$discussion_val->id)?'default open':''}}">
								<div class="link"><i class="fa fa-commenting-o"></i>{{ucfirst($discussion_val->name)}}<i class="fa fa-chevron-down"></i></div>
									<ul class="submenu diss1"><?php
										$topic_data = GeneralHelper::getTopicData($discussion_val->id);
										if(!empty($topic_data)){
											foreach($topic_data as $topic_val){ ?> 
												<li class="">
													<a style="cursor: unset;" href="javascript:;"><?php 
														$discussion_post_count = GeneralHelper::getPostCountByTopic($topic_val->id); ?> 
														<div class=""> 
															<span style="cursor: pointer;" onclick="return topicDetails('{{URL::to('/discussion/'.$group_data_select->id.'/'.$topic_val->id) }}')" class=""> {{$discussion_post_count}} </span>
															<h5>
																<div style="cursor: pointer; float:left;" onclick="return topicDetails('{{URL::to('/discussion/'.$group_data_select->id.'/'.$topic_val->id) }}')"> {{ucfirst($topic_val->title)}}</div> &nbsp; 
																<i id="delete_{{$topic_val->id}}" class="fa fa-trash delete-icon comman_icon_cls" onclick="return groupActionIcon('{{ $group_data_select->id }}','{{ $topic_val->id }}','delete')" style="display:none; position: unset; color:red; font-size: 14px; cursor: pointer;" aria-hidden="true"></i> 
																<i id="edit_{{$topic_val->id}}" class="fa fa-pencil edit-icon comman_icon_cls" onclick="return groupActionIcon('{{$group_data_select->id }}','{{ $topic_val->id }}','edit')" style="display:none; position: unset; color:#666666; font-size: 14px; cursor: pointer;" aria-hidden="true"></i> 
																<i id="lock_{{$topic_val->id}}" class="{{ ($topic_val->is_lock==2)?'fa fa-lock':''}} lock-icon comman_icon_cls" onclick="return groupActionIcon('{{$group_data_select->id }}','{{ $topic_val->id }}','lock')" style="display:none; position: unset; color:red; font-size: 14px; cursor: pointer;" aria-hidden="true"></i> 
																<i id="unlock_{{$topic_val->id}}" class="{{ ($topic_val->is_lock==1)?'fa fa-unlock':''}} unlock-icon comman_icon_cls" onclick="return groupActionIcon('{{$group_data_select->id }}','{{ $topic_val->id }}','unlock')" style="display:none; position: unset; color:green; font-size: 14px; cursor: pointer;" aria-hidden="true"></i> 
															</h5>
															<p style="cursor: pointer;" onclick="return topicDetails('{{URL::to('/discussion/'.$group_data_select->id.'/'.$topic_val->id) }}')"> By {{ ucfirst($topic_val->first_name) }} </p>
														</div> 
													</a>
												</li><?php
											}
										} ?>
									</ul>
								</li><?php
							} 
						} ?> 
					
					</ul>
				</div>
			</div>
		</div>
	</div> 
</div>

<script type="text/javascript">
	
	function actionGroup(action_type){ 
		$('.comman_icon_cls').hide(); 
		$('.'+action_type).show(); 
	}
	
	function groupActionIcon(group_id, topic_id, action_type){
		if(action_type=='delete') {
			var confirm_check = confirm('Are you sure, you want to remove this topic and all the information associated?');
			if(confirm_check){
				actionCall(group_id, topic_id, action_type); 
			} 
		} else {
			if(action_type=='lock') {
				var confirm_check = confirm('Are you sure, you want to lock this topic?');
				if(confirm_check){
					actionCall(group_id, topic_id, action_type); 
				} 
			}
			
			if(action_type=='unlock') {
				var confirm_check = confirm('Are you sure, you want to unlock this topic?');
				if(confirm_check){
					actionCall(group_id, topic_id, action_type); 
				} 
			}
			
			if(action_type=='edit') { 
				actionCall(group_id, topic_id, action_type);  
			}
		 
		} 
	}
	
	function actionCall(group_id, topic_id, action_type) { 
		if(action_type=='edit'){ 
			window.location.href = "{{URL::to('discussion-edit/"+group_id+"/"+topic_id+" ')}}";
		} else {
			jQuery.ajax({
				type: "POST",
				url: "{{ URL::to('/group-action') }}",
				data: "group_id="+ group_id +"&topic_id="+ topic_id +"&action_type="+ action_type,  
				dataType:"json", 
				success: function(data){ 
					if(data.type=='success'){
						location.reload();
					} else {
						alert(data.msg);
					}
				}
			});
		}
	}
	
	
	function topicDetails(url){  
		window.location.href = url;  
		//return false; 
	}
	
	function groupListShow() { 
		document.getElementById("myDropdown").classList.toggle("show");
	}	
	
</script>