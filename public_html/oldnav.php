<?php
    ini_set('display_errors','On');
    error_reporting('E_ALL');
	require_once "lib/PublicData.class.php";
	$ok = false;
	if(true)
	{
		
		//$stringURI = $_SERVER['REQUEST_URI'];
		//$parseDOT = explode('.', $stringURI);
		$stringURI = $_SERVER['REQUEST_URI'];
		//echo $stringURI;
		
		$parseDot = explode('.', $stringURI);
		//echo $parseDot[0];
		$parseSlash = explode('/', $parseDot[0]);
		//echo $parseSlash[count($parseSlash) - 1];
		
		$script = '<script>
		
		$(document).ready(function(){
		
		switch("'.$parseSlash[count($parseSlash) - 1].'"){

			case "index":
			$("#index").addClass("thisPage");
			break;
			case "programs":
			$("#programs").addClass("thisPage");
			break;
			case "lessons":
			$("#lessons").addClass("thisPage");
			break;
			case "events":
			$("#events").addClass("thisPage");
			break;
			case "info":
			$("#info").addClass("thisPage");
			break;
		}
		
		});
		</script> 
		
		';
		
		echo $script;
	
	
		$ata_program = new AtaProgram();
		$array = $ata_program->getList();
        //print_r($array["fields"][0]);
		if($array[RETVAL::STATUS] == RETVAL::DB_SUCCESS)
		{
            
			$content = $array["fields"][0]->content;
			$ok = true;
            //print_r($array["fields"][1]);
            //echo (count($array["fields"]));
		}
		else
		{
			$err = $array[RETVAL::ERR_MSG];
			$xtErrMsg = $array[RETVAL::EXTND_ERR_MSG];
		}
	}
?>
	  
	     <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img style="max-height: 65px;" src="Images/ATA%20Logo-06.png"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                <ul class="nav navbar-nav">
					<li id="index" class=""><a href="index.php">Home</a>
                    </li>
                    <li id="programs" class="dropdown">
                        <a href="programs.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Programs <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
							
							
					<?
						
					for ($x=0; $x<(count($array["fields"])); $x++){
						$field = $array["fields"][$x];
                        $progNameFormatted = preg_replace("/[^A-Za-z0-9]/", "", $field["program_name"]);
								
						echo '<li><a href="programs.php?id='.$progNameFormatted.'">';
						echo "<p>".$field["program_name"]."  </p>";
						echo '</a></li>';
					

					}



	
					?>
		
                        </ul>
                    </li>
                    <li id="lessons"><a href="lessons.php">Lessons</a>
                    </li>
                    <li id="events"><a href="events.php">Events</a>
                    </li>
                    <li id="info" class="dropdown">
                        <a href="programs.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Info<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="info.php">About Us</a>
                            </li>
                            <li><a href="info.php?id=contact">Contact</a>
                            </li>
                        </ul>
                    </li>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>