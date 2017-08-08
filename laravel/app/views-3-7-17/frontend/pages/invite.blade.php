@extends('frontend/layouts/default')
@section('title')
Invite Friend
@stop

@section('content') 

<?php
	$clientid	    =	Config::get('constants.clientid');
	$clientsecret	=	Config::get('constants.clientsecret');
	$redirecturi	=	URL::to('/google-result'); //Add your redirect URl	
	$facebook_activation_key  = base64_encode('facebook-123- -123-'. Auth::user()->username .'-123-'.Auth::id());
?>

<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			
			<div class="col-md-9">
				@include('frontend/users/group_top_menu')
				<div class="tab-content">
					<div id="" class="tab-pane fade in active"> 
						
						<div class="m-t-31">
							<div id="Invite-Friends" class="">
								<div class="Invite-outer">
									<div class="Invite-inner">
										<div class="Invite-main">
											
											{{ Form::open(array('url' => array('/invite/'.Route::input('group_id')), 'name'=>'invite', 'id'=>'invite_form', 'files'=>true)) }} 
											
											<h4 class="text-center YELLOW"> INVITE PEOPLE &amp; GROUPS </h4>
											<h4 class="BLUE"> Email Invites </h4> 
											{{ Form::text('email_friend',null, array('placeholder'=> 'Email, Email 2', 'class'=>'form-control bg-form-hrey'))}}
											<span class="help-block"> {{$errors->first('email_friend')}} </span> 
											
											<p class="BLUE mags"> *Seprate Multiple Emails With Commas </p>
											
											{{ Form::textarea('message',null, array('rows'=>3, 'required'=>true, 'placeholder'=> 'Message..', 'class'=>'ckeditor form-control bg-form-hrey'))}} 
											<span class="help-block"> {{$errors->first('message')}} </span> 
											<div class="text-right"> 
												<a href="javascript:;" class="A1"> CANCEL </a>
												<a onclick="document.getElementById('invite_form').submit();" href="javascript:;" class="B2"> INVITE </a>
											</div>
											
											{{Form::close()}}
											
											<div class="text-center">
												<a href="https://accounts.google.com/o/oauth2/auth?client_id=<?php print $clientid; ?>&redirect_uri=<?php print $redirecturi; ?>&scope=https://www.google.com/m8/feeds/&response_type=code"><div class="mid"> {{ HTML::image('img/email.jpg') }}  Invite Your Mail Contacts </div></a>
												<h4 class="text-center YELLOW"> You can send invitation by social media</h4>
												<div class="icons"> 
													<a onclick="FacebookInviteFriends('{{$facebook_activation_key}}');" href="javascript:;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
													<a href="javascript:;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
													<a onclick="invite()" href="javascript:;"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>			  
						</div>
						
						
					</div>
				</div>
			</div> 
		</div>
	</div>
</section>




<div id="fb-root"></div>
   <script src="http://connect.facebook.net/en_US/all.js">
   </script>
   <script>
     FB.init({ 
       appId:'<?php echo Session::get('SiteValue.facebook_api_id'); ?>', cookie:true, 
       status:true, xfbml:true 
     });



function FacebookInviteFriends()
{
FB.ui({ method: 'apprequests', 
   message: 'VISIT THIS WEB SITE'});
}
   </script>

<a href='#' onClick="FacebookInviteFriends();"> INVITE YOUR FACEBOOK FRIENDS</a>



<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key: 81l5hqlrt8ftew
</script>	

<script>
    function invite() {
        var url = '/people/~/mailbox',
            body = {
                recipients: {
                  values: [{
                    person: {
                      _path: '/people/email=a_user@domain.com',
                      'first-name':'Andrew',
                      'last-name':'User'
                     }
                  }]
                },
                subject: 'Invitation to connect.',
                body: 'Say yes!',
                'item-content':{
                     'invitation-request':{
                         'connect-type':'friend'
                     }
                }
            };
        IN.API.Raw()
            .url(url)
            .method("POST")
            .body(JSON.stringify(body))
            .result(function (result) {
                console.log(result);
            })
            .error(function (error) {
                console.log(error);
            });
    }
</script>

 
@stop															