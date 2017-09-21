<?php
// Panggil fungsi access control / authenticating users
// include('auth.php');
require('auth.php');

// Jika session wujud, sediakan variable
$nama = $_SESSION['username'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
</head>

<body>
<?php include('menu.php'); ?>
<h1>Dashboard Pengajar</h1>
<p>Selamat Datang <?php echo $nama; ?>!</p>
<p>&nbsp;</p>
<p>Ingin logout? <a href="logout.php">Klik sini</a></p>
</body>
</html>