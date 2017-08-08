@extends('frontend/layouts/default')
@section('title')
	{{$data->title}}
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div  class="breadcrumb space-for floting-bru">
				<ul>
					<li><a href="{{URL::to('/')}}">{{Lang::get('ViewMessage.Home')}}</a><span>/</span></li>
					<li><a href="{{URL::to('/blogs')}}">{{Lang::get('ViewMessage.Blogs')}}</a><span>/</span></li>
					<li>{{$data->title}}</li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-----------------------------Dashboard---------------------->
	
	<div class="headding-24">
		<h2>{{$data->title}}</h2>
	</div>
	
	
	<div class="side-bar">
		 @include('frontend/blogs/side_bar')
	</div>
	
	
	<div class="right-section margin-buttom padding-16">
		<div class="image-blogs">
			{{GeneralHelper::showImage($data->image, '', '', '', $data->title, 'blogs', 'margin-bottom:20px;max-height:400px;')}}
		</div>
	
		<div class="blog-detail">
			{{$data->content}}
		</div>
		
		<div class="review-comments" id="update_comments">
			@include('frontend/blogs/add_comment')
		</div>
	</div>
</div>


<script type="text/javascript">
	function updateBlogs(){
		var total_comment = jQuery( "#total_comment" ).val();
		var blog_id = jQuery("#blog_id").val();
		
		jQuery.ajax({
			type: "POST",
			url: "{{ URL::to('/update-blog-comments') }}",
			data: "blog_id="+ blog_id +"&total_comment="+ total_comment,  
			dataType:"html", 
			success: function(data){ 
				if(data){
					jQuery( "#totalComments" ).html(data);
				}
			}
		});
	}
	setInterval( "updateBlogs()", 20000 );
	
	function submit_form(){
		var message = jQuery("#cmt_msg").val();
		var blog_id = jQuery("#blog_id").val();
		jQuery( ".show_error_msg" ).html( " " );
		
		if(message == "") {
			jQuery("#error_comment" ).html( '{{Lang::get("ValidationMessage.Comment_is_Required")}}' );
			
			var show_alert = '<div id="alert_msg" class="alert alert-danger show_error_msg"><button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button><span id="myData">{{Lang::get("ControllerMessage.comment_submiit_error_msg")}}</span></div>';
			jQuery( "#show_alert" ).html( show_alert );
			return false;
		}else{
			img = '<span class="loading123" style="position:relative;">{{ HTML::image("img/loading-spinner-grey.gif", "Please wait", array("style"=>"position:absolute; height:30px; margin-left:-32px; top:-2px;")) }}</span>';
			jQuery('#send_comment').append(img);
		
			jQuery.ajax({
				type: "POST",
				url: "{{ URL::to('/submit-blog-comment') }}",
				data: "message="+message+"&blog_id="+blog_id,  
				dataType:"html", 
				success: function(data){
					if(data) { 
						jQuery('#update_comments').html(data); 
					} else {
						var show_alert = '<div id="alert_msg" class="alert alert-danger show_error_msg"><button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button><span id="myData">{{Lang::get("ControllerMessage.comment_database_error_msg")}}</span></div>';
						jQuery( "#show_alert" ).html( show_alert );
					}
				},
				complete: function(){
					jQuery(".loading123").remove(); 
				}
			}) ; 
		}
	}


	function showTotalComments(blog_id){
		jQuery.ajax({
			type: "POST",
			url: "{{ URL::to('/view-total-comments') }}",
			data: "blog_id="+blog_id,  
			dataType:"html", 
			success: function(data){ 
				jQuery( "#totalComments" ).html(data);
			}
		}) ; 
	}
</script>
@stop									