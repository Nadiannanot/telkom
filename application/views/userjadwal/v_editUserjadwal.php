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
                        <li class="breadcrumb-item"><a href="<?= base_url('userjadwal'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('userjadwal'); ?>">Jadwal</a></li>
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
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Edit Jadwal Teknisi
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('userjadwal/update'); ?>" method="POST">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                <input type="hidden" name="id" value="<?= $jadwal->id; ?>">

                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" class="form-control" value="<?= set_value('nik', $jadwal->nik); ?>">
                                    <small class="text-danger"><?= form_error('nik'); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nama Teknisi</label>
                                    <input type="text" name="nama_teknisi" class="form-control" value="<?= set_value('nama_teknisi', $jadwal->nama_teknisi); ?>">
                                    <small class="text-danger"><?= form_error('nama_teknisi'); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" name="tgl" class="form-control" value="<?= set_value('tgl', $jadwal->tgl); ?>">
                                    <small class="text-danger"><?= form_error('tgl'); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sektor</label>
                                    <input type="text" name="sektor" class="form-control" value="<?= set_value('sektor', $jadwal->sektor); ?>">
                                    <small class="text-danger"><?= form_error('sektor'); ?></small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control" value="<?= set_value('status', $jadwal->status); ?>">
                                    <small class="text-danger"><?= form_error('status'); ?></small>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('userjadwal'); ?>" class="btn btn-secondary">Batal</a>
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
