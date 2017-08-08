@if($room_rent_type) <?php
	for($j=1; $j<=$room_rent_type; $j++) { ?>
	
		<div class="title_cls">Room {{$j}}</div>

		<div class="control-group">
			<label class="control-label">Available? <span class='red bold'>*</span></label>
			<div class="controls controls_cls">
				<label class="span3">{{ Form::radio('roomArr['.$j.'][available_type]', '1') }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.1')}}</label>
				<label class="span3">{{ Form::radio('roomArr['.$j.'][available_type]', '2') }}&nbsp;{{Config::get('constants.AVAILABLE_TYPE.2')}}</label>
			</div>
		</div> 
			
		<div class="control-group">
			<label class="control-label">Cost of room <span class='red bold'>*</span></label>
			<div class="controls">
				{{ Form::text('roomArr['.$j.'][room_cost]', null, array('class' => 'span4'))}}
				<span class="red">{{ $errors->first('room_cost') }} </span>
			</div>
			<div style="padding: 0px;" class="controls">
				<label class="span4">{{ Form::radio('roomArr['.$j.'][room_cost_type]', '1') }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.1')}}</label>
				<label class="span6">{{ Form::radio('roomArr['.$j.'][room_cost_type]', '2') }}&nbsp;{{Config::get('constants.ROOM_COST_TYPE.2')}}</label>
				<span class="red">{{ $errors->first('roomArr['.$j.'][room_cost_type]') }} </span>
			</div>
		</div> 
		
		<div class="control-group">
			<label class="control-label">Size of room <span class='red bold'>*</span></label>
			<div class="controls controls_cls">
				<label class="span3">{{ Form::radio('roomArr['.$j.'][room_size_type]', '1') }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.1')}}</label>
				<label class="span3">{{ Form::radio('roomArr['.$j.'][room_size_type]', '2') }}&nbsp;{{Config::get('constants.ROOM_SIZE_TYPE.2')}}</label>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Amenities</label>
			<div class="controls controls_cls">
				@foreach($amenities as $key_amenitie=>$amenitie_val)
					<label>{{ Form::checkbox('roomArr['.$j.'][amenitie_id][]', $key_amenitie) }}&nbsp;{{$amenitie_val}}</label>
				@endforeach
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label">Security Deposit</label>
			<div class="controls">
				{{ Form::text('roomArr['.$j.'][security_deposit]', null, array('class' => 'span4'))}}
				<span class="red">{{ $errors->first('security_deposit') }} </span>
			</div>
		</div> 
		
		
		<?php
		
	} ?>
@endif