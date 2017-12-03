 <?php

$password = $_POST['password']; //mengambil inputan dari form dengan name password
$password2 = $_POST['password2']; //mengambil inputan dari form dengan name password2

if($password==$password2){ // kondisi jika password = password2
 echo "BENAR"; //tamplikan password benar
}else{ // sebaliknya, jika password tidak sama dengan password 2
 echo "Maaf password anda tidak sama, silahkan coba lagi"; //tamplikan error
}

?>