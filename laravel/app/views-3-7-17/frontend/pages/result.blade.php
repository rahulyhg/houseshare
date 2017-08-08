@extends('frontend/layouts/default')
@section('content') <?php 
$clientid	    =	Config::get('constants.clientid');
$clientsecret	=	Config::get('constants.clientsecret');
$redirecturi	=	URL::to('/google-result/'.Route::input('group_id')); //Add your redirect URl	
$maxresults		=	Config::get('constants.maxresults'); ?>
 
<section>
	<div class="container">
		
		<div class="row">
			
			@include('frontend/users/group_left')  
			
			<div class="col-md-9"> 
				
				<div class="update_status_area border-none">
					
					<h3 class=""> Invite Friends &nbsp;
						<small>
							<label style="display: inline;">Select All&nbsp;
								<input type="checkbox" class="select_invite" id="select_all" name="select_all" value="1"/>
							</label>
						</small>
					</h3>
					
					<?php
						
						$authcode = isset($_GET["code"])?$_GET["code"]:'';
						
						$fields=array(
						'code'=>  urlencode($authcode),
						'client_id'=>  urlencode($clientid),
						'client_secret'=>  urlencode($clientsecret),
						'redirect_uri'=>  urlencode($redirecturi),
						'grant_type'=>  urlencode('authorization_code') 
						);
						
						//url-ify the data for the POST
						$fields_string = '';
						
						foreach($fields as $key=>$value){ 
							$fields_string .= $key.'='.$value.'&'; 
						}
						
						$fields_string = rtrim($fields_string,'&');
						
						//open connection
						$ch = curl_init();
						curl_setopt($ch,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token'); //set the url, number of POST vars, POST data
						curl_setopt($ch,CURLOPT_POST,5);
						curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Set so curl_exec returns the result instead of outputting it.
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //to trust any ssl certificates
						$result = curl_exec($ch); //execute post
						curl_close($ch); 
						
						//close connection
						//extracting access_token from response string
						$response    =  json_decode($result);
						$accesstoken = isset($response->access_token)?$response->access_token:'';
						
						if($accesstoken!=''){
							
							$_SESSION['token']= $accesstoken;
							
							$curl_handle=curl_init();
							curl_setopt($curl_handle, CURLOPT_URL,'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);
							curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
							curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
							$xmlresponse = curl_exec($curl_handle);
							curl_close($curl_handle);
							
							
							//echo '<pre>'; print_r($xmlresponse); die;
							
							//$xmlresponse=  file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&oauth_token='. $_SESSION['token']);
							
							$xml = simplexml_load_string($xmlresponse);	
							
							$emaiArr= $xml->xpath("//gd:email"); 
							$email = array(); $titleArr = '';
							foreach($emaiArr as $emaival) {
								$email[] = $emaival->attributes()->{'address'};
							} 
							foreach($xml->entry as $xml_val) {
								$titleArr .= $xml_val->title.',';
							}
							if($titleArr) {
								$titleArr = explode(',',substr($titleArr,0,-1));
							}
							
							if(count($titleArr) == count($email)){
								$name_email = array_combine($email, $titleArr);
								}else{
								$name_email = $email ;
							}
							
							if(!empty($name_email)) { ?>
							{{ Form::open(array('url' => array('/google-invite-post'), 'method'=>'POST', 'class'=>'form-horizontal', 'id'=>'invite')) }} <?php 
							$i=1; ?>
							<div class="row"> <?php
								foreach($name_email as $email=>$name) {
									$name = ($name!='')?$name:$email;
									$email = filter_var($email, FILTER_VALIDATE_EMAIL)?$email:$name;
									$email.= '###'.$name ;
								?>
								<div class="familys margin0 col-lg-6">
									<input type="checkbox" name="name[]" class="check-all" value="<?php echo $email; ?>">&nbsp;<?php echo ucfirst($name); ?>
									</div><?php
									$i++;
								} ?>
							</div>
							
							<div class="form-group"style="margin-top: 12px;"> 
								<label class="control-label col-sm-0"></label>
								<div class="col-md-4 col-xs-11">
									<a class="btn btn-primary" href="{{ URL::to('/invite/'.Route::input('group_id')) }}">Cancel</a>&nbsp;&nbsp;
									<button class="btn btn-primary" type="submit" name="send" value="Save">Send Invitation</button>
									
								</div>
								<div class="col-md-5"></div>
							</div>
							
							{{ Form::close() }} <?php 
							}
							} else { 
							return Redirect::to('/invite/'.Route::input('group_id'));
						} ?> 
				</div>
			</div> 
		</div>
	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function() {	
		jQuery('.select_invite').click(function(event) { 
			if(this.checked) { 
				jQuery('.check-all').each(function() { 
					this.checked = true;  
				});
				}else{
				jQuery('.check-all').each(function() { 
					this.checked = false; 
				});        
			}
		});
	});
	
</script>

@stop