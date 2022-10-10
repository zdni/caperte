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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5>Daftar <?= $page ?></h5>
                  <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#modal-tambah-station">Tambah <?= $page ?></button>
                  <div class="modal fade" id="modal-tambah-station">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?= base_url('admin/station/tambah') ?>" method="post">
                          <div class="modal-header">
                            <h4 class="modal-title">Tambah <?= $page ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Nama</label>
                              <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                              <button type="button" class="btn btn-sm btn-secondary" id="btn-get-location" name="btn-get-location">Dapatkan Lokasi Saat Ini</button>
                            </div>
                            <div class="form-group">
                              <label for="">Longitude</label>
                              <input type="text" class="form-control" name="longi" id="longi">
                            </div>
                            <div class="form-group">
                              <label for="">Latitude</label>
                              <input type="text" class="form-control" name="lat" id="lat">
                            </div>
                            <div class="form-group">
                              <label for="">Alamat</label>
                              <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Admin</label>
                              <select name="user_id" id="user_id" class="form-control">
                                <option value="">-- Pilih Admin --</option>
                                <?php foreach ($users as $user) { ?>
                                  <option value="<?= $user->id ?>"><?= $user->name ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah <?= $page ?></button>
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
                      <th>Nama SPBU</th>
                      <th>Alamat</th>
                      <!-- <th>Long/Lat</th> -->
                      <th>Admin</th>
                      <th>Aksi</th>
                    </thead>
                    <tbody>
                      <?php $number = 1; foreach ($datas as $data) {  ?>
                        <tr>
                          <td><?= $number ?></td>
                          <td><?= $data->nama ?></td>
                          <td><?= $data->alamat ?></td>
                          <!-- <td><?= $data->longi . '/' . $data->lat ?></td> -->
                          <td><?= $data->uadmin_name ?></td>
                          <td>
                            <a href="<?= base_url('admin/station/detail/') . $data->id ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="modal" data-target="#modal-ubah-station-<?= $data->id ?>">Ubah</button>
                            <div class="modal fade" id="modal-ubah-station-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/station/ubah') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Ubah <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data->nama ?>">
                                      </div>
                                      <div class="col-12">
                                        <button class="btn btn-sm btn-secondary">Dapatkan Lokasi Saat Ini</button>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Longitude</label>
                                        <input type="text" class="form-control" name="longi" id="longi" value="<?= $data->longi ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Latitude</label>
                                        <input type="text" class="form-control" name="lat" id="lat" value="<?= $data->lat ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control"><?= $data->alamat ?></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Admin</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                          <option value="">-- Pilih Admin --</option>
                                          <?php foreach ($users as $user) { ?>
                                            <option <?php if( $user->id == $data->user_id ) echo 'selected' ?> value="<?= $user->id ?>"><?= $user->name ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-primary">Ubah <?= $page ?></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <button class="btn btn-sm btn-outline-danger" type="button" data-toggle="modal" data-target="#modal-hapus-station-<?= $data->id ?>">Hapus</button>
                            <div class="modal fade" id="modal-hapus-station-<?= $data->id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <form action="<?= base_url('admin/station/hapus') ?>" method="post">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Hapus <?= $page ?></h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <input type="hidden" name="id" id="id" class="form-control" required value="<?= $data->id ?>">
                                      <p>Yakin ingin menghapus SPBU <?= $data->nama ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn btn-sm btn-danger">Hapus <?= $page ?></button>
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


    <script>
      const btnGetLocation = document.querySelector('#btn-get-location');

      btnGetLocation.addEventListener('click', function(){
        const self = this;
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
          const parentElement = self.parentElement;
          const divLng = parentElement.nextElementSibling;
          const divLat = divLng.nextElementSibling;

          const inputLng = divLng.children[1];
          const inputLat = divLat.children[1];

          let lat = position.coords.latitude;
          let lng = position.coords.longitude;
          
          inputLat.value = lat;
          inputLng.value = lng;
        }
      });
    </script>