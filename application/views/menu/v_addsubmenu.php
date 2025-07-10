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
						<li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>">Menu</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('submenu'); ?>">Submenu</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Submenu</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!--end::App Content Header-->

	<!--begin::App Content-->
	<div class="app-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">
							Tambah Data Submenu
						</div>
						<div class="card-body">
							<form action="<?= base_url('submenu/add'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">Menu Induk</label>
									<select name="menu_id" class="form-control" required>
										<option value="">-- Pilih Menu --</option>
										<?php foreach ($menu as $m): ?>
											<option value="<?= $m['id']; ?>" <?= set_select('menu_id', $m['id']); ?>><?= $m['menu']; ?></option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger"><?= form_error('menu_id'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Title</label>
									<input type="text" name="title" class="form-control" value="<?= set_value('title'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('title'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">URL</label>
									<input type="text" name="url" class="form-control" value="<?= set_value('url'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('url'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Icon</label>
									<input type="text" name="icon" class="form-control" value="<?= set_value('icon'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('icon'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label"> Aktif? </label>
									<input type="checkbox" name="is_active" value="1" <?= set_checkbox('is_active', '1', TRUE); ?>>
								</div>

								<button type="submit" class="btn btn-primary">Tambah</button>
								<a href="<?= base_url('submenu'); ?>" class="btn btn-secondary">Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--end::Row-->
		</div>
	</div>
	<!--end::App Content-->
</main>