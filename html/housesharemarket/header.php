

<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Housesharemarket</title>
   <!-- CSS -->
   <!-- Bootstrap -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Ionicons -->
   <link href="fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
   <!-- Owl Carousel -->
   <link href="css/owl.carousel.css" rel="stylesheet">
   <link href="css/owl.theme.default.css" rel="stylesheet">
   <!-- Animate.css -->
   <link href="css/animate.min.css" rel="stylesheet">
   <!--Magnific Popup -->
   <link href="css/magnific-popup.css" rel="stylesheet">
   <!--Tagsinput CSS -->
   <link href="css/tagsinput.css" rel="stylesheet">
   <!-- Style.css -->
   <link href="css/style.css" rel="stylesheet">
   <link href="css/font-awesome.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
   <!-- Header -->
   <header class="header">
      <div class="container clearfix">
         <div class="header-inner flex space-between items-center">
            <div class="left">
               <div class="logo"><a href="index.php"><img src="images/logo.png" alt="JobPress" class="img-responsive"></a></div>
            </div>
            <!-- end .left -->				
            <div class="right flex space-between no-column items-center">
               <div class="navigation">
                  <nav class="main-nav">
                     <ul class="list-unstyled">
                        <li class="active"><a href="index.php">HOME</a></li>
                        <li><a href="place_ad.php">PLACE AN AD</a></li>
                        <li><a href="listing.php">BROWSE PROPERTIES</a></li>
                        <li><a href="my_account.php">MY ACCOUNT</a></li>
                     </ul>
                  </nav>
                  <!-- end .main-nav -->
                  <a href="#" class="responsive-menu-open"><i class="ion-navicon"></i></a>
               </div>
               <!-- end .navigation -->
               <div class="button-group-merged flex no-column">
                  <a href="#" data-toggle="modal" data-target="#myModal" class="button" id="login"> Log In</a>
               </div>
               <!-- end .button-group-merged -->
            </div>
            <!-- end .right -->
         </div>
         <!-- end .header-inner -->
      </div>
      <!-- end .container -->
   </header>
   <!-- end .header -->
   <!-- Responsive Menu -->
   <div class="responsive-menu">
      <a href="#" class="responsive-menu-close"><i class="ion-android-close"></i></a>
      <nav class="responsive-nav"></nav>
      <!-- end .responsive-nav -->
   </div>
   <!-- end .responsive-menu -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
               ×</button>
               <h4 class="modal-title" id="myModalLabel">
                  Login/Registration 
               </h4>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs">
                        <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                        <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane active" id="Login">
                           <form role="form" class="form-horizontal">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label">
                                 Email</label>
                                 <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email1" placeholder="Email" />
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                 Password</label>
                                 <div class="col-sm-10">
                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" />
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-2">
                                 </div>
                                 <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                    Submit</button>
                                    <a href="javascript:;">Forgot your password?</a>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane" id="Registration">
                           <form role="form" class="form-horizontal">
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label">
                                 Name</label>
                                 <div class="col-sm-10">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <input type="text" class="form-control" placeholder="Name" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="email" class="col-sm-2 control-label">
                                 Email</label>
                                 <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Email" />
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="password" class="col-sm-2 control-label">
                                 Password</label>
                                 <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" placeholder="Password" />
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="password" class="col-sm-2 control-label">
                                 Confirm password</label>
                                 <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" placeholder="Confirm password" />
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="Gender" class="col-sm-2 control-label">
                                 Gender</label>
                                 <div class="col-md-2">
                                    <label class="radio-inline">
                                    <input name="gender" id="input-gender-male" value="Male" type="radio" />Male
                                    </label>
                                 </div>
                                 <div class="col-md-3">
                                    <label class="radio-inline">
                                    <input name="gender" id="input-gender-female" value="Female" type="radio" />Female
                                    </label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="password" class="col-sm-2 control-label">
                                 Tick</label>
                                 <div class="col-sm-10">
                                    <div class="checkbox checkbox-inline">
                                       <input id="checkbox30" type="checkbox">
                                       <label for="checkbox30">
                                       I am looking for an apartment or house share 
                                       </label>
                                    </div>
                                    <div class="checkbox checkbox-inline">
                                       <input id="checkbox31" type="checkbox">
                                       <label for="checkbox31">
                                       I have an apartment or house share 
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-2">
                                 </div>
                                 <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary btn-sm">
                                    Save & Continue</button>
                                    <button type="button" class="btn btn-default btn-sm">
                                    Cancel</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div id="OR" class="hidden-xs">
                        OR
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="row text-center sign-with">
                        <div class="col-md-12">
                           <h3>
                              Sign in with
                           </h3>
                        </div>
                        <div class="col-md-12">
                           <div class="btn-group btn-group-justified">
                              <a href="#" class="btn btn-primary"><i class="ion-social-facebook"></i> Facebook</a> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   <style>
      .nav-tabs {
      margin-bottom: 15px;
      }
      .sign-with {
      margin-top: 25px;
      padding: 20px;
      }
      div#OR {
      height: 30px;
      width: 30px;
      border: 1px solid #C2C2C2;
      border-radius: 50%;
      font-weight: bold;
      line-height: 28px;
      text-align: center;
      font-size: 12px;
      float: right;
      position: absolute;
      right: -16px;
      top: 40%;
      z-index: 1;
      background: #DFDFDF;
      }
      h4 {
      color: #000;
      font-size: 1.5em;
      font-weight: bold;
      line-height: 1.2em;
      }
      .modal-lg {
      width: 700px;
      }
   </style>

