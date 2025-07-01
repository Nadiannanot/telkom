<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <!-- Optional: <h3 class="mb-0"><?= $title ?? 'Data Teknisi'; ?></h3> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Teknisi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::Main Content-->
    <div class="main-content col ps-0">
        <div class="p-2 pt-0">
            <h1 class="mb-2">Data Teknisi</h1>

            <!--begin::Top Actions-->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                <!-- Search form -->
                <form method="get" action="<?= base_url('teknisi'); ?>" class="d-flex align-items-center" style="gap: 8px;">
                    <div class="d-flex align-items-center border rounded px-2" style="min-width: 260px; height: 32px; background-color: white;">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" name="keyword" class="form-control form-control-sm border-0 shadow-none" placeholder="Search" value="<?= $this->input->get('keyword'); ?>" style="font-size: 14px; padding-left: 10px;">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
                </form>

                <!-- Action buttons -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                    <a href="<?= base_url('teknisi/add'); ?>" class="btn btn-primary" style="margin-right: 10px;">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </a>

                    <form action="<?= base_url('teknisi/uploadCsv'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
                        <input type="file" name="csv_file" accept=".csv" class="form-control" required style="max-width: 250px; margin-right: 10px;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-file-upload"></i> Upload CSV
                        </button>
                    </form>
                </div>

            </div>
            <!--end::Top Actions-->

            <!--begin::Table Data-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">Data Teknisi</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>NIK Teknisi</th>
                                            <th>Nama Teknisi</th>
                                            <th>Sektor</th>
                                            <th>Jenis</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($teknisi)) : ?>
                                            <?php $no = 1;
                                            foreach ($teknisi as $t) : ?>
                                                <tr class="text-center align-middle">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= htmlspecialchars($t->nik_teknisi); ?></td>
                                                    <td><?= htmlspecialchars($t->nama_teknisi); ?></td>
                                                    <td><?= htmlspecialchars($t->sektor); ?></td>
                                                    <td><?= htmlspecialchars($t->jenis); ?></td>
                                                    <td><?= htmlspecialchars($t->status); ?></td>
                                                    <td>
                                                        <div class="d-inline-flex gap-1">
                                                            <a href="<?= base_url('teknisi/edit/' . $t->nik_teknisi); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="#" data-href="<?= base_url('teknisi/delete/' . $t->nik_teknisi); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak ada data teknisi.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table Data-->
        </div>
    </div>
    <!--end::Main Content-->
</main>