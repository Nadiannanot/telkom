<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0"><?= $title; ?></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('sektor'); ?>">Sektor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Sektor</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Tambah Data Sektor
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('sektor/postAdd'); ?>" method="POST">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                                <div class="mb-3">
                                    <label class="form-label">Nama Sektor</label>
                                    <input type="text" name="sektor" class="form-control" value="<?= set_value('sektor'); ?>" autocomplete="off">
                                    <span class="text-danger"><?= form_error('sektor'); ?></span>
                                </div>

                                <button type="submit" class="btn btn-primary">Tambah</button>
                                <a href="<?= base_url('sektor'); ?>" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
    </div>
    <!--end::App Content-->
</main>
