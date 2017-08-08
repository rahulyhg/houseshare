@extends('backend/layouts/default')
<?php 
	$role_id = Route::input('role_id');
	$user_role =  Config::get('constants.USER_ROLES.'.$role_id); 
$user_role  = str_plural($user_role); ?>
@section('title')
{{$user_role}} Management
@parent

@stop


@section('content')


<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="javascript:;" class="current">{{$user_role}}</a> 
	</div>
	<h1>{{$user_role}} ({{ $users->getTotal()}})</h1>
</div>

<div class="container-fluid">
	<hr> 
	
	<div class="row-fluid">
		<div class="span12">
			
			
			
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
					<h5>Search</h5>
				</div>
				{{ Form::open(array('url' => array('admin/users/'.$role_id),'class' => '', 'name'=>'searchUser')) }}
				<div class="widget-content"> 
					<div class="controls controls-row">
						{{ Form::text('first_name', isset($_POST['first_name'])?trim($_POST['first_name']):null, array('id' => 'firstname','placeholder'=>'Search by name', 'class' => 'span3 m-wrap')) }}
						{{ Form::text('email', isset($_POST['email'])?trim($_POST['email']):null, array('id' => 'email','placeholder'=>'Search by email', 'class' => 'span3 m-wrap')) }}
						{{ Form::select('gender', array('' => 'Select Gender')+Config::get('constants.GENDER'),isset($_POST['gender'])?($_POST['gender']):'default', array('class' => 'span3 m-wrap'))}}
						{{ Form::select('country_id', array('' => 'Select Country')+$countries,isset($_POST['country_id'])?($_POST['country_id']):'default', array('class' => 'span3 m-wrap'))}}
						{{ Form::select('status', array('' => 'Select Status') + array(1=>'Active',0=>'Inactive'), isset($_POST['status'])?($_POST['status']):'default', array('class' => 'span3 m-wrap padding-left-cls'))}}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-success" type="submit">Search</button> &nbsp;
						<a href="{{ URL::to('admin/users/'.$role_id) }}" ><button class="btn btn-default" type="button">Show All</button></a>	
					</div> 
				</div>
				{{ Form::close() }}
			</div> 
		</div>
	</div>
	
	
	
	
	
	
	
	
	<div class="row-fluid">
		<div class="span12">
			
			<div class="widget-box">
				
				<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
					<h5>{{$user_role}} ({{ $users->getTotal()}})</h5>
				</div>
				
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('first_name', 'Name' ) }}</th>
								<th class="hidden-phone text-left">{{ SortableTrait::link_to_sorting_action('email', 'Email') }}</th>
								<th class="hidden-phone text-left">{{ SortableTrait::link_to_sorting_action('gender', 'Gender') }}</th>
								<th class="hidden-phone text-left">{{ SortableTrait::link_to_sorting_action('country_id', 'Country') }}</th>
								<th class="hidden-phone text-center">{{ SortableTrait::link_to_sorting_action('status', 'Block/Unblock') }}</th>
								<th class="hidden-phone text-center">{{ SortableTrait::link_to_sorting_action('status', 'Status') }}</th>
								<th class="hidden-phone text-left">{{ SortableTrait::link_to_sorting_action('created_at','Register On') }}</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						
						<tbody>	
							@if(! $users->isEmpty())
							@foreach ($users as $val)
							<tr>
								<?php $full_name = ucwords(strtolower($val->first_name .' ' .$val->last_name)); ?>
								<td>
									{{ HTML::linkAction('UserController@admin_view', $full_name, array($val->role_id, $val->id), array( 'title'=>$full_name)) }}
								</td>
								<td class="hidden-phone">{{ HTML::mailto($val->email) }}</td>
								<td class="hidden-phone">{{ Config::get('constants.GENDER.'.$val->gender) }}</td>
								<td class="hidden-phone">{{ ($val->name)?$val->name:'---' }}</td>
								<td class="hidden-phone text-center">
									@if($val->status==0 OR $val->status==1)
									<a title="Block" href="{{ URL::to('admin/users/block/'.$val->id) }}"><span class="label label-success">&nbsp; Unblock &nbsp;</span></a>
									@else
									<a title="Unblock" href="{{ URL::to('admin/users/block/'.$val->id) }}"><span class="label label-important">Blocked</span></a>
									@endif
								</td>
								
								<td class="hidden-phone text-center">
									@if($val->status!=2)
									@if($val->status==1)
									<a title="Deactivate" href="{{ URL::to('admin/users/status/'.$val->id) }}"><span class="label label-success label-mini">&nbsp; Active &nbsp;</span></a>
									@else
									<a title="Activate" href="{{ URL::to('admin/users/status/'.$val->id) }}"><span class="label label-danger label-mini">Deactivate</span></a>
									@endif
									@else
									<span class="label label-danger label-mini">Blocked</span>
									@endif
								</td>
								<td class="hidden-phone center">{{ date('M d,Y h:i A',strtotime($val->created_at)) }}</td>
								<td class="center">
									
									<div class="btn-group">
										<button class="btn">Action</button>
										<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="{{ URL::to('admin/users/view/'.$val->role_id.'/'.$val->id) }}"><i class="icon-eye-open"></i>View</a></li>
											<li><a href="{{ URL::to('admin/users/edit/'.$val->role_id.'/'.$val->id) }}"><i class="icon-edit"></i>Edit</a></li>
											<li><a href="{{ URL::to('admin/users/change_password/'.$val->role_id.'/'.$val->id) }}"><i class="icon-key"></i>Change Password</a></li>
											<li><a href="#remove_{{ $val->id }}" data-toggle='modal' class='' title="Remove"><i class="icon-remove"></i>Remove</a></li>
										</ul>
									</div> 
									
									<div class="modal fade" id="remove_<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h3 class="modal-title">Remove</h3>
												</div>
												<div class="modal-body">Are you sure, you want to remove this {{ Config::get('constants.USER_ROLES.'.$val->role_id) }} ?</div>
												<div class="modal-footer">
													{{ HTML::linkAction('UserController@admin_remove', 'Confirm', array($val->id), array('class'=>'btn btn-primary','title'=>'Confirm Remove')) }}
													<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="7" class="no-record"> No records found!</td>
							</tr>
							@endif
						</tbody> 
					</table>
					
				</div>
				<div align="right">{{ $users->links()}}</div>
			</div>
		</div>
	</div>
</div>   
@stop