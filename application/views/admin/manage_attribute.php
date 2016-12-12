<?php include("header.php"); ?>
<style>
.overlay {width: 100%;position: fixed;z-index: 99999;top: 0;left: 0; background-color: rgb(0,0,0); background-color: rgba(0,0,0, 0.9);overflow-y: hidden;transition: 0.5s;overflow:scroll;}
.overlay-content {position: relative;top:25%; width: 100%;text-align: center;margin-top: 10px;}
.overlay a { padding: 8px;text-decoration: none;color: #333;display: block; transition: 0.3s;}
.overlay a:hover, .overlay a:focus {color: #333;}
.overlay .closebtn {position: absolute;top: 20px;right: 45px;font-size: 60px;}
</style>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php if($this->uri->segment(2) == 'manage_cat1')
                { ?>
                    Guitars
                <?php } elseif($this->uri->segment(2) == 'manage_cat2'){ ?>
                    Amps & Cabinets
                <?php } elseif($this->uri->segment(2) == 'manage_cat3'){ ?>
                    Pedals
               <?php } else { ?>
                    Ukulele
                <?php } ?> </h3>
              </div>

              <div class="title_right">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group text-right top_search">
<!--                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>-->
                     <a href ="/index.php/admin/add_attributes/" class="btn btn-default" type="button"><i class="fa fa-plus-circle"></i> Add New Attribute</a>
					 <button type="button" class="btn btn-default" onclick="openNav()">View attributes</button>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Attributes <small><?php  echo $this->session->flashdata('message'); ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
     
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Attribute label</th>
                          <th>Attribute code</th>
                          <th class="sorting_disabled">Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php  foreach ( $attributes as  $brand ){ ?>
                        <tr>
                          <td><?php echo $brand->id; ?></td>
                          <td><?php echo $brand->attribute_label; ?></td>
                          <td><?php echo $brand->attribute_code; ?></td>
                          <td>
						  <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="/index.php/admin/edit_attribute/<?php echo $brand->id; ?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> 
							<a href="/index.php/admin/delete_attribute/<?php echo $brand->id;?>/<?php echo $this->uri->segment(2); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
						</td>
                         
                          
                        </tr>
                        
					  <?php } ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
			  </div>
	    </div>
          </div>
        

        <!-- /page content -->

		

    <?php include("footer.php"); ?>
        <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                    <div class="container"> 		  
		   <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                            <div class=" panel-info" style="background-color:#fff;">
                                <div class="panel-heading">
                                    <div class="panel-title">Attributes</div>
                                    
                                </div>  
                                <div class="panel-body" >
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3 style="margin-left:10px;">Features</h3>
                                <?php $i = 0; foreach ($attributeSet as $attribute) { ?>
                                
                                 <?php if (( $attribute->attribute_code != 'brand_name') and ( $attribute->attribute_code != 'brand_color') and ( $attribute->attribute_code != 'product_desc') and ( $attribute->attribute_code != 'condition') and ( $attribute->attribute_code != 'cost_price')) {
        if($attribute->attribute_type == 'text') { 
   if($i == 0) {?>
		<div class='row'>
		<?php } ?>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="form-group">
                                                <label for="exampleSelect1"><?php echo $attribute->attribute_label; ?></label>
                                                <input type="text" name="<?php echo $attribute->id; ?>" class="form-control  Div1" id="exampleInputEmail1" placeholder="<?php echo $attribute->attribute_label; ?>"required>
                                            </div>
                                        </div>
                     <?php } else { ?>
                                <div class="col-md-3 col-sm-2 col-xs-12">
                                        <div class="form-group">
                                            <label for="exampleSelect1"><?php echo $attribute->attribute_label; ?></label>
                                            <select name = "<?php echo $attribute->attribute_code; ?>" class="form-control">
                                                <?php $dd = $attribute->dropdown_value; 
                                                 
                                                $rr = (explode(",",$dd)); 
                                                foreach ($rr as $d) { ?>
                                                <option value="<?php echo $d; ?>"> <?php echo $d; ?> </option>
                                                
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                     <?php }$i++;
if($i == 4) { echo "</div>"; $i = 0 ;}	}
                                }
?>
                            </div>
                                </div>
                            </div>
                        </div>
 </div>
                </div>
            </div>
                </div>
        

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
	<script>
    function openNav() {
        document.getElementById("myNav").style.height = "100%";
		document.getElementById("signupbox").style.display= "block";
		
    }

    function closeNav() {
        document.getElementById("myNav").style.height = "0%";
		document.getElementById("signupbox").style.display= "none";
    }
</script>
    <!-- /Datatables -->
  
