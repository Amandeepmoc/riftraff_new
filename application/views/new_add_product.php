<!DOCTYPE html>
<?php include("header.php"); ?>
<style>
    .padding-top{padding-top:20px;}.padding1{padding:20px !important}
    .rift-raff-nav .open > a, .rift-raff-nav .open > a:focus, .rift-raff-nav .open > a:hover {background-color: #3e9cc5;border-color: #337ab7;border-radius: 18px;color: #fff;} 
    .rift-raff-nav > li > a{background:none;font-size:16px;font-weight:600;color:#000;}
    .rift-raff-nav > li > a{padding:10px 30px!important;}
    .rift-raff-nav li:focus, .rift-raff-nav li:hover{background-color: #3e9cc5; border-color: #337ab7; border-radius: 18px;color: #fff;}
    .nav>li>a:hover{background:transparent;color:#fff;}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-5 n">
            <h1><i class="fa fa-tag" aria-hidden="true"></i>Add Product</h1>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-7">
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
        <div class="col-md-5 col-sm-5 col-xs-12 text-center"><br>
            <button type="button" class="btn btn-default product">Continue</button>
            <button type="button" class="btn btn-default product">Cancel</button>
            <a href="index.php/riftraff/add_product" type="button" class="btn btn-default product" style="font-size:13px;padding:0px 10px!important;">ADD <br>another product</a>

        </div>
    </div>
    <hr>
    <br>
    <div class="container-fluid">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <form>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                    <label for="sel1">Category</label>
                    <select name="category" class="form-control" id="Selectcat">

                        <?php foreach ($category as $categry) { ?>
                            <option value="<?php echo $categry->id; ?>"><?php echo $categry->category_name; ?></option>
                        <?php } ?>


                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                    <label for="sel2">Sub-Category</label>
                    <select name="sub_category" class="form-control select_cat" id="cat">

                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12">
                    <label for="exampleSelect1">Title</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Title" required>
                </div>
                <!-- </form> -->
        </div>
        <!--        <div class="col-md-12 col-sm-12 col-xs-12 add-product" style="padding-left:0px;padding-right:0px;padding-bottom:10px;">
                    <div class="head">ADD YOUR PRODUCT</div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" id="usr" placeholder="Brand Name">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="pwd" placeholder="Brand Model">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="pwd" placeholder="Year">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="pwd" placeholder="Price">
                            </div>
                            <div class="bbox">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">Hot Sale Item</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="pwd" placeholder="Year">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="pwd" placeholder="Price">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <br>
                            <div class="border" style="position:relative;min-height:354px;">
                                <div class="head1"><div class="numbers" style=""><span class="">1</span></div>
                                    <p style="">PRODUCT IMAGES<p>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <br>
                            <div class="border">
                                <div class="head1"><div class="numbers" style=""><span class="">2</span></div>
                                    <p style="">DESCRIPTION<p>
                                </div>
                                <div style="padding:0px 10px;">
                                    <h5>Describe Your Product    &nbsp;&nbsp;&nbsp; (200 character limit, with spaces)</h5>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 padding">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <br>
                            <div class="border">
                                <div class="head1"><div class="numbers" style=""><span class="">3</span></div>
                                    <p style="">FEATURES<p>
                                </div>
                                <div class="row">
                                    <br>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Vendor Code</label>
                                                    <input name="vendor_code" class="form-control  Div1" id="exampleInputEmail1" placeholder="Vendor Code" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Vendor SKU</label>
                                                    <input name="Vendor_SKU" class="form-control  Div1" id="exampleInputEmail1" placeholder="Vendor SKU" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Model Number</label>
                                                    <input name="model_number" class="form-control  Div1" id="exampleInputEmail1" placeholder="Model Number" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">UPC</label>
                                                    <input name="UPC" class="form-control  Div1" id="exampleInputEmail1" placeholder="UPC" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">New Brand</label>
                                                    <input name="new_brand " class="form-control  Div1" id="exampleInputEmail1" placeholder="New Brand" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Model Name</label>
                                                    <input name="model_name " class="form-control  Div1" id="exampleInputEmail1" placeholder="Model Name" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Color Name</label>
                                                    <input name="color_name " class="form-control  Div1" id="exampleInputEmail1" placeholder="Color Name" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Bullet Feature 1 </label>
                                                    <input name="bullet_feature 1 " class="form-control  Div1" id="exampleInputEmail1" placeholder="Bullet Feature 1 " required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Bullet Feature 2</label>
                                                    <input name="bullet_feature 2" class="form-control  Div1" id="exampleInputEmail1" placeholder="Bullet Feature 2" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Bullet Feature 3</label>
                                                    <input name="bullet_feature 3" class="form-control  Div1" id="exampleInputEmail1" placeholder="Bullet Feature 3" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Bullet Feature 4</label>
                                                    <input name="bullet_feature 4" class="form-control  Div1" id="exampleInputEmail1" placeholder="Bullet Feature 4" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Bullet Feature 5</label>
                                                    <input name="bullet_feature 5" class="form-control  Div1" id="exampleInputEmail1" placeholder="Bullet Feature 5" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Search Keywords</label>
                                                    <input name="search_keywords" class="form-control  Div1" id="exampleInputEmail1" placeholder="Search Keywords" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Product Warranty</label>
                                                    <input name="product_warranty" class="form-control  Div1" id="exampleInputEmail1" placeholder="Product Warranty" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Country of Origin</label>
                                                    <input name="country_of_origin" class="form-control  Div1" id="exampleInputEmail1" placeholder="Country of Origin" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Do you have an MSRP?</label>
                                                    <input name="msrp" class="form-control  Div1" id="exampleInputEmail1" placeholder="Do you have an MSRP?" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">List Price or MSRP</label>
                                                    <input name="list_price" class="form-control  Div1" id="exampleInputEmail1" placeholder="List Price or MSRP" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">MAP (Minimum Advertised Price)</label>
                                                    <input name="map" class="form-control  Div1" id="exampleInputEmail1" placeholder="MAP (Minimum Advertised Price)" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Package Length</label>
                                                    <input name="package_length" class="form-control  Div1" id="exampleInputEmail1" placeholder="Package Length" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Package Height</label>
                                                    <input name="package_height" class="form-control  Div1" id="exampleInputEmail1" placeholder="Package Height" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Speaker Configuration</label>
                                                    <input name="speaker_ configuration" class="form-control  Div1" id="exampleInputEmail1" placeholder="Speaker Configuration" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Package Width</label>
                                                    <input name="package_width" class="form-control  Div1" id="exampleInputEmail1" placeholder="Package Width" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Output Wattage (in watts)</label>
                                                    <input name="Output_Wattage (in watts)" class="form-control  Div1" id="exampleInputEmail1" placeholder="Output Wattage (in watts)" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Package Weight </label>
                                                    <input name="package_weight" class="form-control  Div1" id="exampleInputEmail1" placeholder="Package Weight " required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Number of Channels</label>
                                                    <input name="number_of_channels" class="form-control  Div1" id="exampleInputEmail1" placeholder="Number of Channels" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Model Year</label>
                                                    <input name="model_year" class="form-control  Div1" id="exampleInputEmail1" placeholder="Model Year" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Stock Value</label>
                                                    <input name="stock_value" class="form-control  Div1" id="exampleInputEmail1" placeholder="Stock Value" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Power and Preamp Type</label>
                                                    <input name="poweramp" class="form-control  Div1" id="exampleInputEmail1" placeholder="Power and Preamp Type" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding:0px 15px;">
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Electronic Construction</label>
                                                    <input name="elect_const" class="form-control  Div1" id="exampleInputEmail1" placeholder="Electronic Construction" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Fx Loop</label>
                                                    <input name="fx_loop" class="form-control  Div1" id="exampleInputEmail1" placeholder="Fx Loop" required="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="exampleSelect1">Reverb</label>
                                                    <input name="reverb" class="form-control  Div1" id="exampleInputEmail1" placeholder="Reverb" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <br>
                            <div class="border">
                                <div class="head1"><div class="numbers" style=""><span class="">4</span></div>
                                    <p style="">SHIPPING<p>
                                </div>
                                <div style="padding:0px 10px;">
                                    <br>
                                    <label class="checkbox-inline"><input type="checkbox" value=""><strong>Shipping</strong></label>
                                    <label class="checkbox-inline"><input type="checkbox" value=""><strong>Local Pickup</strong></label>
                                    <h5 class="shipping">Where are you shipping from?</h5>
                                    <div class="form-group">
                                        <label for="exampleSelect1">Country</label>
                                        <input name="vendor_code" class="form-control  Div1" id="exampleInputEmail1" placeholder="Vendor Code" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect1">City</label>
                                        <input name="vendor_code" class="form-control  Div1" id="exampleInputEmail1" placeholder="Vendor Code" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect1">State</label>
                                        <input name="vendor_code" class="form-control  Div1" id="exampleInputEmail1" placeholder="Vendor Code" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect1">Shipping Policy</label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 upload-image1" >
                        <div class="col-md-12 col-sm-12 col-xs-12"> 
                            <p>Upload Image</p>
                            <form action="/index.php/riftraff/insert_product_phase_final" class="dropzone"  method="post"  >
                                <input type="hidden" name="product_id" value="<?php //echo $this->uri->segment(3);   ?>">
                            </form>
                        </div>
                    </div>
                </div>-->
    </div>
</div>
<br>
<br>
<br><br><br>






<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        $(".calltoimage").change(function () {
            var brand = $("#brand").val();
            var color = $("#colour").val();

            //
            var param = "brand=" + brand + "&color=" + color;


            $.ajax({
                type: 'POST',
                url: "/index.php/riftraff/fetch_images_ajax",
                dataType: 'html',
                data: param,
                success: function (response) {
                    var result = JSON.parse(response);
                    if (result != "0")
                    {
                        $(".show_images").empty();
                        var n = 1;
                        $(".show_images").show();
                        for (var i = 0; i < result.length; i++)
                        {

                            console.log(n);
                            var id = "ex" + n;
                            var vall = result[i]['image_path'];
                            var content = "http://rr.mediaoncloud.com/uploads/" + result[i]['image_path'];

                            $(".show_images").append('<div class="col-md-3 col-sm-3 col-xs-12"><input type="checkbox" class="checkbox" name="image_select[]" id="' + id + '" value="' + vall + '" /><label for="' + id + '" class="label"><img class="img-responsive"  src="' + content + '" /><a href="#img1"></a></label></div>');
                            n++;
                        }

                    } else
                    {
                        $(".show_images").empty();
                        $(".show_images").append("No images found!!");
                    }



                    // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
                    // alert("Thanks, We will contact you soon.");
                    //  window.location = "uiuxwebdesign.php";

                    // }
                }
            });

            //
        });
        $("#Selectcat").on('change', function () {
            var dd = $(this).val();
            var param = "dd=" + dd;
            //alert(dd);
            window.location.href = "/index.php/riftraff/add_productt/" + dd;
            /* $.ajax({
             type: 'POST',
             url: "/index.php/riftraff/fetch_sub_categories",
             dataType: 'html',
             data: param,
             success: function (response) {
             var result = JSON.parse(response);
             console.log(result);
             if (result != "0")
             {
             $(".select_cat").empty();
             for (var i = 0; i < result.length; i++)
             {
             var id = result[i]['id'];
             var content = result[i]['sub_category_name'];
             
             $(".select_cat").append('<option value="' + id + '">' + content + '</option>');
             
             }
             
             } else
             {
             $(".select_cat").empty();
             $(".select_cat").append("<option value='  '>No Sub Categories for this </option>");
             }
             
             
             // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
             // alert("Thanks, We will contact you soon.");
             //  window.location = "uiuxwebdesign.php";
             
             // }
             }
             }); */

        });
        $(".shipping").click(function () {
            if ($(this).is(":checked")) {
                var cur = $(this).val();
                if (cur == 'local_pickup')
                {
                    $(".for_local").show();
                }

                if (cur == 'shipping')
                {
                    $(".for_shipping").show();
                }

            }
        });
    });

    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>

