const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
		title: 'Data',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

// const flashAlumni = $('.alumni-data').data('alumni');
// if (flashAlumni) {
// 	Swal.fire({
// 		title: 'Alumni',
// 		text: 'Berhasil ' + flashAlumni,
// 		type: 'success'
// 	});
// }
