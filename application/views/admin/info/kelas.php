<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newKelasModal" style="background-color:#00bfa5; color:white;">Tambah data kelas</a>

   <div class="row">
      <div class="col-lg-10">

         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>

         <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($kelas as $k) : ?>
               <div class="col-sm-4">
                  <div class="card" style="width: 17rem; text-align: center; margin-top:20px;">
                     <img src="<?= base_url('assets/img/info/kelas/') ?><?= $k['gambar']; ?>" width=" 30" height="130" class="card-img-top">
                     <div class="card-body">
                        <h5 class="card-title"><?= $k['kelas']; ?></h5>
                        <p><?= $k['keterangan']; ?></p>
                        <a href=" <?= base_url('admininfo/ubahdatakelas/') . $k['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                        <a href="<?= base_url('admininfo/hapusdatakelas/') . $k['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')"><i class="far fa-trash-alt"></i></a>
                     </div>

                  </div>
               </div>
               <?php $i++; ?>
            <?php endforeach; ?>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newKelasModal" tabindex="-1" aria-labelledby="newKelasModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newKelasModalLabel">Tambah data kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('admininfo/tambahdatakelas'); ?>
         <div class="modal-body">
            <div class="form-group row">
               <label for="nama" class="col-sm-3 col-form-label">Gambar</label>
               <div class="col-sm-10">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="gambar" name="gambar">
                     <label class="custom-file-label" for="gambar">Pilih gambar</label>
                  </div>
               </div>
            </div>
            <div class="form-group row">
               <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="kelas" name="kelas">
               </div>
            </div>
            <div class="form-group row">
               <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
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