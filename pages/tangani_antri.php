<?php
if(!isset($_page_key)){
	include '../process/connection.php';
	location(currentPath().'?warning=Anda harus melalui halaman ini!');
}
?>
<div class='row'>
	<div class='col-lg-12'>
		<div class='page-header row'>
			<div class='col-sm-12'>
				<span><b>Tangani Antrian</b></span>
				<span id="time" class='pull-right'></span>
<?php
if(isset($_GET['warning']) && isset($_GET['message'])){
	echo "
        <div class='alert alert-success alert-dismissable alert-sm' style='position:absolute; top:-20px; right:20px; z-index:1'>
	       	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        	<h5>".$_GET['warning']."</h5>
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
						<tr>
						<th>Username</th>
						<th>Nomor Antrian</th>
						<th>NIK</th>
						<th>Keluhan</th>
						<th>Tanggal Masuk</th>
						<th>Tangani</th>
						</tr>
					</thead>
					<tbody id='tb_antrian'>
						<?php 
							$db = getConnection();
							$ss = $db->query("SELECT * FROM antrian_aktif WHERE Status = 'ngantre' LIMIT 0,10");
							$i = 1;
							while($res = $ss->fetch(PDO::FETCH_ASSOC)){
								if($i==1){
									echo "
						<tr class='success'>
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
							<td>".$res['Username']."</td>
							<td>".$res['Nomor Antrian']."</td>
							<td>".$res['NIK']."</td>
							<td>".$res['Keluhan']."</td>
							<td>".$res['Tanggal Masuk']."</td>
							<td>
								<a href='../process/tangani.php?id=".$res['Nomor Antrian']."&peg_id=".$resUser->no_pegawai."&status=tangani' class='btn btn-primary btn-outline btn-xs'>
									Tangani sekarang ?
								</a>
							</td>
						</tr>";
								}
								$i++;
							}
?>						
					</tbody>
				</table>
				<p id='blank_info'></p>
			</div>
		</div>
	</div>
</div>
<script>
	function getData(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				var myObj = JSON.parse(this.responseText);
					document.getElementById("tb_antrian").innerHTML = '';
				for(var i in myObj){
					var n = i+1;
					if(n==1){
						document.getElementById('tb_antrian').innerHTML += "<tr class='success'><td>"+myObj[i].username+"</td><td>"+myObj[i].no_antrian+"</td><td>"+myObj[i].nik+"</td><td>"+myObj[i].keluhan+"</td><td>"+myObj[i].tgl_masuk+"</td><td width='180'><a href='../process/tangani.php?id="+myObj[i].no_antrian+"&peg_id="+<?php echo "'".$resUser->no_pegawai."'";?>+"&status=tangani' class='btn btn-primary btn-sm'><i class='fa fa-check fa-fw'> </i></a> <a href='../process/tangani.php?id="+myObj[i].no_antrian+"&status=belum_datang' class='btn btn-danger btn-sm'>Belum Datang ?</a></td></tr>";
					}else{
						document.getElementById('tb_antrian').innerHTML += "<tr class='warning'><td>"+myObj[i].username+"</td><td>"+myObj[i].no_antrian+"</td><td>"+myObj[i].nik+"</td><td>"+myObj[i].keluhan+"</td><td>"+myObj[i].tgl_masuk+"</td><td width='180'><a href='../process/tangani.php?id="+myObj[i].no_antrian+"&peg_id="+<?php echo "'".$resUser->no_pegawai."'";?>+"&status=tangani' class='btn btn-primary btn-outline btn-xs'>Tangani sekarang ?</a></td></tr>";
					}
				}
			}
		};
		xmlhttp.open("GET", "../process/json-provider.php?req=antrian_aktif", true);
		xmlhttp.send();
	}

	function displayTime(a){
	    var time = new Date();
	    var dis = time.toLocaleTimeString();
	    var tgl = <?php echo "'".date("Y-m-d")."'"; ?>;
	    document.getElementById(a).innerHTML= tgl+ " "+dis;
	}
	setInterval(function(){
		getData();
		displayTime('time');
	},1000);
</script>