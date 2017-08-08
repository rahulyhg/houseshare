

<?php include("header.php");  ?>
<div class="section breadcrumb-bar solid-blue-bg">
   <div class="inner">
      <div class="container">
         <p class="breadcrumb-menu">
            <a href="index.php"><i class="ion-ios-home"></i></a>
            <i class="ion-ios-arrow-right arrow-right"></i>
            <a href="#0">Contact Us</a>
         </p>
         <!-- end .breabdcrumb-menu -->
         <h2 class="breadcrumb-title">Contact Us Page</h2>
      </div>
      <!-- end .container -->
   </div>
   <!-- end .inner -->
</div>
<!-- Contact-Us Section -->
<div class="section contact-us-section">
   <div class="inner">
      <div class="container">
         <div class="contact-us-section-inner flex space-between no-wrap">
            <div class="left">
               <h1>Contact Us</h1>
               <p class="ultra-light">
               <p><b>ADDRESS</b><br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,Lorem ipsum dolor sit amet, consectetuer adipiscing elit,Lorem ipsum dolor sit amet, consectetuer adipiscing elit,</p>
               <p><b>EMAIL:</b><br>demo@gmail.com</p>
               </p>
               <div class="follow-us flex no-column items-center">
                  <h6 style="color:#000;">Follow us via:</h6>
                  <ul class="list-unstyled social-icons flex no-column">
                     <li><a href="#0"><i class="ion-social-twitter"></i></a></li>
                     <li><a href="#0"><i class="ion-social-facebook"></i></a></li>
                  </ul>
                  <!-- end .social-icons -->
               </div>
               <!-- end .follow-us -->
            </div>
            <!-- end .left -->
            <div class="right">
               <form action="#" method="post" id="contact-form" class="contact-form">
                  <div class="form-group-wrapper flex space-between items-center">
                     <div class="form-group">
                        <p class="label">Your Name*</p>
                        <input type="text" id="contact-name" name="contact-name" placeholder="Enter your name" required="">
                     </div>
                     <!-- end .form-group -->
                     <div class="form-group">
                        <p class="label">Your Email*</p>
                        <input type="email" id="contact-email" name="contact-email" placeholder="Enter your email" required="">
                     </div>
                     <!-- end .form-group -->
                  </div>
                  <!-- end .form-group-wrapper -->
                  <div class="form-group textarea">
                     <p class="label">Your Message*</p>
                     <textarea name="contact-message" id="contact-message" required="" rows="6" placeholder="Here goes your message"></textarea>
                  </div>
                  <!-- end .form-group -->
                  <button type="submit" class="button" data-text="Submit">Send us</button>
                  <div id="contact-loading" class="alert alert-info form-alert">
                     <span class="message">Loading...</span>
                  </div>
                  <div id="contact-success" class="alert alert-success form-alert">
                     <span class="message">Success!</span>
                  </div>
                  <div id="contact-error" class="alert alert-danger form-alert">
                     <span class="message">Error!</span>
                  </div>
               </form>
               <!-- end .contact-form -->
            </div>
            <!-- end .right -->
         </div>
         <!-- end .contact-us-section-inner -->
      </div>
      <!-- end .container -->
   </div>
   <!-- end .inner -->
</div>
<!-- end .section -->
<?php include("footer.php");  ?>

