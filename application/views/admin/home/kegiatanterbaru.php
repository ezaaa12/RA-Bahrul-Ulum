<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newKGModal" style="background-color:#00bfa5; color:white;">Tambah kegiatan</a>

   <div class="row">
      <div class="col-lg">
         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>

         <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($kegiatan as $kg) : ?>
               <div class="col-sm-3">
                  <div class="card" style="width: 19rem; text-align: center; margin-top:20px;">
                     <img src="<?= base_url('assets/img/menu/kegiatan/') ?><?= $kg['gambar']; ?>" width=" 30" height="175" class="card-img-top">
                     <div class="card-body">
                        <h5 class="card-title"><?= $kg['kegiatan']; ?></h5>
                        <p><?= $kg['tanggal']; ?></p>
                        <a href=" <?= base_url('adminhome/ubahkegiatan/') . $kg['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                        <a href="<?= base_url('adminhome/hapuskegiatan/') . $kg['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')"><i class="far fa-trash-alt"></i></a>
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
<div class=" modal fade" id="newKGModal" tabindex="-1" aria-labelledby="newKGModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newKGModalLabel">Tambah Kegiatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?= form_open_multipart('adminhome/tambahkegiatan'); ?>
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
               <label for="kegiatan" class="col-sm-2 col-form-label">Kegiatan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="kegiatan" name="kegiatan">
               </div>
            </div>
            <div class="form-group row">
               <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy">
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