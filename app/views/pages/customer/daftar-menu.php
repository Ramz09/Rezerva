<!-- breadcrumb -->
<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?=BASEURL?>/customer/home">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <strong>Daftar Menu</strong> 
        </li>
      </ol>
    </nav>
  </div>
</div>
<div class="row mt-2">
  <div class="col">
    <form action = "<?=BASEURL;?>/customer/daftar_menu/show", method = "POST">   
      <div class="row justify-content-between">
        <div class="col align-self-center" style="padding-right: 0px;">
          <div class="input-group input-group-lg mb-3">
            <input name="search" type="text" class="form-control border-success" placeholder="Cari Makanan Kesukan Anda..." aria-label="Cari" aria-describedby="basic-addon1"/>
          </div>
        </div>
        <div class="col align-self-center" style="max-width: 70px!important;">
          <div class="input-group input-group-lg mb-3 justify-content-end" style="max-width: 70px!important;">
            <button type = "submit" class="btn btn-success btn-sm p-2"><i class="fa fa-search px-2 text-white"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr class="d-flex">
            <th class="align-top text-left pt-0 px-0" style="width: max-content; min-width: 100%;">
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/semua_menu' style='margin-right:5px;'>
                <b-icon-cart></b-icon-cart>
                Semua Menu
              </a>
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/termurah' style='margin-right:5px;'>
                <b-icon-cart></b-icon-cart>
                Termurah
              </a>
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/termahal' style='margin-right:5px;'>
                <b-icon-cart></b-icon-cart>
                Termahal
              </a>
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/terbaru' style='margin-right:5px;'>
                <b-icon-cart></b-icon-cart>
                Terbaru
              </a>
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/terlaris' style='margin-right:5px;'>
                <b-icon-cart></b-icon-cart>
                Terlaris
              </a>
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/rating' style='margin-right:5px;'>
                <b-icon-cart></b-icon-cart>
                Rating
              </a>
              <a class='btn btn-outline-success px-3 rounded-pill' href='<?=BASEURL;?>/customer/daftar_menu/sort/promo'>
                <b-icon-cart></b-icon-cart>
                Promo
              </a>
            </th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<div class="row" align="start">
  <div class="col">
    <h5>
      Menampilkan 
      <strong><?=htmlspecialchars($data['message'])?></strong>
    </h5>
  </div>
</div>
<div class="row row-cols-2 row-cols-sm-4 " align="start">
  <?php
  $menus = $data['menus'];
  $url = BASEURL;
  foreach($menus as $menu){
    $price = money_format($menu->price);
    $discount_price = money_format($menu->price*(100-$menu->discount)/100);
    $category_name = $menu->category->name;
    echo "
      <div class='col mt-3 d-flex my-2'>
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

    
    
    
    
    