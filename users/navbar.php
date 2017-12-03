<?php
if(!isset($_page_key)){
    include '../process/connection.php';
    location('users/');
}
?>
<nav class='navbar navbar-expand-lg navbar-light fixed-top' id='mainNav'>
  <div class='container'>
    <a class='navbar-brand js-scroll-trigger' href='../users/'>PUSKESMAS KUTA SELATAN</a>
    <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
      Menu
      <i class='fa fa-bars'></i>
    </button>
    <div class='collapse navbar-collapse' id='navbarResponsive'>
      <ul class='navbar-nav ml-auto'>
<?php 
  if(isLoged()){
    if(isset($_GET['page'])){
      $path = '../users/';
      if($_GET['page']=='riwayat'){
        $riwayat = '';
        $booking = "../users/?page=booking";
      }else if($_GET['page']=='booking'){
        $riwayat = '../users/?page=riwayat';
        $booking = "";
      }
    }else{
      $path = '';
      $riwayat = '../users/?page=riwayat';
      $booking = "../users/?page=booking";
    }
        echo "
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='$path#portfolio'>PETUNJUK</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='$riwayat#riwayat'>RIWAYAT</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='$booking#booking'>BOOKING</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='../process/logout.php?key=".md5('pesu')."'>LOGOUT</a>
        </li>";
  }else{
    echo "
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='#about'>TENTANG</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='#portfolio'>PETUNJUK</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='#masuk'>MASUK</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link js-scroll-trigger' href='#daftar'>DAFTAR</a>
        </li>
    ";
  } 
  ?>

      </ul>
    </div>
  </div>
</nav>