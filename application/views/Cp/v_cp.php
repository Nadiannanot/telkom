<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <!-- <h3 class="mb-0"><?= $title; ?></h3> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">CP</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Main Content-->
    <div class="main-content col ps-0">
        <div class="p-2 pt-0">
            <h1 class="mb-2">Data CP</h1>

            <nav aria-label="breadcrumb" class="mb-3">
            </nav>

            <!--begin::Top Actions-->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <!-- Search form -->
                <form method="get" action="<?= base_url('cp'); ?>" class="mb-2 d-flex align-items-center" style="gap: 8px;">
                    <div class="input-group" style="min-width: 260px; height: 32px;">
                        <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                        <input type="text" name="keyword" class="form-control form-control-sm" placeholder="Search" value="<?= $this->input->get('keyword'); ?>">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
                </form>

                <!-- Action buttons -->
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <a href="<?= base_url('cp/add'); ?>" class="btn btn-primary" style="margin-right: 10px;">
                        <i class=" fas fa-plus-circle"></i> Tambah
                    </a>

                    <form action="<?= base_url('jadwal/uploadCsv'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
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
                        <div class="card-header">Kontak Person</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">ND INET</th>
                                            <th class="text-center">CP Dossier</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($cp)) : ?>
                                            <?php $no = 1;
                                            foreach ($cp as $c) : ?>
                                                <tr class="text-center align-middle">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $c->nd_inet; ?></td>
                                                    <td><?= $c->cp_dossier; ?></td>
                                                    <td>
                                                        <div class="d-inline-flex gap-1">
                                                            <a href="<?= base_url('cp/edit/' . $c->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="#" data-href="<?= base_url('cp/delete/' . $c->id); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data.</td>
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