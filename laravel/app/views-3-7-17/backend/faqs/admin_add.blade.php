@extends('backend/layouts/default')
@section('title')
	Add FAQ
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/faqs') }}" title="Go to FAQs" class="tip-bottom"><i class="icon-question-sign"></i>FAQs</a> 
		<a href="javascript:;" class="current">Add FAQ</a> 
	</div>
	
	<h1>Add FAQ</h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::open(array('url' => array('admin/faqs/add'),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span12">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>Add FAQ</h5>
						</div>
					 
						
						<div class="widget-content nopadding"> 
							 
							
							<div class="control-group">
								<label class="control-label">Question <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('question', null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('question') }} </span>
								</div>
							</div> 
							
							<div class="control-group">
								<label class="control-label">Answer<span class='red bold'>*</span></label>
								<div class="controls" style="width: 74.5%;">
									{{ Form::textarea('answer', null, array('id' => 'answer', 'class' => 'span10 ckeditor')) }}	
									<span class="red">{{ $errors->first('answer') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Status</label>
								<div class="controls">
									{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'span11'))}}
								</div>
							</div> 

							<div class="form-actions">
								<div class="span9">&nbsp;</div>
								<button type="submit" class="btn btn-success">Save</button>
								<a href="{{ URL::to('admin/faqs') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop