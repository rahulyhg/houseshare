@extends('frontend/layouts/default')
@section('title')
	Transcript
@stop 

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div  class="breadcrumb space-for floting-bru">
					<ul>
						<li><a href="{{URL::to('/')}}">{{Lang::get('ViewMessage.Home')}}</a><span>/</span></li>
						<li><a href="{{URL::to('/myaccount')}}">{{Lang::get('ViewMessage.Dashboard')}}</a><span>/</span></li>
						<li>Transcript</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="headding-24">
			<h2>Transcript</h2>
		</div>
		
		@include('frontend/users/myaccount_left')
		
		<div class="right-section"> 
		
			 
		
		
<div class="row"> 
		
			{{ Form::model(null, array('url'=>url('/transcript'))) }} 
  

				<div class="show-courses">  
				
				 
				
					<div class="col-md-3 col-sm-3">
						<div class="form-group">
							<label style="padding-top: 5%;">Completed between</label>
						</div>
					</div>
				
					<div class="col-md-3 col-sm-3">
						<div class="form-group">
							{{ Form::text('from',isset($_POST['from'])?$_POST['from']:null, array( 'placeholder'=>'Form', 'class'=>'form-control datepicker'))}}  
						</div>
					</div>
				
					<div class="col-md-3 col-sm-3">
						<div class="form-group">
							{{ Form::text('to',isset($_POST['to'])?$_POST['to']:null, array( 'placeholder'=>'To', 'class'=>'form-control datepicker'))}}  
						</div>
					</div>
					
					<div class="col-md-3 col-sm-3">
						<div class="form-group">
							<button type="submit" style="right: unset; padding-top: 5px; margin-top: -2.6%;" class="btn btn-lg btn-default"><i class="fa fa-search"></i>&nbsp;Search</button>
						</div>
					</div> 
					 
				
				{{Form::close()}}
		 

				<div class="col-md-12 col-sm-12 col-xs-12">
					
					<div id="filterDescription">
						<span id="fdLead">Showing Transcript</span>
						<a id="showAllCourses" style="color:#fff;" href="{{URL::to('transcript')}}" style="display: inline;">All Transcript</a>
					</div>
					
					<div id="courseLibraryGrid" class="table-responsive" data-role="grid">
					
						<table role="table"> 
						
							<thead class="k-grid-header" role="rowgroup" style="display:table-row-group;">
								<tr role="row">
									<th style="padding: 0 72px; font-weight: bold;"> {{ SortableTrait::link_to_sorting_action('name', 'Course Title') }}</th>
									 <th style="">{{ SortableTrait::link_to_sorting_action('date', 'Date Achieved') }}</th>
									 <th style="">{{ SortableTrait::link_to_sorting_action('hours', 'Course Credits') }}</th>
								</tr>
							</thead>
							
							<tbody role="rowgroup"> 
							
								@if(! $data->isEmpty())
									
								@foreach($data as $val)
								
									<tr data-uid="90d9b182-d066-433b-b8f5-426ebf96fd36" role="row">
										<td role="gridcell"> 
											<h5> 
												<a href="{{URL::to('course/summary/'.$val->slug)}}"><div class="course-list-title">{{$val->name}}</div></a>
											</h5> 
										</td> 
										<td role="gridcell">
											<div class="contact-hours"> 
											 {{$val->date}} 
											</div>
										</td>
										<td role="gridcell">
											<div class="contact-hours"> 
												<span>{{$val->hours}}</span>Contact Hours 
											</div>
										</td>
										<td role="gridcell">
											<a class="view-course" href="{{URL::to('course/summary/'.$val->slug)}}">
												<i class="fa fa-file-text-o"></i>View Course
											</a>
										</td> 
									</tr> 
									
								@endforeach
								
								@else
									
								<tr data-uid="90d9b182-d066-433b-b8f5-426ebf96fd36" role="row">
									<td role="gridcell"> 
									  <p style="text-align: center; padding: 21px; color: red;">Record not found.</p>
									</td>
								</tr>
									
								@endif
								
								<div class="row">
									<div class="col-md-12 full-pagging">
										{{ $data->links()}}
									</div>
								</div>
								  
								
								 
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
 
		</div>		
		
		
		
		
			 
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function(){ 
			 jQuery(".datepicker").datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
				pickerPosition: "bottom-left",
				endDate  : new Date(),
				
			});
		});
	</script>
@stop							