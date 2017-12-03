<?php
if(!isset($_page_key)){
	include '../process/connection.php';
	location(currentPath().'?warning=Anda harus melalui halaman ini!');
}
?>
<div class="row">
	<div class="col-lg-12">
		<div class="page-header">
			<img src="../data/icon-1.png" style="width: 100px; display: inline-block; padding: 8px">
			<span style="display: inline-block; vertical-align: bottom;">
				<h1><?php echo $subAplikasi; ?></h1>
			</span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-3x"> </i>
					</div>
					<div class="col-xs-9">
						<h3 class="pull-right">Tangani Antrian</h3>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<ol>
					<?php
						if(isLoged()){
							$db = getConnection();
							$ss = $db->query("SELECT * FROM antrian_aktif WHERE 1");
							while($res = $ss->fetch(PDO::FETCH_ASSOC)){
								echo "
								<li>".$res['Nama Lengkap'].", ".$res['Keluhan']."</li>";
							}
						}
					?>
				</ol>
			</div>
			<a href="antrian.php">
				<div class="panel-footer">
					<span class="pull-left"><?php echo $ss->rowCount(); ?> pasien mengantri </span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-history fa-3x"> </i>
					</div>
					<div class="col-xs-9">
						<h3 class="pull-right">Riwayat Antrian</h3>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<ol>
				<?php 
				for($i=0; $i<7; $i++){
					echo "<li> Story pasien $i </li>";
				}
				?>
				</ol>
			</div>
			<a href="antrian.php">
				<div class="panel-footer">
					<span class="pull-left"> 7 lebih pasien baru </span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-4 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-history fa-3x"> </i>
					</div>
					<div class="col-xs-9">
						<h3 class="pull-right">Tambah Antrian</h3>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<ol>
				<?php 
				for($i=0; $i<7; $i++){
					echo "<li> Story pasien $i </li>";
				}
				?>
				</ol>
			</div>
			<a href="antrian.php">
				<div class="panel-footer">
					<span class="pull-left"> 7 lebih pasien baru </span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>