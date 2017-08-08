@extends('frontend/layouts/default')
@section('title')
Blogs
@stop

@section('content')


<div class="section breadcrumb-bar solid-blue-bg">
	<div class="inner">
		<div class="container">
			<p class="breadcrumb-menu">
				<a href="{{URL::to('/')}}"><i class="ion-ios-home"></i></a>
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a href="javascript:;">Blogs</a>
			</p>
			<!-- end .breabdcrumb-menu -->
			<h2 class="breadcrumb-title">Blogs</h2>
		</div>
		<!-- end .container -->
	</div>
	<!-- end .inner -->
</div>
<!-- end .section -->
<!-- Blog Section -->
<div class="section blog-standard-section">
	<div class="inner">
		<div class="container">
			<div class="blog-posts-wrapper flex space-between no-wrap">
				<div class="blog-left-side">
					
					@if(!$data->isEmpty())
						
						@foreach($data as $val) 
					
							<div class="blog-standard">
								{{GeneralHelper::showImage($val->image, 'img-responsive', '', '400px', $val->title, 'blogs/large')}}
								<div class="blog-standard-info flex no-column no-wrap">
									<div class="left-side">
										{{GeneralHelper::showUserImg($val->photo, 'img-responsive', 'auto', '', $val->first_name)}}
									</div> 
									<div class="right-side">
										<h2 class="dark">{{$val->title}}</h2>
										<div class="news-meta flex no-column">
											<h6><a href="javascript:;" class="news-author">{{$val->first_name.' '.$val->last_name}}</a></h6>
											<h6 style="color:#627199;" class="publish-date">{{date('d-m-Y', strtotime($val->created_at))}}</h6>
											<h6><a href="javascript:;" class="comment-count">{{$val->blog_count}} {{($val->blog_count)>1?'comments':'comment' }} </a></h6>
										</div> 
										<p>{{(strlen($val->content)>300)?strip_tags(substr($val->content, 0, 300))."....":""}}</p>
										<a href="{{URL::to('blog/'.$val->slug)}}"><button type="button" class="button">Read More</button></a>
									</div> 
								</div> 
							</div> 
							
						@endforeach	
						
					@else
						<div class="blog-standard">
							<div style="text-align: center;" class="right-description images-inst-con Webinar-listin">
								No records found
							</div>	
						</div>
					@endif	
					<div class="item-list" style="text-align: center;">
						{{ $data->links()}} 
					</div>
				</div>
				 
			
				<div class="blog-sidebar">
					@include('Elements/Blog/blog_left')
				</div>
				
				<!-- end .blog-sidebar -->
			</div>
			<!-- end .blog-posts-wrapper -->
		</div>
		<!-- end .container -->
	</div>
	<!-- end .inner -->
</div>



@stop									