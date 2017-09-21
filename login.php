<?php

// Semak condition logout dan set kan message logout
if ( isset( $_GET['message'] ) AND $_GET['message'] == 'logout' )
{
	$message = 'Anda telah berjaya logout.';
}

// Semak adakah borang dihantar menerusi POST METHOD
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	// Panggil rekod database
	include('database.php');

	// Tetapkan variable error
	$error = null;
	
	// Semak / validasi borang
	foreach ( $_POST as $key => $value )
	{
		if ( empty( $value ) )
		{
			$error .= '<p>Sila isi butiran ' . $key . '</p>';
		}
	}
	
	// Semak jika $error wujud data. Paparkan ia jika ada
	if ( ! is_null( $error ) )
	{
		echo $error;
		exit();
	}
	
	// Sekiranya tiada error, buat semakan kewujudan rekod yang dimasukkan.
	$sql = 'SELECT COUNT(*) FROM pengajar
		WHERE
		username = "'. $_POST['username'] . '"
		AND
		password = "'. $_POST['password'] . '"';

	$result = mysqli_query($connection, $sql);

	// Lakukan proses query ke DB. Jika gagal, paparkan error		
	if ( !$result )
	{
		die('Terdapat masalah query: ' . mysqli_error($connection));
	}
	
	// Dapatkan data yang diperlukan berdasarkan result query
	$row = mysqli_fetch_array($result);
	
	// Semak jika data wujud berdasarkan result query
	if ( $row[0] < 1 )
	{
		echo 'Tiada rekod di dalam sistem';
		exit();
	}
	
	// Sekiranya rekod data wujud, tetapkan session pengguna yang login
	session_start();
	$_SESSION['logged_in'] = true;
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	
	
	// Redirect ke dashboard
	header('Location: dashboard.php');
	exit();
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<p>&nbsp;</p>
<div align="center">
  <p>Login Pengajar </p>
  <p style="color:red">
  
  <?php
  if ( isset( $message ) )
  {
	  echo $message;
  }
  ?>
  
  </p>
</div>
<div align="center">

<p>&nbsp;</p>
<form name="login" method="post" action="">

<table width="500" border="0" cellpadding="5">
  <tr>
    <td width="79">Username</td>
    <td width="6">:</td>
    <td width="377"><input type="text" name="username" id="username"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="password" id="password"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="daftar" id="daftar" value="Login"></td>
  </tr>
</table>
<p>&nbsp;</p>

</form>

</div>

<p>&nbsp;</p>
</body>
</html>