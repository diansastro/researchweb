<!DOCTYPE html>
<html>
	<head>
		<title>Welcome</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
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
			.header{
				border: 1px solid #dedede;
				padding: 40px 40px;
				margin: 0px 0px;
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
				<div class='col-md-10'>
					<h3>Daftar Penelitian</h3>
					<?php
						include('connect_db.php');
						$sql = 'SELECT * FROM jurnal WHERE Kategori='.$_GET['kode'];
						$result = $conn->query($sql);
						
						while($row = $result->fetch_assoc()) {
							?>
								<a href="jurnal.php?id=<?php echo $row['id_jurnal'];?>"> <p> <?php echo $row['Judul']; ?></p> </a>
							<?php
						}
					?>
				</div>
				<div class='col-md-2'>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files 
as needed -->
<script src="js/bootstrap.min.js"></script>
	</body>
</html>