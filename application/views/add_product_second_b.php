<!DOCTYPE html>
<?php include("header.php"); ?>
<div class="layout-right-content"> 
    <main>
        <form action="/index.php/riftraff/insert_product_phase_two" method="post">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-8">
                        <h1><i class="fa fa-tag" aria-hidden="true"></i>  UPLOAD YOUR PRODUCT</h1>
                    </div>
                    <div class="col-md-4 text-center"><br>
                        <button type="button" class="btn btn-default product">save</button>
                        <button type="reset" class="btn btn-default product">Cancel</button>
                    </div>
                </div>
                <hr>
                
                <div class="col-md-11 col-sm-12 col-xs-12">
					<div style="border:2px solid #000;">
						
						
                                                    <?php 
                                                   // print_r($attribute_Set);
                                    foreach($attribute_Set as $attribute)
                                    { ?>
						
                                                <div class="well" style="border-radius:20px;">List Your Product details</div>        
                                                    <div class="row">
                                                        <?php if($attribute->attribute_code == 'brand_name') { ?>
							<div class="col-md-2 col-sm-2 col-xs-12">
                                                            <div class="form-group">
                                            <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                            <select name="<?php echo $attribute->id ; ?>" class="form-control select_brand calltoimage" id="brand">
                                                <?php foreach ($brands as $brand) {  ?>
                                               
                                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
    <?php } ?>
                                            </select>
                                        </div>
                                                            </div>
                                                        <?php } ?>
							<?php if($attribute->attribute_code == 'brand_color') { ?>
							<div class="col-md-2 col-sm-2 col-xs-12">
                                                            <div class="form-group">
                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <select name="<?php echo $attribute->id ; ?>" class="form-control select_colour calltoimage" id="colour" >
                                            <?php foreach ($colours as $color) { 
?>
                                                <option value="<?php echo $color->id; ?>"><?php echo $color->product_colour; ?></option>
<?php } ?>
                                        </select>
                                    </div> 
                                                            </div>
                                                        <?php } ?>
                                                        <?php if($attribute->attribute_code == 'condition') { ?>
							<div class="col-md-2 col-sm-2 col-xs-12">
                                                            <div class="form-group">
                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <select name = "<?php echo $attribute->id ; ?>" class="form-control">
                                            
                                            <option value="new">New </option>
                                            <option value="used">Used </option>
                                        </select>
                                    </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if($attribute->attribute_code == 'condition') { ?>
							<div class="col-md-2 col-sm-2 col-xs-12">
                                                            <div class="form-group">
                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <select name = "<?php echo $attribute->id ; ?>" class="form-control">
                                            
                                            <option value="new">New </option>
                                            <option value="used">Used </option>
                                        </select>
                                    </div>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if(($attribute->attribute_code == 'stock_value') || ($attribute->attribute_code == 'cost_price')) { ?>
							<div class="col-md-2 col-sm-2 col-xs-12">
                                                             <div class="form-group">
                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                
                                             <input type="text" name="<?php echo $attribute->id ; ?>" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $attribute->attribute_label ; ?>"  required>
                                            </div>
                                                            </div>
                                                        <?php } ?>
							
						</div>
                                                    </div>
                                                
						<br>
                                                <div class="col-md-6">
                                                    <?php if($attribute->attribute_code == 'product_desc')
                               { ?>
                                   <div class="form-group">
                                        <label for="exampleSelect1"><?php echo $attribute->attribute_label ; ?></label>
                                        <textarea   name="<?php echo $attribute->id ; ?>" cols=""  style="width: 100%; height: 200px;" placeholder="write Your Description here"></textarea>
                                    </div>
                                   
                                    <?php  } } ?>
                                                    
                                                </div>
                                                </form>
                                                <div class="col-md-6">
                                                    <form action="/index.php/riftraff/insert_product_phase_final" class="dropzone"  method="post"  >
                                
                            <input type="hidden" name="product_id" value="<?php echo $this->uri->segment(3); ?>">
                            </form>
                                                 </div>
						
					</div></div>
    </main>


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
                           
                           $(".show_images").append('<div class="col-md-3 col-sm-3 col-xs-12"><input type="checkbox" class="checkbox" name="image_select[]" id="'+ id +'" value="'+ vall +'" /><label for="'+ id +'" class="label"><img class="img-responsive"  src="'+ content +'" /><a href="#img1"></a></label></div>');
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
