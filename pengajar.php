<?php
// Panggil fungsi access control / authenticating users
require('auth.php');

// Semak condition message kemaskini dan delete
if ( isset( $_GET['message'] ) )
{
	if ( $_GET['message'] == 'updated' )
	{
		$message = 'Data berjaya dikemaskini.';
	}
	if ( $_GET['message'] == 'deleted' )
	{
		$message = 'Data berjaya didihapuskan.';
	}	
}

// Dapatkan connection Database
include('database.php');

// Arahan dapatkan rekod dari table pengajar
$sql = 'SELECT * FROM pengajar';

// Proses query ke database
$result = mysqli_query($connection, $sql);

// Semak hasil query
if ( ! $result )
{
	echo 'Tidak dapat berhubung dengan database';
	exit();
}

// Dapatkan senarai data dari hasil query
// dan pilih data yang diperlukan
while($row = mysqli_fetch_array($result))
{
	$senarai_pengajar[] = array(
		'id' => $row['id'], 
		'nama' => $row['nama'], 
		'username' => $row['username'],
		'ic' => $row['ic'], 
		'department' => $row['department'],
		'level_access' => $row['level_access']
	);
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
<h1>Senarai Pengajar</h1>

<?php
  if ( isset( $message ) )
  {
	  echo '<p style="color: red">' . $message . '</p>';
  }
  ?>
  
<table width="100%" border="1" cellpadding="5">

	<thead>
    	<tr>
        	<th>ID</th>
            <th>NAMA</th>
            <th>USERNAME</th>
            <th>IC</th>
            <th>JABATAN</th>
            <th>ROLE</th>
            <th>TINDAKAN</th>
        <tr>
    </thead>
    <tbody>
    
    <?php
	foreach( $senarai_pengajar as $individu ):
	?>
	
		<tr>
        	<td><?=$individu['id'];?></td>
            <td><?=$individu['nama'];?></td>
            <td><?=$individu['username'];?></td>
            <td><?=$individu['ic'];?></td>
            <td><?=$individu['department'];?></td>
            <td><?=$individu['level_access'];?></td>
            <td><a href="edit-pengajar.php?id=<?=$individu['id'];?>">KEMASKINI</a> | <a href="delete-pengajar.php?id=<?=$individu['id'];?>">HAPUS</a></td>
	
	<?php
	endforeach;
	?>
    
    </tbody>

</table>



<p>&nbsp;</p>
</body>
</html>