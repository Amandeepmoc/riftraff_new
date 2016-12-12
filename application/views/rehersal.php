<?php include 'header2.php'; ?>

<div class="container-fluid padding header">
    <img src="/images/dealer_locator/heading_bg.jpg" style="width:100%;" class="img-responsive"/>
    <h1>Rehearsal Studio Spaces</h1>
</div>
<div class="container-fluid">
    <br>
    <div class="col-md-12 col-sm-12 col-xs-12" >

        <div class="col-md-2 col-sm-12 col-xs-12 locator-left padding">
            <div class="locator-head"><h5 class="text-uppercase"><strong>FIND REHEARSAL SPACES</strong></h5></div>
            <h4>LOCATION:</h4>
            
                <div class="form-group">
                    <label class="col-sm-offset-1 col-xs-offset-1 col-sm-4 col-xs-4" for="email">Zip Code:</label>
                    <div class="col-sm-7 col-xs-7">
                        <input type="text" class="form-control" id="zipcode" placeholder="">
                    </div>
                </div>
            
            <h5>Services: </h5>
            <ul class="" style="padding-left:30px;">
                <?php foreach ($rehersals as $dd) {
                    ?>
                    <li class="checkbox">
                        <label><input type="checkbox" class="cb" value="<?php echo $dd->id; ?>"><?php echo $dd->service_name; ?> </label>
                    </li>
                <?php }
                ?>


            </ul>
            <!--            <h5>Languages Spoken: </h5>
                        <ul class="" style="padding-left:30px;">
                            <li class="checkbox">
                                <label><input type="checkbox" class="cb1" value="English">English </label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" class="cb1" value="Spanish">Spanish </label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" class="cb1" value="Chinese" > Chinese </label>
                            </li>
                            <li class="checkbox">
                                <label><input type="checkbox" class="cb1"  value="Japanese" > Japanese </label>
                            </li>
                        </ul>-->

        </div>


        <div class="col-md-offset-2 col-md-7 col-sm-12 col-xs-12 map1">
            <div class="panel" style="margin-bottom:0px;">
                <div class="panel-body locator-panel">
                    <div class="col-sm-6 col-xs-12">
<!--                        <form class="form-horizontal">
                            <div class="form-group" style="margin-bottom:0px;">
                                <label class="col-sm-3 col-xs-3 padding" for="email">Sort by:</label>
                                <div class="col-sm-8 col-xs-9">
                                    <div class="form-group" style="margin-bottom:0px;">
                                        <select class="form-control" id="">
                                            <option> Distance - closest</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>-->
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <p class="text-right"><strong> Page 1 of <span class="pp"></span> </strong> &nbsp;&nbsp;<i class="fa fa-angle-right fa-2x" aria-hidden="true" style="vertical-align:middle;"></i></p>
                    </div>
                </div>
                <br>
                <div id="map" style="width:100%;height:200px;border:1px solid black;" class="left"></div>

                <div class="row dealer-locatorr">
                    <br>
                    <!--                    <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-2 col-sm-2 col-xs-6 padding">
                                                <div class="img-holder">
                                                    <img src="/images/dealer_locator/dealer-logo.jpg" class="" style="">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12 border map1">
                                                <div class="col-md-9 col-sm-9 col-xs-8 map1">
                                                    <h4>Dealer Music Center</h4>
                                                    <p>(123)777 7777<br></p>
                                                    <p>12345 Ventura Blvd.<br>
                                                        Woodland Hills,CA 91364</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map">
                                                    <img src="/images/dealer_locator/map.png"/>
                                                    <label><a href="">&nbsp;&nbsp;2.4 Miles</a></label>
                                                    <br><br>
                                                    <a href="" class="profile text-uppercase">Profile</a>
                                                </div>
                                            </div>
                                        </div>-->
                    <!--                    <div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                            <div class="col-md-2 col-sm-2 col-xs-6 padding">
                                                <div class="img-holder">
                                                    <img src="/images/dealer_locator/dealer-logo.jpg" class="" style="">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12 border map1">
                                                <div class="col-md-9 col-sm-9 col-xs-8 map1">
                                                    <h4>Dealer Music Center</h4>
                                                    <p>(123)777 7777<br></p>
                                                    <p>12345 Ventura Blvd.<br>
                                                        Woodland Hills,CA 91364</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map">
                                                    <img src="/images/dealer_locator/map.png"/>
                                                    <label><a href="">&nbsp;&nbsp;2.4 Miles</a></label>
                                                    <br><br>
                                                    <a href="" class="profile text-uppercase">Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                            <div class="col-md-2 col-sm-2 col-xs-6 padding">
                                                <div class="img-holder">
                                                    <img src="/images/dealer_locator/dealer-logo.jpg" class="" style="">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12 border map1">
                                                <div class="col-md-9 col-sm-9 col-xs-8 map1">
                                                    <h4>Dealer Music Center</h4>
                                                    <p>(123)777 7777<br></p>
                                                    <p>12345 Ventura Blvd.<br>
                                                        Woodland Hills,CA 91364</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map">
                                                    <img src="/images/dealer_locator/map.png"/>
                                                    <label><a href="">&nbsp;&nbsp;2.4 Miles</a></label>
                                                    <br><br>
                                                    <a href="" class="profile text-uppercase">Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                            <div class="col-md-2 col-sm-2 col-xs-6 padding">
                                                <div class="img-holder">
                                                    <img src="/images/dealer_locator/dealer-logo.jpg" class="" style="">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12 border map1">
                                                <div class="col-md-9 col-sm-9 col-xs-8 map1">
                                                    <h4>Dealer Music Center</h4>
                                                    <p>(123)777 7777<br></p>
                                                    <p>12345 Ventura Blvd.<br>
                                                        Woodland Hills,CA 91364</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map">
                                                    <img src="/images/dealer_locator/map.png"/>
                                                    <label><a href="">&nbsp;&nbsp;2.4 Miles</a></label>
                                                    <br><br>
                                                    <a href="" class="profile text-uppercase">Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                            <div class="col-md-2 col-sm-2 col-xs-6 padding">
                                                <div class="img-holder">
                                                    <img src="/images/dealer_locator/dealer-logo.jpg" class="" style="">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12 border map1">
                                                <div class="col-md-9 col-sm-9 col-xs-8 map1">
                                                    <h4>Dealer Music Center</h4>
                                                    <p>(123)777 7777<br></p>
                                                    <p>12345 Ventura Blvd.<br>
                                                        Woodland Hills,CA 91364</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map">
                                                    <img src="/images/dealer_locator/map.png"/>
                                                    <label><a href="">&nbsp;&nbsp;2.4 Miles</a></label>
                                                    <br><br>
                                                    <a href="" class="profile text-uppercase">Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <br>
                                            <div class="col-md-2 col-sm-2 col-xs-6 padding">
                                                <div class="img-holder">
                                                    <img src="/images/dealer_locator/dealer-logo.jpg" class="" style="">
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12 border map1">
                                                <div class="col-md-9 col-sm-9 col-xs-8 map1">
                                                    <h4>Dealer Music Center</h4>
                                                    <p>(123)777 7777<br></p>
                                                    <p>12345 Ventura Blvd.<br>
                                                        Woodland Hills,CA 91364</p>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map">
                                                    <img src="/images/dealer_locator/map.png"/>
                                                    <label><a href="">&nbsp;&nbsp;2.4 Miles</a></label>
                                                    <br><br>
                                                    <a href="" class="profile text-uppercase">Profile</a>
                                                </div>
                                            </div>
                                        </div>-->
                </div>
                <br><br>
                <div class="text-center pagination1" style="display:none;">
                    <ul class="pagination pagination-lg text-center">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">8</a></li>
                        <li><a href="#">9</a></li>
                    </ul>
                    <span class="pull-right">Next &nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 ad1">
            <div class="panel ">
                <img src="/images/dealer/d/ad1.jpg" class="img-responsive" />
                <img src="/images/dealer/d/ad3.1.jpg" class="img-responsive" />
                <img src="/images/dealer/d/ad2.1.jpg" class="img-responsive"/>
            </div>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkx3IbCSAqUDvB7vvIVF204Wu-t4mPn3Y"
type="text/javascript"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>

<script>
    jQuery(function ($) {
        var locations = [],
                promise = $.ajax({
                    url: "http://rr.mediaoncloud.com/index.php/riftraff/addressall"
                }),
                geocoder = new google.maps.Geocoder();

        var successCallback = function (response) {
            var showGraph = function (_locations, centerLatLong) {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 5,
                    center: new google.maps.LatLng(centerLatLong[1], centerLatLong[2]),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var infowindow = new google.maps.InfoWindow();

                var marker, i;
                for (i = 0; i < _locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(_locations[i][1], _locations[i][2]),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(_locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            if (response !== undefined) {
                var result = JSON.parse(response);
                console.log(result);
                console.log(result.length);
                if (result.length > 6)
                {
                    $(".pagination1").show();
                }
                $(".pp").text(result.length);
                for (var i = 0; i < result.length; i++)
                {
                    var fname = result[i]['firstname'];
                    var lname = result[i]['lastname'];
                    var store = result[i]['store'];
                    var address = result[i]['address'];
                    var img = result[i]['company_logo'];
                    var bname = result[i]['business_name'];
                    var phone = result[i]['phone_num'];

                    $(".dealer-locatorr").html('<br><div class="col-md-12 col-sm-12 col-xs-12"><div class="col-md-2 col-sm-2 col-xs-6 padding"><div class="img-holder"><img src="' + img + '" class="" style=""> </div></div><div class="col-md-10 col-sm-10 col-xs-12 border map1"> <div class="col-md-9 col-sm-9 col-xs-8 map1"> <h4>' + bname + '</h4> <p>' + phone + '<br></p><p>' + address + '</p></div><div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map"> <img src="/images/dealer_locator/map.png"/> <label><a href="">&nbsp;&nbsp;</a></label> <br><br><a href="" class="profile text-uppercase">Profile</a> </div></div></div>');



                    geocoder.geocode({
                        'address': address
                    }, function (results, status) {
                        if (status === google.maps.GeocoderStatus.OK && results && results[0].geometry) {
                            locations.push([address, results[0].geometry.location.lat(), results[0].geometry.location.lng()]);
                            // if(response.length == key+1) {
                            showGraph(locations, locations[0]);
                            // }
                        }
                    }.bind(this));
                }

            }
        }
        var errorCallback = function (error) {
            console.log('Error while ajax request', error);
        }
        promise.then(successCallback, errorCallback);
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
         $("#zipcode").keypress(function(e) {
            if (e.keyCode == 13) {
                var zipcode = $("#zipcode").val();
                var param = "dd=" + zipcode;
                var locations = [];
                geocoder = new google.maps.Geocoder();
                if(zipcode != '')
                {
                     $.ajax({
                    type: 'POST',
                    url: "/index.php/riftraff/fetch_dataa_zipcode",
                    dataType: 'html',
                    data: param,
                    success: function (response) {
                        var result = JSON.parse(response);
                        console.log(result);
                        var showGraph = function (_locations, centerLatLong) {
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 5,
                                center: new google.maps.LatLng(centerLatLong[1], centerLatLong[2]),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;
                            for (i = 0; i < _locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(_locations[i][1], _locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(_locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        }
                        // console.log(result);
                        console.log(result.length);
                        if (result != 0)
                        {
                            if (result.length > 6)
                            {
                                $(".pagination1").show();
                            }
                            $(".pp").text(result.length);
                            for (var i = 0; i < result.length; i++)
                            {
                                var fname = result[i]['firstname'];
                                var lname = result[i]['lastname'];
                                var store = result[i]['store'];
                                var address = result[i]['address'];
                                var img = result[i]['company_logo'];
                                var bname = result[i]['business_name'];
                                var phone = result[i]['phone_num'];
                                $(".dealer-locatorr").empty();
                                $(".dealer-locatorr").html('<br><div class="col-md-12 col-sm-12 col-xs-12"><div class="col-md-2 col-sm-2 col-xs-6 padding"><div class="img-holder"><img src="' + img + '" class="" style=""> </div></div><div class="col-md-10 col-sm-10 col-xs-12 border map1"> <div class="col-md-9 col-sm-9 col-xs-8 map1"> <h4>' + bname + '</h4> <p>' + phone + '<br></p><p>' + address + '</p></div><div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map"> <img src="/images/dealer_locator/map.png"/> <label><a href="">&nbsp;&nbsp;</a></label> <br><br><a href="" class="profile text-uppercase">Profile</a> </div></div></div>');

                                geocoder.geocode({
                                    'address': address
                                }, function (results, status) {
                                    if (status === google.maps.GeocoderStatus.OK && results && results[0].geometry) {
                                        locations.push([address, results[0].geometry.location.lat(), results[0].geometry.location.lng()]);
                                        // if(response.length == key+1) {
                                        showGraph(locations, locations[0]);
                                        // }
                                    }
                                }.bind(this));
                            }



                            // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
                            // alert("Thanks, We will contact you soon.");
                            //  window.location = "uiuxwebdesign.php";

                            // }
                        } else
                        {
                            //alert('hii');
                            $(".dealer-locatorr").empty();
                            $(".dealer-locatorr").html('<h3 class="text-center" style="color:#dddbdb;">No Record Found !!!</h3>');

                        }
                    }
                });
                }
            }
        });
        $(".cb").click(function () {
            if ($('.cb').is(":checked")) {
                var value = $(this).val();
                // alert(value);
                var param = "dd=" + value;
                var locations = [];
                geocoder = new google.maps.Geocoder();
                //alert(dd);
                $.ajax({
                    type: 'POST',
                    url: "/index.php/riftraff/fetch_dataa",
                    dataType: 'html',
                    data: param,
                    success: function (response) {
                        var result = JSON.parse(response);
                        console.log(result);
                        var showGraph = function (_locations, centerLatLong) {
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 5,
                                center: new google.maps.LatLng(centerLatLong[1], centerLatLong[2]),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            });
                            var infowindow = new google.maps.InfoWindow();

                            var marker, i;
                            for (i = 0; i < _locations.length; i++) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(_locations[i][1], _locations[i][2]),
                                    map: map
                                });

                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                    return function () {
                                        infowindow.setContent(_locations[i][0]);
                                        infowindow.open(map, marker);
                                    }
                                })(marker, i));
                            }
                        }
                        // console.log(result);
                        console.log(result.length);

                        
                        if (result != 0)
                        {
                            if (result.length > 6)
                            {
                                $(".pagination1").show();
                            }
                            $(".pp").text(result.length);
                            for (var i = 0; i < result.length; i++)
                            {
                                var fname = result[i]['firstname'];
                                var lname = result[i]['lastname'];
                                var store = result[i]['store'];
                                var address = result[i]['address'];
                                var img = result[i]['company_logo'];
                                var bname = result[i]['business_name'];
                                var phone = result[i]['phone_num'];
                                $(".dealer-locatorr").empty();
                                $(".dealer-locatorr").html('<br><div class="col-md-12 col-sm-12 col-xs-12"><div class="col-md-2 col-sm-2 col-xs-6 padding"><div class="img-holder"><img src="' + img + '" class="" style=""> </div></div><div class="col-md-10 col-sm-10 col-xs-12 border map1"> <div class="col-md-9 col-sm-9 col-xs-8 map1"> <h4>' + bname + '</h4> <p>' + phone + '<br></p><p>' + address + '</p></div><div class="col-md-3 col-sm-3 col-xs-4 map1 text-right map"> <img src="/images/dealer_locator/map.png"/> <label><a href="">&nbsp;&nbsp;</a></label> <br><br><a href="" class="profile text-uppercase">Profile</a> </div></div></div>');

                                geocoder.geocode({
                                    'address': address
                                }, function (results, status) {
                                    if (status === google.maps.GeocoderStatus.OK && results && results[0].geometry) {
                                        locations.push([address, results[0].geometry.location.lat(), results[0].geometry.location.lng()]);
                                        // if(response.length == key+1) {
                                        showGraph(locations, locations[0]);
                                        // }
                                    }
                                }.bind(this));
                            }



                            // if(html == "<samp>Thanks, We will contact you soon.</samp>"){
                            // alert("Thanks, We will contact you soon.");
                            //  window.location = "uiuxwebdesign.php";

                            // }
                        } else
                        {
                            //alert('hii');
                            $(".dealer-locatorr").empty();
                            $(".dealer-locatorr").html('<h3 class="text-center" style="color:#dddbdb;">No Record Found !!!</h3>');

                        }
                    }
                });
            }

        });
    });

</script>
