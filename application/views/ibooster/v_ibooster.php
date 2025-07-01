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
                        <li class="breadcrumb-item active">Ibooster</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <!-- Search form -->
            <form method="get" action="<?= base_url('ibooster'); ?>" class="mb-2 d-flex align-items-center" style="gap: 8px;">
                <div class="input-group" style="min-width: 260px; height: 32px;">
                    <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                    <input type="text" name="keyword" class="form-control form-control-sm" placeholder="Search" value="<?= $this->input->get('keyword'); ?>">
                </div>
                <button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
            </form>

            <!-- Action buttons -->
            <div class="d-flex flex-wrap gap-2 mb-2">
                <a href="<?= base_url('ibooster/add'); ?>" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Tambah
                </a>
                <form action="<?= base_url('ibooster/uploadCsv'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
                    <input type="file" name="csv_file" accept=".csv" class="form-control" required style="max-width: 250px;  margin-right: 10px;">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-file-upload"></i> Upload CSV
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">Data Ibooster</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space: nowrap;">No</th>
                                        <th style="white-space: nowrap;">ND INET</th>
                                        <th style="white-space: nowrap;">IP Embassy</th>
                                        <th style="white-space: nowrap;">Type OLT</th>
                                        <th style="white-space: nowrap;">CID</th>
                                        <th style="white-space: nowrap;">IP NE</th>
                                        <th style="white-space: nowrap;">ADSL Link</th>
                                        <th style="white-space: nowrap;">Line Rate 1</th>
                                        <th style="white-space: nowrap;">SNR 1</th>
                                        <th style="white-space: nowrap;">Attenuation 1</th>
                                        <th style="white-space: nowrap;">Attainable Rate 1</th>
                                        <th style="white-space: nowrap;">Line Rate 2</th>
                                        <th style="white-space: nowrap;">SNR 2</th>
                                        <th style="white-space: nowrap;">Attenuation 2</th>
                                        <th style="white-space: nowrap;">Attainable Rate 2</th>
                                        <th style="white-space: nowrap;">ONU Link</th>
                                        <th style="white-space: nowrap;">ONU Serial</th>
                                        <th style="white-space: nowrap;">Fiber Length</th>
                                        <th style="white-space: nowrap;">OLT TX</th>
                                        <th style="white-space: nowrap;">OLT RX</th>
                                        <th style="white-space: nowrap;">ONU TX</th>
                                        <th style="white-space: nowrap;">ONU RX</th>
                                        <th style="white-space: nowrap;">Type ONU</th>
                                        <th style="white-space: nowrap;">Version ID</th>
                                        <th style="white-space: nowrap;">Traffic Up</th>
                                        <th style="white-space: nowrap;">Traffic Down</th>
                                        <th style="white-space: nowrap;">Framed IP</th>
                                        <th style="white-space: nowrap;">MAC Address</th>
                                        <th style="white-space: nowrap;">Last Seen</th>
                                        <th style="white-space: nowrap;">Acc Start</th>
                                        <th style="white-space: nowrap;">Acc Stop</th>
                                        <th style="white-space: nowrap;">Acc Session</th>
                                        <th style="white-space: nowrap;">UP</th>
                                        <th style="white-space: nowrap;">DOWN</th>
                                        <th style="white-space: nowrap;">Status Koneksi</th>
                                        <th style="white-space: nowrap;">NAS IP</th>
                                        <th style="white-space: nowrap;">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php if (!empty($ibooster)) : ?>
                                        <?php $no = 1;
                                        foreach ($ibooster as $i) : ?>
                                            <tr class="text-center align-middle">
                                                <td><?= $no++; ?></td>
                                                <td><?= $i->nd_inet; ?></td>
                                                <td><?= $i->ip_embassy; ?></td>
                                                <td><?= $i->type_olt; ?></td>
                                                <td><?= $i->cid; ?></td>
                                                <td><?= $i->ip_ne; ?></td>
                                                <td><?= $i->adsl_link_status; ?></td>
                                                <td><?= $i->line_rate_1; ?></td>
                                                <td><?= $i->snr_1; ?></td>
                                                <td><?= $i->attenuation_1; ?></td>
                                                <td><?= $i->attainable_rate_1; ?></td>
                                                <td><?= $i->line_rate_2; ?></td>
                                                <td><?= $i->snr_2; ?></td>
                                                <td><?= $i->attenuation_2; ?></td>
                                                <td><?= $i->attainable_rate_2; ?></td>
                                                <td><?= $i->onu_link_status; ?></td>
                                                <td><?= $i->onu_serial_number; ?></td>
                                                <td><?= $i->fiber_length; ?></td>
                                                <td><?= $i->olt_tx; ?></td>
                                                <td><?= $i->olt_rx; ?></td>
                                                <td><?= $i->onu_tx; ?></td>
                                                <td><?= $i->onu_rx; ?></td>
                                                <td><?= $i->type_onu; ?></td>
                                                <td><?= $i->versionid; ?></td>
                                                <td><?= $i->traffic_profile_up; ?></td>
                                                <td><?= $i->traffic_profile_down; ?></td>
                                                <td><?= $i->framed_ip_address; ?></td>
                                                <td><?= $i->mac_address; ?></td>
                                                <td><?= $i->last_seen; ?></td>
                                                <td><?= $i->accstarttime; ?></td>
                                                <td><?= $i->accstoptime; ?></td>
                                                <td><?= $i->accessiontime; ?></td>
                                                <td><?= $i->up; ?></td>
                                                <td><?= $i->down; ?></td>
                                                <td><?= $i->status_koneksi; ?></td>
                                                <td><?= $i->nas_ip_address; ?></td>
                                                <td>
                                                    <div class="d-inline-flex gap-1">
                                                        <a href="<?= base_url('ibooster/edit/' . $i->no); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="#" data-href="<?= base_url('ibooster/delete/' . $i->no); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="37" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
</main>