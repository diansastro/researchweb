<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
		queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page  
		via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
		html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
		respond.min.js"></script>
		<![endif]-->
		<style>
			.keyword{
				border: 1px solid #dedede;
				padding : 10px;
			}
		</style>
	</head>
	<body style='background-color:#43BFC7'>
		<div class='container' style='background-color:#FFFFFF'>
			<!-- ini header -->
			<div class='row'>
				<div class='header'>
					<h1>HASANUDDIN UNIVERSITY RESEARCH</h1>
				</div>
			</div>
			<div class='row'>
				<nav class="navbar navbar-inverse" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#example-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Home</a>
					</div>
					<div class="collapse navbar-collapse" id="example-navbar-collapse">
						<ul class="nav navbar-nav">
						<li><a href="#">Menu1</a></li>
						<li><a href="#">Menu2</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Menu3 <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#">Sub Menu 1</a></li>
								<li><a href="#">Sub Menu 2</a></li>
								<li><a href="#">Sub Menu 3</a></li>
								<li class="divider"></li>
								<li><a href="#">Sub Menu 4</a></li>
								<li class="divider"></li>
								<li><a href="#">Sub Menu 5</a></li>
							</ul>
						</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class='row'>
				<div class='col-md-9'>
					<div class='row' style="background-color:#786D5F; color:white">
						<?php
							include('connect_db.php');
							$sql = 'SELECT * FROM jurnal WHERE id_jurnal='.$_GET['id'];
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();
						?>
						<div class='col-md-10'>
							<h2> <?php echo $row['Judul']; ?> </h2>
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
					
					<img class='thumbnail' src='images/image/<?php echo $row['gambar']; ?>.jpg' alt=''/>
					
					<h3 class='page-header'></h3>
					<div class='keyword'>
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
				
				<div class='col-md-3'>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files 
as needed -->
<script src="js/bootstrap.min.js"></script>
	</body>
</html>