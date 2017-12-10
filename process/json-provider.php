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
		default:
			location(currentPath());
			break;
	}
}else{
	location(currentPath());
}