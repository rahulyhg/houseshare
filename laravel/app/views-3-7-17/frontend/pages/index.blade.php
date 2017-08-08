@extends('frontend/layouts/default')
@section('title')
	Home
@stop

@section('content') 


<div class="section hero-section transparent" style="background-image: url('{{URL::to('img/background01.jpg')}}');">
   <div class="inner">
      <div class="container">
         <div class="job-search-form">
            <h2>Find your perfect flatshare</h2>
           {{ Form::model(null,array('url' => array('/listing'), 'class'=>'form-inline flex', 'method' => 'PUT')) }}
               <div class="form-group">
                  <div class="select-style">
					{{ Form::select('ad_type',Config::get('constants.ADVERTISE_TYPE_SEARCH'), null, array('class' => 'form-control parsley-validated'))}}
                  </div>
               </div>
               <div class="form-group">
                  <div class="search">
                     <span class="fa fa-map-marker" style="margin-top:18px;"></span>
					 {{ Form::text('keyword', null, array('placeholder'=>'Search by locality or title, postcode...', 'style'=>'width:98%; float:right;border: medium none; height: 50px;', 'class' => 'form-control')) }}
                  </div>
               </div>
               <button type="submit" class="button"><i class="ion-ios-search-strong"></i>&nbsp;&nbsp;<span class="se">Search</span></button>
            {{ Form::close() }}
         </div>
         <!-- end .job-search-form -->	
      </div>
      <!-- end .container -->
   </div>
   <!-- end .inner -->
</div>
<!-- end .section -->
<section id="about_style_2">
   <div>
      <div class="row">
         <div class="col-md-6 col-sm-12" style="background:#f2f2f2; padding:40px;">
            <div class="text-center">
               <h4 style="color:#000;">Need a room?</h4>
               <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                  Lorem ipsum dolor sit amet,
               </p>
               <div class="section-cta"><button type="submit" class="button  btn_blue" style=" background:#00a651; border:none;">Place a free advert</button></div>
            </div>
         </div>
         <div class="col-md-6 col-sm-12" style="background:#009587; padding:40px;">
            <div class="text-center">
               <h4 style="color:#fff;">Need a room?</h4>
               <p style="color:#fff;">Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                  Lorem ipsum dolor sit amet,
               </p>
               <div class="section-cta"><button type="submit" class="button  btn_blue" style=" background:#fff; border:none; color:
                  #000;">Place a free advert</button></div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Featured Jobs Section -->
<div class="section featured-jobs-section">
   <div class="inner">
      <div class="container">
         <div>
            <h2 class="text-center" style="color:#000; font-weight: normal;">Why use  Housesharemarket</h2>
            <br><br>
            <div class="col-md-4 col-sm-4 col-lg-4 ">
               <div class="about-info">
					{{HTML::image('img/meet.png', '',array('class'=>'img_s'))}}  
                  <h3>We're the busiest</h3>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                     Lorem ipsum dolor sit amet,
                  </p>
                  <button type="button" class="btn btn-default" id="meet">Meetup Group</button>
               </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
               <div class="about-info">
				{{HTML::image('img/slack.png', '',array('class'=>'img_s'))}}  
                  <h3>We're safe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                     Lorem ipsum dolor sit amet,
                  </p>
                  <button type="button" class="btn btn-default" id="meet">Slack Group</button>
               </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
               <div class="about-info">
				{{HTML::image('img/share.png', '',array('class'=>'img_s'))}}  
                  <h3>We're all about people</h3>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                     Lorem ipsum dolor sit amet,
                  </p>
                  <button type="button" class="btn btn-default" id="meet">Google Group</button>
               </div>
            </div>
         </div>
         <!-- row end  -->
      </div>
   </div>
   <!-- end .inner -->
</div>
<!-- end .section -->
<!-- CTA App Section -->
<div class="section cta-app-section solid-blue-bg" style="background-image: url('{{URL::to('img/subscribe_bg.jpg')}}');>
   <div class="inner">
   <div class="container">
      <div class="main_title mt_wave mt_white a_center">
         <h2>Download Our Latest App</h2>
      </div>
      <p class="main_description md_white a_center">
         Lorem ipsum dolor sit amet, consectetuer adipiscing elit,<br> sed diam nonummy nibh euismod tincidunt ut laoreet.
      </p>
      <center> <a href="#">
		
			{{HTML::image('img/app.png', '',array('class'=>''))}}  
	  
		
			
			</a>
         <a href="#">
			 {{HTML::image('img/google.png', '',array('class'=>''))}}  
			 
			 </a>
      </center>
      <br><br>
   </div>
</div>

	 
@stop							