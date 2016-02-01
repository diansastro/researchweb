<?php
	$kode = $_GET['kode'];
	
	include('connect_db.php');
	
	$sql = "DELETE FROM jurnal WHERE id_jurnal=$kode";
	$result = $conn->query($sql);
	header('Location:dashboard.php');
?>