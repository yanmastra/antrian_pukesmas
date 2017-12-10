<!DOCTYPE html>
<html>
<head>
	<?php
    include '../process/connection.php';
    if(getLoginType() != 'pasien' && isLoged()){
        location(currentPath());
        //echo currentPath();
    }
    include 'header.php'; ?>
	<title></title>
</head>
<body id="page-top">
	<!-- Navigation -->
	<?php 
    include 'navbar.php'; ?>

    <!-- Header -->
    <?php
    if(isLoged()){
        switch (@$_GET['page']) {
            case 'booking':
                include 'booking.php';
                break;
            case 'riwayat' :
                include 'home.php';
                include 'riwayat.php';
                break;
            default:
                include 'home.php'; 
                include "petunjuk.php";
                break;
        }
    }else{
        include 'page-header.php';
        include "tentang.php";
        include "petunjuk.php";
    	include 'login.php';
    	include "daftar.php";
    }

    ?>

    <!-- page footer -->
    <?php include 'footer.php'; ?>

</body>
</html>