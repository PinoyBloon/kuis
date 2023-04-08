<?php
//masukan juga koneksi ke database
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$namadepan = mysqli_real_escape_string($mysqli, $_POST['namadepan']);
	$namabelakang = mysqli_real_escape_string($mysqli, $_POST['namabelakang']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$notelp = mysqli_real_escape_string($mysqli, $_POST['notelp']);
	
	// cek apakah ada yang kosong
	if(empty($namadepan) || empty($namabelakang) || empty($email) || empty($gender) || empty($notelp)) {	
			
		if(empty($namadepan)) {
			echo "<font color='red'>namadepan field is empty.</font><br/>";
		}
		
		if(empty($namabelakang)) {
			echo "<font color='red'>namabelakang field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}

		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
        
        if(empty($notelp)) {
			echo "<font color='red'>notelp field is empty.</font><br/>";
		}
	} else {	
		//updating isi table
		$result = mysqli_query($mysqli, "UPDATE user SET namadepan='$namadepan',namabelakang='$namabelakang',email='$email',gender='$gender',notelp='$notelp' WHERE id=$id");
		
		//di arahkan ke halama depan
		header("Location: index.php");
	}
}
?>
<?php
//dapatkan id dari url
$id = $_GET['id'];

//memilih data yang berhubungan dengan id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$namadepan = $res['namadepan'];
	$namabelakang = $res['namabelakang'];
	$email = $res['email'];
	$gender = $res['gender'];
    $notelp = $res['notelp'];
}
?>
<html>
	<head>	
		<title>Edit Data Peserta</title>
		<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	</head>

	<body>
		<a href="index.php"><i class="fi fi-rr-home"></i></a>
		<br/>
		<br/>
		<form name="form1" method="post" action="edit.php">
			<table border="0">
				<tr> 
					<td>Nama Depan</td>
					<td><input type="text" name="namadepan" value="<?php echo $namadepan;?>"></td>
				</tr>   
				<tr> 
					<td>Nama Belakang</td>
					<td><input type="text" name="namabelakang" value="<?php echo $namabelakang;?>"></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $email;?>"></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
				</tr>
				<tr> 
					<td>No Telpon</td>
							<td><input type="text" name="notelp" value="<?php echo $notelp;?>"></td>
				</tr>
				<tr>
							<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</body>
</html>