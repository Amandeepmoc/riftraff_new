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
        <form action="/index.php/riftraff/insert_product_phase_one" method="post">
            <div class="col-md-5 col-sm-5 col-xs-12 text-center"><br>
                <button type="submit" class="btn btn-default product">Save</button>
                <button type="button" class="btn btn-default product">Cancel</button>
                <button type="button" class="btn btn-default product" style="font-size:13px;padding:0px 10px!important;">ADD <br>another product</button>

            </div>
    </div>
    <hr>
    <br>
    <div class="container-fluid">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                <label for="sel1">Category</label>
                <select name="category" class="form-control" id="Selectcat">
                    <?php foreach ($category as $categry) { ?>

                        <option value="<?php echo $categry->id; ?>" <?php if ($categry->id == $this->uri->segment(3)) {
                        echo "selected";
                    } else {
                        
                    } ?> ><?php echo $categry->category_name; ?></option>


<?php } ?>

                </select>

            </div>
            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                <label for="sel2">Sub-Category</label>
                <select name="sub_category" class="form-control" id="cat">
                    <?php
                    if (!empty($sub_category)) {
                        foreach ($sub_category as $categry) {
                            ?>
                            <option value="<?php echo $categry->id; ?>"><?php echo $categry->sub_category_name; ?></option>
                            <?php
                        }
                    } else {
                        ?>
                        <option value=" ">No results found</option>
<?php } ?>									
                </select>

            </div>
            <div class="form-group col-md-3 col-sm-3 col-xs-12">
                <label for="exampleSelect1">Title</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Title" required>
            </div>
            <!-- </form> -->
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 add-product" style="padding-left:0px;padding-right:0px;padding-bottom:10px;">
            <div class="head">ADD YOUR PRODUCT</div>
            <div class="col-md-12 col-sm-12 col-xs-12 padding">
                <div class="col-md-2 col-sm-12 col-xs-12">

                    <br>
                            <?php foreach ($attribute_Set as $attribute) { ?>
                                <?php if ($attribute->attribute_code == 'brand_name') { ?>
                            <div class="form-group">
                                <select name="<?php echo $attribute->attribute_code; ?>" class="form-control select_brand calltoimage" id="brand">
        <?php foreach ($brands as $brand) { ?>
                                        <option value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
                            <?php } ?>
                                </select>
                            </div>
                            <?php
                        }
                    } foreach ($attribute_Set as $attribute) {
                        if ($attribute->attribute_code == 'model_name') {
                            ?>
                            <div class="form-group">
                                <input type="text" name="<?php echo $attribute->attribute_code; ?>" class="form-control" id="pwd" placeholder="Brand Model">
                            </div>
                            <?php
                        }
                    } foreach ($attribute_Set as $attribute) {
                        if ($attribute->attribute_code == 'model_year') {
                            ?>
                            <div class="form-group">
                                <input type="text" name="<?php echo $attribute->attribute_code; ?>" class="form-control" id="pwd" placeholder="Year">
                            </div>
                            <?php
                        }
                    } foreach ($attribute_Set as $attribute) {
                        if ($attribute->attribute_code == 'cost_price') {
                            ?>
                            <div class="form-group">
                                <input type="text" name="<?php echo $attribute->attribute_code; ?>" class="form-control" id="pwd" placeholder="Price">
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="bbox">
                        <div class="checkbox">
                            <label><input name="hh" type="checkbox" value="hot_sale">Hot Sale Item</label>
                        </div>
                        <div class="form-group">
                            <input name="sale_price" type="text" class="form-control" id="pwd" placeholder="Sale Price">
                        </div>
                        <div class="form-group">
                            <input name="original_price" type="text" class="form-control" id="pwd" placeholder="Original Price">
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
                        <?php
                        foreach ($attribute_Set as $attribute) {
                            if ($attribute->attribute_code == 'product_desc') {
                                ?>
                                <div style="padding:0px 10px;">
                                    <h5>Describe Your Product    &nbsp;&nbsp;&nbsp; (200 character limit, with spaces)</h5>

                                    <div class="form-group">
                                        <textarea class="form-control" name = "<?php echo $attribute->attribute_code; ?>"rows="5" id="comment"></textarea>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
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

                                <?php
                                $i = 0;
                                $len = count($attribute_Set);
                                $k = 0;

                                foreach ($attribute_Set as $attribute) {
                                    ?>
                                    <?php
                                    if (( $attribute->attribute_code != 'brand_name') and ( $attribute->attribute_code != 'model_name') and ( $attribute->attribute_code != 'product_desc') and ( $attribute->attribute_code != 'model_year') and ( $attribute->attribute_code != 'cost_price')) {
                                        if ($i == 0) {
                                            ?>
                                            <div class="row" style="padding:0px 15px;">
        <?php } ?>               
        <?php if ($attribute->attribute_type == 'text') { ?>



                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label; ?></label>
                                                        <input type="text" name="<?php echo $attribute->attribute_code; ?>" class="form-control  Div1" id="exampleInputEmail1" placeholder="<?php echo $attribute->attribute_label; ?>"required>
                                                    </div>
                                                </div>
        <?php } else { ?>
                                                <div class="col-md-3 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label; ?></label>
                                                        <select name = "<?php echo $attribute->attribute_code; ?>" class="form-control">
                                                            <?php
                                                            $dd = $attribute->dropdown_value;

                                                            $rr = (explode(",", $dd));
                                                            foreach ($rr as $d) {
                                                                ?>
                                                                <option value="<?php echo $d; ?>"> <?php echo $d; ?> </option>

            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <?php
                                            }
                                            $i++;
                                            $k++;
                                            //echo $i ;echo" hjhh ";
                                            //echo $k;
                                            if ($i < 4 && $k == $len - 5) {
                                                echo "</div>";
                                            } elseif ($i == 4) {
                                                $i = 0;
                                                //echo "enter";
                                                echo "</div>";
                                            } else {
                                                
                                            }
                                        }
                                    }
                                    ?>

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
                            <div class="row" style ="padding:10px 20px;">
                                <label for="exampleSelect1">where are you shipping from?</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleSelect1">Country</label>
                                        <input type="text" name="from_country" class="form-control" id="exampleInputEmail1" placeholder="From country"required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleSelect1">City</label>
                                        <input type="text" name="from_city" class="form-control" id="exampleInputEmail1" placeholder="From city"required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleSelect1">State</label>
                                        <input type="text" name="from_state" class="form-control" id="exampleInputEmail1" placeholder="From state"required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleSelect1">Shipping Policy</label>
                                        <textarea class="form-control" name="policy"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label for="exampleSelect1">Shipping Method</label>
                                    <ul class="list-inline">
                                        <li><div class="checkbox">
                                                <label><input type="checkbox" class="shipping" name="shipping[]" value="shipping">Shipping</label>
                                            </div></li>
                                        <li><div class="checkbox">
                                                <label><input type="checkbox" class="shipping" name="shipping[]" value="local_pickup">Local pickup</label>
                                            </div></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 for_local" style="display:none">
                                    <div class="form-group">
                                        <label for="exampleSelect1">Add local pickup address</label>
                                        <input type="text" name="pickup_address" class="form-control" id="exampleInputEmail1" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 for_shipping" style="display:none">
                                    <div class="input_fields_wrap">
                                        <button class="add_field_button">Add More Fields</button>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="mytext[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <div class="col-md-5 col-sm-12 col-xs-12 upload-image1" >
                    <div class="col-md-12 col-sm-12 col-xs-12"> 
                        <p>Upload Image</p>
                        <form action="/index.php/riftraff/insert_product_phase_final" class="dropzone"  method="post"  >
                            <input type="hidden" name="product_id" value="<?php echo $this->uri->segment(3); ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




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

