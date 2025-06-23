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
						<li class="breadcrumb-item active" aria-current="page">Teknisi</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<!--begin::App Content-->
	<div class="app-content">
		<div class="container-fluid">
			<!-- Tombol tambah -->
			

            <!-- Fitur Atas -->
	<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
		<form action="<?= base_url('teknisi'); ?>" method="get" class="d-flex me-2 mb-2">
			<div class="input-group">
				<span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
				<input type="text" name="keyword" class="form-control" placeholder="Search" value="<?= $this->input->get('keyword'); ?>">
				<button class="btn btn-primary" type="submit">Cari</button>
			</div>
		</form>

		<div class="d-flex flex-wrap gap-2 mb-2">
			<a href="<?= base_url('teknisi/add'); ?>" class="btn btn-primary">
				<i class="fas fa-plus-circle"></i> Tambah
			</a>

			<form action="<?= base_url('teknisi/upload_excel'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
				<input type="file" name="file_excel" accept=".xls,.xlsx" class="form-control" required style="max-width: 250px;">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-file-upload"></i> Upload CSV
				</button>
			</form>
		</div>
	</div>

			<!-- Tabel Data -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">Data Teknisi</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>NIK</th>
										<th>Nama</th>
										<th>Sektor</th>
										<th>Jenis</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($teknisi)) : ?>
										<?php $no = 1;
										foreach ($teknisi as $t) : ?>
											<tr>
												<td class="text-center"><?= $no++; ?></td>
												<td><?= $t->nik_teknisi; ?></td>
												<td><?= $t->nama_teknisi; ?></td>
												<td><?= $t->sektor; ?></td>
												<td><?= $t->jenis; ?></td>
												<td><?= $t->status; ?></td>
												<td class="text-center">
													<div class="btn-group">
														<a href="<?= base_url('teknisi/edit/' . $t->nik_teknisi); ?>" class="btn btn-warning btn-sm">Edit</a>
														<a href="#" data-href="<?= base_url('teknisi/hapus/' . $t->nik_teknisi); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="7" class="text-center">Tidak ada data teknisi.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--end::Row-->
		</div>
	</div>
</main>
