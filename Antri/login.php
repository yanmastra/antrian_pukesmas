<section id="masuk">
      <div class="container">
        <h2 class="text-center">Masuk</h2>
        <hr class="star-primary">
        <div class="row">
          <div class="col-md-4 mx-auto">
            <form name="login" id="loginForm" novalidate>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                    <label>Username</label>
                    <input class="form-control" id="username" type="text" placeholder="Username" required data-validation-required-message="Please enter your username.">
                  </div>
                </div>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls">
                  <label>Password</label>
                   <input class="form-control" id="password" type="password" placeholder="Password" required data-validation-required-message="Please enter your password.">
                     <p class="help-block text-danger"></p>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-lg" id="sendMessageButton">Send</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </section>