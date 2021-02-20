$('.tombol-hapus-user').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Data alumni akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
		title: 'Data alumni ',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

// pesan

$('.tombol-hapus-pesan').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "Data pesan akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

const flashPesan = $('.flash-data').data('pesan');
if (flashPesan) {
	Swal.fire({
		title: 'Data Pesan ',
		text: 'Berhasil ' + flashPesan,
		type: 'success'
	});
}

// profil admin
const flashAdmin = $('.flash-data').data('admin');
if (flashAdmin) {
	Swal.fire({
		title: 'Data Profil ',
		text: 'Berhasil ' + flashAdmin,
		type: 'success'
	});
}

