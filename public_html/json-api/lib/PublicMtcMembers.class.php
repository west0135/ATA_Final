<?php
include_once "general/GenericData.class.php";

class MtcMemberSecure extends MtcMember
{
	private function mdFiveEm(&$postArray)
	{
		if(!empty($postArray['password_hint_answer']))
		{
			$pswd_hint = md5($postArray['password_hint_answer']);
			$postArray['password_hint_answer'] = $pswd_hint;		
		}

		if(!empty($postArray['password']))
		{
			$pswd = md5($postArray['password']);
			$postArray['password'] = $pswd;		
		}
	}
	
	public function __construct()
   	{
      	parent::__construct();
   	}

	public function create($postArray)
   	{
		//Convert password and password_hint_answer to md5
		$this->mdFiveEm($postArray);
		//This array specifies the field names that are required to execute the method
		$params = BaseMtc_member::getParams();
		
		//Extend generic behviour add permissions
		$this->isInsert = true;
		if($this->loadParams($postArray, $params))
		{
			$errTest = $this->validateFields($params);
			if($errTest === false)
			{
				$pdo = $this->dbHelper->getPDO();
				$pdo->beginTransaction();
				$id = $this->dbHelper->insertRow($params, $this->primaryKeyName);
				if($id == false)
				{
					$extErrMsg = $this->table_name . ": " . $this->dbHelper->getErrMsg() . " Row Values: " . print_r($params, true);
					return $this->returnErrorArray("Failed to insert Data", RETVAL::DB_FAILED_INSERT, $extErrMsg);
				}
				else
				{
					$perms = new ToBeRecordSetHelper(DB_NAME, "mtc_permissions", $pdo);
					$date = new DateTime();
					$permission_params = array("permission_id" => NULL, "member_id" => $id, 
												"first_name" => $params['first_name'], "last_name" => $params['last_name'],
												"permissions" => 0, "comments" => $date->format('Y-m-d H:i:s'));
											 
					$perm_id = $perms->insertRow($permission_params, "permission_id");
					if($perm_id == false)
					{
						$pdo->rollBack();
						$extErrMsg = $this->table_name . ": " . $this->dbHelper->getErrMsg() . " Row Values: " . print_r($params, true);
						return $this->returnErrorArray("Failed to insert Permission Data", RETVAL::DB_FAILED_INSERT, $extErrMsg);
					}
					else
					{
						$pdo->commit();
						return array(RETVAL::STATUS => RETVAL::DB_SUCCESS, $this->primaryKeyName => $id);
					}
				}
			}
			else
			{
				return $errTest;
			}
		}
		else
		{
			$extErrMsg = $this->className . ".create:  Row Values: " . print_r($params, true);
			return $this->returnErrorArray("Missing or invalid parameter values.", RETVAL::DB_FAILED_INSERT, $extErrMsg);
		}
   	}

   	public function update($postArray)
   	{
		//Convert password and password_hint_answer to md5
		$this->mdFiveEm($postArray);
		//This array specifies the field names that are required to execute the method
		$params = BaseMtc_member::getParams();
		return $this->updateRow($postArray, $params);
   	}
	
	public function delete($id)
	{
		if(is_array($id)) //get the primary key value
		{
			$id = $id[$this->primaryKeyName];
		}
		if(is_numeric($id))
		{
			$pdo = $this->dbHelper->getPDO();
			$pdo->beginTransaction();
			try{
				$sql = 'DELETE FROM `mtc_court_reservation` WHERE `member1_id` = ' . $id;
				$pdo->exec($sql);
			}catch(PDOException $e){
				$pdo->rollBack();
				$xtErrMsg =  "Failed Delete for mtc_court_reservation";
				return $this->returnErrorArray("Delete Error", RETVAL::DB_FAILED_DELETE, $xtErrMsg);
			}
			try{
				$sql = 'DELETE FROM `mtc_user_session` WHERE `userid` = ' . $id;
				$pdo->exec($sql);
			}catch(PDOException $e){
				$pdo->rollBack();
				$xtErrMsg =  "Failed Delete for mtc_user_session";
				return $this->returnErrorArray("Delete Error", RETVAL::DB_FAILED_DELETE, $xtErrMsg);
			}
			if($this->dbHelper->deleteRow($id, $this->primaryKeyName))
			{
				$pdo->commit();
				return array(RETVAL::STATUS => RETVAL::DB_SUCCESS, $this->primaryKeyName => $id);
			}
			else
			{
				$pdo->rollBack();
				$xtErrMsg =  "Failed Delete for " . $this->className . " id:" . $id . " " . $this->dbHelper->getErrMsg();
				return $this->returnErrorArray("Database Error", RETVAL::DB_FAILED_DELETE, $xtErrMsg);
			}
		}
		else
		{
			$xtErrMsg =  "Failed Delete for " . $this->className . " " . $id . " is NOT a numeric value";
			return $this->returnErrorArray("Delete Error", RETVAL::DB_FAILED_DELETE, $xtErrMsg);
		}
	}

	public function getList($postArray=NULL)
	{
		//This array specifies the field names that are required to execute the method
      	$params = BaseMtc_member::getParams();
		//Remove sensitive fields
		unset($params['password']);
		unset($params['password_hint']);
		unset($params['password_hint_answer']);
		unset($params['uuid']);
		return $this->selectItemsUsing($postArray, $params);
	}
	
	public function get($postArray)
   	{
		//This array specifies the field names that are required to execute the method
      	$params = BaseMtc_member::getParams();
		//Remove sensitive fields
		unset($params['password']);
		unset($params['password_hint']);
		unset($params['password_hint_answer']);
		unset($params['uuid']);
    	return $this->getItemByIdUsing($postArray, $params);
   	}
}

