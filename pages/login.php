<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<center>
			<?php
			if(isset($_GET['login'])){
				echo "<h3>".$_GET['login']."</h3>
			<p> Silahkan lakukan login sekali lagi</p>";
			}else{
				echo "<h3> Anda belum melakukan login </h3>
			<p> Silahkan lakukan login </p>";
			}
			?>
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-login">
				<i class="fa fa-sign-in fa-fw"> </i>
				Login
			</button>
		</center>
	</div>
</div>


<div class="modal fade" id="modal-login" tabindex="-1" role='dialog' aria-labelledby='ModalLoginLabel' aria-hidden='true'>
	<div class="modal-dialog row">
		<div class='modal-content  col-sm-8 col-xs-10 col-sm-offset-2 col-xs-offset-1'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='ModalLoginLabel'>Form Login</h4>
			</div>
			<form action='../process/login.php?from=pegawai' method='post' id="form-login">
				<div class='modal-body'>
					<div class='form-group'>
						<div class='input-group'>
							<span class='input-group-btn'>
								<span class='btn btn-default'>
									<i class='fa fa-user fa-fw'> </i>
								</span>
							</span>
							<input type='text' name='username' class='form-control' placeholder="Username..." required>
						</div>
					</div>
					<div class='form-group'>
						<div class='input-group'>
							<span class='input-group-btn'>
								<span class='btn btn-default'>
									<i class='fa fa-key fa-fw'></i>
								</span>
							</span>
							<input type='password' name='password' class='form-control' placeholder="Password..." required>
						</div>
					</div>
					<div class='checkbox'>
						<label> 
							<input type='checkbox' name='savelogin' value='1'>Biarkan tetap login ? 
						</label>
					</div>
				</div>
				<div class='modal-footer'>
					<div class='text-right'>
						<button type='button' class='btn btn-default' data-dismiss='modal'> Close </button>
						<button type='submit' class='btn btn-primary' name='login'>
							<i class='fa fa-sign-in fa-fw'></i> 
							Login
						</button>
					</div>
				</div>
			</form>
			
		</div>
	</div>
</div>