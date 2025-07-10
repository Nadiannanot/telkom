<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('userjadwal'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::Main Content-->
    <div class="main-content col ps-0">
        <div class="p-2 pt-0">
            <h1 class="mb-2">Data Jadwal Operasi</h1>

            <!--begin::Top Actions-->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                <form method="get" action="<?= base_url('userjadwal'); ?>" class="d-flex align-items-center" style="gap: 8px;">
                    <div class="d-flex align-items-center border rounded px-2" style="min-width: 260px; height: 32px; background-color: white;">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" name="keyword" class="form-control form-control-sm border-0 shadow-none" placeholder="Search" value="<?= $this->input->get('keyword'); ?>" style="font-size: 14px; padding-left: 10px;">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
                </form>
            </div>
            <!--end::Top Actions-->

            <!--begin::Table Data-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">Data Jadwal Operasi</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Teknisi</th>
                                            <th>Tanggal</th>
                                            <th>Sektor</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($jadwal)) : ?>
                                            <?php $no = 1;
                                            foreach ($jadwal as $j) : ?>
                                                <tr class="text-center align-middle">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $j->nik; ?></td>
                                                    <td><?= $j->nama_teknisi; ?></td>
                                                    <td><?= $j->tgl; ?></td>
                                                    <td><?= $j->sektor; ?></td>
                                                    <td><?= $j->status; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('userjadwal/edit/' . $j->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Table Data-->
            </div>
        </div>
    </div>
    <!--end::Main Content-->
</main>
