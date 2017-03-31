<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
include('../config.php');

?>

<?php
if(!isset($_REQUEST['sid'])){
	header('location:sectors_list.php');
}
else{
	$sid=$_REQUEST['sid'];
}

?>


<?php
$statement=$db->prepare("delete from sectors where sid=?");
$statement->execute(array($sid));
header('location:sectors_list.php');



?>