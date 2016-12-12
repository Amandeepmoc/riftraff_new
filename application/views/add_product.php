<!DOCTYPE html>
<?php include("header.php"); ?>
<style>
.nicEdit-main{width:100%;}
</style> 
    <main>
        <form action="/index.php/riftraff/insert_product_phase_one" method="post">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
				<div class="col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-md-3 col-sm-3 col-xs-7">
                        <h1><i class="fa fa-tag" aria-hidden="true"></i>  Products</h1>
                    </div>
					<div class="col-md-5 col-sm-5 col-xs-7">
						<ul class="nav navbar-nav">
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
							  <ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">Separated link</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="#">One more separated link</a></li>
							  </ul>
							</li>
						</ul>
					</div>
                    <div class="col-md-4 text-center"><br>
                        <button type="submit" class="btn btn-default product">Continue</button>
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
                        <h3 class="text-center" style="color:#707070;">You are just a few steps away from receiving your first order.</h3>
<!--
                        <div class="center-block" >
                            <img src="http://rr.mediaoncloud.com/images/1.svg" class="img-responsive" style="width:40%;margin-left:27%;"/>
                        </div>								
-->
                        <div class=" upload2">
                            <div class=" ">
                                    <div class="form-group">
                                        <label for="exampleSelect1">Select Attribute Set</label>
                                        <select name="att_set" class="form-control select-field2 " id="Selectatt">
                                            <?php foreach ($att_Set as $categry) { ?>
                                                <option value="<?php echo $categry->id; ?>"><?php echo $categry->attribute_set_name; ?></option>
<?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect1">Select Categories</label>
                                        <select name="category" class="form-control select-field1 " id="Selectcat">
                                            <?php foreach ($category as $categry) { ?>
                                                <option value="<?php echo $categry->id; ?>"><?php echo $categry->category_name; ?></option>
<?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleSelect1">Select Sub Category</label>
                                        <select name="sub_category" class="form-control select_cat" id="cat" >
                                            
                                        </select>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="exampleSelect1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name of Product"required>
                                    </div>
                                    


                            <div class="col-md-12 col-sm-12 col-xs-12 text-right"><br>
                                <button type="submit" class="btn btn-default product">Continue</button>
                                <button type="reset" class="btn btn-default product">Cancel</button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </main>
</form>

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
     var name1 =  JSON.parse(response);

  if(typeof  name1 !== "number"){
     
     alert(name1.length);
     
   
      
  }else{ 
      alert("error");
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
