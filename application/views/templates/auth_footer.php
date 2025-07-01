<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Toastr -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Flashdata Toastr -->
<?php if ($this->session->flashdata('toastr-success')): ?>
<script>toastr.success("<?= $this->session->flashdata('toastr-success'); ?>");</script>
<?php endif; ?>
<?php if ($this->session->flashdata('toastr-error')): ?>
<script>toastr.error("<?= $this->session->flashdata('toastr-error'); ?>");</script>
<?php endif; ?>

<!-- SweetAlert2 Delete Button -->
<script>
document.addEventListener("DOMContentLoaded", function () {
	document.querySelectorAll('.tombol-hapus').forEach(function (button) {
		button.addEventListener('click', function (e) {
			e.preventDefault();
			const href = this.getAttribute('data-href');
			Swal.fire({
				title: 'Apakah anda yakin?',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Hapus'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = href;
				}
			});
		});
	});
});
</script>

</body>
</html>
