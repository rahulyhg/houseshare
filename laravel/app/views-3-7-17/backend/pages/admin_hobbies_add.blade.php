@extends('backend/layouts/default')
@section('title')
	Add Hobby
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/hobbies') }}" title="Go to Hobbies" class="tip-bottom"><i class="icon-list"></i>Hobbies</a> 
		<a href="javascript:;" class="current">Add Hobby</a> 
	</div>
	
	<h1>Add Hobby</h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::open(array('url' => array('admin/hobbies/add'),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
							<h5>Add Hobby</h5>
						</div>
					 
						
						<div class="widget-content nopadding"> 
							 
							
							<div class="control-group">
								<label class="control-label">Name <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('name', null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('name') }} </span>
								</div>
							</div>  
							
							<div class="control-group">
								<label class="control-label">Status</label>
								<div class="controls">
									{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'span11'))}}
								</div>
							</div> 

							<div class="form-actions">
								<div class="span8">&nbsp;</div>
								<button type="submit" class="btn btn-success">Save</button>
								<a href="{{ URL::to('admin/hobbies') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop