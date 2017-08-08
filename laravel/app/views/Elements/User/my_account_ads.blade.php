<h3>My Ads</h3>
<div class="row">
	<div class="col-sm-12">
	<div class="well">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>{{ SortableTrait::link_to_sorting_action('order_number', 'Order Number' ) }}</th>
					<th>{{ SortableTrait::link_to_sorting_action('title', 'Title' ) }}</th>
					<?php /*<th>{{ SortableTrait::link_to_sorting_action('ad_type', 'Ad Type' ) }}</th>*/ ?>
					<th class="text-center">{{ SortableTrait::link_to_sorting_action('post_code', 'Post Code' ) }}</th>
					<th class="text-center">{{ SortableTrait::link_to_sorting_action('status', 'Status' ) }}</th>
					<th class="text-center">{{ SortableTrait::link_to_sorting_action('created_at', 'Created On' ) }}</th>
					<th class="col-sm-1 text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@if(!$my_ad_data->isEmpty())
					@foreach ($my_ad_data as $my_ad_val)
						<tr>
							<td>{{$my_ad_val->order_number}}</td>
							<td>{{$my_ad_val->title}}</td>
							<?php /*<td>{{ Config::get('constants.ADVERTISE_TYPE_TYPE.'.$my_ad_val->ad_type) }}</td>*/ ?>
							<td class="text-center">{{$my_ad_val->post_code}}</td>
							<td class="text-center">
								@if($my_ad_val->status==1)
									<a title="Inactive" href="{{ URL::to('status-my-ad/'.$my_ad_val->id) }}"><span class="btn">&nbsp;Active</span></a>
								@else
									<a title="Active" href="{{ URL::to('status-my-ad/'.$my_ad_val->id) }}"><span class="btn">&nbsp;Inactive</span></a>
								@endif
							</td>
							<td class="text-center">{{ date('M d,Y h:i A',strtotime($my_ad_val->created_at)) }}</td>
							<td class="text-center padding-action">
								<a href="{{URL::to('/ad-images/'.$my_ad_val->id)}}" class="col-sm-12 btn btn-success btn-xs"><i class="fa fa-picture-o" aria-hidden="true"></i>Images</a>
								<a href="{{URL::to('/ads-edit/'.$my_ad_val->id)}}" class="col-sm-12 btn btn-success btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
								<a href="{{URL::to('details/'.$my_ad_val->id)}}" target="_blank" class="col-sm-12 btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
								<a href="#remove_{{ $my_ad_val->id }}" data-toggle="modal" title="Remove" class="col-sm-12 btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
							</td>
							
							<div class="modal fade" id="remove_{{$my_ad_val->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3 class="modal-title">Remove</h3>
										</div>
										<div class="modal-body">Are you sure, you want to remove this {{ Config::get('constants.USER_ROLES.'.$my_ad_val->role_id) }} ?</div>
										<div class="modal-footer">
											{{ HTML::linkAction('UserController@remove_my_ad', 'Confirm', array($my_ad_val->id), array('class'=>'btn btn-primary','title'=>'Confirm Remove')) }}
											<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
										</div>
									</div>
								</div>
							</div>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="7" class="no-record"> No records found!</td>
					</tr>
				@endif
			</tbody>
		</table>
		</div>
		<div align="right">{{ $my_ad_data->links()}}</div>
	</div> 
</div> 

