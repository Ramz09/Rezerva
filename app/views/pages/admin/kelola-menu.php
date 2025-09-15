<div class="card card-tasks" style = 'height : 100%;'>
  <div class="card-header ">
    <h3 style = "margin : 0px 0px 0px 0px;"><?= $data['title']?></h3>
  </div>
  <div class="card-body">
    <form action = "<?=BASEURL;?>/admin/kelola_menu/show", method = "POST">
      <div class="form-group-apend">
        <div class="row pb-3">
          <div class="col-md-auto align-self-center">
            <div class="input-group-apend">
              <a href = "<?=BASEURL;?>/admin/kelola_menu/tambah_menu" class="btn btn-sm p-2 text-white"><i class="fa fa-plus-circle mr-2 text-white"></i>TAMBAH MENU</a>
            </div>
          </div>
          <div class="col align-self-center px-0">
            <div class="input-group-prepended ">
              <input type="text" class="form-control" name='search' placeholder="cari berdasarkan nama menu">        
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
          <th class="text-left" width = "200px"><p class="title">Nama Menu</p></th>
          <th class="text-left"><p class="title">Kategori</p></th>
          <th class="text-center" width = "100px"><p class="title">Harga</p></th>
          <th class="text-center" width = "100px"><p class="title">Diskon</p></th>
          <th class="text-center" width = "100px"><p class="title">Harga Akhir</p></th>
          <th class="text-center" width = "80px"><p class="title">Stock</p></th>
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
            <th class="text-left py-0"  width = "200px"><p></p></th>
            <th class="text-left py-0"><p></p></th>
            <th class="text-center py-0" width = "100px"><p></p></th>
            <th class="text-center py-0" width = "100px"><p></p></th>
            <th class="text-center py-0" width = "100px"><p></p></th>
            <th class="text-center py-0" width = "80px"><p></p></th>
            <th class="text-center py-0" width = "150px"><p></p></th>
          <tr>
        </thead>
        <tbody>
          <!-- buat perulangan untuk menampilkan menu -->
          <?php 
          $menus = $data['menus'];
          $url = BASEURL;
          for($i = 0; $i < count($menus); $i++){
            $menu = $menus[$i];
            $category_name = $menu->category->name;
            $no = $i + 1; 
            $price = money_format($menu->price);
            $final_price = money_format($menu->final_price);
            echo "
              <tr>
                <td>
                  <p class='text-center'>$no</p>
                </td>
                <td class='text-center'>
                  <img src='$url/img/menus/$menu->image' alt='' height = '40px' width = '40px'>
                </td>
                <td>
                  <p>$menu->title</p>
                </td>
                <td>
                  <p>$category_name</p>
                </td>
                <td>
                  <p class='text-center'>$price</p>
                </td>
                <td>
                  <p class='text-center'>$menu->discount%</p>
                </td>
                <td>
                  <p class='text-center'>$final_price</p>
                </td>
                <td>
                  <p class='text-center'>$menu->stock</p>
                </td>
                <td class='td-actions text-center'>
                ";

                if($menu->stock == 'tersedia'){
                  echo"
                    <button type='button' rel='tooltip' title='' class='btn btn-icon btn-success' data-original-title='Hapus Kategori'>
                      <a class='text-light' href='$url/admin/kelola_menu/set_stock/$menu->id' style = 'font-size : 18px;'><i class='bi-bag-check text-white' role='img' aria-label='Trash'></i></a>
                    </button>
                  ";
                }else{
                  echo"
                    <button type='button' rel='tooltip' title='' class='btn btn-icon btn-danger' data-original-title='Hapus Kategori'>
                      <a class='text-light' href='$url/admin/kelola_menu/set_stock/$menu->id' style = 'font-size : 18px;'><i class='bi-bag-check text-white' role='img' aria-label='Trash'></i></a>
                    </button>
                  ";
                }
                  
                echo <<<TEXT
                  <button type='button' rel='tooltip' title='' class='btn btn-icon btn-info' data-original-title='Edit Kategori'>
                    <a class='text-light' href='$url/admin/kelola_menu/edit_menu/$menu->id' style = 'font-size : 20px;'><i class='tim-icons icon-pencil text-white'></i></a>
                  </button>
                  <button type='button' rel='tooltip' title='' class='btn btn-icon btn-danger' data-original-title='Hapus Kategori'>
                    <a onclick="alert_warning('semua data order dan review yang berkaitan dengan menu tersebut akan dihapus secara permanen', 'ANDA YAKIN INGIN MENGHAPUS MENU?', 'HAPUS!', '$url/admin/kelola_menu/destroy/$menu->id')" class='text-light'style = 'font-size : 20px;'><i class='tim-icons icon-trash-simple text-white'></i></i></a>
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

 <!--   -->