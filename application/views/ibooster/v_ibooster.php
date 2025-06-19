<main class="app-main">
	<div class="app-content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<h3 class="mb-0"><?= $title; ?></h3>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-end">
						<li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
						<li class="breadcrumb-item active">iBooster</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
		<form action="<?= base_url('ibooster'); ?>" method="get" class="d-flex me-2 mb-2">
			<div class="input-group">
				<span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
				<input type="text" name="keyword" class="form-control" placeholder="Search" value="<?= $this->input->get('keyword'); ?>">
				<button class="btn btn-primary" type="submit">Cari</button>
			</div>
		</form>

		<div class="d-flex flex-wrap gap-2 mb-2">
			<a href="<?= base_url('ibooster/add'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</a>
			<form action="<?= base_url('ibooster/upload_excel'); ?>" method="post" enctype="multipart/form-data" class="d-flex gap-2 align-items-center">
				<input type="file" name="file_excel" accept=".xls,.xlsx" class="form-control" required style="max-width: 250px;">
				<button type="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> Upload CSV</button>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card card-primary">
				<div class="card-header">Data iBooster Lengkap</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead class="table-light text-center align-middle">
								<tr>
									<th>No</th>
									<th>ND INET</th>
									<th>IP Embassy</th>
									<th>Type OLT</th>
									<th>CID</th>
									<th>IP NE</th>
									<th>ADSL Link</th>
									<th>Line Rate 1</th>
									<th>SNR 1</th>
									<th>Attenuation 1</th>
									<th>Attainable Rate 1</th>
									<th>Line Rate 2</th>
									<th>SNR 2</th>
									<th>Attenuation 2</th>
									<th>Attainable Rate 2</th>
									<th>ONU Link</th>
									<th>ONU Serial</th>
									<th>Fiber Length</th>
									<th>OLT TX</th>
									<th>OLT RX</th>
									<th>ONU TX</th>
									<th>ONU RX</th>
									<th>Type ONU</th>
									<th>Version ID</th>
									<th>Traffic Up</th>
									<th>Traffic Down</th>
									<th>Framed IP</th>
									<th>MAC Address</th>
									<th>Last Seen</th>
									<th>Acc Start</th>
									<th>Acc Stop</th>
									<th>Acc Session</th>
									<th>UP</th>
									<th>DOWN</th>
									<th>Status Koneksi</th>
									<th>NAS IP</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($ibooster)) : ?>
									<?php $no = 1; foreach ($ibooster as $i) : ?>
										<tr class="text-center align-middle">
											<td><?= $no++; ?></td>
											<td><?= $i->nd_inet; ?></td>
											<td><?= $i->ip_embassy; ?></td>
											<td><?= $i->type_olt; ?></td>
											<td><?= $i->cid; ?></td>
											<td><?= $i->ip_ne; ?></td>
											<td><?= $i->adsl_link_status; ?></td>
											<td><?= $i->line_rate_1; ?></td>
											<td><?= $i->snr_1; ?></td>
											<td><?= $i->attenuation_1; ?></td>
											<td><?= $i->attainable_rate_1; ?></td>
											<td><?= $i->line_rate_2; ?></td>
											<td><?= $i->snr_2; ?></td>
											<td><?= $i->attenuation_2; ?></td>
											<td><?= $i->attainable_rate_2; ?></td>
											<td><?= $i->onu_link_status; ?></td>
											<td><?= $i->onu_serial_number; ?></td>
											<td><?= $i->fiber_length; ?></td>
											<td><?= $i->olt_tx; ?></td>
											<td><?= $i->olt_rx; ?></td>
											<td><?= $i->onu_tx; ?></td>
											<td><?= $i->onu_rx; ?></td>
											<td><?= $i->type_onu; ?></td>
											<td><?= $i->versionid; ?></td>
											<td><?= $i->traffic_profile_up; ?></td>
											<td><?= $i->traffic_profile_down; ?></td>
											<td><?= $i->framed_ip_address; ?></td>
											<td><?= $i->mac_address; ?></td>
											<td><?= $i->last_seen; ?></td>
											<td><?= $i->accstarttime; ?></td>
											<td><?= $i->accstoptime; ?></td>
											<td><?= $i->accessiontime; ?></td>
											<td><?= $i->up; ?></td>
											<td><?= $i->down; ?></td>
											<td><?= $i->status_koneksi; ?></td>
											<td><?= $i->nas_ip_address; ?></td>
											<td>
												<div class="d-inline-flex gap-1">
													<a href="<?= base_url('ibooster/edit/' . $i->no); ?>" class="btn btn-warning btn-sm">Edit</a>
													<a href="#" data-href="<?= base_url('ibooster/delete/' . $i->no); ?>" class="btn btn-danger btn-sm tombol-hapus">Hapus</a>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php else : ?>
									<tr><td colspan="37" class="text-center">Tidak ada data.</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div> <!-- end table-responsive -->
				</div>
			</div>
		</div>
	</div>
</main>
