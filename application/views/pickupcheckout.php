<?php include("header2.php"); ?> 

<br>
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
<?php foreach ($checkout as $c) { ?>
                    <input type="hidden" name="checkout_id" id ="checkout_id" value="<?php echo $c->id; ?>"  >
                    <input type="hidden" name="dealer_email" id="dealer_email" value = "<?php echo $c->email_address; ?>">
                        <p><strong>Quantity : </strong> <?php echo $c->quantity; ?><br>
                            <strong>Pickup Method: </strong> <?php echo $c->shipping_type; ?><br>
                            <strong>Total Payment: </strong> <?php echo "$".$c->sub_total; ?><br>
<?php } ?>

                        <a href="javascript:void(0)" class="btn btn-primary pull-right checkout" type="button">Proceed to checkout</a>
                    <div class="clearfix"></div>
                    <br>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="head1" style="background:#f7f7f7;"><div class="numbers" style=""><span class="">2</span></div>
                        <h3 style="display:inline;vertical-align:super;padding-left:10px; color: #222; font-size: 20px;font-weight: 600;line-height: 26px;white-space: nowrap;">Store Information </h3>
                    </div>

                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <h5 style="padding:10px 20px;font-size:16px;font-weight:400;">
<?php foreach ($checkout as $c) { ?>
                            <b>Your order number: </b><?php echo $c->order_num; ?><br>
                            <br><b>We'll notify</b> you when your order is ready and hold it for one week at this store.<br><br>
                            <i class="fa fa-building-o" aria-hidden="true"></i><strong >  <?php echo $c->business_name; ?></strong>
                            <br>
                            <div style="margin-top:10px;word-wrap:break-word;line-height:1.3;font-size:15px;"><?php echo $c->street . " " . $c->unit; ?>
                                <br><?php echo $c->city . "," . $c->state . " " . $c->zipcode; ?></div>
<?php } ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<?php include("footer.php"); ?>
<script>
$(document).ready(function(){
   $(".checkout").click(function(){
       var cid = $("#checkout_id").val();
       var email = $("#dealer_email").val();
       var params ="cid=" + cid + "&email=" +email;
       $.ajax({
           url : "/index.php/riftraff/procedCheckout",
           data: params,
           type: 'POST',
           dataType: 'html',
           success: function(response){
               console.log(response);
               if(response == 'sucess')
               {
                   $("#collapse1").removeClass('in');
                   $("#collapse2").addClass('in');
                   setTimeout(function(){ window.location.href="/index.php/riftraff/buy"; }, 3000);
               }
           }
               
       });
      
   });
});
</script>
