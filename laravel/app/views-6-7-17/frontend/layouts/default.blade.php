<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">  
		  
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
		
		<title>
			@section('title')
			{{ Session::get('SiteValue.site_name') }}
			@show
		</title>  
		
		{{ HTML::style('css/frontend/bootstrap.min.css') }}
		{{ HTML::style('css/fonts/ionicons/css/ionicons.min.css') }}  
		{{ HTML::style('css/frontend/owl.carousel.css') }}  
		{{ HTML::style('css/frontend/owl.theme.default.css') }}  
		{{ HTML::style('css/frontend/animate.min.css') }}  
		{{ HTML::style('css/frontend/magnific-popup.css') }}  
		{{ HTML::style('css/frontend/tagsinput.css') }}  
		{{ HTML::style('css/frontend/style.css') }}  
		{{ HTML::style('css/frontend/font-awesome.css') }}  
		{{ HTML::style('css/frontend/font-awesome.min.css') }}  
		{{ HTML::style('css/frontend/jquery-ui.css') }}   
		
		{{ HTML::script('js/frontend/jquery-3.1.1.min.js') }}
		{{ HTML::script('js/frontend/jquery-ui.js') }} 
		{{ HTML::script('js/frontend/bootstrapValidator.min.js') }}
		 
	</head>
	<!-- END HEAD -->
	
	<!-- BEGIN BODY -->
	<body>
		
		@include('frontend/layouts/header')
		
		@yield('content')
		
		@include('frontend/layouts/footer') 
		
		
		{{ HTML::script('js/frontend/bootstrap.min.js') }}
		{{ HTML::script('js/frontend/owl.carousel.min.js') }}
		{{ HTML::script('js/frontend/wow.min.js') }}
		{{ HTML::script('js/frontend/typehead.js') }}
		{{ HTML::script('js/frontend/tagsinput.js') }}
		{{ HTML::script('js/frontend/bootstrap-select.js') }}
		{{ HTML::script('js/frontend/jquery.waypoints.min.js') }}
		{{ HTML::script('js/frontend/jquery.countTo.js') }}
		{{ HTML::script('js/frontend/isotope.pkgd.min.js') }}
		{{ HTML::script('js/frontend/imagesloaded.pkgd.min.js') }}
		{{ HTML::script('js/frontend/jquery.magnific-popup.js') }}
		{{ HTML::script('js/frontend/scripts.js') }}
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy-PboZ3O_A25CcJ9eoiSrKokTnWyAmt8"></script>		
  	
	</body>
	<!-- END BODY -->
</html>