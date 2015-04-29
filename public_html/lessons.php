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
	  
<?php
    include 'nav.php';
    ini_set('display_errors','On');
    error_reporting('E_ALL');
	require_once "json-api/lib/PublicData.class.php";
	$ok = false;

	//$id = 2;
	$ata_lesson = new AtaLesson();
	$array = $ata_lesson->getList();
	//print_r($array["fields"][0]);
	if($array[RETVAL::STATUS] == RETVAL::DB_SUCCESS)
	{
		
		$content = $array["fields"][0]->content;
		$ok = true;
		//print_r($array["fields"][0]);
		//echo (count($array["fields"]));
	}
	else
	{
		$err = $array[RETVAL::ERR_MSG];
		$xtErrMsg = $array[RETVAL::EXTND_ERR_MSG];
	}
	
?>
	 
	
	  <div class="jumbotron" id="wrap">
		<div class="container">
			<h2 class="center">Lessons</h2>
			<hr/>
            <div class="col-lg-12">
			<p class="lead">Private lessons are available with Jonathan Adamson and Emad Hussain. As we attempt to meet your needs to inquire about private lesson please contact info@adamsonstennisacademy.com.</p>
			<p class="lead">Depending on what time works for you and your level, you will be contacted by Jonathan or Emad to schedule a lesson directly.</p>
			</div>
			
			<?php
			$semi = [];
			$private = [];
			$semiContent = '<div class="col-md-6" style="max-height:400px;""><div class="panel panel-default"><div class="panel-heading"><p>Semi-Private Lessons</p></div><div class="panel-body"><div class="lessonsTable"><table class="table table table-bordered"><tr><th data-field="id">Pro</th><th data-field="name">Price</th></tr>';
			
			$privateContent = '<div class="col-md-6" style="max-height:400px;""><div class="panel panel-default"><div class="panel-heading"><p>Private Lessons</p></div><div class="panel-body"><div class="lessonsTable"><table class="table table table-bordered"><tr><th data-field="id">Pro</th><th data-field="name">Price</th></tr>';

			for ($x=0; $x<(count($array["fields"])); $x++)
				{	
					$field = $array["fields"][$x];
					
					if (strtolower($field["category"]) == 'semi-private') {
						$semi[$field["lesson_pro"]] = $field["lesson_cost"];
					}else if (strtolower($field["category"]) == 'private') {
						$private[$field["lesson_pro"]] = $field["lesson_cost"];
					}
				}
				foreach ($semi as $instructor => $price) {
					$semiContent .= '<tr><td>' . $instructor . '</td><td>' . $price . '<a class="pull-right btn btn-success btn-sm" href="#" value="Semi-private Lesson With ' .  $instructor . '" role="button">Book Lesson</a></td></tr>';		
				}
				foreach ($private as $instructor => $price) {
					$privateContent .= '<tr><td>' . $instructor . '</td><td>' . $price . '<a class="pull-right btn btn-success btn-sm" href="#" value="Private Lesson With ' .  $instructor . '" role="button">Book Lesson</a></td></tr>';		
				}
				$semiContent .= '</table></div></div></div></div>';
				$privateContent .= '</table></div></div></div></div>';
				echo $privateContent . $semiContent;
			?>
			
		  
		</div>  
		  
		  
		  <div class="lesson-spacer"></div>
		  
      </div>
	  
	  
	  <div class="panel-footer center" style="min-height: 40px; padding:0px;">
		  
		  <div class="container">
		  	<form  id="contact-form" style="display: none;" method="post">
 
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
	  
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/form.js"></script>
	<script src="js/email.js"></script>
  </body>
</html>