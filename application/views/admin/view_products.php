<?php include("header.php"); ?>


 <!-- page content --> 
        <div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
				
                <h3>E-commerce :: Product Page</h3>
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
                    <h2><?php foreach($single_product as $prd ){ echo $prd->product_name." added By ".$prd->firstname." ". $prd->lastname ;  } ?></h2>
                  
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-7 col-sm-7 col-xs-12">
						<?php 
						$num = 0;
						$imgnum =  count($image);
						foreach ($image as $img) {  if($num==0) { ?> 
                      <div class="product-image">
                        <img src="<?php echo $img->image_path; ?>" alt="..." />
						</div> <?php }else{ ?>
                      <div class="product_gallery">

                        <a>
                          <img src="<?php echo $img->image_path; ?>" alt="..." />
                        </a>
                       
                      </div>
						<?php }
						
						$num++;
						} ?>
                    </div>

                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                      <h3 class="prod_title">Product Description </h3>

                      <p><?php foreach ($decription  as $dsc) { echo $dsc->attribute_value;  }  ?></p>
                      <br />

                      <div class="">
                        <h2>Available Colors</h2>
                        <ul class="list-inline prod_color">
							<?php foreach ($color as $clr) {     ?>
                          <li>
                            <p><?php echo $clr->attribute_value;  ?></p>
                            <div class="color bg-<?php echo $clr->attribute_value;  ?>"></div>
                          </li>
                          <?php } ?> 
                          

                        </ul>
                      </div>
                      <br />

                      <div class="">
<!--
                        <h2>Size <small>Please select one</small></h2>
                        <ul class="list-inline prod_size">
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Small</button>
                          </li>
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Medium</button>
                          </li>
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Large</button>
                          </li>
                          <li>
                            <button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
                          </li>
                        </ul>
-->
                      </div>
                      <br />

                      <div class="">
                        <div class="product_price">
								<?php foreach ($price  as $prc) {      ?>
                          <h1 class="price"><?php echo $prc->attribute_value;  } ?></h1>
<!--
                          <span class="price-tax">Ex Tax: Ksh80.00</span>
-->
                          <br>
                        </div>
                      </div>

                      <div class="">
                        <button type="button" class="btn btn-default btn-lg"><?php foreach ($brand  as $brd) { echo $brd->attribute_value;  }  ?></button>
                        <button type="button" class="btn btn-default btn-lg"><?php foreach($single_product as $prd ){ echo $prd->category_name;  } ?></button>
                      </div>

                      <div class="product_social">
                        <ul class="list-inline">
<!--
                          <li><a href="#"><i class="fa fa-facebook-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-twitter-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                          </li>
                          <li><a href="#"><i class="fa fa-rss-square"></i></a>
                          </li>
-->
                        </ul>
                      </div>

                    </div>


<!--
                    <div class="col-md-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Home</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <p></p>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                              booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div>
                        </div>
                      </div>

                    </div>
                  
-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include("footer.php"); ?>
