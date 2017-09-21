<?php

// Sekiranya rekod wujud, hapuskan session
session_start();
unset($_SESSION['logged_in']);
unset($_SESSION['username']);
unset($_SESSION['password']);

// Redirect ke login
header('Location: login.php?message=logout');
exit();
