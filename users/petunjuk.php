
<?php 
if(!isset($_page_key)){
  include '../process/connection.php';
  location('users/');
}
if(isLoged()){
  echo "
    <section id='portfolio'>
      <div class='container'>
        <h2 class='text-center'>PETUNJUK </h2>
        <hr class='star-primary'>
        <br/>
          <div class='container'>
            <div class='row'>
              <div class='col-lg-10 mx-auto' align='center'>
                <div class='row'>
                  <div class='col-md-4'>
                    <img class='img-fluid img-centered' src='img/booking.png' alt='' height='100' width='300'>
                  </div>
                  <div class='col-md-8'>
                    <br/>
                    <p >Untuk Melakukan Booking Ikuti Langkah Berikut :
                      <ol class='text-left'>
                        <li>User Harus Login Terlebih Dahulu.</li>
                        <li>Untuk Melakukan Booking No Antrean, Klik Tombol 'Ambil Antrian'.</li>
                        <li>User akan dialihkan ke Menu Antrian, Menu ini berisi form untuk membooking antrian.</li>
                        <li>Silahkan isi form sesuai keluhan anda</li>
                        <li>Jika Sudah, Klik Tombol Booking.</li>
                      </ol>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  ";
}else{
  echo "
    <section class='success' id='portfolio'>
      <div class='container'>
        <h2 class='text-center'>PETUNJUK </h2>
        <hr class='star-light'>
        <div class='row'>
          <div class='col-sm-4 mx-auto'>
            <div class='alert alert-success alert-dismissable alert-sm'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><span><em>Klik gambar untuk melihat petunjuk</em></span></div>
          </div>
        </div>
        <div class='row'>

          <div class='col-sm-4 portfolio-item'>
            <a class='portfolio-link' href='#petunjuk1' data-toggle='modal'>
              <div class='caption'>
                <div class='caption-content'>
                  <i class='fa fa-search-plus fa-3x'></i>
                </div>
              </div>
              <img class='img-fluid' src='img/daftar.png' alt=''>
            </a>
          </div>

          <div class='col-sm-4 portfolio-item'>
            <a class='portfolio-link' href='#petunjuk2' data-toggle='modal'>
              <div class='caption'>
                <div class='caption-content'>
                  <i class='fa fa-search-plus fa-3x'>
                  </i>
                </div>
              </div>
              <img class='img-fluid' src='img/login.png' alt=''>
            </a>
          </div>

          <div class='col-sm-4 portfolio-item'>
            <a class='portfolio-link' href='#petunjuk3' data-toggle='modal'>
              <div class='caption'>
                <div class='caption-content'>
                  <i class='fa fa-search-plus fa-3x'></i>
                </div>
              </div>
              <img class='img-fluid' src='img/booking.png' alt=''>
            </a>
          </div>

        </div>
      </div>
    </section>

    <!-- Portfolio Modals -->
    <div class='portfolio-modal modal fade' id='petunjuk1' tabindex='-1' role='dialog' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='close-modal' data-dismiss='modal'>
            <div class='lr'>
              <div class='rl'></div>
            </div>
          </div>
          <div class='container'>
            <div class='row'>
              <div class='col-lg-8 mx-auto'>
                <div class='modal-body'>
                  <h2>DAFTAR</h2>
                  <hr class='star-primary'>
                  <img class='img-fluid img-centered' src='img/daftar.png' alt='' height='100' width='300'/>
                  <p >Untuk Melakukan Pendaftaran Ikuti Langkah Berikut :
                    <ol class='text-left'>
                      <li>Pilih Menu Daftar</li>
                      <li>Isikan Form yang Tersedia Dengan Data yang Benar.</li>
                      <li>Jika Sudah Silahkan Klik Send.</li>
                      <li>Untuk Melakukan Login Gunakan Username dan Password yang telah dibuat tadi. </li>
                    </ol>
                  </p>
                  <button class='btn btn-success' type='button' data-dismiss='modal'>
                    <i class='fa fa-times'></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class='portfolio-modal modal fade' id='petunjuk2' tabindex='-1' role='dialog' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='close-modal' data-dismiss='modal'>
            <div class='lr'>
              <div class='rl'></div>
            </div>
          </div>
          <div class='container'>
            <div class='row'>
              <div class='col-lg-8 mx-auto'>
                <div class='modal-body'>
                  <h2>LOGIN</h2>
                  <hr class='star-primary'>
                  <img class='img-fluid img-centered' src='img/login.png' alt='' height='100' width='300'>
                  <p >Untuk Melakukan Login Ikuti Langkah Berikut :
                    <ol class='text-left'>
                      <li>Pilih Menu Login.</li>
                      <li>Masukkan Username Dan Password.</li>
                      <li>Klik Login.</li>
                    </ol>
                  </p>
                  <button class='btn btn-success' type='button' data-dismiss='modal'>
                    <i class='fa fa-times'></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class='portfolio-modal modal fade' id='petunjuk3' tabindex='-1' role='dialog' aria-hidden='true'>
      <div class='modal-dialog' role='document'>
        <div class='modal-content'>
          <div class='close-modal' data-dismiss='modal'>
            <div class='lr'>
              <div class='rl'></div>
            </div>
          </div>
          <div class='container'>
            <div class='row'>
              <div class='col-lg-8 mx-auto'>
                <div class='modal-body'>
                  <h2>BOOKING</h2>
                  <hr class='star-primary'>
                  <img class='img-fluid img-centered' src='img/login.png' alt='' height='100' width='300'>
                  <p >Untuk Melakukan Booking Ikuti Langkah Berikut :
                    <ol class='text-left'>
                      <li>User Harus Login Terlebih Dahulu.</li>
                      <li>Untuk Melakukan Booking No Antrean, Klik Tombol 'Ambil Antrian'.</li>
                      <li>User akan dialihkan ke Menu Antrian, Menu ini berisi form untuk membooking antrian.</li>
                      <li>Silahkan isi form sesuai keluhan anda</li>
                      <li>Jika Sudah, Klik Tombol Booking.</li>
                    </ol>
                  </p>
                  <button class='btn btn-success' type='button' data-dismiss='modal'>
                    <i class='fa fa-times'></i>
                    Close
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  ";
}
    