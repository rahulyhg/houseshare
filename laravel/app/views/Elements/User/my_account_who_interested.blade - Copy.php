<h3>My Interested</h3>
<div class="row">
	<div class="col-sm-12">
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
									<a title="Inactive" href="javascript:;"><span class="btn">&nbsp;Active</span></a>
								@else
									<a title="Active" href="javascript:;"><span class="btn">&nbsp;Inactive</span></a>
								@endif
							</td>
							<td class="text-center">{{ date('M d,Y h:i A',strtotime($my_ad_val->created_at)) }}</td>
							<td class="text-center padding-action">
								<a href="{{URL::to('details/'.$my_ad_val->id)}}" target="_blank" class="col-sm-12 btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i>View</a>
							</td>
							
							 
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="7" class="no-record"> No records found!</td>
					</tr>
				@endif
			</tbody>
		</table>
		<div align="right">{{ $my_ad_data->links()}}</div>
	</div> 
</div>  