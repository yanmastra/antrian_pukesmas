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
  <div class='container' id='isi'>
<?php 
if(isHaveBook()){
  $db = getConnection();
  $ss = $db->prepare("SELECT * FROM antrian_aktif WHERE `Username` = ? ");
  $ss->execute(array($_COOKIE['username']));
  $res = $ss->fetch(PDO::FETCH_ASSOC);

  $sisa = $db->query("SELECT * FROM antrian_aktif WHERE `Tanggal Masuk` < '".$res['Tanggal Masuk']."' AND Status = 'ngantre'");
  if($res['Status']=='tidak datang'){
    $info = "
          <h3 class='text-center'>Nomor antrian anda sudah lewat</h3>
          <h6 class='text-center'>Silahkan segera datang ke puskesmas dan melapor</h6>
          <span class='text-center'>Nomor antrian anda akan kembali dipanggil setelah lima antrian di depan anda keluar</span>";
  }else if($res['Status']=='ditolak'){
    $info = "<h5 class='text-center'>Mohon maaf, sebelumnya anda mengajukan keluhan yang tidakbisa kami tangani!</h5><div style='display:block;'><a href='#' onclick='delReject(".$res['no_antrian'].")' class='btn btn-default btn-outline btn-sm'>OK</a></div>";
  }else{
    if($sisa->rowCount()==0){
      $info = "
          <h1 class='text-center'>Sekarang Giliran Anda</h1>
          <h6 class='text-center'>Segera datang ke puskesmas sekarang!</h6>
          <span class='text-center'>Jika anda terlambat, maka nomor antrian anda akan dilewatkan!</span>";
    }else {
      $info = "
          <h1 class='text-center'>".$sisa->rowCount()."<br>ORANG</h1>
          <h6 class='text-center'>Masih mengantri didepan anda</h6>
          <span class='text-center'>Silahkan datang ke puskesmas sebelum nomor antrian anda lewat</span>";
    }
  }

  echo "
    <div class='row'>
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
              <span style='font-size: 18px; font-weight: 700' id='no_antrian'>".substr(strval($res['Nomor Antrian']),8)."</span>
            </div>
          </div>
          <div class='row text-left' style='border-bottom: solid 1px #fff;'>
            <div class='col-lg-4' style='margin-top: 8px'>
              Nama Anda
            </div>
            <div class='col-lg-6'>
              <span style='font-size: 18px; font-weight: 700' id='nama_lengkap'>
              ".$res['Nama Lengkap']."</span>
            </div>
          </div>
          <div class='row text-left' style='border-bottom: solid 1px #fff;'>
            <div class='col-lg-4' style='margin-top: 8px'>
              Keluhan Anda
            </div>
            <div class='col-lg-6'>
              <span style='font-size: 18px; font-weight: 700' id='keluhan'>
              ".$res['Keluhan']."
              </span>
            </div>
          </div>
          <br><br><br>
        </div>
      </div>
      <div class='col-md-6'>
        <div class='container' id='info'>
          ".$info."
        </div>
      </div>
    </div>";
      ?>

<script type="text/javascript">
  function getData(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        var myObj = JSON.parse(this.responseText);
        if (myObj != null) {
          document.getElementById("no_antrian").innerHTML = myObj.nomor_antrian;
          document.getElementById("nama_lengkap").innerHTML = myObj.nama_lengkap;
          document.getElementById("keluhan").innerHTML = myObj.keluhan;
          document.getElementById("info").innerHTML = myObj.info;
        }else{
          window.location = '../users/?page=booking';
        }
      }
    };
    xmlhttp.open("GET", "../process/json-provider.php?req=my_antrian&username="+<?php echo "'".$_COOKIE['username']."'"; ?>, true);
    xmlhttp.send();
  }
  setInterval(function(){
    getData();
  }, 1000);

  function delReject(a){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200){
        var myObj = JSON.parse(this.responseText);
        if(myObj){
          window.location = '../users/?page=booking';
        }else{
          alert('Ada kesalahan!');
        }
      }
    };
    xmlhttp.open("GET", "../process/json-provider.php?req=del_reject&id_antrian="+a, true);
    xmlhttp.send();
  }
</script>

      <?php
}else{
  echo "
    <div class='row' id='isi'>
      <div class='col-lg-6 mx-auto'>
        <div class='container'>
          <h2 class='text-center'>AMBIL ANTRIAN</h2>
          <hr class='star-light'/>
          <form action='../process/booking.php' method='post'>
            <div style='display:block' id='info'></div>
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
      </div>
    </div>";
}

?>

  </div>

</header>