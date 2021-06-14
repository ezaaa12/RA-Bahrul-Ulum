<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-lg-8">
         <form action="" method="post">
            <input type="hidden" name="id" value="<?= $admin['id']; ?>">
            <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">Nama</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $admin['nama']; ?>">
               </div>
            </div>

            <div class="form-group row">
               <label for="email" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>">
               </div>
            </div>

            <div class=" form-group row">
               <label for="password" class="col-sm-2 col-form-label">Password</label>
               <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password" value="<?= $admin['password']; ?>">
               </div>
            </div>

            <div class=" form-group row justify-content-end">
               <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Ubah</button>
                  <a href="<?= base_url('adminkelola/kelolaadmin'); ?>" class="btn btn-secondary">Batal</a>
               </div>

            </div>
         </form>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->