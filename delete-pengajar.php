<?php
// Panggil fungsi access control / authenticating users
require('auth.php');

// Validate kewujudan GET id
if ( ! isset( $_GET['id'] ) )
{
	header('Location: pengajar.php');
	exit();
}

// Dapatkan connection Database
include('database.php');

// Dapatkan no. id dari GET id
$id = $_GET['id'];

// Arahan hapus rekod dari table pengajar
$sql = 'DELETE FROM pengajar WHERE id = "' . $id . '" ';

// Proses query ke database
$result = mysqli_query($connection, $sql);

// Semak hasil query
if ( ! $result )
{
	echo 'Tidak dapat berhubung dengan database';
	exit();
}

// Sekiranya berjaya hapus data, redirect ke dashboard
header('Location: pengajar.php?message=deleted');
exit();

?>