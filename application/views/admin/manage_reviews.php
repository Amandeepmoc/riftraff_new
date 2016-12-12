<?php include("header.php"); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reviews <small> <?php  echo $this->session->flashdata('message'); ?></small></h3>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reviews</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">ID</th>
                          <th style="width: 20%">Title</th>
                          <th>Image</th>
                          <th>Description</th>
                          <th>Date</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php foreach ($reviews as $review) {  ?>
                        <tr>
                          <td><?php echo $review->id; ?></td>
                          <td><?php echo $review->title; ?></td>
                          
                          <td>
						 
                           
                                <img src="<?php echo $review->image; ?>" class="avatar" alt="Avatar">
                              
                          </td>
                          <td>
                            
                           <?php echo $review->description; ?>
                          </td>
                          <td>
                           <?php echo $review->date; ?>
      </td>
                          <td>
                            <!--<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <a href="/index.php/admin/edit_review/<?php echo $review->id; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="/index.php/admin/delete_review/<?php echo $review->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>
					  <?php } ?>
                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include ("footer.php"); ?>