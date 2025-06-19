<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Unspec</li>
					</ol>
				</div>
			</div>
			<!--end::Row-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::App Content Header-->
	<!--begin::App Content-->
	<div class="app-content">
		<!--begin::Container-->
		<div class="container-fluid">
			<!--begin::Row-->
			<div class="row mb-3">
				<div class="col-lg-3">
					<a href="<?= base_url('uslis/add'); ?>" class="btn btn-primary">Tambah</a>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-primary">
						<div class="card-header">
							Uslis
						</div>
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Nama STO</th>
										<th>NON WARRANTY</th>
										<th>WARRANTY</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($uslis)) : ?>
										<?php $no = 1;
										foreach ($uslis as $p) : ?>
											<tr>
												<td class="text-center"><?= $no++; ?></td>
												<td class="text-center"><?= $p->nama; ?></td>
												<td class="text-center"><?= $p->nonwarranty; ?></td>
												<td class="text-center"><?= $p->warranty; ?></td>
												<td class="text-center">
													<a href="<?= base_url('uslis/edit/' . $p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" data-href="<?= base_url('uslis/delete/' . $p->id); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="5" class="text-center">Tidak ada data pelanggan.</td>
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
		<!--end::Container-->
	</div>
	<!--end::App Content-->
</main>