    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?= $page ?></h1>
              <?php if( $this->session->userdata('role_name') == 'Admin' ): ?>
              <a href="<?= base_url('admin/station') ?>" class="btn btn-sm btn-outline-secondary">Kembali</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <form action="<?= base_url('admin/station/change_image') ?>" method="post" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-body">
                    <input type="hidden" name="id" id="id" value="<?= $station->id ?>">
                    <img src="<?= base_url('uploads/station/') . $station->image ?>" alt="" class="img-fluid">
                    <div class="form-group mt-2">
                      <label for="">Gambar</label>
                      <input type="file" name="image" id="image" class="form-control" multiple="multiple">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Ubah Gambar</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-8">
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Daftar Stok Bahan Bakar</h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-tambah-stock">Tambah Stok Bahan Bakar</button>
                  <div class="modal fade" id="modal-tambah-stock">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/stock/tambah') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah Stok Bahan Bakar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="station_id" id="station_id" value="<?= $station->id ?>">
                            <div class="form-group">
                              <label for="">Bahan Bakar</label>
                              <select name="fuel_id" id="fuel_id" class="form-control">
                                <?php foreach ($fuels as $fuel) { ?>
                                  <option value="<?= $fuel->id ?>"><?= $fuel->nama ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="">Harga</label>
                              <input type="number" class="form-control" name="harga" id="harga">
                            </div>
                            <div class="form-group">
                              <label for="">Status</label>
                              <select name="status" id="status" class="form-control">
                                <?php for ($i=0; $i < count($status); $i++) { ?>
                                  <option value="<?= $i ?>"><?= $status[$i] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah Stok Bahan Bakar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-striped table-hover table-data">
                    <thead>
                      <th>No.</th>
                      <th>Nama Bahan Bakar</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) {  ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->nama_bahan_bakar ?></td>
                          <td><?= $data->harga ?></td>
                          <td><?= $status[$data->status] ?></td>
                          <td>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-ubah-stock-<?= $data->id ?>">Ubah</button>
                            <div class="modal fade" id="modal-ubah-stock-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/stock/ubah') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Ubah Stok Bahan Bakar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="station_id" id="station_id" value="<?= $station->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" class="form-control" name="harga" id="harga" value="<?= $data->harga ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="status" class="form-control">
                                          <?php for ($i=0; $i < count($status); $i++) { ?>
                                            <option <?php if( $data->status == $i ) echo 'selected' ?> value="<?= $i ?>"><?= $status[$i] ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Ubah Stok Bahan Bakar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-hapus-stock-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-hapus-stock-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/stock/hapus') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus Stok Bahan Bakar</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="station_id" id="station_id" value="<?= $station->id ?>">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus data stok <?= $data->nama_bahan_bakar ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus Stok Bahan Bakar</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>                        
                      <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>