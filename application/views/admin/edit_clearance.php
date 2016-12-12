
<?php include("header.php"); ?>
<style>
    .padding-top{padding-top:20px;}.padding{padding:20px !important}.image{position:relative;z-index:0;overflow:hidden;height:100px}
    .image img{position:absolute;left:0;transition: all 0.6s ease-out;-webkit-transition:all 0.6s ease-out;-moz-transition:all 0.6s ease-out;}
    .inner-circle{height:100px;width:500px;background:rgba(0,0,0,0.5);position:absolute;z-index:100;top:0;left:0;opacity:0;transition: all 0.6s ease-out;-webkit-transition:all 0.6s ease-out;-moz-transition:all 0.6s ease-out;}
    .image:hover .inner-circle{opacity:1;} 
    .image .inner-circle a i{transition: all 0.6s ease-out;-webkit-transition:all 0.6s ease-out;-moz-transition:all 0.6s ease-out;transform:translateY(40px);-webkit-transform:translateY(40px);}
    .image .text1{color:#fff;font-size: 2.5em;text-transform: uppercase;opacity: 0;transition-delay: 0.2s;transition-duration: .8s;}
    .image:hover .inner-circle a i{opacity: 1;transform: translateY(0px);-webkit-transform: translateY(0px);}
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Update Clearance Adds</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Update Clearance Adds <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="uploadForm"class="form-horizontal form-label-left" action="/index.php/admin/update_clearance" method="post" enctype="multipart/form-data">

                            <?php foreach ($clearr as $sell) { ?>
                                <div class="item form-group">

                                    <input type="hidden" name="id" value="<?php echo $sell->id; ?>" >

                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="title" value="<?php echo $sell->product_name; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="pname"  required="required" type="text">  
                                    </div>
                                    <br></br>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Lastname">Dealer Link <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="title" value="<?php echo $sell->dealer_link; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="dealer_link"  required="required" type="text">
                                    </div>
                                    <br></br>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Lastname">Price <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="title" value="<?php echo $sell->price; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="price"  required="required" type="text">
                                    </div>
                                    <br></br>
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image Path <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-5 col-sm-5 col-xs-12 image">
                                            <img src="<?php echo base_url() . $sell->image_path; ?>" class="image-animation img-responsive">
                                            <div class="inner-circle">
                                                <a href="#">
                                                    <i class="fa fa-times" aria-hidden="true" style="color:#fff;font-size:20px;padding:20px;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <input id="title" value="<?php echo $sell->image_path;
                        }
                            ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="old_image"  type="hidden">
                                            Or
                                            <input type="file" name="fimg">
                                    </div>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="reset" class="btn btn-primary">Cancel</button>
                                    <button id="send" type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>



                    </div>
                    <br />

                    <br />

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include("footer.php"); ?>


<script>
    $(document).ready(function () {

        $('#uploadForm').submit(function () {
            $("#status").empty().text("File is uploading...");
            $(this).ajaxSubmit({
                error: function (xhr) {
                    status('Error: ' + xhr.status);
                },
                success: function (response) {
                    $("#status").empty().text(response);
                    console.log(response);
                }
            });
            //Very important line, it disable the page refresh.
            return false;
        });
    });
</script>
<!-- validator -->
<script>
    // initialize the validator function
    validator.message.date = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    });

    $('form').submit(function (e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();

        return false;
    });
</script>
<!-- /validator -->
</body>
</html>
