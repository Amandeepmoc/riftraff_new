<?php include('header2.php'); ?>
<?php //include('php1/RateAvailableServicesWebServiceClient.php');    ?>
<?php //include('create_ship/php/CreatePickupWebServiceClient.php');     ?>
<div class="container add_to_cart">
    <div id="no-more-tables"><h3>Cart(<?php echo $tcount; ?>)</h3>
        <table class="col-md-12 col-sm-12 col-xs-12 table-bordered table-striped table-condensed cf text-center">
            <thead class="cf">
                <tr>
                    <th colspan="2">Item</th>
                    <th>Qty </th>
                    <th>Unit Price</th>

<!--                    <th>Pickup method</th>-->
                    <th>Shipping Details</th>
                    <th>Sales Tax</th>
                    <th>Subtotal</th>


                    <th >&times;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($cart as $c) {
                    ?>
                    <tr>
                        <td><?php echo $c->product_name; ?></td>
                        <td><img src="<?php echo $c->product_img; ?>" style="height:80px;width:80px;"/></td>
                        <td><?php echo $c->quantity; ?> </td>
                        <td><?php echo "$" . $c->unit_price; ?></td>
                        <!--<td ><?php // if ($c->shipping_method == 'local_pickup') { echo "Local pickup";} else { echo "Shipping" ;}    ?></td>-->
                        <td ><?php echo "$" . $c->shipping_charges; ?></td>
                        <td ><?php echo "$" . $c->sales_tax; ?></td>

                        <td ><?php echo "$" . $dd = ($c->sub_total + $c->shipping_charges + $c->commission); ?></td>

                        <td><a  onclick="getConfirmation(this.id);" id = "<?php echo $c->id; ?>" class="btn btn-lg" style="font-size:35px;background:none;">&times;</a></td>
                    </tr>
                    <?php
                    $total += $dd;
                }
                ?>
                <?php if ($tcount != 0) { ?>
                    <tr>

                        <td colspan="8"><p class="text-right" style='padding-right: 10em;'><strong>Grand Total: </strong> <?php echo "$" . $total; ?><p></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>


        <div class="pull-left">
            <br>
            <a href="/index.php/riftraff/buy" class="btn btn-primary" type="button">Continue Shopping</a>
        </div>

        <div class="pull-right">
            <br>
            <?php if ($tcount != 0) { ?>
                <a href="#" class="btn btn-primary shipp_type" type="button">Proceed to checkout</a>
            <?php } ?>
        </div>

    </div>
</div>
<!------ popup code ------>




<div id="shipPopup" class="overlay" style="background-color:rgba(0,0,0,0.6);">
    <a href="javascript:void(0)" class="closebtn" onclick="closeShip()">&times;</a>
    <div class="overlay-content">
        <div class="container">    
            <div id="loginbox" style="margin-top:-50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div class="panel-info" style="background-color:#fff;" >
                    <div class="panel-heading">
                        <div class="panel-title">Choose Pickup Method</div>

                    </div>     
                    <div style="padding:30px 0px 40px 0px;" class="panel-body" >
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form  method="post">
                            <div  class="form-group col-md-6">
                                <div class="radio">
                                    <label><input id="localPickup" type="radio" name="shippingMethod" value="localPickup"> Local Pickup</label>
                                </div>                                     
                            </div>
                            <div  class="form-group col-md-6">
                                <div class="radio">
                                    <label><input id="shippingPickup" type="radio" name="shippingMethod" value="shippingPickup"> Shipping Pickup</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="button"  value="Continue" class="btn login-btn continue">
                            </div>   
                        </form>     
                    </div>                     
                </div>  
            </div>
        </div>
    </div>
</div>
<!--- end ------>

<?php include('footer.php'); ?>
<script>
    $(document).ready(function () {
        $(".shipp_type").click(function () {
            document.getElementById("shipPopup").style.height = "100%";
        });
        $(".continue").click(function ()
        {
            //  $(".ny").removeClass('myy');
            var shipp = $('input[name=shippingMethod]:checked').val();
            //alert(shipp);
            // if(shipp == 'localPickup')
            //{
            var params = "shipping=" + shipp;

            //}
            //else
            //{

            //}

            //alert(params);

            $.ajax({
                type: 'POST',
                url: "/index.php/riftraff/add_checkoutt",
                dataType: 'html',
                data: params,
                success: function (response) {
                    //$(".ny").addClass('myy');
                    console.log(response);

                    if (response == 'sucess' && shipp == 'localPickup')
                    {
                        window.location.href = "/index.php/riftraff/pickupCheckout";
                    } else
                    {
                        // alert("dome");

                        window.location.href = "/index.php/riftraff/checkout";
                    }

                    //var result =  JSON.parse(response);
                    // console.log(result['all']['4']);

                    // console.log(result);
                    // console.log(result['all']['4'].length);
//                    if (response != 0)
//                    {
//                        $(".myshow").empty();
//                        $(".myshow").html(response);
//                    } else
//                    {
//                        $(".myshow").empty();
//                        $(".myshow").html("<h4>No results found!!</h4>");
//
//                    }
                }

            });
        });
        var dd = $("#shipp").val();
        // alert(dd);
    });
</script>
<script type="text/javascript">
    function getConfirmation(pid) {
        var id = pid;

        var retVal = confirm("Do you want to remove this product from cart ?");

        if (retVal == true) {
            var bb = "<?php echo base_url(); ?>";
            var full = bb + 'index.php/riftraff/del_cart/' + id;
            window.location.href = full;
            return true;
        } else {
//                   var bb = "<?php echo base_url(); ?>";
//                   var full = bb+'index.php/riftraff/product_list';
//                   window.location.assign(full);
            return false;
            var bb = "<?php echo base_url(); ?>";
            var full = bb + 'index.php/riftraff/add_to_cart';
            window.location.href = full;
        }
    }
</script>