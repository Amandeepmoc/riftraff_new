<?php include("header.php"); ?>
<main >
    <form action="/index.php/riftraff/dealer_account_info" method="post" enctype="multipart/form-data">
					<div class="col-md-11">
						<div class="row">
							<div class="col-md-8">
								<h1><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Account</h1>
							</div>
							<div class="col-md-4 text-center"><br>
                                                                <button type="submit" class="btn btn-default product">Save</button>
								<button type="button" class="btn btn-default product">Cancel</button>
							</div>
						</div>
						<hr>
						<div class="col-md-12 dealer">
							<br>
							<h1 class="text-center"> Add Your Profile Information</h1>
							<br>
							<div class="col-md-11" style="">
								<div class="col-md-3 account-left"><h4><strong>Account Information</strong></h4></div>
								<div class="col-md-9 account-right">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="text"> Email Address:</label>
                                                                                        <input type="email" class="form-control" id="text" name="email" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Facebook ID:</label>
											<input type="text" class="form-control" id="text1" name="facebook_id" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Name of Your Business:</label>
											<input type="text" class="form-control" id="text2" name="business_name" required>
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Phone Number:</label>
											<input type="text" class="form-control" id="text3" name = "phone_num" required >
										</div>
									</div>
<!--									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Country:</label>
											<select class="form-control" id="">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
										</div>
									</div>-->
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Address:</label><br>
											<input type="text" class="jscolor form-control" name="address" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Company Logo:</label>
											<input type="file" name="img" id="imgInp">
                                                                                        <img id="blah" src="#" alt="your image" style="width:100px;height:100px;padding-top:10px;display:none !important;" />
										</div>
									</div>
<!--									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Company Banner:</label>
											<input type="file" name="img1">
										</div>
									</div>-->
									<div class="col-md-12">
										<div class="form-group">
											<label for="exampleSelect1">Company Description:</label>
											<textarea name="company_desc" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"></textarea>
										</div>
									</div>
									
<!--									<div class="col-md-12">
										<div class="form-group">
										<label for="exampleSelect1">Meta Description:</label>
											<textarea name="area12" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"></textarea>
										</div>
									</div>-->
									<div class="col-md-12">
										<div class="form-group">
										<label for="">Keywords: </label>
											<textarea name="keywords" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"></textarea>
											<p class="help-block" style="color:#ff0000">Enter Meta Keywords Comma(',') Separated.. </p>
										</div>
									</div>
<!--									<div class="col-md-12 text-right">
										<button type="button" class="btn btn-default product">Save</button>
										 <button type="button" class="btn btn-default product">Cancel</button> 
									</div>-->
									
								</div></div>
                                                        
							<div class="col-md-11" style="">
                                                           <br><br>
								<div class="col-md-3 account-left"><h4><strong>Address Information</strong></h4></div>
								<div class="col-md-9 account-right">
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Street:</label>
											<input type="text" class="form-control" id="text" name="street" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Unit or Suite:</label>
											<input type="text" class="form-control" id="text1" name="unit" required >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">City:</label>
											<input type="text" class="form-control" id="text2" name="city" required>
										</div>
									</div>	
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">State:</label>
											<input type="text" class="form-control" id="text3 " name="state" required>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="text">Zip Code:</label><br>
											<input type="text" class="jscolor form-control" name="zipcode" required>
										</div>
									</div>
				
<!--									<div class="col-md-12 text-right">
										<button type="button" class="btn btn-default product">Save</button>
										 <button type="button" class="btn btn-default product">Cancel</button> 
									</div>-->
									
								</div></div>
								
								<div class="col-md-11" style="">
								<br><br>
									<div class="col-md-3 account-left"><h4><strong>Payment Details</strong></h4></div>
									<div class="col-md-9 account-right">
										
<!--										<div class="col-md-12">
											<div class="form-group">
												<label for="exampleSelect1">Payment Details:</label>
												<textarea name="Payment" cols=""  style="width: 100%; height: 200px;" placeholder=""></textarea>
											</div>
										</div>-->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
											<label for="text">Payment Detail:</label>
											<select class="form-control" id="" name="payment" required>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
											</select>
                                                                                    </div>
                                                                                </div>
<!--										<div class="col-md-12 text-right">
											<button type="button" class="btn btn-default product">Save</button>
											 <button type="button" class="btn btn-default product">Cancel</button> 
										</div>-->
										
									</div>
                                                                    
								</div>
                                                           
							
						</div>	
					</div>
                                                        <div class="col-md-4 text-center pull-right"><br>
								<button type="submit" class="btn btn-default product">Save</button>
								<button type="button" class="btn btn-default product">Cancel</button>
							</div>
    </form>
				</main>
<?php include("footer.php"); ?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        
        readURL(this);
        $("#blah").show();
    });
        
</script>