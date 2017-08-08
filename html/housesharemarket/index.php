

<?php include("header.php");  ?>
<!-- Hero Section -->
<div class="section hero-section transparent" style="background-image: url('images/background01.jpg');">
   <div class="inner">
      <div class="container">
         <div class="job-search-form">
            <h2>Find your perfect flatshare</h2>
            <form class="form-inline flex">
               <div class="form-group">
                  <div class="select-style">
                     <select name="day" class="form-control parsley-validated" parsley-required="true">
                        <option value="Rent">Rent</option>
                        <option value="Property type">Rooms for rent</option>
                        <option value="Property type">Rooms wanted</option>
                        <option value="Property type">Buddy ups</option>
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <div class="search">
                     <span class="fa fa-map-marker" style="margin-top:18px;"></span>
                     <input name="" id="email" value="" class="form-control" placeholder="Search by locality or landmark.." style="width:98%; float:right;border: medium none; height: 50px;" type="text">
                  </div>
               </div>
               <button type="submit" class="button"><i class="ion-ios-search-strong"></i>&nbsp;&nbsp;<span class="se">Search</span></button>
            </form>
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
                  <img src="images/meet.png" class="img_s">
                  <h3>We're the busiest</h3>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                     Lorem ipsum dolor sit amet,
                  </p>
                  <button type="button" class="btn btn-default" id="meet">Meetup Group</button>
               </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
               <div class="about-info">
                  <img src="images/slack.png" class="img_s">
                  <h3>We're safe</h3>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br>
                     Lorem ipsum dolor sit amet,
                  </p>
                  <button type="button" class="btn btn-default" id="meet">Slack Group</button>
               </div>
            </div>
            <div class="col-md-4 col-sm-4 col-lg-4">
               <div class="about-info">
                  <img src="images/share.png" class="img_s">
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
<div class="section cta-app-section solid-blue-bg" style="background-image: url('images/subscribe_bg.jpg');>
   <div class="inner">
   <div class="container">
      <div class="main_title mt_wave mt_white a_center">
         <h2>Download Our Latest App</h2>
      </div>
      <p class="main_description md_white a_center">
         Lorem ipsum dolor sit amet, consectetuer adipiscing elit,<br> sed diam nonummy nibh euismod tincidunt ut laoreet.
      </p>
      <center> <a href="#"><img src="images/app.png" alt=""></a>
         <a href="#"><img src="images/google.png" alt=""></a>
      </center>
      <br><br>
   </div>
</div>
<!-- end .inner -->
</div> <!-- end .section -->
<?php include("footer.php");  ?>
<script>	
   function DropDown(el) {
   this.dd = el;
   this.placeholder = this.dd.children('span');
   this.opts = this.dd.find('.dropdown a');
   this.val = '';
   this.index = -1;
   this.initEvents();
   }
   DropDown.prototype = {
   initEvents : function() {
   var obj = this;
   
   obj.dd.on('click', function(event){
   $(this).toggleClass('active');
   return false;
   });
   
   obj.opts.on('click',function(){
   var opt = $(this);
   obj.val = opt.text();
   obj.index = opt.index();
   obj.placeholder.text(obj.val);
   });
   },
   getValue : function() {
   return this.val;
   },
   getIndex : function() {
   return this.index;
   }
   }
   
   $(function() {
   
   var dd = new DropDown( $('#dd') );
   
   
   
   });
   
</script> 