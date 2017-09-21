<?php

// Database Connection Data
$server_host = 'localhost';
$database_name = 'exam';
$database_username = 'root';
$database_password = '';

// Cuba berhubung ke Database Server menggunakan mysqli_
$connection = mysqli_connect($server_host, $database_username, $database_password);

// Semak keadaan status connection DB
if ( !$connection )
{
	die('Connection gagal: ' . mysqli_connect_error());
}

// Cuba berhubung dengan database exam
if ( !mysqli_select_db($connection, $database_name) )
{
	die('Tidak dapat berhubung dengan database ' . $database_name);
}

// echo 'Berjaya berhubung dengan database ' . $database_name;


