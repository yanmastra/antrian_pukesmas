<?php 
if(!isset($_page_key)){
  include '../process/connection.php';
  location(currentPath());
}
?>
<style type="text/css">
  #petunjuk-list li{
    border-bottom: solid 1px #fff;
    margin-top: 4px;
  }
</style>
<header class='masthead' id='booking'>
  <div class='container'>
    <div class='row'>
<?php 
if(isHaveBook()){
  $db = getConnection();
  $ss = $db->prepare("SELECT * FROM antrian_aktif WHERE `Username` = ? AND `Nomor Antrian` LIKE '".date('Ymd')."%'");
  $ss->execute(array($_COOKIE['username']));
  $res = $ss->fetch(PDO::FETCH_ASSOC);

  $sisa = $db->query("SELECT * FROM antrian_aktif WHERE `Tanggal Masuk` < '".$res['Tanggal Masuk']."' AND `Nomor Antrian` LIKE '".date('Ymd')."%'");
  echo "
        <div class='col-lg-12'>
          <h3 class='text-center'>INFO ANTRIAN</h3>
          <hr class='star-light'>
          <br>
      </div>
    </div>
    <div class='row'>
      <div class='col-md-6'>
        <div class='container'>
          <div class='row text-left'>
            <div class='col-lg-12' style='border-bottom: solid 1px #fff;'>
              <span style='font-size: 18px; font-weight: 700; text-align: left;'>Informasi Anda</span>
            </div>
          </div>
          <div class='row text-left' style='border-bottom: solid 1px #fff;'>
            <div class='col-lg-4' style='margin-top: 8px'>
              Nomor Antrian Anda
            </div>
            <div class='col-lg-6'>
              <span style='font-size: 18px; font-weight: 700'>".substr(strval($res['Nomor Antrian']),8)."</span>
            </div>
          </div>
          <div class='row text-left' style='border-bottom: solid 1px #fff;'>
            <div class='col-lg-4' style='margin-top: 8px'>
              Nama Anda
            </div>
            <div class='col-lg-6'>
              <span style='font-size: 18px; font-weight: 700'>
              ".$res['Nama Lengkap']."</span>
            </div>
          </div>
          <div class='row text-left' style='border-bottom: solid 1px #fff;'>
            <div class='col-lg-4' style='margin-top: 8px'>
              Keluhan Anda
            </div>
            <div class='col-lg-6'>
              <span style='font-size: 18px; font-weight: 700'>
              ".$res['Keluhan']."
              </span>
            </div>
          </div>
          <br><br><br>
        </div>
      </div>
      <div class='col-md-6'>
        <div class='container'>
          <h1 class='text-center'>".$sisa->rowCount()."</h1>
          <h6 class='text-center'>orang <br>masih mengantri di depan anda</h6>
          <br>
          <span class='text-center'>Silahkan datang ke puskesmas sebelum nomor antrian anda lewat</span>
        </div>
      </div>";
}else{
  echo "
      <div class='col-lg-6 mx-auto'>
        <div class='container'>
          <h2 class='text-center'>AMBIL ANTRIAN</h2>
          <hr class='star-light'/>
          <form action='../process/booking.php' method='post'>
            <div class='text-left container control-group'>
              <div class='form-group controls'>
                <label>Keluhan</label>
                <input type='text' name='keluhan' class='form-control' required placeholder='Keluhan anda ...'>
              </div>
              <div class='form-group controls'>
                <label>Nomor yang bisa dihubungi saat ini</label>
                <input type='number' name='no_urgen' class='form-control' required placeholder='Kontak ...'>
              </div>
              <div class='form-group controls'>
                <button type='submit' class='btn btn-outline btn-lg text-center'>
                  <i class='fa fa-check fa-fw'></i>
                  Ambil Antrian
                </button>
              </div>
            </div>
          </form>
          <br><br>
        </div>
      </div>
      <div class='col-lg-6 mx-auto'>
        <div class='container'>
          <h2 class='text-center'>PETUNJUK AMBIL ANTRIAN</h2>
          <hr class='star-light'>
          <br/>
          <ol class='text-justify' id='petunjuk-list'>
            <li>Isi form keluhan tersebut, sesuai dengan keluhan anda saat ini.</li>
            <li>Klik tombol 'Ambil Antrian'</li>
            <li>Setelah itu anda akan mendapatkan informasi antrian dari laman kami</li>
            <li>Ingatlah nomor antrian yang anda dapatkan</li>
            <li>Lihatlah berapa orang yang masih mengantri di depan anda, jika sisanya sudah sedikit silahkan segera datang ke puskesmas.</li>
            <li>Di puskesmas, akan dipanggil nomor antrian anda jika urutan sudah tiba di anda</li>
            <li>Jika anda belum datang, tapi nomor antrian anda sudah dipanggil, maka sesampai di puskesmas anda harus melapor terlebih dahulu ke bagian Administrasi</li>
            <li>Nomor antrian anda akan dipanggil kembali setelah beberapa antrian yang sudah mendahului sesuai kebijakan bagian Administrasi</li>
          </ol>
        </div>
      </div>";
}

?>
    </div>
  </div>
</header>