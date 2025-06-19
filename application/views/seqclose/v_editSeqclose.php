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
						<li class="breadcrumb-item"><a href="<?= base_url('seqclose'); ?>">SeqClose</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit SeqClose</li>
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
							Edit SeqClose
						</div>
						<div class="card-body">
							<form action="<?= base_url('seqclose/update'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $seqclose->id; ?>">

								<div class="mb-3">
									<label class="form-label">Segmentasi</label>
									<input type="text" name="segmentasi" class="form-control" value="<?= set_value('segmentasi', $seqclose->segmentasi); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('segmentasi'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Sub Segment</label>
									<input type="text" name="sub_segment" class="form-control" value="<?= set_value('sub_segment', $seqclose->sub_segment); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('sub_segment'); ?></span>
								</div>

								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?= base_url('seqclose'); ?>" class="btn btn-secondary">Cancel</a>
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
