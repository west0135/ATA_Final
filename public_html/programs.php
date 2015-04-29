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
		$ata_program = new AtaProgram();
		$array = $ata_program->getList();
        //print_r($array["fields"][0]);
		if($array[RETVAL::STATUS] == RETVAL::DB_SUCCESS)
		{
            
			$content = $array["fields"][0]->content;
			$ok = true;
            $field = $array["fields"][0];
            //echo $field['program_name'];
            //print_r($array["fields"][0]);
            //echo (count($array["fields"]));
		}
		else
		{
			$err = $array[RETVAL::ERR_MSG];
			$xtErrMsg = $array[RETVAL::EXTND_ERR_MSG];
		}
	}

    $field = $array["fields"][0];
    $output = '<script>$(document).ready(function(){
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
    
    ';
        //echo "number of fields: ".count($array["fields"]);
    for ($x=0; $x<(count($array["fields"])); $x++){
                        //echo " run ";
						$field = $array["fields"][$x];
                        $progNameFormatted = preg_replace("/[^A-Za-z0-9]/", "", $field["program_name"]);
                        $output .= 'case "'.$progNameFormatted.'":
                            $("#'.$progNameFormatted.'").addClass("in");
                            break;';
                        
					}
$output .='	
}

}


});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}</script>
';

echo $output;
?>
	
	  <div class="jumbotron" id="wrap">
		<div class="container">
			<h2 class="center">Programs</h2>
			<hr/>
			<p class="lead">We run a variety of programs for all ages here at the Adamson Tennis Academy. Feel free to browse our selection and register online, or feel free to contact us if you have any questions at all.</p>
			<p class="center"><a class="btn btn-sml btn-success" href="#" role="button">Get started today</a></p>
		</div>
    
	  
	  <div class="container">
    	  <div class="row">
       
            <div class="panel-group" id="accordion">
				
                    <!--Loop Begin-->
                    <?php 
                        for ($x=0; $x<(count($array["fields"])); $x++){
                        $field = $array["fields"][$x]; 
                        $progNameFormatted = preg_replace("/[^A-Za-z0-9]/", "", $field["program_name"]);


                        $htmlOutput = '<div class="panel panel-default"> <div class="panel-heading">
                            <h4 class="panel-title center">
                            <a data-toggle="collapse" data-parent="#accordion" href="#'.$progNameFormatted
                            .'"<span class="">
                            </span><!--Title Goes Here-->';
                                

                        $htmlOutput .= $field['program_name'];
                        $htmlOutput .= '</a>
                            </h4>
                            </div>
                            <div id="';
                        
                            $htmlOutput .= $progNameFormatted;

                            $htmlOutput .= '" class="panel-collapse collapse">
                                <div class="container">';

                            $htmlOutput .= $field['content'];

                            $htmlOutput .= '
							
						          </div>
                                </div>
                            </div>';

                        echo $htmlOutput;
                                
                        }


                    ?>
                    
                    
<!--Loop Ends-->  
                
                
                
                </div>
            </div>
        </div>
</div>  
		  
	  <div class="spacer jumbotron"></div>
	  
	  </div>
	  
	  <?php
		
		include 'footer.php'; 
		
	  ?>
	  
	  
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/nav.js"></script>
  </body>
</html>