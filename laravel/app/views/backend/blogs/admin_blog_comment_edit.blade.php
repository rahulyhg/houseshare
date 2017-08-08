@extends('backend/layouts/default')
@section('title')
	Update Blog
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/blogs') }}" title="Go to Blogs" class="tip-bottom"><i class="icon-list"></i>Blogs</a> 
		<a href="javascript:;" class="current">Update Comment</a> 
	</div>
	
	<h1>Update Comment</h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::model($data, array('url' => array('admin/blogs/comment/edit', $data->id,$data->blog_id),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form','files' => true)) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span6">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>Update Comment</h5>
						</div>
						
						
						<div class="widget-content nopadding">
						
						
						
						
						
							<div class="control-group">
								<label class="control-label">Comment<span class='red bold'>*</span></label>
								<div class="controls">
				{{ Form::textarea('message', null, array('id' => 'message', 'class' => 'span10 ckeditor')) }}	
									<span class="red">{{ $errors->first('message') }} </span>

								</div>
							</div> 
							
							
							
							
							
						@if(Route::currentRouteName() != 'admin_update_profile')
								<div class="control-group">
									<label class="control-label">Status<span class='red bold'>*</span></label>
									<div class="controls">
										{{ Form::select('status',Config::get('constants.STATUS'), null, array('class' => 'span11'))}}
									</div>
								</div>
							@endif

							
						
						
							
							
							
							<div class="form-actions">
								<div class="span8">&nbsp;</div>
								<button type="submit" class="btn btn-success">Update</button>
								<a href="{{ URL::to('admin/blogs/comment/'.Route::input('blog_id')) }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div> 
					</div> 
				</div>
				
				
				
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 


@stop