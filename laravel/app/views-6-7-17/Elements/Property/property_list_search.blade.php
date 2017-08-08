<div class="section breadcrumb-bar solid-blue-bg">
	<div class="inner">
		<div class="container">
		
			<div class="col-md-12">
			
				{{ Form::model(Session::get('adssearch'),array('url' => array('/listing'),'method' => 'PUT')) }}
			
				<div class="col-md-10">
				
					<div class="col-md-4">
						<div class="select-style">
							{{ Form::select('ad_type',Config::get('constants.ADVERTISE_TYPE_SEARCH'), null, array('class' => 'form-control parsley-validated'))}}
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="form-group">
							{{ Form::text('keyword', null, array('placeholder'=>'Search by locality or title, postcode...', 'class' => 'form-control test-box-height-50 parsley-validated')) }}
						</div>
					</div> 
					 
					<?php /*
					<div class="col-md-3">
						<div class="select-style">
							<select name="day" class="form-control parsley-validated" parsley-required="true">
								<option value="Show adverts from">Show adverts from</option>
								<option value="Property type">Rooms in existing shares</option>
								<option value="Property type">Rooms in existing shares</option>
								<option value="Property type">Rooms in existing shares</option>
							</select>
						</div>
					</div>
					
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span style=" float: left;
								margin-top: 10px;">Rate</span>
							</div>
							<div class="col-md-4">
								<div class="select-style">
									<select name="day" class="form-control parsley-validated" parsley-required="true">
										<option value="Min">Min</option>
										<option value="Property type">21231</option>
										<option value="Property type">21231</option>
										<option value="Property type">21231</option>
									</select>
								</div>
							</div>
							<div class="col-md-1">
								<span style=" float: left;
								margin-top: 10px;">to</span>
							</div>
							<div class="col-md-4">
								<div class="select-style">
									<select name="day" class="form-control parsley-validated" parsley-required="true">
										<option value="Mix">Mix</option>
										<option value="Property type">21231</option>
										<option value="Property type">21231</option>
										<option value="Property type">21231</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="select-style">
							<select name="day" class="form-control parsley-validated" parsley-required="true">
								<option value="Property type">Property type</option>
							</select>
						</div>
					</div>
					*/ ?>
					
				</div>
				
				<div class="col-md-2">
					<button type="submit" class="button" style="padding:15px 32px; font-size:13px;">Apply Filter</button>
				</div>
				
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>