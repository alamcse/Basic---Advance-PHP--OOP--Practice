<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
include('../config.php');

?>

<?php
if(!isset($_REQUEST['fid'])){
	header('location:fighters.php');
}
else{
	$fid=$_REQUEST['fid'];
}

?>


<?php
$statement=$db->prepare("delete from fighters where fid=?");
$statement->execute(array($fid));
header('location:fighters.php');



?>