<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

   <div class="row">
      <div class="col-lg-6">

         <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
               <?= validation_errors(); ?>
            </div>
         <?php endif; ?>

         <?= $this->session->flashdata('message'); ?>

         <a href="" class="btn btn-gradient mb-3" data-toggle="modal" data-target="#newTahunModal" style="background-color: #00bfa5; color:white;">Tambah Tahun Ajaran</a>

         <table class=" table table-hover">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tahun Ajaran</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1; ?>
               <?php foreach ($thnajaran as $thn) : ?>
                  <tr>
                     <th scope="row"><?= $i; ?></th>
                     <td><?= $thn['thnajaran']; ?></td>
                     <td>
                        <a href="<?= base_url('admintahun/ubahtahun/') . $thn['id']; ?>" class=" btn btn-success"><i class="far fa-edit"></i></a>
                        <a href="<?= base_url('admintahun/hapustahun/') . $thn['id']; ?>" class=" btn btn-danger" onclick="return confirm('hapus?')"><i class="far fa-trash-alt"></i></a>
                     </td>
                  </tr>
                  <?php $i++; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class=" modal fade" id="newTahunModal" tabindex="-1" aria-labelledby="newTahunModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="newTahunModal">Tambah Tahun Ajaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('admintahun'); ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="text" class="form-control" id="thnajaran" name="thnajaran" placeholder="Masukan Tahun">
                  <?= form_error('thnajaran', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-gradient" style="background-color: #00bfa5; color:white;">Tambah</button>
            </div>
         </form>
      </div>
   </div>
</div>