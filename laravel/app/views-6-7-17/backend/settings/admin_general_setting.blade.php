@extends('backend/layouts/default')


@section('title')
	Setting Management 
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="javascript:;" class="current">General Settings</a> 
	</div>
	
	<h1>Setting <small>General Settings</small></h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::open(array('url' => array('admin/settings/general'),'class' => 'cmxform form-horizontal tasi-form', 'method'=>'PUT')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>General Settings</h5>
						</div>
						
						<div class="widget-content nopadding">  
						
							<?php $i = 1;?>
							@foreach($settings as $val)
								<div class="control-group">
									<label class="control-label">{{ $val->label }} <span class='red bold'>*</span></label>
									<div class="controls">
										{{ Form::hidden('label' .$i, $val->label, array('class' => 'span11')) }}
										{{ Form::hidden('id' .$i, $val->id, array('class' => 'span11')) }}
										{{ Form::text('value'.$i, $val->value, array('class' => 'span11')) }}
										<span class="help-block">{{ $val->description }}</span>
										<span class="red">{{ $errors->first('value'.$i) }}</span>
									</div>
								</div> 
								<?php $i++; ?>
							@endforeach 

							<div style="text-align: center;" class="form-actions">
								<button type="submit" class="btn btn-success">Update</button>
							</div>
							
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop