<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Jadwal Operasi</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<!--begin::App Content-->
	<div class="container-fluid mt-3">
		<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
			<!-- Search form -->
			<form method="get" action="<?= base_url('jadwal'); ?>" class="mb-2 d-flex align-items-center" style="gap: 8px;">
				<div class="input-group" style="min-width: 260px; height: 32px;">
					<span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
					<input type="text" name="keyword" class="form-control form-control-sm" placeholder="Search" value="<?= $this->input->get('keyword'); ?>">
				</div>
				<button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
			</form>

			<!-- Button Tambah & Upload CSV -->
			<div class="d-flex align-items-center flex-wrap gap-2">
				<a href="<?= base_url('jadwal/add'); ?>" class="btn btn-primary" style="margin-right: 10px;">
					<i class="fas fa-plus-circle"></i> Tambah
				</a>
				<form action="<?= base_url('jadwal/uploadCsv'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
					<input type="file" name="csv_file" accept=".csv" class="form-control" required style="max-width: 250px;  margin-right: 10px;">
					<button type="submit" class="btn btn-success">
						<i class="fas fa-file-upload"></i> Upload CSV
					</button>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="card card-primary">
					<div class="card-header">Data Jadwal</div>
					<div class="card-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>NIK Teknisi</th>
									<th>Nama Teknisi</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($jadwal)) : ?>
									<?php $no = 1;
									foreach ($jadwal as $row) : ?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td><?= $row->nik ?></td>
											<td><?= $row->nama_teknisi ?></td>
											<td><?= $row->tgl ?></td>
											<td><?= $row->status ?></td>
											<td class="text-center">
												<a href="<?= base_url('jadwal/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
												<a href="<?= base_url('jadwal/delete/' . $row->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr>
										<td colspan="6" class="text-center">Tidak ada data jadwal.</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>