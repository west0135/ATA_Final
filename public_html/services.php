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
	if(true)
	{
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
	}
?>
	 
	
	  <div class="jumbotron" id="wrap">
		
			
			<div class="jumbotron-index">
				<div class="container panel-index panel-default" style="height: 600px;">
					
					<h2 class="center">Services</h2>
					<hr/>
					
					<div class="container">
					<p>Payment for all camps programs (Smash Summer Camps, All Day Fun Camp, 10 and Under High Performance Camp) must be made one week prior to the start of the camp.</p>

					<p>For all other programs, payment can be made the day of the 1st day of the class.</p>

					<p>Cash and Cheques are accepted at Adamson’s Tennis Academy. Please make all Cheques Payable to Adamson’s Tennis Academy.
To avoid a $25.00 cancellation fee, participants for all programs and lessons must cancel a minimum of 24 hours in advance.</p>

					<p>In the event of rain, we will attempt to notify participants prior to the beginning of class or lesson whenever possible. If should be noted that all programs are scheduled with “rain days” in mind and all cancelled classes will be rescheduled.</p>
					</div>
				</div>
				
			</div>
		
		  
      </div>
	  
	 
	
	 <?php
		
		include 'footer.php'; 
		
	  ?>
	  
		  
		  
	  
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/form.js"></script>
	<script src="js/email.js"></script>
  </body>
</html>