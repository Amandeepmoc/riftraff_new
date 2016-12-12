<?php include("header.php"); ?>
<main >
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-md-1 col-sm-1 col-xs-3"></div>
							<div class="col-md-7 col-sm-7 col-xs-9">
								<h1><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Account</h1>
							</div>
							<!-- <div class="col-md-4 text-center"><br>
								<button type="button" class="btn btn-default product">Save</button>
								<button type="button" class="btn btn-default product">Cancel</button>
							</div> -->
						</div>
						<hr>
						<div class="col-md-12 col-sm-12 col-xs-12 dealer">
							<br>
							<h1 class="text-center">Add Services</h1>
							<br>
							<div class="col-md-11" style="">
								<div class="col-md-3 col-sm-3 col-xs-12 account-left"><h4><strong>Dealer Information</strong></h4></div>
								<div class="col-md-9 col-sm-6 col-xs-12 account-right">
									<form action="/index.php/riftraff/add_services_provided" method="post">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="text">Service Type:</label>
											<select class="form-control" id="service_type" name = "service_type">
												<option value = "Lessons">Lessons</option>	
												<option value = "Repairs" >Repairs</option>
												<option value = "Rentals">Rentals</option>
                                                                                                <option value = "Rehearsal">Rehearsal Space Options</option>	
											</select>
										</div>
									</div>
                                                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                                                             <div class="form-group">
                                                                                <label for="exampleSelect1">Select Service</label>
                                                                                    <select name="service_id" class="form-control select_cat" id="service" >

                                                                                    </select>
                                                                            </div>
                                                                         </div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="text">Shop Name:</label>
                                                                                        <input type="text" class="form-control" id="text" name="shop_name" required>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="text">Hours Of Operation:</label><br>
											<input type="text" class=" form-control" name="hours" placeholder = "9 am to 5 am" required>
										</div>
									</div>
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="text">Address:</label><br>
											<input type="text" class=" form-control" name="address"  required>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="text">Phone Number:</label><br>
											<input type="numbers" class="form-control" name="phone_num" required>
										</div>
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="form-group">
											<label for="text">Email Address:</label><br>
											<input type="email" class=" form-control" name="email" required>
										</div>
									</div>
								
								</div>
								</div>
								<div class="col-md-11" style="">
								<br><br>
									<div class="col-md-3 col-sm-3 col-xs-12 account-left"><h4><strong>Address</strong></h4></div>
									<div class="col-md-9 col-sm-9 col-xs-12 account-right">
										<form>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="text">Street:</label><br>
												<input type="text" class=" form-control" name="street" required>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="text">Unit or Suite:</label><br>
												<input type="text" class=" form-control" name="unit" required>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="text">City:</label><br>
												<input type="text" class=" form-control" name="city" required>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="text">State:</label><br>
												<input type="text" class=" form-control" name="state" required >
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label for="text">Zip Code:</label><br>
												<input type="text" class=" form-control" name="zipcode" required>
											</div>
										</div>
										<div class="col-md-12 text-right">
											<button type="submit" class="btn btn-default product">Save</button>
											<button type="button" class="btn btn-default product">Cancel</button> 
										</div>
										</form>
									</div>
								</div>
								<!-- <div class="col-md-11" style="">
								<br><br>
									<div class="col-md-3 account-left"><h4><strong>Payment Details</strong></h4></div>
									<div class="col-md-9 account-right">
										<form>
										<div class="col-md-12">
											<div class="form-group">
												<label for="text">Phone Number:</label><br>
												<input type="numbers" class="form-control">
											</div>
										</div>
										
										</form>
									</div>
								</div> -->
						</div>	
					</div>
				</main>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
    $(document).ready(function(){
       $("#service_type").on('change',function(){
            var dd = $(this).val();
            var param  = "dd="+dd;
            //alert(dd);
             $.ajax({
                  type: 'POST',
                  url: "/index.php/riftraff/fetch_services",
                  dataType: 'html',
                  data:param,

                success: function(response) {
                   var result =  JSON.parse(response);
                   console.log(result);
                   if(result != "0")
                   {
                       $(".select_cat").empty();
                       for(var i = 0; i<result.length; i++)
                       {
                           var id = result[i]['id'];
                           var content = result[i]['service_name'];
                           
                           $(".select_cat").append('<option value="'+ id +'">'+ content +'</option>');
                           
                       }
                       
                   }
                   else
                   {
                        $(".select_cat").empty();
                        $(".select_cat").append("<option value='  '>No services for this </option>");
                   }

                
               // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
                // alert("Thanks, We will contact you soon.");
               //  window.location = "uiuxwebdesign.php";

               // }
               }
        });
        
        }); 
    });
</script>