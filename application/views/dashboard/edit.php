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
		            <div class="card-header py-3 bg-primary">
						<h4 class="m-0 font-weight-bold text-light">Edit Profil

						</h4>
		            </div>
		            <div class="card-body">
		            	<div class="row">
		            		<div class="offset-md-3 col-md-6">
				                <form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?= $alumni->id; ?>">
										<input type="hidden" name="tgl_daftar" value="<?= $alumni->tgl_daftar; ?>">
				                	<div class="form-group">
				                		<label for="nisn" class="hitam-tebal">NISN</label>
				                		<input type="text" class="form-control" name="nisn" id="nisn" value="<?=$alumni->nisn; ?>">
				                		<?= form_error('nisn'); ?>
				                	</div>
				                	<div class="form-group">
				                		<label for="nama" class="hitam-tebal">Nama Lengkap</label>
				                		<input type="text" class="form-control" name="nama" id="nama" value="<?=$alumni->nama; ?>">
				                		<?= form_error('nama'); ?>
				                	</div>
										<div class="form-group">
											<label for="nama" class="hitam-tebal">Jenis Kelamin</label>
											<select class="form-control" required name="jk">
												<?php foreach( $jenis as $jk ) : ?>
													<?php if( $jk == $alumni->jk ) : ?>
														<option value="<?= $jk; ?>" selected><?= $jk; ?></option>
													<?php else : ?>
														<option value="<?= $jk; ?>"><?= $jk; ?></option>
													<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</div>
									<div class="form-group">
				                		<label for="tahun_masuk" class="hitam-tebal">Tahun Masuk</label>
				                		<input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" value="<?=$alumni->tahun_masuk; ?>">
				                		<?= form_error('tahun_masuk'); ?>
				                	</div>
                            <div class="form-group">
				                		<label for="tahun_lulus" class="hitam-tebal">Tahun Lulus</label>
				                		<input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" value="<?=$alumni->tahun_lulus; ?>">
				                		<?= form_error('tahun_lulus'); ?>
				                	</div>
													<div class="form-group">
				                		<label for="tempat_lahir" class="hitam-tebal">Tempat Lahir</label>
				                		<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?=$alumni->tempat_lahir; ?>">
				                		<?= form_error('tempat_lahir'); ?>
				                	</div>
													<div class="form-group">
				                		<label for="tgl_lahir" class="hitam-tebal">Tanggal Lahir</label>
				                		<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?=$alumni->tgl_lahir; ?>">
				                		<?= form_error('tgl_lahir'); ?>
				                	</div>
                             <div class="form-group">
				                		<label for="no_telp" class="hitam-tebal">No Telp</label>
				                		<input type="text" class="form-control" name="no_telp" id="no_telp" value="<?=$alumni->no_telp; ?>">
				                		<?= form_error('no_telp'); ?>
				                	</div>
                             <div class="form-group">
				                		<label for="alamat" class="hitam-tebal">Alamat</label>
				                		<input type="text" class="form-control" name="alamat" id="alamat" value="<?=$alumni->alamat; ?>">
				                		<?= form_error('alamat'); ?>
				                	</div>
                            <div class="form-group">
				                		<label for="email" class="hitam-tebal">E-mail</label>
				                		<input type="text" class="form-control" name="email" id="email" value="<?=$alumni->email; ?>">
				                		<?= form_error('email'); ?>
				                	</div>
		                	<div class="form-group">
		                		<label for="username" class="hitam-tebal">Username</label>
		                		<input type="text" class="form-control" name="username" id="username" value="<?=$alumni->username; ?>" readonly>
		                		<?= form_error('username'); ?>
		                	</div>
                            
                          <div class="form-group">
				                		<label for="foto" class="hitam-tebal">Foto</label>
                            <br>
							<div class="row">
								<div class="col-sm-3">
									<img src="<?= base_url('upload/alumni/') .$alumni->foto; ?>" class="img-thumbnail">
								</div>
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="foto" name="foto">
										<label for="image" class="custom-file-label">Pilih foto</label>
										<input type="hidden" name="gambar_lama" value="<?php echo $alumni->foto; ?>" />
										<i class="text-danger pl-1" style="font-size:16px;">*Kosongkan bila tidak ingin mengganti foto</i>
									</div>
								</div>
							</div>
							
							<!-- <input type="file"  name="foto" id="foto" value=""> -->
							<?= form_error('foto'); ?>
											<br>
							<button type="submit" class="btn btn-primary"><i class="fa fa-plane"> Edit</i></button>
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
