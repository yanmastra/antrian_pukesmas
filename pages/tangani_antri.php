<div class='row'>
	<div class='col-lg-12'>
		<div class='page-header'>
			<h5>Tangani Antrian</h5>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class='panel panel-default'>
			<div class='panel-body' style='overflow: auto;'>
				<table class='table table-striped table-bordered table-hover table-resposive' id='table-antrian'>
					<thead>
						<th>No</th>
						<th>Username</th>
						<th>Nomor Antrian</th>
						<th>NIK</th>
						<th>Keluhan</th>
						<th>Tanggal Masuk</th>
						<th>Tangani</th>
					</thead>
					<tbody>
						<?php 
							$db = getConnection();
							$ss = $db->query("SELECT * FROM antrian_aktif WHERE 1 LIMIT 0,10");
							$i = 1;
							while($res = $ss->fetch(PDO::FETCH_ASSOC)){
								if($i==1){
									echo "
							<tr class='success'>
							<td>$i</td>
							<td>".$res['Username']."</td>
							<td>".$res['Nomor Antrian']."</td>
							<td>".$res['NIK']."</td>
							<td>".$res['Keluhan']."</td>
							<td>".$res['Tanggal Masuk']."</td>
							<td>
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&status=tangani' class='btn btn-primary btn-sm'>
									Tertangani
								</a>
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&status=belum_datang' class='btn btn-danger btn-sm'>
									Belum Datang
								</a>
							</td>
						</tr>";
								}else{
									echo "
						<tr class='warning'>
							<td>$i</td>
							<td>".$res['Username']."</td>
							<td>".$res['Nomor Antrian']."</td>
							<td>".$res['NIK']."</td>
							<td>".$res['Keluhan']."</td>
							<td>".$res['Tanggal Masuk']."</td>
							<td>
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&status=tangani_sekarang' class='btn btn-warning btn-outline btn-xs'>
									Tangani Sekarang
								</a>
							</td>
						</tr>";
								}
								$i++;
							}
?>						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>