<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">

      <div class="col-lg-10">
         <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $video['id']; ?>">

            <div class="form-group row">
               <label for="tittle" class="col-sm-2 col-form-label">Judul Video</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="tittle" name="tittle" value="<?= $video['tittle']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="link" class="col-sm-2 col-form-label">Link Video</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="link" name="link" value="<?= $video['link']; ?>">
               </div>
            </div>

            <div class=" form-group row justify-content-end">
               <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Ubah</button>
                  <a href="<?= base_url('adminvideo/index'); ?>" class="btn btn-secondary">Batal</a>
               </div>
            </div>
         </form>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->