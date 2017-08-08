@extends('frontend/layouts/default')
@section('title')
Notifications
@stop

@section('content') 


<section>
	<div class="container">
		<div class="row">
			@include('frontend/users/group_left')  
			<div class="col-md-9">
				@include('frontend/users/setting_top_menu')  
				
				<div class="report-white m-t-35">
					<ul class="Notifications1-ul"> 
						<li class=""> <b> Notify </b> </li>
						<li class=""> <b> Email </b> </li>
						<li class="">  </li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Someone joins the group </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Someone send me a message </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Someone follows me </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When I receive a message from admin</p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>News and announcements  </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Creates a new discussion </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>We notify you of the latest  activity regarding services </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Creates a new topic </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When someone send s a reply </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When user gets some points </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When someone reports something </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Something is shared on social media </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When someone sees my profile </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Marketing Emails </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Someone writes any new comment </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When user reply on my post </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When I get some points </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>When user likes my post </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>My post shared on social media </p></li>
						
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li> 
							<div class="checkbox">
								<label><input type="checkbox" value="">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
								</label>
							</div>
						</li>
						<li class=""><p>Someone writes new post in my group </p></li>
					</ul>
					
					<div class="text-center m-t-30"> <a href="" class="save"> Save </a> </div> 
					
					
				</div>	 
				
			</div>
		</div>
	</section> 

@stop															