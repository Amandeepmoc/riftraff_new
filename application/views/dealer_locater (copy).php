<?php include 'header2.php';?>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8">
								<h1><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Dealer Locater</h1>
							</div>
							<!-- <div class="col-md-4 text-center"><br>
								<div class="col-sm-6 col-sm-offset-3">
									<div class="input-group stylish-input-group">
										<input type="text" class="form-control"  placeholder="Search" >
										<span class="input-group-addon">
											<button type="submit">
												<span class="fa fa-search"></span>
											</button>
										</span>
									</div>
								</div>
							</div> -->
						</div>
						<hr>
						<div class="col-md-12 dealer">
						<div class="row">
							<div class="col-md-3 col-xs-12 col-sm-3"><h3> Modify Search :</h3> </div><br>
							<div class="col-md-8 col-xs-12 col-sm-9 dealer-locator">
<!--							<div class="col-md-4 col-xs-4 col-sm-3">
							<h4>Authorized Dealer for: </h4>
							<br>
								<div class="checkbox">
								  <label><input type="checkbox" value="">value 1</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="">value 2</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="" disabled>value 3</label>
								</div>
							</div>-->
<!--							<div class="col-md-4 col-xs-4 col-sm-3">
							<h4>Inventory</h4>
							<br>
								<div class="checkbox">
								  <label><input type="checkbox" value="">New</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="">Used</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="" disabled>Clearance </label>
								</div>
							</div>-->
							<div class="col-md-12 col-xs-12 col-sm-12">
							<h4>Services</h4>
							<br>
                                                        <ul class="list-inline">
								<li class="checkbox">
								  <label><input type="checkbox" class="cb" value="Lessons">Lessons </label>
								</li>
								<li class="checkbox">
								  <label><input type="checkbox" class="cb" value="Repairs">Repairs </label>
								</li>
								<li class="checkbox">
								  <label><input type="checkbox" class="cb" value="Rentals" > Band Rentals </label>
								</li>
                                                                <li class="checkbox">
								  <label><input type="checkbox" class="cb"  value="Rehearsal" > Rehearsal / Studio Spaces </label>
								</li>
                                                            </ul>
							</div></div>
						</div>
						<div class="row"><br><br>
							<div class="col-md-3 col-xs-12 col-sm-3">
								<h3>Locater: </h3>
							</div>
							<div class="col-md-8 col-xs-12 col-sm-9 dealer-locator">
								 
                                                            <div id="map" style="width:100%;height:300px" class="left"></div>
     </div>
							</div>
						
						<div class="row show_dd"><br><br>
							<div class="col-md-3 col-xs-12 col-sm-3">
								<h3>Dealer List: </h3>
							</div>
							<div class="col-md-8 col-xs-12 col-sm-9 dealer-locator dealer-locatorr">
								
							</div>
						</div>
						
						</div>
                                                </div>
				
<?php include 'footer.php';?>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkx3IbCSAqUDvB7vvIVF204Wu-t4mPn3Y"
            type="text/javascript"></script>-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>

<script>
   jQuery(function($) {
    var locations = [],
        promise = $.ajax({
            url: "http://rr.mediaoncloud.com/index.php/riftraff/addressall"
        }),
        
        geocoder= new google.maps.Geocoder();

    var successCallback = function(response) {
            var showGraph = function(_locations, centerLatLong) {
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

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(_locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
        if (response !== undefined) {
            var result =  JSON.parse(response);
            console.log(result);
            console.log(result.length);
            for(var i = 0; i < result.length; i++)
            {
                var fname = result[i]['firstname'];
                var lname = result[i]['lastname'];
                var store = result[i]['store'];
                var address = result[i]['address'];
                
              $(".dealer-locatorr").html('<div class="row dealer-list"><div class="col-md-6 col-sm-6 col-xs-6"><h4><strong>'+ store +'</strong> <br>' + fname +' '+ lname +'</h4></div><div class="col-md-6 col-sm-6 col-xs-6 text-right"><h4>'+ address +'</h4></div></div>');
                
                
                
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
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
    var errorCallback = function(error) {
        console.log('Error while ajax request', error);
    }
    promise.then(successCallback, errorCallback);
});
   </script>
   <script type="text/javascript">
       $(document).ready(function(){
          $(".cb").click(function(){
             if($(this).is(":checked")) {
                 var value = $(this).val();
                // alert(value);
                  var param  = "dd="+value;
                   var locations = [];
                   geocoder= new google.maps.Geocoder();
            //alert(dd);
             $.ajax({
                  type: 'POST',
                  url: "/index.php/riftraff/fetch_dataa",
                  dataType: 'html',
                  data:param,

                success: function(response) {
                   var result =  JSON.parse(response);
                   console.log(result);
                   var showGraph = function(_locations, centerLatLong) {
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

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(_locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
                  // console.log(result);
            console.log(result.length);
            if(result != 0)
            {
                for(var i = 0; i < result.length; i++)
                {
                    var fname = result[i]['firstname'];
                    var lname = result[i]['lastname'];
                    var store = result[i]['store'];
                    var address = result[i]['address'];
                  $(".dealer-locatorr").empty();
                  $(".dealer-locatorr").html('<div class="row dealer-list"><div class="col-md-6 col-sm-6 col-xs-6"><h4><strong>'+ store +'</strong> <br>' + fname +' '+ lname +'</h4></div><div class="col-md-6 col-sm-6 col-xs-6 text-right"><h4>'+ address +'</h4></div></div>');

                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
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
               }
               
               else
               {
              //alert('hii');
              $(".dealer-locatorr").empty();
              $(".dealer-locatorr").html('No Record Found !!!');
 
               }
               }
        });
             }
              
          }); 
       });
        
       </script>