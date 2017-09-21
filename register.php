<?php

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
	
	// Sekiranya tiada error, tetapkan proses INSERT DATA ke DB
	$sql = 'INSERT INTO pengajar SET
		nama = "'. $_POST['nama'] . '",
		username = "'. $_POST['username'] . '",
		password = "'. $_POST['password'] . '",
		ic = "'. $_POST['ic'] . '",
		department = "'. $_POST['department'] . '",
		level_access = "user"';

	// Tetapkan query kemasukan data. Jika gagal, paparkan error		
	if ( !mysqli_query($connection, $sql) )
	{
		die('Error kemasukkan data: ' . mysqli_error($connection));
	}
	
	// Sekiranya berjaya masuk data, redirect ke dashboard
	header('Location: dashboard.php');
	exit();
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
</head>

<body>
 <p>&nbsp;</p>
<div align="center">
Pendaftaran Pengajar
</div>
<div align="center">

<p>&nbsp;</p>
<form name="register" method="post" action="">

<table width="500" border="0" cellpadding="5">
  <tr>
    <td width="79">Nama</td>
    <td width="6">:</td>
    <td width="377"><input type="text" name="nama" id="nama"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td>:</td>
    <td><input type="text" name="username" id="username"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input type="password" name="password" id="password"></td>
  </tr>
  <tr>
    <td>No. IC</td>
    <td>:</td>
    <td><input type="text" name="ic" id="ic"></td>
  </tr>
  <tr>
    <td>Department</td>
    <td>:</td>
    <td><select name="department" id="department">
      <option value="multimedia">Multimedia</option>
      <option value="rangkaian">Rangkaian</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="daftar" id="daftar" value="Daftar"></td>
  </tr>
</table>
<p>&nbsp;</p>

</form>

</div>

<p>&nbsp;</p>
</body>
</html>