<?php
	require_once "../json-api/lib/PublicData.class.php";
	$ok = false;
	if(isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
		$ata_event = new AtaEvent();
		$array = $ata_event->get($id);
		if($array[RETVAL::STATUS] == RETVAL::DB_SUCCESS)
		{
			$content = $array["field"]["content"];
			$ok = true;
		}
		else
		{
			$err = $array[RETVAL::ERR_MSG];
			$xtErrMsg = $array[RETVAL::EXTND_ERR_MSG];
		}
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Adamson Tennis Academy Lesson</title>
</head>

<body>
<code>
<? 	
	if($ok)
	{
		echo $content;
		//print_r($lesson);
	}
	else
	{
		echo "<h1>" . $err . "</h1>";
		echo "<p>" . $xtErrMsg . "</p>";
	}
?>
</code>
</body>
</html>