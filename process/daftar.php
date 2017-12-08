
<?php 
include 'connection.php';
if (!isLoged()) {
	if($_POST['password2']){
		$nama_lengkap = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tanggal_lahir = $_POST['tanggal_lahir'];
		$nik = $_POST['nik'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$password = $_POST['password'];
		$password_2 = $_POST['password2'];

		if (!isPasienAvailable("nik", $nik)) {	
			if($password == $password_2){
				$db = getConnection();
				$result = $db->query("INSERT INTO user VALUES('".$username."', '".$_POST['password']."', 'pasien')");
				if($result){
					$result2 = $db->query("INSERT INTO dt_pasien VALUES (
						'".$username."',
						'".$nik."',
						'".$nama_lengkap."',
						'".$tanggal_lahir."',
						'".$tempat_lahir."',
						'".$alamat."',
						'".$no_telp."' 
					)");
					if ($result2) {
						location(currentPath()."?login=Data anda berhasil direkam!#masuk");
					}else{
						$db->query("DELETE FROM user WHERE username = '".$username."'");
						location(currentPath()."?daftar=Ada kesalahan pada data yang anda input!#daftar");
					}
				}else{
					location(currentPath()."?daftar=Ada kesalahan pada username yang anda input!#daftar");
				}
				$db->close();
			}else{
				location(currentPath()."?daftar=Konfirmasi password salah!#daftar");
			}
		}else{
			location(currentPath()."?login=Anda sebelumnya sudah pernah mendaftar!#masuk");
		}
	}else{
		location(currentPath());
	}
}else{
	location(currentPath());
}