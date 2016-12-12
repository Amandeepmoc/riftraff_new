<?php include("header.php");
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Import Products</h3>
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
                <div class="x_panel" style="">
                    <div class="x_title">
                        <h2><?php echo $this->session->flashdata('message'); ?> <small><?php echo validation_errors(); ?></small></h2>

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div><br><br>
                    <div class="x_content">
                        <?php //echo form_open('admin/insert_brand'); ?>
                        <form class="form-horizontal form-label-left" novalidate action="/index.php/admin/importt" method="post" enctype="multipart/form-data">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" style="padding-top:0px;">Import Excel Sheet<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="file" id="file" class="input-large">

                                </div>
                                <!--                        <div class="col-md-3">
                                                            or <a href ="#" > Add Attribute Set</a>
                                                        </div>-->
                            </div>
                            <div class="ln_solid"></div>


                            <div class="col-md-6 col-md-offset-3">
                                <button type="reset" class="btn btn-primary" onclick="history.back();">Cancel</button>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>


                        </form>


                        <br><br>


                    </div>



                </div>
            </div>

        </div>
    </div>
</div>


<!-- /page content -->


<?php include("footer.php"); ?>


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
<script>
    $(document).ready(function () {
        $("#att_type").change(function () {

            var cur = $(this).val();
            if (cur == 'dropdown')
            {
                $(".for_drop").show();
            } else
            {
                $(".for_drop").hide();
            }
        });



        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class=" col-md-offset-3  col-md-6 col-sm-6 col-xs-12" ><br><input type="text" class="form-control col-md-8 col-xs-12" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
    });
</script>
<!-- /validator -->



