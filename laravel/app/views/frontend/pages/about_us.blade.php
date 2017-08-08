@extends('frontend/layouts/default') 
@section('title')
About Us
@stop

@section('content')

	<!-- Page Title Section -->
	<div class="section page-title text-center" style="background-image: url('{{URL::to('img/background04.jpg')}}');">
		<div class="inner">
			<h1 class="light">About Us</h1>
			<h3 class="light">Nulla molestie sed lorem non suscipit.</h3>
		</div>
		<!-- end .inner -->
	</div>
	
		 
	<div class="section tabs-section about-page">
		
		<ul class="nav nav-tabs jobpress-dynamic-tabs flex space-center items-center no-column"><?php 
			$j=1; ?>
			@foreach($data as $value) <?php 
				if($value->slug=='company') {
					$menu_icon = 'ion-ios-glasses-outline';
				} else if($value->slug=='started'){
					$menu_icon = 'ion-ios-person-outline';
				} else {
					$menu_icon = 'ion-ios-cog-outline';
				} ?>
				<li class="{{($j==1)?'active':'' }}"><a class="outline-cls" data-toggle="tab" href="#{{$value->slug}}"><i class="{{$menu_icon}}"></i>{{$value->title}}</a></li><?php 
				$j++; ?>
			@endforeach
		</ul>
		 
		<div class="tab-content jobpress-dynamic-tabs-content"><?php 
			$j=1; ?>
			@foreach($data as $value)
				<div id="{{$value->slug}}" class="tab-pane company-tab-content text-center fade in {{($j==1)?'active':'' }}">
					{{$value->content}}
				</div><?php
				$j++; ?>
			@endforeach 
		</div> 
	</div> 

	<div class="section clients-section solid-blue-bg">
		<div class="inner">
			<div class="container">
				<div class="logo-grid">
					<div class="logo-grid-row flex space-between">
						<div class="logo-item solid-blue flex">
							{{HTML::image('img/client-logo-light01.png','client-company-logo',array('class'=>'img-responsive self-center'))}}
						</div>
						<!-- end .logo-item -->
						<div class="logo-item solid-blue flex">
							{{HTML::image('img/client-logo-light02.png','client-company-logo',array('class'=>'img-responsive self-center'))}}
						</div>
						<!-- end .logo-item -->
						<div class="logo-item solid-blue flex">
							{{HTML::image('img/client-logo-light03.png','client-company-logo',array('class'=>'img-responsive self-center'))}}
						</div>
						<!-- end .logo-item -->							
						<div class="logo-item solid-blue flex">
							{{HTML::image('img/client-logo-light04.png','client-company-logo',array('class'=>'img-responsive self-center'))}}
						</div>
						<!-- end .logo-item -->
						<div class="logo-item solid-blue flex">
							{{HTML::image('img/client-logo-light05.png','client-company-logo',array('class'=>'img-responsive self-center'))}}
						</div>
						<!-- end .logo-item -->							
						<div class="logo-item solid-blue flex">
							{{HTML::image('img/client-logo-light06.png','client-company-logo',array('class'=>'img-responsive self-center'))}}
						</div> 
					</div> 
				</div> 
			</div> 
		</div> 
	</div>  
@stop									