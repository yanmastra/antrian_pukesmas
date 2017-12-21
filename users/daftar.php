    <!-- Contact Section -->
    <section id="daftar">
      <div class="container">
        <h2 class="text-center">DAFTAR</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <?php if(isset($_GET['daftar'])){echo $_GET['daftar'];} ?>
            <form method="post" action="../process/daftar.php" id="daftarForm">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Name Lengkap</label>
                  <input class="form-control" id="name" name="nama" type="text" placeholder="Nama Lengkap" required data-validation-required-message="Harap masukan nama lengkap anda.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Username</label>
                  <input class="form-control" id="userid" type="text" name="username" placeholder="Username" required data-validation-required-message="Harap masukan nama user untuk masuk/login.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email</label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Email" data-validation-required-message="Harap masukan email anda.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Tempat Lahir</label>
                 <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required data-validation-required-message="Harap masukan tempat lahir anda.">
                   <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Tanggal Lahir</label>
                 <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="text" placeholder="Tanggal Lahir dd/mm/yyyy" required data-validation-required-message="Harap tanggal tempat lahir anda.">
                   <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>NIK</label>
                  <input class="form-control" id="nik" name="nik" placeholder="NIK" required data-validation-required-message="Please enter a message.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Alamat</label>
                  <input class="form-control" id="alamat" name="alamat" placeholder="Alamat" data-validation-required-message="Harap masukan alamat tinggal anda.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Nomor Telepon</label>
                  <input class="form-control" id="phone" name="no_telp" type="number" min="80" max="0899999999999" placeholder="Nomor Telepon" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>

              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Password" id="repasword">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Confirm Password</label>
                  <input class="form-control" type="password" name="password2" placeholder="Konfirmasi Password" required data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group text-center">
                <button type="submit" name="submit_registrasi" class="btn btn-success btn-lg" style="margin: 8px">
                  <i class="fa fa-save fa-fw"></i>
                  DAFTAR
                </button>
                <button type="reset" class="btn btn-danger btn-lg" id="resetButton" style="font-weight: 700; margin: 8px"> 
                  <i class="fa fa-refresh fa-fw"></i>
                  ULANG
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
