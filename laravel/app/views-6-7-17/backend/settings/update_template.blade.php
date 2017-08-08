@extends('backend/layouts/default')
@section('title')
	Email Template ::
@stop

@section('content')

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/settings/email-templates') }}" title="Go to Email Templates" class="tip-bottom"><i class="icon-home"></i>Email Templates</a> 
		<a href="javascript:;" class="current">Update Email Template : {{ $template->name }}</a> 
	</div>
	<h1>Update Email Template <small>General Information</small></h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::model($template,array('url' => array('admin/settings/update-template',$template->id), 'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span12">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>Update Email Template</h5>
						</div>
						
						<div class="widget-content nopadding"> 
					 
							
							<div class="control-group">
								<label class="control-label">Email Subject <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('subject', null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('subject') }} </span>
								</div>
							</div>  
							
							<div class="control-group">
								<label class="control-label">Email Content</label>
								<div style="width: 74.5%;" class="controls">
									{{ Form::textarea('content', null, array( 'name'=>"content", 'id' => 'content', 'size' => '30x6', 'class' => 'span11 ckeditor')) }}	
								</div>
							</div>  
							
							<div class="control-group">
								<label class="control-label">Description</label>
								<div style="width: 74.5%;" class="controls">
									{{ Form::textarea('description', null, array( 'name'=>"description", 'id' => 'description', 'size' => '30x6', 'class' => 'span11 ckeditor')) }}	
								</div>
							</div> 

							<div class="form-actions">
								<div class="span9">&nbsp;</div>
								<button type="submit" class="btn btn-success">Update</button>
								<a href="{{ URL::to('admin/settings/email-templates') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop