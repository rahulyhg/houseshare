@extends('frontend/layouts/default')

@section('title')
Advertise on {{Session::get('SiteValue.site_name')}}
@stop

@section('content')

<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
				
				<div class="right-side-content">
					<div class="tab-content candidate-dashboard">
						
						<div class="col-sm-12"> 
							
							<div id="bookmarked-jobs" class="tab-pane fade in active">
								
								<h3 style="border: unset; padding: 0px;" class="tab-pane-title">Advertise on {{Session::get('SiteValue.site_name')}}</h3>
								<p style="padding: 9px 9px 9px 0px;">What do you want to advertise?</p>
								
								<div class="bookmarked-jobs-list-wrapper">
									
									<div class="bookmarked-job-wrapper">
										<div class="bookmarked-job flex no-wrap no-column">
											<div class="job-company-icon">
												{{HTML::image('img/room.jpg', '',array('class'=>'img-responsive'))}}
											</div>
											<div class="bookmarked-job-info">
												<h4 class="dark flex no-column">Rooms to Rent</h4>
												<p>Rent out one or more rooms in a property</p>
												<div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
													<div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap">
														<a href="{{URL::to('advertise/rooms-to-rent')}}" class="button">Select</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="bookmarked-job-wrapper">
										<div class="bookmarked-job flex no-wrap no-column">
										
											<div class="job-company-icon">
												{{HTML::image('img/property_to_let.jpg', '',array('class'=>'img-responsive'))}}
											</div>
											
											<div class="bookmarked-job-info">
												<h4 class="dark flex no-column">Whole Property to Let</h4>
												<p>Rent a self-contained property (with no existing flatmates) on a single contract. Includes studios and 1 bed flats</p>
												<div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
													<div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap">
														<a href="{{URL::to('advertise/whole-property-to-let')}}" class="button">Select</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="bookmarked-job-wrapper">
										<div class="bookmarked-job flex no-wrap no-column ">
											<div class="job-company-icon">
												{{HTML::image('img/wanted.jpg', '',array('class'=>'img-responsive'))}}
											</div>
											<div class="bookmarked-job-info">
												<h4 class="dark flex no-column">Room Wanted</h4>
												<p>Create a room wanted ad so people offering rooms can find out more about you and get in touch</p>
												<div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
													<div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap">
														<a href="{{URL::to('advertise/room-wanted')}}" class="button">Select</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="left-sidebar-menu">
					@include('Elements/Property/place_an_ad_left') 
				</div>
				
			</div>
		</div>
	</div>
</div>

<style>
	h6 {
	color: #627199;
	font-size: 9px;
	font-weight: 700;
	line-height: 14px;
	text-transform: uppercase;
	}	
</style>
@stop												