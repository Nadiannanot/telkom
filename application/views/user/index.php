<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="card mb-3" style="max-width: 540px;">
		<div class="row g-0">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" class="img-fluid rounded-start">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><?= $user['name']; ?></h5>
					<p class="card-text"><?= $user['email']; ?></p>
					<p class="card-text">
						<small class="text-body-secondary">
							Member since <?= date('d F Y', strtotime($user['createdAt'])); ?>
						</small>
					</p>
				</div>
			</div>
		</div>
	</div>

</div>