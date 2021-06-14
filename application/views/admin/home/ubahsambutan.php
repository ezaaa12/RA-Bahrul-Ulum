<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">

      <div class="col-lg-8">
         <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $sambutan['id']; ?>">
            <div class="form-group row">
               <label for="isi" class="col-sm-2 col-form-label">Isi Sambutan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="isi" name="isi" value="<?= $sambutan['isi']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $sambutan['jabatan']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">Nama</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $sambutan['nama']; ?>">
               </div>
            </div>
            <div class="form-group row justify-content-end">
               <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Ubah</button>
                  <a href="<?= base_url('adminhome/sambutankepsek'); ?>" class="btn btn-secondary">Batal</a>
               </div>
            </div>
         </form>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->