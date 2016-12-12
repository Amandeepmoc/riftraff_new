<!DOCTYPE html>
<?php include("header.php"); ?>
<div id="left-flyout-nav" class="layout-left-flyout visible-lg visible-md visible-sm visible-xs"></div>
<div class="layout-right-content">
    <header class="the-header col-md-1" >
        <div class="navbar container">
            <a class="btn-navbar btn-navbar-navtoggle btn-flyout-trigger" href="#">
                <span class="icon-bar btn-flyout-trigger"></span>
                <span class="icon-bar btn-flyout-trigger"></span>
                <span class="icon-bar btn-flyout-trigger"></span>
            </a>
            <nav class="the-nav nav-collapse clearfix">
                <ul class="nav nav-pill pull-left">
                    <p style="color:#fff;padding-top:10px;">Market Place</p>
                    <li class="dropdown">

                        <a href="#"> Profile</a>
                        <ul class="subnav">
                            <li><a href="#">Seller Profile</a></li>
                            <li><a href="#">My Dashboard</a></li>
                            <li><a href="#">Create Attribute</a></li> 
                            <!--  <li><a href="#">German Shephard</a></li>
                             <li><a href="#">Chihuahua</a></li>
                             <li><a href="#">Beagle</a></li> -->
                        </ul> 
                    </li>
                    <li class="dropdown">
                        <a href="#">Orders </a>
                        <ul class="subnav">
                            <li><a href="#">My Order History </a></li>
                            <li><a href="#">My Orders</a></li>
                            <!--  <li><a href="#">Ragdoll</a></li>
                             <li><a href="#">Lion</a></li>
                             <li><a href="#">Tiger</a></li> -->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Products </a>
                        <ul class="subnav">
                            <li><a href="#">Product list </a></li>
                            <li><a href="#">Add Product </a></li>
                            <!-- <li><a href="#">Gorilla</a></li>
                            <li><a href="#">Chimpanzee</a></li> -->
                        </ul>
                    </li>

                </ul>
                <ul class="nav nav-pill pull-right">
                    <p style="color:#fff;padding-top:10px;">My Account</p>

                    <li><a href="#">Account Dashboard</a></li>
                    <li><a href="#">Account Information </a></li>
                    <li><a href="#">Address Book</a></li> 
                    <li><a href="#">Billing Agreements</a></li>
                    <li><a href="#">Recurring profiles </a></li>
                    <li><a href="#">My product Reviews</a></li>
                    <li><a href="#">My Tags</a></li>
                    <li><a href="#">My Whishlist </a></li>
                    <li><a href="#">My Applications</a></li>
                    <li><a href="#">Newsletter subscriptions </a></li>
                    <li><a href="#">My Downloadable Products</a></li>
                </ul>
            </nav>
    </header>
    <main>
       
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-8">
                        <h1><i class="fa fa-tag" aria-hidden="true"></i>  Products</h1>
                    </div>
                    <div class="col-md-4 text-center"><br>
                        <button type="button" class="btn btn-default product">save</button>
                        <button type="reset" class="btn btn-default product">Cancel</button>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="row">
                        <br><?php //foreach ($brands as $brand){ echo $brand->brand_name; }
//print_r($colours); 
?>
                        <h2<?php echo $this->session->flashdata('message'); ?></h2>
                        <h1 class="text-center"> Add Your First Product</h1>
                        <h3 class="text-center" style="color:#707070;">You�re just a few steps away from receiving your first order.</h3>
<!--
                        <div class="center-block" >
                            <img src="http://rr.mediaoncloud.com/images/1.svg" class="img-responsive" style="width:40%;margin-left:27%;"/>
                        </div>								
-->
                        <div class=" upload2">
                            <div class=" ">
           <form action="/index.php/riftraff/insert_product_phase_final" class="dropzone"  method="post"  >
                                
                            
</form>

                            <div class="row pull-right"><br>
                                <button type="button" class="btn btn-default product">Save</button>
                                <button type="reset" class="btn btn-default product">Cancel</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </main>


</div>
</div>




<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        $(".calltoimage").change(function () {
        var brand = $("#brand").val();
        var color = $("#colour").val();
        
        //
        var param  = "brand="+brand+"&color="+color;


         $.ajax({
     type: 'POST',
     url: "/index.php/riftraff/fetch_images_ajax",
     dataType: 'html',
     data:param,

  success: function(response) {
     var result =  JSON.parse(response);
                   if(result != "0")
                   {
                       $(".show_images").empty();
                       var n = 1;
                       for(var i = 0; i<result.length; i++)
                       {
                           
                           console.log(n);
                           var id = "ex"+n;
                           var vall  = result[i]['image_path'];
                           var content = "http://rr.mediaoncloud.com/uploads/"+ result[i]['image_path'];
                           
                           $(".show_images").append('<div class="col-md-3 col-sm-3 col-xs-12"><input type="checkbox" class="checkbox" name="example[]" id="'+ id +'" value="'+ vall +'" /><label for="'+ id +'" class="label"><img class="img-responsive"  src="'+ content +'" /><a href="#img1"></a></label></div>');
                           n++;
                       }
                       
                   }
                   else
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
        $("#Selectcat").on('change',function(){
            var dd = $(this).val();
            var param  = "dd="+dd;
            //alert(dd);
             $.ajax({
                  type: 'POST',
                  url: "/index.php/riftraff/fetch_sub_categories",
                  dataType: 'html',
                  data:param,

                success: function(response) {
                   var result =  JSON.parse(response);
                   console.log(result);
                   if(result != "0")
                   {
                       $(".select_cat").empty();
                       for(var i = 0; i<result.length; i++)
                       {
                           var id = result[i]['id'];
                           var content = result[i]['sub_category_name'];
                           
                           $(".select_cat").append('<option value="'+ id +'">'+ content +'</option>');
                           
                       }
                       
                   }
                   else
                   {
                        $(".select_cat").empty();
                        $(".select_cat").append("<option value='  '>No Sub Categories for this </option>");
                   }

                
               // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
                // alert("Thanks, We will contact you soon.");
               //  window.location = "uiuxwebdesign.php";

               // }
               }
        });
        
        });
    });
</script>
