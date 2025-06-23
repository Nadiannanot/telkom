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
						<li class="breadcrumb-item"><a href="<?= base_url('ibooster'); ?>">Ibooster</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit Ibooster</li>
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
						<div class="card-header bg-warning text-dark">
							Edit Ibooster
						</div>
						<div class="card-body">
							<form action="<?= base_url('ibooster/postEdit/' . $ibooster->no); ?>" method="POST">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

								<?php
								$fields = [
									'nd_inet' => 'ND INET',
									'ip_embassy' => 'IP EMBASSY',
									'type_olt' => 'TYPE OLT',
									'cid' => 'CID',
									'ip_ne' => 'IP NE',
									'adsl_link_status' => 'ADSL LINK',
									'line_rate_1' => 'LINE RATE 1',
									'snr_1' => 'SNR 1',
									'attenuation_1' => 'ATT 1',
									'attainable_rate_1' => 'RATE 1',
									'line_rate_2' => 'LINE RATE 2',
									'snr_2' => 'SNR 2',
									'attenuation_2' => 'ATT 2',
									'attainable_rate_2' => 'RATE 2',
									'onu_link_status' => 'ONU LINK',
									'onu_serial_number' => 'ONU SN',
									'fiber_length' => 'FIBER LENGTH',
									'olt_tx' => 'OLT TX',
									'olt_rx' => 'OLT RX',
									'onu_tx' => 'ONU TX',
									'onu_rx' => 'ONU RX',
									'type_onu' => 'TYPE ONU',
									'versionid' => 'VERSION',
									'traffic_profile_up' => 'TP UP',
									'traffic_profile_down' => 'TP DOWN',
									'framed_ip_address' => 'FRAMED IP',
									'mac_address' => 'MAC',
									'last_seen' => 'LAST SEEN',
									'accstarttime' => 'START TIME',
									'accstoptime' => 'STOP TIME',
									'accessiontime' => 'SESSION TIME',
									'up' => 'UP',
									'down' => 'DOWN',
									'status_koneksi' => 'STATUS',
									'nas_ip_address' => 'NAS IP',
								];

								foreach ($fields as $name => $label) : ?>
									<div class="mb-3">
										<label class="form-label"><?= $label; ?></label>
										<input type="text" name="<?= $name; ?>" class="form-control" value="<?= set_value($name, $ibooster->$name); ?>" autocomplete="off" required>
										<span class="text-danger"><?= form_error($name); ?></span>
									</div>
								<?php endforeach; ?>

								<button type="submit" class="btn btn-warning">Update</button>
								<a href="<?= base_url('ibooster'); ?>" class="btn btn-secondary">Cancel</a>
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