<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Consumers <small></small></h3>
              </div>

<!--              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Consumers <small><?php  echo $this->session->flashdata('message'); ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <label class="checkbox-inline"><input type="radio" class = "cb" name="cb" value="buyer" size="6"> Buyer    </label>
                      <label class="checkbox-inline"><input type="radio" class = "cb" name="cb" value="seller" size="6"> Seller    </label>
                    <p class="text-muted font-13 m-b-30">
     
                    </p>
                    <table id="datatable" class="table table-striped table-bordered all">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Type</th>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th class="sorting_disabled">Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php  foreach ( $users as  $user ){ ?>
                        <tr>
                          <td><?php echo $user->id; ?></td>
                          <td><?php echo $user->type; ?></td>
                          <td><?php echo $user->firstname; ?></td>
                          <td><?php echo $user->lastname; ?></td>
                          <td><?php echo $user->email; ?></td>
                          
						  <td>
                                                      <?php if($user->approve_status == 0) { ?>
													  <span  class="text-danger">Pending</span>	  
                                                      <!--<a href ="/index.php/admin/approve_user/<?php //echo $user->id; ?>" type="button" class="btn btn-danger btn-xs">Unapproved</a>-->
                                                      <?php } else { ?>
													  <span  class="text-success">Approved</span>  
                                                      <!--<a href ="/index.php/admin/unapprove_user/<?php //echo $user->id; ?>" type="button" class="btn btn-success btn-xs">Approved</a>-->
                                                      <?php } ?>
                          </td>
                    <td>
                            <a href="/index.php/Category/user_profile/<?php echo $user->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Profile </a>
                            <!--<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>-->
                            <a href="/index.php/admin/delete_user/<?php echo $user->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                         
                          
                        </tr>
                        
					  <?php } ?>
                      
                      </tbody>
                    </table>
                     <table id="datatable" class="table table-striped table-bordered sellerr" style="display:none;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Type</th>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th class="sorting_disabled">Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php  foreach ( $users as  $user ){ 
                                              if($user->type == 'seller') { ?>
                        <tr>
                          <td><?php echo $user->id; ?></td>
                          <td><?php echo $user->type; ?></td>
                          <td><?php echo $user->firstname; ?></td>
                          <td><?php echo $user->lastname; ?></td>
                          <td><?php echo $user->email; ?></td>
                          
						  <td>
                                                      <?php if($user->approve_status == 0) { ?>
													  <span  class="text-danger">Pending</span>	  
                                                      <!--<a href ="/index.php/admin/approve_user/<?php //echo $user->id; ?>" type="button" class="btn btn-danger btn-xs">Unapproved</a>-->
                                                      <?php } else { ?>
													  <span  class="text-success">Approved</span>  
                                                      <!--<a href ="/index.php/admin/unapprove_user/<?php //echo $user->id; ?>" type="button" class="btn btn-success btn-xs">Approved</a>-->
                                                      <?php } ?>
                          </td>
                    <td>
                            <a href="/index.php/Category/user_profile/<?php echo $user->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Profile </a>
                            <!--<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>-->
                            <a href="/index.php/admin/delete_user/<?php echo $user->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                         
                          
                        </tr>
                        
                                              <?php } else {} } ?>
                      
                      </tbody>
                    </table>
                     <table id="datatable" class="table table-striped table-bordered buyer" style="display: none;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Type</th>
                          <th>First name</th>
                          <th>Last name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th class="sorting_disabled">Action</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php  foreach ( $users as  $user ){ 
                                              if($user->type == 'buyer') { ?>
                        <tr>
                          <td><?php echo $user->id; ?></td>
                          <td><?php echo $user->type; ?></td>
                          <td><?php echo $user->firstname; ?></td>
                          <td><?php echo $user->lastname; ?></td>
                          <td><?php echo $user->email; ?></td>
                          
						  <td>
                                                      <?php if($user->approve_status == 0) { ?>
													  <span  class="text-danger">Pending</span>	  
                                                      <!--<a href ="/index.php/admin/approve_user/<?php //echo $user->id; ?>" type="button" class="btn btn-danger btn-xs">Unapproved</a>-->
                                                      <?php } else { ?>
													  <span  class="text-success">Approved</span>  
                                                      <!--<a href ="/index.php/admin/unapprove_user/<?php //echo $user->id; ?>" type="button" class="btn btn-success btn-xs">Approved</a>-->
                                                      <?php } ?>
                          </td>
                    <td>
                            <a href="/index.php/Category/user_profile/<?php echo $user->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Profile </a>
                            <!--<a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>-->
                            <a href="/index.php/admin/delete_user/<?php echo $user->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                         
                          
                        </tr>
                        
                                          <?php } } ?>
                      
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
        $(".cb").click(function(){
            
           if ($(".cb").is(":checked"))
            {
                var color = $(".cb:checked").val();
                //alert(color);
                if(color == 'seller')
                {
                   // alert("yes");
                    $(".sellerr").show();
                    $(".buyer").hide();
                    $(".all").hide();
                }
                else if(color == 'buyer')
                {

                    $(".buyer").show();
                    $(".sellerr").hide();
                    $(".all").hide();
                }
                else
                {
                    $(".all").show();
                    $(".buyer").hide();
                    $(".sellerr").hide();
                }
            }
        });
      });
    </script>
    <!-- /Datatables -->
  

