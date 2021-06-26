$(document).ready(function () {
	const flashData = $(".flash-data").data("flashdata");

	if (flashData) {
		Swal.fire({
			title: "Sukses!",
			text: "Data Berhasil " + flashData,
			icon: "success",
		});
	}

	// Tombol hapus
	$(".tombol-hapus").on("click", function (e) {
		e.preventDefault();
		const href = $(this).attr("href");

		Swal.fire({
			title: "Hapus data?",
			text: "Aksi ini tidak bisa dibatalkan",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus Data!",
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});
});
