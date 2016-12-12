<?php include('header.php'); ?>
<main>
					<div class="col-md-11">
						<div class="row">
							<div class="col-md-8">
                                                            <?php foreach($dealer_info as $dd) { ?>
								<h1><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $dd->store; ?></h1>
							</div>
							<!-- <div class="col-md-4 text-center"><br>
								<div class="col-sm-6 col-sm-offset-3">
									<div class="input-group stylish-input-group">
										<input type="text" class="form-control"  placeholder="Search" >
										<span class="input-group-addon">
											<button type="submit">
												<span class="fa fa-search"></span>
											</button>
										</span>
									</div>
								</div>
							</div> -->
						</div>
						<div class="row">
						<br><br>
							<div class="col-md-3 col-sm-3 col-xs-12 dealer-slider">
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators">
									  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									  <li data-target="#myCarousel" data-slide-to="1"></li>
									  <li data-target="#myCarousel" data-slide-to="2"></li>
									  <li data-target="#myCarousel" data-slide-to="3"></li>
									</ol>
									<!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">
									  <div class="item active">
										<img src="<?php echo base_url();echo $dd->company_logo; ?>" alt="Chania" width="100%" height="345">
									  </div>

									  <div class="item">
										<img src="images/g2.jpg" alt="Chania" width="100%" height="345">
									  </div>
									
									  <div class="item">
										<img src="images/g2.jpg" alt="Flower" width="100%" height="345">
									  </div>

									  <div class="item">
										<img src="images/g2.jpg" alt="Flower" width="100%" height="345">
									  </div>
									</div>
									<!-- Left and right controls -->
									<!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
									  <span class="fa fa-chevron-left" aria-hidden="true"></span>
									  <span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control " href="#myCarousel" role="button" data-slide="next">
									  <span class="fa fa-chevron-right" aria-hidden="true" ></span>
									  <span class="sr-only">Next</span>
									</a> -->
								</div>
							</div>
							<div class="col-md-offset-1 col-sm-offset-1 col-md-7 col-sm-7 col-xs-12 dealer-info">
								<h3><?php echo $dd->business_name; ?></h3>
								<ul class="columns" data-columns="2">
                                                                    <li><img src="<?php echo base_url();echo $dd->company_logo; ?>" class="img-responsive" alt="dealer website" style="width:80%;height:40px;"/></li>
									<li><a href="#"><?php echo $dd-> street .",". $dd->unit .",". $dd->city .",". $dd->state .",". $dd->zipcode;?></a></li>
									<li><a href="#"><?php echo $dd->phone_num; ?></a></li>
									<li><a href="#"> <i class="fa fa-envelope" aria-hidden="true"></i> Email this dealer </a></li>
<!--									<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Get directions </a></li>
									<li><a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Visit Our Website </a></li>
									<li><a href="#"><i class="fa fa-usd" aria-hidden="true"></i> Finance a guitar with us</a></li>-->
								</ul>
							</div>
						</div>
                                                            <?php 
                                                            $desc = $dd->description; 
                                                            } ?>
						<div class="row">
							<div class="col-md-10 col-sm-10 col-xs-12">
								<div class="card">
									<ul class="nav-tabs nav-tabs1" role="tablist">
										<li role="presentation"><a href="#Inventory " aria-controls="home" role="tab" data-toggle="tab">Inventory </a></li>
										<li role="presentation" class="active"><a href="#Dealership " aria-controls="profile" role="tab" data-toggle="tab">About this Dealership </a></li>
									</ul>
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane" id="Inventory">
											<div class="row">
												<div class="col-md-3 col-sm-3 col-xs-12">
													<div class="g-search">
													<div class="" style="background:#fafafa;">
														<span> <h4>SEARCH</h4></span>
														<div class="search-text">
															<p>Make</p>
															<h5>abc</h5>
														</div>
														<div class="search-text">
															<p>Make</p>
															<h5>abc</h5>
														</div>
														<div class="search-text">
															<p>Make</p>
															<h5>abc</h5>
														</div>
													</div>
													
														<span> <h4>Modify Results </h4></span>
														<div class="" style="background:#fafafa;">
														<form role="form" style="padding:5px;">
															<div class="form-group dealer-form">
																<label>MINIMUM YEAR</label>
																<select class="form-control">
																  <option>1</option>
																  <option>2</option>
																  <option>3</option>
																  <option>4</option>
																  <option>5</option>
																</select>
															</div>
															<div class="form-group dealer-form">
															<label>MAXIMUM YEAR</label>
																<select class="form-control">
																  <option>1</option>
																  <option>2</option>
																  <option>3</option>
																  <option>4</option>
																  <option>5</option>
																</select>
															</div>
															<div class="form-group dealer-form">
															<label>MINIMUM PRICE</label>
																<select class="form-control">
																  <option>1</option>
																  <option>2</option>
																  <option>3</option>
																  <option>4</option>
																  <option>5</option>
																</select>
															</div>
															<div class="form-group dealer-form">
															<label>MAXIMUM PRICE</label>
																<select class="form-control">
																  <option>1</option>
																  <option>2</option>
																  <option>3</option>
																  <option>4</option>
																  <option>5</option>
																</select>
															</div>
															<button type="button" class="btn btn-warning btn-block"><strong>Update Values</strong></button>
														</form>
														</div>
														<br>
														<div class="panel-group" id="accordion" style="background:#fafafa;">
															<div class="panel panel-default">
																<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																	<div class="panel-heading">
																		<h4 class="panel-title">Style</h4>
																	</div>
																</a>
																<div id="collapseOne" class="panel-collapse collapse in">
																	<div class="panel-body">
																		<table class="table">
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-pencil text-primary"></span><a href="http://www.jquery2dotnet.com">Articles</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-flash text-success"></span><a href="http://www.jquery2dotnet.com">News</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-file text-info"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-comment text-success"></span><a href="http://www.jquery2dotnet.com">Comments</a>
																					<span class="badge">42</span>
																				</td>
																			</tr>
																		</table>
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
																	<div class="panel-heading">
																		<h4 class="panel-title">Make</h4>
																	</div>
																</a>
																<div id="collapseTwo" class="panel-collapse collapse">
																	<div class="panel-body">
																		<table class="table">
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Orders</a> <span class="label label-success">$ 320</span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Invoices</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Shipments</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Tex</a>
																				</td>
																			</tr>
																		</table>
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
																	<div class="panel-heading">
																		<h4 class="panel-title">Model</h4>
																	</div>
																</a>
																<div id="collapseThree" class="panel-collapse collapse">
																	<div class="panel-body">
																		<table class="table">
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Change Password</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<a href="http://www.jquery2dotnet.com">Import/Export</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">
																						Delete Account</a>
																				</td>
																			</tr>
																		</table>
																	</div>
																</div>
															</div>
															<div class="panel panel-default">
																<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
																	<div class="panel-heading">
																		<h4 class="panel-title">Features</h4>
																	</div>
																</a>
																<div id="collapseFour" class="panel-collapse collapse">
																	<div class="panel-body">
																		<table class="table">
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Customers</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-tasks"></span><a href="http://www.jquery2dotnet.com">Products</a>
																				</td>
																			</tr>
																			<tr>
																				<td>
																					<span class="glyphicon glyphicon-shopping-cart"></span><a href="http://www.jquery2dotnet.com">Shopping Cart</a>
																				</td>
																			</tr>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-9 col-sm-9 col-xs-12">
													<div class="row dealer-sort">
														<div class="form-inline">
															<div class="form-group">
															<label>Sort by : </label>
																<select class="form-control">
																	<option>1</option>
																	<option>2</option>
																	<option>3</option>
																	<option>4</option>
																	<option>5</option>
																</select>
															</div>
															<div class="form-group">
															<label>Page : </label>
																<select class="form-control" style="width:40%;">
																	<option>1</option>
																	<option>2</option>
																	<option>3</option>
																	<option>4</option>
																	<option>5</option>
																</select>
															</div>
															<p class="pull-right">Page 1 of 1</p>
														</div>
													</div>
													<div class="row">
													<br>
														<div class="col-md-3">
															<div class="card card1">
																<h5 class="located">NEWLY LISTED</h5>
																<img class="card-img-top img-responsive" src="images/7.jpg" alt="Card image cap">
																<div class="card-block">
																	<a class="card-title">Lorem Ipsum is simply dummy text </a>
																	<br><br>
																	<h4 style="margin:0px;">$17,488</h4>
																	<p>6,740 miles</p>
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="card card1">
																<h5 class="located">NEWLY LISTED</h5>
																<img class="card-img-top img-responsive" src="images/7.jpg" alt="Card image cap">
																<div class="card-block">
																	<a class="card-title">Lorem Ipsum is simply dummy text </a>
																	<br><br>
																	<h4 style="margin:0px;">$17,488</h4>
																	<p>6,740 miles</p>
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="card card1">
																<h5 class="located">NEWLY LISTED</h5>
																<img class="card-img-top img-responsive" src="images/7.jpg" alt="Card image cap">
																<div class="card-block">
																	<a class="card-title">Lorem Ipsum is simply dummy text </a>
																	<br><br>
																	<h4 style="margin:0px;">$17,488</h4>
																	<p>6,740 miles</p>
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="card card1">
																<h5 class="located">NEWLY LISTED</h5>
																<img class="card-img-top img-responsive" src="images/7.jpg" alt="Card image cap">
																<div class="card-block">
																	<a class="card-title">Lorem Ipsum is simply dummy text </a>
																	<br><br>
																	<h4 style="margin:0px;">$17,488</h4>
																	<p>6,740 miles</p>
																</div>
															</div>
														</div>
													</div>
												
												</div>
											</div>
										</div>
										
										<div role="tabpanel" class="tab-pane active" id="Dealership">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12 inner-tabs">
													<h4><?php echo $desc; ?></h4>
													<div class="col-md-7 col-sm-8 col-xs-12">
													<div class="card">
														<ul class="nav nav-tabs nav-tabs" role="tablist">
															<li role="presentation" class="active"><a href="#used" aria-controls="home" role="tab" data-toggle="tab">used</a></li>
															<li role="presentation"><a href="#new" aria-controls="profile" role="tab" data-toggle="tab">New</a></li>
														</ul>
														<div class="tab-content">
															<div role="tabpanel" class="tab-pane active" id="used">
																<div class="left-side">
																	<div class="row">
																		<div class="col-md-6 col-sm-4 col-xs-12">
																			<a href="">
																				<h4>Guitar</h4>
																				<p>Available 9</p>
																			</a>
																		</div>
																		<div class="col-md-6 col-sm-8 col-xs-12">
																			<img src="images/8.jpg" class="img-responsive"/>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-md-6 col-sm-6 col-xs-12">
																			<div class="col-md-6 col-sm-4 col-xs-12">
																				<a href="">
																					<h4>Guitar</h4>
																					<p>Available 9</p>
																				</a>
																			</div>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<img src="images/8.jpg" class="img-responsive"/>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12">
																			<div class="col-md-6 col-sm-4 col-xs-12">
																				<a href="">
																					<h4>Guitar</h4>
																					<p>Available 9</p>
																				</a>
																			</div>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<img src="images/7.jpg" class="img-responsive"/>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12">
																			<div class="col-md-6 col-sm-4 col-xs-12">
																				<a href="">
																					<h4>Guitar</h4>
																					<p>Available 9</p>
																				</a>
																			</div>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<img src="images/7.jpg" class="img-responsive"/>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12">
																			<div class="col-md-6 col-sm-4 col-xs-12">
																				<a href="">
																					<h4>Guitar</h4>
																					<p>Available 9</p>
																				</a>
																			</div>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<img src="images/7.jpg" class="img-responsive"/>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12">
																			<div class="col-md-6 col-sm-4 col-xs-12">
																				<a href="">
																					<h4>Guitar</h4>
																					<p>Available 9</p>
																				</a>
																			</div>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<img src="images/7.jpg" class="img-responsive"/>
																			</div>
																		</div>
																		<div class="col-md-6 col-sm-6 col-xs-12">
																			<div class="col-md-6 col-sm-4 col-xs-12">
																				<a href="">
																					<h4>Guitar</h4>
																					<p>Available 9</p>
																				</a>
																			</div>
																			<div class="col-md-6 col-sm-6 col-xs-12">
																				<img src="images/7.jpg" class="img-responsive"/>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div role="tabpanel" class="tab-pane active" id="new">
														</div>
													</div> <!--tab content-->
													</div></div>
													<div class="col-md-offset-1 col-md-4 col-sm-4 col-xs-12 right-side">
                                                                                                            <?php foreach ($dealer_services as $dd) { ?>
														<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13724.278879461652!2d76.7502334!3d30.688314400000003!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1473325522739" width="100%" height="270" frameborder="0" style="border:0" allowfullscreen></iframe>
														<br>
														<div class="row">
															<h4>Hours Of Operations</h4>
															<p><?php echo $dd->hours; ?><br></p>
														</div>
														<div class="row">
															<h4>Services and Amenities</h4>
															<ul style="list-style-type: circle;">
																<li><?php echo $dd->service_name; ?> </li>
																
															</ul>
														</div>
<!--														<div class="row">
															<h4>Why You Should Buy a New Guitars From Us </h4>
															<p>Lorem Ipsum is simply dummy text of the </p>
														</div>-->
                                                                                                            <?php } ?>
													</div>
												
												<!-- <div class="col-md-4 col-sm-4 col-xs-12"></div> -->
											</div>
										</div>
									
								</div>
							</div>
						</div>
					</div>
				</main>
<?php include('footer.php'); ?>