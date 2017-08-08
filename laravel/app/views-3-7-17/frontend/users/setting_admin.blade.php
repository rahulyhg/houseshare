@extends('frontend/layouts/default')
@section('title')
Admin
@stop

@section('content')


<section>
	<div class="container">
		<div class="row">
			
			@include('frontend/users/group_left')
			
			<div class="col-md-9">
				
				@include('frontend/users/setting_top_menu')
				
				<div class="row"> <div class="col-md-12">
					
					<ul class="nav nav-pills gen-act Admin m-t-35">
						<li class="active"><a data-toggle="pill" href="#Member-Details">Member Details</a></li>
						<li><a data-toggle="pill" href="#Member-Access-Rights">Member Access Rights</a></li> 
						<li><a data-toggle="pill" href="#Forum-Clean-Up">Forum Clean Up</a></li> 
					</ul>  
					
					<div class="report-white member1">
						<div class="tab-content">
							<div id="Member-Details" class="tab-pane fade in active">	
								<div class="member-acess member-detail">
									
									<table class="table text-center gts">
										<thead>
											<tr>
												<th>UserName</th>
												<th> Name</th> 
												<th> Email </th>
												<th> Verify </th>
												<th> Role </th> 
												<th>Joined on</th> 
												<th>Action</th> 
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Lorem ipsum </td> 
												<td>Steve </td> 
												<td>steve@gmail.com</td>
												<td><span class="gren"> Verify </span> </td> 
												<td class="slct"><div class=""><label> 
													<select class="form-control input-sm"><option value="Member">Member</option><option value="Moderator">Moderator</option>
													<option value="Administrator">Administrator</option></label></div></td>
													<td>5 days ago </td> 
													<td class="icons-dei-edt"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
												</tr>
												
												<tr>
													<td>Lorem ipsum </td> 
													<td>Steve </td> 
													<td>steve@gmail.com</td>
													<td><span class="gren"> Verify </span> </td>  
													<td class="slct"><div class=""><label> 
														<select class="form-control input-sm"><option value="Moderator">Moderator</option><option value="Member">Member</option>
															
														<option value="Administrator">Administrator</option></label></div></td>
														<td>5 days ago </td> 
														<td class="icons-dei-edt"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
													</tr>
													
													<tr>
														<td>Lorem ipsum </td> 
														<td>Steve </td> 
														<td>steve@gmail.com</td>
														<td><span class="gren"> Verify </span> </td> 
														<td class="slct"><div class=""><label> 
															<select class="form-control input-sm"><option value="Member">Member</option><option value="Moderator">Moderator</option>
															<option value="Administrator">Administrator</option></label></div></td>
															<td>5 days ago </td> 
															<td class="icons-dei-edt"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
														</tr>
														
														<tr>
															<td>Lorem ipsum </td> 
															<td>Steve </td> 
															<td>steve@gmail.com </td>
															<td><span class="gren"> Verify </span> </td> 
															<td class="slct"><div class=""><label> 
																<select class="form-control input-sm"><option value="Moderator">Moderator</option><option value="Member">Member</option>
																<option value="Administrator">Administrator</option></label></div></td>
																<td>5 days ago </td> 
																<td class="icons-dei-edt"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
															</tr>
															
															<tr>
																<td>Lorem ipsum </td> 
																<td>Steve </td> 
																<td>steve@gmail.com </td>
																<td><span class="gren"> Verify </span> </td> 
																<td class="slct"><div class=""><label> 
																	<select class="form-control input-sm"><option value="Member">Member</option><option value="Moderator">Moderator</option>
																	<option value="Administrator">Administrator</option></label></div></td>
																	<td>5 days ago </td> 
																	<td class="icons-dei-edt"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
																</tr>
																
																
															</tbody>
														</table>
													</div></div>
													
													
													<div id="Member-Access-Rights" class="tab-pane">	
														<div class="member-acess mem">
															
															<div class="admin1-tble-2">
																<div class=""><h5><b>Moderator Steve Martin</b></h5><div class="input-group-btn">
																	<div class="btn-group" role="group">
																		<div class="dropdown dropdown-lg">
																			<button type="button" class="btn btn-default ghy dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
																			<div class="dropdown-menu dropdown-menu-right" role="menu">
																				<ul class="oloi">
																					<li><a href="#">Lorem ipsum (Steve)</a></li>
																					<li><a href="#">Lorem ipsum (Steve)</a></li>
																					<li><a href="#">Lorem ipsum (Steve)</a></li> 
																				</ul>
																			</div>
																		</div> 
																	</div>
																</div></div>
																
																<div class="form-group display-table Comm">
																	<label>Manage Group</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="checked">
																			<label for="inlineRadio1">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio2" value="option2" name="radioInline">
																			<label for="inlineRadio2"> No </label>
																		</div></div>
																</div>				
																
																<div class="form-group display-table Comm">
																	<label>Report</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio3" value="option3" name="radioInline2">
																			<label for="inlineRadio3"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio4" value="option4" name="radioInline2" checked="checked">
																			<label for="inlineRadio4"> No </label>
																		</div></div>
																</div>	
																
																
																
																<div class="form-group display-table Comm">
																	<label>Create Discussion</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio5" value="" name="radioInline3">
																			<label for="inlineRadio5"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio6" value="" name="radioInline3" checked="checked">
																			<label for="inlineRadio6"> No </label>
																		</div></div>
																</div>
																
																
																
																
																<div class="form-group display-table Comm">
																	<label>Members</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio7" value="" name="radioInline4" checked="checked">
																			<label for="inlineRadio7"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio8" value="" name="radioInline4">
																			<label for="inlineRadio8"> No </label>
																		</div></div>
																</div>	
																
																<div class="form-group display-table Comm">
																	<label>Email</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio9" value="" name="radioInline5" checked="checked">
																			<label for="inlineRadio9"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio10" value="" name="radioInline5">
																			<label for="inlineRadio10"> No </label>
																		</div></div>
																</div>	
																
																
																<div class="form-group display-table Comm">
																	<label>Create  Topic</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio11" value="" name="radioInline6">
																			<label for="inlineRadio11"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio12" value="" name="radioInline6" checked="checked">
																			<label for="inlineRadio12"> No </label>
																		</div></div>
																</div>
																
																
																<div class="form-group display-table Comm">
																	<label>Edit Posts</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio13" value="" name="radioInline7">
																			<label for="inlineRadio13"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio14" value="" name="radioInline7" checked="checked">
																			<label for="inlineRadio14"> No </label>
																		</div></div>
																</div>	
																
																
																<div class="form-group display-table Comm">
																	<label>Invite  Friends</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio15" value="" name="radioInline8" checked="checked">
																			<label for="inlineRadio15"> Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio16" value="" name="radioInline8">
																			<label for="inlineRadio16"> No </label>
																		</div></div>
																</div>
															</div>
															
															<div class="admin1-tble-2">
																<div class=""><h5><b>Moderator Steve Martin</b></h5><div class="input-group-btn">
																	<div class="btn-group" role="group">
																		<div class="dropdown dropdown-lg">
																			<button type="button" class="btn btn-default ghy dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
																			<div class="dropdown-menu dropdown-menu-right" role="menu">
																				<ul class="oloi">
																					<li><a href="#">Lorem ipsum (Steve)</a></li>
																					<li><a href="#">Lorem ipsum (Steve)</a></li>
																					<li><a href="#">Lorem ipsum (Steve)</a></li> 
																				</ul>
																			</div>
																		</div> 
																	</div>
																</div></div>
																
																<div class="form-group display-table Comm">
																	<label>Manage Group</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio17" value="" name="radioInline9">
																			<label for="inlineRadio17">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio18" value="" name="radioInline9" checked="checked">
																			<label for="inlineRadio18"> No </label>
																		</div></div>
																</div>				
																
																<div class="form-group display-table Comm">
																	<label>Report</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio19" value="" name="radioInline10" checked="checked">
																			<label for="inlineRadio19">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio20" value="" name="radioInline10">
																			<label for="inlineRadio20"> No </label>
																		</div></div>
																</div>	
																
																
																
																<div class="form-group display-table Comm">
																	<label>Create Discussion</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio21" value="" name="radioInline11" checked="checked">
																			<label for="inlineRadio21">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio22" value="" name="radioInline11">
																			<label for="inlineRadio22"> No </label>
																		</div></div>
																</div>
																
																
																
																
																<div class="form-group display-table Comm">
																	<label>Members</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio23" value="" name="radioInline12" checked="checked">
																			<label for="inlineRadio23">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio24" value="" name="radioInline12">
																			<label for="inlineRadio24"> No </label>
																		</div></div>
																</div>	
																
																<div class="form-group display-table Comm">
																	<label>Email</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio25" value="" name="radioInline13">
																			<label for="inlineRadio25">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio26" value="" name="radioInline13" checked="checked">
																			<label for="inlineRadio26"> No </label>
																		</div></div>
																</div>	
																
																
																<div class="form-group display-table Comm">
																	<label>Create  Topic</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio27" value="" name="radioInline14" checked="checked">
																			<label for="inlineRadio27">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio28" value="" name="radioInline14">
																			<label for="inlineRadio28"> No </label>
																		</div></div>
																</div>
																
																
																<div class="form-group display-table Comm">
																	<label>Edit Posts</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio29" value="" name="radioInline15" checked="checked">
																			<label for="inlineRadio29">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio30" value="" name="radioInline15">
																			<label for="inlineRadio30"> No </label>
																		</div></div>
																</div>	
																
																
																<div class="form-group display-table Comm">
																	<label>Invite  Friends</label>
																	<div class="">
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio31" value="" name="radioInline16">
																			<label for="inlineRadio31">Yes </label>
																		</div>
																		
																		<div class="radio radio-inline">
																			<input type="radio" id="inlineRadio32" value="" name="radioInline16" checked="checked">
																			<label for="inlineRadio32"> No </label>
																		</div></div>
																</div>
															</div>				
															
															
															<div class="text-center m-t-30"> <a href="" class="save"> Add </a> </div>	
															
															
														</div></div>
														
														
														<div id="Forum-Clean-Up" class="tab-pane">	<div>
															<div class="left-discussion1 FORUM-CLEAN-UP p-l-0">
																
																
																<div class="FORUM-CLEAN-UP-height">
																	<div class="blue">
																		<div class="rtr">
																			<div class="">
																				
																				
																				<ul id="accordion1" class="accordion">
																					
																					<li class="">
																						<div class="link"><i class="fa fa-commenting-o"></i>Discussion 1<i class="fa fa-chevron-down"></i></div>
																						<ul class="submenu diss1">
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li></ul>
																					</li>
																					<li class="">
																						<div class="link"><i class="fa fa-commenting-o"></i>Discussion 2<i class="fa fa-chevron-down"></i></div>
																						<ul class="submenu diss1">
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li></ul>
																					</li>
																					<li class="default open">
																						<div class="link"><i class="fa fa-commenting-o"></i>Discussion 3<i class="fa fa-chevron-down"></i></div>
																						<ul class="submenu diss1">
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li></ul>
																					</li>
																					<li class="">
																						<div class="link"><i class="fa fa-commenting-o"></i>Discussion 4<i class="fa fa-chevron-down"></i></div>
																						<ul class="submenu diss1">
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li>
																							<li> <div class=""><a href="#">  </a> <h5> Lorem Ipsum simply <p> 1 GB</p> </h5></div>
																								<div class="m-t-10"><a href="#"> </a> <h5> Attached Files <p><span class="grn"> 10 </span> 200 MB</p>  </h5></div>
																							</li></ul>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="admin-blu-a text-center"> <a href=""> INCREASE STORAGE </a>  <a href=""> Save </a> </div>
																
																
															</div>
															
															
														</div>
														
														
														
														<div class="text-center m-t-30"> <a href="" class="save"> Save </a> </div>
														
														</div> </div>
														
														
										</div> </div>
										
										
										
										
										
										
										
										
										
										
								</div>
							</section>
							
							
							
	<script type="text/javascript">
	
		$(function(){
			$('.clickable').on('click',function(){
				var effect = $(this).data('effect');
				$(this).closest('.panel')[effect]();
			})
		})
 
		$(function() {
			var Accordion = function(el, multiple) {
				this.el = el || {};
				this.multiple = multiple || false;
				
				// Variables privadas
				var links = this.el.find('.link');
				// Evento
				links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
			}
			
			Accordion.prototype.dropdown = function(e) {
				var $el = e.data.el;
				$this = $(this),
				$next = $this.next();
				
				$next.slideToggle();
				$this.parent().toggleClass('open');
				
				if (!e.data.multiple) {
					$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
				};
			} 
			//var accordion = new Accordion($('#accordion'), false);
		});
 
		$(function() {
			var Accordion = function(el, multiple) {
				this.el = el || {};
				this.multiple = multiple || false;
				
				// Variables privadas
				var links = this.el.find('.link');
				// Evento
				links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
			}
			
			Accordion.prototype.dropdown = function(e) {
				var $el = e.data.el;
				$this = $(this),
				$next = $this.next();
				
				$next.slideToggle();
				$this.parent().toggleClass('open');
				
				if (!e.data.multiple) {
					$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
				};
			}	
			
			var accordion = new Accordion($('#accordion1'), false);
		}); 
		
	</script> 
	
	@stop																																																											