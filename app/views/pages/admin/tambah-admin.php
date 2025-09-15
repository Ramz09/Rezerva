<div class="card card-tasks" style = 'height : 100%;'>
  <div class="card-header ">
    <h3 style = "margin : 0px 0px 0px 0px;"><?= $data['title']?></h3>
  </div>
  <div class="card-body">
    <div class="form-group-apend">
      <div class="row pb-3">
        <div class="col-md-auto align-self-center">
          <div class="input-group-apend">
            <a href = "<?= BASEURL ?>/admin/kelola_admin" class="btn btn-sm p-2 text-white"><i class="fas fa-arrow-circle-left mr-2 text-white"></i>KEMBALI</a>
          </div>
        </div>
      </div>
    </div>
    <form action = "<?=BASEURL;?>/admin/kelola_admin/store", method = "POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>NAMA</label>
            <input type="text" name="name" placeholder="Masukkan Nama" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>PASSWORD</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control" required>
          </div>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>EMAIL</label>
            <input type="email" name="email" placeholder="Masukkan Email" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>KONFIRMASI PASSWORD</label>
            <input type="password" name="confirm_password" placeholder="Masukkan Konfirmasi Password" class="form-control" required>
          </div>
        </div>
      </div>

      <button class="btn btn-info mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane text-white mr-2"></i>
        SIMPAN</button>
      <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo text-white mr-2"></i>
        BERSIHKAN</button>

    </form>
  </div>
</div>   