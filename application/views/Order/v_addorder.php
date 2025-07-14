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
                                <!-- NIK Teknisi -->
                                <div class="mb-3">
                                    <label class="form-label">NIK Teknisi</label>
                                    <select name="nik_teknisi" id="nik_teknisi" class="form-control">
                                        <option value="">Pilih NIK Teknisi</option>
                                        <?php foreach ($teknisi as $t) : ?>
                                            <option value="<?= $t['nik_teknisi']; ?>" <?= set_select('nik_teknisi', $t['nik_teknisi'], isset($order) && $order->nik_teknisi == $t['nik_teknisi']); ?>>
                                                <?= $t['nik_teknisi']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('nik_teknisi'); ?></span>
                                </div>

                                <!-- Nama Teknisi (otomatis terisi sesuai NIK, atau bisa juga select jika mau) -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Teknisi</label>
                                    <input type="text" name="nama_teknisi" id="nama_teknisi" class="form-control" value="<?= set_value('nama_teknisi', isset($order) ? $order->nama_teknisi : '') ?>" readonly>
                                    <span class="text-danger"><?= form_error('nama_teknisi'); ?></span>
                                </div>

                                <script>
                                    document.getElementById('nik_teknisi').addEventListener('change', function() {
                                        var nik = this.value;
                                        var nama = '';
                                        <?php foreach ($teknisi as $t) : ?>
                                            if (nik === '<?= $t['nik_teknisi']; ?>') nama = '<?= $t['nama_teknisi']; ?>';
                                        <?php endforeach; ?>
                                        document.getElementById('nama_teknisi').value = nama;
                                    });
                                </script>

                                <!-- Jenis Order -->
                                <div class="mb-3">
                                    <label class="form-label">Jenis Order</label>
                                    <select name="jenis_order" class="form-control">
                                        <option value="">Pilih Jenis Order</option>
                                        <?php foreach ($jenisOrder as $j) : ?>
                                            <option value="<?= $j['jenis']; ?>" <?= set_select('jenis_order', $j['jenis'], isset($order) && $order->jenis_order == $j['jenis']); ?>>
                                                <?= $j['jenis']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('jenis_order'); ?></span>
                                </div>

                                <!-- Segmentasi -->
                                <div class="mb-3">
                                    <label class="form-label">Segmentasi</label>
                                    <select name="segmentasi" class="form-control">
                                        <option value="">Pilih Segmentasi</option>
                                        <?php foreach ($segmentasi as $s) : ?>
                                            <option value="<?= $s['segmentasi']; ?>" <?= set_select('segmentasi', $s['segmentasi'], isset($order) && $order->segmentasi == $s['segmentasi']); ?>>
                                                <?= $s['segmentasi']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger"><?= form_error('segmentasi'); ?></span>
                                </div>

                                <!-- Sektor -->
                                <div class="mb-3">
                                    <label class="form-label">Sektor</label>
                                    <select name="sektor" class="form-control">
                                        <option value="">Pilih Sektor</option>
                                        <?php foreach ($sektor as $s) : ?>
                                            <option value="<?= $s['sektor']; ?>" <?= set_select('sektor', $s['sektor'], isset($order) && $order->sektor == $s['sektor']); ?>>
                                                <?= $s['sektor']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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