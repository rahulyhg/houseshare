@extends('frontend/layouts/default')
@section('title')
{{$data->title}}
@stop

@section('content')


<div id="columns" class="columns clearfix" style="margin: 50px 100px;">
	
    <div id="content-column" class="content-column" role="main">
		<div class="content-inner ">
			
			<!-- region: Highlighted -->
			
			<section id="main-content">
				<a href="#" name="main-content"></a>
				
				<!-- Breadcrumbs -->
				
				<header id="main-content-header" class="clearfix">
					<h1 style="border-bottom: 1px solid #ccc;padding-bottom: 20px;font-weight:100 !important;">{{$data->title}}
						<a href="{{URL::to('blogs')}}"><button style="float:right;" type="button" class="btn btn-primary">Back</button></a>
					</h1> 
				</header>
				
				<!-- region: Main Content -->
				<div id="content" class="region">
					
					<div id="block-system-main" class="block block-system no-title">
						
						
						
						<div id="oua_blog_column_wrapper">
							<div id="oua_blog_column_1" class="oua-blog-column">
								<div class="view view-oua-blog view-id-oua_blog view-display-id-page view-dom-id-0453e53c022ab13e1b7845127dfd44a7">
									
									
									
									<div class="view-content">
									 
									
												<div class="views-row views-row-1 views-row-odd views-row-first">
													<article id="node-2559" class="node node-oua-blog node-promoted node-teaser article clearfix" about="/post/cute-diy-crafts-easter" typeof="sioc:Item foaf:Document" role="article">
														
														<header class="node-header">
															<h2>{{$data->title}}</h2>  
														</header> 
														
														<div class="node-content">
															<div class="field field-name-field-blog-author field-type-text field-label-above view-mode-teaser">
																<div class="field-label">Created on {{date('D, m/d/Y - H:i A', strtotime($data->created_at))}} by {{$data->first_name.' '.$data->last_name}}, UK Exams blog writer&nbsp;</div>
																<div class="field-items">
																</div>
															</div>
															<div class="field field-name-body field-type-text-with-summary field-label-hidden view-mode-teaser">
																<div class="field-items">
																	<div class="field-item even" property="content:encoded">
																		<p>{{$data->content}}</p>
																		<center>
																			{{GeneralHelper::showImage($data->image, 'img-responsive', 'auto', '300px', $data->title, 'blogs')}}
																		</center>
																	</div>
																</div>
															</div>
															<!-- AddThis Button BEGIN -->
															<div class="cal-md-12" style="float: right; padding: 20px;">
															
																<a onclick="ShareFunction('http://www.facebook.com/share.php?title={{$data->title}}&u={{URL::to('/blog/'.$data->slug)}}',{{$data->id}});" href="javascript:;" class="facebook">{{HTML::image('img/fblike.png', '',array('style'=>'cursor: pointer;'))}}</a>
																<a onclick="ShareFunction('https://twitter.com/share?url={{URL::to('/blog/'.$data->slug)}}&name=Simple Share Buttons&hashtags={{$data->title}}',{{$data->id}})" href="javascript:;" class="twitter">{{HTML::image('img/tweetbutton.png', '',array('style'=>'cursor: pointer;'))}} </a>
																<a onclick="ShareFunction('https://plus.google.com/share?url={{URL::to('/blog/'.$data->slug)}}',{{$data->id}});" href="javascript:;" class="facebook">{{HTML::image('img/gplus.png', '',array('style'=>'cursor: pointer;'))}} </a>
																<a onclick="ShareFunction('https://www.linkedin.com/shareArticle?mini=true&amp;url={{URL::to('/blog/'.$data->slug)}}&amp;title={{$data->title}}&amp;summary=&amp;source=',{{$data->id}});" href="javascript:;" class="facebook">{{HTML::image('img/in_share.png', '',array('style'=>'cursor: pointer;'))}}</a>
												 
															</div>
														<!-- AddThis Button END -->  </div>
														
														
													</article> 
												</div>
							 
										 
									</div>
									 
								</div>  
							</div>
							
						</div>
					</div>             
				</div>
				
				
				
				<!-- Feed icons (RSS, Atom icons etc -->
				
			</section><!-- /end #main-content -->
			
			<!-- region: Content Aside -->
			
		</div><!-- /end .content-inner -->
	</div><!-- /end #content-column -->
	
	
    <!-- regions: Sidebar first and Sidebar second -->
	
</div>

<script type="text/javascript"> 
	function ShareFunction(url,id) { 
		mywindow=window.open(url,"mywindow","status=1,resizable=0,width=550,height=500");
		mywindow.moveTo(0, 0);
	} 
</script>

@stop									