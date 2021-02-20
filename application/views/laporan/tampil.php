<div class="container-fluid">
	<!-- flash data -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">

	</div>
	<!-- end -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0 text-gray-800">Laporan</h1>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card-shadow">
				<div class="card-body">
					<!-- DataTales Example -->
		          <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h4 class="m-0 font-weight-bold text-primary">Laporan Alumni per tahun kelulusan
		              </h4>
		            </div>

		            <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                            <form action="<?= base_url('laporan/cetakTahun'); ?>" method="post"  target="_blank">
	                            <!-- <h5 class="m-2 font-weight-bold text-dark">Laporan Alumni/tahun
			                    </h5> -->
	                                <div class="input-group mb-3">
	                                    <div class="input-group-prepend">
	                                        <label class="input-group-text" for="tahun">Pilih</label>
	                                    </div>
	                                    <select class="custom-select tahun" id="tahun" name="tahun">
	                                    <?php
	                                    $tahun = $this->db->query('SELECT DISTINCT tahun_lulus FROM tabel_alumni ORDER BY tahun_lulus ASC');
	                                    	foreach($tahun->result() as $t)  {
	                                    		echo '<option value="'.$t->tahun_lulus.'">'.$t->tahun_lulus.'</option>';
	                                    	}
	                                     ?>
	                                    </select>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
                            </form>


                            

                            
                            
                    </div>
                    
		            </div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card-shadow">
				<div class="card-body">
					<!-- DataTales Example -->
		          <div class="card shadow mb-4">
		            <div class="card-header py-3">
		              <h4 class="m-0 font-weight-bold text-primary">Laporan Alumni Keseluruhan
		              </h4>
		            </div>

		            <div class="card-body">
                  <div class="row">
											<div class="col-12">

													<a class="btn btn-info btn-block" href="<?= base_url('alumni/cetakAlumni'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak Semua</a>

											</div>  
                   	</div>
                    
		            </div>
				</div>
			</div>
		</div>
	</div>


	

</div>


