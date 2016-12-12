<?php include("header2.php"); ?> 

<?php //echo "<pre>";
//print_r($checkout);
?>

<div class="col-md-offset-3 col-md-6">
    <br>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="head1">
                    <div class="numbers" style=""><span class="">1</span></div>
                    <h3 style="display:inline;vertical-align:super;padding-left:10px; color: #222; font-size: 20px;font-weight: 600;line-height: 26px;white-space: nowrap;">Your Order Information</h3>

                </div>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?php
                    foreach ($checkout as $c) {
                        $sub_total = $c->sub_total;
                        $ord = $c->order_num;
                        ?>
                        <input type="hidden" name="checkout_id" id ="checkout_id" value="<?php echo $c->id; ?>"  >
                        <input type="hidden" name="dealer_email" id="dealer_email" value = "<?php echo $c->email_address; ?>">
                        <p> <strong>Quantity : </strong> <?php echo $c->quantity; ?><br>
                            <strong>Pickup Method: </strong> <?php echo $c->shipping_type; ?><br>
                            <strong>Service Type: </strong> <?php echo $c->service_type; ?><br>
                            <strong>Shipping Time: </strong> <?php echo $c->shipping_date; ?><br>
                            <strong>Order Number: </strong> <?php echo $c->order_num; ?><br>
                            <strong>Total Payment: </strong> <?php echo "$" . $c->sub_total; ?><br>
                        <?php
                        }
                        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL 
                        $paypal_id = 'John@jcesales.com';
                        ?>
                    <form action="<?php echo $paypal_url; ?>" method="post">
                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
                        <!-- Specify a Buy Now button. -->
                        <input type="hidden" name="cmd" value="_xclick">
                        <!-- Specify details about the item that buyers will purchase. -->
                        <input type="hidden" name="item_name" value="Guitars">
                        <input type="hidden" name="item_number" value="<?php echo $ord; ?>">
                        <!--<input type="hidden" name="item_number" value="">-->
                        <input type="hidden" name="amount" value="<?php echo $sub_total; ?>">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="quantity" value="1">
                        <!-- Specify URLs -->
                        <input type='hidden' name='cancel_return' value='/index.php/riftraff/cancel_item'>
                        <input type='hidden' name='return' value='/index.php/riftraff/success_item'>
                        <!-- Display the payment button. -->
                        <input type="image" name="submit" border="0" class="pull-right"
                               src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
                        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                    </form>

                    <!--<a href="javascript:void(0)" class="btn btn-primary pull-right checkout" type="button">Proceed to checkout</a>-->
                    <div class="clearfix"></div>
                    <br>
                </div>
            </div>

        </div>
    </div>
    <br>
</div>




<?php include("footer.php"); ?> 
<script type="text/javascript">
    $('.panel-heading a').on('click', function (e) {
        //alert('hello');
        if ($(this).parents('.panel').children('.panel-collapse').hasClass('dont')) {
            e.stopPropagation();
        }
    });
    $('#first_b').on('click', function (e) {
        $("#collapse4").removeClass("dont");
        $("#collapse2").addClass("collapse");
        $(".s a").trigger("click");
    });
    $('#sec_b').on('click', function (e) {
        $("#collapse7").removeClass("dont");
        $("#collapse4").addClass("collapse");
        $(".t a").trigger("click");
    });
    $('#third_b').on('click', function (e) {
        $("#collapse4").removeClass("dont");
        $("#collapse2").addClass("collapse");

    });
    $('#first_b').on('click', function (e) {
        $("#collapse4").removeClass("dont");
        $("#collapse2").addClass("collapse");
        $(".panel-heading a").trigger("click");
    });


</script>