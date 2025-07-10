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
						<li class="breadcrumb-item"><a href="<?= base_url('role'); ?>">Role</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Role</li>
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
							Tambah Data Role
						</div>
						<div class="card-body">
							<form action="<?= base_url('role/add'); ?>" method="POST">
								<!-- CSRF Protection -->
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
									value="<?= $this->security->get_csrf_hash(); ?>" />

								<!-- Input Role -->
								<div class="mb-3">
									<label for="role" class="form-label">Role</label>
									<input type="text" id="role" name="role" class="form-control"
										value="<?= set_value('role'); ?>" autocomplete="off">
									<small class="text-danger"><?= form_error('role'); ?></small>
								</div>

								<!-- Buttons -->
								<button type="submit" class="btn btn-primary">Tambah</button>
								<a href="<?= base_url('role'); ?>" class="btn btn-secondary">Cancel</a>
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
						<li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
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
							Edit role
						</div>
						<div class="card-body">
							<form action="<?= base_url('role/edit/' . $menu['id']); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $menu['id']; ?>">

								<div class="mb-3">
									<label class="form-label">Nama Menu</label>
									<input type="text" name="role" class="form-control" value="<?= set_value('menu', $menu['role']); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('role'); ?></span>
								</div>

								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?= base_url('role'); ?>" class="btn btn-secondary">Cancel</a>
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