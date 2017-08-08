@extends('frontend/layouts/default')
@section('title')
Earn Point
@stop

@section('content') 

<section>
	<div class="container m-t-31 ernpont">
		<div class="row"> 
			
			<div class="col-md-9 col-sm-8">
				
				<div class="panel-heading">
					<h5><b>Earn Points</b></h5>
				</div>
				<div class="earn-bg">
					<div class="row earn-firstrow">
					
						@if(!empty($data)) <?php  				
							$i=0;
							$wrap_count = 5;  ?>
							
							@foreach($data as $val) <?php 
								$i+=1;
								if($i%$wrap_count==1) {
									echo '<div class="col-md-3 earn-colpad">';
								} ?>
						  
								<div class="earn-div2">
									<div class="earn-div"> {{$val->count}} Points </div>
									<h3>{{$val->title}}</h3>
									<p>{{$val->details}}</p>
								</div> <?php 
								
								if($i%$wrap_count==0) {
									echo '</div>';
								}  ?>
							
							
							@endforeach <?php
							if($i%$wrap_count!=0) {
								echo '</div>';
							} ?> 
						@endif 
					</div>	 
				</div>		  
			</div>
			
			<div class="col-md-3 col-sm-4">
				<div class="panel-heading">
					<h5><b> Tags</b></h5>
				</div>
				<div class="tag-start11">
					<div class="tag-bg">
						<button class="button-tag1">BEGINNER</button>
						<p class="tag-p11"><b>Start as a beginner </b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">SUPERVISOR</button>
						<p class="tag-p11"><b>    Earn 1K Pts to be a Supervisor </b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">EXPERT</button>
						<p class="tag-p11"><b>Earn 5K Pts to be a Expert </b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">TEAM LEADER</button>
						<p class="tag-p11"><b>Earn 10K Pts to be a Team Leader</b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">MENTOR</button>
						<p class="tag-p11"><b>Earn 20K Pts to be a Mentor </b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">MASTER</button>
						<p class="tag-p11"><b>Earn 30K Pts to be a Master </b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">PUNDIT</button>
						<p class="tag-p11"><b>Earn 40K Pts to be a Pundit</b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">SCHOLAR </button>
						<p class="tag-p11"><b>Earn 50K Pts to be a Scholar</b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">GURU</button>
						<p class="tag-p11"><b>Earn 60K Pts to be a Guru</b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1"> PROFESSOR</button>
						<p class="tag-p11"><b>Earn 70K Pts to be a Professor</b></p>
					</div>
					<div class="tag-bg">
						<button class="button-tag1">COUNSELLOR</button>
						<p class="tag-p11"><b>Earn 500K Pts to be a Counsellor</b></p>
					</div>
					
					
				</div>
			</div>
			
			
			
			
			
			
			
			
		</div>
	</div>
</section>

<script type="text/javascript"> 
	
</script>
@stop															