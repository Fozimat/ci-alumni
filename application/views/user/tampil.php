<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">User</h1>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card-shadow">
				<div class="card-body">
					<!-- DataTales Example -->
		          <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h4 class="m-0 font-weight-bold text-primary">Daftar User
		              <a class="btn btn-info float-right ml-3" href="<?= base_url('user/cetak'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak</a>
		              <a class="btn btn-primary float-right" href="<?= base_url('user/tambah'); ?>"><i class="fa fa-user-plus"></i> Add User </a>
		              </h4>
		            </div>
		            <div class="card-body">
		                <table class="table table-bordered display nowrap" id="example" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
			                  	<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Status</th>
								<th>Date Created</th>
								<th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody>
									<?php 
									$no = 1;
									foreach($row->result() as $data) : ?>	
										<tr>
											<td><?= $no++; ?></td>
											<td><?= $data->name; ?></td>
											<td><?= $data->email; ?></td>
											<td><?= $data->role_id == 1 ? 'Administrator' : 'Member'; ?></td>
											<td class="text-center"><?= $data->is_active == 1 ? '<div class="text-success">Active</div>' : '<div class="text-danger">Not Active</div>'; ?></td>
											<td><?= date('d M Y H:i:s', $data->date_created); ?></td>
											<td class="text-center"><?= $data->is_active == 1 ? "<a class='badge badge-danger' href='".site_url('user/deactivate/'.$data->id)."'>Deactivate</a>" : 
																			"<a class='badge badge-success' href='".site_url('user/activate/'.$data->id)."'>Activate</a>" ?> |
																				<a class='badge badge-warning' href='<?= site_url("user/edit/".$data->id) ;?>'>Edit</a> |
																				<a class='badge badge-danger tombol-hapus-user' href='<?= site_url("user/delete/".$data->id) ;?>'>Delete</a>
																			</td>
										</tr>
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
