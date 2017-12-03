<?php 
include 'connection.php';
$db = getConnection();
if(isLoged()){
	if(isset($_POST['keluhan']) && !isHaveBook()){
		$ps = $db->prepare("SELECT * FROM dt_pasien WHERE username = ?");
		$ps->execute(array($_COOKIE['username']));
		$pasien = $ps->fetch(PDO::FETCH_OBJ);

		$_id = date("Ymd");
		$sqli = "INSERT INTO dt_antrian(id_antrian, pasien, keluhan, no_telp) VALUES ('".
				getIdNumber($_id)."','".
				$pasien->nik."','".
				$_POST['keluhan']."','".
				$_POST['no_urgen'].
			"')";
		$result = $db->query($sqli);
		if($result){
			//echo getIdNumber($_id);
			//setcookie('booking', getIdNumber($_id), time()+86400, "/");
			location('users/?page=booking&warning=Antrian berhasil diambil.');
		}else{
			//echo getIdNumber($_id);
			location('users/?page=booking&warning=Antrian gagal diambil!');
		}
	}else{
		location(currentPath());
	}
}else{
	location(currentPath());
}