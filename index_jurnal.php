<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome</title>
		<!-- Sets initial viewport load and disables zooming  -->
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- site css -->
		<link rel="stylesheet" href="css/site.min.css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
		  <script src="js/html5shiv.js"></script>
		  <script src="js/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript" src="js/site.min.js"></script>
		<style>
			.keyword{
				border: 1px solid #dedede;
				padding : 10px;
			}
		</style>
	</head>
	
	<body style="background-color: #f1f2f6;">
		<!-- Ini Menux-->
		<?php include('index_menu.php'); ?>
		
		<!-- Ini Sliderx-->
		<?php include('index_slider.php'); ?>
		
		<!-- Ini Listx-->
		<div class='container'>
			<div class='row'>
				<div class='col-md-8' style="background-color:#7A942E; color:white;">
					<div class='row' style="background-color:#6C7A89; color:white">
						<?php
							include('connect_db.php');
							$sql = 'SELECT * FROM jurnal WHERE id_jurnal='.$_GET['id'];
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();
						?>
						<div class='col-md-10'>
							<h3> <?php echo $row['Judul']; ?> </h3>
							<?php	
								$id = $row['id_dosen'];
								
								$sql = "SELECT * FROM user WHERE kode='".$row['id_dosen']."'";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();
							?>
							<h2> <small style="color:white;"> <?php echo $row['Department'];?> </small> </h3>
							<h3> <?php echo $row['name']." <small style='color:white'>".$row['title']; ?> </small> </h3>
						</div>
						
						<div class='col-md-2' style='margin-top:10px;'>
							<?php echo "<td> <img width=100px src='images/foto/".$row['foto'].".jpg'/></td>"; ?>
						</div>
					</div>
					
					<?php
						$sql = 'SELECT * FROM jurnal WHERE id_jurnal='.$_GET['id'];
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
					?>
					
					<h3 class='page-header'> Feature </h3>
					<p style='text-align:justify;'> <?php echo $row['feature'];?> </p>
					
					<h3 class='page-header'> Targeted Application(s) / Industry </h3>
					<p style='text-align:justify;'> <?php echo $row['target'];?> </p>
					
					<img class='thumbnail img-responsive' src='images/image/<?php echo $row['gambar']; ?>.jpg' alt=''/>
					
					<h3 class='page-header'></h3>
					<div class='keyword' style="margin-bottom:10px;">
						<div class='row'>
							<div class='col-md-1'>
								<i class="fa fa-fw fa-key"></i>
							</div>
							<div class='col-md-10'>
								<?php echo $row['Keywords']; ?>
							</div>
						</div>
					</div>
				</div>
			
				
				<div class='col-md-4'>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Comment</h3>
						</div>
						<div class="panel-body">
							<ul class="media-list">
								<li class="media page-header">
									<a class="pull-left" href="#"><img class="media-object img-rounded" src="img/photo-1.jpg"></a>
									<div class="media-body">
										<h4 class="media-heading"> Commentator Name </h4>
										<p>12 Apr, 2013 at 12:00</p>
										<p>Isi Komentas blablabla</p>
									</div>
								</li>
							</ul>
							<textarea name='comment' class='form-control' placeholder='Comment...' required> </textarea>
							<button id='tambah' name='tambah' type="submit" class="btn btn-info" required> Comment </button>
						</div>
					</div>
			
				</div>
			</div>
		</div>
		<!-- Ini Footerx-->
		<div class="footer">
			<div class="clearfix">
				<dl class="footer-nav">
					<dt class="nav-title"><img src='images/unhas_logo.png' width='100px'/></dt>
				</dl>
				<dl class="footer-nav">
					<dt class="nav-title">Recent Post</dt>
					<dd class="nav-item"><a href="#">Web Design</a></dd>
				</dl>
				
			</div>
		<div class="footer-copyright text-center">Copyright &copy; 2015 <a href='index.php'> Hasanuddin University Research </a> </div>
		</div>
	</body>
 </html>