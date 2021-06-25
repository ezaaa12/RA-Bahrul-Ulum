<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newGuruModal" style="background-color:#00bfa5; color:white;">Tambah data guru</a>

   <div class="row">
      <div class="col-lg-10">

         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>

         <table class="table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($dataguru as $dg) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td align="center"><img src="<?= base_url('assets/img/profile/guru/') ?><?= $dg['gambar']; ?>" width="100" height="100"></td>
                     <td><?= $dg['nama']; ?></td>
                     <td><?= $dg['jabatan']; ?></td>
                     <td>
                        <a href=" <?= base_url('adminprofil/ubahdataguru/') . $dg['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                        <a href="<?= base_url('adminprofil/hapusdataguru/') . $dg['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')"><i class="far fa-trash-alt"></i></a>
                     </td>
                  </tr>
                  <?php $i++; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newGuruModal" tabindex="-1" aria-labelledby="newGuruModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newGuruModalLabel">Tambah data guru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('adminprofil/tambahdataguru'); ?>
         <div class="modal-body">
            <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">Gambar</label>
               <div class="col-sm-10">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="gambar" name="gambar">
                     <label class="custom-file-label" for="gambar">Pilih gambar</label>
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">Nama</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama">
               </div>
            </div>
            <div class="form-group row">
               <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="jabatan" name="jabatan">
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-gradient" style="background-color:#00bfa5; color:white;">Tambah</button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>