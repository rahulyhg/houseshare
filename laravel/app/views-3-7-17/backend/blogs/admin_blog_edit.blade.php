@extends('backend/layouts/default')
@section('title')
	Update Blog
@stop

@section('content')
  

<div id="content-header">

	<div id="breadcrumb"> 
		<a href="{{ URL::to('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> 
		<a href="{{ URL::to('admin/blogs') }}" title="Go to Blogs" class="tip-bottom"><i class="icon-list"></i>Blogs</a> 
		<a href="javascript:;" class="current">Update Blog</a> 
	</div>
	
	<h1>Update Blog</h1>
	
</div>

<div class="container-fluid">

	<hr>
	
	<div class="row-fluid">
	
		{{ Form::model($data, array('url' => array('admin/blogs/edit', $data->id),'method' => 'PUT', 'class' => 'cmxform form-horizontal tasi-form','files' => true)) }}
		
			<div class="span12 padding-left-cls">
			
				<div class="span12">
				
					<div class="widget-box">
					
						<div class="widget-title"> <span class="icon"> <i class="icon-edit"></i> </span>
							<h5>Update Blog</h5>
						</div>
						
						
						<div class="widget-content nopadding">
						
						
							<div class="control-group">
								<label class="control-label">Category <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::select('subject_id', array(''=>'Please Select')+$category, null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('subject_id') }} </span>
								</div>
							</div> 
						
						
						
							<div class="control-group">
								<label class="control-label">Title <span class='red bold'>*</span></label>
								<div class="controls">
									{{ Form::text('title', null, array('class' => 'span11'))}}
									<span class="red">{{ $errors->first('title') }} </span>
								</div>
							</div> 
							
							
							<div class="control-group">
								<label class="control-label">Content <span class='red bold'>*</span></label>
								<div class="controls">
									
									{{ Form::textarea('content', null, array('id' => 'content', 'class' => 'span10 ckeditor')) }}	
									<span class="red">{{ $errors->first('content') }} </span>
								</div>
							</div> 
							
								<div class="control-group">
								<label class="control-label">&nbsp;</label>
								<div class="controls">
								   {{GeneralHelper::showImg($data->image, '', '80px', '80px','','blogs/thumb/') }}
								</div>
							</div>
							
							
							<div class="control-group">
								<label class="control-label">Image</label>
								<div class="controls">
									{{ Form::file('image', array('id' => 'image', 'class' => 'span11')) }}
									<span class="help-block">*(Allowed Format: JPEG,jpg,png,gif)</span>
									<span class="red">{{ $errors->first('image')}}</span>
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
								<a href="{{ URL::to('admin/blogs') }}" class="btn btn-default" >Cancel</a>
							</div>
							
						</div> 
					</div> 
				</div>
				
				
				
			</div> 
		
		{{ Form::close() }}
		
	</div>
</div> 


@stop