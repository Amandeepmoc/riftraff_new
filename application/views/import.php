<?php include("header.php"); ?>
<style>
    .padding-top{padding-top:20px;}.padding1{padding:20px !important};
     .rift-raff-nav .open > a, .rift-raff-nav .open > a:focus, .rift-raff-nav .open > a:hover {background-color: #3e9cc5;border-color: #337ab7;border-radius: 18px;color: #fff;} 
    .rift-raff-nav > li > a{background:none;font-size:16px;font-weight:600;color:#000;}
    .rift-raff-nav > li > a{padding:10px 30px!important;}
    .rift-raff-nav li:focus, .rift-raff-nav li:hover{background-color: #3e9cc5; border-color: #337ab7; border-radius: 18px;color: #fff;}
    .nav>li>a:hover{background:transparent;color:#fff;}
</style>
<main>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <h1><i class="fa fa-tag" aria-hidden="true"></i>&nbsp;Import Products</h1>
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
                <button type="submit" class="btn btn-default product">Save</button>
                <button type="button" class="btn btn-default product">Cancel</button>
            </div>
        </div>
        <hr>
        <div class="col-md-12 dealer">
            <br>
            <h1 class="text-center"> Import Csv file</h1>
            <br>
            <div class="col-md-11" style="">
                <div class="col-md-3 account-left"><h4><strong>CSV file</strong></h4></div>
                <div class="col-md-9 account-right">
                    <form action="/index.php/riftraff/importt" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text"> CSV File:</label>
                                <input type="file" name="file" id="file" class="input-large">
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

                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-default product">Import</button>

                        </div>
                    </form>


                </div>
            </div>




            <div class="col-md-11" style="">
                <br><br>
                <div class="col-md-3 account-left"><h4><strong>View CSV File format Demo </strong></h4></div>
                <div class="col-md-9 account-right">

                    <form action="/index.php/riftraff/view_method" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="text">Select Category:</label>
                                <select name="cat" class="form-control">
                                    <?php foreach ($cats as $cat) { ?>
                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->category_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-default product">View</button>

                        </div>
                    </form>

                </div>

            </div>
        </div>	
    </div>



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