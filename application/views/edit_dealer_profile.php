<?php include("header.php"); ?>
<style>
   .rift-raff-nav .open > a, .rift-raff-nav .open > a:focus, .rift-raff-nav .open > a:hover {background-color: #3e9cc5;border-color: #337ab7;border-radius: 18px;color: #fff;} 
    .rift-raff-nav > li > a{background:none;font-size:16px;font-weight:600;color:#000;}
     .rift-raff-nav > li > a{padding:10px 30px!important;}
    .rift-raff-nav li:focus, .rift-raff-nav li:hover{background-color: #3e9cc5; border-color: #337ab7; border-radius: 18px;color: #fff;}
    .nav>li>a:hover{background:transparent;color:#fff;}
</style>
<main>
    
    <form action="/index.php/riftraff/update_dealer_account_info" method="post" enctype="multipart/form-data">
        <?php foreach ($user_data as $dd) { ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h1><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Account</h1>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                    <ul class="nav navbar-nav rift-raff-nav"><br>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                            <ul class="dropdown-menu">
                                <?php if ($this->session->userdata['logged_in']['type'] == 'dealer') { ?>
                                    <li><a href="/index.php/riftraff/dealer_profile">Profile</a></li>
                                    <?php if ($this->session->userdata['logged_in']['complete_profile'] == 0) { ?>
                                        <li><a href="/index.php/riftraff/dealer_account">My Dashboard</a></li>
                                    <?php } else { ?>
                                        <li><a href="/index.php/riftraff/edit_dealer_profile">My Dashboard</a></li>
                                    <?php } ?>
                                    <li><a href="/index.php/riftraff/dealer_services">Add services</a></li> 

                                <?php } else if ($this->session->userdata['logged_in']['type'] == 'seller') { ?>
                                    <li><a href="/index.php/riftraff/seller_profile">Profile</a></li>
                                    <?php if ($this->session->userdata['logged_in']['complete_profile'] == 0) { ?>
                                        <li><a href="/index.php/riftraff/seller_account">My Dashboard</a></li>
                                    <?php } else { ?>
                                        <li><a href="/index.php/riftraff/edit_seller_profile">My Dashboard</a></li>
                                    <?php } ?>



                                    <?php
                                } else {
                                    
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                            <ul class="dropdown-menu">
                                <li><a href="/index.php/riftraff/product_list">Product list </a></li>
                                <li><a href="/index.php/riftraff/add_product">Add Product </a></li>
                                <li><a href="/index.php/riftraff/import">Import </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                    <div class="col-md-3 col-xs-12 col-sm-12 text-center"><br>
                        <button type="submit" class="btn btn-default product">Update</button>
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
                                    <input type="email" class="form-control" id="text" value = "<?php echo $dd->email_address; ?>" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Facebook ID:</label>
                                    <input type="text" class="form-control" id="text1" value = "<?php echo $dd->facebook_id; ?>" name="facebook_id" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Name of Your Business:</label>
                                    <input type="text" class="form-control" id="text2" value = "<?php echo $dd->business_name; ?>" name="business_name" required>
                                </div>
                            </div>	
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Phone Number:</label>
                                    <input type="text" class="form-control" id="text3" value = "<?php echo $dd->phone_num; ?>" name = "phone_num" required >
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
                                    <input type="text" class="jscolor form-control" name="address"value = "<?php echo $dd->address; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Languages Spoken:</label><br>
                                    <input type="text" class="jscolor form-control" name="lspoken"value = "<?php echo $dd->languages_spoken; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Company Logo:</label>
                                    
                                    <input type="hidden" name="old_fileeee" value = "<?php echo $dd->company_logo; ?>" />
                                    <input type="file" name="img" id="imgInp">
                                    <img id="blah" src="#" alt="your image" style="width:100px;height:100px;padding-top:10px;display:none !important;" />
                                </div>
                                <p class="help-block" style="color:#ff0000">Maximum size 94 x 47..</p>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Dealer Image:</label>
                                   
                                    <input type="hidden" name="old_file_dealerr" value = "<?php echo $dd->company_logo; ?>" />
                                    <input type="file" name="dealer_img" id="imgInpp">
                                    <img id="blahh" src="#" alt="your image" style="width:100px;height:100px;padding-top:10px;display:none !important;" />
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
                                    <label for="exampleSelect1">Main Tagline:</label>
                                    <input type="text" name="tagline" value="<?php echo $dd->tagline; ?>" class="jscolor form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleSelect1">Company Description:</label>
                                    <textarea name="company_desc" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"><?php echo $dd->description; ?></textarea>
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
                                    <input type="text" name="keywords" value="<?php echo $dd->keywords; ?>" class="jscolor form-control">
                                    <!--<textarea name="keywords" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"><?php // echo $dd-> keywords ; ?></textarea>-->
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
                                    <input type="text" class="form-control" id="text" name="street" value = "<?php echo $dd->street; ?>"  required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Unit or Suite:</label>
                                    <input type="text" class="form-control" id="text1" name="unit"  value = "<?php echo $dd->unit; ?>" required >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">City:</label>
                                    <input type="text" class="form-control" id="text2" name="city" value = "<?php echo $dd->city; ?>"  required>
                                </div>
                            </div>	
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">State:</label>
                                    <input type="text" class="form-control" id="text3 " name="state" value = "<?php echo $dd->state; ?>"  required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">Zip Code:</label><br>
                                    <input type="text" class="jscolor form-control" name="zipcode" value = "<?php echo $dd->zipcode; ?>"  required>
                                </div>
                            </div>

                            <!--									<div class="col-md-12 text-right">
                                                                                                            <button type="button" class="btn btn-default product">Save</button>
                                                                                                             <button type="button" class="btn btn-default product">Cancel</button> 
                                                                                                    </div>-->

                        </div></div>

                    <div class="col-md-11" style="">
                        <br><br>
                        <div class="col-md-3 account-left"><h4><strong>Hours Of Operation</strong></h4></div>
                        <div class="col-md-9 account-right">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">From Day:</label>
                                    <select name="fday" class="form-control">
                                        
                                        <option <?php if($dd->fday == 'Mon') {echo "selected"; } ?> value="Mon">Monday</option>
                                        <option <?php if($dd->fday == 'Tue') {echo "selected"; } ?> value="Tue">Tuesday</option>
                                        <option <?php if($dd->fday == 'Wed') {echo "selected"; } ?> value="Wed">Wednesday</option>
                                        <option <?php if($dd->fday == 'Thur') {echo "selected"; } ?> value="Thur">Thursday</option>
                                        <option <?php if($dd->fday == 'Fri') {echo "selected"; } ?> value="Fri">Friday</option>
                                        <option <?php if($dd->fday == 'Sat') {echo "selected"; } ?> value="Sat">Saturday</option>
                                        <option <?php if($dd->fday == 'Sun') {echo "selected"; } ?> value="Sun">Sunday</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">To Day:</label>
                                    <select name="tday" class="form-control">
                                        
                                        <option <?php if($dd->tday == 'Mon') {echo "selected"; } ?> value="Mon">Monday</option>
                                        <option <?php if($dd->tday == 'Tue') {echo "selected"; } ?> value="Tue">Tuesday</option>
                                        <option <?php if($dd->tday == 'Wed') {echo "selected"; } ?> value="Wed">Wednesday</option>
                                        <option <?php if($dd->tday == 'Thur') {echo "selected"; } ?> value="Thur">Thursday</option>
                                        <option <?php if($dd->tday == 'Fri') {echo "selected"; } ?> value="Fri">Friday</option>
                                        <option <?php if($dd->tday == 'Sat') {echo "selected"; } ?> value="Sat">Saturday</option>
                                        <option <?php if($dd->tday == 'Sun') {echo "selected"; } ?> value="Sun">Sunday</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">From Time:</label>
                                    <input id="basicExample" type="text" class="time jscolor form-control" name="ftime" value="<?php echo $dd->ftime; ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text">To Time:</label>
                                    <input id="basicExample1" type="text" class="time jscolor form-control" name="ttime" value="<?php echo $dd->ttime; ?>"/>
                                </div>
                            </div>


                            <!--									<div class="col-md-12 text-right">
                                                                                                            <button type="button" class="btn btn-default product">Save</button>
                                                                                                             <button type="button" class="btn btn-default product">Cancel</button> 
                                                                                                    </div>-->

                        </div></div>

                    <!--								<div class="col-md-11" style="">
                                                                                    <br><br>
                                                                                            <div class="col-md-3 account-left"><h4><strong>Payment Details</strong></h4></div>
                                                                                            <div class="col-md-9 account-right">
                                                                                                    
                                                                                                    <div class="col-md-12">
                                                                                                            <div class="form-group">
                                                                                                                    <label for="exampleSelect1">Payment Details:</label>
                                                                                                                    <textarea name="Payment" cols=""  style="width: 100%; height: 200px;" placeholder=""></textarea>
                                                                                                            </div>
                                                                                                    </div>
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
                                                                                                    <div class="col-md-12 text-right">
                                                                                                            <button type="button" class="btn btn-default product">Save</button>
                                                                                                             <button type="button" class="btn btn-default product">Cancel</button> 
                                                                                                    </div>
                                                                                                    
                                                                                            </div>
                                                                                        
                                                                                    </div>-->


                </div>	
            </div>
            <div class="col-md-4 text-center pull-right"><br>
                <button type="submit" class="btn btn-default product">Update</button>
                <button type="button" class="btn btn-default product">Cancel</button>
            </div>
        <?php } ?>
    </form>
</main>
<?php include("footer.php"); ?>
<script>
    $(function () {
        $('#basicExample').timepicker();
        $('#basicExample1').timepicker();
    });
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blahh').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {

        readURL(this);
        $("#blah").show();
    });
    $("#imgInpp").change(function () {

        readURL(this);
        $("#blahh").show();
    });

</script>