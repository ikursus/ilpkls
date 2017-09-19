<?php

// Function kiraan jumlah jam
function jumlahJam($hari)
{
	return $hari*24;
}

// Proses borang
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
	if ( isset( $_POST['hari'] ) AND ! empty($_POST['hari']) )
	{
		$result = '<p>Jumlah jam dalam sehari untuk ' . $_POST['hari'] . ' hari adalah ' . jumlahJam( $_POST['hari'] ) . ' jam</p>';
	}
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>Tutorial 8 - Borang Kiraan Jumlah Jam Dalam Sehari</h1>
<form name="form1" method="post" action="">
  <p>
    <label for="hari">Bilangan Hari</label>
    <input type="text" name="hari" id="hari">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
<p>
<?php if (isset( $result )): ?>
<?php echo $result; ?>
<?php endif; ?>
</p>
</body>
</html>
