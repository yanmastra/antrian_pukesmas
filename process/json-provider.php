<?php 
header("Content-type:application/json; charset=UTF-8");
include 'connection.php';
if (isLoged()) {
	$db = getConnection();
	switch ($_GET['req']) {
		case 'antrian_aktif':
			$ss = $db->prepare("SELECT * FROM antrian_aktif_json WHERE Status = ?");
			$ss->execute(array('ngantre'));
			$all_result = array();
			$i =0;
			while($result = $ss->fetch(PDO::FETCH_OBJ)){
				$all_result[$i] = $result;
				$i++;
			}
			echo json_encode($all_result);
			break;
		case 'my_antrian' :
/**
* username ->>
  <<- 
  
  nomor_antrian : 
  sisa : 
  nama_lengkap : 
  keluhan : 
  info : 
  
*/
			class MyModel{
				public $nomor_antrian;
				public $nama_lengkap;
				public $keluhan;
				public $info;
				public $status;
			}

			$model = new MyModel();
			$db = getConnection();
			$ss = $db->prepare("SELECT * FROM antrian_aktif_json WHERE `username` = ? ORDER BY tgl_masuk DESC LIMIT 1");
			$ss->execute(array(@$_GET['username']));
			$res = $ss->fetch(PDO::FETCH_ASSOC);
			
			if ($ss->rowCount()>0){
				$model->nomor_antrian = $res['no_antrian'];
				$model->nama_lengkap = $res['nama_lengkap'];
				$model->keluhan = $res['keluhan'];
				$model->status = $res['status'];

				$sisa = $db->query("SELECT * FROM antrian_aktif_json WHERE `tgl_masuk` < '".$res['tgl_masuk']."' AND status = 'ngantre'");
				if($res['status'] =='tidak datang'){
				    $model->info = "<h3 class='text-center'>Nomor antrian anda sudah lewat</h3><h6 class='text-center'>Silahkan segera datang ke puskesmas dan melapor</h6><span class='text-center'>Nomor antrian anda akan kembali dipanggil setelah lima antrian di depan anda keluar</span>";
				}else if($res['status']=='ditolak'){
					$model->info = "<h5 class='text-center'>Mohon maaf, sebelumnya anda mengajukan keluhan yang tidakbisa kami tangani!</h5><div style='display:block;'><a href='#' onclick='delReject(".$res['no_antrian'].")' class='btn btn-default btn-outline btn-sm'>OK</a></div>";
				}else{
				    if($sisa->rowCount()==0){
				      	$model->info = "<h1 class='text-center'>Sekarang Giliran Anda</h1><h6 class='text-center'>Segera datang ke puskesmas sekarang!</h6><span class='text-center'>Jika anda terlambat, maka nomor antrian anda akan dilewatkan!</span>";
				    }else {
				      	$model->info = "<h1 class='text-center'>".$sisa->rowCount()."<br>ORANG</h1><h6 class='text-center'>Masih mengantri didepan anda</h6><span class='text-center'>Silahkan datang ke puskesmas sebelum nomor antrian anda lewat</span>";
				    }
				}
			}else{
				$model = null;
			}
			echo json_encode($model);
			break;
		case 'del_reject' :
			if(isLoged()){
				$db = getConnection();
				$ss = $db->prepare("DELETE FROM dt_antrian WHERE id_antrian = ?");
				$ss->execute(array($_GET['id_antrian']));
				if($ss->rowCount()>0){
					echo 'true';
				}else{
					echo 'false';
				}
			}
			break;
		default:
			location(currentPath());
			break;
	}
}else{
	location(currentPath());
}
?>