<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
include('../config.php');

?>

<?php
if(!isset($_REQUEST['nid'])){
	header('location:notice.php');
}
else{
	$nid=$_REQUEST['nid'];
}

?>


<?php
$statement=$db->prepare("delete from notice where nid=?");
$statement->execute(array($nid));
header('location:notice.php');



?>