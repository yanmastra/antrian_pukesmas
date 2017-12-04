
<div class="modal fade" id="modal-add-antrian" tabindex="-1" role='dialog' aria-labelledby='ModalAntrianLabel' aria-hidden='true'>
	<div class="modal-dialog row">
		<div class='modal-content  col-sm-8 col-xs-10 col-sm-offset-2 col-xs-offset-1'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='ModalAntrianLabel'>Tambahkan Antrian</h4>
			</div>
			<form action='../process/booking.php?from=pegawai' method='post' id="form-antrian">
				<div class='modal-body'>
					<div class='form-group'>
						<label>
							<i class='fa fa-user fa-fw'> </i>
							Username 
						</label>
						<input type='text' name='username' class='form-control' placeholder="Username pasien..." required>
					</div>
					<div class='form-group'>
						<label>
							<i class='fa fa-plus-square fa-fw'></i> 
							Keluhan
						</label>
						<input type='text' name='keluhan' class='form-control' placeholder="Keluhan pasien..." required>
					</div>
				</div>
				<div class='modal-footer'>
					<div class='text-right'>
						<button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times fa-fw'></i> Close </button>
						<button type='submit' class='btn btn-primary' name='submit'>
							<i class='fa fa-check fa-fw'></i>
							Sumbit
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>