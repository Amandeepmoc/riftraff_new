<?php include("header.php"); 
 ?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Brands</h3>
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
                <div class="x_panel" style="height:650px;">
                  <div class="x_title">
		 <h2><?php  echo $this->session->flashdata('message'); ?> <small><?php echo validation_errors(); ?></small></h2>

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
                    <form class="form-horizontal form-label-left" novalidate action="/index.php/admin/insert_brand_name" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                        <input id="name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" name="name" placeholder="Brand Name" required="required" type="text">
                        </div><button type="submit" class="btn btn-round btn-info">Add</button>
                      </div>
					  </form>
					  
					  
					    <form class="form-horizontal form-label-left" novalidate action="/index.php/admin/insert_brand_colour" method="post">
                
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Colour <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         
                        <input id="name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" name="colour" placeholder="Brand Colour" required="required" type="text">
                        </div><button type="submit" class="btn btn-round btn-info">Add</button>
                      </div>
					  </form>
					   


                      </div>
                     <!-- <div class="ln_solid"></div> -->
                     
					 
					 
					 
					   <div class="col-md-12 col-sm-12 col-xs-12 pull-right">                
                      <form action="/index.php/admin/add_image" class="dropzone" style="top: 100px; position: relative;">
					  
                       <div class="form-group col-md-12 col-xs-12 col-sm-12" style="position: absolute; top: -110px; left: -8px;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3 text-right">Select Brand Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select class="select2_single form-control" tabindex="-1" name="brand_name">
                            <option></option>
				  <?php  foreach ( $brands as  $brand ){ ?>

                            <option value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
				  <?php } ?>
                          </select>
                        </div>
                      </div>
                      <br>
					  
					   <div class="form-group col-md-12 col-sm-12 col-xs-12" style="position: absolute; top: -65px;left:-8px;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3 text-right">Select Brand Colour</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <select class="select2_single form-control" tabindex="-1" name="brand_colour">
                            <option></option>
				  <?php  foreach ( $colours as  $colour ){ ?>

                            <option value="<?php echo $colour->id; ?>"><?php echo $colour->product_colour; ?></option>
				  <?php } ?>
                          </select>
                        </div>
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
    <!-- /validator -->
	
