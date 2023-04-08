<?php
//masukan juga koneksi ke database
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$namadepan = mysqli_real_escape_string($mysqli, $_POST['namadepan']);
	$namabelakang = mysqli_real_escape_string($mysqli, $_POST['namabelakang']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$notelp = mysqli_real_escape_string($mysqli, $_POST['notelp']);
		
	// untuk mengecek kosong atau terisi
	if(empty($namadepan) || empty($namabelakang) || empty($gender) || empty($email) || empty($notelp)) {
				
		if(empty($namadepan)) {
			echo "<font color='red'>namadepan field is empty.</font><br/>";
		}
		
		if(empty($namabelakang)) {
			echo "<font color='red'>namabelakang field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
		
        if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}

		if(empty($notelp)) {
			echo "<font color='red'>notelp field is empty.</font><br/>";
		}

		//link ke halaman sebelum nya
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// jika semua terisi semua
			
		//masukan data ke database	
		$result = mysqli_query($mysqli, "INSERT INTO user(namadepan,namabelakang,gender,email,notelp) VALUES('$namadepan','$namabelakang','$gender','$email','$notelp')");
		
		//menampilkan pesan berhasil
		echo "<font color='green'>Data Berhasil Ditambahkan.";
		echo "<br/><a href='index.php'>Lihat Hasil</a>";
	}
}
?>


<html>
<head>
	<title>Tambah Peserta</title>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>

<body>
    <a href="index.php"><i class="fi fi-rr-home"></i></a>
	<br/><br/>
	<form action="tambah.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Depan</td>
				<td><input type="text" name="namadepan"></td>
			</tr>
			<tr> 
				<td>Nama Belakang</td>
				<td><input type="text" name="namabelakang"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="gender"></td>
			</tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
			<tr>
                <td>No Telpon</td>
                <td><input type="text" name="notelp"></td>
            </tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html