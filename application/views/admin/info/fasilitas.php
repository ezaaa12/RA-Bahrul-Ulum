<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-sm-2">
         <div class="dropdown">
            <button class="btn btn-gradinet dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#00bfa5; color:white;">
               Sarana & Fasilitas
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item" href="<?= base_url('admininfo/fasilitas') ?>">Fasilitas Sekolah</a>
               <a class="dropdown-item" href="<?= base_url('admininfo/permainan') ?>">Fasilitas Permainan</a>
            </div>
         </div>
      </div>

      <div class="col-sm-2">
         <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newFasilitasModal" style="background-color:#00bfa5; color:white; margin-top:1px;">Tambah Fasilitas</a>
      </div>
   </div>



   <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
         <?= validation_errors(); ?>
      </div>
   <?php endif; ?>

   <?= $this->session->flashdata('message'); ?>
   <div class="row">
      <?php $i = 1; ?>
      <?php foreach ($fasilitas as $f) : ?>
         <div class="col-sm-2">
            <div class="card" style="width: 10rem; text-align: center; margin-top:20px;">
               <img src="<?= base_url('assets/img/info/fasilitassekolah/') ?><?= $f['gambar']; ?>" width=" 30" height="130" class="card-img-top">
               <div class="card-body">
                  <a href=" <?= base_url('admininfo/ubahfasilitas/') . $f['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                  <a href="<?= base_url('admininfo/hapusfasilitas/') . $f['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')"><i class="far fa-trash-alt"></i></a>
               </div>

            </div>
         </div>
         <?php $i++; ?>
      <?php endforeach; ?>
   </div>
   <br>
   <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newFasilitasModal" tabindex="-1" aria-labelledby="newFasilitasModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newFasilitasModalLabel">Tambah Fasilitas Sekolah</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('admininfo/tambahfasilitas'); ?>
         <div class="modal-body">
            <div class="form-group row">
               <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
               <div class="col-sm-10">
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="gambar" name="gambar">
                     <label class="custom-file-label" for="gambar">Pilih gambar</label>
                  </div>
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