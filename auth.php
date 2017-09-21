<?php

// Mulakan fungsi session
session_start();

// Buat semakan kewujudan session logged_in yang ditetapkan sewaktu logged_in
if ( ! isset( $_SESSION['logged_in'] ) OR $_SESSION['logged_in'] != true )
{
	// jika tidak wujud session logged in, redirect ke login.php
	header('Location: login.php');
	exit();
}