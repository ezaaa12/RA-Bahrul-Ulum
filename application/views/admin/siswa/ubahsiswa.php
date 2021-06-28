<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
   <div class="row">

      <div class="col-lg-10">
         <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $siswa['id']; ?>">

            <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">Nama</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="nama" class="col-sm-2 col-form-label">TTL</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $siswa['ttl']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="jk" name="jk" value="<?= $siswa['jk']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="kelompok" class="col-sm-2 col-form-label">Kelompok</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="kelompok" name="kelompok" value="<?= $siswa['kelompok']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="status" class="col-sm-2 col-form-label">Status</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="status" name="status" value="<?= $siswa['status']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="ayah" class="col-sm-2 col-form-label">Nama Ayah</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="ayah" name="ayah" value="<?= $siswa['ayah']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="ibu" class="col-sm-2 col-form-label">Nama Ibu</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="ibu" name="ibu" value="<?= $siswa['ibu']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="thnajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="thnajaran" name="thnajaran" value="<?= $siswa['thnajaran']; ?>">
               </div>
            </div>

            <div class=" form-group row justify-content-end">
               <div class="col-sm-10">
                  <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Ubah</button>
                  <a href="<?= base_url('admindtsiswa/index'); ?>" class="btn btn-secondary">Batal</a>
               </div>
            </div>
         </form>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->