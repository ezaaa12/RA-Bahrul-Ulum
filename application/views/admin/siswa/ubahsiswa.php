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
               <label for="tempat" class="col-sm-2 col-form-label">Tempat Lahir</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $siswa['tempat']; ?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="ttl" class="col-sm-2 col-form-label">Tanggal Lahir</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control datepicker" id="ttl" name="ttl" value="<?= $siswa['ttl']; ?>">
               </div>
            </div>

            <div class="form-group row">
               <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
               <div class="col-sm-10">
                  <div class="form-check">
                     <?php foreach ($jk as $jk) : ?>
                        <?php if ($jk == $siswa['jk']) : ?>
                           <input class="form-check-input" type="radio" name="jk" id="jk" value="<?= $jk; ?>" style="margin-left: 1px;" checked>
                           <label class="form-check-label" for="jk" style="margin-left: 20px;">
                              <?= $jk; ?>
                           </label>
                        <?php else : ?>
                           <input class="form-check-input" type="radio" name="jk" id="jk" value="<?= $jk; ?>" style="margin-left: 1px;">
                           <label class="form-check-label" for="jk" style="margin-left: 20px;">
                              <?= $jk; ?>
                           </label>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </div>
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
               <div class=" col-sm-10">
                  <select id="thnajaran" name="thnajaran" class="form-control">
                     <?php foreach ($thnajaran as $thn) : ?>
                        <div class="col-sm-10">
                           <?php if ($thn['thnajaran'] == $siswa['thnajaran']) : ?>
                              <option value="<?= $thn['thnajaran']; ?>" selected><?= $thn['thnajaran']; ?></option>
                           <?php else : ?>
                              <option value="<?= $thn['thnajaran']; ?>"><?= $thn['thnajaran']; ?></option>
                           <?php endif; ?>
                        </div>
                     <?php endforeach; ?>
                  </select>
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