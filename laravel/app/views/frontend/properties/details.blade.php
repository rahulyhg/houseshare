@extends('frontend/layouts/default')

@section('title')
Housesharemarket
@stop

@section('content')

<div class="section breadcrumb-bar solid-blue-bg">
	<div class="inner" style="background-image: url('http://192.168.100.5/laravel/housesharemarket/img/background_details.jpg');">
		<div class="container">
			<p class="breadcrumb-menu">
			<a class="outline-cls" href="{{URL::to('/')}}"><i class="ion-ios-home"></i></a>
				
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a href="{{URL::to('listing')}}">Listing</a>
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a href="javascript:;">Details</a>
			</p>
			<h2 class="breadcrumb-title">Details</h2>
		</div> 
	</div> 
</div>


<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
		
		 
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
				<div class="right-side-content">
					<div class="tab-content candidate-dashboard">
						<div class="job-post-wrapper" style="padding:10px;"><?php
							
							$get_images = GeneralHelper::getAdImageByAdId($data->id,false);
							
							if(!empty($get_images)) { ?>
							
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
								
								<ol class="carousel-indicators"><?php
									$j=0;
									foreach($get_images as $get_image_val) {  ?>
										<li data-target="#carousel-example-generic" data-slide-to="{{$j}}" class="{{($j==0)?'active':''}}"></li><?php
										$j++;
									} ?> 
								</ol>
								
								<div class="carousel-inner"><?php
									$k=1;
									foreach($get_images as $get_image_val) { ?>
									<div class="item{{($k==1)?' active srle':''}}"> 
									
										@if($get_image_val->img_type==1)
											{{ GeneralHelper::showAdImage($get_image_val->image,'img-responsive','100%','300px;',$get_image_val->image,'ads/large') }}
										@else
											<?php $path = "upload/ads/".$get_image_val->image; ?>
											@if($get_image_val->image != '' and file_exists($path)) 
											
												<video width="850" height="293" id="video" controls='controls'>
													<source src="../{{$path}}" type="video/mp4"/>
													<source src="../{{$path}}" type="video/webm"/>
													<source src="../{{$path}}" type="video/ogg"/>
												</video>
											 
											@else 
												{{ GeneralHelper::showAdImage($get_image_val->image,'img-responsive','100%','300px;',$get_image_val->image,'ads/large') }}
											@endif
										@endif
										
										
									
										<?php /*{{ GeneralHelper::showAdImage($get_image_val->image,'img-responsive','100%','300px;',$get_image_val->image,'ads/large') }}*/ ?>
										<div class="carousel-caption"> 
										</div>
										</div><?php
										$k++;
									}   ?>
								</div>
								
								<!-- Controls -->
								<?php /*
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span style="position: absolute; top: 37%;" class="ion-arrow-left-a"></span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span style="position: absolute; top: 37%;" class="ion-arrow-right-a"></span>
								</a> */ ?>
								
								
								<!-- Thumbnails --> 
								<ul class="thumbnails-carousel clearfix"><?php 
									foreach($get_images as $get_image_val) { ?>
									<li>
										{{ GeneralHelper::showAdImage($get_image_val->image,'img-responsive','60px','50px',$get_image_val->image,'ads/large') }}
										</li><?php
									} ?>
								</ul>
								
								
								
								
							</div>
							<br><br><?php 
							} ?>
							
							
							<div class="job-post-top flex no-column no-wrap">
								<div class="job-post-top-right">
									<h4 class="dark">{{$data->title}} <small>(Ad ref# {{$data->order_number}})</small></h4>
								</div> 
							</div>
							 
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
								<li><a data-toggle="tab" href="#menu1">Availability</a></li>
								<li><a data-toggle="tab" href="#menu2">Extra Costs</a></li>
								<li style="z-index: 99999;"><a data-toggle="tab" href="#menu3">Amenities</a></li>
								@if($data->ad_type!=3)
									<li style="z-index: 99999;"><a data-toggle="tab" href="#menu4">New Flatmate Preferences</a></li>
								@else
									<li style="z-index: 99999;"><a data-toggle="tab" href="#menu5">About Me</a></li>
								@endif
							</ul>
							
							<div class="tab-content"> 
								
								<div id="home" class="tab-pane fade in active">		
								
									
									@if($data->ad_type!=3)
										<h3>Room Cost</h3>
									@else
										<h3>Total budget</h3>
									@endif
									
									<?php
									
									if($data->ad_type==1) {
									
										$room_pro_data = GeneralHelper::getProperyRoomByPropertyId($data->id);
										if(!empty($room_pro_data)) {
											foreach($room_pro_data as $room_pro_val) {
												$amenities_ids = ($room_pro_val->amenities_ids)?explode(',',$room_pro_val->amenities_ids):array();
												$amenities_room_get = GeneralHelper::getAmenitiesRoomData($amenities_ids); 
												$amenities_room_get_new = implode(', ',$amenities_room_get);
												if($room_pro_val->is_available==1) { ?>
													<div class="col-sm-12">
														<div class="col-sm-12">
															<p>
																£{{number_format($room_pro_val->room_cost,2)}}&nbsp;
																{{Config::get('constants.ROOM_COST_TYPE.'.$room_pro_val->room_cost_type)}}&nbsp;
																<small>
																	({{Config::get('constants.ROOM_SIZE_TYPE.'.$room_pro_val->room_size).'&nbsp;'.$amenities_room_get_new }})
																</small>
															</p>
														</div>
													</div><?php
												} else { ?>
													<div class="col-sm-12">
														
														<div class="col-sm-12">
															<p style="text-decoration: line-through;">
																£{{number_format($room_pro_val->room_cost,2)}}&nbsp;
																{{Config::get('constants.ROOM_COST_TYPE.'.$room_pro_val->room_cost_type)}}&nbsp;
																<small>
																	({{Config::get('constants.ROOM_SIZE_TYPE.'.$room_pro_val->room_size).'&nbsp;'.$amenities_room_get_new }})
																</small>
															</p>
														</div>
														
													</div><?php
												} 
											}
										}
									} elseif($data->ad_type==2 || $data->ad_type==3) { ?>
										<div class="col-sm-12">
											<div class="col-sm-12">
												<p>
													£{{number_format($data->rent_amt,2)}}&nbsp;
													{{Config::get('constants.ROOM_COST_TYPE.'.$data->rent_amt_type)}}&nbsp;
												</p>
											</div>
										</div><?php
									} ?> 
									
									
									<div class="col-sm-12">&nbsp;</div>
									
									
									<h3>Ad Description</h3>
									
									@if($data->ad_type==3)
									<div class="col-sm-12">
										<b>
											{{$data->first_name.' '.$data->last_name}},
											{{ (Config::get('constants.OCCUPATION_TYPE.'.$data->is_occupation))?Config::get('constants.OCCUPATION_TYPE.'.$data->is_occupation):''}},
											{{ (Config::get('constants.LOOKING_FOR.'.$data->looking_for))?Config::get('constants.LOOKING_FOR.'.$data->looking_for):''}}  wanted
										</b>
									</div> 
									@endif
									
									<div class="col-sm-12">
										<p>{{$data->description}}</p>
									</div> 
									
									<div class="col-sm-12">&nbsp;</div>
								</div>
								
								<div id="menu1" class="tab-pane fade">								
									<h3>Availability</h3>
									
									<div class="col-sm-12">
										<div class="col-sm-2"><p>Available:</p></div>
										<div class="col-sm-6"><p>{{ date('d F Y',strtotime($data->available_from))}}</p></div>
									</div>
									
									<div class="col-sm-12">
										<div class="col-sm-2"><p>Minimum stay:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.MINIMUM_STAY.'.$data->minimum_stay_type))?Config::get('constants.MINIMUM_STAY.'.$data->minimum_stay_type):'---'}}</p></div>
									</div>
									<div class="col-sm-12">
										<div class="col-sm-2"><p>Maximum term:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.MINIMUM_STAY.'.$data->maximum_stay_type))?Config::get('constants.MINIMUM_STAY.'.$data->maximum_stay_type):'---'}}</p></div>
									</div>
									
									@if($data->ad_type==1 || $data->ad_type==3)
										<div class="col-sm-12">
											<div class="col-sm-2"><p>Room available:</p></div>
											<div class="col-sm-6"><p>{{ (Config::get('constants.DAYS_AVAILABLE.'.$data->days_available_type))?Config::get('constants.DAYS_AVAILABLE.'.$data->days_available_type):'---'}}</p></div>
										</div>
									@endif
									
									<div class="col-sm-12">&nbsp;</div>
								</div>
								
								<div id="menu2" class="tab-pane fade">								
									<h3>Extra Costs</h3>
									
									@if($data->ad_type==1)
									
										<?php 
										
										$room_pro_data = GeneralHelper::getProperyRoomByPropertyId($data->id);
										$get_security_deposit = '0.00';
										$get_is_available = '';
										if(!empty($room_pro_data)) {
											$j=1;
											foreach($room_pro_data as $room_pro_val) {
												$get_security_deposit = 0;
												if($room_pro_val->is_available==1) { ?>
													<div class="col-sm-12">
														<div class="col-sm-2"><p>Deposit:</p></div>
														<div class="col-sm-6"><p>£{{$room_pro_val->security_deposit}}</p></div>
													</div>
													<div class="col-sm-12">
														<div class="col-sm-2"><p>(Room {{$j}})</p></div>
													</div><?php $j++;
												} ?>
												<?php
											}
										} ?>
										@if($get_is_available==1)
											<div class="col-sm-12">
												<div class="col-sm-2"><p>Deposit:</p></div>
												<div class="col-sm-6"><p>£{{$get_security_deposit}}</p></div>
											</div>
										@endif
										
										<div class="col-sm-12">
											<div class="col-sm-2"><p>Bills included?:</p></div>
											<div class="col-sm-6"><p>{{ (Config::get('constants.BILLS_INCLUDED.'.$data->is_bills_included))?Config::get('constants.BILLS_INCLUDED.'.$data->is_bills_included):'---'}}</p></div>
										</div> 
									@endif
									
									
									@if($data->ad_type==2)
										
											<div class="col-sm-12">
												<div class="col-sm-2"><p>Security deposit :</p></div>
												<div class="col-sm-6"><p>£{{number_format($data->security_deposit,2)}}</p></div>
											</div>
											
											<div class="col-sm-12">
												<div class="col-sm-2"><p>Fees apply? :</p></div>
												<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_fees_apply))?Config::get('constants.YES_NO.'.$data->is_fees_apply):'---'}}</p></div>
											</div>
									
									@endif							
									
									@if($data->ad_type==3)
									 
											<div class="col-sm-12">
												<div class="col-sm-2"><p>Fees apply? :</p></div>
												<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_fees_apply))?Config::get('constants.YES_NO.'.$data->is_fees_apply):'---'}}</p></div>
											</div>
									
									@endif
									
									
									
									
									<div class="col-sm-12">&nbsp;</div>
								</div> 
								
								<div id="menu3" class="tab-pane fade">								
									<h3>Amenities</h3>
									
									@if($data->ad_type==1) <?php 
										
										$amenities_data = GeneralHelper::getAmenitiesData(); 
										$property_amenities_data = GeneralHelper::getAmenitiesByPropertyId($data->id); 
										
										if(!empty($amenities_data)) {
											foreach($amenities_data as $amenities_val) { 
												$yes_no = 'No';
												if(in_array($amenities_val->id,$property_amenities_data)) {
													$yes_no = 'Yes';
												} ?>
												<div class="col-sm-12">
													<div class="col-sm-3"><p>{{$amenities_val->name}}:</p></div>
													<div class="col-sm-6"><p>{{$yes_no}}</p></div>
												</div><?php
											}
										} ?>
										
										<div class="col-sm-12">
											<div class="col-sm-3"><p>Living Room:</p></div>
											<div class="col-sm-6"><p>{{ (Config::get('constants.LIVING_ROOM.'.$data->living_room_type))?Config::get('constants.LIVING_ROOM.'.$data->living_room_type):'---'}}</p></div>
										</div>
										<div class="col-sm-12">
											<div class="col-sm-3"><p>Broadband Included?:</p></div>
											<div class="col-sm-6"><p>{{ (Config::get('constants.REFERENCES_REQUIRED.'.$data->is_broadband_included))?Config::get('constants.REFERENCES_REQUIRED.'.$data->is_broadband_included):'---'}}</p></div>
										</div> 
									
									@endif
									
									@if($data->ad_type==2)
										
										<div class="col-sm-12">
											<div class="col-sm-3"><p>Furnishings:</p></div>
											<div class="col-sm-6"><p>{{ (Config::get('constants.FURNISHED_TYPE.'.$data->is_furnishings))?Config::get('constants.FURNISHED_TYPE.'.$data->is_furnishings):'---'}}</p></div>
										</div><?php
										
										$amenities_data = GeneralHelper::getAmenitiesData(); 
										$property_amenities_data = GeneralHelper::getAmenitiesByPropertyId($data->id); 
										
										if(!empty($amenities_data)) {
											foreach($amenities_data as $amenities_val) { 
												$yes_no = 'No';
												if(in_array($amenities_val->id,$property_amenities_data)) {
													$yes_no = 'Yes';
												} ?>
												<div class="col-sm-12">
													<div class="col-sm-3"><p>{{$amenities_val->name}}:</p></div>
													<div class="col-sm-6"><p>{{$yes_no}}</p></div>
												</div><?php
											}
										}  ?>
										
									
									@endif
									
									@if($data->ad_type==3) <?php
										
										$amenities_data = GeneralHelper::getAmenitiesData(); 
										$property_amenities_data = GeneralHelper::getAmenitiesByPropertyId($data->id); 
										
										if(!empty($amenities_data)) {
											foreach($amenities_data as $amenities_val) { 
												$yes_no = 'No';
												if(in_array($amenities_val->id,$property_amenities_data)) {
													$yes_no = 'Yes'; ?>
													<div class="col-sm-12">
														<div class="col-sm-3"><p>{{$amenities_val->name}}:</p></div>
														<div class="col-sm-6"><p>{{$yes_no}}</p></div>
													</div><?php
												} 
											}
										}  ?>
										
									
									@endif
									
									<div class="col-sm-12">&nbsp;</div>
								</div>
								
								<div id="menu4" class="tab-pane fade">								
									<h3>New Flatmate Preferences</h3>
									
									@if($data->ad_type==1)
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Couples Welcome?:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_couples_welcome))?Config::get('constants.YES_NO.'.$data->is_couples_welcome):'---'}}</p></div>
									</div>
									@endif
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Smoking:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_smoking))?Config::get('constants.YES_NO.'.$data->is_smoking):'---'}}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Pets:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_pets))?Config::get('constants.YES_NO.'.$data->is_pets):'---'}}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Occupation:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.OCCUPATION_TYPE.'.$data->is_occupation))?Config::get('constants.OCCUPATION_TYPE.'.$data->is_occupation):'---'}}</p></div>
									</div>  
									<div class="col-sm-12"><?php 
										$misc_arr = ($data->misc)?explode(',',$data->misc):array();
										$yes_no_misc = 'No';
										if(in_array(1,$misc_arr)) {
											$yes_no_misc = 'Yes';
										}  ?>
										<div class="col-sm-3"><p>DSS:</p></div>
										<div class="col-sm-6"><p>{{$yes_no_misc}}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>References:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.REFERENCES_REQUIRED.'.$data->is_references_required))?Config::get('constants.REFERENCES_REQUIRED.'.$data->is_references_required):'---'}}</p></div>
									</div> 
									@if($data->ad_type==1)
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Min Age:</p></div>
										<div class="col-sm-6"><p>{{ $data->minimum_age }}</p></div>
									</div> 
								 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Gender:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.GENDER.'.$data->is_gender))?Config::get('constants.GENDER.'.$data->is_gender):'---'}}</p></div>
									</div>   
									<div class="col-sm-12"><?php 
										$misc_arr = ($data->misc)?explode(',',$data->misc):array();
										$yes_no_vegetarian = 'No';
										if(in_array(2,$misc_arr)) {
											$yes_no_vegetarian = 'Yes';
										}  ?>
										<div class="col-sm-3"><p>Vegetarian:</p></div>
										<div class="col-sm-6"><p>{{$yes_no_misc}}</p></div>
									</div> 
									@endif
									
									<div class="col-sm-12">&nbsp;</div>
								</div>
								
								<div id="menu5" class="tab-pane fade">								
									<h3>About Me</h3> 
							 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Age:</p></div>
										<div class="col-sm-6"><p>{{ ($data->minimum_age)?$data->minimum_age:'---' }}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Smoker?:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_smoking))?Config::get('constants.YES_NO.'.$data->is_smoking):'---'}}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Any pets?:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.YES_NO.'.$data->is_pets))?Config::get('constants.YES_NO.'.$data->is_pets):'---'}}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Language:</p></div>
										<div class="col-sm-6"><p>{{ ($data->language_name)?$data->language_name:'---' }}</p></div>
									</div>
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Nationality:</p></div>
										<div class="col-sm-6"><p>{{ ($data->country_name)?$data->country_name:'---' }}</p></div>
									</div>  
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Occupation:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.OCCUPATION_TYPE.'.$data->is_occupation))?Config::get('constants.OCCUPATION_TYPE.'.$data->is_occupation):'---'}}</p></div>
									</div>  
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Interests:</p></div>
										<div class="col-sm-6"><p>{{ ($data->your_interests)?$data->your_interests:'---' }}</p></div>
									</div> 
									<div class="col-sm-12">
										<div class="col-sm-3"><p>Gender:</p></div>
										<div class="col-sm-6"><p>{{ (Config::get('constants.GENDER.'.$data->is_gender))?Config::get('constants.GENDER.'.$data->is_gender):'---'}}</p></div>
									</div>   
									
									<div class="col-sm-12">&nbsp;</div>
								</div>
								
								
								  
							</div>
						</div>
					</div>
					<!-- end .candidate-dashboard -->
				</div>
				 
				
				<div class="left-sidebar-menu">
					
					<div class="job-post-share-left flex items-center no-wrap">
						<ul class="social-share flex no-wrap no-column list-unstyled" style="margin-left:10px;">
							<li>
								<a onclick="ShareFunction('http://www.facebook.com/share.php?title={{$data->title}}&u={{URL::to('/details/'.$data->id)}}',{{$data->id}});" href="javascript:;" class="button button-sm facebook-btn"><span><i class="ion-social-facebook"></i></span>Facebook</a>
							</li>
							<li>
								<a onclick="ShareFunction('https://twitter.com/share?url={{URL::to('/details/'.$data->id)}}&name=Simple Share Buttons&hashtags={{$data->title}}',{{$data->id}})" href="javascript:;" class="button button-sm twitter-btn"><span><i class="ion-social-twitter"></i></span>Twitter</a>
							</li>
						</ul>
					</div>
					
					<!-- end .job-post-share-left --><?php
					
					$get_lat_long = GeneralHelper::get_lat_long($data->area); 
					$latitude  = isset($get_lat_long['latitude'])?$get_lat_long['latitude']:'';
					$longitude = isset($get_lat_long['longitude'])?$get_lat_long['longitude']:''; ?>
					
					
					<div class="right-side-inner" style="padding:10px;">
						
						<div style="cursor: pointer;" id="map" class="map on-job-details-page"></div>
					 
						<div class="job-post-company-info">
							<h5 class="dark">{{$data->first_name.' '.$data->last_name}}</h5>
							<ul class="list-unstyled">
								<li class="flex no-column no-wrap"><i class="ion-ios-location"></i>{{$data->area}}</li>
								<li class="flex no-column no-wrap"><i class="ion-ios-telephone"></i><a href="tel:{{$data->telephone}}">{{$data->telephone}}</a></li>
								@if($data->ad_type==3)
									<li class="flex no-column no-wrap"><i class="ion-email"></i><a href="mailto:{{$data->email}}">{{$data->user_email}}</a></li>
								@else
									<li class="flex no-column no-wrap"><i class="ion-email"></i><a href="mailto:{{$data->email}}">{{$data->email}}</a></li>
							
								@endif
							@if($data->facebook)
								<li class="flex no-column no-wrap"><i class="fa fa-facebook"></i><a href="{{$data->facebook}} "target="_blank">{{$data->facebook}}</a></li>
								@endif
								@if($data->linkedin)
								<li class="flex no-column no-wrap"><i class="fa fa-linkedin"></i><a href="{{$data->linkedin}} "target="_blank">{{$data->linkedin}}</a></li>
								@endif
								@if($data->google_plus)
								<li class="flex no-column no-wrap"><i class="fa fa-google-plus"></i><a href="{{$data->google_plus }} "target="_blank">{{$data->google_plus }}</a></li>
								@endif
								@if($data->twitter)
								<li class="flex no-column no-wrap"><i class="fa fa-twitter"></i><a href="{{$data->twitter}} "target="_blank">{{$data->twitter}}</a></li>
							      @endif
							</ul>
						</div>
						
						<div class="system-login text-center">
							<a href="{{URL::to('email-advertiser/'.$data->id)}}"><button type="submit" class="button">Contact the advertiser</button></a>
						</div>
					</div>
					
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
	#carousel-example-generic {
	display: inline-block;
	}
	/*****************************/
	/* Plugin styles */
	ul.thumbnails-carousel {
	padding: 5px 0 0 0;
	margin: 0;
	list-style-type: none;
	text-align: center;
	}
	ul.thumbnails-carousel .center {
	display: inline-block;
	}
	ul.thumbnails-carousel li {
	margin-right: 5px;
	float: left;
	cursor: pointer;
	}
	.controls-background-reset {
	background: none !important;
	}
	.active-thumbnail {
	opacity: 0.4;
	}
	.indicators-fix {
	bottom: 70px;
	}
	
	.left-sidebar-menu {
    flex: 0 1 24%;

}
.right-side-content {
 
    flex: 0 1 74%;

    width: 100%;
}
</style>

<script>
	function initMap() {
		var uluru = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 8,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
		});
	}
</script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo Session::get('SiteValue.google_api_kay'); ?>&callback=initMap"></script>

<script>
	
	function ShareFunction(url,id) { 
		mywindow=window.open(url,"mywindow","status=1,resizable=0,width=550,height=500");
		mywindow.moveTo(0, 0);
	} 
	
	function myMap() {
		var mapOptions = {
			//center: new google.maps.LatLng({{$latitude}}, {{$longitude}}),
			center: new google.maps.LatLng(51.5, -0.12),
			zoom: 10,
			mapTypeId: google.maps.MapTypeId.HYBRID
		}
		var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	} 
	
	
	// thumbnails.carousel.js jQuery plugin
	;(function(window, $, undefined) {
		
		var conf = {
			center: true,
			backgroundControl: false
		};
		
		var cache = {
			$carouselContainer: $('.thumbnails-carousel').parent(),
			$thumbnailsLi: $('.thumbnails-carousel li'),
			$controls: $('.thumbnails-carousel').parent().find('.carousel-control')
		};
		
		function init() {
			cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
			cache.$thumbnailsLi.first().addClass('active-thumbnail');
			
			if(!conf.backgroundControl) {
				cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
			}
			else {
				cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
			}
			
			if(conf.center) {
				cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
			}
		}
		
		function refreshOpacities(domEl) {
			cache.$thumbnailsLi.removeClass('active-thumbnail');
			cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
		}	
		
		function bindUiActions() {
			cache.$carouselContainer.on('slide.bs.carousel', function(e) {
     			refreshOpacities(e.relatedTarget);
			});
			
			cache.$thumbnailsLi.click(function(){
				cache.$carouselContainer.carousel($(this).index());
			});
		}
		
		$.fn.thumbnailsCarousel = function(options) {
			conf = $.extend(conf, options);
			
			init();
			bindUiActions();
			
			return this;
		}
		
	})(window, jQuery);
	
	$('.thumbnails-carousel').thumbnailsCarousel();
	
</script>

@stop