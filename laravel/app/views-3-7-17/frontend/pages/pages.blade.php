@extends('frontend/layouts/default') 
@section('title')
{{$data->title}}
@stop

@section('content')

<div class="section breadcrumb-bar solid-blue-bg">
	<div class="inner">
		<div class="container">
			<p class="breadcrumb-menu">
				<a href="{{URL::to('/')}}"><i class="ion-ios-home"></i></a>
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a href="javascript:;">{{$data->title}}</a>
			</p>
			<!-- end .breabdcrumb-menu -->
			<h2 class="breadcrumb-title">{{$data->title}}</h2>
		</div>
		<!-- end .container -->
	</div>
	<!-- end .inner -->
</div> 

<div class="section blog-standard-section">
	<div class="inner">
		<div class="container">
			<p>
				{{$data->content}} 
			</p>
		</div> 
	</div> 
</div>

@stop									