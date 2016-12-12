<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Payment </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
<!--                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>-->
                     <!--<a href ="#" class="btn btn-default" type="button"><i class="fa fa-plus-circle"></i> Add New Product</a>-->
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Products <small><?php  echo $this->session->flashdata('message'); ?></small></h2>
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
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Buyer ID</th>
                          <th>Dealer email ID</th>
                          <th>Quantity</th>
                          <th>Commission</th>
                          <th>Pickup Type</th>
                          <th>Shipping Charges</th>
                          <th>Sub - Total</th>
                          <th>Status</th>
                         
                         
<!--
                          <th class="sorting_disabled">Action</th>
-->
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php   foreach ( $payment as  $brand ){ ?>
                        <tr>
                          <td><?php echo $brand->id; ?></td>
                          <td><?php echo $brand->buyer_id; ?></td>
                          <td><?php echo $brand->email_address; ?></td>
                           <td><?php echo $brand->quantity; ?></td>
                          <td><?php echo "$".$brand->commission; ?></td>
                          <td><?php echo $brand->shipping_method; ?></td>
                          <td><?php echo "$".$brand->shipping_charges; ?></td>
                          <?php if($brand->shipping_method == 'localPickup' ) { ?>
							  <td><?php echo "$".$brand->commission + $brand->sub_total; ?></td>
							<?php  } else { ?>
                         <td><?php echo "$".$brand->commission + $brand->sub_total + $brand->shipping_charges; ?></td>
                         <?php }?>
                         <?php if($brand->status == 0 ) { ?>
							  <td><span  class="text-success">Done</span></td>
							<?php  } else { ?>
                         <td><span  class="text-danger">Pending</span></td>
                         <?php }?>
<!--
                          <td>
                              <?php //if($brand->approve_status == 0) { ?>
                            <span  class="text-danger">Pending</span>
                              <?php //} else { ?>
                            <span  class="text-success">Approved</span>
                              <?php //} ?>
                          </td>
-->
<!--
                          <td>
                    
-->
                         
                          
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
    <!-- /Datatables -->
  
