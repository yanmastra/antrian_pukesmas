
<section id="riwayat">
	<div class="container">
		<div class="row">
			<div class="col-md-8 mx-auto">
				<h3 class="text-center">RIWAYAT</h3>
				<hr class="star-primary">
				<?php if(isLoged()){
					$db = getConnection();
					$ss = $db->query("SELECT * FROM riwayat_antrian WHERE `Username Pasien` = '".$_COOKIE['username']."'");
					if($ss->rowCount()>0){
						$i = 1;
						echo "
				<table class='table table-dark table-striped  table-bordered table-hover table-responsive-lg' width='100%' id='dataTable'>
					<thead>
						<tr>
							<th>No</th>
							<th>Id Antrian</th>
							<th>Tanggal/waktu</th>
							<th>Keluhan</th>
						</tr>
					</thead>
					<tbody>";
						while ($res = $ss->fetch(PDO::FETCH_ASSOC)) {
							echo "
						<tr>
							<td>$i</td>
							<td>".$res['Nomor Antrian']."</td>
							<td>".$res['Tanggal Keluar']."</td>
							<td>".$res['Keluhan']."</td>
						</tr>";
							$i++;
						}
						echo "
					</tbody>
				</table>";
					}else{
						echo "<p class='text-center'><em>Anda belum pernah berobat ke Puskesmas ini!</em></p>";
					}
				}
				?>
			</div>
		</div>
	</div>
</section>