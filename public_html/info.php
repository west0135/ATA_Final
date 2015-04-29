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
    <!--<link href="css/bootstrap-theme.css" rel=stylesheet -->

    <!-- Google Maps API -->

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(45.320568, -75.896194),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
				disableDefaultUI: true
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <?php

	include 'nav.php';

	?>

	
    <div class="section section-collapse" id="map">

        <div id="google-map" class="map"></div>
        <!-- google map -->
        <div id="map-canvas" class="slider-size" ></div>

    </div>
	
	<div class="jumbotron-about jumbotron">
		
    <div class="container clearTop panel-index panel-default topUp">
		
		<div id="over-map" class="hidden-sm hidden-xs">
			<h3 class="white">March Tennis Club</h3>
			<p class="white">2500 Campeau Dr<br>Kanata, ON<br>K2K 2W3</p>
			<p class="white">(613) 592-6269</p>
		</div>
		
		<div id="over-map-small" class="hidden-md hidden-lg hidden-xl">
			<h3 class="white" style="margin:0px;">March Tennis Club</h3>
			<p class="white">2500 Campeau Dr<br>Kanata, ON<br>K2K 2W3</p>
		</div>	
		
        <div class="row">
            <div class="col-lg-12">
                <h2 class="center">About Us</h2>
				<hr/>
            </div>

            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/554x416">
            </div>
            <div class="col-md-6">
                <p>Led by Jonathan Adamson, Adamson’s Tennis Academy provides a unique teaching style in all its instructional programs and lessons where the participants learn the game of tennis in a relaxed and supportive environment. By focusing on each individual’s preferred learning style, participants are able to progress quickly.</p>

                <p>Adamson’s Tennis Academy runs its instructional programs at the March Tennis Club located at 2500 Campeau drive Kanata Ontario Canada (<a href="www.marchtennisclub.com">www.marchtennisclub.com</a>)</p>

                <p>Adamson’s Tennis Academy constantly strives to have a greater reach, so that more and more communities have the opportunity to learn and enjoy the life-long sport of tennis. In conjunction with SongbirdLTD, Adamson’s Tennis Academy is looking to have its operations in more communities, locally, regionally, nationally and internationally.</p>
            </div>

        </div>

        <!-- Team Member Profiles -->

        <div class="row clearTop">

            <div class="col-lg-12">
                <h2 class="page-header">Management</h2>
            </div>

            <div class="col-lg-12">
                <h3>Johnathan Adamson - Head Professional & President</h3>
                <p>Jonathan attended Radford University and Virginia Commonwealth University in the United States on scholarships, playing NCAA Division 1 Tennis at both schools. He also attended the University of Victoria where he was a player/coach on their top ranked tennis team.</p>

                <p>Jonathan has over twenty years’ teaching experience both nationally and internationally. He initiated many of the youth oriented programs at the March Tennis Club, including the popular Breakfast Club, a program designed for competitive junior players. Along with youth orientated programs, Jonathan’s innovative teaching style has brought a vibrant and welcoming atmosphere in all the adult oriented programs at March Tennis Club including the ever popular Cardio Tennis.</p>

                <p>The success of the instructional programs initiated by Jonathan over the years led to the creation of Adamson’s Tennis Academy in 2005. Since then, through Jonathan’s community first approach and philosophy, the staff at Adamson’s Tennis Academy has had the pleasure of reaching out to all members of the community and help bring them the joy of Tennis.</p>
            </div>

            <div class="col-lg-12">
                <h3>Emad Hussein - Assistant Professional & Business Director</h3>
                <p>Emad has been involved with Jonathan and Adamson’s Tennis Academy for over a decade. First as a student under Jonathan’s guidance, Emad has emerged as the assistant pro at the academy for the past two years.</p>

                <p>While attending Carleton and Concordia University for graduate and post graduate studies, Emad coached his alma mater high school tennis team. Under his guidance the Earl of March Secondary School tennis team made consecutive appearances at the National Capital Athletic Association Tennis Championships with results varying from Gold to Bronze.</p>

                <p>His continued dedication has helped enhance the fun and supportive environment at the Academy.</p>
            </div>

            <div class="col-lg-12">
                <h3>Erin Robinson - Executive Account Manager</h3>
                <p>What do you really need to say about Erin?</p>
            </div>

        </div>

        <div class="row clearTop">

            <div class="col-lg-12">
                <h2 class="page-header">Staff</h2>
            </div>

            <div class="col-lg-12">
                <h3>Braden Penner- Instructor</h3>
                <p>Braden had been an active participant and instructor over the past 8 years. Starting out in recreational tennis, Braden worked his way up to the Breakfast Club Series and is now one of our most popular instructors. Braden is attending Carleton University and in his second year studying Political Science and Law.</p>
            </div>

            <div class="col-lg-12">
                <h3>Cole Macphee- Instructor</h3>
                <p>Cole has been one of the stars at ATA. He brings great enthusiasm every time he is one court. Cole has been in a participant of the Breakfast Club Series and has participate in various provincial and city tournaments. Cole is currently in his last year of high school and is President of the Student’s council at Holy Trinity.</p>
            </div>

        </div>

        <div class="row clearTop">
            <div class="col-lg-12">
                <h2 class="page-header">Partners</h2>
            </div>

            <div class="col-lg-12">
                <p>Adamson’s Tennis Academy would like to thank Ted Thompson, Asics and Yonex Canada for their support for all that goes on in the Academy. Their generosity and commitment as enhanced the experience for all participants at the Academy and is a driving force in our efforts to promote community tennis.</p>
                <p>We would also like to thank Kevin Pidgeon and Tommy and Lefebvre for the continued support of the KANATA KLASSIC, and various junior programs at ATA.</p>
				
				
				<div class="col-xs-4"><img src="img/logo_asics.jpg" class="sponsors img img-responsive img-square center"/></div>
				<div class="col-xs-4"><img src="img/logo_yonex.jpg" class=" sponsors img img-responsive img-square center"/></div>
				
				
            </div>
        </div>
    </div>

</div>


      <div class="panel-footer center" style="min-height: 40px; padding:0px;" id="contact-footer">
		  
		  <div class="container">
            <h3 class="center white">Contact</h3>
            <hr>
            <form  id="contact-form" method="post">
 
				<div class="col-sm-8">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Name</label>
							<input type="name" class="form-control" name="name" placeholder="John Smith" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Phone Number (Optional)</label>
							<input type="number" class="form-control" name="number" placeholder="Phone Number">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputPassword1">Email Address</label>
							<input type="email" class="form-control" name="email" placeholder="JohnSmith@example.ca" required>
						 </div>
						<div class="form-group">
							<label for="exampleInputEmail1">Subject</label>
							<input type="textarea" class="form-control" name="subject" placeholder="Subject" required>
						</div> 
					</div>

					<div class="col-md-12">
					 <div class="form-group">
					 <label for="exampleInputEmail1">Message:</label>
					<textarea class="form-control" name="message" rows="4" required></textarea>
					 </div>

					<button type="submit" style="margin-bottom:15px;" class="btn btn-success center"><a class="center white">Email Form</a></button>
					</div>
				</div>	
				
				<div class="col-sm-4">
					<div class="">
					<h4 class="white left-form">March Tennis Club</h4>
					<p class="white left-form">2500 Campeau Dr<br>
						Kanata, ON<br>
						K2K 2W3<br>
						Telephone: (613) 592-6269</p>
					<hr>
					
					<button type="reset" id="goToTop" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span></button>
					
					</div>
				</div>


			</form>
            <!-- .contact form -->


        </div>
		  
		  
		  <div class="container" style="height: 100%; padding-top:0px;">
		  
		  </div>
		  
	  </div>
	  
	  <div style="width:100%; height: 110px; background-color: #222222;">
		  
		  <div class="container" style="height:100%; padding:0px;">
		  
			<div class="col-sm-2 brighten pic hidden-sm hidden-md hidden-lg hidden-xl" style="text-align:center; margin: 0px; padding:0px; background-color: #222222;">
				
				<a href="https://www.facebook.com/pages/Adamsons-Tennis-Academy/287683708034824?ref=stream"><img style="max-height:50px; margin-top: 38px;" src="Images/fb.png"></a>
				<a href="http://www.marchtennisclub.com"><img style="max-height:50px; margin-top: 38px;" src="Images/mtc_logo.svg"></a>
				
			  
			</div>  
			  
			  
		  	<div class="col-sm-9" style="height:100%; margin: 0px; padding:0px; background-color: #222222;">
				
				
					<div class="brighten pic">
					<a href="index.php"><img src="Images/ata-nav.png" style="height:50px; margin-top:20px; margin-left:15px;"/></a>
					</div>
				
					<ul style="  margin: 0px;
  /* max-width: 60%; */
  margin-bottom: 25px;
  left: 80px;
  top: 36px;
  position: absolute;" class="nav">
						<li style="display:inline; width:65px;">
							<a style="display:inline; width:65px;" class="grey" href="programs.php">Programs</a>
						</li>
						<li style="display:inline; width:65px;">
							<a style="display:inline; width:65px;" class="grey" href="lessons.php">Lessons</a>
						</li>
						<li style="display:inline; width:65px;">
							<a style="display:inline; width:65px;" class="grey" href="events.php">Events</a>
						</li>
						<li style="display:inline; width:65px;">
							<a style="display:inline; width:65px;" class="grey" href="info.php?id=contact">Contact</a>
						</li>
					</ul>
				
				<p class="" style="margin-top:15px; margin-left:10px; margin-bottom:0px; color: #424242; ">© 2015 2B||!2B, Inc. All rights reserved.</p>
				
			</div>
			  
			<div class="col-sm-2 brighten pic hidden-xs " style="text-align:right; height:100%; margin: 0px; padding:0px; background-color: #222222;">
				
				<a href="https://www.facebook.com/pages/Adamsons-Tennis-Academy/287683708034824?ref=stream"><img style="max-height:50px; margin-top: 27px;" src="Images/fb.png"></a>
				<a href="http://www.marchtennisclub.com"><img style="max-height:50px; margin-top: 27px;" src="Images/mtc_logo.svg"></a>
				
			  
			</div>
			  
			  
		  </div>
		  
	  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/email.js"></script>
	<script src="js/nav.js"></script>
</body>

</html>