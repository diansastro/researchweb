<?php
	$kode = $_GET['kode'];
	
	include('connect_db.php');
	
	$sql = "DELETE FROM user WHERE ID='$kode'";
	$result = $conn->query($sql);
	header('Location:admin.php');
?>