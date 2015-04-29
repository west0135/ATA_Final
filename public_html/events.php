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
    <!--<link href="css/bootstrap-theme.css" rel=stylesheet -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/events.js"></script>
    
</head>

<body>

        <?php include 'nav.php' ?>
    
    <?php
    ini_set('display_errors','On');
    error_reporting('E_ALL');
	require_once "json-api/lib/PublicData.class.php";
	
	//Tom Here April 23 1:08
	require_once "json-api/lib/PublicEventsHelper.class.php";
	
	?>
    <div class="jumbotron" id="wrap">
        <div class="container">
               
                <h2 class="center" style="padding-bottom:10px;">Upcoming Events</h2>
				<hr>
				
		<?php
		//Tom Here
		$ata_event = new EventsHelper();
		$array = $ata_event->getLatestEvents();
 		if($array[RETVAL::STATUS] == RETVAL::DB_SUCCESS)
		{
		     $count = (count($array["fields"]));
			for($x = 0; $x < $count; $x++)
			{
                $field = $array["fields"][$x];
                $echoString = '<div class="container well">
                    <div class="row">
                        <div class="col-lg-12 contentContainer">';
                $echoString .= "<h2>".$field["event_name"]."</h2>";
                $echoString .= $field["content"];

                if($field["presto_url"] != "null")
				{	
                    $echoString .= '<a class="pull-right btn btn-success btn-sm" href="http://'.$field["presto_url"].'" role="button">Register</a>
                            </div>
                        </div>
                    </div>';
                }
                else
				{
                    $echoString .= '<p style="margin:0px; font-weight: lighter;">Contact us for more details</p>
                            </div>
                        </div>
                    </div>';
                }
				echo $echoString;
			}
 		}
		else
		{
			$err = $array[RETVAL::ERR_MSG];
			$xtErrMsg = $array[RETVAL::EXTND_ERR_MSG];
		}
		?>
            
        </div>
    </div>

      <?php
		
		include 'footer.php'; 
		
	  ?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->

</body>

</html>