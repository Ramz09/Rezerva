<div class="card card-tasks" style = 'height : 100%;'>
  <div class="card-header ">
    <h3 style = "margin : 0px 0px 0px 0px;"><?= $data['title']?></h3>
  </div>
  <div class="card-body">
    <div class="form-group-apend">
      <div class="row pb-3">
        <div class="col-md-auto align-self-center">
          <div class="input-group-apend">
            <a href = "<?= BASEURL ?>/admin/kelola_menu" class="btn btn-sm p-2 text-white"><i class="fas fa-arrow-circle-left mr-2 text-white"></i>KEMBALI</a>
          </div>
        </div>
      </div>
    </div>
    <form action = "<?=BASEURL;?>/admin/kelola_menu/store", method = "POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          <div class="">
            <label>GAMBAR</label>
            <input type="file" name = "image" class="form-control form-control-md" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>KATEGORI</label>
            <select class="form-control" name="category_id" required>
              <option value="" style="background-color: #344675;">-- select category --</option>
              <?php 
              $categories = $data['categories'];
              foreach($categories as $category){
                echo "<option value='$category->id' style='background-color: #344675;'>$category->name</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>NAMA MENU</label>
            <input type="text" name="name" placeholder="Masukkan Nama Menu" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>DESKRIPSI</label>
            <input type="text" name="description" placeholder="Masukkan Deskripsi Menu" class="form-control" required>
          </div>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>HARGA</label>
            <input type="number" name="price" placeholder="Masukkan Harga Menu" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>DISKON (%)</label>
            <input type="number" name="discount" placeholder="Masukkan Diskon Menu (%)" class="form-control" value="0" required>
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