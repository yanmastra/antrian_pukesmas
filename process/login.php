<?php 

include "connection.php";
if(isset($_POST['username']) && isset($_POST['password'])){
	$db = getConnection();
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$ss = $db->prepare("SELECT * FROM user WHERE username = ?");
	$ss->execute(array($user));
	$res = $ss->fetch(PDO::FETCH_BOTH);
	if($pass == $res['password']){
		setcookie('username', $user, time()+(86400*10), "/");
		setcookie('user-type', $res['type'], time()+(86400*10), "/");
		location(currentPath());
	}else{
		location(currentPath().'?login=Login GAGAL#masuk');
	}
}else{
	location();
	//echo "ada kesalahan";
}
//echo $res['type'];
