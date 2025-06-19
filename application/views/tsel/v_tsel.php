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
						<li class="breadcrumb-item active" aria-current="page">Tsel</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<!--begin::App Content-->
	<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
		<!-- Search form -->
		<form action="<?= base_url('tsel'); ?>" method="get" class="d-flex me-2 mb-2">
			<div class="input-group">
				<span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
				<input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Search" value="<?= $this->input->get('keyword'); ?>">
				<button class="btn btn-primary" type="submit">Cari</button>
			</div>
		</form>


		<!-- Action buttons -->
		<!-- Action buttons -->
		<div class="d-flex flex-wrap gap-2 mb-2">
			<a href="<?= base_url('tsel/add'); ?>" class="btn btn-primary">
				<i class="fas fa-plus-circle"></i> Tambah
			</a>

			<form action="<?= base_url('tsel/upload_excel'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
				<input type="file" name="file_excel" accept=".xls,.xlsx" class="form-control" required style="max-width: 250px;">
				<button type="submit" class="btn btn-success">
					<i class="fas fa-file-upload"></i> Upload CSV
				</button>
			</form>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary">
				<div class="card-header">Tsel</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead class="table-light text-center align-middle">
								<tr>
									<th>No</th>
									<th>ND INET</th>
									<th>NCLI INET</th>
									<th>Flag HVC</th>
									<th>Regional</th>
									<th>Witel</th>
									<th>Datel NCX</th>
									<th>STO</th>
									<th>CDATEL</th>
									<th>ND POTS</th>
									<th>CWITEL</th>
									<th>ODC</th>
									<th>ODP</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($tsel)) : ?>
									<?php $no = 1;
									foreach ($tsel as $p) : ?>
										<tr class="text-center align-middle">
											<td><?= $no++; ?></td>
											<td><?= $p->nd_inet; ?></td>
											<td><?= $p->ncli_inet; ?></td>
											<td><?= $p->flag_hvc; ?></td>
											<td><?= $p->reg; ?></td>
											<td><?= $p->witel; ?></td>
											<td><?= $p->datel_ncx; ?></td>
											<td><?= $p->sto; ?></td>
											<td><?= $p->cdatel; ?></td>
											<td><?= $p->nd_pots; ?></td>
											<td><?= $p->cwitel; ?></td>
											<td><?= $p->odc; ?></td>
											<td><?= $p->odp; ?></td>
											<td>
												<div class="d-inline-flex gap-1">
													<a href="<?= base_url('tsel/edit/' . $p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" data-href="<?= base_url('tsel/delete/' . $p->id); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
												</div>
											</td>

										</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr>
										<td colspan="14" class="text-center">Tidak ada data pelanggan.</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div> <!-- end table-responsive -->
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
</main>