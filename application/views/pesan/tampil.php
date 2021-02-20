<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-pesan="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Pesan</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card-shadow">
				<div class="card-body">
					<!-- DataTales Example -->
		          <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h4 class="m-0 font-weight-bold text-primary">Pesan Masuk
		              </h4>
		            </div>
		            <div class="card-body">
                    <table class="table table-bordered display nowrap" id="example" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
			                  	<th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Pesan</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
		                    </tr>
		                  </thead>
		                  <tbody>
                            <?php 
                            $no = 1;
                            foreach($pesan->result() as $p) : ?>

							<tr>
                                <td><?= $no++; ?></td>
                                <td><?=$p->nama; ?></td>
                                <td><?=$p->email; ?></td>
                                <td><?=$p->pesan; ?></td>
                                <td><?=$p->jam; ?></td>
                                <td class="text-center">
                                    <?= $p->status == 1 ? "<a class='badge badge-success' href='".site_url('pesan/nonaktif/'.$p->id)."'>Sudah dibaca</a>" : 
                                    "<a class='badge badge-warning' href='".site_url('pesan/aktif/'.$p->id)."'>Belum Dibaca</a>" ?>
								</td>
                                <td class="text-center">
                                    <a class='badge badge-danger tombol-hapus-pesan' href='<?= site_url("pesan/hapus/".$p->id) ;?>'>Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
						  </tbody>

		                </table>
		            </div>
		          </div>
				</div>
			</div>
		</div>
	</div>
</div>
