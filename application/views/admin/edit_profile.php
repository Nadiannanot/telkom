<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

	<div class="row">
		<div class="col-lg-8">

			<form action="<?= base_url('admin/editProfile'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group mb-3 row">
					<label for="name" class="col-sm-3 col-form-label">Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="name" name="name"
							value="<?= set_value('name', $user['name']); ?>" required>
						<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
				</div>

				<div class="form-group mb-3 row">
					<label for="email" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="email" name="email"
							value="<?= set_value('email', $user['email']); ?>" readonly>
					</div>
				</div>

				<div class="form-group mb-3 row">
					<label for="foto" class="col-sm-3 col-form-label">Profile Image</label>
					<div class="col-sm-9">
						<div class="custom-file mb-2">
							<input type="file" class="form-control" id="foto" name="foto">
						</div>
						<?php if (!empty($user['foto'])): ?>
							<img id="preview" src="<?= base_url('assets/img/profile/' . $user['foto']); ?>" alt="Profile Image"
								class="img-thumbnail mt-2" style="width: 150px;">
						<?php endif; ?>
					</div>
				</div>

				<div class="form-group row mt-4">
					<div class="col-sm-9 offset-sm-3">
						<button type="submit" class="btn btn-primary">Update Profile</button>
						<a href="<?= base_url('admin/profile'); ?>" class="btn btn-secondary">Cancel</a>
					</div>
				</div>
			</form>

		</div>
	</div>

</div>
<!-- /.container-fluid -->