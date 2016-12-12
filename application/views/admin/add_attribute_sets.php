<?php include("header.php"); 
 ?>
	
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Attribute Sets</h3>
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
                    <form class="form-horizontal form-label-left" novalidate action="/index.php/admin/insert_attribute_sets" method="post">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12"> 
                        <input id="set_name" class="form-control col-md-8 col-xs-12" data-validate-length-range="6" name="set_name" placeholder="Attribute code" required="required" type="text">
                        </div>
                      </div>
                        
                    
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Based on <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class = "form-control" name="set_cat" id = "set_cat">
                                <?php if(!empty($attrubuteSets)) {
                                foreach($attrubuteSets as $set) { ?>
                                    
                                    <option value="<?php echo $set->id; ?>"><?php echo $set->attribute_set_name; ?></option>
                                    
                                <?php  } } else { ?>
                                <option value=" ">No result found</option>
                                <?php } ?>
                            </select> 
                        </div>
<!--                        <div class="col-md-3">
                            or <a href ="#" > Add Attribute Set</a>
                        </div>-->
                      </div> 
                        <button type="submit" class="btn btn-round btn-info">Add</button>
                        
                        
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
	