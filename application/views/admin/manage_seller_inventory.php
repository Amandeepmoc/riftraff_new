<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Seller Inventory</h3>
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
                    <h2>Products added by Seller <small><?php  echo $this->session->flashdata('message'); ?></small></h2>
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
                          <th>RRUID</th>
                          <th>Username</th>
                          <th>Product Category</th>
<!--                          <th>Brand</th>-->
                          <th>Created</th>
                          <th>Status</th>
                         
                          <th class="sorting_disabled">Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php   foreach ( $alll as  $brand ){ ?>
                        <tr>
                          <td><?php echo $brand->id; ?></td>
                          <td><?php echo "RR".$brand->added_by_id; ?></td>
                          <td><?php echo $brand->firstname." ". $brand->lastname; ?></td>
                          <td><?php echo $brand->category; ?></td>

                          <td><?php echo $brand->created; ?></td>
                          <td>
                              <?php if($brand->approve_status == 0) { ?>
                            <span  class="text-danger">Pending</span>
                              <?php } else { ?>
                            <span  class="text-success">Approved</span>
                              <?php } ?>
                          </td>
                          <td>
                    <!-- Split button -->
                            <a href="/index.php/Category/view_seller_inventory/<?php echo $brand->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <!--<a href="/index.php/category/edit_product/<?php echo $brand->id; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>-->
                            <a href="/index.php/admin/delete_product/<?php echo $brand->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            <a href="/index.php/admin/view_products/<?php echo $brand->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Product Details </a>

                   

                    <!-- Split button --></td>
                         
                          
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
  

