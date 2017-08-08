@extends('backend/layouts/default')

@section('title')
	Faq Management
@stop

@section('content')



<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="javascript:;" class="current">FAQs</a> 
	</div>
	<h1>FAQs ({{ $faqs->getTotal()}})</h1>
</div>

<div class="container-fluid">
	<hr> 
	
	<?php /*
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
	</div> */ ?>
	
	
	<div class="row-fluid">
		<div class="span12">
			
			<div class="widget-box">
				
				<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
					<h5>FAQs</h5>
				</div>
				
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="60%" class="text-left">{{ SortableTrait::link_to_sorting_action('question','Question') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('status','Status') }}</th>
								<th class="hidden-phone text-left">{{ SortableTrait::link_to_sorting_action('created_at','Created On') }}</th>
								<th class="">Action</th> 
							</tr>
						</thead>
						
						<tbody>	
							@if(! $faqs->isEmpty())
								@foreach ($faqs as $val)
									<tr> 
										<td> 
											<a style="font-weight:bold;" href="#accordion2_{{$val->id}}" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
												{{$val->question}}
											</a>
									
											  <div class="panel-collapse collapse out" id="accordion2_{{$val->id}}">
												  {{$val->answer}}
											  </div>
										</td>
										
										<td class="center">
											@if($val->status==1)
												<a title="Deactivate" href="{{ URL::to('admin/faqs/status/'.$val->id) }}"><span class="label label-success label-mini">&nbsp; Active &nbsp;</span></a>
											@else
												<a title="Activate" href="{{ URL::to('admin/faqs/status/'.$val->id) }}"><span class="label label-danger label-mini">Deactivate</span></a>
											@endif
										</td>	
										<td class="hidden-phone center">{{ date('M d,Y',strtotime($val->created_at)) }}</td>
										<td class="center">
											
											<div class="btn-group">
												<button class="btn">Action</button>
												<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
												<ul class="dropdown-menu">
													<li><a href="{{ URL::to('admin/faqs/edit/'.$val->id) }}"><i class="icon-edit"></i>Edit</a></li>
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
														<div class="modal-body">Are you sure, you want to remove this faq?</div>
														<div class="modal-footer">
															{{ HTML::linkAction('FaqController@admin_remove', 'Confirm', array($val->id), array('class'=>'btn btn-primary','title'=>'Confirm Remove')) }}
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
									<td colspan="4" class="no-record"> No records found!</td>
								</tr>
							@endif
						</tbody> 
					</table>
				</div>
				<div align="right">{{ $faqs->links()}}</div>
			</div>
		</div>
	</div>
</div>   
@stop