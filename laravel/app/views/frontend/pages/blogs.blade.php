@extends('frontend/layouts/default')

@section('title')
	FAQ | Needs on Rent
@stop

@section('content')
	<div class="container">
		<div class="faq_pages">
			<h1 class="page_heading">Frequently Asked Questions</h1>
			<div class="row">
				<div class="col-lg-4">
					 <ul class="vertical-menu"><?php $i =1; ?>
						@foreach($faqs as $val)
							<li><a href="#accordion1_{{$val->id}}" data-parent="#accordion1"  data-toggle="collapse"  class="accordion-toggle"> 
								{{$i}}. {{(strlen($val->question) > 40)?substr($val->question, 0, 40).'...?':$val->question}}
								</a>
							</li>
							<?php $i++; ?>
						@endforeach
					</ul>
				</div>
				<div class="col-lg-8">
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="panel-group" id="accordion1"><?php $i =1; ?>
								@foreach($faqs as $val)
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"> 
												<a href="#accordion1_{{$val->id}}" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
													{{$i}}. {{$val->question}}
												</a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="accordion1_{{$val->id}}">
											<div class="panel-body">
												{{$val->answer}}
											</div>
										</div>
									</div>
									<?php $i++; ?>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
