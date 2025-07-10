<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('userteknisi'); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Teknisi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content col ps-0">
        <div class="p-2 pt-0">
            <h1 class="mb-2">Data Teknisi</h1>

            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
                <form method="get" action="<?= base_url('userteknisi'); ?>" class="d-flex align-items-center" style="gap: 8px;">
                    <div class="d-flex align-items-center border rounded px-2" style="min-width: 260px; height: 32px; background-color: white;">
                        <i class="fas fa-search text-muted"></i>
                        <input type="text" name="keyword" class="form-control form-control-sm border-0 shadow-none" placeholder="Search" value="<?= $this->input->get('keyword'); ?>" style="font-size: 14px; padding-left: 10px;">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" style="height: 32px;">Cari</button>
                </form>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">Data Teknisi</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
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
                                            <?php $no = 1; foreach ($teknisi as $t) : ?>
                                                <tr class="text-center align-middle">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $t->nik_teknisi; ?></td>
                                                    <td><?= $t->nama_teknisi; ?></td>
                                                    <td><?= $t->sektor; ?></td>
                                                    <td><?= $t->jenis; ?></td>
                                                    <td><?= $t->status; ?></td>
                                                    <td>
													<a href="<?= base_url('userteknisi/update/' . urlencode($t->nik_teknisi)); ?>" class="btn btn-warning btn-sm">Edit</a>

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
            </div>
        </div>
    </div>    
</main>
