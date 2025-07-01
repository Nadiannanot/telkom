<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sektor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Main Content-->
    <div class="main-content col ps-0">
        <div class="p-2 pt-0">
            <h1 class="mb-2">Data Sektor</h1>

            <!--begin::Top Actions-->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                <!-- Search form -->
                <form method="get" action="<?= base_url('sektor'); ?>" class="d-flex align-items-center" style="gap: 8px;">
                    <div class="d-flex align-items-center border rounded px-2" style="min-width: 260px; height: 32px; background-color: white;">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" name="keyword" class="form-control form-control-sm border-0 shadow-none" placeholder="Search" value="<?= $this->input->get('keyword'); ?>" style="font-size: 14px; padding-left: 10px;">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
                </form>

                <!-- Action buttons -->
                <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                    <a href="<?= base_url('sektor/add'); ?>" class="btn btn-primary" style="margin-right: 10px;">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </a>

                    <form action="<?= base_url('sektor/uploadCsv'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
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
                        <div class="card-header">Sektor</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Sektor</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($sektor)) : ?>
                                            <?php $no = 1;
                                            foreach ($sektor as $s) : ?>
                                                <tr class="text-center align-middle">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $s->sektor; ?></td>
                                                    <td>
                                                        <div class="d-inline-flex gap-1">
                                                            <a href="<?= base_url('sektor/edit/' . $s->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="#" data-href="<?= base_url('sektor/delete/' . $s->id); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data.</td>
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
</main>