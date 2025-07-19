<main class="app-main">
	<!--begin::App Content Header-->
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0">Tambah Jadwal</h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url('jadwal'); ?>">Jadwal</a></li>
						<li class="breadcrumb-item active" aria-current="page">Tambah Jadwal</li>
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
							<form method="post" action="<?= base_url('jadwal/postAdd'); ?>">
								<div class="mb-3">
									<label class="form-label">NIK Teknisi</label>
									<select name="nik" id="nik" class="form-control">
										<option value="">Pilih NIK Teknisi</option>
										<?php foreach ($teknisi as $t) : ?>
											<option value="<?= $t['nik_teknisi']; ?>" <?= set_select('nik', $t['nik_teknisi'], (isset($jadwal) && $jadwal->nik == $t['nik_teknisi'])); ?>>
												<?= $t['nik_teknisi']; ?> - <?= $t['nama_teknisi']; ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger"><?= form_error('nik'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Tanggal</label>
									<input type="date" name="tgl" class="form-control" value="<?= set_value('tgl'); ?>">
									<span class="text-danger"><?= form_error('tgl'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Status</label>
									<select name="status" class="form-control">
										<option value="">Pilih Status</option>
										<option value="Aktif" <?= set_select('status', 'Aktif'); ?>>Aktif</option>
										<option value="nonAktif" <?= set_select('status', 'nonAktif'); ?>>nonAktif</option>
									</select>
									<span class="text-danger"><?= form_error('status'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Sektor</label>
									<select name="sektor" class="form-control">
										<option value="">Pilih Sektor</option>
										<?php foreach ($sektor as $s) : ?>
											<option value="<?= $s['sektor']; ?>" <?= set_select('s_sektor', $s['sektor']); ?>>
												<?= $s['sektor']; ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger"><?= form_error('s_sektor'); ?></span>
								</div>
								<button type="submit" class="btn btn-success">Simpan</button>
								<a href="<?= base_url('jadwal'); ?>" class="btn btn-secondary">Kembali</a>
							</form>
							<?= validation_errors() ?>
						</div>
					</div>
				</div>
			</div>
			<!--end::Row-->
		</div>
	</div>
	<!--end::App Content-->
</main>