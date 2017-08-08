

<?php include("header.php");  ?>
<!-- Post Job Section -->
<div class="section job-post-form-section solid-light-grey-bg">
   <div class="inner">
      <div class="container">
         <!-- multistep form -->
         <form action="#" method="post" id="job-post-form" class="job-post-form multisteps-form">
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               Step 1</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li><span>1</span></li>
                  <li><span>2</span></li>
                  <li><span>3</span></li>
                  <li><span>4</span></li>
                  <li><span>5</span></li>
                  <li><span>6</span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <div class="pricing-plan-field-wrapper">
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           Get started with your free advert 
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> I have</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="1" selected="">1 room for rent</option>
                                    <option value="2">2 rooms for rent</option>
                                    <option value="3">3 rooms for rent</option>
                                    <option value="4">4 rooms for rent</option>
                                    <option value="5">5 rooms for rent</option>
                                    <option value="6">6 rooms for rent</option>
                                    <option value="7">7 rooms for rent</option>
                                    <option value="8">8 rooms for rent</option>
                                    <option value="9">9 rooms for rent</option>
                                    <option value="10">10 rooms for rent</option>
                                    <option value="11">11 rooms for rent</option>
                                    <option value="12">12 rooms for rent</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Size & type of property </label>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <select name="Motivo" class="form-control">
                                          <option value="2">2 bed</option>
                                          <option value="3">3 bed</option>
                                          <option value="4">4 bed</option>
                                          <option value="5" selected="">5 bed</option>
                                          <option value="6">6 bed</option>
                                          <option value="7">7 bed</option>
                                          <option value="8">8 bed</option>
                                          <option value="9">9 bed</option>
                                          <option value="10">10 bed</option>
                                          <option value="11">11 bed</option>
                                          <option value="12">12 bed</option>
                                       </select>
                                    </div>
                                    <div class="col-md-6">
                                       <select name="Motivo" class="form-control">
                                          <option value="Flat">Flat/Apartment</option>
                                          <option selected="">House</option>
                                          <option>Property</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">There are already</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected="">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">(e.g. SE15 8PD) </label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio3" value="option1" type="radio">
                              <label for="radio3">
                              Live in landlord <small>(I own the property and live there)</small>
                              </label>
                           </div>
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio4" value="option2" checked="" type="radio">
                              <label for="radio4">
                              Live out landlord <small>(I own the property but don't live there)</small>
                              </label>
                           </div>
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio5" value="option2" checked="" type="radio">
                              <label for="radio5">
                              Current tenant/flatmate <small>(I am living in the property)</small>
                              </label>
                           </div>
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio6" value="option2" checked="" type="radio">
                              <label for="radio6">
                              Agent <small>(I am advertising on a landlord's behalf)</small>
                              </label>
                           </div>
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio7" value="option2" checked="" type="radio">
                              <label for="radio7">
                              Former flatmate <small>(I am moving out and need someone to replace me)</small>
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">My email is</label>
                           <input class="form-control" id="Correo" name="Correo" placeholder="Email" required="" type="email">
                        </div>
                     </div>
                  </div>
                  <!-- end .pricing-plan-field-wrapper -->
                  <div class="button-wrapper text-center">
                     <button type="button" class="button next">Continue to next step </button>
                  </div>
                  <!-- end .button-wrapper -->			    		
               </div>
               <!-- end .form-inner -->							
            </fieldset>
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               Step 2</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="sub-active"><span>2</span></li>
                  <li><span>3</span></li>
                  <li><span>4</span></li>
                  <li><span>5</span></li>
                  <li><span>6</span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <div class="form-fields-wrapper">
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           More about the property
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Area</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="28230">Docklands
                                    </option>
                                    <option value="28216">East Greenwich
                                    </option>
                                    <option value="22321">Greenwich
                                    </option>
                                    <option value="22323">London SE10
                                    </option>
                                    <option value="28217">North Greenwich
                                    </option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Street name  </label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Postcode</label>
                                 <div>SE10 8PD </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Transport</label>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="0">0</option>
                                          <option value="" selected="">Select...</option>
                                          <option value="5">0-5</option>
                                          <option value="10">5-10</option>
                                          <option value="15">10-15</option>
                                          <option value="20">15-20</option>
                                          <option value="25">20-25</option>
                                          <option value="30">25+</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="" selected="">Select...</option>
                                          <option value="walk">walk</option>
                                          <option value="by car">by car</option>
                                          <option value="by bus">by bus</option>
                                          <option value="by tram">by tram</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="" selected="">Select...</option>
                                          <option value="DEPTFORDBRIDGE">Deptford Bridge</option>
                                          <option value="GREENWICHBR">Greenwich</option>
                                          <option value="ELVERSONROAD">Elverson Road</option>
                                          <option value="STJOHNS">St. Johns</option>
                                          <option value="DEPTFORD">Deptford</option>
                                          <option value="LEWISHAM">Lewisham</option>
                                          <option value="CUTTYSARK">Cutty Sark</option>
                                          <option value="NEWCROSS">New Cross</option>
                                          <option value="NEWCROSSGATE">New Cross Gate</option>
                                          <option value="">------------</option>
                                          <option value="MAZEHILL">Maze Hill</option>
                                          <option value="WESTCOMBEPARK">Westcombe Park</option>
                                          <option value="NORTHGREENWICH">North Greenwich
                                          </option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Living Room? </label>
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio9" value="option1" type="radio">
                              <label for="radio9">
                              Yes, there is a shared living room
                              </label>
                           </div>
                           <div class="radio radio-danger">
                              <input name="radio2" id="radio10" value="option2" checked="" type="radio">
                              <label for="radio10">
                              No 
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Amenities</label><br>
                           <div class="checkbox checkbox-inline">
                              <input id="checkbox3" type="checkbox">
                              <label for="checkbox3">
                              Parking
                              </label>
                           </div>
                           <div class="checkbox checkbox-inline">
                              <input id="checkbox4" type="checkbox">
                              <label for="checkbox4">
                              Balcony/patio 
                              </label>
                           </div>
                           <div class="checkbox checkbox-inline">
                              <input id="checkbox5" type="checkbox">
                              <label for="checkbox5">
                              Garden/roof terrace
                              </label>
                           </div>
                           <div class="checkbox checkbox-inline">
                              <input id="checkbox6" type="checkbox">
                              <label for="checkbox6">
                              Disabled access 
                              </label>
                           </div>
                           <div class="checkbox checkbox-inline">
                              <input id="checkbox7" type="checkbox">
                              <label for="checkbox7">
                              Garage
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end .form-field-wrapper -->
                  <div class="button-wrapper text-center">
                     <button type="button" class="button previous">Back</button>
                     <button type="button" class="button next">Continue to next step </button>
                  </div>
                  <!-- end .button-wrapper -->			    		
               </div>
               <!-- end .form-inner -->							
            </fieldset>
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               Step 3</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="sub-active"><span>3</span></li>
                  <li><span>4</span></li>
                  <li><span>5</span></li>
                  <li><span>6</span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <div class="form-fields-wrapper">
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           The rooms
                        </div>
                        Room1
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Cost of room</label>
                           <div class="row">
                              <div class="col-md-4">
                                 <input class="form-control" id="usr" type="number">
                              </div>
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio1" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio1"> per week</label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio2" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio2"> per calendar month  </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Size of room </label>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio1" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio1"> Single </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio2" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio2"> Double </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Living Room? </label>
                           <div class="checkbox">
                              <input id="checkbox1" type="checkbox">
                              <label for="checkbox1">
                              En suite <small>(tick if room has own toilet and/or bath/shower)</small>
                              </label>
                           </div>
                           <div class="checkbox">
                              <input id="checkbox2" type="checkbox">
                              <label for="checkbox2">
                              Furnished
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Security deposit</label>
                           <input class="form-control" id="usr" type="number">
                        </div>
                        Room2
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Cost of room</label>
                           <div class="row">
                              <div class="col-md-4">
                                 <input class="form-control" id="usr" type="number">
                              </div>
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio1" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio1"> per week</label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio2" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio2"> per calendar month  </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Size of room </label>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio1" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio1"> Single </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio2" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio2"> Double </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Living Room? </label>
                           <div class="checkbox">
                              <input id="checkbox1" type="checkbox">
                              <label for="checkbox1">
                              En suite <small>(tick if room has own toilet and/or bath/shower)</small>
                              </label>
                           </div>
                           <div class="checkbox">
                              <input id="checkbox2" type="checkbox">
                              <label for="checkbox2">
                              Furnished
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Security deposit</label>
                           <input class="form-control" id="usr" type="number">
                        </div>
                        Room3
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Cost of room</label>
                           <div class="row">
                              <div class="col-md-4">
                                 <input class="form-control" id="usr" type="number">
                              </div>
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio1" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio1"> per week</label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio2" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio2"> per calendar month  </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Size of room </label>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio1" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio1"> Single </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio2" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio2"> Double </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Living Room? </label>
                           <div class="checkbox">
                              <input id="checkbox1" type="checkbox">
                              <label for="checkbox1">
                              En suite <small>(tick if room has own toilet and/or bath/shower)</small>
                              </label>
                           </div>
                           <div class="checkbox">
                              <input id="checkbox2" type="checkbox">
                              <label for="checkbox2">
                              Furnished
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Security deposit</label>
                           <input class="form-control" id="usr" type="number">
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Available from </label>
                           <div class="row">
                              <div class="col-md-4">
                                 <select name="Motivo" class="form-control">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21" selected="">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <select name="Motivo" class="form-control">
                                    <option value="01">Jan</option>
                                    <option value="02">Feb</option>
                                    <option value="03">Mar</option>
                                    <option value="04" selected="">Apr</option>
                                    <option value="05">May</option>
                                    <option value="06">Jun</option>
                                    <option value="07">Jul</option>
                                    <option value="08">Aug</option>
                                    <option value="09">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <select name="Motivo" class="form-control">
                                    <option value="2016">2016</option>
                                    <option value="2017" selected="">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Minimum stay </label>
                           <select name="Motivo" class="form-control">
                              <option value="0">No minimum</option>
                              <option value="1">1 Month</option>
                              <option value="2">2 Months</option>
                              <option value="3">3 Months</option>
                              <option value="4">4 Months</option>
                              <option value="5">5 Months</option>
                              <option value="6">6 Months</option>
                              <option value="7">7 Months</option>
                              <option value="8">8 Months</option>
                              <option value="9">9 Months</option>
                              <option value="10">10 Months</option>
                              <option value="11">11 Months</option>
                              <option value="12">1 Year</option>
                              <option value="15">1 Year 3 Months</option>
                              <option value="18">1 Year 6 Months</option>
                              <option value="21">1 Year 9 Months</option>
                              <option value="24">2 Years</option>
                              <option value="36">3 Years</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Maximum stay </label>
                           <select name="Motivo" class="form-control">
                              <option value="0">No maximum</option>
                              <option value="1">1 Month</option>
                              <option value="2">2 Months</option>
                              <option value="3">3 Months</option>
                              <option value="4">4 Months</option>
                              <option value="5">5 Months</option>
                              <option value="6">6 Months</option>
                              <option value="7">7 Months</option>
                              <option value="8">8 Months</option>
                              <option value="9">9 Months</option>
                              <option value="10">10 Months</option>
                              <option value="11">11 Months</option>
                              <option value="12">1 Year</option>
                              <option value="15">1 Year 3 Months</option>
                              <option value="18">1 Year 6 Months</option>
                              <option value="21">1 Year 9 Months</option>
                              <option value="24">2 Years</option>
                              <option value="36">3 Years</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Short Term Lets Considered? <br><small>(i.e. 1 week to 3 months) </small></label>
                           <div class="checkbox checkbox-inline">
                              <input id="checkbox8" type="checkbox">
                              <label for="checkbox8">
                              Tick for Yes<br><small>(You may wish to specify rent differences in the description further down) </small> 
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Days available  </label>
                           <select name="Motivo" class="form-control">
                              <option value="7 days a week" selected="">7 days a week</option>
                              <option value="Mon to Fri only">Mon to Fri only</option>
                              <option value="Weekends only">Weekends only</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> References required? </label>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio3" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio3"> Yes </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio4" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio4"> No </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Bills included  </label>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio5" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio5"> Yes </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio6" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio6"> No </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio7" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio7"> Some </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Broadband included?  </label>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio8" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio8"> Yes </label>
                                 </div>
                                 <div class="radio radio-info radio-inline">
                                    <input id="inlineRadio9" value="option1" name="radioInline" checked="" type="radio">
                                    <label for="inlineRadio9"> No </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end .form-fields-wrapper -->
                  <div class="button-wrapper text-center">
                     <button type="button" class="button previous">Back</button>
                     <button type="button" class="button next">Continue to next step </button>
                  </div>
                  <!-- end .button-wrapper -->			    		
               </div>
               <!-- end .form-inner -->							
            </fieldset>
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               Step 4</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="sub-active"><span>4</span></li>
                  <li><span>5</span></li>
                  <li><span>6</span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <div class="form-fields-wrapper">
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           The Existing Flatmates
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Smoking</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="28230">Yes
                                    </option>
                                    <option value="28216">No
                                    </option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Gender</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="NULL">Select...</option>
                                    <option value="FF" selected="">2 Females</option>
                                    <option value="FM">1 Female, 1 Male</option>
                                    <option value="MM">2 Males</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Occupation</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="ND" selected="">Not disclosed</option>
                                    <option value="S">Student</option>
                                    <option value="P">Professional</option>
                                    <option value="O">Other</option>
                                    <option value="M">Mixed</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Pets</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="28230">Yes
                                    </option>
                                    <option value="28216">No
                                    </option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Ages</label>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="null" selected="">-</option>
                                          <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                          <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>
                                          <option value="32">32</option>
                                          <option value="33">33</option>
                                          <option value="34">34</option>
                                          <option value="35">35</option>
                                          <option value="36">36</option>
                                          <option value="37">37</option>
                                          <option value="38">38</option>
                                          <option value="39">39</option>
                                          <option value="40">40</option>
                                          <option value="41">41</option>
                                          <option value="42">42</option>
                                          <option value="43">43</option>
                                          <option value="44">44</option>
                                          <option value="45">45</option>
                                          <option value="46">46</option>
                                          <option value="47">47</option>
                                          <option value="48">48</option>
                                          <option value="49">49</option>
                                          <option value="50">50</option>
                                          <option value="51">51</option>
                                          <option value="52">52</option>
                                          <option value="53">53</option>
                                          <option value="54">54</option>
                                          <option value="55">55</option>
                                          <option value="56">56</option>
                                          <option value="57">57</option>
                                          <option value="58">58</option>
                                          <option value="59">59</option>
                                          <option value="60">60</option>
                                          <option value="61">61</option>
                                          <option value="62">62</option>
                                          <option value="63">63</option>
                                          <option value="64">64</option>
                                          <option value="65">65</option>
                                          <option value="66">66</option>
                                          <option value="67">67</option>
                                          <option value="68">68</option>
                                          <option value="69">69</option>
                                          <option value="70">70</option>
                                          <option value="71">71</option>
                                          <option value="72">72</option>
                                          <option value="73">73</option>
                                          <option value="74">74</option>
                                          <option value="75">75</option>
                                          <option value="76">76</option>
                                          <option value="77">77</option>
                                          <option value="78">78</option>
                                          <option value="79">79</option>
                                          <option value="80">80</option>
                                          <option value="81">81</option>
                                          <option value="82">82</option>
                                          <option value="83">83</option>
                                          <option value="84">84</option>
                                          <option value="85">85</option>
                                          <option value="86">86</option>
                                          <option value="87">87</option>
                                          <option value="88">88</option>
                                          <option value="89">89</option>
                                          <option value="90">90</option>
                                          <option value="91">91</option>
                                          <option value="92">92</option>
                                          <option value="93">93</option>
                                          <option value="94">94</option>
                                          <option value="95">95</option>
                                          <option value="96">96</option>
                                          <option value="97">97</option>
                                          <option value="98">98</option>
                                          <option value="99">99</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="null" selected="">-</option>
                                          <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                          <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>
                                          <option value="32">32</option>
                                          <option value="33">33</option>
                                          <option value="34">34</option>
                                          <option value="35">35</option>
                                          <option value="36">36</option>
                                          <option value="37">37</option>
                                          <option value="38">38</option>
                                          <option value="39">39</option>
                                          <option value="40">40</option>
                                          <option value="41">41</option>
                                          <option value="42">42</option>
                                          <option value="43">43</option>
                                          <option value="44">44</option>
                                          <option value="45">45</option>
                                          <option value="46">46</option>
                                          <option value="47">47</option>
                                          <option value="48">48</option>
                                          <option value="49">49</option>
                                          <option value="50">50</option>
                                          <option value="51">51</option>
                                          <option value="52">52</option>
                                          <option value="53">53</option>
                                          <option value="54">54</option>
                                          <option value="55">55</option>
                                          <option value="56">56</option>
                                          <option value="57">57</option>
                                          <option value="58">58</option>
                                          <option value="59">59</option>
                                          <option value="60">60</option>
                                          <option value="61">61</option>
                                          <option value="62">62</option>
                                          <option value="63">63</option>
                                          <option value="64">64</option>
                                          <option value="65">65</option>
                                          <option value="66">66</option>
                                          <option value="67">67</option>
                                          <option value="68">68</option>
                                          <option value="69">69</option>
                                          <option value="70">70</option>
                                          <option value="71">71</option>
                                          <option value="72">72</option>
                                          <option value="73">73</option>
                                          <option value="74">74</option>
                                          <option value="75">75</option>
                                          <option value="76">76</option>
                                          <option value="77">77</option>
                                          <option value="78">78</option>
                                          <option value="79">79</option>
                                          <option value="80">80</option>
                                          <option value="81">81</option>
                                          <option value="82">82</option>
                                          <option value="83">83</option>
                                          <option value="84">84</option>
                                          <option value="85">85</option>
                                          <option value="86">86</option>
                                          <option value="87">87</option>
                                          <option value="88">88</option>
                                          <option value="89">89</option>
                                          <option value="90">90</option>
                                          <option value="91">91</option>
                                          <option value="92">92</option>
                                          <option value="93">93</option>
                                          <option value="94">94</option>
                                          <option value="95">95</option>
                                          <option value="96">96</option>
                                          <option value="97">97</option>
                                          <option value="98">98</option>
                                          <option value="99">99</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Language  </label>
                                 <select name="Motivo" class="form-control">
                                    <option value="26" selected="">English</option>
                                    <option value="27">Mixed</option>
                                    <option value="4">Arabic</option>
                                    <option value="11">Bengali</option>
                                    <option value="17">Cantonese</option>
                                    <option value="37">French</option>
                                    <option value="39">German</option>
                                    <option value="44">Hindi</option>
                                    <option value="48">Indonesian</option>
                                    <option value="50">Japanese</option>
                                    <option value="62">Malay</option>
                                    <option value="63">Mandarin</option>
                                    <option value="73">Portuguese</option>
                                    <option value="74">Punjabi</option>
                                    <option value="79">Russian</option>
                                    <option value="88">Spanish</option>
                                    <option value="1">Afrikaans</option>
                                    <option value="2">Albanian</option>
                                    <option value="3">Amharic</option>
                                    <option value="5">Armenian</option>
                                    <option value="6">Aymara</option>
                                    <option value="7">Baluchi</option>
                                    <option value="8">Bambara</option>
                                    <option value="9">Basque</option>
                                    <option value="10">Belarussian</option>
                                    <option value="12">Berber</option>
                                    <option value="13">Bislama</option>
                                    <option value="14">Bosnian</option>
                                    <option value="15">Bulgarian</option>
                                    <option value="16">Burmese</option>
                                    <option value="18">Catalan</option>
                                    <option value="19">Ciluba</option>
                                    <option value="20">Creole</option>
                                    <option value="21">Croatian</option>
                                    <option value="22">Czech</option>
                                    <option value="23">Danish</option>
                                    <option value="24">Dari</option>
                                    <option value="25">Dutch</option>
                                    <option value="28">Eskimo</option>
                                    <option value="29">Estonian</option>
                                    <option value="30">Ewe</option>
                                    <option value="31">Fang</option>
                                    <option value="32">Faroese</option>
                                    <option value="33">Farsi (Persian)</option>
                                    <option value="34">Filipino</option>
                                    <option value="35">Finnish</option>
                                    <option value="36">Flemish</option>
                                    <option value="38">Galician</option>
                                    <option value="40">Greek</option>
                                    <option value="41">Gujarati</option>
                                    <option value="42">Hausa</option>
                                    <option value="43">Hebrew</option>
                                    <option value="45">Hungarian</option>
                                    <option value="46">Ibo</option>
                                    <option value="47">Icelandic</option>
                                    <option value="49">Italian</option>
                                    <option value="51">Kabié</option>
                                    <option value="52">Kashmiri</option>
                                    <option value="53">Kirundi</option>
                                    <option value="54">Kiswahili</option>
                                    <option value="55">Korean</option>
                                    <option value="56">Latvian</option>
                                    <option value="57">Lingala</option>
                                    <option value="58">Lithuanian</option>
                                    <option value="59">Luxembourgish</option>
                                    <option value="60">Macedonian</option>
                                    <option value="61">Malagasy</option>
                                    <option value="64">Mayan</option>
                                    <option value="65">Motu</option>
                                    <option value="66">Nepali</option>
                                    <option value="67">Norwegian</option>
                                    <option value="68">Noub</option>
                                    <option value="69">Pashto</option>
                                    <option value="70">Peul</option>
                                    <option value="71">Pidgin</option>
                                    <option value="72">Polish</option>
                                    <option value="75">Pushtu</option>
                                    <option value="76">Quechua</option>
                                    <option value="77">Romanian</option>
                                    <option value="78">Romansch</option>
                                    <option value="80">Sango</option>
                                    <option value="81">Serbian</option>
                                    <option value="82">Setswana</option>
                                    <option value="83">Sindhi</option>
                                    <option value="84">Sinhala</option>
                                    <option value="85">Slovak</option>
                                    <option value="86">Slovene</option>
                                    <option value="87">Somali</option>
                                    <option value="89">Swahili</option>
                                    <option value="90">Swedish</option>
                                    <option value="91">Tamil</option>
                                    <option value="92">Thai</option>
                                    <option value="93">Turkish</option>
                                    <option value="94">Urdu</option>
                                    <option value="95">Vietnamese</option>
                                    <option value="99">Welsh</option>
                                    <option value="96">Xhosa</option>
                                    <option value="97">Yoruba</option>
                                    <option value="98">Zulu</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Language  </label>
                           <select name="Motivo" class="form-control">
                              <option value="" selected="">Not disclosed</option>
                              <option>Afghan</option>
                              <option>Albanian</option>
                              <option>Algerian</option>
                              <option>American</option>
                              <option>Andorran</option>
                              <option>Angolan</option>
                              <option>Antiguans</option>
                              <option>Argentinean</option>
                              <option>Armenian</option>
                              <option>Australian</option>
                              <option>Austrian</option>
                              <option>Azerbaijani</option>
                              <option>Bahamian</option>
                              <option>Bahraini</option>
                              <option>Bangladeshi</option>
                              <option>Barbadian</option>
                              <option>Barbudans</option>
                              <option>Batswana</option>
                              <option>Belarusian</option>
                              <option>Belgian</option>
                              <option>Belizean</option>
                              <option>Beninese</option>
                              <option>Bhutanese</option>
                              <option>Bolivian</option>
                              <option>Bosnian</option>
                              <option>Brazilian</option>
                              <option>British</option>
                              <option>Bruneian</option>
                              <option>Bulgarian</option>
                              <option>Burkinabe</option>
                              <option>Burmese</option>
                              <option>Burundian</option>
                              <option>Cambodian</option>
                              <option>Cameroonian</option>
                              <option>Canadian</option>
                              <option>Cape Verdean</option>
                              <option>Central African</option>
                              <option>Chadian</option>
                              <option>Chilean</option>
                              <option>Chinese</option>
                              <option>Colombian</option>
                              <option>Comoran</option>
                              <option>Congolese</option>
                              <option>Costa Rican</option>
                              <option>Croatian</option>
                              <option>Cuban</option>
                              <option>Cypriot</option>
                              <option>Czech</option>
                              <option>Danish</option>
                              <option>Djibouti</option>
                              <option>Dominican</option>
                              <option>Dutch</option>
                              <option>East Timorese</option>
                              <option>Ecuadorean</option>
                              <option>Egyptian</option>
                              <option>Emirian</option>
                              <option>English</option>
                              <option>Equatorial Guinean</option>
                              <option>Eritrean</option>
                              <option>Estonian</option>
                              <option>Ethiopian</option>
                              <option>Fijian</option>
                              <option>Filipino</option>
                              <option>Finnish</option>
                              <option>French</option>
                              <option>Gabonese</option>
                              <option>Gambian</option>
                              <option>Georgian</option>
                              <option>German</option>
                              <option>Ghanaian</option>
                              <option>Greek</option>
                              <option>Grenadian</option>
                              <option>Guatemalan</option>
                              <option>Guinea-Bissauan</option>
                              <option>Guinean</option>
                              <option>Guyanese</option>
                              <option>Haitian</option>
                              <option>Herzegovinian</option>
                              <option>Honduran</option>
                              <option>Hungarian</option>
                              <option>I-Kiribati</option>
                              <option>Icelander</option>
                              <option>Indian</option>
                              <option>Indonesian</option>
                              <option>Iranian</option>
                              <option>Iraqi</option>
                              <option>Irish</option>
                              <option>Israeli</option>
                              <option>Italian</option>
                              <option>Ivorian</option>
                              <option>Jamaican</option>
                              <option>Japanese</option>
                              <option>Jordanian</option>
                              <option>Kazakhstani</option>
                              <option>Kenyan</option>
                              <option>Kittian and Nevisian</option>
                              <option>Kuwaiti</option>
                              <option>Kyrgyz</option>
                              <option>Laotian</option>
                              <option>Latvian</option>
                              <option>Lebanese</option>
                              <option>Liberian</option>
                              <option>Libyan</option>
                              <option>Liechtensteiner</option>
                              <option>Lithuanian</option>
                              <option>Luxembourger</option>
                              <option>Macedonian</option>
                              <option>Malagasy</option>
                              <option>Malawian</option>
                              <option>Malaysian</option>
                              <option>Maldivan</option>
                              <option>Malian</option>
                              <option>Maltese</option>
                              <option>Marshallese</option>
                              <option>Mauritanian</option>
                              <option>Mauritian</option>
                              <option>Mexican</option>
                              <option>Micronesian</option>
                              <option>Moldovan</option>
                              <option>Monacan</option>
                              <option>Mongolian</option>
                              <option>Moroccan</option>
                              <option>Mosotho</option>
                              <option>Motswana</option>
                              <option>Mozambican</option>
                              <option>Namibian</option>
                              <option>Nauruan</option>
                              <option>Nepalese</option>
                              <option>Netherlander</option>
                              <option>New Zealander</option>
                              <option>Ni-Vanuatu</option>
                              <option>Nicaraguan</option>
                              <option>Nigerian</option>
                              <option>Nigerien</option>
                              <option>North Korean</option>
                              <option>Northern Irish</option>
                              <option>Norwegian</option>
                              <option>Omani</option>
                              <option>Pakistani</option>
                              <option>Palauan</option>
                              <option>Panamanian</option>
                              <option>Papua New Guinean</option>
                              <option>Paraguayan</option>
                              <option>Peruvian</option>
                              <option>Polish</option>
                              <option>Portuguese</option>
                              <option>Qatari</option>
                              <option>Romanian</option>
                              <option>Russian</option>
                              <option>Rwandan</option>
                              <option>Saint Lucian</option>
                              <option>Salvadoran</option>
                              <option>Samoan</option>
                              <option>San Marinese</option>
                              <option>Sao Tomean</option>
                              <option>Saudi</option>
                              <option>Scottish</option>
                              <option>Senegalese</option>
                              <option>Serbian</option>
                              <option>Seychellois</option>
                              <option>Sierra Leonean</option>
                              <option>Singaporean</option>
                              <option>Slovakian</option>
                              <option>Slovenian</option>
                              <option>Solomon Islander</option>
                              <option>Somali</option>
                              <option>South African</option>
                              <option>South Korean</option>
                              <option>Spanish</option>
                              <option>Sri Lankan</option>
                              <option>Sudanese</option>
                              <option>Surinamer</option>
                              <option>Swazi</option>
                              <option>Swedish</option>
                              <option>Swiss</option>
                              <option>Syrian</option>
                              <option>Taiwanese</option>
                              <option>Tajik</option>
                              <option>Tanzanian</option>
                              <option>Thai</option>
                              <option>Togolese</option>
                              <option>Tongan</option>
                              <option>Trinidadian or Tobagonian</option>
                              <option>Tunisian</option>
                              <option>Turkish</option>
                              <option>Tuvaluan</option>
                              <option>Ugandan</option>
                              <option>Ukrainian</option>
                              <option>Uruguayan</option>
                              <option>Uzbekistani</option>
                              <option>Venezuelan</option>
                              <option>Vietnamese</option>
                              <option>Welsh</option>
                              <option>Yemenite</option>
                              <option>Zambian</option>
                              <option>Zimbabwean</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo"> Sexual orientation   </label>
                           <select name="Motivo" class="form-control">
                              <option value="ND" selected="">Not Disclosed</option>
                              <option value="S">Straight</option>
                              <option value="M">Mixed share</option>
                              <option value="G">Gay/Lesbian</option>
                              <option value="B">Bi-sexual</option>
                           </select>
                           <label class="form_input form_checkbox">
                           <input name="gay_consent" value="Y" type="checkbox">
                           Yes, I would like my orientation to form part of my advert,
                           search criteria and allow others to search on this field
                           </label>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Interests</label>
                           <input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text">
                        </div>
                     </div>
                     <br>
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           Preferences For New Flatmates 
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Smoking</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="28230">Yes
                                    </option>
                                    <option value="28216">No
                                    </option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Gender</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="NULL">Select...</option>
                                    <option value="FF" selected="">2 Females</option>
                                    <option value="FM">1 Female, 1 Male</option>
                                    <option value="MM">2 Males</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Occupation</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="ND" selected="">Not disclosed</option>
                                    <option value="S">Student</option>
                                    <option value="P">Professional</option>
                                    <option value="O">Other</option>
                                    <option value="M">Mixed</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Pets</label>
                                 <select name="Motivo" class="form-control">
                                    <option value="28230">Yes
                                    </option>
                                    <option value="28216">No
                                    </option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Ages</label>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="null" selected="">-</option>
                                          <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                          <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>
                                          <option value="32">32</option>
                                          <option value="33">33</option>
                                          <option value="34">34</option>
                                          <option value="35">35</option>
                                          <option value="36">36</option>
                                          <option value="37">37</option>
                                          <option value="38">38</option>
                                          <option value="39">39</option>
                                          <option value="40">40</option>
                                          <option value="41">41</option>
                                          <option value="42">42</option>
                                          <option value="43">43</option>
                                          <option value="44">44</option>
                                          <option value="45">45</option>
                                          <option value="46">46</option>
                                          <option value="47">47</option>
                                          <option value="48">48</option>
                                          <option value="49">49</option>
                                          <option value="50">50</option>
                                          <option value="51">51</option>
                                          <option value="52">52</option>
                                          <option value="53">53</option>
                                          <option value="54">54</option>
                                          <option value="55">55</option>
                                          <option value="56">56</option>
                                          <option value="57">57</option>
                                          <option value="58">58</option>
                                          <option value="59">59</option>
                                          <option value="60">60</option>
                                          <option value="61">61</option>
                                          <option value="62">62</option>
                                          <option value="63">63</option>
                                          <option value="64">64</option>
                                          <option value="65">65</option>
                                          <option value="66">66</option>
                                          <option value="67">67</option>
                                          <option value="68">68</option>
                                          <option value="69">69</option>
                                          <option value="70">70</option>
                                          <option value="71">71</option>
                                          <option value="72">72</option>
                                          <option value="73">73</option>
                                          <option value="74">74</option>
                                          <option value="75">75</option>
                                          <option value="76">76</option>
                                          <option value="77">77</option>
                                          <option value="78">78</option>
                                          <option value="79">79</option>
                                          <option value="80">80</option>
                                          <option value="81">81</option>
                                          <option value="82">82</option>
                                          <option value="83">83</option>
                                          <option value="84">84</option>
                                          <option value="85">85</option>
                                          <option value="86">86</option>
                                          <option value="87">87</option>
                                          <option value="88">88</option>
                                          <option value="89">89</option>
                                          <option value="90">90</option>
                                          <option value="91">91</option>
                                          <option value="92">92</option>
                                          <option value="93">93</option>
                                          <option value="94">94</option>
                                          <option value="95">95</option>
                                          <option value="96">96</option>
                                          <option value="97">97</option>
                                          <option value="98">98</option>
                                          <option value="99">99</option>
                                       </select>
                                    </div>
                                    <div class="col-md-4">
                                       <select name="Motivo" class="form-control">
                                          <option value="null" selected="">-</option>
                                          <option value="16">16</option>
                                          <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                          <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>
                                          <option value="32">32</option>
                                          <option value="33">33</option>
                                          <option value="34">34</option>
                                          <option value="35">35</option>
                                          <option value="36">36</option>
                                          <option value="37">37</option>
                                          <option value="38">38</option>
                                          <option value="39">39</option>
                                          <option value="40">40</option>
                                          <option value="41">41</option>
                                          <option value="42">42</option>
                                          <option value="43">43</option>
                                          <option value="44">44</option>
                                          <option value="45">45</option>
                                          <option value="46">46</option>
                                          <option value="47">47</option>
                                          <option value="48">48</option>
                                          <option value="49">49</option>
                                          <option value="50">50</option>
                                          <option value="51">51</option>
                                          <option value="52">52</option>
                                          <option value="53">53</option>
                                          <option value="54">54</option>
                                          <option value="55">55</option>
                                          <option value="56">56</option>
                                          <option value="57">57</option>
                                          <option value="58">58</option>
                                          <option value="59">59</option>
                                          <option value="60">60</option>
                                          <option value="61">61</option>
                                          <option value="62">62</option>
                                          <option value="63">63</option>
                                          <option value="64">64</option>
                                          <option value="65">65</option>
                                          <option value="66">66</option>
                                          <option value="67">67</option>
                                          <option value="68">68</option>
                                          <option value="69">69</option>
                                          <option value="70">70</option>
                                          <option value="71">71</option>
                                          <option value="72">72</option>
                                          <option value="73">73</option>
                                          <option value="74">74</option>
                                          <option value="75">75</option>
                                          <option value="76">76</option>
                                          <option value="77">77</option>
                                          <option value="78">78</option>
                                          <option value="79">79</option>
                                          <option value="80">80</option>
                                          <option value="81">81</option>
                                          <option value="82">82</option>
                                          <option value="83">83</option>
                                          <option value="84">84</option>
                                          <option value="85">85</option>
                                          <option value="86">86</option>
                                          <option value="87">87</option>
                                          <option value="88">88</option>
                                          <option value="89">89</option>
                                          <option value="90">90</option>
                                          <option value="91">91</option>
                                          <option value="92">92</option>
                                          <option value="93">93</option>
                                          <option value="94">94</option>
                                          <option value="95">95</option>
                                          <option value="96">96</option>
                                          <option value="97">97</option>
                                          <option value="98">98</option>
                                          <option value="99">99</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Language  </label>
                                 <select name="Motivo" class="form-control">
                                    <option value="26" selected="">English</option>
                                    <option value="27">Mixed</option>
                                    <option value="4">Arabic</option>
                                    <option value="11">Bengali</option>
                                    <option value="17">Cantonese</option>
                                    <option value="37">French</option>
                                    <option value="39">German</option>
                                    <option value="44">Hindi</option>
                                    <option value="48">Indonesian</option>
                                    <option value="50">Japanese</option>
                                    <option value="62">Malay</option>
                                    <option value="63">Mandarin</option>
                                    <option value="73">Portuguese</option>
                                    <option value="74">Punjabi</option>
                                    <option value="79">Russian</option>
                                    <option value="88">Spanish</option>
                                    <option value="1">Afrikaans</option>
                                    <option value="2">Albanian</option>
                                    <option value="3">Amharic</option>
                                    <option value="5">Armenian</option>
                                    <option value="6">Aymara</option>
                                    <option value="7">Baluchi</option>
                                    <option value="8">Bambara</option>
                                    <option value="9">Basque</option>
                                    <option value="10">Belarussian</option>
                                    <option value="12">Berber</option>
                                    <option value="13">Bislama</option>
                                    <option value="14">Bosnian</option>
                                    <option value="15">Bulgarian</option>
                                    <option value="16">Burmese</option>
                                    <option value="18">Catalan</option>
                                    <option value="19">Ciluba</option>
                                    <option value="20">Creole</option>
                                    <option value="21">Croatian</option>
                                    <option value="22">Czech</option>
                                    <option value="23">Danish</option>
                                    <option value="24">Dari</option>
                                    <option value="25">Dutch</option>
                                    <option value="28">Eskimo</option>
                                    <option value="29">Estonian</option>
                                    <option value="30">Ewe</option>
                                    <option value="31">Fang</option>
                                    <option value="32">Faroese</option>
                                    <option value="33">Farsi (Persian)</option>
                                    <option value="34">Filipino</option>
                                    <option value="35">Finnish</option>
                                    <option value="36">Flemish</option>
                                    <option value="38">Galician</option>
                                    <option value="40">Greek</option>
                                    <option value="41">Gujarati</option>
                                    <option value="42">Hausa</option>
                                    <option value="43">Hebrew</option>
                                    <option value="45">Hungarian</option>
                                    <option value="46">Ibo</option>
                                    <option value="47">Icelandic</option>
                                    <option value="49">Italian</option>
                                    <option value="51">Kabié</option>
                                    <option value="52">Kashmiri</option>
                                    <option value="53">Kirundi</option>
                                    <option value="54">Kiswahili</option>
                                    <option value="55">Korean</option>
                                    <option value="56">Latvian</option>
                                    <option value="57">Lingala</option>
                                    <option value="58">Lithuanian</option>
                                    <option value="59">Luxembourgish</option>
                                    <option value="60">Macedonian</option>
                                    <option value="61">Malagasy</option>
                                    <option value="64">Mayan</option>
                                    <option value="65">Motu</option>
                                    <option value="66">Nepali</option>
                                    <option value="67">Norwegian</option>
                                    <option value="68">Noub</option>
                                    <option value="69">Pashto</option>
                                    <option value="70">Peul</option>
                                    <option value="71">Pidgin</option>
                                    <option value="72">Polish</option>
                                    <option value="75">Pushtu</option>
                                    <option value="76">Quechua</option>
                                    <option value="77">Romanian</option>
                                    <option value="78">Romansch</option>
                                    <option value="80">Sango</option>
                                    <option value="81">Serbian</option>
                                    <option value="82">Setswana</option>
                                    <option value="83">Sindhi</option>
                                    <option value="84">Sinhala</option>
                                    <option value="85">Slovak</option>
                                    <option value="86">Slovene</option>
                                    <option value="87">Somali</option>
                                    <option value="89">Swahili</option>
                                    <option value="90">Swedish</option>
                                    <option value="91">Tamil</option>
                                    <option value="92">Thai</option>
                                    <option value="93">Turkish</option>
                                    <option value="94">Urdu</option>
                                    <option value="95">Vietnamese</option>
                                    <option value="99">Welsh</option>
                                    <option value="96">Xhosa</option>
                                    <option value="97">Yoruba</option>
                                    <option value="98">Zulu</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Couples welcome?  </label>
                                 <div class="row">
                                    <div class="col-md-8">
                                       <div class="radio radio-info radio-inline">
                                          <input id="inlineRadio11" value="option1" name="radioInline" checked="" type="radio">
                                          <label for="inlineRadio11"> No </label>
                                       </div>
                                       <div class="radio radio-info radio-inline">
                                          <input id="inlineRadio12" value="option1" name="radioInline" checked="" type="radio">
                                          <label for="inlineRadio12"> Yes </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"> Misc</label>
                                 <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                    DSS welcome
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <input id="checkbox2" type="checkbox">
                                    <label for="checkbox2">
                                    Vegetarians preferred
                                    </label>
                                 </div>
                                 * Please specify rent adjustments in your advert description below. 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end .form-fields-wrapper -->
                  <div class="button-wrapper text-center">
                     <button type="button" class="button previous">Back</button>
                     <button type="button" class="button next">Continue to next step </button>
                  </div>
                  <!-- end .button-wrapper -->			    		
               </div>
               <!-- end .form-inner -->							
            </fieldset>
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               Step 5</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="sub-active"><span>5</span></li>
                  <li><span>6</span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <div class="form-fields-wrapper">
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           Your Advert & contact details
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Title</label>(short description - max 50 characters) 
                           <input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text">
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Description</label>(No contact details permitted within description) 
                           <textarea class="form-control" name="message" placeholder="Your Message..."></textarea>
                           Tips: Give more detail about the accommodation, who you are looking for and what a potential flatmate should expect living with you. You must write at least 25 words and can write as much as you like within reason. 
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Photos</label>
                           <div>You will have the opportunity to add photos to your advert after step 6 </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Your name </label>
                           <div class="row">
                              <div class="col-md-6"><input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text"></div>
                              <div class="col-md-6"><input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text"></div>
                              <label for="checkbox1">
                              Display last name on advert?  
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Your name </label>
                           <input class="form-control" id="Correo" name="Correo" placeholder="" required="" type="text">
                           <label for="checkbox1">
                           Display with advert? 
                           </label>
                           (recommended - we only display to registered users) 
                        </div>
                        <div class="form-group">
                           <label class="control-label" for="Motivo">Email</label>
                           <div>As per your login details provided on the next step <br>
                              (NOTE We never reveal your email address - users email you through our messaging system which we then forward to your email, thus protecting your privacy)
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end .form-fields-wrapper -->
                  <div class="button-wrapper text-center">
                     <button type="button" class="button previous">Back</button>
                     <button type="button" class="button next">Continue to next step </button>
                  </div>
                  <!-- end .button-wrapper -->			    		
               </div>
               <!-- end .form-inner -->							
            </fieldset>
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               Step 6</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="sub-active"><span>6</span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <div class="form-fields-wrapper">
                     <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible" role="alert">
                           Login information
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              Existing user? 
                              <hr>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Email Address</label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="Email address" required="" type="text">
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Password</label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="Password" required="" type="password">
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo"><a herf="#">Forgot Password</a></label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              New user? 
                              <hr>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Email</label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="Email" required="" type="text">
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Confirm email</label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="Confirm email" required="" type="text">
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Password</label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="Password" required="" type="password">
                              </div>
                              <div class="form-group">
                                 <label class="control-label" for="Motivo">Confirm Password</label>
                                 <input class="form-control" id="Correo" name="Correo" placeholder="Confirm Password" required="" type="password">
                              </div>
                              <div class="form-group">
                                 <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                    Notify me by email of suitable flatmates (room wanted adverts)
                                    </label>
                                 </div>
                                 <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                    Send me occasional newsletters
                                    </label><br>
                                    <small>(We NEVER pass on your details to third parties) </small>
                                 </div>
                                 <div class="form-group">
                                    <input class="form-control" id="Correo" name="Correo" placeholder="Where did you hear about us?" required="" type="text">
                                 </div>
                                 <div class="form-group">
                                    <div class="form_input form_checkbox">
                                       <label class="hidden">
                                       <input name="inagreement" checked="" value="Y" type="checkbox">
                                       </label>
                                       *By registering, I agree to SpareRoom's
                                       <a href="/content/plain/terms-uk">terms</a> and
                                       <a href="/content/plain/privacy-uk">privacy policy</a>, and to receive emails from SpareRoom (you can unsubscribe any time).
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end .form-fields-wrapper -->
                  <div class="button-wrapper text-center">
                     <button type="button" class="button previous">Back</button>
                     <button type="button" class="button next">Continue to next step </button>
                  </div>
                  <!-- end .button-wrapper -->			    		
               </div>
               <!-- end .form-inner -->							
            </fieldset>
            <fieldset>
               <h2 class="form-title text-center dark">Place an ad</h2>
               <h3 class="step-title text-center dark">
               You've successfully posted a job</h2>
               <ul class="steps-progress-bar flex space-between items-center no-column no-wrap list-unstyled">
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
                  <li class="active"><span><i class="ion-ios-checkmark-empty"></i></span></li>
               </ul>
               <!-- end .steps-progress-bar -->
               <div class="form-inner">
                  <h2 class="text-center job-post-success">Congratulations!</h2>
                  <p class="text-center">You’ve successfully posted a new job. Let’s see who you’re gonna hire. Whenever you want to edit your job, please go to your <a href="#0">Dashboard</a>> <a href="#0">Manage Jobs</a>. Thank you for using our job board!</p>
                  <div class="button-wrapper text-center">
                     <button type="button" class="button">View job now</button>
                  </div>
                  <!-- end .button-wrapper -->
               </div>
               <!-- end .form-inner -->	
            </fieldset>
         </form>
         <!-- end .job-post-form -->
      </div>
      <!-- end .container -->
   </div>
   <!-- end .inner -->
</div>
<!-- end .section -->
<?php include("footer.php");  ?>

