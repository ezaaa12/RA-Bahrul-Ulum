<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">

      <div class="col-lg-10">
         <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $misi['id']; ?>">

            <div class="form-group row">
               <label for="misi" class="col-sm-2 col-form-label">Misi</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="misi" name="misi" value="<?= $misi['misi']; ?>">
               </div>
            </div>

            <div class=" form-group row justify-content-end">
               <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Ubah</button>
                  <a href="<?= base_url('adminprofil/misi'); ?>" class="btn btn-secondary">Batal</a>
               </div>
            </div>
         </form>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->