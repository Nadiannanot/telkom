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
						<li class="breadcrumb-item"><a href="<?= base_url('jadwal'); ?>">Jadwal</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Jadwal</li>
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
							Tambah Jadwal
						</div>
						<div class="card-body">
							<form action="<?= base_url('jadwal/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<div class="mb-3">
									<label class="form-label">NIK</label>
									<input type="text" name="nik" class="form-control" value="<?= set_value('nik'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('nik'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Tanggal</label>
									<input type="date" name="tgl" class="form-control" value="<?= set_value('tgl'); ?>">
									<span class="text-danger"><?= form_error('tgl'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Sektor</label>
									<input type="text" name="sektor" class="form-control" value="<?= set_value('sektor'); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('sektor'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Status</label>
									<select name="status" class="form-control">
										<option value="">-- Pilih Status --</option>
										<option value="Masuk" <?= set_select('status', 'masuk'); ?>>Masuk</option>
										<option value="Izin" <?= set_select('status', 'izin'); ?>>Izin</option>
										<option value="Libur" <?= set_select('status', 'libur'); ?>>Libur</option>
										<option value="Resign" <?= set_select('status', 'resign'); ?>>Resign</option>
									</select>
									<span class="text-danger"><?= form_error('status'); ?></span>
								</div>

								<button type="submit" class="btn btn-primary">Tambah</button>
								<a href="<?= base_url('jadwal'); ?>" class="btn btn-secondary">Cancel</a>
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