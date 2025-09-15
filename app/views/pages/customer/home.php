<div class="hero">
  <!-- Dekstop -->
  <div class="d-none d-md-block">
    <div class="row">
      <div class="col md-6" align="start">
        <div class="d-flex h-100">
          <div class="justify-content-center align-self-center">
            <h2>
              <strong>Delicious Foods,</strong>
              <br />
              in Your Gadget
            </h2>
            <p>Ayo segera pilih dan pesan makanan favorit Anda</p>
            <a class="btn btn-lg btn-success" href="<?=BASEURL?>/customer/daftar_menu">
              Pesan Sekarang
              <i class='bi-arrow-right text-white fs-6' style='margin-left: 5px;'></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col md-6">
        <img class="rounded shadow" src="<?=BASEURL?>/img/menus/sate-ayam.jpg" alt="kulineran" width="100%" />
      </div>
    </div>
  </div>
  <!-- Mobile -->
  <div class="d-sm-block d-md-none">
    <div class="row">
      <div class="col-md-6 mb-3" align="start">
          <img src="<?=BASEURL?>/img/menus/sate-ayam.jpg" alt="kulineran" width="100%" />
      </div>
      <div class="col-md-6 justify-content-center mb3" align="start">
        <h2>
          <strong>Delicious Food Menu,</strong>
          <br />
          in Your Gadget
        </h2>
        <p>Ayo segera pilih dan pesan makanan favorit Anda</p>
        <a class="btn btn-lg btn-success" href="<?=BASEURL?>/customer/daftar_menu">
          Pesan Sekarang
          <i class='bi-arrow-right text-white fs-6' style='margin-left: 5px;'></i>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Menu Andalan -->
<div class="row mt-4" align="start">
  <div class="col">
    <h2>
      Menu
      <strong>Andalan</strong>
    </h2>
  </div>
</div>
<div class="row row-cols-2 row-cols-sm-4 mb-4" align="start">
  <?php
  $menus = $data['menu_andalan'];
  $url = BASEURL;
  foreach($menus as $menu){
    $price = money_format($menu->price);
    $discount_price = money_format($menu->price*(100-$menu->discount)/100);
    $category_name = $menu->category->name;
    echo "
      <div class='col mt-3 d-flex'>
        <div class='card shadow card-product' style = 'border-radius: 7px;'>
          <img src='$url/img/menus/$menu->image' class='card-img-top' alt='...'/ style = 'border-radius: 7px 7px 0px 0px;'>
          <div class='card-body'>
            <h5 class='card-title text-dark'>$menu->title</h5>";
            if($menu->discount > 0){
              echo "<p class='card-text'><strong class ='text-dark'>$discount_price</strong><br><strong class='text-danger' style='font-size: 13px!important;'><strike style='color: #909497'>$price</strike> $menu->discount% </strong></p>";
            }else{
              echo "<p class='card-text text-dark'><strong>$price</strong></p>";
            }
            echo "
          </div>
          <div class='row position-absolute top-0 end-0 mx-0 mt-2'>
            <div class='col-md-auto col align-self-end'>
              <span class='badge' style='background-color: rgba(0, 0, 0, 0.7)'>$category_name</span>
            </div>
          </div>
          <div class='row justify-content-between mx-3'>
          ";

          if($menu->stock == 'tersedia'){
            echo"
              <div class='col-md px-0 mb-3' align-self-start style='width: auto;'>
                <a class='btn btn-sm btn-success text-white' href='$url/customer/detail_menu/$menu->slug'>
                  <i class='bi-bag-check text-white fs-6' style='margin-right: 5px;'></i>
                  Pesan
                </a>
              </div>
            ";
          }else{
            echo"
              <div class='col-md px-0 mb-3' align-self-start style='width: auto;'>
                <button class='btn btn-sm text-white' href='' style='background-color: grey;' disabled>
                  <i class='bi-bag-check text-white fs-6' style='margin-right: 5px;'></i>
                  Habis
                </button>
              </div>
            ";
          }
                      
          echo"
            <div class='col-md-auto px-0 mb-3' style='width: auto;'>
              <p class='card-text'>Terjual $menu->sold | <i class='bi-star-fill' role='text' aria-label='Star-Fill' style='color: #ffc107;'></i> $menu->rating</p>
            </div>
          </div>
        </div>
      </div>
    ";
  }
  ?>
</div>
<div class="row mt-4" align="end">
  <div class="col">
    <a href="<?=BASEURL?>/customer/daftar_menu" class="btn btn-success float-right">
      <i class='bi-eye text-white fs-6' style='margin-right: 5px;'></i>
      Lihat Semua
    </a>
  </div>
</div>
<!-- Menu Terbaru -->
<div class="row mt-4" align="start">
  <div class="col">
    <h2>
      Menu
      <strong>Terbaru</strong>
    </h2>
  </div>
</div>
<div class="row row-cols-2 row-cols-sm-4 mb-4" align="start">
  <?php
  $menus = $data['menu_terbaru'];
  $url = BASEURL;
  foreach($menus as $menu){
    $price = money_format($menu->price);
    $discount_price = money_format($menu->price*(100-$menu->discount)/100);
    $category_name = $menu->category->name;
    echo "
      <div class='col mt-3 d-flex'>
        <div class='card shadow card-product' style = 'border-radius: 7px;'>
          <img src='$url/img/menus/$menu->image' class='card-img-top' alt='...'/ style = 'border-radius: 7px 7px 0px 0px;'>
          <div class='card-body'>
            <h5 class='card-title text-dark'>$menu->title</h5>";
            if($menu->discount > 0){
              echo "<p class='card-text'><strong class ='text-dark'>$discount_price</strong><br><strong class='text-danger' style='font-size: 13px!important;'><strike style='color: #909497'>$price</strike> $menu->discount% </strong></p>";
            }else{
              echo "<p class='card-text text-dark'><strong>$price</strong></p>";
            }
            echo "
          </div>
          <div class='row position-absolute top-0 end-0 mx-0 mt-2'>
            <div class='col-md-auto col align-self-end'>
              <span class='badge' style='background-color: rgba(0, 0, 0, 0.7)'>$category_name</span>
            </div>
          </div>
          <div class='row justify-content-between mx-3'>
          ";

          if($menu->stock == 'tersedia'){
            echo"
              <div class='col-md px-0 mb-3' align-self-start style='width: auto;'>
                <a class='btn btn-sm btn-success text-white' href='$url/customer/detail_menu/$menu->slug'>
                  <i class='bi-bag-check text-white fs-6' style='margin-right: 5px;'></i>
                  Pesan
                </a>
              </div>
            ";
          }else{
            echo"
              <div class='col-md px-0 mb-3' align-self-start style='width: auto;'>
                <button class='btn btn-sm text-white' href='' style='background-color: grey;' disabled>
                  <i class='bi-bag-check text-white fs-6' style='margin-right: 5px;'></i>
                  Habis
                </button>
              </div>
            ";
          }
                      
          echo"
            <div class='col-md-auto px-0 mb-3' style='width: auto;'>
              <p class='card-text'>Terjual $menu->sold | <i class='bi-star-fill' role='text' aria-label='Star-Fill' style='color: #ffc107;'></i> $menu->rating</p>
            </div>
          </div>
        </div>
      </div>
    ";
  }
  ?>
</div>
<div class="row mt-4" align="end">
  <div class="col">
    <a href="<?=BASEURL?>/customer/daftar_menu" class="btn btn-success float-right">
      <i class='bi-eye text-white fs-6' style='margin-right: 5px;'></i>
      Lihat Semua
    </a>
  </div>
</div>





