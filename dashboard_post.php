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
					POST JURNAL
				</h1>
				<form role='form' method='POST' enctype='multipart/form-data'>
					<div class='form-group'>
							<input name='id_jurnal' type='text' class='form-control' placeholder='Kode...' required/>
					</div>
					<div class='form-group'>
							<input name='Judul' type='text' class='form-control' placeholder='Judul...' required/>
					</div>
					<div class='form-group'>
							Kategori
							<select name='kategori' class='form-control'>
							<?php
								$sql = "SELECT kode, kategori FROM kategori";
								$result = $conn->query($sql);
						
								while($row = $result->fetch_assoc()) {
									echo "<option value='".$row['kode']."'> ".$row['kategori']." </option>";
								}
							?>
							</select>
					</div>
					<div class='form-group'>
							Feature
							<textarea name='feature' class='form-control' placeholder='Feature' required> </textarea>
					</div>
					<div class='form-group'>
							Targeted Application(s) / Industry
							<textarea name='target' class='form-control' placeholder='Feature' required> </textarea>
					</div>
					<div class='form-group'>
						<p> Image : <input name='gambar' id='gambar' type='file' style="width:250px;"/> </p>
					</div>
					<div class='form-group'>
							Related Information (Publications etc.)
							<textarea name='reInf' class='form-control' placeholder='Related Information (Publications etc.)...' required> </textarea>
					</div>
					<div class='form-group'>
							Keyword
							<textarea name='keyword' class='form-control' placeholder='Keyword' required> </textarea>
					</div>
					<div class='form-group'>
							<button id='tambah' name='tambah' type="submit" class="btn btn-info"  required>Buat Post Baru</button>
					</div>
				</form>
					<?php
						if(isset($_POST['tambah'])) {
							include('connect_db.php');
							$sql = "SELECT * FROM user WHERE id='".$_SESSION['user_id']."'";
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();
							
							$user_id = $row['kode'];
							
							$id = $_POST['id_jurnal'];
							$judul = $_POST['Judul'];
							$kategori = $_POST['kategori'];
							$feature = $_POST['feature'];
							$target = $_POST['target'];
							move_uploaded_file($_FILES['gambar']['tmp_name'],"images/image/".$id.".jpg");
							$reInf = $_POST['reInf'];
							$key = $_POST['keyword'];
							$time = date('d/m/y  |  h:i a');
							
							$sql = "INSERT INTO jurnal VALUES($id,'$user_id','$judul','$feature','$target','$id','$reInf','$key',$kategori,'$time')";
							$result = $conn->query($sql);
						}
					?>
			</div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
