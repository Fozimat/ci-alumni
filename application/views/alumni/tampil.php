<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Alumni</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card-shadow">
				<div class="card-body">
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h4 class="m-0 font-weight-bold text-primary">Data Alumni
								<a class="btn btn-info float-right ml-3" href="<?= base_url('alumni/cetakAlumni'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak Semua</a>
								<a class="btn btn-primary float-right" href="<?= base_url('alumni/tambah'); ?>"><i class="fa fa-user-plus"></i> Tambah Alumni </a>
							</h4>
						</div>
						<div class="card-body">
							<table class="table table-bordered display nowrap" id="example" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>#</th>
										<th>NISN</th>
										<th>Nama</th>
										<th>Tahun Lulus</th>
										<th>Foto</th>
										<!-- <th>Status</th>
													<th>Aktivasi</th> -->
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($row->result() as $data) : ?>
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $data->nisn; ?></td>
											<td><?= $data->nama; ?></td>
											<td class="text-center"><?= $data->tahun_lulus; ?></td>
											<td class="text-center"><img width="100px" height="100px" alt="no-image" src=<?= base_url('upload/alumni/' . $data->foto); ?>></td>
											<!-- <td class="text-center"><b><?= $data->status == 1 ? '<div class="text-success">Aktif</div>' : '<div class="text-danger">Non-aktif</div>'; ?></b></td>
											<td class="text-center">
													<?= $data->status == 1 ? "<a class='badge badge-danger' href='" . site_url('alumni/nonaktif/' . $data->nisn) . "'>Non-aktfikan</a>" :
														"<a class='badge badge-success' href='" . site_url('alumni/aktif/' . $data->nisn) . "'>Aktifkan</a>" ?>
											</td> -->
											<td class="text-center">
												<a class='badge badge-warning' href='<?= site_url("alumni/detail/" . $data->id); ?>'>Detail</a>
												<a class='badge badge-primary' href='<?= site_url("alumni/edit/" . $data->id); ?>'>Edit</a>
												<a class='badge badge-danger tombol-hapus-user' href='<?= site_url("alumni/hapus/" . $data->id); ?>'>Hapus</a>
												<a class='badge badge-info' target="_blank" href='<?= site_url("alumni/cetakAlumniSatu/" . $data->id); ?>'>Cetak</a>
											</td>
										<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>