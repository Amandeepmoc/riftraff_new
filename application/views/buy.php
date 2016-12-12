<?php include('header2.php'); ?>
<style>
    .view-mode strong .fa {padding:10px;} 
    .view-mode a .fa, .view-mode a {transition: all 300ms ease-in-out 0s;padding:10px;text-decoration: none;color:#000;}
    .bg-color{background:#000;padding:20px;}
    .card1{background:#fff;border:1px solid #dfdad6;padding-bottom:30px;}
    .card-block{padding:5px;}
    .rate {text-align:right;}
    .img4{ max-height: 180px;max-width: 100%;object-fit: cover;height:180px;width:100%;}
    @media (min-width: 769px) {
        .left-bar{position: absolute!important;top: 0; left: 0;bottom: 0; z-index: 1000; display: block; background-color:#ECECEC;width:24%;padding:0px;}
    }
    @media (max-width:767px)
    {
        .img4{ max-height: 100%;height:auto;}
    }
    .rating {
        float:left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
       follow these rules. Every browser that supports :checked also supports :not(), so
       it doesn’t make the test unnecessarily selective */
    .rating:not(:checked) > input {
        position:absolute;
        top:-9999px;
        clip:rect(0,0,0,0);
    }

    .rating:not(:checked) > label {
        float:right;
        width:1em;
        padding:0 .1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:200%;
        line-height:1.2;
        color:#ddd;
/*        text-shadow:1px 1px #bbb, 2px 2px #666, .1em .1em .2em rgba(0,0,0,.5);
   */
    }
    .rating:not(:checked) > label:before {
        content: '★ ';
    }

    .rating > input:checked ~ label {
        color: gold;
/*        text-shadow:1px 1px #c60, 2px 2px #940, .1em .1em .2em rgba(0,0,0,.5);*/
    }

    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: gold;
/*        text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);*/
    }

    .rating > input:checked + label:hover,
    .rating > input:checked + label:hover ~ label,
    .rating > input:checked ~ label:hover,
    .rating > input:checked ~ label:hover ~ label,
    .rating > label:hover ~ input:checked ~ label {
        color: gold;
        /*text-shadow:1px 1px goldenrod, 2px 2px #B57340, .1em .1em .2em rgba(0,0,0,.5);*/
    }

    .rating > label:active {
        position:relative;
        top:2px;
        left:2px;
    }
</style>
<div class="container-fluid padding"><img src="/images/riftraffbuy2copy.jpg" class="img-responsive" width="100%;"/></div>
<div class="container">
    <!--<h2>Fender Guiatrs near woodland hills, CA 91134</h2>-->
    <br>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <?php if (isset($this->session->userdata['logged_in']['city'])) { ?>
<!--            <div class='col-md-8'>
                <h4 class="text-capitalize" style="font-family:'DAVID',sans-serif;font-size:24px;">Results for city <?php //echo $this->session->userdata['logged_in']['city']; ?></h4>
            </div>
            <div class="col-md-4">
                <span class='pull-right text-center' style="font-size:18px;font-family:'DAVID',sans-serif;"><span style="font-weight:600;"><?php //echo count($all); ?></span> <br>Matches </span>
            </div>-->
            <?php
        } if ($p_type == 'buy' || $p_type == 'favourites') {
            
        } else if ($p_type == 'search') {
            ?>
            <div class='col-md-8 re'>
                <h4 class="text-capitalize" style="font-family:'DAVID',sans-serif;font-size:24px;">Results for city <?php echo str_replace("%20", " ", $this->uri->segment(3)); ?></h4>
            </div>
            <div class="col-md-4 re">
                <span class='pull-right text-center' style="font-size:18px;font-family:'DAVID',sans-serif;"><span style="font-weight:600;"><?php echo $tcount; ?></span> <br>Matches </span>
            </div>
            <?php
        } else {
            if ($all != 0) {
                ?>
                <div class='col-md-8 show_cat'>
                    <h4 class="text-capitalize" style="font-family:'DAVID',sans-serif;font-size:24px;">Results for Category <?php echo $search_data[0]->category_name; ?></h4>
                </div>
                <div class="col-md-4 show_cat">
                    <span class='pull-right text-center' style="font-size:18px;font-family:'DAVID',sans-serif;"><?php echo count($all); ?><br> Matches </span>
                </div>
                <?php
            }
        }
        ?>
        <div class="col-md-4 fetchcount pull-right">
            <span class='pull-right text-center dd' style="font-size:18px;font-family:'DAVID',sans-serif;"></span>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <!--					<div class="row buy-nav">
                                                        <div class="form-inline">
                                                                <div class="form-group">
                                                                        <label>Sort by : </label>
                                                                        <select class="form-control">
                                                                                <option>10 Miles</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Page : </label>
                                                                        <select class="form-control">
                                                                                <option>Lowest Price</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                        </select>
                                                                </div>
                                                        
                                                        </div>
                                                </div><br>-->

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-bar padding" style="overflow-y:auto;">
                <div class="g-search">
                    <span><h4 class="search1"><b>SEARCH</b></h4></span>
                    <!--								<div class="box">
                                                                                            <div class="search-text">
                                                                                                    <p>Price</p>
                                                                                                    <h4><i class="fa fa-times"></i> abc</h4>
                                                                                            </div>
                                                                                            <div class="search-text">
                                                                                                    <p>Make</p>
                                                                                                    <h4> <i class="fa fa-times"></i> abc</h4>
                                                                                            </div>
                                                                                            <div class="search-text">
                                                                                                    <p>Make</p>
                                                                                                    <h4><i class="fa fa-times"></i> abc</h4>
                                                                                            </div>
                                                                                    </div><br>-->
                    <!--								<span> <h4>Modify Results </h4></span>
                                                                                            <div class="box">
                                                                                                    <form role="form" style="padding:5px;">
                                                                                                            <div class="form-group dealer-form">
                                                                                                                    <label>MINIMUM YEAR</label>
                                                                                                                    <select class="form-control">
                                                                                                                            <option>1</option>
                                                                                                                            <option>2</option>
                                                                                                                            <option>3</option>
                                                                                                                            <option>4</option>
                                                                                                                            <option>5</option>
                                                                                                                    </select>
                                                                                                            </div>
                                                                                                            <div class="form-group dealer-form">
                                                                                                                    <label>MAXIMUM YEAR</label>
                                                                                                                    <select class="form-control">
                                                                                                                            <option>1</option>
                                                                                                                            <option>2</option>
                                                                                                                            <option>3</option>
                                                                                                                            <option>4</option>
                                                                                                                            <option>5</option>
                                                                                                                    </select>
                                                                                                            </div>
                                                                                                            <div class="form-group dealer-form">
                                                                                                                    <label>MINIMUM PRICE</label>
                                                                                                                    <select class="form-control">
                                                                                                                            <option>1</option>
                                                                                                                            <option>2</option>
                                                                                                                            <option>3</option>
                                                                                                                            <option>4</option>
                                                                                                                            <option>5</option>
                                                                                                                    </select>
                                                                                                            </div>
                                                                                                            <div class="form-group dealer-form">
                                                                                                                    <label>MAXIMUM PRICE</label>
                                                                                                                    <select class="form-control">
                                                                                                                            <option>1</option>
                                                                                                                            <option>2</option>
                                                                                                                            <option>3</option>
                                                                                                                            <option>4</option>
                                                                                                                            <option>5</option>
                                                                                                                    </select>
                                                                                                            </div>
                                                                                                            <button type="button" class="btn  btn-block"><strong>Update Values</strong></button>
                                                                                                    </form>
                                                                                            </div>-->
                    <hr style="background:#fff;border-color:#fff;border-width:15px;margin:0px;">
                    <div class="panel-group box" id="accordion" >
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapsecat">
                                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Category </h4></div>
                            </a>
                            <div id="collapsecat" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <form>
                                        <?php foreach ($category as $brand) { ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" id="<?php echo $brand->id; ?>" name = "cat" class = "cat_id searchh" value="<?php echo $brand->id; ?>"><?php echo $brand->category_name; ?></label>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Condition</h4></div>
                            </a>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form>

                                        <div class="checkbox">
                                            <label><input type="checkbox" name = "con" class = "con_id searchh" value="new">New</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox"  name = "con" class = "con_id searchh" value="used">Used</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox"   name = "con" class = "con_id searchh" value="clearance">Clearance</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSell">
                                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Seller </h4></div>
                            </a>
                            <div id="collapseSell" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form>

                                        <div class="checkbox">
                                            <label><input type="checkbox" class = "sell_id searchh" value="dealer">Retail Store</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" class = "sell_id searchh" value="seller">Private Owner</label>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--                    <div class="panel">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapsePrice">
                                                    <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Price </h4></div>
                                                </a>
                                                <div id="collapsePrice" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form>
                        
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-sm-3 col-xs-3" style="padding:0px;">From $</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-9"> 
                                                                                                                <input type="text" style="width:100%;">
                                                                </div>
                                                             </div>
                                                           
                                                                                           
                                                                                           <div class="form-group row">
                                                                <label class="col-md-3 col-sm-3 col-xs-3" style="padding:0px;">To $</label>
                                                                <div class="col-md-9 col-sm-9 col-xs-9"> 
                                                                                                                <input type="text" style="width:100%;">
                                                                </div>
                                                                
                                                             </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>-->

                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Brands</h4></div>
                            </a>
                            <div id="collapseOne" class="panel-collapse collapse ">
                                <div class="panel-body">
                                    <form>
                                        <?php foreach ($brands as $brand) { ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox"  class = "brand_id searchh" value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></label>
                                            </div>
                                        <?php } ?>
                                    </form>		
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Color </h4></div>
                            </a>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <form>
                                        <?php foreach ($colours as $brand) { ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" class = "color_id searchh" value="<?php echo $brand->id; ?>"><?php echo $brand->product_colour; ?></label>
                                            </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapserange">
                                <div class="panel-heading"><h4 class="panel-title"><i class="fa fa-caret-down" aria-hidden="true"></i>  Price Filter </h4></div>
                            </a>
                            <div id="collapserange" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14" style="width:100%;"/>
                                </div>
                            </div>
                        </div>

                        <!--										<div class="panel">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                                                                                        <div class="panel-heading"><h4 class="panel-title">Features</h4></div>
                                                                                                                </a>
                                                                                                                <div id="collapseFour" class="panel-collapse collapse">
                                                                                                                        <div class="panel-body">
                                                                                                                                <table class="table">
                                                                                                                                        <tr>
                                                                                                                                                <td>
                                                                                                                                                        <span class="glyphicon glyphicon-usd"></span><a href="http://www.jquery2dotnet.com">Sales</a>
                                                                                                                                                </td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                                <td>
                                                                                                                                                        <span class="glyphicon glyphicon-user"></span><a href="http://www.jquery2dotnet.com">Customers</a>
                                                                                                                                                </td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                                <td>
                                                                                                                                                        <span class="glyphicon glyphicon-tasks"></span><a href="http://www.jquery2dotnet.com">Products</a>
                                                                                                                                                </td>
                                                                                                                                        </tr>
                                                                                                                                        <tr>
                                                                                                                                                <td>
                                                                                                                                                        <span class="glyphicon glyphicon-shopping-cart"></span><a href="http://www.jquery2dotnet.com">Shopping Cart</a>
                                                                                                                                                </td>
                                                                                                                                        </tr>
                                                                                                                                </table>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-md-offset-3 col-sm-offset-3 col-md-9 col-sm-9 col-xs-12 buy-right ">
                <div class="form-inline">

                    <div class="form-group">
                        <label>Search by : </label>
                        <select name="state" class="statess form-control" id="stateeId">

                            <option value="">Select State</option>
                            <option value="Alabama" stateid="3919">Alabama</option><option value="Alaska" stateid="3920">Alaska</option><option value="Arizona" stateid="3921">Arizona</option><option value="Arkansas" stateid="3922">Arkansas</option><option value="Byram" stateid="3923">Byram</option><option value="California" stateid="3924">California</option><option value="Cokato" stateid="3925">Cokato</option><option value="Colorado" stateid="3926">Colorado</option><option value="Connecticut" stateid="3927">Connecticut</option><option value="Delaware" stateid="3928">Delaware</option><option value="District of Columbia" stateid="3929">District of Columbia</option><option value="Florida" stateid="3930">Florida</option><option value="Georgia" stateid="3931">Georgia</option><option value="Hawaii" stateid="3932">Hawaii</option><option value="Idaho" stateid="3933">Idaho</option><option value="Illinois" stateid="3934">Illinois</option><option value="Indiana" stateid="3935">Indiana</option><option value="Iowa" stateid="3936">Iowa</option><option value="Kansas" stateid="3937">Kansas</option><option value="Kentucky" stateid="3938">Kentucky</option><option value="Louisiana" stateid="3939">Louisiana</option><option value="Lowa" stateid="3940">Lowa</option><option value="Maine" stateid="3941">Maine</option><option value="Maryland" stateid="3942">Maryland</option><option value="Massachusetts" stateid="3943">Massachusetts</option><option value="Medfield" stateid="3944">Medfield</option><option value="Michigan" stateid="3945">Michigan</option><option value="Minnesota" stateid="3946">Minnesota</option><option value="Mississippi" stateid="3947">Mississippi</option><option value="Missouri" stateid="3948">Missouri</option><option value="Montana" stateid="3949">Montana</option><option value="Nebraska" stateid="3950">Nebraska</option><option value="Nevada" stateid="3951">Nevada</option><option value="New Hampshire" stateid="3952">New Hampshire</option><option value="New Jersey" stateid="3953">New Jersey</option><option value="New Jersy" stateid="3954">New Jersy</option><option value="New Mexico" stateid="3955">New Mexico</option><option value="New York" stateid="3956">New York</option><option value="North Carolina" stateid="3957">North Carolina</option><option value="North Dakota" stateid="3958">North Dakota</option><option value="Ohio" stateid="3959">Ohio</option><option value="Oklahoma" stateid="3960">Oklahoma</option><option value="Ontario" stateid="3961">Ontario</option><option value="Oregon" stateid="3962">Oregon</option><option value="Pennsylvania" stateid="3963">Pennsylvania</option><option value="Ramey" stateid="3964">Ramey</option><option value="Rhode Island" stateid="3965">Rhode Island</option><option value="South Carolina" stateid="3966">South Carolina</option><option value="South Dakota" stateid="3967">South Dakota</option><option value="Sublimity" stateid="3968">Sublimity</option><option value="Tennessee" stateid="3969">Tennessee</option><option value="Texas" stateid="3970">Texas</option><option value="Trimble" stateid="3971">Trimble</option><option value="Utah" stateid="3972">Utah</option><option value="Vermont" stateid="3973">Vermont</option><option value="Virginia" stateid="3974">Virginia</option><option value="Washington" stateid="3975">Washington</option><option value="West Virginia" stateid="3976">West Virginia</option><option value="Wisconsin" stateid="3977">Wisconsin</option><option value="Wyoming" stateid="3978">Wyoming</option></select>
                    </div>
                    <div class="form-group">
                        <select name="city" class="citiess form-control" id="cityyId" class="form-control">
                            <option value="">Select City</option>
                        </select>
                    </div>

                    <!--                <div class="form-group">
                                        <label>Sorting : </label>
                                        <span class="plain-select">  
                                            <select class="" style="border-radius:0px;">
                                                <option value='desc'>Highest</option>
                                                <option value='asc'>Lowest</option>
                                            </select>
                                        </span>
                                    </div>-->
                    <!-- <div class="form-group">
                        <select name="country" class="countries form-control" id="countryId" >
                            <option value="">Select country</option>
                                            </select>
                    </div>-->
                    <div class="view-mode form-group">
                        <span title="Grid" class="grid"><a href="javascript:void(0)" id = "mm">Grid  <i class="fa fa-th-large"></i></a></span>
                        <a href="javascript:void(0)" title="List" class="list">Listing  <i class="fa fa-th-list"></i></a>
                    </div>






                </div>
                <div class = "myshow">
                    <div class="list_view" style="display: none;">
                        <?php
//            echo "<pre>";
//            print_r($all); 
//            echo "<pre>";
//            print_r($price); 
//            echo "<pre>";
//            print_r($desc); 
//                    die();
                        if ($all == 0) {
                            ?>
                            <div class="row">
                                <h3>No results found !!!</h3>
                            </div>
                            <?php
                        } else {
                            foreach ($all as $n) {
                                ?>
                                <div class="row">
                                    <span class="h4 pull-left"><?php echo $n['name']; ?></span>
                                    <span class="h4 pull-right">
                                        <?php if ($p_type != 'favourites') { ?> <a  style="cursor:pointer;" class="" onclick="getConfirmation(this.id);" id="<?php echo $n['id']; ?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i>  Favourites</a><?php } ?>
                                        <a href="#" class="">Compare</a>
                                        <a href="#" class="" style="font-size:20px;color:#ccc;vertical-align:middle;">&times;</a>
                                    </span>
                                    <br><br>
                                    <hr style="border-color:#000;">
                                    <!--                            <div class="col-md-5">
                                    
                                                                   <a href="/index.php/riftraff/product_view/<?php //echo $n['id']         ?>"><img class="img-responsive" src="<?php //echo base_url() . $n['img'];         ?>" width="200"/></a>
                                                                </div>-->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="col-md-8 col-sm-12 col-xs-12 padding">

                                            <a href="/index.php/riftraff/product_view/<?php echo $n['id'] ?>">
                                                <div style="display: inline-block;width:100%;">
                                                    <img class="img-responsive img4" src="<?php
                                                    if (!empty($n['img'])) {
                                                        echo base_url() . $n['img'][0];
                                                    } else {
                                                        echo '/images/no-image-icon-6.png';
                                                    }
                                                    ?>" style=" "/>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12 padding">
                                            <?php
                                            $i = 0;
                                            if (!empty($n['img'])) {
                                                foreach ($n['img'] as $dd) {
                                                    if ($i < 2) {
                                                        ?>
                                                        <img class="img-responsive img5" src="<?php echo base_url() . $dd; ?>" />
                                                        <?php
                                                    }$i++;
                                                }
                                            } else {
                                                ?>
                                                <img class="img-responsive img5" src="/images/no-image-icon-6.png" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="border-right:2px solid #ccc;">
                                        <h3><?php echo "$" . $n['price']; ?></h3>
                                        <p> <?php echo substr($n['desc'], 0, 109); ?></p>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <p></p>
                                        <?php if ($n['type'] == 'dealer') { ?>
                                            <img src="<?php echo base_url() . $n['company_logo']; ?>" class="img-responsive" style="width:100%;"/>
                                            <p><?php echo $n['address']; ?> <br> 
                                                <?php echo $n['phone_num']; ?>
                                            </p>
                                        <?php } else { ?>

                                            <p><?php echo $n['email']; ?> <br>
                                                <?php echo $n['address']; ?> <br> 
                                                <?php echo $n['phone_num']; ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="grid_view" >
                        <div class="row">  
                            <?php
                            $i = 0;
                            if ($all == 0) {
                                ?>

                                <h3>No results found !!!</h3>

                                <?php
                            } else {
                                $nn = count($all);
                                $k = 0;

                                foreach ($all as $n) {
                                    if ($i == 0) {
                                        ?>

                                    <?php }
                                    ?>


                                    <div class="col-md-4">

                                        <div class="card card1">
                                            <!--					 <h4 class="located"><em>Located</em></h4>
                                                                                    <span style="background:#333;color:#fff;font-size:18px;padding:2.4px 0px 2.4px 2px;">7&nbsp;</small><p><small>Miles Away</small>&nbsp;from you</p></span>
                                            -->
                                            <a href="/index.php/riftraff/product_view/<?php echo $n['id'] ?>"><img class="card-img-top img-responsive" src=" <?php
                                                if (!empty($n['img'])) {
                                                    echo base_url() . $n['img'][0];
                                                } else {
                                                    echo '/images/no-image-icon-6.png';
                                                }
                                                ?>" alt="Card image cap" style="width:100%;"></a>
                                            <div class="card-block">
                                                <h4 class="card-title"><?php echo $n['name']; ?> </h4>
        <!--                                                <input id="input-21e" value="5" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >-->
                                               <div class="rating">
                                                    <input type="radio" id="<?php echo $n['id'].'star5'; ?>" name="<?php echo $n['id'].'rating'; ?>" value="5" /><label for="<?php echo $n['id'].'star5'; ?>" title="Rocks!">5 stars</label>
                                                    <input type="radio" id="<?php echo $n['id'].'star4' ; ?>" name="<?php echo $n['id'].'rating'; ?>" value="<?php echo $n['id'].'rating'; ?>" /><label for="<?php echo $n['id'].'star4' ; ?>" title="Pretty good">4 stars</label>
                                                    <input type="radio" id="<?php echo $n['id'].'star3' ; ?>" name="<?php echo $n['id'].'rating'; ?>" value="<?php echo $n['id'].'rating'; ?>" checked /><label for="<?php echo $n['id'].'star3' ; ?>" title="Meh">3 stars</label>
                                                    <input type="radio" id="<?php echo $n['id'].'star2' ; ?>" name="<?php echo $n['id'].'rating'; ?>" value="<?php echo $n['id'].'rating'; ?>" /><label for="<?php echo $n['id'].'star2' ; ?>" title="Kinda bad">2 stars</label>
                                                    <input type="radio" id="<?php echo $n['id'].'star1' ; ?>" name="<?php echo $n['id'].'rating'; ?>" value="<?php echo $n['id'].'rating'; ?>" /><label for="<?php echo $n['id'].'star1' ; ?>" title="Kinda bad">1 star</label>
                                                </div>
                                                <div class="text-danger rate"><strong><sup>$</sup><?php echo $n['price']; ?><sup><?php echo $n['price']; ?></sup></strong></div>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                    $i++;
                                    $nn--;
                                    if (($i > 2) && ($nn > 0)) {
                                        $i = 0;
                                        ?>
                                    </div>
                                    <div class = "row">


                                        <?php
                                    } else {
                                        
                                    }
                                }
                            }
                            ?>
                        </div> 

                    </div>

                </div>


                <!--            <div class="row">
                                <span class="h4 pull-left">Heading</span>
                                <span class="h4 pull-right text-warning">
                                    <a href="#" class="text-warning">Favourites</a> |
                                    <a href="#" class="text-warning">Compare</a>
                                </span>
                                <br>
                                <hr>
                                <div class="col-md-5">
                                    <img class="img-responsive" src="images/8.jpg" width="200"/>
                                </div>
                                <div class="col-md-4">
                                    <h3>$1,450</h3>
                                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="col-md-3">
                                    <p></p>
                                    <img src="images/dealer/1.jpg" class="img-responsive"/>
                                    <p> It was popularised in<br> 
                                        the 1960s with the<br>
                                        release</p>
                                </div>
                            </div>
                            <div class="row">
                                <span class="h4 pull-left">Heading</span>
                                <span class="h4 pull-right text-warning">
                                    <a href="#" class="text-warning">Favourites</a> |
                                    <a href="#" class="text-warning">Compare</a>
                                </span>
                                <br>
                                <hr>
                                <div class="col-md-5">
                                    <img class="img-responsive" src="images/8.jpg"/>
                
                                </div>
                                <div class="col-md-4">
                                    <h3>$1,450</h3>
                                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="col-md-3">
                                    <p>5 Miles from 2226</p>
                                    <img src="images/dealer/1.jpg" class="img-responsive"/>
                                    <p> It was popularised in<br> 
                                        the 1960s with the<br>
                                        release</p>
                                </div>
                            </div>
                            <div class="row">
                                <span class="h4 pull-left">Heading</span>
                                <span class="h4 pull-right text-warning">
                                    <a href="#" class="text-warning">Favourites</a> |
                                    <a href="#" class="text-warning">Compare</a>
                                </span>
                                <br>
                                <hr>
                                <div class="col-md-5">
                                    <img class="img-responsive" src="images/8.jpg" />
                                </div>
                                <div class="col-md-4">
                                    <h3>$1,450</h3>
                                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="col-md-3">
                                    <p>5 Miles from 2226</p>
                                    <img src="images/dealer/1.jpg" class="img-responsive"/>
                                    <p> It was popularised in<br> 
                                        the 1960s with the<br>
                                        release</p>
                                </div>
                            </div>
                            <div class="row">
                                <span class="h4 pull-left">Heading</span>
                                <span class="h4 pull-right text-warning">
                                    <a href="#" class="text-warning">Favourites</a> |
                                    <a href="#" class="text-warning">Compare</a>
                                </span>
                                <br>
                                <hr>
                                <div class="col-md-5">
                                    <img class="img-responsive" src="images/8.jpg" />
                                </div>
                                <div class="col-md-4">
                                    <h3>$1,450</h3>
                                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="col-md-3">
                                    <p>5 Miles from 2226</p>
                                    <img src="images/dealer/1.jpg" class="img-responsive"/>
                                    <p> It was popularised in<br> 
                                        the 1960s with the<br>
                                        release</p>
                                </div>
                            </div>
                
                            <div class="row">
                                <span class="h4 pull-left">Heading</span>
                                <span class="h4 pull-right text-warning">
                                    <a href="#" class="text-warning">Favourites</a> |
                                    <a href="#" class="text-warning">Compare</a>
                                </span>
                                <br>
                                <hr>
                                <div class="col-md-5">
                                    <img class="img-responsive" src="images/8.jpg"/>
                                </div>
                                <div class="col-md-4">
                                    <h3>$1,450</h3>
                                    <p> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div>
                                <div class="col-md-3">
                                    <p>5 Miles from 2226</p>
                                    <img src="images/dealer/1.jpg" class="img-responsive"/>
                                    <p> It was popularised in<br> 
                                        the 1960s with the<br>
                                        release</p>
                                </div>
                            </div>-->
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="<?php echo base_url(); ?>js/bootstrap-slider.min.js" type="text/javascript"></script>
<script type="text/javascript">
                                            function getConfirmation(pid) {
                                                var id = pid;
                                                var retVal = confirm("Do you want to add this product in favourites?");
                                                if (retVal == true) {
                                                    var bb = "<?php echo base_url(); ?>";
                                                    var full = bb + 'index.php/riftraff/add_favourite/' + id;
                                                    //alert(full);
                                                    //console.log(full);
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
                                            $(document).ready(function () {
                                                $(".list").click(function () {
                                                    $('.grid_view').hide();
                                                    $('.list_view').show();
                                                });
                                                $(".grid").click(function () {

                                                    $('.list_view').hide();
                                                    $('.grid_view').show();
                                                });

                                                $(".searchh").click(function () {
                                                    //if($(this).is(":checked")) {
                                                    //var value = $(this).val();
                                                    if ($(".cat_id").is(":checked"))
                                                    {
                                                        var cat = $(".cat_id:checked").val();
                                                        // var dtype = 'cat';
                                                        // alert(cat);
                                                    } else
                                                    {
                                                        var cat = 0;

                                                    }
                                                    if ($(".con_id").is(":checked"))
                                                    {
                                                        var con = $(".con_id:checked").val();
                                                        // var dtype = 'cat,con';
                                                        // alert(con);
                                                    } else
                                                    {
                                                        var con = 0;
                                                    }
                                                    if ($(".brand_id").is(":checked"))
                                                    {
                                                        var brand = $(".brand_id:checked").val();
                                                        // var dtype = 'cat,con,brand';
                                                        //alert(brand);

                                                    } else
                                                    {
                                                        var brand = 0;
                                                    }

                                                    if ($(".color_id").is(":checked"))
                                                    {
                                                        var color = $(".color_id:checked").val();
                                                        //var dtype = 'cat,con,brand,color';
                                                    } else
                                                    {
                                                        var color = 0;
                                                    }
                                                    if ($(".sell_id").is(":checked"))
                                                    {
                                                        var sell_id = $(".sell_id:checked").val();
                                                        //var dtype = 'cat,con,brand,color';
                                                    } else
                                                    {
                                                        var sell_id = 0;
                                                    }

                                                    // alert(value);
                                                    //var param  = "dd="+value;

                                                    //alert(dd);
                                                    var price = ($('#ex1').val());
                                                    //console.log(brand + color + con + cat);

                                                    if (brand != '0')
                                                    {
                                                        var dtype = 'brand';
                                                    }
                                                    if (color != '0')
                                                    {
                                                        var dtype = 'color';
                                                    }
                                                    if (con != '0')
                                                    {
                                                        var dtype = 'con';
                                                    }
                                                    if (cat != '0')
                                                    {
                                                        var dtype = 'cat';
                                                    }

                                                    if (brand != '0' && color != '0')
                                                    {
                                                        var dtype = 'brand,color';
                                                    }
                                                    if (brand != '0' && color != '0' && con != '0')
                                                    {
                                                        var dtype = 'brand,color,con';
                                                    }
                                                    if (brand != '0' && color != '0' && con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'brand,color,con,cat';
                                                    }
                                                    if (color != '0' && con != '0')
                                                    {
                                                        var dtype = 'color,con';
                                                    }
                                                    if (con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'con,cat';
                                                    }
                                                    if (brand != '0' && con != '0')
                                                    {
                                                        var dtype = 'brand,con';
                                                    }
                                                    if (brand != '0' && cat != 0)
                                                    {
                                                        var dtype = 'brand,cat';
                                                    }
                                                    if (color != '0' && cat != 0)
                                                    {
                                                        var dtype = 'color,cat';
                                                    }
                                                    if (color != '0' && con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'color,con,cat';
                                                    }
                                                    if (brand != '0' && con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'brand,con,cat';
                                                    }
                                                    if (brand != '0' && con != '0' && cat != 0 && color != 0)
                                                    {
                                                        var dtype = 'brand,con,cat,color';
                                                    }
                                                    console.log(dtype);
                                                    //if(brand && color && con && cat){
                                                    var param = "brand=" + brand + "&color=" + color + "&cat=" + cat + "&con=" + con + "&price=" + price + "&sell=" + sell_id + "&dtype=" + dtype;
                                                    //console.log(param);

                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "/index.php/riftraff/fetch_pdata_grid",
                                                        dataType: 'html',
                                                        data: param,
                                                        success: function (response) {
                                                            //console.log(response);
                                                            // $("#mm").attr('href', '/index.php/riftraff/buy');
                                                            //var result = new Array();
                                                            // result =  JSON.parse(response);
                                                            //console.log(result);
                                                            // console.log(result['all']['4']);

                                                            // console.log(result);
                                                            //console.log(result.length);
                                                            var res = response.substring(0, 1);
                                                            var ress = response.substring(1);

                                                            if (response != 0)
                                                            {
                                                                $(".dd").html(res + "<br> Matches");
                                                                $(".grid_view").empty();
                                                                $(".show_cat").hide();
                                                                $(".grid_view").html(ress);
                                                            } else
                                                            {
                                                                $(".grid_view").empty();
                                                                $(".show_cat").hide();
                                                                $(".grid_view").html("<h4>No results found!!</h4>");

                                                            }
                                                        }
                                                    });
                                                    // }

                                                });

                                                $(".searchh").click(function () {
                                                    //if($(this).is(":checked")) {
                                                    //var value = $(this).val();
                                                    if ($(".cat_id").is(":checked"))
                                                    {
                                                        var cat = $(".cat_id:checked").val();
                                                        // var dtype = 'cat';
                                                        // alert(cat);
                                                    } else
                                                    {
                                                        var cat = 0;

                                                    }
                                                    if ($(".con_id").is(":checked"))
                                                    {
                                                        var con = $(".con_id:checked").val();
                                                        // var dtype = 'cat,con';
                                                        // alert(con);
                                                    } else
                                                    {
                                                        var con = 0;
                                                    }
                                                    if ($(".brand_id").is(":checked"))
                                                    {
                                                        var brand = $(".brand_id:checked").val();
                                                        // var dtype = 'cat,con,brand';
                                                        //alert(brand);

                                                    } else
                                                    {
                                                        var brand = 0;
                                                    }

                                                    if ($(".color_id").is(":checked"))
                                                    {
                                                        var color = $(".color_id:checked").val();
                                                        //var dtype = 'cat,con,brand,color';
                                                    } else
                                                    {
                                                        var color = 0;
                                                    }
                                                    if ($(".sell_id").is(":checked"))
                                                    {
                                                        var sell_id = $(".sell_id:checked").val();
                                                        //var dtype = 'cat,con,brand,color';
                                                    } else
                                                    {
                                                        var sell_id = 0;
                                                    }

                                                    // alert(value);
                                                    //var param  = "dd="+value;

                                                    //alert(dd);
                                                    var price = ($('#ex1').val());
                                                    //console.log(brand + color + con + cat);

                                                    if (brand != '0')
                                                    {
                                                        var dtype = 'brand';
                                                    }
                                                    if (color != '0')
                                                    {
                                                        var dtype = 'color';
                                                    }
                                                    if (con != '0')
                                                    {
                                                        var dtype = 'con';
                                                    }
                                                    if (cat != '0')
                                                    {
                                                        var dtype = 'cat';
                                                    }

                                                    if (brand != '0' && color != '0')
                                                    {
                                                        var dtype = 'brand,color';
                                                    }
                                                    if (brand != '0' && color != '0' && con != '0')
                                                    {
                                                        var dtype = 'brand,color,con';
                                                    }
                                                    if (brand != '0' && color != '0' && con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'brand,color,con,cat';
                                                    }
                                                    if (color != '0' && con != '0')
                                                    {
                                                        var dtype = 'color,con';
                                                    }
                                                    if (con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'con,cat';
                                                    }
                                                    if (brand != '0' && con != '0')
                                                    {
                                                        var dtype = 'brand,con';
                                                    }
                                                    if (brand != '0' && cat != 0)
                                                    {
                                                        var dtype = 'brand,cat';
                                                    }
                                                    if (color != '0' && cat != 0)
                                                    {
                                                        var dtype = 'color,cat';
                                                    }
                                                    if (color != '0' && con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'color,con,cat';
                                                    }
                                                    if (brand != '0' && con != '0' && cat != 0)
                                                    {
                                                        var dtype = 'brand,con,cat';
                                                    }
                                                    if (brand != '0' && con != '0' && cat != 0 && color != 0)
                                                    {
                                                        var dtype = 'brand,con,cat,color';
                                                    }
                                                    console.log(dtype);
                                                    //if(brand && color && con && cat){
                                                    var param = "brand=" + brand + "&color=" + color + "&cat=" + cat + "&con=" + con + "&price=" + price + "&sell=" + sell_id + "&dtype=" + dtype;
                                                    //console.log(param);

                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "/index.php/riftraff/fetch_pdata",
                                                        dataType: 'html',
                                                        data: param,
                                                        success: function (response) {
                                                            //console.log(response);
                                                            //$("#mm").attr('href', '/index.php/riftraff/buy');
                                                            //var result = new Array();
                                                            // result =  JSON.parse(response);
                                                            //console.log(result);
                                                            // console.log(result['all']['4']);

                                                            // console.log(result);
                                                            //console.log(result.length);
                                                            var res = response.substring(0, 1);
                                                            var ress = response.substring(1);

                                                            if (response != 0)
                                                            {
                                                                $(".dd").html(res + "<br> Matches");
                                                                $(".show_cat").hide();
                                                                 $(".re").hide();
                                                                $(".list_view").empty();
                                                                $(".list_view").html(ress);
                                                            } else
                                                            {
                                                                $(".list_view").empty();
                                                                $(".show_cat").hide();
                                                                 $(".re").hide();
                                                                $(".list_view").html("<h4>No results found!!</h4>");

                                                            }
                                                        }
                                                    });
                                                    // }

                                                });
                                                $(".statess").change(function () {

                                                    var param = $(".statess :selected").attr('stateid');

                                                    //alert(param);
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: "http://iamrohit.in/lab/php_ajax_country_state_city_dropdown/api.php?type=getCities&stateId=" + param,
                                                        dataType: 'json',
                                                        success: function (data) {
                                                            $('.citiess').empty();
                                                            if (data.tp == 1) {

                                                                $.each(data['result'], function (key, val) {
                                                                    var option = $('<option />');
                                                                    option.attr('value', val).text(val);
                                                                    option.attr('countryid', key);
                                                                    $('.citiess').append(option);
                                                                });
                                                                //$(".countries").prop("disabled", false);
                                                            } else {
                                                                alert(data.msg);
                                                            }
//                            var data = JSON.parse(response);
//                            console.log(data['result']);


                                                        }
                                                    });


                                                });

                                                $(".citiess").on("change", function ()
                                                {
                                                    var param = $(".citiess :selected").val();
                                                    window.location.href = "/index.php/riftraff/search_by_city/" + param;

                                                });


                                            });



</script>
<script>
    $('#ex1').slider({
        formatter: function (value) {
            return 'Current value: ' + value;
            alert(value);
        }
    });
</script>
<!--<script type="text/javascript">

    function ajaxCalll() {
        this.send = function (data, url, method, success, type) {
            type = type || 'json';
            var successRes = function (data) {
                success(data);
            }

            var errorRes = function (e) {
                console.log(e);
                //alert("Error found \nError Code: "+e.status+" \nError Message: "+e.statusText);
                //$('#loader').modal('hide');
            }
            $.ajax({
                url: url,
                type: method,
                data: data,
                success: successRes,
                error: errorRes,
                dataType: type,
                timeout: 60000
            });

        }

    }

    function locationInfoo() {
        var rootUrl = "http://iamrohit.in/lab/php_ajax_country_state_city_dropdown/api.php";
        var call = new ajaxCalll();
        this.getCitiess = function (id) {
            $(".citiess option:gt(0)").remove();
            var url = rootUrl + '?type=getCities&stateId=' + id;
            var method = "post";
            var data = {};
            $('.citiess').find("option:eq(0)").html("Please wait..");
            call.send(data, url, method, function (data) {
                $('.citiess').find("option:eq(0)").html("Select City");
                console.log(data.tp);
                if (data.tp == 1) {
                    $.each(data['result'], function (key, val) {
                        var option = $('<option />');
                        option.attr('value', val).text(val);
                        option.attr('cityyid', key);
                        $('.citiess').append(option);
                    });
                    $(".citiess").prop("disabled", false);
                } else {
                    alert(data.msg);
                }
            });
        };



    }

    $(function () {
      var loc = new locationInfoo();

        $(".statess").on("change", function (ev) {
            var stateId = $("option:selected", this).attr('stateeid');
            if (stateId != '') {
                loc.getCitiess(stateId);
            } else {
                $(".citiess option:gt(0)").remove();
            }
        });
    });



</script>-->
