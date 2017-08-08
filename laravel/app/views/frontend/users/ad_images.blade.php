@extends('frontend/layouts/default')
@section('title')
Ad Images
@stop

@section('content') 

<div class="section candidate-dashboard-content solid-light-grey-bg">
	<div class="inner">
		<div class="container">
			<div class="candidate-dashboard-wrapper flex space-between no-wrap">
			
				<div class="right-side-content"> 
					
					@include('Elements/User/my_account_top')
					
					<div class="tab-content" style="padding:10px;">
						 
						<h3>Ad Images And Video ({{$my_ad_data->title}})</h3>
						<div class="container">
							<div class="row">
							
								<div style="min-height: unset;" class="col-md-4" id="border1">
								
									{{ Form::open(array('url' => array('ad-images/'.Route::input('id')),'method' => 'PUT', 'files' => true, 'class' => 'cmxform form-horizontal tasi-form')) }}
									
										<div class="padding-form form-inner">
											<div class="form-fields-wrapper">
												<div class="form-group-wrapper flex space-between items-center">
													<h3>Upload multiple images</h3>
													<div class="form-group">
														<p class="label">Images<sup>*</sup></p>
														{{ Form::file('images[]',  array('multiple'=>'multiple','class'=>'form-control'))}}
														<span class="red">{{ $errors->first('images') }} </span>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="button-wrapper text-center">
												<button type="submit" class="button previous">Upload</button>
											</div>
										</div>
									{{Form::close()}}
									 
								</div> 
								
								
								<div style="min-height: unset;" class="col-md-4" id="border1">
								
									{{ Form::open(array('url' => array('ad-images/'.Route::input('id')),'method' => 'PUT', 'files' => true, 'class' => 'cmxform form-horizontal tasi-form')) }}
										<div class="padding-form form-inner">
											<div class="form-fields-wrapper">
												<div class="form-group-wrapper flex space-between items-center">
													<h3>Upload Video</h3>
													<div class="form-group">
														<p class="label">Video<sup>*</sup></p>
														{{ Form::hidden('video_file', 1)}}
														{{ Form::file('video',  array('class'=>'form-control'))}}
														
														<span class="red">{{ $errors->first('images') }} </span>
														<span style="display: block !important;" class="help-block">webm, mp4</span>
													</div>
												</div>
											</div>
											<div class="button-wrapper text-center">
												<button type="submit" class="button previous">Upload</button>
											</div>
										</div>
									{{Form::close()}}
									 
								</div> 
								
							</div>
						</div>	 
						
						
						<h3>Image List</h3>
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>{{ SortableTrait::link_to_sorting_action('image', 'File' ) }}</th>
											<th class="text-center">{{ SortableTrait::link_to_sorting_action('is_default', 'Is Default' ) }}</th>
											<th class="text-center">{{ SortableTrait::link_to_sorting_action('created_at', 'Created On' ) }}</th>
											<th class="col-sm-1 text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@if(!$my_ad_image_data->isEmpty())
											@foreach ($my_ad_image_data as $my_ad_val)
												<tr>
													<td class="text-center">
														@if($my_ad_val->img_type==1)
														{{GeneralHelper::showImg($my_ad_val->image, '', '80px', '80px','','ads/thumb/') }}
														@else
															{{GeneralHelper::showVideo($my_ad_val->image, '', '80px', '80px','','ads/') }}
														@endif
													</td>
													<td class="text-center">
														@if($my_ad_val->is_default==1)
															<a title="Inactive" href="{{ URL::to('status-my-ad-image/'.$my_ad_val->id.'/'.Route::input('id')) }}"><span class="btn">&nbsp;Yes</span></a>
														@else
															<a title="Active" href="{{ URL::to('status-my-ad-image/'.$my_ad_val->id.'/'.Route::input('id')) }}"><span class="btn">&nbsp;No</span></a>
														@endif
													</td>
													<td class="text-center">{{ date('M d,Y h:i A',strtotime($my_ad_val->created_at)) }}</td>
													<td class="text-center padding-action">
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
																	{{ HTML::linkAction('UserController@remove_ad_image', 'Confirm', array($my_ad_val->id,Route::input('id')), array('class'=>'btn btn-primary','title'=>'Confirm Remove')) }}
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
								<div align="right">{{ $my_ad_image_data->links()}}</div>
							</div> 
						</div>  
					</div>
					
				</div>
				
				<div class="left-sidebar-menu">
					@include('Elements/User/my_account_left_side')
				</div>	
				
			</div>
		</div>
	</div>
</div> 

@stop