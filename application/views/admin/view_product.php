
<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update Product</h3>
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
                    <h2>Update Product <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

      <form id="uploadForm"class="form-horizontal form-label-left" action="/index.php/category/update_product" method="post">
                      
      <?php foreach ($allproductID as $product){ ?>
                      <div class="item form-group">
						  
					  <input type="hidden" name="id" value="<?php echo $product->id; ?>" >
					  
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">added_by_id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" value="<?php echo $product->added_by_id; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="20"  name="added_by_id"  type="text" readonly>  
                        </div>
                        <br></br>
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">product_name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" value="<?php echo $product->product_name; }?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="20"  name="product_name"  required="required" type="text">
                        </div>
                        

                      </div>

                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary" onclick="history.back();">Cancel</button>
                          <button id="send" type="submit" class="btn btn-info">Update</button>
                          
                          
                          
        <?php  if(($product->approve_status == 0) && ($this->uri->segment(2) == 'view_product')) { ?>
			
		<a href ="/index.php/admin/approve_products/<?php echo $product->id; ?>" type="button" class="btn btn-success">Unapproved</a>
                                                      <?php } else { ?>	
        <a href ="/index.php/admin/unapprove_products/<?php echo $product->id; ?>/dealer" type="button" class="btn btn-success">Approve</a>
                          
        <?php  } ?>
                         
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
  $(document).ready(function() {

     $('#uploadForm').submit(function() {
        $("#status").empty().text("File is uploading...");
        $(this).ajaxSubmit({

            error: function(xhr) {
        status('Error: ' + xhr.status);
            },

            success: function(response) {
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

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
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
    
    <!---**************************cancel button -->    
  <script type="text/javascript">
$(document).ready(function(){
    $('.backLink').click(function(){
        parent.history.back();
        return false;
    });
});
</script>
    
    <!-- /validator -->
  </body>
</html>

