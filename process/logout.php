<?php 
include "connection.php";
if(isset($_COOKIE['username'])){
	if(isset($_GET['key']) && $_GET['key'] == md5('pesu')){
		setcookie('username', "", 0, "/");
		setcookie('user-type', "", 0, "/");
		//unset($_COOKIE['username']);
		location(currentPath());
	}else{
		location(currentPath().'?logout=Logout gagal!');
		//echo "esalahan 1"; 
	}
}else{
	location(currentPath().'?logout=Anda belum login!');
	//echo "kesalahan 2";
}