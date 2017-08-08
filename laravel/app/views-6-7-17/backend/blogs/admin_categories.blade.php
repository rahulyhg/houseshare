@extends('backend/layouts/default')

@section('title')
	Category Management ::
@stop

@section('content')



<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="javascript:;" class="current">Category</a> 
	</div>
	<h1>Category<small> ({{ $data->getTotal()}})</small></h1>
</div>

<div class="container-fluid">
	<hr> 
	 
	<div class="row-fluid">
		<div class="span12"> 
			
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
					<h5>Search Category
					
					</h5>
				</div>
				{{ Form::open(array('url' => array('admin/blogs/categories'),'class' => 'cmxform form-horizontal tasi-form', 'name'=>'searchPage')) }}
				<div class="widget-content"> 
				
					<a title="ADD" style ="float:right;" href="{{ URL::to('admin/blogs/categories/add/') }}"><button class="btn btn-success" type="button">ADD</button></a>
					&nbsp;&nbsp;
					<div class="controls-row">
						{{ Form::text('name', isset($_POST['name'])?trim($_POST['name']):null, array('id' => 'name','placeholder'=>'Search by Category Name', 'class' => 'span3')) }}	
						{{ Form::select('status', array('' => 'Select Status') + array(1=>'Active',0=>'Deactivate'), isset($_POST['status'])?($_POST['status']):'default', array('class' => 'span3 m-wrap'))}}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-success" type="submit">Search</button> &nbsp;
						<a href="{{ URL::to('admin/blogs/categories') }}" ><button class="btn btn-default" type="button">Show All</button></a>	
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
					<h5>Category List</h5>
				</div>
				
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('name','Title') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('status','Status') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('updated_at','Last Modified') }}</th>
								<th class="text-left">Action</th>
							</tr>
							</tr>
						</thead>
						
						<tbody>	
							@if(! $data->isEmpty())
								@foreach ($data as $val)
									<tr>
										<td>{{ $val->name }}</td>
										<td class="center">
											@if($val->status==1)
												<a title="Deactivate" href="{{ URL::to('admin/blogs/category-status/'.$val->id) }}"><span class="label label-success label-mini">&nbsp; Active &nbsp;</span></a>
											@else
												<a title="Activate" href="{{ URL::to('admin/blogs/category-status/'.$val->id) }}"><span class="label label-danger label-mini">Deactivate</span></a>
											@endif
										</td>
										<td class="center">	{{ date('F d,Y h:i A', strtotime($val->updated_at)) }}</td>
										<td class="center">
											
											<div class="btn-group">
												<button class="btn">Action</button>
												<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
												<ul class="dropdown-menu">
													<li><a href="{{ URL::to('admin/blogs/category-edit/'.$val->id) }}"><i class="icon-edit"></i>Edit</a></li>
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
														<div class="modal-body">Are you sure, you want to remove this?</div>
														<div class="modal-footer">
															{{ HTML::linkAction('BlogController@admin_remove_category', 'Confirm', array($val->id), array('class'=>'btn btn-primary','title'=>'Confirm Remove')) }}
															<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
														</div>
													</div>
												</div>
											</div>
										</td> 
									</tr>
								@endforeach
							@else
								<td colspan="7" class="no-record"> No records found!</td>
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
