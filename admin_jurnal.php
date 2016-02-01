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
					DAFTAR KATEGORI
				</h1>
				<div class="table-responsive">
						<table class="table table-hover table-bordered" style="text-align:center;">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Kategori</th>
									<th>Judul</th>
									<th colspan=2> Action </th>
								</tr>
							</thead>
						<tbody>
						<?php
							include('connect_db.php');
							$sql = 'SELECT * FROM Jurnal';
							$result = $conn->query($sql);
							if ( $result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo "<td>".$row["id_jurnal"]."</td>";
								echo "<td>".$row["Kategori"]."</td>";
								echo "<td>".$row["Judul"]."</td>";
								?>
								<td> <a href="jurnal_delete.php?kode=<?php echo $row['id_jurnal'];?>"> <img src='images/icon/delete.png'/> </a> </td>
								<td> <a href="jurnal_edit.php?kode=<?php echo $row['id_jurnal'];?>"> <img src='images/icon/edit.png'/> </a> </td>
								<?php
								
								echo "</tr>";
							}
						}
						echo "</table>";
						
						?>
						</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
