
<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Update sellers</h3>
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
                    <h2>Update sellers <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

      <form id="uploadForm"class="form-horizontal form-label-left" action="/index.php/category/update_seller" method="post">
                      
      <?php foreach ($sellers as $sell){ ?>
                      <div class="item form-group">
						  
					  <input type="hidden" name="id" value="<?php echo $sell->id; ?>" >
					  
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Firstname<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" value="<?php echo $sell->firstname; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="firstname"  required="required" type="text">  
                        </div>
                        <br></br>
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Lastname">First <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" value="<?php echo $sell->lastname; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="lastname"  required="required" type="text">
                        </div>
                        <br></br>
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" value="<?php echo $sell->email; }?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="email"  required="required" type="text">
                        </div>
                      </div>

                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="reset" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Update</button>
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
    <!-- /validator -->
  </body>
</html>
