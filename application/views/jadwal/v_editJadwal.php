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
						<li class="breadcrumb-item active" aria-current="page">Edit Jadwal</li>
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
				<div class="col-lg-8 mx-auto">
					<div class="card card-primary">
						<div class="card-header">Edit Jadwal</div>
						<div class="card-body">
							<form method="post" action="<?= base_url('jadwal/update'); ?>">
								<input type="hidden" name="id" value="<?= $jadwal->id ?>">
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
									<input type="date" name="tgl" class="form-control" value="<?= set_value('tgl', $jadwal->tgl); ?>">
									<span class="text-danger"><?= form_error('tgl'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Status</label>
									<input type="text" name="status" class="form-control" value="<?= set_value('status', $jadwal->status); ?>">
									<span class="text-danger"><?= form_error('status'); ?></span>
								</div>
								<div class="mb-3">
									<label class="form-label">Sektor</label>
									<select name="s_sektor" class="form-control">
										<option value="">Pilih Sektor</option>
										<?php foreach ($sektor as $s) : ?>
											<option value="<?= $s['sektor']; ?>" <?= set_select('s_sektor', $s['sektor'], $semesta->s_sektor == $s['sektor']); ?>>
												<?= $s['sektor']; ?>
											</option>
										<?php endforeach; ?>
									</select>
									<span class="text-danger"><?= form_error('s_sektor'); ?></span>
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
								<a href="<?= base_url('jadwal'); ?>" class="btn btn-secondary">Kembali</a>
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