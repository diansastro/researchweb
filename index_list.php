<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome</title>
		<!-- Sets initial viewport load and disables zooming  -->
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- site css -->
		<link rel="stylesheet" href="css/site.min.css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
		  <script src="js/html5shiv.js"></script>
		  <script src="js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="js/site.min.js"></script>
	</head>
	
	<body style="background-color: #f1f2f6;">
		<!-- Ini Menux-->
		<?php include('index_menu.php'); ?>
		
		<!-- Ini Sliderx-->
		<?php include('index_slider.php'); ?>
		
		<!-- Ini Listx-->
		<div class='container'>
			<div class='row'>
				<div class='col-md-12' align=center>
					<div>
						<h2 class='page-header'>DAFTAR JUDUL PENELITIAN</h2>
						<?php
							include('connect_db.php');
							$sql = 'SELECT * FROM Jurnal WHERE kategori='.$_GET['kode'];
							$result = $conn->query($sql);
									
							while($row = $result->fetch_assoc()) {
							?>
								<a href="index_jurnal.php?id=<?php echo $row['id_jurnal'];?>">
								<div class="col-lg-4 col-sm-6">
									<div class="thumbnail">
										<div class="caption text-left">
											<i class="fa fa-clock-o"> <?php echo $row['time']; ?> </i>
											<h3> <p> <?php echo $row['Judul']; ?></p> </h3>
											<p>Sedikit Penjelasan</p>
										</div>
									</div>
								</div>
								</a>
							<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Ini Footerx-->
		<div class="footer">
			<div class="clearfix">
				<dl class="footer-nav">
					<dt class="nav-title">Recent Post</dt>
					<dd class="nav-item"><a href="#">Web Design</a></dd>
				</dl>
			</div>
		<div class="footer-copyright text-center">Copyright &copy; 2015 <a href='index.php'> Hasanuddin University Research </a> </div>
		</div>
	</body>
 </html>