<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
include('../config.php');

?>

<?php
if(!isset($_REQUEST['bid'])){
	header('location:birsrestho.php');
}
else{
	$bid=$_REQUEST['bid'];
}

?>


<?php
$statement=$db->prepare("delete from birsrestho where bid=?");
$statement->execute(array($bid));
header('location:birsrestho.php');



?>