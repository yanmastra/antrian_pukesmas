<?php
if (isset($_page_key)) {
	$hdb = getConnection();

	$data = $hdb->prepare("SELECT * FROM dt_pasien WHERE username = ? ");
	$data->execute(array($_COOKIE['username']));
	$res_data = $data->fetch(PDO::FETCH_OBJ);
	if(isHaveBook()){
		$msg = "Anda telah mengambil antrian! Klik lihat antrian untuk melihat";
		$tombol = "Lihat Antrian";
	}else{
		$msg = "";
		$tombol = "Ambil Antrian";
	}
}else{
	include '../process/connection.php';
	location('users/');
}

?>

<style type="text/css">
	.btn-ambil-antrian{
		margin:auto;
		display: block;
		font-family: 'Tahoma', sans-serif;
		font-weight: 700;
		font-size: 24px;
		background-color: transparent;
		border:3px solid #fff;
		color: #fff;
		padding: 40px 60px;
		vertical-align: middle;
	}
	.btn-ambil-antrian:hover{
		background-color: #FFF;
		border:3px solid #18bc9c;
		outline: 6px solid #fff;
		padding: 40px 60px;
		color: #18bc9c;
		text-decoration: none;
	}
	.a-ambil-antrian{
		display: block;
		margin: 20px auto;
		text-decoration: none;
		vertical-align: middle;
	}
	.a-ambil-antrian:hover{
		text-decoration: none;
	}
	.value-data-user{
		font-size: 18px; 
		font-style: bold; 
		font-weight: 700; 
		margin-left: 12px; 
		display: block;
	}
</style>
 <header class="masthead">
	<div class="container">
		<div class="row">
         <div class="col-lg-6">
         	<div class="row">
         		<div class="col-lg-12 text-left">
					<span style="font-family: sans-serif; font-size: 18px; font-weight: 700">
						<?php echo $_COOKIE['username']; ?>
					</span>
					<a href="#" class="pull-right">
						<button type="button" class="btn btn-warning btn-sm">
							<i class="fa fa-edit fa-fw"></i>
							Edit
						</button>
					</a>
         		</div>
         	</div>
			<div class="row text-left"  style="border-bottom: 1px solid #fff; vertical-align: bottom;">
				<div class="col-md-3" style="margin-top: 8px">
					NIK
				</div>
				<div class="col-md-9" style="vertical-align: bottom;">
					<span class="value-data-user">
						<?php echo $res_data->nik; ?>
					</span>
				</div>
			</div>
			<div class="row text-left"  style="border-bottom: 1px solid #fff; vertical-align: bottom;">
				<div class="col-md-3" style="margin-top: 8px">
					Nama
				</div>
				<div class="col-md-9" style="vertical-align: bottom;">
					<span class="value-data-user">
						<?php echo $res_data->nama_lengkap; ?>
					</span>
				</div>
			</div>
			<div class="row text-left"  style="border-bottom: 1px solid #fff; vertical-align: bottom;">
				<div class="col-md-3" style="margin-top: 8px">
					Tempat Lahir
				</div>
				<div class="col-md-9" style="vertical-align: bottom;">
					<span class="value-data-user">
						<?php echo $res_data->tempat_lahir; ?>
					</span>
				</div>
			</div>
			<div class="row text-left"  style="border-bottom: 1px solid #fff; vertical-align: bottom;">
				<div class="col-md-3" style="margin-top: 8px">
					Tanggal Lahir
				</div>
				<div class="col-md-9" style="vertical-align: bottom;">
					<span class="value-data-user">
						<?php echo $res_data->tgl_lahir; ?>
					</span>
				</div>
			</div>
			<div class="row text-left"  style="border-bottom: 1px solid #fff; vertical-align: bottom;">
				<div class="col-md-3" style="margin-top: 8px">
					Alamat
				</div>
				<div class="col-md-9" style="vertical-align: bottom;">
					<span class="value-data-user">
						<?php echo $res_data->alamat; ?>
					</span>
				</div>
			</div>
			<div class="row text-left"  style="border-bottom: 1px solid #fff; vertical-align: bottom;">
				<div class="col-md-3" style="margin-top: 8px">
					Telp
				</div>
				<div class="col-md-9" style="vertical-align: bottom;">
					<span class="value-data-user">
						<?php echo $res_data->no_telp; ?>
					</span>
				</div>
			</div>
          </div>
          <div class="col-lg-6">
          	<div class="container">
          		<span>
          			<?php echo $msg; ?>
          		</span>
	          	<a href="?page=booking" class="a-ambil-antrian">
	          		<button class="btn-ambil-antrian">
	          			<?php echo $tombol; ?>
	          		</button>
	          	</a>
          	</div>
          </div>
        </div>
	</div>
</header>