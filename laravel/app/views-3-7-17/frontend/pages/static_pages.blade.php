@extends('frontend/layouts/default')
<?php   //$lang = Session::get('lang')?Session::get('lang'):'en'; 
	//$title  = 'title_'.$lang;
	//$content = 'content_'.$lang;; ?>
@section('title')
	{{$data->title}}
@stop

@section('content')
	<div class="container">
		<div  class="breadcrumb space-for">
			<ul>
				<li><a href="{{URL::to('/')}}">{{Lang::get('ViewMessage.Home')}}</a><span>/</span></li>
				<li>{{$data->title}}</li>
			</ul>
		</div>
		<div class="headding-24">
			<h2>{{$data->title}}</h2>
		</div>
		<div class="static_page_content">
			{{$data->content}}
		</div>
		
	</div>
@stop									