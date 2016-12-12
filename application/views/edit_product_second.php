<!DOCTYPE html>
<?php include("header.php"); ?>
<style>
    .padding-top{padding-top:20px;}.padding{padding:20px !important}.image{position:relative;z-index:0;overflow:hidden;height:200px}
.image img{position:absolute;left:0;transition: all 0.6s ease-out;-webkit-transition:all 0.6s ease-out;-moz-transition:all 0.6s ease-out;}
.inner-circle{height:500px;width:500px;background:rgba(0,0,0,0.5);position:absolute;z-index:100;top:0;left:0;opacity:0;transition: all 0.6s ease-out;-webkit-transition:all 0.6s ease-out;-moz-transition:all 0.6s ease-out;}
.image:hover .inner-circle{opacity:1;} 
.image .inner-circle a i{transition: all 0.6s ease-out;-webkit-transition:all 0.6s ease-out;-moz-transition:all 0.6s ease-out;transform:translateY(40px);-webkit-transform:translateY(40px);}
.image .text1{color:#fff;font-size: 2.5em;text-transform: uppercase;opacity: 0;transition-delay: 0.2s;transition-duration: .8s;}
.image:hover .inner-circle a i{opacity: 1;transform: translateY(0px);-webkit-transform: translateY(0px);}
</style>
<div class="layout-right-content"> 
    <main>
        <form action="/index.php/riftraff/edit_product_phase_two" method="post">
            <input type="hidden" name="product_id" value="<?php echo $this->uri->segment(3); ?>">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-8">
                        <h1><i class="fa fa-tag" aria-hidden="true"></i>  Edit your Product</h1>
                    </div>
                    <div class="col-md-4 text-center"><br>
                        <button type="button" class="btn btn-default product">save</button>
                        <button type="reset" class="btn btn-default product">Cancel</button>
                    </div>
                </div>
                <hr>
         
        <div class="col-md-12 col-sm-12 col-xs-12">
					<div style="border:2px solid #000;">
						<div class="well" style="border-radius:20px;">List Your Product details</div>
						
						<div class="row padding">
                                                    <?php foreach($content as $attribute) { ?>
                                                    <?php  if($attribute->attribute_code == 'brand_name') {  ?>
                                            <div class="col-md-3 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                       <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <select name="<?php echo $attribute->attribute_id ; ?>" class="form-control select_brand calltoimage" id="brand">
                                            <?php foreach ($brands as $brand) { if($brand->id == $attribute->attribute_value) { ?>
                                            <option value="<?php echo $brand->id; ?>" selected><?php echo $brand->brand_name; ?></option>
                                        <?php    }
?>
                                                <option value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
<?php } ?>
                                        </select>
                                                    </div>
                                            </div>
   
                               <?php        } if($attribute->attribute_code == 'brand_color') { ?>
                                                <div class="col-md-3 col-sm-2 col-xs-12">    
                                                    <div class="form-group">
                                                       <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <select name="<?php echo $attribute->attribute_id ; ?>" class="form-control select_colour calltoimage" id="colour" >
                                            <?php foreach ($colours as $color) { if($color->id == $attribute->attribute_value) { ?>
                                            <option value="<?php echo $color->id; ?>" selected><?php echo$color->product_colour; ?></option>
                                        <?php    }
?>?>
                                                <option value="<?php echo $color->id; ?>"><?php echo $color->product_colour; ?></option>
<?php } ?>
                                        </select>
                                                    </div>
                                                </div>
                            <?php   } if($attribute->attribute_code == 'condition') { ?>
                                                <div class="col-md-3 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                       <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <select name = "<?php echo $attribute->attribute_id ; ?>" class="form-control">
                                            <?php if($attribute->attribute_value == 'new') { ?>
                                                 <option value="new" selected>New </option>
                                           <?php } else { ?>
                                                <option value="used" selected >Used </option>
                                          <?php  }?>
                                            <option value="new">New </option>
                                            <option value="used">Used </option>
                                        </select>
                                                    </div>
                                                </div>
                          <?php  } if($attribute->attribute_code == 'cost_price') { ?>
                                                <div class="col-md-3 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                                       <input type="text" name="<?php echo $attribute->attribute_id ; ?>" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $attribute->attribute_label ; ?>" value="<?php echo $attribute->attribute_value; ?>" required>
                                                    </div>
                                                </div>
                                                    <?php } }?>                      
							
						</div>
						
                                                
                                                    <label for="exampleSelect1 text-left">Product Images</label>
                            <div class="row img-box show_images padding">
                               <?php foreach($product_images as $pi) { ?>
                                  
                                    <div class="col-md-3 col-sm-3 col-xs-12 image">
                                        <img src="<?php echo base_url().$pi->image_path; ?>" class="image-animation img-responsive" >
                                        <div class="inner-circle">
                                                <a href="/index.php/riftraff/deleteimg/<?php echo $pi->id;?>/<?php echo $pi->product_id; ?>">
                                                        <i class="fa fa-times" aria-hidden="true" style="color:#fff;font-size:40px;padding:20px;"></i>
                                                </a>
                                        </div>
                                    </div>
                          <?php     }?>
                                </div>
						<div class="row padding">
                                                   
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <h3 style="margin-left:10px;">Features</h3>
                                                    <?php     foreach($content as $attribute) { ?>
                                                    <?php if (($attribute->attribute_type == 'text') and ($attribute->attribute_code != 'brand_name') and ($attribute->attribute_code != 'brand_color') and ($attribute->attribute_code != 'product_desc') and ($attribute->attribute_code != 'condition')    and ($attribute->attribute_code != 'cost_price'))
                                        { ?>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                                                <input type="text" name="<?php echo $attribute->attribute_id ; ?>" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $attribute->attribute_label ; ?>" value="<?php echo $attribute->attribute_value; ?>" required>
                                                            </div>
                                                        </div>
                                               
                                                    <?php  } } ?>
                                                    </div>
                                                     
						</div>
                                                   
						
					</div></div>
        
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-top">
					<div style="border:1px solid grey;">
						<div class="well" style="">Add Product description</div>
						
						<div class="row padding">
                                                     <?php     foreach($content as $attribute) { ?>
                                                        <?php if($attribute->attribute_code == 'product_desc') {   ?>
                                                                <div class="form-group">
                                                                    <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                                                    <textarea   name="<?php echo $attribute->attribute_id ; ?>" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"><?php echo $attribute->attribute_value; ?></textarea>
                                                                 </div>
                                                    <?php 
                                                     }} ?>
							
						</div>
					</div>
						
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 padding-top">
					<div style="border:1px solid grey;">
						<div class="well" style="">How will you ship it?</div>
						<?php foreach($shipping_d as $ddd) { ?>
						<div class="row padding">
                                                    <label for="exampleSelect1">where are you shipping from?</label>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleSelect1">Country</label>
                                                                <input type="text" name="from_country" class="form-control" value = "<?php echo $ddd->from_country; ?> " id="exampleInputEmail1" placeholder="From country"required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleSelect1">City</label>
                                                                <input type="text" name="from_city" class="form-control" id="exampleInputEmail1" value = "<?php echo $ddd->from_city; ?> "  placeholder="From city"required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleSelect1">State</label>
                                                                <input type="text" name="from_state" class="form-control" id="exampleInputEmail1" value = "<?php echo $ddd->from_state; ?> " placeholder="From state"required>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="exampleSelect1">Shipping Policy</label>
                                                                <textarea class="form-control" name="policy"><?php echo $ddd->shipping_policy; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                                            <ul class="list-inline">
                                                               
                                                                        <?php $aa[] = explode('-',$ddd->shipping_method);
                                                                        if(count($aa[0]) > 0) {
                                                                            for ($i = 0 ; $i < count($aa[0]); $i++)
                                                                            {
                                                                                if($aa[0][$i] == 'shipping')
                                                                                { ?>
                                                                                     <li><div class="checkbox">
                                                                                             <label><input type="checkbox" class="shipping" name="shipping[]" value="shipping" checked >Shipping</label>
                                                                                        </div></li>
                                                                               <?php }
                                                                                else if($aa[0][$i] == 'local_pickup')
                                                                                { ?>
                                                                                    <li><div class="checkbox">
                                                                                        <label><input type="checkbox" class="shipping" name="shipping[]" value="local_pickup" checked>Local pickup</label>
                                                                                    </div></li>
                                                                              <?php  } 
                                                                                else if(($aa[0][$i] == 'local_pickup') && ($aa[0][$i] == 'shipping') ) { ?>
                                                                                    <li><div class="checkbox">
                                                                                            <label><input type="checkbox" class="shipping" name="shipping[]" value="shipping"  checked >Shipping</label>
                                                                </div></li>
                                                                <li><div class="checkbox">
                                                                      <label><input type="checkbox" class="shipping" name="shipping[]" value="local_pickup" checked >Local pickup</label>
                                                                </div></li>
                                                                               <?php } else {} 
                                                                            }
                                                                        } else { ?>
                                                                 <li><div class="checkbox">
                                                                      <label><input type="checkbox" class="shipping" name="shipping[]" value="shipping">Shipping</label>
                                                                </div></li>
                                                                <li><div class="checkbox">
                                                                      <label><input type="checkbox" class="shipping" name="shipping[]" value="local_pickup">Local pickup</label>
                                                                </div></li>
                                                                        <?php } ?>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 col-xs-12 for_local" style="display:none">
                                                            <div class="form-group">
                                                                <label for="exampleSelect1">Add local pickup address</label>
                                                                <input type="text" name="pickup_address" class="form-control" id="exampleInputEmail1" placeholder=""required />
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
                                                <?php } ?>
					</div>
						
                                    </div>
                 <div class="row pull-right" style="position: absolute;bottom: 25px;right: 75px;"><br>
                                <button type="submit" class="btn btn-default product">Save</button>
                                <button type="reset" class="btn btn-default product">Cancel</button>
                 </div>
                </form>
        
						
                                <div class="col-md-6 col-sm-6 col-xs-12 padding-top">
					<div style="border:1px solid grey;">
						<div class="well" style="">Add Product Images</div>
						
						<div class="row padding">
                                                     <label for="exampleSelect1 text-left">Upload Image</label>
                                                    <form action="/index.php/riftraff/insert_product_phase_final" class="dropzone"  method="post"  >
                                
                                                        <input type="hidden" name="product_id" value="<?php echo $this->uri->segment(3); ?>">
                                                    </form>
							
						</div>
						
					</div></div>
    </main>


</div>
</div>




<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
//        $(".calltoimage").change(function () {
//        var brand = $("#brand").val();
//        var color = $("#colour").val();
//        
//        //
//        var param  = "brand="+brand+"&color="+color;
//
//
//         $.ajax({
//     type: 'POST',
//     url: "/index.php/riftraff/fetch_images_ajax",
//     dataType: 'html',
//     data:param,
//
//  success: function(response) {
//     var result =  JSON.parse(response);
//                   if(result != "0")
//                   {
//                       $(".show_images").empty();
//                       var n = 1;
//                        $(".show_images").show();
//                       for(var i = 0; i<result.length; i++)
//                       {
//                           
//                           console.log(n);
//                           var id = "ex"+n;
//                           var vall  = result[i]['image_path'];
//                           var content = "http://rr.mediaoncloud.com/uploads/"+ result[i]['image_path'];
//                           
//                           $(".show_images").append('<div class="col-md-3 col-sm-3 col-xs-12"><input type="checkbox" class="checkbox" name="image_select[]" id="'+ id +'" value="'+ vall +'" /><label for="'+ id +'" class="label"><img class="img-responsive"  src="'+ content +'" /><a href="#img1"></a></label></div>');
//                           n++;
//                       }
//                       
//                   }
//                   else
//                   {
//                        $(".show_images").empty();
//                        $(".show_images").append("No images found!!");
//                   }
//
//
//  
// // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
//  // alert("Thanks, We will contact you soon.");
// //  window.location = "uiuxwebdesign.php";
//  
// // }
// }
//   });
//
//        //
//        });
//        $("#Selectcat").on('change',function(){
//            var dd = $(this).val();
//            var param  = "dd="+dd;
//            //alert(dd);
//             $.ajax({
//                  type: 'POST',
//                  url: "/index.php/riftraff/fetch_sub_categories",
//                  dataType: 'html',
//                  data:param,
//
//                success: function(response) {
//                   var result =  JSON.parse(response);
//                   console.log(result);
//                   if(result != "0")
//                   {
//                       $(".select_cat").empty();
//                       for(var i = 0; i<result.length; i++)
//                       {
//                           var id = result[i]['id'];
//                           var content = result[i]['sub_category_name'];
//                           
//                           $(".select_cat").append('<option value="'+ id +'">'+ content +'</option>');
//                           
//                       }
//                       
//                   }
//                   else
//                   {
//                        $(".select_cat").empty();
//                        $(".select_cat").append("<option value='  '>No Sub Categories for this </option>");
//                   }
//
//                
//               // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
//                // alert("Thanks, We will contact you soon.");
//               //  window.location = "uiuxwebdesign.php";
//
//               // }
//               }
//        });
        
        
        $(".shipping").click(function(){
             if($(this).is(":checked")) {
                 var cur = $(this).val();
                 if(cur == 'local_pickup')
                 {
                     $(".for_local").show();
                 }
                 
                 if(cur == 'shipping')
                 {
                     $(".for_shipping").show();
                 }
                 
             }
         });
         });
        
   $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" class="form-control" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
 });

</script>
   
        
       
