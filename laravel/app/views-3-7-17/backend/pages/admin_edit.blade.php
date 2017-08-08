@extends('backend/layouts/default')
@section('title')
	Page Management 
@stop

@section('content')

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/pages') }}" title="Go to Email Templates" class="tip-bottom"><i class="icon-home"></i>Pages</a> 
		<a href="javascript:;" class="current">Update Page :{{ $page->title }}</a> 
	</div>
	<h1>Pages<small>General Information</small></h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
			{{ Form::model($page,array('url' => array('admin/pages/edit',$page->id), 'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form')) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span12">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>Page Information</h5>
						</div>
						
						<div class="widget-content nopadding"> 
					 
							
							<div class="control-group">
								<label class="control-label">Page Title <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('title', null, array('id' => 'title', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('title') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Status <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('status') }} </span>
								</div>
							</div>  
							
							<div class="control-group">
								<label class="control-label">Content</label>
								<div style="width: 74.5%;" class="controls">
									{{ Form::textarea('content', null, array( 'name'=>"content", 'id' => 'content', 'size' => '30x6', 'class' => 'span11 ckeditor')) }}	
								</div>
							</div>   
							
							<div class="control-group">
								<label class="control-label">Meta Title <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('meta_title', null, array('id' => 'meta_title', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('meta_title') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Meta Keywords <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('meta_keywords', null, array('id' => 'meta_keywords', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('meta_keywords') }} </span>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">Meta Description <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('meta_description', null, array('id' => 'meta_description', 'class' => 'span11')) }}
									<span class="red">{{ $errors->first('meta_description') }} </span>
								</div>
							</div>

							<div class="form-actions">
								<div class="span9">&nbsp;</div>
								<button type="submit" class="btn btn-success">Update</button>
								<a href="{{ URL::to('admin/pages') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div>
					</div> 
				</div> 
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 
	
@stop