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
						<h4 class="m-0 font-weight-bold text-danger">Tambah Alumni
						<a href="<?= base_url('alumni'); ?>" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Kembali</a>
						</h4>
		            </div>
		            <div class="card-body">
		            	<div class="row">
		            		<div class="offset-md-3 col-md-6">
				                <form action="<?= base_url('alumni/tambah'); ?>" method="post" enctype="multipart/form-data">
				                	<div class="form-group">
				                		<label for="nisn" class="hitam-tebal">NISN</label>
				                		<input type="text" class="form-control" name="nisn" id="nisn" value="<?= set_value('nisn'); ?>" autocomplete="off">
				                		<?= form_error('nisn'); ?>
				                	</div>
				                	<div class="form-group">
				                		<label for="nama" class="hitam-tebal">Nama Lengkap</label>
				                		<input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>" autocomplete="off">
				                		<?= form_error('nama'); ?>
				                	</div>
									<div class="form-group">
										<label for="nama" class="hitam-tebal">Jenis Kelamin</label>
										<select class="form-control" required name="jk">
											<option>--Pilih Jenis Kelamin --</option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
									</div>
									<div class="form-group">
				                		<label for="tahun_masuk" class="hitam-tebal">Tahun Masuk</label>
				                		<input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" value="<?= set_value('tahun_masuk'); ?>" autocomplete="off">
				                		<?= form_error('tahun_masuk'); ?>
				                	</div>
                                    <div class="form-group">
				                		<label for="tahun_lulus" class="hitam-tebal">Tahun Lulus</label>
				                		<input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" value="<?= set_value('tahun_lulus'); ?>" autocomplete="off">
				                		<?= form_error('tahun_lulus'); ?>
				                	</div>
									<div class="form-group">
				                		<label for="tempat_lahir" class="hitam-tebal">Tempat Lahir</label>
				                		<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" autocomplete="off">
				                		<?= form_error('tempat_lahir'); ?>
				                	</div>
									<div class="form-group">
				                		<label for="tgl_lahir" class="hitam-tebal">Tanggal Lahir</label>
				                		<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
				                		<?= form_error('tgl_lahir'); ?>
				                	</div>
                                    <div class="form-group">
				                		<label for="email" class="hitam-tebal">E-mail</label>
				                		<input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" autocomplete="off">
				                		<?= form_error('email'); ?>
				                	</div>
                                    <div class="form-group">
				                		<label for="alamat" class="hitam-tebal">Alamat</label>
				                		<input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>" autocomplete="off">
				                		<?= form_error('alamat'); ?>
				                	</div>
                                    <div class="form-group">
				                		<label for="no_telp" class="hitam-tebal">No Telp</label>
				                		<input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= set_value('no_telp'); ?>" autocomplete="off">
				                		<?= form_error('no_telp'); ?>
				                	</div>

									<div class="form-group">
				                		<label for="username" class="hitam-tebal">Username</label>
				                		<input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>" autocomplete="off">
				                		<?= form_error('username'); ?>
				                	</div>

				                	<div class="form-group">
				                		<label for="password1" class="hitam-tebal">Password</label>
				                		<input type="password" class="form-control" name="password1" id="password1" value="<?= set_value('password1'); ?>" autocomplete="off">
				                		<?= form_error('password1'); ?>
				                	</div>

				                	<div class="form-group">
				                		<label for="password2" class="hitam-tebal">Konfirmasi Password</label>
				                		<input type="password" class="form-control" name="password2" id="password2" value="<?= set_value('password2'); ?>" autocomplete="off">
				                		<?= form_error('password2'); ?>
				                	</div>

                                    <div class="form-group">
				                		<label for="foto" class="hitam-tebal">Foto</label>
                                        <br>
				                		<!-- <input type="file"  name="foto" id="foto"> -->
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="foto" name="foto">
												<label for="image" class="custom-file-label">Pilih foto</label>
												<i class="text-danger pl-1" style="font-size:16px;">Maksimal ukuran foto 1 MB (jpg,png,jpeg,gif)</i>
											</div>
				                		<?= form_error('foto'); ?>
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
