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
						<li class="breadcrumb-item"><a href="<?= base_url('semesta'); ?>">Semesta</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Semesta</li>
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
							Edit Semesta
						</div>
						<div class="card-body">
							<form action="<?= base_url('semesta/update'); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
								<input type="hidden" name="id" value="<?= $semesta->id; ?>">

								<div class="mb-3">
									<label class="form-label">ND INET</label>
									<input type="text" name="s_nd_inet" class="form-control" value="<?= set_value('s_nd_inet', $semesta->s_nd_inet); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_nd_inet'); ?></span>
								</div>
								
								<div class="mb-3">
									<label class="form-label">Sektor</label>
									<input type="text" name="s_sektor" class="form-control" value="<?= set_value('s_sektor', $semesta->s_sektor); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_sektor'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Node ID / IP</label>
									<input type="text" name="s_node_id_ip" class="form-control" value="<?= set_value('s_node_id_ip', $semesta->s_node_id_ip); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_node_id_ip'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Shelf / Slot / Port ONU</label>
									<input type="text" name="s_shelf_slot_port_onu" class="form-control" value="<?= set_value('s_shelf_slot_port_onu', $semesta->s_shelf_slot_port_onu); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_shelf_slot_port_onu'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">Fiber Length</label>
									<input type="text" name="s_fiber_lenght" class="form-control" value="<?= set_value('s_fiber_lenght', $semesta->s_fiber_lenght); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_fiber_lenght'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">STO</label>
									<input type="text" name="s_sto" class="form-control" value="<?= set_value('s_sto', $semesta->s_sto); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_sto'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">ODC</label>
									<input type="text" name="s_odc" class="form-control" value="<?= set_value('s_odc', $semesta->s_odc); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_odc'); ?></span>
								</div>

								<div class="mb-3">
									<label class="form-label">ODP</label>
									<input type="text" name="s_odp" class="form-control" value="<?= set_value('s_odp', $semesta->s_odp); ?>" autocomplete="off">
									<span class="text-danger"><?= form_error('s_odp'); ?></span>
								</div>

								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?= base_url('semesta'); ?>" class="btn btn-secondary">Cancel</a>
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
