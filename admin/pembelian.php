<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>Data Pembelian</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="page-header float-right">
			<div class="page-title">
				<ol class="breadcrumb text-right">
					<li class="active">Data Pembelian</li>
				</ol>
			</div>
		</div>
	</div>
</div>
<h2>Data Pembelian</h2> <br>

<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>Pengaturan</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		$ambildata = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan ORDER BY tanggal_pembelian DESC");
		while ($ambil = $ambildata->fetch_assoc()) {
			?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $ambil['nama_pelanggan']; ?></td>
			<td><?= $ambil['tanggal_pembelian']; ?></td>
			<td><?= $ambil['status_pembelian']; ?></td>
			<td><?= $ambil['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?= $ambil['id_pembelian'] ?>" class="btn btn-info">Detail</a>
				<?php if($ambil['status_pembelian'] != 'Pending'): ?>
				<a href="index.php?halaman=pembayaran&id=<?= $ambil['id_pembelian']; ?>"
					class="btn btn-success">Pembayaran</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>