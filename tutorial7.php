<?php

// Semak method post dari borang
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	// Jalankan kod validation setiap field
	//if ( ! isset( $_POST['data_nama'] ) 
//	OR empty( $_POST['data_nama'] ) )
//	{
//		echo '<p>Sila isi nama anda</p>';
//	}
//	
//	if ( ! isset( $_POST['data_email'] ) 
//	OR empty( $_POST['data_email'] ) )
//	{
//		echo '<p>Sila isi email anda</p>';
//	}
	
	// Default value error
	$error_msg = null;
	
	// Semak jika wujud data dari setiap input field
	if ( isset( $_POST ) )
	{
		// Buat semakan validasi terhadap data
		foreach ( $_POST as $key => $value )
		{
			if ( empty( $value ) )
			{
				$error_msg .= '<p>Sila isi ' . ucwords( str_replace('data_', '', $key) ) . ' anda</p>';
			}						
		}
	}
	
	// Semak jika wujud error message, paparkan ia.
	if ( ! is_null( $error_msg ) )
	{
		echo $error_msg;
		exit();
	}

	// jika tidak wujud error, maka paparkan hasil.
	foreach ( $_POST as $key => $value )
	{
		echo '<p>' . ucwords( str_replace('data_', '', $key) ) . ': '. $value . '</p>';				
	}	

}
else
{
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tutorial 7</title>
</head>

<body>
<h1>Tutorial 7 - Contoh Borang
</h1>
<form name="form1" method="post" action="">
  <p>
    <label>Nama Pengguna
      <input type="text" name="data_nama" id="data_nama">
    </label>
    
  </p>
  <p>
    <label>Email Pengguna
      <input type="email" name="data_email" id="data_email">
    </label>
  </p>
  <p>
    <label>Telefon Pengguna
      <input type="text" name="data_telefon" id="data_telefon">
    </label>
  </p>
  <p><button type="submit">Submit</button>
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
}	
?>
