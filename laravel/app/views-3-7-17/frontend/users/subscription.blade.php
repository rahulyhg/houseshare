@extends('frontend/layouts/default')
@section('title')
Subscription
@stop

@section('content') 

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			
			<div class="col-md-9 subscription">
				
				@include('frontend/users/setting_top_menu')  
				
				<div class="tab-content">
					<div id="" class="tab-pane fade in active">
						
						
						
						<div class="m-t-31 subscription-body">
							<div class="row"> 
								<div class="col-md-3"> <div class="subs subs1"> 
									
									<h4 class="m-b-30"> Current Plan </h4><h4 class="uppr"> BASIC!!! </h4><h4> $10/Week </h4> <p> Expiry  01/01/01 </p>
									<a href="" class="ddt"> UPGRADE </a>
									
								</div> </div>
								<div class="col-md-3 br"> <div class="subs subs1"> 
									
									<h4 class="uppr m-b-30"> BASIC!!! </h4><h4 class="m-b-30"> $10/Week </h4> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<a href="" class="ddt b"> JOIN NOW </a><a href="" class="ddt"> COMPARE </a>
									
								</div>  </div>
								<div class="col-md-3"> <div class="subs subs2"> 
									
									<h4 class="uppr m-b-30"> PREMIUM </h4><h4 class="m-b-30"> $30/Week </h4> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<a href="" class="ddt b"> JOIN NOW </a><a href="" class="ddt"> COMPARE </a>
									
								</div>  </div>
								<div class="col-md-3"> <div class="subs subs3"> 
									
									<h4 class="uppr m-b-30"> ULTRA </h4><h4 class="m-b-30"> $50/Week </h4> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<p> LOREM IPSUM IS A SO</p> 
									
									<a href="" class="ddt b"> JOIN NOW </a><a href="" class="ddt"> COMPARE </a>
									
								</div>  </div>  </div>	
								
								<div class="description-of-plan">
									<h3> BASIC PLAN </h3>
									<ol>
										<li> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text  </li>
										<li> ever since the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
										dummy text ev  </li>
										<li> er since the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard d
										ummy text ever since the   </li>
										<li> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text   </li>
										<li> ever since the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
										dummy text ev </li>
										<li> ever since the Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard 
										dummy text ev </li>
									</ol>
								</div>
								
						</div>
						
						
					</div>
				</div>
			</div> 
		</div>
	</section> 
	<?php 
	$base_url = Config::get('constants.SITE_URL'); ?>	
	<script type="text/javascript">
		
		
	</script>
	
@stop																																									