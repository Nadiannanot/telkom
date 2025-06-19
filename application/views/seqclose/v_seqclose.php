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
                        <li class="breadcrumb-item active" aria-current="page">Seqclose</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Main Content-->
    <div class="main-content col ps-0">
        <div class="p-2 pt-0">
            <h1 class="mb-2">Data Seqclose</h1>
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Master Seqclose</li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>

            <!--begin::Top Actions-->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <!-- Search form -->
                <form action="<?= base_url('seqclose'); ?>" method="get" class="d-flex me-2 mb-2">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                        <input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Search" value="<?= $this->input->get('keyword'); ?>">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>

                <!-- Action buttons -->
                <div class="d-flex flex-wrap gap-2 mb-2">
                    <a href="<?= base_url('seqclose/add'); ?>" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> Tambah
                    </a>

                    <form action="<?= base_url('seqclose/upload_excel'); ?>" method="post" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center">
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
                                            <th>Segmentasi</th>
                                            <th>Sub Segment</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($seqclose)) : ?>
                                            <?php $no = 1; foreach ($seqclose as $s) : ?>
                                                <tr class="text-center align-middle">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $s->segmentasi; ?></td>
                                                    <td><?= $s->sub_segment; ?></td>
                                                    <td>
                                                        <div class="d-inline-flex gap-1">
                                                            <a href="<?= base_url('seqclose/edit/' . $s->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="#" data-href="<?= base_url('seqclose/delete/' . $s->id); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
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
