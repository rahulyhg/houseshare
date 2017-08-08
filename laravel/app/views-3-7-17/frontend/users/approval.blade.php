@extends('frontend/layouts/default')
@section('title')
Approval
@stop

@section('content')  

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			<div class="col-md-9">
				
				@include('frontend/users/setting_top_menu')
				
				<div class="report-white m-t-35">
					
					<div class="Psrapprvl">	
						<div class="Psrapprvl-h">		
						<h4> Approval Required <span> 20 </span> </h4></div>
						<div class="dty text-left"> 
							<span class="pull-right">3 hour ago </span>
							<a class="bt" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapseExample">Discussion1 </a>
							<div class="collapse in" id="collapse1" aria-expanded="true">
								<span class="pull-right"><a href="" class="fa fa-pencil"></a></span><span>Lorem Ipsum</span>	
								<div class="checkbox">
									<label>
										<input type="checkbox" value="">
										<span class="cr thi"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
										<p class="mkl">Vijay soni </p>
									</label>
								</div>
								<p> Lorem Ipsum </p>
								<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever snce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letr</p>
								<a href="" class="qw"> Approve </a> <a href="" class="qw"> Discard </a>
							</div></div>
							
							<div class="dty text-left"> 
								<span class="pull-right">3 hour ago </span>
								<a class="bt" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapseExample">Discussion1 </a>
								<div class="collapse in" id="collapse2" aria-expanded="true">
									<span class="pull-right"><a href="" class="fa fa-pencil"></a></span><span>Lorem Ipsum</span>	
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">
											<span class="cr thi"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
											<p class="mkl">Vijay soni </p>
										</label>
									</div>
									<p> Lorem Ipsum </p>
									<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever snce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letr</p>
									<a href="" class="qw"> Approve </a> <a href="" class="qw"> Discard </a>
								</div></div>
								
								<div class="dty text-left"> 
									<span class="pull-right">3 hour ago </span>
									<a class="bt" data-toggle="collapse" href="#collapse3" aria-expanded="true" aria-controls="collapseExample">Discussion1 </a>
									<div class="collapse in" id="collapse3" aria-expanded="true">
										<span class="pull-right"><a href="" class="fa fa-pencil"></a></span><span>Lorem Ipsum</span>	
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">
												<span class="cr thi"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
												<p class="mkl">Vijay soni </p>
											</label>
										</div>
										<p> Lorem Ipsum </p>
										<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever snce the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letr</p>
										<a href="" class="qw"> Approve </a> <a href="" class="qw"> Discard </a>
									</div></div>
									
					</div>		
				</div>	
				
			</div>
		</div>
	</div>
</section>  

@stop