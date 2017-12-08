<?php 
include 'connection.php';
if(isLoged()){
	if(isset($_GET['id']) && isset($_GET['status'])){
		$db = getConnection();
		$ss = $db->prepare("UPDATE dt_antrian SET status = ?, tanggal_keluar = ?, pegawai = ? WHERE id_antrian = ? ");
		switch($_GET['status']){
			case 'tangani' : 
				$ss->execute(array('keluar', date("Y-m-d H:i:s"), $_GET['peg_id'], $_GET['id']));
				if($ss->rowCount()>0){
					location(currentPath()."?page=tanganiantri&warning=Success&message=Antrian dengan <b>Nomor : ".$_GET['id']."</b> sudah tertangani.");
				}else{
					location(currentPath()."?page=tanganiantri&warning=Failed&message=Ada kesalahan dalam menangani antrian.");
				}
				break;
			case 'belum_datang' :
				$ss->execute(array('tidak datang', null, null, $_GET['id']));
				if($ss->rowCount()>0){
					location(currentPath()."?page=tanganiantri&warning=Success&message=Antrian dengan <b>Nomor : ".$_GET['id']."</b> tidak datanng.");
				}else{
					location(currentPath()."?page=tanganiantri&warning=Failed&message=Ada kesalahan dalam menangani antrian.");
				}
				break;
			case 'sudah_datang' :
				$sxx = null;
				$ss = $db->prepare("UPDATE dt_antrian SET id_antrian = ?, status = ?, tanggal_masuk = ? WHERE id_antrian = ? ");
				$sx = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'ngantre'");
				echo "<br>".$sx->rowCount();
				if($sx->rowCount()>5){
					//echo "<br>Lebih dari 5";
					$sxx = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'ngantre' LIMIT 4, 1");
				}else if($sx->rowCount()>1){
					//echo "<br>Kurang dari 5";
					$sxx = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'ngantre' LIMIT ".($sx->rowCount()-1).", 1");
					//$sxx->execute(array($sx->rowCount()-2));
				}else if($sx->rowCount()==1){
					$sxx = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'ngantre' LIMIT 1");
				}else{
					$sxx = null;
				}
				if($sxx == null){
					$res = getIdNumber(date("Ymd"));
					//echo "<br>".$sxx->rowCount();
					echo "<br> Nomor : ".getIdNumber($res,2);
					$nnumber = getIdNumber($res,2);
				}else{
					$res = $sxx->fetch(PDO::FETCH_ASSOC);
					//echo "<br>".$sxx->rowCount();
					echo "<br> Nomor : ".getIdNumber(substr(strval($res['Nomor Antrian']),0,12), 2);
					$nnumber = getIdNumber(substr(strval($res['Nomor Antrian']),0,12), 2);
				}
				$ss->execute(array($nnumber, 'ngantre', date("Y-m-d H:i:s"), $_GET['id']));
				if($ss->rowCount()>0){
					location(currentPath()."?page=tanganiantri&warning=Success&message=Antrian dengan <b>Nomor : ".$_GET['id']." </b> sudah kembali mengantri dengan nomor antrian : ".$nnumber);
				}else{
					location(currentPath()."?page=tanganiantri&warning=Failed&message=Ada kesalahan dalam menangani antrian.".getIdNumber($res['Nomor Antrian']));
				}
				break;
			default : 
				location(currentPath());
				break;
		}
	}
}