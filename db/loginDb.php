<?php


include "Session.php";
include "connectDb.php";

function loginSuccess($userInfo, $psw)
{
	
	try{
		$db = new PDO('mysql:host=localhost:3306;dbname=u_200141600_db','u-200141600','f1m8nlGUd4Aqwap');
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $ex){
		echo "an error has occured ".$ex->getMessage();
	}
	
	$query = $db->prepare("SELECT * FROM students");
	$query->execute();
	$isSuccessful = false;

	if (empty($userInfo) || empty($psw)) {
		echo "Please fill all the fields below";
		exit(1);
	}
	while ($result = $query->fetch(PDO::FETCH_OBJ)) {
		if (($userInfo == $result->email && password_verify($psw, $result->password)) || ($userInfo == $result->number && password_verify($psw, $result->password)) || ($userInfo == $result->name && password_verify($psw, $result->password))) {
			$session = new Session();
			$session->setUserName($result->name);
			$isSuccessful = true;
			return $isSuccessful;
		}
	}
	return $isSuccessful;
}



if (file_get_contents("php://input")) {
	$data = file_get_contents("php://input");
	$users = json_decode($data);
	try {
		$userCanLog = loginSuccess($users->userInfo, $users->password);
		if ($userCanLog) {
			echo nl2br("Login success, you will be redirected to the event page");
		} else {
			throw new Exception("Password or username incorrect", 1);
		}
	} catch (Exception $ex) {
		echo "An error has occured " . $ex->getMessage();
	}
}
