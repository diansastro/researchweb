<!DOCTYPE html>
<?php
	session_start();

	if(!isset($_SESSION['user_id'])) {
		header('Location:index.php');
	}
	
	else {
		if ( $_SESSION['user_id'] != 'admin' ) {
			header('Location:index.php');
		}
	}
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/sb-admin.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

		<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Welcome Admin</a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <?php include('admin_left.php') ?>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid" style="height:1000px">
				<h1 class="page-header">
					TAMBAH USER
				</h1>
				
				<form role='form' method='POST' enctype='multipart/form-data'>
					<div class='form-group'>
						<input name='kode' type='text' class='form-control' placeholder='Kode...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<input name='id' type='text' class='form-control' placeholder='ID User...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<input name='name' type='text' class='form-control' placeholder='Name...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<input name='password' type='password' class='form-control' placeholder='Password...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<select class='form-control' name='stat' style="width:250px">
							<option value="Dosen"> Dosen </option>
							<option value="Admin"> Admin </option>
						</select>
					</div>
					<div class='form-group'>
						<input name='department' type='text' class='form-control' placeholder='Department...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<input name='title' type='text' class='form-control' placeholder='Title...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<input name='email' type='text' class='form-control' placeholder='Email...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<input name='cp' type='cp' class='form-control' placeholder='Cp...' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						Foto :
						<input name='image' id='image' type='file' style="width:250px;" required/>
					</div>
					<div class='form-group'>
						<button id='tambah' name='tambah' type="submit" class="btn btn-info"  required>Tambah User</button>
					</div>
				</form>
					<?php
						if ( isset($_POST['tambah'])) {
							include('connect_db.php');
							$kode = $_POST['kode'];
							$id = $_POST['id'];
							$name = $_POST['name'];
							$pass = $_POST['password'];
							$stat = $_POST['stat'];
							$depr = $_POST['department'];
							$ttle = $_POST['title'];
							$email = $_POST['email'];
							$cp = $_POST['cp'];
							
							$sql = "INSERT INTO user VALUES($kode,'$id','$name','$pass','$stat','$depr','$ttle','$email','$cp','$kode')";
							$result = $conn->query($sql);
							
							move_uploaded_file($_FILES['image']['tmp_name'],"images/foto/".$kode.".jpg");
						}
					?>
			</div>
        </div>
    </div>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>


