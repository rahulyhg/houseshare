@extends('backend/layouts/default')

@section('title')
	Page Management ::
@stop

@section('content')



<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="javascript:;" class="current">Pages</a> 
	</div>
	<h1>Pages<small> General Information</small></h1>
</div>

<div class="container-fluid">
	<hr> 
	 
	<div class="row-fluid">
		<div class="span12"> 
			
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-search"></i> </span>
					<h5>Search Static Pages</h5>
				</div>
				{{ Form::open(array('url' => array('admin/pages'),'class' => 'cmxform form-horizontal tasi-form', 'name'=>'searchPage')) }}
				<div class="widget-content"> 
					<div class="controls-row">
						{{ Form::text('title', isset($_POST['title'])?trim($_POST['title']):null, array('id' => 'title','placeholder'=>'Search by Page Title', 'class' => 'span3')) }}	
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<button class="btn btn-success" type="submit">Search</button> &nbsp;
						<a href="{{ URL::to('admin/pages') }}" ><button class="btn btn-default" type="button">Show All</button></a>	
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
					<h5>Static Pages List</h5>
				</div>
				
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('slug','Page Name') }}</th>
								<th class="text-left">{{ SortableTrait::link_to_sorting_action('title','Page Title') }}</th>
								<th style="width:12%;" class="text-left">{{ SortableTrait::link_to_sorting_action('updated_at','Last Modified') }}</th>
								<th class="center">Action</th>
							</tr>
						</thead>
						
						<tbody>	
							@if(! $pages->isEmpty())
								@foreach ($pages as $val)
									<tr>
										<td>{{ $val->slug }}</td>
										<td>{{ $val->title }}</td>
										<td class="center">	{{ date('F d,Y', strtotime($val->updated_at)) }}</td>
										<td class="center">
											<a href="{{ URL::to('admin/pages/edit/'.$val->id) }}" ><button class="btn btn-success btn-xs "><i class="fa fa-pencil"></i>&nbsp;Update</button></a>
										</td>
									</tr>
								@endforeach
							@else
								<td colspan="4" class="no-record"> No records found!</td>
							@endif
						</tbody> 
					</table>
				</div>
				<div align="right">{{ $pages->links()}}</div>
			</div>
		</div>
	</div>
	</div>   
@stop