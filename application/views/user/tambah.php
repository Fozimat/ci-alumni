<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<!-- end -->

	<div class="row">
		<div class="col-lg-12">
			<div class="card-shadow">
				<div class="card-body">
					<!-- DataTales Example -->
		          <div class="card shadow mb-4">
		            <div class="card-header py-3">
						<h4 class="m-0 font-weight-bold text-danger">Tambah User
						<a href="<?= base_url('user'); ?>" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Kembali</a>
						</h4>
		            </div>
		            <div class="card-body">
		            	<div class="row">
		            		<div class="offset-md-3 col-md-6">
				                <form action="" method="post">
				                	<div class="form-group">
				                		<label for="name" class="hitam-tebal">Nama</label>
				                		<input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>">
				                		<?= form_error('name'); ?>
				                	</div>
				                	<div class="form-group">
				                		<label for="email" class="hitam-tebal">Email</label>
				                		<input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
				                		<?= form_error('email'); ?>
				                	</div>
				                	<div class="form-group">
				                		<label for="password" class="hitam-tebal">Password</label>
				                		<input type="password" class="form-control" name="password" id="password">
				                		<?= form_error('password'); ?>
				                	</div>
				                	<div class="form-group">
				                		<label for="passconf" class="hitam-tebal">Konfirmasi Password</label>
				                		<input type="password" class="form-control" name="passconf" id="passconf">
				                		<?= form_error('passconf'); ?>
				                	</div>
				                	<div class="form-group">
				                		<button type="submit" class="btn btn-primary"><i class="fa fa-plane"> Save</i></button>
				                		<button type="reset" class="btn btn-info"><i class="fa fa-times"> Reset</i></button>
				                	</div>
				                </form>
		            			
		            		</div>
		            	</div>
		            </div>
		          </div>
				</div>
			</div>
		</div>
	</div>
</div>
