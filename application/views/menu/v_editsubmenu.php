<main class="app-main">
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('submenu'); ?>">Submenu</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Submenu</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="app-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">Edit Data Submenu</div>
						<div class="card-body">
							<form action="<?= base_url('submenu/edit/' . $submenu['id']); ?>" method="POST">
								<input type="hidden" name="id" value="<?= $submenu['id']; ?>">
								<div class="mb-3">
									<label class="form-label">Menu Induk</label>
									<select name="menu_id" class="form-control" required>
										<option value="">-- Pilih Menu --</option>
										<?php foreach ($menu as $m): ?>
											<option value="<?= $m['id']; ?>" <?= $submenu['menu_id'] == $m['id'] ? 'selected' : ''; ?>><?= $m['menu']; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="mb-3">
									<label class="form-label">Title</label>
									<input type="text" name="title" class="form-control" value="<?= $submenu['title']; ?>" required>
								</div>
								<div class="mb-3">
									<label class="form-label">URL</label>
									<input type="text" name="url" class="form-control" value="<?= $submenu['url']; ?>" required>
								</div>
								<div class="mb-3">
									<label class="form-label">Icon</label>
									<input type="text" name="icon" class="form-control" value="<?= $submenu['icon']; ?>">
								</div>
								<div class="mb-3">
									<label class="form-label">Aktif?</label>
									<input type="checkbox" name="is_active" value="1" <?= $submenu['is_active'] ? 'checked' : ''; ?>>
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="<?= base_url('submenu'); ?>" class="btn btn-secondary">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>