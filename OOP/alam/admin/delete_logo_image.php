<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
include('../config.php');

?>

<?php
if(!isset($_REQUEST['id'])){
	header('location:view_logo_image.php');
}
else{
	$id=$_REQUEST['id'];
}

?>


<?php
$statement=$db->prepare("delete from tbl_logo where logo_id=?");
$statement->execute(array($id));

header('location:view_logo_image.php');



?>