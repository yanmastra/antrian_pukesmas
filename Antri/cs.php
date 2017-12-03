<section id="daftar">
      <div class="container">
        <h2 class="text-center">DAFTAR</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate method="post" >
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Name Lengkap</label>
                  <input class="form-control" id="name" name="nama" type="text" placeholder="Nama Lengkap" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                
                <label>Username</label>
                 <input class="form-control" id="userid" type="text" name="username" placeholder="Username" required data-validation-required-message="Please enter your name.">
                   <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Email</label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Email Address" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Tempat Lahir</label>
                 <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required data-validation-required-message="Please enter your name.">
                   <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Nomor Telpon</label>
                  <input class="form-control" id="phone" name="no_telp" type="number" min="80" max="0899999999999" placeholder="Nomor Telpon" required data-validation-required-message="Please enter your phone number.">
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
					<input class="form-control" type="password" name="password" placeholder="Masukan Password" id="repasword">
					<p class="help-block text-danger"></p>
				</div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls">
					<input class="form-control" type="password" name="password2" placeholder="Konfirmasi Password" required data-validation-required-message="Please enter your phone number.">
					<p class="help-block text-danger"></p>
				</div>
             </div>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
