   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

      <div class="row">
         <div class="col-md-6">
            <?php if (validation_errors()) : ?>
               <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
               </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newSiswaModal" style="background-color: #00bfa5; color:white;">Tambah Data Siswa</a>
         </div>
         <div class="col-md-6">
            <form action="<?= base_url('admindtsiswa'); ?>" method="post">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Cari Data Siswa.." name="keyword" autocomplete="off" autofocus>
                  <div class="input-group-append">
                     <input class="btn btn-gradient" type="submit" name="submit" style="background-color: #00bfa5; color:white;">
                  </div>
               </div>
            </form>
         </div>
      </div>

      <div class="row">
         <div class="col-lg">
            <h6>Jumlah Data Siswa : <?= $total_rows; ?></h6>
            <table class=" table table-hover">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Nama</th>
                     <th scope="col">TTL</th>
                     <th scope="col">Jenis Kelamin</th>
                     <th scope="col">Kelompok</th>
                     <th scope="col">Status</th>
                     <th scope="col">Alamat</th>
                     <th scope="col">Nama Ayah</th>
                     <th scope="col">Nama Ibu</th>
                     <th scope="col">Tahun Ajaran</th>
                     <th scope="col">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (empty($siswa)) : ?>
                     <tr>
                        <td colspan="5">
                           <div class="alert alert-danger" role="alert">
                              Data Tidak Ditemukan!
                           </div>
                        </td>
                     </tr>
                  <?php endif; ?>
                  <?php foreach ($siswa as $sw) : ?>
                     <tr>
                        <th scope="row"><?= ++$start; ?></th>
                        <td><?= $sw['nama']; ?></td>
                        <td><?= $sw['ttl']; ?></td>
                        <td><?= $sw['jk']; ?></td>
                        <td><?= $sw['kelompok']; ?></td>
                        <td><?= $sw['status']; ?></td>
                        <td><?= $sw['alamat']; ?></td>
                        <td><?= $sw['ayah']; ?></td>
                        <td><?= $sw['ibu']; ?></td>
                        <td><?= $sw['thnajaran']; ?></td>
                        <td>
                           <a href="<?= base_url('admindtsiswa/ubahdatasiswa/') . $sw['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                           <a href="<?= base_url('admindtsiswa/hapusdatasiswa/') . $sw['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')" style="margin-top: 10px;"><i class="far fa-trash-alt"></i></a>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
         </div>
      </div>

   </div>
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->

   <!-- Modal -->
   <div class=" modal fade" id="newSiswaModal" tabindex="-1" aria-labelledby="newSiswaModal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="newSiswaModal">Tambah Data Siswa</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="<?= base_url('admindtsiswa/tambahdatasiswa'); ?>" method="post">
               <div class="modal-body">
                  <div class="form-group">
                     <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="jk" name="jk" placeholder="Jenis Kelamin">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="kelompok" name="kelompok" placeholder="Kelompok">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="ayah" name="ayah" placeholder="Nama Ayah">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="ibu" name="ibu" placeholder="Nama Ibu">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" id="thnajaran" name="thnajaran" placeholder="Tahun Ajaran">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Tambah</button>
               </div>
            </form>
         </div>
      </div>
   </div>