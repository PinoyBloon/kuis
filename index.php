<?php

//masukan juga koneksi ke database
include_once("config.php");

//menampilkan data dengan urutan (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id DESC"); // using mysqli_query instead

?>

<html>
<head>

	<title>Beranda</title>
  <link rel="stylesheet" href="style.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

</head>

<body>

  <header>
    <h1>Daftar Peserta Tour</h1>
    <h2>Malaysia 3D2N</h2>
  </header>

  <br>
  <a href="tambah.php"><i class="fi fi-rr-add"></i></a>
  <br/><br/>

	  <table>

	  <tr bgcolor="#CCCCCC">
		<td>Nama Depan</td>
		<td>Nama Belakang</td>
		<td>Gender</td>
		<td>Email</td>
		<td>No Telp</td>
    	<td>Aksi</td>
	  </tr>

	  <?php 
	  while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['namadepan']."</td>";
		echo "<td>".$res['namabelakang']."</td>";
		echo "<td>".$res['gender']."</td>";
		echo "<td>".$res['email']."</td>";
    	echo "<td>".$res['notelp']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\"><i class='fi fi-rr-edit'></i></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class='fi fi-rr-trash'></i></a></td>";		
	  }
	  ?>
	  </table>
  </body>
</html>