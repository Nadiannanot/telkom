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
						<li class="breadcrumb-item"><a href="<?= base_url('saldo'); ?>">Saldo</a></li>
						<li class="breadcrumb-item active" aria-current="page">Add Saldo</li>
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
							Tambah Data Saldo Harian
						</div>
						<div class="card-body">
							<form action="<?= base_url('saldo/postAdd'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />


								<div class="mb-3">
									<label class="form-label">ND INET</label>
									<select name="nd_inet" class="form-control">
										<option value="">-- Pilih ND_INET --</option>
										<?php foreach ($nd_inet as $row) : ?>
											<option value="<?= $row['nd_inet'] ?>" <?= set_select('nd_inet', $row['nd_inet']); ?>>
												<?= $row['nd_inet'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="mb-3">
									<label class="form-label">Jenis Saldo</label>
									<select name="jenis_saldo" class="form-control" required>
										<option value="">-- Pilih Jenis --</option>
										<option value="NON WARRANTY" <?= set_value('jenis_saldo') == 'NON WARRANTY' ? 'selected' : ''; ?>>NON WARRANTY</option>
										<option value="WARRANTY" <?= set_value('jenis_saldo') == 'WARRANTY' ? 'selected' : ''; ?>>WARRANTY</option>
									</select>
									<span class="text-danger"><?= form_error('jenis_saldo'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Type Pelanggan</label>
									<input type="text" name="type_pelanggan" class="form-control" value="<?= set_value('type_pelanggan'); ?>" required>
									<span class="text-danger"><?= form_error('type_pelanggan'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Tanggal Input</label>
									<input type="date" name="tgl_input" class="form-control" value="<?= set_value('tgl_input'); ?>" required>
									<span class="text-danger"><?= form_error('tgl_input'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Keterangan Close</label>
									<input type="text" name="ket_close" class="form-control" value="<?= set_value('ket_close'); ?>">
									<span class="text-danger"><?= form_error('ket_close'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">SEG Close</label>
									<input type="number" inputmode="numeric"  name="seg_close" class="form-control" value="<?= set_value('seg_close'); ?>">
									<span class="text-danger"><?= form_error('seg_close'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Subseg Close</label>
									<input type="number" inputmode="numeric" name="subseg_close" class="form-control" value="<?= set_value('subseg_close'); ?>">
									<span class="text-danger"><?= form_error('subseg_close'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Status</label>
									<input type="text" name="status" class="form-control" value="<?= set_value('status'); ?>" required>
									<span class="text-danger"><?= form_error('status'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Nama Teknisi</label>
									<select name="nama_teknisi" class="form-control">
										<option value="">-- Pilih Nama Teknisi --</option>
										<?php foreach ($nama_teknisi as $row) : ?>
											<option value="<?= $row['nama_teknisi'] ?>" <?= set_select('nama_teknisi', $row['nama_teknisi']); ?>>
												<?= $row['nama_teknisi'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>

								<div class="mb-3">
									<label for="jenis_teknisi">jenis_teknisi</label>
									<select name="jenis_teknisi" id="jenis_teknisi" class="form-control">
										<option value="">-- Pilih jenis_teknisi --</option>
										<option value="IOAN" <?= set_select('jenis_teknisi', 'IOAN'); ?>>IOAN</option>
										<option value="BANTEK" <?= set_select('jenis_teknisi', 'BANTEK'); ?>>BANTEK</option>
										<option value="MAINTENANCE" <?= set_select('jenis_teknisi', 'MAINTENANCE'); ?>>MAINTENANCE</option>
										<option value="PROVISIONING" <?= set_select('jenis_teknisi', 'PROVISIONING'); ?>>PROVISIONIG</option>
									</select>
								</div>

								<button type="submit" class="btn btn-primary">Tambah</button>

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