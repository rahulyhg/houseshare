@extends('frontend/layouts/default')

@section('title')
Housesharemarket
@stop

@section('content')

<div class="section breadcrumb-bar solid-blue-bg">
	<div class="inner">
		<div class="container">
			<p class="breadcrumb-menu">
				<a href="index.php"><i class="ion-ios-home"></i></a>
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a href="{{URL::to('listing')}}">Listing</a>
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a href="javascript:;">Email advertiser</a>
			</p>
			<h2 class="breadcrumb-title">Email advertiser</h2>
		</div> 
	</div> 
</div>


<div class="section contact-us-section">
	<div class="inner">
		<div class="container">
			<div class="contact-us-section-inner  space-between no-wrap">
				
				<div class="col-sm-12">
					<h3>&nbsp;{{$data->title}}</h3>
				</div>
				
				<div class="col-sm-12">
					<h3><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Contact the advertiser of this flatshare by email</h3>
				</div>
				
				<div class="col-sm-2">&nbsp;</div>
				<div class="col-sm-6">
					{{ Form::open(array('url'=>url('/email-advertiser/'.Route::input('id')),'id'=>'contact-form', 'class'=>'contact-form')) }}
						
						<div class="form-group-wrapper flex space-between items-center">
							<div class="form-group">
								<label>To:</label>
								<label>{{$data->user_first_name.' '.$data->user_last_name}}</label>
							</div>
							<div class="form-group">
								<label>Subject:</label>
								<label>Re: {{$data->title}}</label>
							</div> 
						</div>
						 
						<div class="form-group textarea">
							<label class="">Message<span class="red">*</span></label>
							{{ Form::textarea('message', null, array('rows' => 3, 'class'=>"", 'placeholder'=>'Message...'))}} 
							<span class="red">{{ $errors->first('message')}}</span>
						</div>
						
						@if(Auth::check())
							<div class="form-group-wrapper flex space-between items-center">
								<div class="form-group">
									<label>From:</label>
									<label>{{ Auth::user()->first_name.' '.Auth::user()->last_name.'&nbsp;('. Auth::user()->email.')'}}</label>
								</div>
							</div>
							<button type="submit" class="button" data-text="Submit">Send</button>
						@else
							<a href="javascript:;" data-toggle="modal" data-target="#myModal" class="button" id="login">Log In</a>
						@endif
						 
						 
					{{Form::close()}} 
				</div>
				<div class="col-sm-4">&nbsp;</div>
				 
				
				 
			</div> 
		</div> 
	</div> 
</div> 

  
@stop