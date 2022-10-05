<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$firstname 		= $_POST['firstname'];
	$lastname 		= $_POST['lastname'];
	$email 			= $_POST['email'];
	$phonenumber	= $_POST['phonenumber'];
  $age	= $_POST['age'];
	$password 		= sha1($_POST['password']);
  $regdate	= $_POST['regdate'];
  $address	= $_POST['address'];
  $city	= $_POST['city'];
  $postcode	= $_POST['postcode'];


		$sql = "INSERT INTO User (firstname, lastname, email, phonenumber, age, password, regdate ) VALUES(?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $age, $password, $regdate]);
		if($result){

      $sql2 = "INSERT INTO user_address (address, city, postcode) VALUES (?,?,?)";
      $stmtinsert = $db->prepare($sql2);
      $result = $stmtinsert->execute([$address, $city, $postcode]);
			echo 'Successfully saved.';
		}else{
			echo 'Something is wrong';
		}
}else{
	echo 'No data';
}
