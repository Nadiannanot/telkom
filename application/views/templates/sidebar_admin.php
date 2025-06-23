<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">

		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fa-solid fa-wifi"></i>
		</div>
		<div class="sidebar-brand-text mx-2"> TELKOM AKSES TEGAL </div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider ">

	<!-- Heading -->
	<div class="sidebar-heading">
		ADMINISTRATOR
	</div>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('admin'); ?>">

			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		OPERASIONAL
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href=" ?= base_url('') ?> " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="text-decoration: none; display: flex; align-items: center;">
			<i class="fa-solid fa-pen-fancy"></i>
			<span>MASTER OPERASIONAL</span>
		</a>

		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<!-- <h6 class="collapse-header">Custom Components:</h6> -->
				<a class="collapse-item" href="<?= base_url('order') ?>">Data Order</a>
				<a class="collapse-item" href="<?= base_url('seqclose') ?>">Data segment close</a>
				<a class="collapse-item" href="<?= base_url('teknisi') ?>">Data Teknisi</a>
				<a class="collapse-item" href="<?= base_url('jadwal') ?>">Data jadwal Operasi</a>
				<a class="collapse-item" href="<?= base_url('sektor') ?>">Data Sektor</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		UNSPEC
	</div>
	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href=" ?= base_url('') ?> " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="text-decoration: none; display: flex; align-items: center;">
			<i class="fa-solid fa-poo-storm"></i>
			<span>MASTER UNSPEC</span>
		</a>

		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<!-- <h6 class="collapse-header">Custom Components:</h6> -->
				<a class="collapse-item" href="<?= base_url('uslis') ?>">Data STO </a>
				<a class="collapse-item" href="<?= base_url('semesta') ?>">Data UNSPEC</a>
				<a class="collapse-item" href="<?= base_url('cp') ?>">Kontak person</a>
				<a class="collapse-item" href="<?= base_url('saldo') ?>">Saldo Harian</a>
				<a class="collapse-item" href="<?= base_url('ibooster') ?>">Daftar Tsel</a>
			</div>
		</div>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->