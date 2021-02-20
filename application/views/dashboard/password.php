<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
	</div>

	<div class="row">
		<div class="col-lg-8">
			
			<?= $this->session->flashdata('sukses'); ?>
			<form action="" method="post">
				<input type="hidden" name="id" value="<?= $alumni['id']; ?>">
				
				<div class="alert alert-danger text-center" role="alert">
					Isi form di bawah ini hanya bila Anda hendak mengubah password
				</div>
				<div class="form-group row">
					<label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password_lama" name="password_lama">
						<?= form_error('password_lama');?>
					</div>
				</div>
				<div class="form-group row">
					<label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password_baru" name="password_baru">
						<?= form_error('password_baru');?>
					</div>
				</div>
				<div class="form-group row">
					<label for="password_baru2" class="col-sm-3 col-form-label">Ulangi Password</label>
					<div class="col-sm-9">
						<input type="password" class="form-control" id="password_baru2" name="password_baru2">
						<?= form_error('password_baru2');?>
					</div>
				</div>

				<div class="form-group row justify-content-end">
					<div class="col-sm-9">
						<button type="submit" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></button>
					</div>
				</div>	

				

			</form>


		</div>
	</div>

</div>
