<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Order</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('order'); ?>">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Order</li>
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
                            Tambah Order
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= base_url('order/postTambah'); ?>">
                                <div class="mb-3">
                                    <label class="form-label">No Ticket</label>
                                    <input type="text" name="no_ticket" class="form-control" value="<?= set_value('no_ticket') ?>">
                                    <span class="text-danger"><?= form_error('no_ticket'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Service No</label>
                                    <input type="text" name="service_no" class="form-control" value="<?= set_value('service_no') ?>">
                                    <span class="text-danger"><?= form_error('service_no'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reported Date</label>
                                    <input type="datetime-local" name="reported_date" class="form-control" value="<?= set_value('reported_date') ?>">
                                    <span class="text-danger"><?= form_error('reported_date'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Closed Date</label>
                                    <input type="datetime-local" name="closed_date" class="form-control" value="<?= set_value('closed_date') ?>">
                                    <span class="text-danger"><?= form_error('closed_date'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIK Teknisi</label>
                                    <input type="text" name="nik_teknisi" class="form-control" value="<?= set_value('nik_teknisi') ?>">
                                    <span class="text-danger"><?= form_error('nik_teknisi'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Order</label>
                                    <input type="text" name="jenis_order" class="form-control" value="<?= set_value('jenis_order') ?>">
                                    <span class="text-danger"><?= form_error('jenis_order'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Segmentasi</label>
                                    <input type="text" name="segmentasi" class="form-control" value="<?= set_value('segmentasi') ?>">
                                    <span class="text-danger"><?= form_error('segmentasi'); ?></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sektor</label>
                                    <input type="text" name="sektor" class="form-control" value="<?= set_value('sektor') ?>">
                                    <span class="text-danger"><?= form_error('sektor'); ?></span>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                            <?= validation_errors() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>