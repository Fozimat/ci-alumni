<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
			
			
			<?= form_open_multipart('pengaturan/password'); ?>
						<input type="hidden" name="id" value="<?= $admin->id; ?>">
				
				<div class="alert alert-danger text-center" role="alert">
					Isi form di bawah ini hanya bila Anda hendak mengubah password
				</div>
				<div class="form-group row">
					<label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="pass_lama" name="pass_lama">
						<?= form_error('pass_lama');?>
					</div>
				</div>
				<div class="form-group row">
					<label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="pass_baru" name="pass_baru">
						<?= form_error('pass_baru');?>
					</div>
				</div>
				<div class="form-group row">
					<label for="ulangi_pass" class="col-sm-3 col-form-label">Ulangi Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="ulangi_pass" name="ulangi_pass">
						<?= form_error('ulangi_pass');?>
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
