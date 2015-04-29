<?php
	
	//Important if returning json
	header('Content-type: application/json; charset=utf-8'); 
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
 	//Allow mobile ajax calls
 	header('Access-Control-Allow-Origin: *');
	
	//All defines and includes are located here
	//note $logger is also initialized here - use it anywhere in the global scope
	include_once("boot.php");
	
	$logger->debug("DEBUG: [" . print_r($_REQUEST,true) . "]END");
	
	if(isset($_REQUEST[RETVAL::METHOD])) //method can be called by POST or GET - TODO is this a good idea?
	{
		$method = $_REQUEST[RETVAL::METHOD];
		//Tom changed Feb 16 2015
		$arr = explode(".",$method);
		$class = $arr[0];
		$mthd = $arr[1];
		$logger->debug("call[" . $class . "." . $mthd . "]");
		$object = new $class ();
		$retVal = $object->{$mthd}($_POST);
	}
	else
	{
		$retVal = array(RETVAL::STATUS => RETVAL::DB_ERROR,
				RETVAL::ERR_MSG => 'No "method" value in request.');
	}
	$json = json_encode($retVal);
	$logger->debug("return json: " . $json);
	echo $json;	
?>