

<?php include("header.php");  ?>
<!-- Breadcrumb Bar -->
<div class="section breadcrumb-bar solid-blue-bg">
   <div class="inner">
      <div class="container">
         <p class="breadcrumb-menu">
            <a href="index.php"><i class="ion-ios-home"></i></a>
            <i class="ion-ios-arrow-right arrow-right"></i>
            <a href="listing.php">listing</a>
            <i class="ion-ios-arrow-right arrow-right"></i>
            <a href="#0">listing details</a>
         </p>
         <!-- end .breabdcrumb-menu -->
         <h2 class="breadcrumb-title">listing details</h2>
      </div>
      <!-- end .container -->
   </div>
   <!-- end .inner -->
</div>
<!-- end .section -->
<!-- Candidate Dashboard -->
<div class="section candidate-dashboard-content solid-light-grey-bg">
   <div class="inner">
      <div class="container">
         <div class="candidate-dashboard-wrapper flex space-between no-wrap">
            <div class="right-side-content">
               <div class="tab-content candidate-dashboard">
                  <div class="job-post-wrapper" style="padding:10px;">
                     <!-- bootstrap carousel -->
                     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                           <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                           <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                           <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                           <div class="item active srle">
                              <img src="images/1_big.jpg" alt="1.jpg" class="img-responsive">
                              <div class="carousel-caption">
                                 <p> 1.jpg </p>
                              </div>
                           </div>
                           <div class="item">
                              <img src="images/2_big.jpg" alt="2.jpg" class="img-responsive">
                              <div class="carousel-caption">
                                 <p> 2.jpg </p>
                              </div>
                           </div>
                           <div class="item">
                              <img src="images/3_big.jpg" alt="3.jpg" class="img-responsive">
                              <div class="carousel-caption">
                                 <p> 3.jpg </p>
                              </div>
                           </div>
                           <div class="item">
                              <img src="images/4_big.jpg" alt="4.jpg" class="img-responsive">
                              <div class="carousel-caption">
                                 <p> 4.jpg </p>
                              </div>
                           </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                        <!-- Thumbnails --> 
                        <ul class="thumbnails-carousel clearfix">
                           <li><img src="images/si.jpg" alt="1_tn.jpg"></li>
                           <li><img src="images/si.jpg" alt="1_tn.jpg"></li>
                           <li><img src="images/si.jpg" alt="1_tn.jpg"></li>
                           <li><img src="images/si.jpg" alt="1_tn.jpg"></li>
                        </ul>
                     </div>
                     <br><br>
                     <div class="job-post-top flex no-column no-wrap">
                        <div class="job-post-top-right">
                           <h4 class="dark">Front-end developer needed</h4>
                        </div>
                        <!-- end .right-side-inner -->
                     </div>
                     <!--Listing details -->
                     <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                        <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                     </ul>
                     <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                           <div class="job-post-bottom">
                              <h4 class="dark">Job Description</h4>
                              <p>Etiam quis interdum felis, at pellentesque metus. Morbi eget congue lectus. Donec eleifend ultricies urna et euismod. Sed consectetur tellus eget odio aliquet, vel vestibulum tellus sollicitudin. Morbi maximus metus eu eros tincidunt, vitae mollis ante imperdiet. Nulla imperdiet at mauris ut posuere.<br><br>Nullam tempor, ipsum eget egestas viverra, velit augue fringilla arcu, et sollicitudin enim eros nec est. Suspendisse volutpat velit non porttitor placerat. Mauris porttitor aliquam bibendum. Nam at ultrices justo. Mauris eget urna magna.</p>
                              <br>	
                              <h4 class="dark">Challenges &amp; Benifits</h4>
                              <p>Etiam quis interdum felis, at pellentesque metus. Morbi eget congue lectus. Donec eleifend ultricies urna et euismod. Sed consectetur tellus eget odio aliquet, vel vestibulum tellus sollicitudin. Morbi maximus metus eu eros tincidunt, vitae mollis ante imperdiet. Nulla imperdiet at mauris ut posuere.</p>
                              <br>
                              <ul class="job-post-nested-list list-unstyled">
                                 <li class="flex no-column no-wrap"><span><i class="ion-ios-checkmark"></i></span>Donec accumsan auctor iaculis. Nullam non tortor massa. Proin ligula leo, hendrerit quis tincidunt a, sodales eget ligula. Aenean et est tristique, dictum lorem vel, porttitor urna.</li>
                                 <li class="flex no-column no-wrap"><span><i class="ion-ios-checkmark"></i></span>Suspendisse gravida elementum lacus, a malesuada tortor sollicitudin ut. Donec pharetra metus lectus, ut eleifend eros sollicitudin et. Ut at lobortis dolor, eget commodo tortor. Curabitur bibendum consequat neque a tincidunt. In in euismod quam. Proin in egestas eros. Cum sociis natoque penatibus et magnis dis parturient montes.</li>
                                 <li class="flex no-column no-wrap"><span><i class="ion-ios-checkmark"></i></span>Etiam cursus metus arcu, ut pellentesque eros dictum vitae. Vivamus purus ex, dapibus ut eleifend in, hendrerit non nibh. Donec ornare molestie vehicula. Duis feugiat iaculis convallis.</li>
                              </ul>
                              <!-- end .job-post-nested-list -->
                              <br>
                              <h4 class="dark">Requirements</h4>
                              <p>Nunc nec porttitor turpis. In eu risus enim. In vitae mollis elit. Etiam a laoreet justo, laoreet blandit arcu. Vestibulum lacinia, lacus vitae dignissim tempor, mi tellus imperdiet dolor, quis consectetur tortor magna id enim.<br><br>Vestibulum ac vestibulum dui. Vivamus finibus vel mauris ut vehicula. Nullam a magna porttitor, dictum risus nec, faucibus sapien. Curabitur porttitor in est at viverra. Sed dictum felis lorem.</p>
                              <br>
                              <div class="divider"></div>
                           </div>
                           <!-- end .job-post-bottom -->
                        </div>
                        <div id="menu1" class="tab-pane fade">
                           <h3>Menu 1</h3>
                           <p>Etiam quis interdum felis, at pellentesque metus. Morbi eget congue lectus. Donec eleifend ultricies urna et euismod. Sed consectetur tellus eget odio aliquet, vel vestibulum tellus sollicitudin. Morbi maximus metus eu eros tincidunt, vitae mollis ante imperdiet. Nulla imperdiet at mauris ut posuere.<br><br>Nullam tempor, ipsum eget egestas viverra, velit augue fringilla arcu, et sollicitudin enim eros nec est. Suspendisse volutpat velit non porttitor placerat. Mauris porttitor aliquam bibendum. Nam at ultrices justo. Mauris eget urna magna.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                           <h3>Menu 2</h3>
                           <p>Etiam quis interdum felis, at pellentesque metus. Morbi eget congue lectus. Donec eleifend ultricies urna et euismod. Sed consectetur tellus eget odio aliquet, vel vestibulum tellus sollicitudin. Morbi maximus metus eu eros tincidunt, vitae mollis ante imperdiet. Nulla imperdiet at mauris ut posuere.<br><br>Nullam tempor, ipsum eget egestas viverra, velit augue fringilla arcu, et sollicitudin enim eros nec est. Suspendisse volutpat velit non porttitor placerat. Mauris porttitor aliquam bibendum. Nam at ultrices justo. Mauris eget urna magna.</p>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                           <h3>Menu 3</h3>
                           <p>Etiam quis interdum felis, at pellentesque metus. Morbi eget congue lectus. Donec eleifend ultricies urna et euismod. Sed consectetur tellus eget odio aliquet, vel vestibulum tellus sollicitudin. Morbi maximus metus eu eros tincidunt, vitae mollis ante imperdiet. Nulla imperdiet at mauris ut posuere.<br><br>Nullam tempor, ipsum eget egestas viverra, velit augue fringilla arcu, et sollicitudin enim eros nec est. Suspendisse volutpat velit non porttitor placerat. Mauris porttitor aliquam bibendum. Nam at ultrices justo. Mauris eget urna magna.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end .candidate-dashboard -->
            </div>
            <!-- end .right-side-content -->
            <div class="left-sidebar-menu">
               <div class="job-post-share-left flex items-center no-wrap">
                  <ul class="social-share flex no-wrap no-column list-unstyled" style="margin-left:10px;">
                     <li><a href="#0" class="button button-sm facebook-btn"><span><i class="ion-social-facebook"></i></span>Facebook</a></li>
                     <li><a href="#0" class="button button-sm twitter-btn"><span><i class="ion-social-twitter"></i></span>Twitter</a></li>
                  </ul>
                  <!-- end .social-share -->
               </div>
               <!-- end .job-post-share-left -->
               <div class="right-side-inner" style="padding:10px;">
                  <div id="map" class="map on-job-details-page"></div>
                  <div class="job-post-company-info">
                     <h5 class="dark">Banana inc.</h5>
                     <ul class="list-unstyled">
                        <li class="flex no-column no-wrap"><i class="ion-ios-location"></i>56/23 Park Ave, Manhattan NYC 10001, USA</li>
                        <li class="flex no-column no-wrap"><i class="ion-ios-telephone"></i><a href="tel:(+01)-212-342-6789">(+01)-212-342-6789</a></li>
                        <li class="flex no-column no-wrap"><i class="ion-email"></i><a href="mailto:hr@banana.inc">hr@demo.com</a></li>
                        <li class="flex no-column no-wrap"><i class="ion-earth"></i><a href="#0">www.demo.com</a></li>
                     </ul>
                  </div>
                  <!-- end .job-post-company-info -->
                  <div class="system-login text-center">
                     <button type="submit" class="button">Contact the advertiser</button>
                  </div>
                  <!-- end .system-login -->
               </div>
               <!-- end .right-side-inner -->
               </ul>
            </div>
         </div>
         <!-- end .candidate-dashboard-wrapper -->
      </div>
      <!-- end .container -->
   </div>
   <!-- end .inner -->
</div>
<!-- end .section -->
<?php include("footer.php");  ?>		
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
</style>
<script>
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

