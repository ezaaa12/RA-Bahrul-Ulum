<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-lg-8">

         <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $permainan['id']; ?>">
            <div class="form-group row">
               <div class="col-sm-2">Gambar</div>
               <div class="col-sm-10">
                  <div class="row">
                     <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/info/fasilitaspermainan/') . $permainan['gambar']; ?>" class="img-thumbnail">
                     </div>
                     <div class="col-sm-9">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="gambar" name="gambar">
                           <label class="custom-file-label" for="gambar">Pilih gambar</label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group row justify-content-end">
               <div class="col-sm-10">
                  <a href="<?= base_url('admininfo/permainan'); ?>" class="btn btn-secondary">Batal</a>
                  <button type=" submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Ubah</button>
               </div>
            </div>
         </form>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->