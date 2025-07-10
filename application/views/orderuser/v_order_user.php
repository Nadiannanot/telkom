<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Monitoring Order</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-lg-6">
                    <form method="get" action="<?= base_url('orderuser'); ?>" class="d-flex align-items-center" style="gap: 8px; max-width: 320px;">
                        <input type="text" name="q" class="form-control form-control-sm" style="max-width: 180px;" placeholder="Cari order..." value="<?= $this->input->get('q'); ?>">
                        <button type="submit" class="btn btn-sm btn-primary" style="height:32px; min-width:60px;">Cari</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>No Ticket</th>
                                        <th>Service No</th>
                                        <th>Reported Date</th>
                                        <th>Closed Date</th>
                                        <th>NIK Teknisi</th>
                                        <th>Nama Teknisi</th>
                                        <th>Jenis Order</th>
                                        <th>Segmentasi</th>
                                        <th>Sektor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($order)) : ?>
                                        <?php $no = 1;
                                        foreach ($order as $row) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?= $row->no_ticket ?></td>
                                                <td><?= $row->service_no ?></td>
                                                <td><?= $row->reported_date ?></td>
                                                <td><?= $row->closed_date ?></td>
                                                <td><?= $row->nik_teknisi ?></td>
                                                <td><?= $row->nama_teknisi ?></td>
                                                <td><?= $row->jenis_order ?></td>
                                                <td><?= $row->segmentasi ?></td>
                                                <td><?= $row->sektor ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('orderuser/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data order.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>