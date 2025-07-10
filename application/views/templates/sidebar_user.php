<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-home"></i>
		</div>
		<div class="sidebar-brand-text mx-2"> TELKOM AKSES TEGAL </div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider ">

	<!-- Query Menu -->
	<?php
	$role_id = $this->session->userdata('role_id');
	$queryMenu = "SELECT `user_menu`.`id`, `user_menu`.`menu`
				  FROM `user_menu` 
				  JOIN `user_access_menu`
				  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
				  WHERE `user_access_menu`.`role_id` = $role_id
				  ORDER BY `user_menu`.`id` ASC";

	$menu = $this->db->query($queryMenu)->result_array();
	?>

	<!-- LOOPING MENU -->
	<?php foreach ($menu as $m) : ?>
		<div class="sidebar-heading">
			<?= $m['menu']; ?>
		</div>

		<!-- SIAPKAN SUB-MENU SESUAI MENU -->
		<?php
		$menuId = $m['id'];
		$querySubMenu = "SELECT * FROM `user_sub_menu` 
						 JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
						 WHERE `user_sub_menu`.`menu_id` = $menuId
						 AND `user_sub_menu`.`is_active` = 1";
		$subMenu = $this->db->query($querySubMenu)->result_array();
		?>

		<?php foreach ($subMenu as $sm) : ?>
			<li class="nav-item <?= ($title == $sm['title']) ? 'active' : ''; ?>">
				<a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
					<i class="fas fa-tachometer-alt"></i>
					<span><?= $sm['title']; ?></span>
				</a>
			</li>
		<?php endforeach; ?>

		<hr class="sidebar-divider mt-3">
	<?php endforeach; ?>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Order -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('orderuser') ?>">
			<i class="fas fa-phone-volume"></i>
			<span>Order</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Segment Close -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('userseqclose') ?>">
			<i class="fas fa-tty"></i>
			<span>Segment Close</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Teknisi -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('userteknisi') ?>">
			<i class="fas fa-rss"></i>
			<span>Teknisi</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Jadwal -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('userjadwal') ?>">
			<i class="fas fa-laptop"></i>
			<span>Jadwal</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		USER
	</div>

	<!-- Nav Item - Profile -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('user/profile'); ?>">
			<i class="fas fa-user"></i>
			<span>MY PROFILE</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Nav Item - Logout -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('auth/logout'); ?>" data-toggle="collapse" data-target="#collapseTwo"
			aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-sign-out-alt"></i>
			<span>logout</span>
		</a>

		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Custom Components:</h6>
				<a class="collapse-item" href="buttons.html">Buttons</a>
				<a class="collapse-item" href="cards.html">Cards</a>
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
