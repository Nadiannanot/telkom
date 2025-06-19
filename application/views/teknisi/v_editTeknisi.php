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
						<li class="breadcrumb-item"><a href="<?= base_url('teknisi'); ?>">Teknisi</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="app-content">
		<div class="container-fluid">
			<div class="card card-primary">
				<div class="card-header">Form Edit Teknisi</div>
				<div class="card-body">
					<form action="<?= base_url('teknisi/update'); ?>" method="post">
						<input type="hidden" name="nik_lama" value="<?= $teknisi->nik_teknisi; ?>">

						<div class="form-group">
							<label for="nik_teknisi">NIK</label>
							<input type="text" name="nik_teknisi" class="form-control" id="nik_teknisi" value="<?= set_value('nik_teknisi', $teknisi->nik_teknisi); ?>">
							<small class="text-danger"><?= form_error('nik_teknisi'); ?></small>
						</div>
						<div class="form-group">
							<label for="nama_teknisi">Nama</label>
							<input type="text" name="nama_teknisi" class="form-control" id="nama_teknisi" value="<?= set_value('nama_teknisi', $teknisi->nama_teknisi); ?>">
							<small class="text-danger"><?= form_error('nama_teknisi'); ?></small>
						</div>
						<div class="form-group">
							<label for="sektor">Sektor</label>
							<input type="text" name="sektor" class="form-control" id="sektor" value="<?= set_value('sektor', $teknisi->sektor); ?>">
							<small class="text-danger"><?= form_error('sektor'); ?></small>
						</div>
						<div class="form-group">
							<label for="jenis">Jenis</label>
							<select name="jenis" id="jenis" class="form-control">
								<option value="">-- Pilih Jenis --</option>
								<option value="IOAN" <?= set_select('jenis', 'IOAN'); ?>>IOAN</option>
								<option value="BANTEK" <?= set_select('jenis', 'BANTEK'); ?>>BANTEK</option>
								<option value="MAINTENANCE" <?= set_select('jenis', 'MAINTENANCE'); ?>>MAINTENANCE</option>
								<option value="PROVISIONING" <?= set_select('jenis', 'PROVISIONING'); ?>>PROVISIONIG</option>
							</select>
							<small class="text-danger"><?= form_error('jenis'); ?></small>
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<select name="status" id="status" class="form-control">
								<option value="">-- Pilih Status --</option>
								<option value="Aktif" <?= set_select('status', 'Aktif', ($teknisi->status == 'Aktif')); ?>>Aktif</option>
								<option value="Nonaktif" <?= set_select('status', 'Nonaktif', ($teknisi->status == 'Nonaktif')); ?>>Nonaktif</option>
							</select>
							<small class="text-danger"><?= form_error('status'); ?></small>
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
						<a href="<?= base_url('teknisi'); ?>" class="btn btn-secondary">Batal</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>
