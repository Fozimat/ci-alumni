<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-admin="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
			
			
			<?= form_open_multipart('pengaturan'); ?>
						<input type="hidden" name="id" value="<?= $admin->id; ?>">
				<div class="form-group row">
					<label for="username" class="col-sm-3 col-form-label">Username</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="username" name="username" value="<?= $admin->username; ?>" readonly>
						<?= form_error('username');?>
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="email" name="email" value="<?= $admin->email; ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama" class="col-sm-3 col-form-label">Nama</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="nama" name="nama" value="<?= $admin->nama; ?>">
						<?= form_error('nama');?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3">Gambar</div>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-3">
								<img src="<?= base_url('upload/admin/') .$admin->foto; ?>" class="img-thumbnail">
							</div>
							<div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="foto" name="foto">
									<input type="hidden" name="gambar_lama" value="<?php echo $admin->foto; ?>" />
									<label for="foto" class="custom-file-label">Choose file</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row justify-content-end">
					<div class="col-sm-9">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</div>	

				

			</form>


		</div>
	</div>

</div>
