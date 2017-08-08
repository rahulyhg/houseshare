@extends('frontend/layouts/default')

@section('title')
Advertise your {{Session::get('SiteValue.site_name')}}
@stop

@section('content')

	<div class="section job-post-form-section solid-light-grey-bg">
	
		<div class="inner">
		
			<div class="container">
				
				<div class="job-post-form multisteps-form">

					<fieldset>
						<h2 class="form-title text-center dark">Place an ad</h2>
						<h3 class="step-title text-center dark">You've successfully posted a job</h3>
						 
						<div class="form-inner">
							<h2 class="text-center job-post-success">Congratulations!</h2>
							<p class="text-center">Thank you, your ad has been placed and the ref no. is {{$data->order_number}}</p>
							<p class="text-center">
								You’ve successfully posted a new job. Let’s see who you’re gonna hire. Whenever you want to edit your job, please go to your 
								<a href="{{URL::to('/my-account')}}">Dashboard</a>>
								<a href="{{URL::to('/my-ads')}}">My ads</a>
								Thank you for using our job board!
							</p>
							<div class="button-wrapper text-center">
								<a href="{{URL::to('/my-ads')}}"><button type="button" class="button">View My ads</button></a>
							</div>
						</div>
					</fieldset>  
				
				</div>
			</div>
		</div>
	</div>  

@stop																																				