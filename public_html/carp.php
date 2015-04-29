
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	 
			  
	     <nav class="navbar navbar-default navbar-static-top">
        <div class="container navContainer">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<div id="logoDiv" style="min-width: 85px;">
                <a class="navbar-brand" href="index.php"><img class="ATALogo" src="Images/ata-nav.png"/></a>
				</div>
            </div>
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav">
					<li class=""><a id="index" href="index.php">Home</a>
					
                    </li>
		
                    <li class="dropdown">
                        <a id="programs" href="programs.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Programs <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
							
							
					<li><a href="programs.php?id=JuniorPrograms"><p>Junior Programs  </p></a></li><li><a href="programs.php?id=AdultPrograms"><p>Adult Programs  </p></a></li><li><a href="programs.php?id=SummerCamps"><p>Summer Camps  </p></a></li><li><a href="programs.php?id=CardioTennis"><p>Cardio Tennis  </p></a></li>		
                        </ul>
                    </li>
                    <li><a id="lessons" href="lessons.php">Lessons</a>
                    </li>
                    <li><a id="events" href="events.php">Events</a>
                    </li>
                    <li class="dropdown">
                        <a id="info" href="carp.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ATA @ Carp <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="carp.php?id=JuniorPrograms">Junior Programs</a>
                            </li>
                            <li><a href="carp.php?id=AdultPrograms">Adult Programs</a>
                            </li>
                            <li><a href="carp.php?id=TennisLessons">Tennis Lessons</a>
                            </li>
                            <li><a href="carp.php?id=contact-form">Contact</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a id="info" href="crystalbeach.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ATA @ CBTC <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="crystalbeach.php">Programs</a>
                            </li>
                            <li><a href="crystalbeach.php?id=contact">Lessons</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a id="info" href="programs.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Info <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="info.php">About Us</a>
                            </li>
                            <li><a href="info.php?id=contact">Contact</a>
                            </li>
							<li><a href="services.php">Services</a>
                            </li>
							<li><a href="policies.php">Policies</a>
                            </li>
                        </ul>
                    </li>
                    
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav><script>$(document).ready(function(){
	//alert("test");
	//var qs = new Querystring();
	//var v1 = qs.get("id");
	//	alert(v1);
 	var Id = getParameterByName("id");
	//alert(Id);	
	
	setTimeout(func, 400);
	
	function func() {

	switch(Id){
    //*******
    
    case "JuniorPrograms":
                            $("#JuniorPrograms").addClass("in");
                            break;case "AdultPrograms":
                            $("#AdultPrograms").addClass("in");
                            break;case "SummerCamps":
                            $("#SummerCamps").addClass("in");
                            break;case "TennisLessons":
                            $("#TennisLessons").addClass("in");
                            break;	
}

}


});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\[").replace(/[\]]/, "\]");
    var regex = new RegExp("[\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}</script>
	
	  <div class="jumbotron" id="wrap">
		<div class="container">
			<h2 class="center">Carp Tennis Programs</h2>
			<hr/>
			<p class="lead">We run a variety of programs for all ages here at the Adamson Tennis Academy. Feel free to browse our selection and register online, or feel free to contact us if you have any questions at all.</p>
			<p class="center"><a class="btn btn-sml btn-success" href="#" role="button">Get started today</a></p>
		</div>
    
	  
	  <div class="container">
    	  <div class="row">
       
            <div class="panel-group" id="accordion">
				
                    <!--Loop Begin-->
                    <div class="panel panel-default"> <div class="panel-heading">
                            <h4 class="panel-title center">
                            <a data-toggle="collapse" data-parent="#accordion" href="#JuniorPrograms"<span class="">
                            </span><!--Title Goes Here-->Junior Programs</a>
                            </h4>
                            </div>
                            <div id="JuniorPrograms" class="panel-collapse collapse">
                                <div class="container"><h3>Junior Programs</h3>



<p>The Smash Summer Camps and the Morning Spring Classes offer what we consider to be the recommended approach for the starter junior or the returning seasonal junior. These classes offer the essential basic tennis skills needed to succeed in our future programs and have been built strategically to handle juniors of all ages and abilities on the recreational side of tennis. We have made sure that these programs are built with the returning player in mind, as there is no better avenue for basic stroke development or enhancement. So when you are planning your child's tennis season, please remember the importance of these two programs to your child's development. The majority of our most developed and competitive juniors over the last 10 years spent a significant amount of time frequenting these two programs during the initial stages of their development.

</p>



<p>Each camp will conclude with a BBQ on the last day at the end of the camp.

</p>


<h4 style="font-weight:400;">Morning Spring Classes</h4>
<table class="table table table-bordered">

<thead>

	<tr class="row-1 odd">

		<th class="column-1">Camp</th><th class="column-2">Dates</th><th class="column-3">Day</th><th class="column-4">5-8 yr olds</th><th class="column-5">9-13 yr olds</th><th class="column-6">Cost</th>

	</tr>

</thead>

<tbody>

	<tr class="row-2 odd">

		<td class="column-1">1</td><td class="column-2">June 6-27</td><td class="column-3">Saturday</td><td class="column-4">11am-12pm</td><td class="column-4">12pm-1pm</td><td class="column-6">$85 (includes HST)</td>

	</tr>
</tbody>

</table>
<a class="pull-left btn btn-success btn-sm clearBottom" href="http://www.prestoregister.com/cgi-bin/order.pl?ref=marchtennisclub&amp;fm=1">Register</a>

<h4 style="clear:both;padding-top:15px;font-weight:400;">Smash Summer Camps</h4>
<table class="table table table-bordered">

<thead>

	<tr class="row-1 odd">

		<th class="column-1">Camp</th><th class="column-2">Dates</th><th class="column-3">Days</th><th class="column-4">5-8 yr olds <br>

9-13 yr olds</th><th class="column-6">Cost</th>

	</tr>

</thead>

<tbody>

	<tr class="row-3 odd">

		<td class="column-1">1</td><td class="column-2">July 6-10</td><td class="column-3">Monday Friday</td><td class="column-4">9-11am</td><td class="column-6">$140 (includes HST)</td>

	</tr>

	<tr class="row-4 even">

		<td class="column-1">2</td><td class="column-2">July 13-17</td><td class="column-3">Monday-Friday</td><td class="column-4">9-11am</td><td class="column-6">$140 (includes HST)</td>

	</tr>

	<tr class="row-5 odd">

		<td class="column-1">3</td><td class="column-2">July 20-24</td><td class="column-3">Monday-Friday</td><td class="column-4">9-11am</td><td class="column-6">$140 (includes HST)</td>

	</tr>

	<tr class="row-6 even">

		<td class="column-1">4</td><td class="column-2">August 17-24</td><td class="column-3">Monday-Friday</td><td class="column-4">9-11am</td><td class="column-6">$140 (includes HST)</td>

	</tr>

</tbody>

</table>
<a class="pull-left btn btn-success btn-sm clearBottom" href="http://www.prestoregister.com/cgi-bin/order.pl?ref=marchtennisclub&amp;fm=1">Register</a>
<p style="clear:both;padding-top:15px;">Each weekly Smash Summer Camp session will include OFF COURT work with the children using some dynamic and fun agility relays, drills and obstacles. In order to develop this hour, we have taken our 5 ESSENTIAL STROKES and extracted the key developmental body movements necessary for success. Then we have developed a fun, dynamic OFF COURT program for the children. The program will enable them the opportunity to imitate and develop the necessary body movements associated with each tennis stroke without the pressure of stroke performance. We are very excited about this program for the children and we are confident that it will be a great addition to their early tennis development.</p>


							
						          </div>
                                </div>
                            </div><div class="panel panel-default"> <div class="panel-heading">
                            <h4 class="panel-title center">
                            <a data-toggle="collapse" data-parent="#accordion" href="#AdultPrograms"<span class="">
                            </span><!--Title Goes Here-->Adult Programs</a>
                            </h4>
                            </div>
                            <div id="AdultPrograms" class="panel-collapse collapse">
                                <div class="container"><h3>Adult Programs</h3>



<p>The Adult Programs offer Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.

</p>
<h4 style="font-weight:400;">Beginner Class</h4>
<table class="table table table-bordered">
<tbody>
<tr>
<td width="77">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Session</span></span></strong></p>
</td>
<td width="105">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Dates</span></span></strong></p>
</td>
<td width="98">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Days</span></span></strong></p>
</td>
<td width="428">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Time</span></span></strong></p>
</td>
<td width="180">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Cost</span></span></strong></p>
</td>
</tr>
<tr>
<td width="77">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">1</span></span></p>
</td>
<td width="105">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">June 1-22</span></span></p>
</td>
<td width="98">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">Mondays</span></span></p>
</td>
<td width="428">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">6:00pm - 7:00pm</span></span></p>
</td>
<td width="180">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">$90 (includes HST)</span></span></p>
</td>
</tr>
</tbody>
</table>
<a class="pull-left btn btn-success btn-sm clearBottom" href="http://www.prestoregister.com/cgi-bin/order.pl?ref=marchtennisclub&amp;fm=1">Register</a>
<h4 style="clear:both;padding-top:15px;font-weight:400;">Refresher/Intermediate Drill and Play Class</h4>
<table class="table table table-bordered">
<tbody>
<tr>
<td width="77">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Session</span></span></strong></p>
</td>
<td width="105">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Dates</span></span></strong></p>
</td>
<td width="98">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Days</span></span></strong></p>
</td>
<td width="428">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Time</span></span></strong></p>
</td>
<td width="180">
<p align="center"><strong><span style="font-size: medium;"><span style="font-family: Calibri;">Cost</span></span></strong></p>
</td>
</tr>
<tr>
<td width="77">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">1</span></span></p>
</td>
<td width="105">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">June 1-22</span></span></p>
</td>
<td width="98">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">Mondays</span></span></p>
</td>
<td width="428">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">7:00pm - 8:00pm</span></span></p>
</td>
<td width="180">
<p align="center"><span style="font-size: medium;"><span style="font-family: Calibri;">$90 (includes HST)</span></span></p>
</td>
</tr>
</tbody>
</table>
<a class="pull-left btn btn-success btn-sm clearBottom" href="http://www.prestoregister.com/cgi-bin/order.pl?ref=marchtennisclub&amp;fm=1">Register</a>
							
						          </div>
                                </div>
                            </div><div class="panel panel-default"> <div class="panel-heading">
                            <h4 class="panel-title center">
                            <a data-toggle="collapse" data-parent="#accordion" href="#TennisLessons"<span class="">
                            </span><!--Title Goes Here-->Tennis Lessons</a>
                            </h4>
                            </div>
                            <div id="TennisLessons" class="panel-collapse collapse">
                                <div class="container"><p class="lead">The Adamsons Tennis Academy is also going to offer private/semi private and small group lessons depending on demand. Anyone interested in this should email <a href="mailto:info@adamsonstennisacaademy.com">info@adamsonstennisacaademy.com</a> or fill out the contact form below.</p>
							
						          </div>
                                </div>
                            </div>                    
                    
<!--Loop Ends-->  
                
                
                
                </div>
            </div>
        </div>
</div>  
		  
	  <div class="spacer jumbotron"></div>
	  
	  </div>
	  
	  <div class="panel-footer center" style="min-height: 40px; padding:0px;">
		  <div class="container">
		  	<form  id="contact-form" style="display: block;" method="post">
 
			<div class="col-sm-12">
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
							<input id="contactSubject" type="textarea" class="form-control" name="subject" placeholder="Subject" required>
						</div> 
					</div>

					<div class="col-md-12">
					 <div class="form-group">
					 <label for="exampleInputEmail1">Message:</label>
					<textarea class="form-control" name="message" rows="4" required></textarea>
					 </div>

					<button type="submit" style="margin-bottom:15px;" class="btn btn-success center"><a class="center white">Send</a></button>
					</div>
				</div>	

				<button type="reset" id="closeForm" class="btn btn-default pull-right"><span class="glyphicon glyphicon-remove"></span></button>
				
			</form>
			  
		
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
	<script src="js/nav.js"></script>
  </body>
</html>