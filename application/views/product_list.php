<?php include('header.php'); ?>
<style>.rift-raff-nav .open > a, .rift-raff-nav .open > a:focus, .rift-raff-nav .open > a:hover {background-color: #3e9cc5;border-color: #337ab7;border-radius: 18px;color: #fff;} 
    .rift-raff-nav > li > a{background:none;font-size:16px;font-weight:600;color:#000;}
    .rift-raff-nav > li > a{padding:10px 30px!important;}
    .rift-raff-nav li:focus, .rift-raff-nav li:hover{background-color: #3e9cc5; border-color: #337ab7; border-radius: 18px;color: #fff;}
    .nav>li>a:hover{background:transparent;color:#fff;}</style>
<main>
    <div class="row">				
       
            
                <div class="col-md-3 col-sm-3 col-xs-5 n">
                
                   <h1><i class="fa fa-tag" aria-hidden="true"></i>Add Product</h1>
                </div>
           
            <div class="col-md-4 col-sm-4 col-xs-7">
                <ul class="nav navbar-nav rift-raff-nav"><br>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu">
                            <?php if ($this->session->userdata['logged_in']['type'] == 'dealer') { ?>
                                <li><a href="/index.php/riftraff/dealer_profile">Profile</a></li>
                                <?php if ($this->session->userdata['logged_in']['complete_profile'] == 0) { ?>
                                    <li><a href="/index.php/riftraff/dealer_account">My Dashboard</a></li>
                                <?php } else { ?>
                                    <li><a href="/index.php/riftraff/edit_dealer_profile">My Dashboard</a></li>
                                <?php } ?>
                                <li><a href="/index.php/riftraff/dealer_services">Add services</a></li> 

                            <?php } else if ($this->session->userdata['logged_in']['type'] == 'seller') { ?>
                                <li><a href="/index.php/riftraff/seller_profile">Profile</a></li>
                                <?php if ($this->session->userdata['logged_in']['complete_profile'] == 0) { ?>
                                    <li><a href="/index.php/riftraff/seller_account">My Dashboard</a></li>
                                <?php } else { ?>
                                    <li><a href="/index.php/riftraff/edit_seller_profile">My Dashboard</a></li>
                                <?php } ?>



                                <?php
                            } else {
                                
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                        <ul class="dropdown-menu">
                            <li><a href="/index.php/riftraff/product_list">Product list </a></li>
                            <li><a href="/index.php/riftraff/add_product">Add Product </a></li>
                            <li><a href="/index.php/riftraff/import">Import </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
            </div>
        </div>
        <div id="no-more-tables">
            <table class="col-md-12 col-sm-12 col-xs-12 table-bordered table-striped table-condensed cf text-center">
                <thead class="cf">
                    <tr>
                        <th>Product Name </th>
                        <!--<th>Image </th>-->
                        <!--<th class="numeric">Price</th>-->
                        <th >Status </th>
                        <!--<th class="numeric">Stock value</th>-->
<!--										<th class="numeric">Qty. Pending</th>
                        <th class="numeric">Qty. Sold</th>-->
<!--										<th class="numeric">Earn Amount</th>-->
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $p) { ?>
                        <tr>



                            <td data-title="Code"><?php echo $p->product_name; ?></td>
                            <!--<td data-title="Company"><img src="<?php echo base_url() . $products[$i]->image_path; ?>" style="height:80px;width:80px;"/></td>-->
                            <!--<td data-title="Price" class="numeric"><?php //echo $products[$i]->price;  ?> </td>-->
                            <td data-title="Status"><?php
                    if ($p->approve_status == 0) {
                        echo "Unapproved";
                    } else {
                        echo "Approved";
                    }
                        ?></td>
                            <!--<td data-title="Qty. Confirmed" class="numeric"><?php //echo $products[$i]->stockvalue;  ?></td>-->
    <!--										<td data-title="Qty. Pending" class="numeric">0</td>
                            <td data-title="Qty. Sold" class="numeric">0</td>
                            <td data-title="Earn Amount" class="numeric">$1.38</td>-->
                            <td data-title="Action" class="text-center">
                                <a href="/index.php/riftraff/product_view/<?php echo $p->id; ?>" class="text-left"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
                                <a href="/index.php/riftraff/edit_product/<?php echo $p->id; ?>" class="text-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;	 
                                <a  onclick="getConfirmation(this.id);" id = "<?php echo $p->id; ?>" class="text-left del"><i class="fa fa-trash-o" aria-hidden="true"></i></a>	

                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>
        </div>
        <br><br><br >
        <ul class="pagination pagination-sm center-block" style="margin-left:calc(100% - 55%);">
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
    </div>
</main>

<?php include('footer.php'); ?>
<script type="text/javascript">
    function getConfirmation(pid) {
        var id = pid;

        var retVal = confirm("Do you want to Delete this product ?");

        if (retVal == true) {
            var bb = "<?php echo base_url(); ?>";
            var full = bb + 'index.php/riftraff/delete_product/' + id;
            window.location.href = full;
            return true;
        } else {
//                   var bb = "<?php echo base_url(); ?>";
//                   var full = bb+'index.php/riftraff/product_list';
//                   window.location.assign(full);
            return false;
            var bb = "<?php echo base_url(); ?>";
            var full = bb + 'index.php/riftraff/product_list';
            window.location.href = full;
        }
    }
</script>