<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adamson's Tennis Academy</title>
    <!-- Bootstrap -->
    <link href="bootstrap-newest.css" rel="stylesheet">
	<link href="css/stylesheet.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	  
	<link rel="shortcut icon" type="image/x-icon" href="Images/ata-nav.png" />  
	<!-- Google Maps API -->
	
	<style>
      #map-canvas {
        min-width: 200px;
        height: 150px;
		max-height: 300px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(45.320568, -75.896194),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
		
		var marker = new google.maps.Marker({
		  position: new google.maps.LatLng(45.320568, -75.896194),
		  map: map,
		  title: 'March Tennis Club'
	  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<!--<link href="css/bootstrap-theme.css" rel=stylesheet -->
  </head>
  <body>
	  
	  
	<?php
		include 'nav.php';
	?>
	  
	<?php
    ini_set('display_errors','On');
    error_reporting('E_ALL');
	require_once "json-api/lib/PublicData.class.php";
	
	//Tom Here April 23 1:08
	require_once "json-api/lib/PublicEventsHelper.class.php";
	$ata_event = new EventsHelper();
	$array = $ata_event->getLatestEvents();

	?>
    
    <div style="overflow: hidden;" class="slider-size flip">
        
        <img src="img/slider5.jpg" class="img-responsive flip" style="width:100%;">
    
    </div>
	  <div class="jumbotron-index">
		<div class="container panel-index panel-default topUp">
            
            <div class="col-md-8">
                <h3 class=" center">Welcome</h3>
                <hr>
                <p class="lead ">Welcome to Adamson's Tennis Academy where our mission is to provide everyone in the community an opportunity to learn and enjoy the pleasures of Tennis.</p>

                <br/>

                <p class="lead ">From beginner levels to advanced levels, tiny tots to adults, the recreation player to tournament player Adamson's Tennis Academy is steadfast in its focus of offering programs and events that encompass all ages and abilities. </p>

                <br/>
            </div>
            <div class="col-md-4">
                <h3 class="center">Upcoming Events</h3>
                <hr>
                <div class="row">	
				<?php 
				if($array[RETVAL::STATUS] == RETVAL::DB_SUCCESS)
				{
					$count = (count($array["fields"]));
                	$limit = $count >= 3 ? 3 : $count;
					for ($x = 0; $x < $limit; $x++)
					{
						$field = $array["fields"][$x];
            			echo '<div class="col-lg-12 contentContainer well">';
						echo "<h4 style='margin-top:0px; font-weight: normal;'><a href='events.php'>".$field["event_name"]."</a></h4>";
						echo '  '.$field["event_date_time"].'';
						if($field["presto_url"] != "null")
						{	
							echo '<a class="pull-right btn btn-success btn-sm" href="http://'.$field["presto_url"].'" role="button">Register</a>
									</div>';	
						}else
						{
							echo '<p style="margin: 10px 0px 0px 0px; font-weight: lighter;">Contact us for more details</p>
									</div>';	
						}
					}
              	}
				else
				{
					//$err = $array[RETVAL::ERR_MSG];
					//$xtErrMsg = $array[RETVAL::EXTND_ERR_MSG];
				}
            	?>		
                </div>
            </div>
			<br/>
		  </div>
	</div>	  

	  <?php
		
		include 'footer.php'; 
		
	  ?> 

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>