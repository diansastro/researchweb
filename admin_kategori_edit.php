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
					EDIT KATEGORI
				</h1>
				
				<?php
					include('connect_db.php');
					$sql = 'SELECT * FROM kategori WHERE kode='.$_GET['kode'];
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
				?>
				<div class='col-md-4'>
					<form role='form' method='POST' enctype='multipart/form-data'>
						<div class='form-group'>
							<img class="img-rounded" width='100px' src="images/icon/<?php echo $row['kode']; ?>.jpg" alt="Image not found" onError="this.onerror=null;this.src='images/icon/no_image.png';" />
							<p> Icon <input name='image' id='image' type='file' style="width:250px;" required/> </p>
						</div>
						<div class='form-group'>
							<button id='upload' name='upload' type="submit" class="btn btn-info"  required>Edit Icon</button>
						</div>
					</form>
				</div>
				<div class='col-md-4'>
					<form role='form' method='POST'>
						<div class='form-group'>
							<input name='kode' type='text' value='<?php echo $row['kode']; ?>' class='form-control' placeholder='Kode...' style="width:250px;" required/>
						</div>
						<div class='form-group'>
							<input name='kategori' type='text' value='<?php echo $row['kategori']; ?>' class='form-control' placeholder='Nama Kategori...' style="width:250px;" required/>
						</div>
						<div class='form-group'>
							<button id='edit' name='edit' type="submit" class="btn btn-info"  required>Edit Kategori</button>
						</div>
					</form>
				</div>
				<div class='col-md-4'>
					<?php
						if ( isset($_POST['edit'])) {
							$kode = $_POST['kode'];
							$kategori = $_POST['kategori'];
							
							$sql = "UPDATE kategori SET kode=$kode, kategori='$kategori' WHERE kode=$kode";
							$result = $conn->query($sql);
							echo "<script> window.location.href='admin_kategori_edit.php?kode=".$_GET['kode']."'; </script>";
						}
						
						if (isset($_POST['upload'])) {
							$sql = "SELECT * FROM kategori WHERE kode='".$_GET['kode']."'";
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();
							echo "MBAFAFAFF";
							
							move_uploaded_file($_FILES['image']['tmp_name'],"images/icon/".$row['kode'].".jpg");
							echo "<script> window.location.href='admin_kategori_edit.php?kode=".$_GET['kode']."'; </script>";
						}
					?>
				</div>
			</div>
        </div>
    </div>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>


