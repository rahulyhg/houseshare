
@extends('backend/layouts/default')
@section('title')
Add Property
@stop

@section('content')


<div id="content-header">
	
	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/properties') }}" title="Go to Propertys" class="tip-bottom"><i class="icon-list"></i>Propertys</a> 
		<a href="javascript:;" class="current">Add Category</a> 
	</div>
	
	<h1>Add Category</h1>
	
</div>

<div class="container-fluid">
	
	<hr>
	
	<div class="row-fluid">
		
		{{ Form::open(array('url' => array('admin/blogs/categories/add'),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
		<div class="span12 padding-left-cls">
			
			<div class="span6">
			
				<?php //echo '<pre>'; print_r(Input::old('roomArr')); die;  ?>
				
				<div class="widget-box">
					
					<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
						<h5>Add Category</h5>
					</div>
					
					
					<div class="widget-content nopadding"> 
					
					
						<div class="control-group">
							<label class="control-label">Title <span class='red bold'>*</span></label>
							<div class="controls">
								{{ Form::text('name', null, array('class' => 'span11'))}}
								<span class="red">{{ $errors->first('name') }} </span>
							</div>
						</div> 
						
					<div class="form-actions">
							<div class="span8">&nbsp;</div>
							<button type="submit" class="btn btn-success">Save</button>
							<a href="{{ URL::to('admin/blogs/categories') }}" class="btn btn-default" >Cancel</a>
						</div>
			
			
				</div>
			</div>
			
			
		</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
	

@stop