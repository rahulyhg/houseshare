<div class="sort-by-wrapper on-listing-page flex space-between items-center no-wrap">
	
	<div class="left-side-inner">
		<h6>Showing <span>{{($data->getCurrentPage()-1)*$data->getPerPage()+1}}-{{$data->getCurrentPage()*$data->getPerPage()}}</span> of  <span>{{$data->getTotal()}}</span></h6>
	</div>
	
	<div class="right-side-inner">
		<?php /*
		<div class="sort-by dropdown flex no-wrap no-column items-center">
			<h6>sort by</h6>
			<button class="button dropdown-toggle" type="button" id="sort-by" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Default sort order<i class="ion-ios-arrow-down"></i></button>
			<ul class="dropdown-menu" aria-labelledby="sort-by">
				<li><a href="#">Newest Ads</a></li>
				<li><a href="#">Last updated</a></li>
				<li><a href="#">Price, high to low</a></li>
				<li><a href="#">Alphabetically, A-Z</a></li>
				<li><a href="#">Alphabetically, Z-A</a></li>
				<li><a href="#">Best sellers</a></li>
			</ul>
		</div>*/ ?>
	</div>
	
</div>

<div id="bookmarked-jobs" class="tab-pane fade in active">
	
	<h3 class="tab-pane-title">{{Config::get('constants.ADVERTISE_TYPE_SEARCH.'.$get_add_type)}}</h3>
	<div class="bookmarked-jobs-list-wrapper">		
		
		@if(!$data->isEmpty())
			@foreach($data as $val)
		
				<div class="bookmarked-job-wrapper">
					<div class="bookmarked-job flex no-wrap no-column">
						<div class="job-company-icon"><?php
							$get_images = GeneralHelper::getAdImageByAdId($val->id,1); ?>
							{{ GeneralHelper::showAdImage($get_images,'img-responsive','50px','',$val->title,'ads/large') }}
						</div>
						<div class="bookmarked-job-info">
							<h4 class="dark flex no-column">{{$val->title}} <?php
								$today_date = date('Y-m-d');
								$updated_data = date('Y-m-d',strtotime($val->updated_at)); ?>
								@if($updated_data==$today_date)
									<a href="javascript:;" class="button full-time">New Today</a>
								@endif
							</h4>
							<h5>{{$val->area}} ({{$val->post_code}})</h5>
							<p>{{strlen($val->description)>220?substr($val->description,0,220).'...':$val->description}}</p>
							<div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
								<div class="bookmarked-job-meta flex items-center no-wrap no-column"><?php
									$today_date = date('Y-m-d');
									$updated_data = date('Y-m-d',strtotime($val->updated_at)); ?>
									@if($updated_data==$today_date)
										<h6 class="bookmarked-job-category">New Today</h6>
									@endif
									<h6 class="candidate-location">{{$val->area}}</h6>
								</div>
								
								<div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap"><?php
									$is_saved = GeneralHelper::getSavedAdCheck($val->id); ?>
									@if(Auth::check())
										<i title="Saved Ads" onclick="isSaved('{{$is_saved}}','{{$val->id}}')" class="savedad-cls-{{$val->id}} ion-star wishlist-icon {{($is_saved==1)?'wishlist-active':''}}"></i>
									@else
										<i title="Please Login" class="ion-star wishlist-icon"></i>
									@endif
									&nbsp;&nbsp;
									<?php
									$is_interested = GeneralHelper::getInterestedCheck($val->id); ?>
									@if(Auth::check())
										<i onclick="isInterested('{{$is_interested}}','{{$val->id}}')" class="interested-cls-{{$val->id}} ion-ios-heart wishlist-icon {{($is_interested==1)?'wishlist-active':''}}"></i>
									@else
										<i title="Please Login" class="ion-ios-heart wishlist-icon"></i>
									@endif
									<a href="{{URL::to('details/'.$val->id)}}" class="button">more detail</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<div class="bookmarked-job-wrapper">
				<div class="bookmarked-job">
					<p class="no-record test-center"> No records found!</p>
				</div>
			</div>
		@endif
		
		 
	</div>
	
	
	<div align="center">{{ $data->links()}}</div>
	 
</div>
<script type="text/javascript"> 
	
	function isInterested(is_interested,id){
	
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"position: absolute; margin-left: 5px; height: 14px; top: 14px;")) }}</span>';
		jQuery(".interested-cls-"+id).append(img);
		$(".interested-cls-"+id).prop('onclick',null).off('click');
		jQuery.ajax({
			type: 'post',
			dataType: 'json', 
			url: "{{ URL::to('/add-interested') }}",
			data: {is_interested:is_interested,id:id},
			success: function(data){
				var get_interested = data.get_interested;
				if(get_interested==1) {
					$(".interested-cls-"+id).addClass('wishlist-active');
				} else {
					$(".interested-cls-"+id).removeClass('wishlist-active');
				}
				$(".interested-cls-"+id).attr('onclick', "isInterested("+get_interested+","+id+");"); 
			},
			complete: function(){
				jQuery(".loading1").remove(); 
			} 
		});
	}
	
	
	function isSaved(is_interested,id){
	
		img = '<span class="loading1" style="position:relative;">{{ HTML::image("img/loading.gif", "", array("alt"=>"Please wait", "class"=>"", "style"=>"position: absolute; margin-left: 5px; height: 14px; top: 14px;")) }}</span>';
		jQuery(".savedad-cls-"+id).append(img);
		$(".savedad-cls-"+id).prop('onclick',null).off('click');
		jQuery.ajax({
			type: 'post',
			dataType: 'json', 
			url: "{{ URL::to('/add-savedad') }}",
			data: {is_interested:is_interested,id:id},
			success: function(data){
				var get_interested = data.get_interested;
				if(get_interested==1) {
					$(".savedad-cls-"+id).addClass('wishlist-active');
				} else {
					$(".savedad-cls-"+id).removeClass('wishlist-active');
				}
				$(".savedad-cls-"+id).attr('onclick', "isSaved("+get_interested+","+id+");"); 
			},
			complete: function(){
				jQuery(".loading1").remove(); 
			} 
		});
	}
	
</script>