<!DOCTYPE html>
<?php
	session_start();

	if(!isset($_SESSION['user_id'])) {
		header('Location:index.php');
	}
	
	else {
		if ( $_SESSION['user_id'] == 'admin' ) {
			header('Location:index.php');
		}
	}
	include('connect_db.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome</title>
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
                <a class="navbar-brand" href="index.html">Welcome</a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_id'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="dashboard_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			<?php include('dashboard_left.php') ?>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid" style="height:1000px">
				<h1 class="page-header">
					<i class="fa fa-fw fa-user"></i> PROFILE
				</h1>
				<div class='row'>
					<form role='form' method='POST' enctype='multipart/form-data'>
						<div class='col-md-4' align='center'>
							<?php
								include('connect_db.php');
								$sql = "SELECT * FROM user WHERE id='".$_SESSION['user_id']."'";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();
							?>
							
							<img class='img-rounded' src="images/foto/<?php echo $row['foto'];?>.jpg" height='300px'/>
							
							<div class='form-group'>
								<input name='image' type='file' required/>
							</div>
							<div class='form-group'>
								<button id='upload' name='upload' type="submit" class="btn btn-info"  required>Update Foto</button>
							</div>
						</div>
					</form>
					<form method='POST'>
						<div class='col-md-8'>
							<div class='form-group'>
								<input autocomplete='off' name='id' type='text' value='<?php echo $row['id']; ?>' class='form-control' placeholder='ID' required/>
							</div>
							<div class='form-group'>
								<input autocomplete='off' name='name' type='text' value='<?php echo $row['name']; ?>' class='form-control' placeholder='Name...' required/>
							</div>
							<div class='form-group'>
								<input autocomplete='off' name='department' type='text' value='<?php echo $row['Department']; ?>' class='form-control' placeholder='Department...' required/>
							</div>
							<div class='form-group'>
								<input autocomplete='off' name='title' type='text' value='<?php echo $row['title']; ?>' class='form-control' placeholder='Title...' required/>
							</div>
							<div class='form-group'>
								<input autocomplete='off' name='email' type='text' value='<?php echo $row['email']; ?>' class='form-control' placeholder='E-mail...' required/>
							</div>
							<div class='form-group'>
								<input autocomplete='off' name='cp' type='cp' value='<?php echo $row['cp']; ?>' class='form-control' placeholder='Cp...' required/>
							</div>
							<div class='form-group'>
								<button id='update' name='update' type="submit" class="btn btn-info"  required>Update User</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php
	if ( isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$department = $_POST['department'];
		$title = $_POST['title'];
		$email = $_POST['email'];
		$cp = $_POST['cp'];
				
		$sql = "UPDATE user SET id='$id', cp='$cp', name='$name', Department='$department', title='$title', email='$email' WHERE id='".$_SESSION['user_id']."'";
		$result = $conn->query($sql);
		echo "<script> window.location.href='dashboard_profile.php'; </script>";
	}
	
	if ( isset($_POST['upload'])) {
		$sql = "SELECT * FROM user WHERE id='".$_SESSION['user_id']."'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		move_uploaded_file($_FILES['image']['tmp_name'],"images/foto/".$row['kode'].".jpg");
		echo "<script> window.location.href='dashboard_profile.php'; </script>";
	}
?>
