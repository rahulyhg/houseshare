@extends('backend/layouts/default')

@section('title')
	Email Templates ::
@stop

@section('content')



<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="javascript:;" class="current">Email Templates</a> 
	</div>
	<h1>Email Templates</h1>
</div>

<div class="container-fluid">
	<hr> 
	 
	<div class="row-fluid">
		<div class="span12"> 
			
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
					<h5>Search Templates</h5>
				</div>
				{{ Form::open(array('url' => array('admin/settings/email-templates'),'class' => 'cmxform form-horizontal tasi-form', 'name'=>'searchCoupon')) }}
				<div class="widget-content"> 
					<div class="controls-row">
						{{ Form::text('name', isset($_POST['name'])?trim($_POST['name']):null, array('id' => 'title','placeholder'=>'Search by template name', 'class' => 'span3')) }}	
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-success" type="submit">Search</button> &nbsp;
						<a href="{{ URL::to('admin/settings/email-templates') }}" ><button class="btn btn-default" type="button">Show All</button></a>	
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
					<h5>Email Templates</h5>
				</div>
				
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('name','Template Name') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('slug','Slug') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('subject','Email Subject') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('updated_at','Last Modified') }}</th>
								<th class = "center">Action</th> 
							</tr>
						</thead>
						
						<tbody>	
							@if(! $data->isEmpty())
								@foreach ($data as $val)
									<tr class="">
										<td>{{ $val->name }}</td>
										<td>{{ $val->slug }}</td>
										<td>{{ $val->subject }}</td>
										<td class="center">	{{ date('F d,Y', strtotime($val->updated_at)) }}</td>
										<td class="center">
											<a href="{{ URL::to('admin/settings/update-template/'.$val->id) }}" ><button class="btn btn-success btn-xs "><i class="fa fa-pencil"></i>&nbsp;Update</button></a>
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="5" class="no-record"> No records found!</td>
								</tr>
							@endif
						</tbody> 
					</table>
				</div>
				<div align="right">{{ $data->links()}}</div>
			</div>
		</div>
	</div>
</div>   
@stop