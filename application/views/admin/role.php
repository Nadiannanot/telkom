<main class="app-main">
	<!-- Header -->
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Role</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<!-- Content -->
	<div class="app-content">
		<div class="container-fluid">

			<?php if ($form_mode == 'list') : ?>
				<!-- List Data Role -->
				<div class="d-flex justify-content-between align-items-center mb-3">
					<form method="get" action="<?= base_url('role'); ?>" class="d-flex align-items-center" style="gap: 8px;">
						<div class="d-flex align-items-center border rounded px-2" style="min-width: 260px; height: 32px; background-color: white;">
							<i class="fas fa-search text-muted"></i>
							<input type="text" name="keyword" class="form-control form-control-sm border-0 shadow-none" placeholder="Search" value="<?= $this->input->get('keyword'); ?>" style="font-size: 14px; padding-left: 10px;">
						</div>
						<button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
					</form>

					<a href="<?= base_url('admin/addRole'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
				</div>

				<div class="card card-primary">
					<div class="card-header">Data Role</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr class="text-center">
										<th>No</th>
										<th>Role</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($role)) : ?>
										<?php $no = 1;
										foreach ($role as $r) : ?>
											<tr class="text-center">
												<td><?= $no++; ?></td>
												<td><?= $r['role']; ?></td>
												<td>
													<!-- Tombol Access (Hijau) -->
													<a href="<?= base_url('admin/roleaccess/' . $r['id']); ?>" class="btn btn-success btn-sm">Access</a>

													<!-- Tombol Edit -->
													<a href="<?= base_url('admin/editRole/' . $r['id']); ?>" class="btn btn-warning btn-sm">Edit</a>

													<!-- Tombol Hapus -->
													<a href="<?= base_url('admin/deleteRole/' . $r['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>

												</td>
											</tr>
										<?php endforeach; ?>
									<?php else : ?>
										<tr>
											<td colspan="3" class="text-center">Tidak ada data.</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			<?php elseif ($form_mode == 'add' || $form_mode == 'edit') : ?>
				<!-- Form Add / Edit -->
				<div class="card mb-4">
					<div class="card-header bg-primary text-white">
						<?= ($form_mode == 'add') ? 'Tambah Data Role' : 'Edit Role'; ?>
					</div>
					<div class="card-body">
						<form action="<?= ($form_mode == 'add') ? base_url('admin/addRole') : base_url('admin/editRole/' . $menu['id']); ?>" method="POST">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
							<?php if ($form_mode == 'edit') : ?>
								<input type="hidden" name="id" value="<?= $menu['id']; ?>">
							<?php endif; ?>

							<div class="mb-3">
								<label for="role" class="form-label">Role</label>
								<input type="text" id="role" name="role" class="form-control" value="<?= ($form_mode == 'edit') ? set_value('role', $menu['role']) : set_value('role'); ?>" autocomplete="off">
								<small class="text-danger"><?= form_error('role'); ?></small>
							</div>

							<button type="submit" class="btn btn-primary"><?= ($form_mode == 'add') ? 'Tambah' : 'Simpan'; ?></button>
							<a href="<?= base_url('admin/role'); ?>" class="btn btn-secondary">Cancel</a>
						</form>
					</div>
				</div>
			<?php endif; ?>

		</div>
	</div>
</main>