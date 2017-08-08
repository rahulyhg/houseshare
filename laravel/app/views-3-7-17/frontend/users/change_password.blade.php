@extends('frontend/layouts/default')
@section('title')
	{{Lang::get('ViewMessage.Change_Password')}}
@stop

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div  class="breadcrumb space-for floting-bru">
					<ul>
						<li><a href="{{URL::to('/')}}">{{Lang::get('ViewMessage.Home')}}</a><span>/</span></li>
						<li><a href="{{URL::to('/myaccount')}}">{{Lang::get('ViewMessage.Dashboard')}}</a><span>/</span></li>
						<li>{{ Lang::get('ViewMessage.Change_Password') }}</li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="headding-24">
			<h2>{{ Lang::get('ViewMessage.Change_Password') }}</h2>
		</div>
		
		@include('frontend/users/myaccount_left')
		
		<div class="right-section">
			{{ Form::open(array('url'=>url('/change-password'))) }}
				<div class="box-tex-area">
					<?php /* <div class="headding-20 margin-none">
						<h3>{{ Lang::get('ViewMessage.Change_Password') }}</h3>
					</div> */ ?>
					@include('frontend/alert_message')
					<div class="side-texx-box">
						<div class="top-searchbar">
							<div class="row">
								<div class="col-lg-8">
									<label style="margin-top:0px;">{{Lang::get('ViewMessage.Current_Password')}}</label>
									{{ Form::password('cur_password', array('placeholder'=>Lang::get('ViewMessage.Current_Password')))}}
									<span class="red">{{ $errors->first('cur_password')}}</span>
								</div>
							</div>
						</div>
						
						<div class="top-searchbar">
							<div class="row">
								<div class="col-lg-8">
									<label>{{Lang::get('ViewMessage.New_Password')}}</label>
									{{ Form::password('new_password', array('placeholder'=>Lang::get('ViewMessage.New_Password')))}}
									<span class="red">{{ $errors->first('new_password')}}</span>
								</div>
							</div>
						</div>
						
						<div class="top-searchbar">
							<div class="row">
								<div class="col-lg-8">
									<label>{{Lang::get('ViewMessage.Repeat_New_Password')}}</label>
									{{ Form::password('new_password_confirmation', array('placeholder'=>Lang::get('ViewMessage.Repeat_New_Password')))}}
									<span class="red">{{ $errors->first('new_password_confirmation')}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="submit-form">
					<div class="button margin-add-course">
						<button type="submit" class="btn btn-success chang-button-style small-bu courses-bu">Save</button>
						<a href="{{URL::to('myaccount')}}" class="btn btn-success chang-button-style small-bu courses-bu">Done</a>
					</div>
				</div>
			{{Form::close()}}
		</div>
	</div>
@stop							