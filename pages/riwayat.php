<div class='row'>
	<div class='col-lg-12'>
		<br>
		<div class='panel panel-default'>
			<div class='panel-heading'>
				<h5>Data Riwayat Pasien</h5>
			</div>
			<div class='panel-body' style='overflow: auto;'>
				<table id='table-riwayat' class='table table-striped table-bordered table-hover table-responsive'>
					<thead>
						<tr>
							<th rowspan='2'>No</th>
							<th colspan='6' class='text-center success'>Identitas Pasien</th>
							<th colspan='2' class='text-center warning'>Yang Menangani</th>
						</tr>
						<tr>
							<th>Username</th>
							<th>Nama Lengkap</th>
							<th>Nomor Antrian</th>
							<th>Keluhan</th>
							<th>Tanggal Keluar</th>
							<th>Alamat</th>
							<th>Nama Pegawai</th>
							<th>Username </th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$db = getConnection();
							$ss = $db->query("SELECT * FROM riwayat_antrian");
							$i = 1;
						while($res = $ss->fetch(PDO::FETCH_ASSOC)){
							echo "
						<tr>
							<td>$i</td>
							<td class='success'>".$res['Username Pasien']."</td>
							<td class='success'>".$res['Nama Lengkap']."</td>
							<td class='success'>".$res['Nomor Antrian']."</td>
							<td class='success'>".$res['Keluhan']."</td>
							<td class='success'>".$res['Tanggal Keluar']."</td>
							<td class='success'>".$res['Alamat']."</td>
							<td class='warning'>".$res['Nama Pegawai']."</td>
							<td class='warning'>".$res['Username Pegawai']."</td>
						</tr>";
							$i++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>