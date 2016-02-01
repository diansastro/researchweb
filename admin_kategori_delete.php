<?php
	$kode = $_GET['kode'];
	
	include('connect_db.php');
	
	$sql = "DELETE FROM kategori WHERE kode=$kode";
	$result = $conn->query($sql);
	header('Location:admin_kategori.php');
?>