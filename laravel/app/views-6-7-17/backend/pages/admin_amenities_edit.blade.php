@extends('backend/layouts/default')
@section('title')
	Update Amenity 
@stop

@section('content')

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/amenities') }}" title="Go to Amenities" class="tip-bottom"><i class="icon-list"></i>Amenities</a> 
		<a href="javascript:;" class="current">Update Amenity :{{ $data->name }}</a> 
	</div>
	<h1>Amenity<small> General Information</small></h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
			{{ Form::model($data,array('url' => array('admin/amenities/edit',$data->id), 'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>Amenity Information</h5>
						</div>
						
						<div class="widget-content nopadding"> 
					 
							
							<div class="control-group">
								<label class="control-label">Name <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('name', null, array('id' => 'name', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('name') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Status</label>
								<div class="controls">
									{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('status') }} </span>
								</div>
							</div>   

							<div class="form-actions">
								<div class="span8">&nbsp;</div>
								<button type="submit" class="btn btn-success">Update</button>
								<a href="{{ URL::to('admin/amenities') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop