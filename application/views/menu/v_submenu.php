<main class="app-main">
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>">Menu</a></li>
						<li class="breadcrumb-item active" aria-current="page">Submenu</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="main-content col ps-0">
		<div class="p-2 pt-0">
			<h1 class="mb-2">Submenu Management</h1>
			<!-- Tombol dan Search -->
			<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-3">
				<!-- Search di kiri -->
				<form method="get" action="<?= base_url('menu/submenu'); ?>" class="d-flex align-items-center" style="gap: 8px;">
					<div class="d-flex align-items-center border rounded px-2" style="min-width: 220px; height: 32px; background-color: white;">
						<i class="fas fa-search text-muted"></i>
						<input type="text" name="keyword" class="form-control form-control-sm border-0 shadow-none" placeholder="Search" value="<?= $this->input->get('keyword'); ?>" style="font-size: 14px; padding-left: 10px;">
					</div>
					<button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
				</form>
				<!-- Tombol di kanan -->
				<div class="d-flex flex-wrap mb-2">
					<a href="<?= base_url('submenu/add'); ?>" class="btn btn-primary me-2">
						<i class="fas fa-plus-circle"></i> Tambah Submenu
					</a>
					<a href="<?= base_url('menu'); ?>" class="btn btn-info">
						<i class="fas fa-list"></i> Menu
					</a>
				</div>
			</div>
			<!-- End Tombol dan Search -->

			<div class="card card-primary">
				<div class="card-header">Data Submenu</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Menu</th>
									<th>Title</th>
									<th>URL</th>
									<th>Icon</th>
									<th>Active</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($submenu as $sm): ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $sm['menu']; ?></td>
										<td><?= $sm['title']; ?></td>
										<td><?= $sm['url']; ?></td>
										<td><?= $sm['icon']; ?></td>
										<td><?= $sm['is_active'] ? 'Aktif' : 'Tidak'; ?></td>
										<td>
											<a href="<?= base_url('submenu/edit/' . $sm['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
											<a href="<?= base_url('submenu/delete/' . $sm['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus submenu?')">Hapus</a>
										</td>
									</tr>
								<?php endforeach; ?>
								<?php if (empty($submenu)): ?>
									<tr>
										<td colspan="7" class="text-center">Tidak ada data.</td>
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