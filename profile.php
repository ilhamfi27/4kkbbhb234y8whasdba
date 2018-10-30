<?php
require_once 'models/User_model.php';
$um = new User_model();
session_start();
if (!isset($_SESSION['username'])) {
	header('location: index.php');
}
$id_user = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'front_end_source.php'; ?>
	<title>Jurnal 8</title>
</head>
<body>
<?php include_once 'navbar.php'; ?>
<div class="container">
	<div class="row dashboard-panel">
		<div class="col-md-3">
			<?php include_once 'side_nav.php'; ?>
		</div>
		<div class="col-md-9">
			<?php

			?>
		    <div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Profil</h3>
				</div>
		        <div class="panel-body">
					<form>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<label>Nama Depan</label>
							<input type="text" class="form-control" name="username" placeholder="Nama Depan">
						</div>
						<div class="form-group">
							<label>Nama Belakang</label>
							<input type="text" class="form-control" name="username" placeholder="Nama Belakang">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<input type="text" class="form-control" name="username" placeholder="Jenis Kelamin">
						</div>
						<div class="form-group">
							<label>Tanggal Lahir</label>
							<input type="text" class="form-control" name="username" placeholder="Tanggal Lahir">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="username" placeholder="Email">
						</div>
						<button type="submit" name="submit" class="btn btn-primary pull-right">Daftar</button>
					</form>
		        </div>
		    </div>
		</div>
	</div>
</div>
</body>
</html>
