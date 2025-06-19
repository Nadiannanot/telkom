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
						<li class="breadcrumb-item"><a href="<?= base_url('tsel'); ?>">Tsel</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Tsel</li>
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
							Tambah Tsel
						</div>
						<div class="card-body">
							<form action="<?= base_url('tsel/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">ND INET</label>
									<input type="text" name="nd_inet" class="form-control" value="<?= set_value('nd_inet'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('nd_inet'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">NCLI INET</label>
									<input type="text" name="ncli_inet" class="form-control" value="<?= set_value('ncli_inet'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('ncli_inet'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">FLAG HVC</label>
									<input type="text" name="flag_hvc" class="form-control" value="<?= set_value('flag_hvc'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('flag_hvc'); ?></span>
								</div>

								<!-- Tambahan kolom sesuai struktur tabel Tsel -->
								<div class="mb-3">
									<label class="form-label">REG</label>
									<input type="text" name="reg" class="form-control" value="<?= set_value('reg'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('reg'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">WITEL</label>
									<input type="text" name="witel" class="form-control" value="<?= set_value('witel'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('witel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">DATEL NCX</label>
									<input type="text" name="datel_ncx" class="form-control" value="<?= set_value('datel_ncx'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('datel_ncx'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">STO</label>
									<input type="text" name="sto" class="form-control" value="<?= set_value('sto'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('sto'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">CDATEL</label>
									<input type="text" name="cdatel" class="form-control" value="<?= set_value('cdatel'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('cdatel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">ND POTS</label>
									<input type="text" name="nd_pots" class="form-control" value="<?= set_value('nd_pots'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('nd_pots'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">CWITEL</label>
									<input type="text" name="cwitel" class="form-control" value="<?= set_value('cwitel'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('cwitel'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">ODC</label>
									<input type="text" name="odc" class="form-control" value="<?= set_value('odc'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('odc'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">ODP</label>
									<input type="text" name="odp" class="form-control" value="<?= set_value('odp'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('odp'); ?></span>
								</div>

								<button type="submit" class="btn btn-primary">Tambah</button>
								<a href="<?= base_url('tsel'); ?>" class="btn btn-secondary">Cancel</a>
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