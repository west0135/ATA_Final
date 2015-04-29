<?php
include_once "general/GenericData.class.php";

class CannedQueryHelper extends CannedQuery
{
	
	public function __construct()
   	{
      	parent::__construct();
   	}
	
	public function runCannedQuery($postArray)
	{
		if(isset($postArray['key']))
		{
			$key = $postArray['key'];
			//construct the parameter array for the prepared statement
			$param = array('key' => $key);
			$sql = 'SELECT * FROM `canned_query` WHERE `key` = :key';
			$rowSet = $this->dbHelper->getRowSetUsing($sql, $param);
			if($rowSet == false)
			{
				$xtErrMsg =  "Failed Canned Query: " . $key . " " . $this->dbHelper->getErrMsg();
				return $this->returnErrorArray("Database Error", RETVAL::DB_FAILED_QUERY, $xtErrMsg);
			}
			elseif(empty($rowSet))
			{
				$xtErrMsg =  "No Records for Canned Query: " . $key;
				return $this->returnErrorArray("Database Error", RETVAL::DB_FAILED_QUERY, $xtErrMsg);
			}
			else
			{
				$fields = $rowSet[0];
				$query = $fields['query'];
				//Remove unused fields
				unset($postArray['method']);
				unset($postArray['key']);
				unset($postArray['userid']);
				unset($postArray['ukey']);
				
				$delete_test = strpos($query, "DELETE FROM");
								
				$pdo = $this->dbHelper->getPDO();
				try{
					$statement = $pdo->prepare($query);
					
					$test = strpos($query, "LIKE");
					if($test === false)
					{
						///No op
					}
					else
					{
						//Find all LIKE staements and sub in "%" after - NOTE Only supports post fix wild card LIKE "EXAMPLE%"
						$arr = explode("LIKE :", $query);
						if(count($arr) > 1)
						{
							for($i=1; $i < count($arr); $i++)
							{
								$arr2 = explode(" ", $arr[$i]);
								$the_key = ltrim($arr2[0]);
								$val = $postArray[$the_key];
								//Append the wild card to value
								$postArray[$the_key] = $val . "%";
							}
						}
					}
					
					
					$retVal = $statement->execute($postArray);
					if($retVal)
					{
						$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
						if($rows)
						{
							return array(RETVAL::STATUS => RETVAL::DB_SUCCESS, "fields" => $rows);
						}
						elseif(empty($rows))
						{
							$xtErrMsg =  "No Records for Canned Query: " . $key . " POST ARRAY: " . print_r($postArray, true) .
							" using query: " . $query;
							return $this->returnErrorArray("No Return. Check input values.", RETVAL::DB_FAILED_QUERY, $xtErrMsg);
						}
						else
						{
							$op_success = array("operation_success"=>$key);
							return array(RETVAL::STATUS => RETVAL::DB_SUCCESS, "fields" => $op_success);
						}
					}
					else
					{
						$xtErrMsg = "False Return Value: " . $key . " " . $this->dbHelper->getErrMsg();
						return $this->returnErrorArray("Database Error", RETVAL::DB_FAILED_QUERY, $xtErrMsg);
					}
				}catch(PDOException $e){
					//$xtErrMsg =  "Canned Query Exception: " . $key . " " . $this->dbHelper->getErrMsg();
					//return $this->returnErrorArray("Database Exception", RETVAL::DB_FAILED_QUERY, $xtErrMsg);
					//NOTE on Delete an exception is thrown even though delete succeeds
					if ($delete_test === false) {
							$xtErrMsg =  "Failed Statement Execution: " . $key . " " .
											 $e->getMessage() . " POST ARRAY: " . print_r($postArray, true);
								return $this->returnErrorArray("Database Error", RETVAL::DB_FAILED_QUERY, $xtErrMsg);
					} else {
						$op_success = array("update_success_tentative"=>$key);
						return array(RETVAL::STATUS => RETVAL::DB_SUCCESS, "fields" => $op_success);
					}

				}
			}
		}
	}

}

 