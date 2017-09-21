<?php
// Panggil fungsi access control / authenticating users
require('auth.php');

// Validate kewujudan POST
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
	$sql = 'UPDATE pengajar SET 
		nama = "'. $_POST['nama'] . '",
		username = "'. $_POST['username'] . '",
		password = "'. $_POST['password'] . '",
		ic = "'. $_POST['ic'] . '",
		department = "'. $_POST['department'] . '",
		level_access = "'. $_POST['level_access'] . '" 
		WHERE 
		id = "'. $_POST['id'] . '"';

	// Tetapkan query kemasukan data. Jika gagal, paparkan error		
	if ( !mysqli_query($connection, $sql) )
	{
		die('Error kemaskini data: ' . mysqli_error($connection));
	}
	
	// Sekiranya berjaya masuk data, redirect ke dashboard
	header('Location: pengajar.php?message=updated');
	exit();
}

header('Location: pengajar.php');
exit();