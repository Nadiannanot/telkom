<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0">Daftar Order</h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Order</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="app-content">
		<div class="container-fluid">
			<div class="row mb-3">
				<div class="col-lg-3 mb-2">
					<a href="<?= base_url('order/tambah') ?>" class="btn btn-primary btn-sm">+ Tambah Order</a>
				</div>
				<div class="col-lg-9">
					<div class="d-flex justify-content-end flex-wrap ">
						<!-- Form Pencarian -->
						<form method="get" action="<?= base_url('order'); ?>" class="mb-2 d-flex align-items-center" style="gap: 8px;">
							<div class="input-group" style="min-width: 260px; height: 32px;">
								<span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
								<input type="text" name="q" class="form-control form-control-sm" placeholder="Search" value="<?= $this->input->get('q'); ?>">
							</div>
							<button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
						</form>

						<!-- Form Upload CSV -->
						<form method="post" action="<?= base_url('order/uploadCsv'); ?>" enctype="multipart/form-data" class="d-flex flex-wrap align-items-center gap-2 mb-2">
							<input type="file" name="csv_file" accept=".csv" class="form-control form-control-sm" style="max-width: 200px;">
							<button type="submit" class="btn btn-success btn-sm" style="height: 32px;">Upload CSV</button>
						</form>
					</div>
				</div>
			</div>

			<!-- Tabel -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">Daftar Order</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>No Ticket</th>
										<th>Service No</th>
										<th>Reported Date</th>
										<th>Closed Date</th>
										<th>NIK Teknisi</th>
										<th>Jenis Order</th>
										<th>Segmentasi</th>
										<th>Sektor</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($order)) : ?>
										<?php $no = 1;
										foreach ($order as $row) : ?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td><?= $row->no_ticket ?></td>
												<td><?= $row->service_no ?></td>
												<td><?= $row->reported_date ?></td>
												<td><?= $row->closed_date ?></td>
												<td><?= $row->nik_teknisi ?></td>
												<td><?= $row->jenis_order ?></td>
												<td><?= $row->segmentasi ?></td>
												<td><?= $row->sektor ?></td>
												<td class="text-center">
													<div class="btn-group">
														<a href="<?= base_url('order/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
														<a href="<?= base_url('order/delete/' . $row->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="10" class="text-center">Tidak ada data order.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div>
			</div>
		</div>
	</div>
</main>