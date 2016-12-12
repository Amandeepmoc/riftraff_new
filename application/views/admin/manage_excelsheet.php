<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Dealers <small></small></h3>
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
                    <h2>Users <small><?php  echo $this->session->flashdata('message'); ?></small></h2>
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
                          <th>RR ID</th>
                          <th>Dealer ID</th>
                          <th>First</th>
                          <th>Lastname</th>
                          <th>Email</th>
                          <th>Store</th>
                          <th>Entry Date</th>
                         
                          
                          <th class="sorting_disabled">Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php  foreach ( $usersss as  $user ){ ?>
                        <tr>
                          <td><?php echo "RR".$user->id; ?></td>
                          <td><?php echo $user->dealerrID; ?></td>
                          <td><?php echo $user->firstname; ?></td>
                          <td><?php echo $user->lastname; ?></td>
                          <td><?php echo $user->email; ?></td>
                           <td><?php echo $user->store; ?></td>
                             <td><?php echo $user->date; ?></td>
						  <td>
<!--
                                                      <?php if($user->approve_status == 0) { ?>
														  <span  class="text-danger">Pending</span>
<!--
                                                      <a href ="/index.php/admin/approve_user/<?php //echo $user->id; ?>/dealer" type="button" class="btn btn-danger btn-xs">Unapproved</a>
-->
                                                      <?php } else { ?>
<!--
														  <span  class="text-success">Approved</span>
-->
<!--
                                                      <a href ="/index.php/admin/unapprove_user/<?php //echo $user->id; ?>/dealer" type="button" class="btn btn-success btn-xs">Approved</a>
-->
                                                      <?php } ?>
                          </td>
                    <td>
                            <a href="/index.php/category/excelsheet_download/<?php echo $user->id; ?>/dealer" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Download </a>
<!--
                            <a href="/index.php/category/edit_user/<?php //echo $user->id; ?>/dealer" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
-->
<!--
                            <a href="/index.php/admin/delete_user/<?php //echo $user->id; ?>/dealer" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
-->
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
  

