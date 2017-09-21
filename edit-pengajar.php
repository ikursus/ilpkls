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

// Arahan dapatkan rekod dari table pengajar
$sql = 'SELECT * FROM pengajar WHERE id = "' . $id . '" ';

// Proses query ke database
$result = mysqli_query($connection, $sql);

// Semak hasil query
if ( ! $result )
{
	echo 'Tidak dapat berhubung dengan database';
	exit();
}

// Dapatkan data dari hasil query
// berdasarkan ID
// Dapatkan data yang diperlukan berdasarkan result query
$row = mysqli_fetch_array($result);

// Semak jika data wujud berdasarkan result query
if ( $row[0] < 1 )
{
	echo 'Tiada rekod di dalam sistem';
	exit();
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
</head>

<body>
<?php include('menu.php'); ?>
<h1>Kemaskini Pengajar - <?php echo $row['nama']; ?></h1>


<p>&nbsp;</p>
<form method="post" action="update-pengajar.php">
  <table width="500" border="0" cellpadding="5">
    <tr>
      <td width="79">Nama</td>
      <td width="6">:</td>
      <td width="377"><input name="nama" type="text" id="nama" value="<?php echo $row['nama']; ?>"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td>:</td>
      <td><input name="username" type="text" id="username" value="<?php echo $row['username']; ?>"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="password" id="password"></td>
    </tr>
    <tr>
      <td>No. IC</td>
      <td>:</td>
      <td><input name="ic" type="text" id="ic" value="<?php echo $row['ic']; ?>"></td>
    </tr>
    <tr>
      <td>Department</td>
      <td>:</td>
      <td>
          <select name="department" id="department">
            <option value="multimedia" <?php if( $row['department'] == 'multimedia'): ?> selected="selected" <?php endif;?>>Multimedia</option>
            <option value="rangkaian" <?php if( $row['department'] == 'rangkaian'): ?> selected="selected" <?php endif;?>>Rangkaian</option>
          </select>
      </td>
    </tr>
    <tr>
      <td>Level Access</td>
      <td>:</td>
      <td>
          <select name="level_access" id="level_access">
            <option value="admin" <?php if( $row['level_access'] == 'admin'): ?> selected="selected" <?php endif;?>>Admin</option>
            <option value="user" <?php if( $row['level_access'] == 'user'): ?> selected="selected" <?php endif;?>>User</option>
          </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
      	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      	<input type="submit" name="kemaskini" id="kemaskini" value="Kemaskini">
        </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>