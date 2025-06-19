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
						<li class="breadcrumb-item"><a href="<?= base_url('uslis'); ?>">Uslis</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Uslis</li>
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
			<div class="row">
				<div class="col-lg-12">
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">
							Tambah Uslis
						</div>
						<div class="card-body">
							<form action="<?= base_url('uslis/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">Nama STO</label>
									<input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('nama'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">NON WARRANTY</label>
									<input type="text" name="nonwarranty" class="form-control" value="<?= set_value('nonwarranty'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('nonwarranty'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">WARRANTY</label>
									<input type="text" name="warranty" class="form-control" value="<?= set_value('warranty'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('warranty'); ?></span>
								</div>
								<button type="submit" class="btn btn-primary">Tambah</button>
								<a href="<?= base_url('uslis'); ?>" class="btn btn-secondary">Cancel</a>
							</form>
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