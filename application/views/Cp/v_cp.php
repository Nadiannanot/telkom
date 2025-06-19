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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master UNSPEC</li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>

            <!--begin::Top Actions-->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <!-- Search form -->
                <form action="<?= base_url('cp'); ?>" method="get" class="d-flex me-2 mb-2">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                        <input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Search" value="<?= $this->input->get('keyword'); ?>">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>

                <!-- Action buttons -->
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <a href="<?= base_url('cp/add'); ?>" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </a>

                    <form action="<?= base_url('cp/upload_excel'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
                        <input type="file" name="file_excel" accept=".xls,.xlsx" class="form-control" required style="max-width: 250px;">
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
                        <div class="card-header">&nbsp;</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="table-light text-center align-middle">
                                        <tr>
                                            <th>No</th>
                                            <th>ND INET</th>
                                            <th>CP Dossier</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($cp)) : ?>
                                            <?php $no = 1; foreach ($cp as $c) : ?>
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
