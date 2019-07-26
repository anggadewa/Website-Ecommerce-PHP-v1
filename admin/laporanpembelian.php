<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Laporan Pembelian</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Laporan Pembelian</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<?php 
$semuadata = array();
$tgl_mulai = '-';
$tgl_selesai = '-';
if(isset($_POST['submit'])){
	$tgl_mulai = $_POST['tglmulai'];
	$tgl_selesai = $_POST['tglselesai'];
	$ambildata = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($ambil = $ambildata->fetch_assoc()){
		$semuadata[]=$ambil;
	}
}
 ?>
<h2>Laporan Pembelian Dari <?= $tgl_mulai ?> Hingga <?= $tgl_selesai ?></h2>
<hr>
<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tglmulai" class="form-control" value="<?= $tgl_mulai?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tglselesai" class="form-control" value="<?= $tgl_selesai?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="submit">Lihat</button>
		</div>
	</div>	
</form>

<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0; 
		$no = 1;
		foreach ($semuadata as $key => $value):
		$total += $value['total_pembelian'] ?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $value['nama_pelanggan']; ?></td>
			<td><?= $value['tanggal_pembelian']; ?></td>
			<td>Rp. <?= number_format($value['total_pembelian']); ?></td>
			<td><?= $value['status_pembelian']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?= number_format($total); ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>
