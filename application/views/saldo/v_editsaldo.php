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
						<li class="breadcrumb-item"><a href="<?= base_url('saldo'); ?>">Saldo</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Saldo</li>
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
						<div class="card-header bg-primary text-white">
							Edit Data Saldo Harian
						</div>
						<div class="card-body">
							<form action="<?= base_url('saldo/update'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $saldo->id; ?>" required>

								<div class="mb-3">
									<label class="form-label">ND Inet</label>
									<input type="text" name="nd_inet" class="form-control" value="<?= $saldo->nd_inet; ?>" required>
									<span class="text-danger"><?= form_error('nd_inet'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Jenis Saldo</label>
									<select name="jenis_saldo" class="form-control" required>
										<option value="">-- Pilih Jenis --</option>
										<option value="NON WARRANTY" <?= $saldo->jenis_saldo == 'NON WARRANTY' ? 'selected' : ''; ?>>NON WARRANTY</option>
										<option value="WARRANTY" <?= $saldo->jenis_saldo == 'WARRANTY' ? 'selected' : ''; ?>>WARRANTY</option>
									</select>
									<span class="text-danger"><?= form_error('jenis_saldo'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Type Pelanggan</label>
									<input type="text" name="type_pelanggan" class="form-control" value="<?= $saldo->type_pelanggan; ?>" required>
									<span class="text-danger"><?= form_error('type_pelanggan'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Tanggal Input</label>
									<input type="date" name="tgl_input" class="form-control" value="<?= $saldo->tgl_input; ?>" required>
									<span class="text-danger"><?= form_error('tgl_input'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Keterangan Close</label>
									<input type="text" name="ket_close" class="form-control" value="<?= $saldo->ket_close; ?>">
									<span class="text-danger"><?= form_error('ket_close'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">SEG Close</label>
									<input type="text" name="seg_close" class="form-control" value="<?= $saldo->seg_close; ?>">
									<span class="text-danger"><?= form_error('seg_close'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Subseg Close</label>
									<input type="text" name="subseg_close" class="form-control" value="<?= $saldo->subseg_close; ?>">
									<span class="text-danger"><?= form_error('subseg_close'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Status</label>
									<input type="text" name="status" class="form-control" value="<?= $saldo->status; ?>" required>
									<span class="text-danger"><?= form_error('status'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Nama Teknisi</label>
									<input type="text" name="nama_teknisi" class="form-control" value="<?= $saldo->nama_teknisi; ?>" required>
									<span class="text-danger"><?= form_error('nama_teknisi'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Jenis Teknisi</label>
									<input type="text" name="jenis_teknisi" class="form-control" value="<?= $saldo->jenis_teknisi; ?>" required>
									<span class="text-danger"><?= form_error('jenis_teknisi'); ?></span>
								</div>

								<button type="submit" class="btn btn-primary">Simpan</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>