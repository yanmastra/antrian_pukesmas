<?php
if(!isset($_page_key)){
	include '../process/connection.php';
	location(currentPath().'?warning=Anda harus melalui halaman ini!');
}
?>
<div class='row'>
	<div class='col-lg-12'>
		<div class='page-header row'>
			<div class='col-sm-6'>
				<h5>Tangani Antrian </h5>
			</div>
			<div class='col-sm-6'>
				<?php 
				if(isset($_GET['warning']) && isset($_GET['message'])){
					echo "
	            <div class='alert alert-success alert-dismissable' style='position:absolute; top:-10px; right:20px; z-index:5'>
	            	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	            	<h3>".$_GET['warning']."</h3>
	            	<em>".$_GET['message']."</em>
	            </div>";
				}
				?>
			</div>
		</div>
	</div>
</div>
<div class='row'>
	<div class='col-lg-12'>
		<div class='panel panel-default'>
			<div class='panel-heading'>
				<span>Antrian Aktif</span>
			</div>
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
					<tbody id='tb_body_antrian'>
						<?php 
							$db = getConnection();
							$ss = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'ngantre' LIMIT 0,10");
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
							<td width='180'>
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&peg_id=".$resUser->no_pegawai."&status=tangani' class='btn btn-primary btn-sm'>
									<i class='fa fa-check fa-fw'></i>
								</a>
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&status=belum_datang' class='btn btn-danger btn-sm'>
									Belum Datang ?
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
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&peg_id=".$resUser->no_pegawai."&status=tangani' class='btn btn-primary btn-outline btn-xs'>
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