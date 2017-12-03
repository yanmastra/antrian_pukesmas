    <!-- About Section -->
    <section id="masuk">
      <div class="container">
        <h2 class="text-center">Masuk</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-md-4 mx-auto">
            <?php if(isset($_GET['login'])){echo $_GET['login'];} ?>
            <form name="login" id="loginForm" method="post" action="../process/login.php?from='pasien'">
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Username</label>
                    <input class="form-control" id="username" name="username" type="text" placeholder="Username" required data-validation-required-message="Please enter your username.">
                   <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                  <label>Password</label>
                   <input class="form-control" id="password" type="password" name="password" placeholder="Password" required data-validation-required-message="Please enter your password.">
                   <p class="help-block text-danger"></p>
                  </div>
                </div>
                <br>
                <div class="form-group text-center">
                  <button type="submit" class="btn btn-success btn-lg" id="sendMessageButton">
                    <i class="fa fa-sign-in fa-fw"> </i>
                    MASUK
                  </button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </section>