@extends('frontend/layouts/default')

@section('title')
FAQ's
@stop

@section('content')

<div class="section breadcrumb-bar solid-blue-bg">
	<div class="inner">
		<div class="container">
			<p class="breadcrumb-menu">
				<a class="outline-cls" href="{{URL::to('/')}}"><i class="ion-ios-home"></i></a>
				<i class="ion-ios-arrow-right arrow-right"></i>
				<a class="outline-cls" href="javascript:;">Faq's</a>
			</p>
			<!-- end .breabdcrumb-menu -->
			<h2 class="breadcrumb-title">Frequently asked questions</h2>
		</div>
		<!-- end .container -->
	</div>
	<!-- end .inner -->
</div>
 
<!-- Blog priacy policy -->
<div class="section blog-standard-section">
	<div class="inner">
		<div class="inner">
			<div class="container">
				<h3 class="text-center">Frequently asked questions</h3>
				<p class="text-center">Your content goes here.</p>
				<BR>
				<div id="faq" class="tab-pane fade in active">
					<div class="faqs-list-wrapper">
					
						<div class="panel-group-wrapper">
						
							<div class="panel-group faqs-group for-employers" id="accordion2" role="tablist" aria-multiselectable="true">
								
								@if(!empty($data))
									
									@foreach($data as $val)
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading_faq_{{$val->id}}">
												<h4 class="panel-title">
													<a class="outline-cls collapsed flex space-between" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse_faq_{{$val->id}}" aria-expanded="false" aria-controls="collapsefour">
														{{$val->question}}<span class="icon"><i class="ion-ios-plus-empty"></i></span>
													</a>
												</h4>
											</div> 
										 
											<div id="collapse_faq_{{$val->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_faq_{{$val->id}}" aria-expanded="false" style="height: 0px;">
												<div class="panel-body">
													<p>{{$val->answer}}</p>
												</div>
											</div>
										</div>
									@endforeach
									
								@else
									
									<div class="panel panel-default">
										<div class="panel-heading" role="tab">
											<h4 style="padding: 2%; text-align: center;" class="panel-title">
												Record not found.
											</h4>
										</div> 
									</div>
									
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
@stop									