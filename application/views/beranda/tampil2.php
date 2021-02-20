
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <div class="post-preview">
        <div class="card-shadow">
          <div class="card-body">
            <!-- DataTales Example -->
                <div class="card shadow mb-4">

                  <div class="card-body">
                      <table class="table table-bordered display nowrap" id="example" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Lulus</th>
                            <th>Foto</th>
                          </tr>
                        </thead>
                          <tbody>
                          <?php 
                            $no = 1;
                            foreach($row->result() as $data) : ?>	
                              <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data->nisn; ?></td>
                                <td><?= $data->nama; ?></td>
                                <td><?= $data->tahun_masuk; ?></td>
                                <td><?= $data->tahun_lulus; ?></td>
                                <td><img width="100px" alt="no-image" src=<?= base_url('upload/alumni/'.$data->foto);?>></td>
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