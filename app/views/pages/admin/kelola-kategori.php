<div class="card card-tasks" style = 'height : 100%;'>
  <div class="card-header ">
    <h3 style = "margin : 0px 0px 0px 0px;"><?= $data['title']?></h3>
  </div>
  <div class="card-body">
    <form action = "<?=BASEURL;?>/admin/kelola_kategori/show", method = "POST">
      <div class="form-group-apend">
        <div class="row pb-3">
          <div class="col-md-auto align-self-center">
            <div class="input-group-apend">
              <a href = "<?=BASEURL;?>/admin/kelola_kategori/tambah_kategori" class="btn btn-sm p-2 text-white"><i class="fa fa-plus-circle mr-2 text-white"></i>TAMBAH KATEGORI</a>
            </div>
          </div>
          <div class="col align-self-center px-0">
            <div class="input-group-prepended ">
              <input type="text" class="form-control" name = "search" placeholder="cari berdasarkan nama kategori">        
            </div>
          </div>
          <div class="col-md-auto align-self-center">
            <div class="input-group-apend">
              <button type = "submit" class="btn btn-sm p-2 text-white"><i class="fa fa-search mr-2 text-white"></i>SEARCH</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center" width = "30px"><p class="title">No</p></th>
          <th class="text-center" width = "80px"><p class="title">Gambar</p></th>
          <th class="text-left"><p class="title">Nama Kategori</p></th>
          <th class="text-center" width = "150px"><p class="title">Action</p></th>
        </tr>
      </thead>
    </table>
    <div class="table-full-width table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center py-0" width = "30px"><p></p></th>
            <th class="text-center py-0" width = "80px"><p></p></th>
            <th class="text-left py-0"><p></p></th>
            <th class="text-center py-0" width = "150px"><p></p></th>
          <tr>
        </thead>
        <tbody>
          <!-- buat perulangan untuk menampilkan kategori -->
          <?php 
          $categories = $data['categories'];
          $url = BASEURL;
         for($i = 0; $i < count($categories); $i++){
            $category = $categories[$i];
            $no = $i + 1; 
            echo "
              <tr>
                <td>
                  <p class='text-center'>$no</p>
                </td>
                <td class='text-center'>
                  <img src='$url/img/categories/$category->image' alt='' height = '40px' width = '40px'>
                </td>
                <td>
                  <p>$category->name</p>
                </td>
                ";

                echo <<<TEXT
                  <td class='td-actions text-center'>
                    <button type='button' rel='tooltip' title='' class='btn btn-icon btn-info' data-original-title='Edit Kategori'>
                      <a class='text-light' href='$url/admin/kelola_kategori/edit_kategori/$category->id' style = 'font-size : 20px;'><i class='tim-icons icon-pencil text-white'></i></a>
                    </button>
                    <button type='button' rel='tooltip' title='' class='btn btn-icon btn-danger' data-original-title='Hapus Kategori'>
                      <a onclick="alert_warning('semua data menu, order, dan review yang berkaitan dengan kategori tersebut akan dihapus secara permanen', 'ANDA YAKIN INGIN MENGHAPUS KATEGORI?', 'HAPUS!', '$url/admin/kelola_kategori/destroy/$category->id')" class='text-light' style = 'font-size : 20px;'><i class='tim-icons icon-trash-simple text-white'></i></a>
                    </button>
                  </td>
                </tr>
              TEXT;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>   