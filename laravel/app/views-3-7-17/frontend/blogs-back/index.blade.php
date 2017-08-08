@extends('frontend/layouts/default')
@section('title')
{{Lang::get('ViewMessage.Blogs')}}
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<div  class="breadcrumb space-for floting-bru">
				<ul>
					<li><a href="{{URL::to('/')}}">{{Lang::get('ViewMessage.Home')}}</a><span>/</span></li>
					<li>{{ Lang::get('ViewMessage.Blogs')}}</li>
				</ul>
			</div>
		</div>
	</div>
	
	<!-----------------------------Dashboard---------------------->
	
	<div class="headding-24">
		<h2>{{ Lang::get('ViewMessage.Blogs')}}</h2>
	</div>
	
	
	<div class="side-bar">
	    @include('frontend/blogs/side_bar')
	</div>
	
	
	 <div class="right-section margin-buttom padding-16">
		@if(! $data->isEmpty())
			@foreach($data as $val)
				<div class="drop-saddow-class margion-none">
					<div class="images-inst-con size-pr">
						<div class="right-class">
							<div class="images-blogs">
								{{GeneralHelper::showImage($val->image, 'img-responsive', '', '', $val->title, 'blogs')}}
							</div>
						</div>
					</div>

					<div class="right-description images-inst-con">
						<div class="headding-20">
							<h3 class="margionl-none inline-time">{{$val->title}}</h3>		  
						</div>
					
					
						<div class="discripation">
							<p>{{(strlen($val->content)>200)?strip_tags(substr($val->content, 0, 200), '<p>')."....":""}}</p>	
						</div>
					
						<div class="div-time-romen">
							<h3><i class="fa fa-clock-o font-ckock" aria-hidden="true"></i>
							<span>{{date('M d, Y', strtotime($val->created_at))}}</span></h3>
						</div>
					
					
						<div class="Read more">
							<div class="button">
								<a href="{{URL::to('blog/'.$val->slug)}}">
									<button class="btn btn-success chang-button-style small-bu courses-bu" type="button">{{Lang::get('ViewMessage.Read_more')}}</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<div class="drop-saddow-class margion-none Webinar">
				<div class="right-description images-inst-con Webinar-listin">
					{{Lang::get('ViewMessage.No_records_found')}}
				</div>	
			</div>
		@endif
		
		<div class="row">
			<div class="col-md-12 full-pagging">
				{{ $data->links()}}
			</div>
		</div>
	</div>
</div>
@stop									