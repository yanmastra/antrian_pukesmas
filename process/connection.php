<?php 

function getConnection(){
	$dsn = "mysql:dbname=db_puskesmas;host=localhost:3366";
	$user = "root";
	$pass = "";
	try{
		$db = new PDO($dsn, $user, $pass);
	}catch(PDOException $e){
		$e->getMessage();
	}
	return $db;
}

function isLoged(){
	if (isset($_COOKIE['username'])) {
		$db = getConnection();
		$result = $db->prepare("SELECT * FROM user WHERE username = ?");
		$result->execute(array($_COOKIE["username"]));
		if($result->rowCount() > 0){
			return true;
		}else{ return false;}
		$db->close();
	}else{return false;}
}

function isPasienAvailable($field, $value){
	$db = getConnection();
	$res = $db->prepare("SELECT * FROM dt_pasien WHERE $field = ?");
	$res->execute(array($value));
	if($res->rowCount()>0){
		return true;
	}else{
		return false;
	}
}

function location($switch, $port=null){
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$host = $_SERVER['HTTP_HOST'];
	if(substr($host, strlen($host)-4) == '8080'){
		$port = '';
	}
	$uri .= $host.$port.'/';
	header('Location: '.$uri.$switch);
	//echo $uri.$switch;
}

function currentPath($args = false){
	if(isLoged()){
		$db = getConnection();
		$ss = $db->prepare("SELECT * FROM user WHERE username = ?");
		$ss->execute(array($_COOKIE['username']));
		$res = $ss->fetch(PDO::FETCH_ASSOC);
		if($res['type']=='pegawai'){
			return 'pages/';
		}else{
			return 'users/';
		}
		$db->close();
	}else{
		if(isset($_GET['from'])){
			if($_GET['from'] == 'pegawai'){
				return 'pages/';
			}else{
				return 'users/';
			}
		}else{
			return null;
		}
	}
}

function getLoginType(){
	if(isLoged()){
		$db = getConnection();
		$ss = $db->prepare("SELECT * FROM user WHERE username = ?");
		$ss->execute(array($_COOKIE['username']));
		$res = $ss->fetch(PDO::FETCH_ASSOC);
		return $res['type'];
	}else{
		return null;
	}
}

function getIdNumber($number, $index = null){
	$db = getConnection();
	if($number != null){
		$nol = array(0 => '', 1 => '0', 2 => '00', 3 => '000', 4 => '0000');
		if($index == 'x'){
			$len = strlen($number);
			$val = substr($number, $len-2);
			$val = intval($val)+1;
			$hasil = substr($number, 0, $len-2).$nol[(2-strlen(strval($val)))].$val;
		}else {
			$ss = $db->query("SELECT * FROM dt_antrian WHERE id_antrian LIKE '%$number%'");
			//$ss->execute(array($number));
			$nm = $ss->rowCount();
			$long = strlen(strval($nm));
			if($index==null){
				$hasil = $number.$nol[4-$long].($nm+1);
			}else {
				$hasil = $number.$nol[$index-$long].($nm+1);
			}
		}
		$ss = $db->query("SELECT * FROM dt_antrian WHERE id_antrian = '$hasil'");
		if($ss->rowCount()>0){
			return getIdNumber($hasil,'x');
		}else{
			return $hasil;
		}
	}
}

function isHaveBook(){
	if(isLoged()){
		$db = getConnection();
		$ss = $db->prepare("SELECT * FROM antrian_aktif WHERE Username = ?");
		$ss->execute(array($_COOKIE['username']));
		if($ss->rowCount()>0){
			return true;
		}else{
			return false;
		}
		$db->close();
	}else{
		return false;
	}
}

$_page_key = '1210156';