@if (Session::has('message'))
	<div class="row top_message_cls" style="padding: 0px; margin: 0px; position: fixed; width: 100%; z-index: 100;">
		<div class="col-lg-12" style="padding: 0px; margin: 0px;">
			<div class="alert alert-success fade in" style="border-radius: unset; text-align: center;">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				{{ Session::get('message') }}
			</div>
		</div>
	</div>
@elseif (Session::has('errormessage'))
	<div class="row top_message_cls" style="padding: 0px; margin: 0px; position: fixed; width: 100%; z-index: 100;">
		<div class="col-lg-12 " style="padding: 0px; margin: 0px;">
			<div class="alert alert-danger fade in" style="border-radius: unset; text-align: center;">
				<button class="close close-sm" type="button" data-dismiss="alert"> <i class="fa fa-times"></i> </button>
				{{ Session::get('errormessage') }}
			</div>
		</div>
	</div>
@endif