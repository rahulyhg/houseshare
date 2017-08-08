<div class="section footer transparent" style="background-image: url('{{URL::to('img/background03.jpg')}}');">
   <div class="container">
      <div class="footer-widgets flex no-column space-between">
         <div class="widget">
			<a href="{{URL::to('/')}}">{{HTML::image('img/footer.png', 'footer-logo',array('class'=>'img-responsive'))}} </a> 
            <br>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
            <ul class="list-unstyled social-icons flex no-column">
               <li><a target="_blank" href="https://twitter.com"><i class="ion-social-twitter"></i></a></li>
               <li><a target="_blank" href="https://www.facebook.com/"><i class="ion-social-facebook"></i></a></li>
               <li><a target="_blank" href="https://www.youtube.com/"><i class="ion-social-youtube"></i></a></li>
               <li><a target="_blank" href="https://www.instagram.com/"><i class="ion-social-instagram"></i></a></li>
               <li><a target="_blank" href="https://www.linkedin.com/"><i class="ion-social-linkedin"></i></a></li>
            </ul>
         </div>
         <!-- end .widget -->
         <div class="widget">
            <h6>USEFUL LINKS</h6>
            <ul class="list-unstyled">
               <li><a href="{{URL::to('about-us')}}">About Us</a></li>
               <li><a href="{{URL::to('contact-us')}}">Contact Us</a></li>
               <li><a href="{{ URL::to('blogs') }}">Blog</a></li>
               <li><a href="{{URL::to('faqs')}}">Faq's</a></li>
            </ul>
         </div>
         <!-- end .widget -->
         <div class="widget">
            <h6>CONTACT US</h6>
            <ul class="list-unstyled">
               <li><i class="fa fa-map-marker" aria-hidden="true" style="color:#919191;"></i> Lorem ipsum dolor sit amet, consectetuer</li>
               <li><i class="fa fa-phone" aria-hidden="true" style="color:#919191;"></i> 1321321321 </li>
               <li><i class="fa fa-envelope-o" aria-hidden="true"style="color:#919191;"></i> demo@gmail.com </li>
               <li><i class="fa fa-fax" aria-hidden="true"style="color:#919191;"></i> 113221321321</li>
            </ul>
         </div>
         <!-- end .widget -->
      </div>
      <!-- end .footer-widgets -->
      <div class="bottom flex space-between items-center">
         <p class="copyright-text small">&copy; 2017 <a href="{{URL::to('/')}}">{{Session::get('SiteValue.site_name')}}</a>. All Rights Reserved.</p>
         <ul class="list-unstyled copyright-menu flex no-column">
            <li><a href="{{ URL::to('pages/privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ URL::to('pages/terms-of-service') }}">Terms of Service</a></li>
            <li><a href="{{ URL::to('pages/conditions') }}">Conditions</a></li>
         </ul>
         <!-- end .copyright-menu -->
      </div>
      <!-- end .bottom -->
   </div>
   <!-- end .container -->
</div>