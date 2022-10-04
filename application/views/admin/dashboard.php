    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <?php if( $this->session->userdata('role_name') == 'Admin' ): ?>
            <div class="col-lg-lg-4 col-md-4 col-sm-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-secondary"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Admin</span>
                  <span class="info-box-number"><?= $users ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-lg-4 col-md-4 col-sm-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-success"><i class="fas fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data SPBU</span>
                  <span class="info-box-number"><?= $station ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-lg-4 col-md-4 col-sm-12">
              <div class="info-box shadow-sm">
                <span class="info-box-icon bg-info"><i class="fas fa-th"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Jenis Bahan Bakar</span>
                  <span class="info-box-number"><?= $fuel ?></span>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <div class="col-12">
              <div class="card">
                <div class="card-body text-center">
                  <h3>SELAMAT DATANG DI HALAMAN ADMIN</h3>
                  <p class="mt-5"><b>SISTEM INFORMASI CAPERTE<br>PENDATAAN STASIUN PENGISIAN BAHAN BAKAR UMUM</b></p>
                </div>
              </div>
            </div>
            <?php if( $this->session->userdata('role_name') == 'Uadmin' && $station ): ?>
              <div class="col-3">
                <div class="card">
                  <div class="card-body">
                    <img src="<?= base_url('uploads/station/') . $station->image ?>" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="col-3">
                <form action="<?= base_url('admin/station/ubah') ?>" method="post">
                  <div class="card">
                    <div class="card-body">
                      <input type="hidden" name="id" id="id" value="<?= $station->id ?>">
                      <input type="hidden" name="user_id" id="user_id" value="<?= $station->user_id ?>">
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $station->nama ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Longitudinal</label>
                        <input type="text" class="form-control" name="longi" id="longi" value="<?= $station->longi ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Latitude</label>
                        <input type="text" class="form-control" name="lat" id="lat" value="<?= $station->lat ?>">
                      </div>
                      <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"><?= $station->alamat ?></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-primary">Ubah Data SPBU</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h5>Daftar Stok Bahan Bakar</h5>
                    <a href="<?= base_url('admin/station/detail/') . $station->id ?>" class="btn btn-sm btn-outline-secondary">Update Stok</a>
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-data">
                      <thead>
                        <th>No.</th>
                        <th>Nama Bahan Bakar</th>
                        <th>Harga</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <?php $number = 1; foreach ($stocks as $stock) {  ?>
                          <tr>
                            <td><?= $number ?></td>
                            <td><?= $stock->nama_bahan_bakar ?></td>
                            <td><?= $stock->harga ?></td>
                            <td><?= $status[$stock->status] ?></td>
                          </tr>                        
                        <?php $number++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>