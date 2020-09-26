<?php
Include 'connect.php';
$json = file_get_contents('php://input');//json condition to search for the data and apply it
$data = json_decode($json);
if (isset($data->username)) { //Retrieve username from the database
$uname  = $data->username;

    $stmt = $db->prepare("SELECT username FROM users WHERE username=?");
	$stmt->bind_param('s', $uname);
	$stmt->execute();
	$users = $stmt->get_result()->fetch_assoc();
	$jsonReply = array();

    if (!empty($users['username'])) { 
	    //Set availability to false or true based upon the result
		$jsonReply['availability'] = false; 
		header('Content-Type:application/json;');
		echo json_encode($jsonReply); 
	} else { 
		$jsonReply['availability'] = true; 
		header('Content-Type:application/json;');
		echo json_encode($jsonReply); 
	}
	$stmt->close();
	$db->close();
} else {
	echo "not set";
}
?>