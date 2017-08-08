@extends('backend/layouts/default')
@section('title')
	{{$code}}
@stop

@section('content')
	<div class="page-content">
		<!-- BEGIN PAGE BASE CONTENT -->
		<div class="row">
			<div class="col-md-12 page-500">
				<div class=" number font-red"> {{$code}} </div>
				<div class=" details">
					<h3>Oops! Something went wrong.</h3>
					<p> We are fixing it! Please come back in a while.  <br/> </p>
					<p><a href="{{ URL::to('admin/dashboard') }}" class="btn red btn-outline"> Return home </a><br></p>
				</div>
			</div>
		</div>
		<!-- END PAGE BASE CONTENT -->
	</div>
@stop