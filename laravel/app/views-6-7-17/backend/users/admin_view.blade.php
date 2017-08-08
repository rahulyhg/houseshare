@extends('backend/layouts/default')
<?php
	$role_id = Route::input('role_id');
	$data_role =  Config::get('constants.USER_ROLES.'.$role_id); 
	$data_role  = str_plural($data_role);
?>
@section('title')
{{$data_role}} Management
@stop

@section('content')


<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/users/'.$role_id) }}" title="Go to {{$data_role}}" class="tip-bottom"><i class="icon-home"></i>{{$data_role}}</a> 
		<a href="javascript:;" class="current">{{'Detail of : ' .$user->first_name. ' ' .$user->last_name }}</a> 
	</div>
	
	<h1>{{$data_role}} <small>General Information</small></h1>
	
</div>

<div class="container-fluid">
	
	<hr>
	
	<div class="row-fluid">
		
		{{ Form::open(array('url' => array('admin/users/add'), 'class' => 'form-horizontal', 'name'=>'User','files' => true)) }}
		
		<div class="span12 padding-left-cls">
			
			<div class="span6">
				
				<div class="widget-box">
					
					<div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
						<h5>Detail of : {{$user->first_name. ' '. $user->last_name }}</h5>
					</div>
					
					<div class="widget-content nopadding"> 
						
						<table class="table table-bordered table-invoice">
							<tbody>
								<tr>
									<tr>
										<td class="width30">Name</td>
										<td class="width70"><strong>{{ $user->first_name .' '. $user->last_name .' ('.str_singular($data_role).')'}}</strong></td>
									</tr>
									<tr>
										<td class="width30">Photo</td>
										<td class="width70">{{ GeneralHelper::showUserImg($user->photo, '', '20%', '',$user->first_name,'thumb') }}</td>
									</tr>
									
									<tr>
										<td>Email</td>
										<td><strong>{{ $user->email }}</strong></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td><strong>{{ Config::get('constants.GENDER.'.$user->gender) }}</strong></td>
									</tr> 
									<tr>
										<td>Status</td>
										<td><strong>{{ Config::get('constants.STATUS.'.$user->status) }}</strong></td>
									</tr>
									<tr>
										<td>Registered On</td>
										<td><strong>{{ date('F d,Y', strtotime($user->created_at)) }}</strong></td>
									</tr>
									<tr>
										<td>Updated On</td>
										<td><strong>{{ date('F d,Y', strtotime($user->updated_at)) }}</strong></td>
									</tr> 
									<tr>
										<td style="text-align: right;" colspan="2"><a class="btn btn-default" href="{{ URL::to('admin/users/'.$role_id)}}" ><i class='fa fa-reply'> Back</i></a></td>
									</tr> 
								</tr>
							</tbody> 
						</table> 
						
					</div>
				</div> 
		</div>
		
		
		<div class="span6">
			
			<div class="widget-box">
				
				<div class="widget-title"> <span class="icon"> <i class="icon-eye-open"></i> </span>
					<h5>Detail of : {{$user->first_name. ' '. $user->last_name }}</h5>
				</div>
				
				<div class="widget-content nopadding"> 
					
					<table class="table table-bordered table-invoice">
						<tbody>
							<tr>
							
								<tr>
									<td>Description</td>
									<td><strong>{{ $user->description!=''?$user->description:'----' }}</strong></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><strong>{{ $user->street_1!=''?$user->street_1 .', '. $user->street_2:'----' }}</strong></td>
								</tr>
								<tr>
									<td>City</td>
									<td><strong>{{ $user->city!=''?$user->city:'----' }}</strong></td>
								</tr>
								<tr>
									<td>State</td>
									<td><strong>{{ $user->state!=''?$user->state:'----' }}</strong></td>
								</tr>
								<tr>
									<td>Zip Code</td>
									<td><strong>{{ $user->zip!=''?$user->zip:'----' }}</strong></td>
								</tr>
								<tr>
									<td>Country</td>
									<td><strong>{{ $user->country_name!=''?$user->country_name:'----' }}</strong></td>
								</tr>
								<tr>
									<td>Mobile</td>
									<td><strong>{{ $user->mobile!=''?$user->mobile:'----' }}</strong></td>
								</tr> 
							</tr>
						</tbody> 
					</table> 
					
				</div>
				</div> 
			</div> 
		</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 

@stop