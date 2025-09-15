<!-- breadcrumb -->
<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?= BASEURL ?>/customer/home">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?= BASEURL ?>/customer/daftar_menu">Daftar Menu</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <strong>Detail Menu</strong>
        </li>
      </ol>
    </nav>
  </div>
</div>

<div class="row row-cols-md-2 row-cols-md-1 mt-2">
  <div class="col-md-auto col-md-6 mb-3">
    <img src="<?= BASEURL ?>/img/menus/<?= $data['detail_menu'][0]->image ?>" class="img-fluid shadow rounded" alt="..." />
  </div>
  <div class="col-md-6 col-md-auto">
    <h2>
      <strong><?= $data['detail_menu'][0]->title ?></strong>
    </h2>
    <hr />

    <h4>
      Harga:
      <?php 
      $discount = $data['detail_menu'][0]->discount;
      $price = money_format($data['detail_menu'][0]->price);
      $final_price = money_format($data['detail_menu'][0]->final_price);
      
      if($data['detail_menu'][0]->discount > 0){
        echo "
          <strong class ='text-dark'>$final_price </strong><strong class='text-danger' style='font-size: 13px!important;'><strike style='color: #909497'>$price</strike> $discount% </strong>
        ";
      }else{
        echo <<<TEXT
          <strong>$final_price</strong>
        TEXT;
      }
      ?>
    </h4>
    <div class="d-sm-block d-md-none">
      <div class="alert" style="background-color:rgba(0,0,0,.02)" role="alert">
        Deskripsi Menu
      </div>
      <p><?= $data['detail_menu'][0]->description ?></p>

    </div>
    <form class="mt-4" action="<?= BASEURL; ?>/customer/keranjang/store/<?= $data['detail_menu'][0]->id ?>" , method="POST">
      <div class="form-group mb-4">
        <label for="jumlah">Jumlah Pesanan</label>
        <input type="number" required class="form-control" name="jumlah" placeholder="Masukkan Jumlah Pesanan" required>
      </div>
      <div class="form-group mb-4">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" class="form-control" placeholder="Keterangan seperti: Pedas, Bungkus" style='height: 100px;' required></textarea>
      </div>
      <button type="submit" class="btn btn-sm btn-success">
        <i class='bi-bag-check text-white fs-6' style='margin-right: 5px;'></i>
        Pesan
      </button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col d-none d-md-block">
    <div class="alert" style="background-color:rgba(0,0,0,.02)" role="alert">
      Deskripsi Menu:
      <p><?= $data['detail_menu'][0]->description ?></p>
    </div>
    <div class="alert mt-5" style="background-color:rgba(0,0,0,.02)" role="alert">
      Ringkasan Ulasan
    </div>
    <div class="row">
    <div class="col-4">

      <?php
      $bintang_5 = $data['bintang_5'];
      $bintang_4 = $data['bintang_4'];
      $bintang_3 = $data['bintang_3'];
      $bintang_2 = $data['bintang_2'];
      $bintang_1 = $data['bintang_1'];

      ?>
      <!-- bintang 1 -->
      <div class="progress" style="height: 15px;">
        <p class="mx-2">5</p>
        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_5; ?>%;" aria-valuenow="<?= $bintang_5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 2 -->
      <div class="progress my-2" style="height: 15px;">
        <p class="mx-2">4</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_4; ?>%;" aria-valuenow="<?= $bintang_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 3 -->
      <div class="progress mb-2" style="height: 15px;">
        <p class="mx-2">3</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_3; ?>%;" aria-valuenow="<?= $bintang_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 4 -->
      <div class="progress mb-2" style="height: 15px;">
        <p class="mx-2">2</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_2; ?>%;" aria-valuenow="<?= $bintang_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 5 -->
      <div class="progress mb-2" style="height: 15px;">
        <p class="mx-2">1</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_1; ?>%;" aria-valuenow="<?= $bintang_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

    </div>
    <div class="col-3">
      <h5 class="text-center mt-2" style="font-size:60px;color:#00b74a"><?=$data['detail_menu'][0]->rating ?>
      <i class="fa fa-star" style="color:orange"></i>
    </h5>  
      
    </div>
  </div>
    <div class="alert mt-5" style="background-color:rgba(0,0,0,.02)" role="alert">
      Ulasan Pelanggan
    </div>
    <?php
    foreach ($data['reviews'] as $review) {
      $customer = $review->customer;
      $review = htmlspecialchars($review->review);
      echo "
      <div class='card px-2 py-2 my-2 shadow'>
        <div class='row'>
          <div class='col-sm-1 text-end' style='min-width: 50px; max-width: 70px;'>
            <img
              class='rounded-circle ml-2'
              width='30'
              src='https://ui-avatars.com/api/?name=$customer->name&amp;background=4e73df&amp;color=ffffff&amp;size=100'
            />
          </div>
          <div class='col-sm-11'>
            <p>$customer->name</p>
          </div>
        </div>
        <div class='row'>
          <div class='col-sm-1' style='min-width: 50px; max-width: 70px;'>
            <p></p>
          </div>
          <div class='col-sm-11'>
            <p>$review</p>
          </div>
        </div>
      </div>
      ";
    }


    ?>


  </div>

  <div class="d-sm-block d-md-none">
  <div class="alert mt-5" style="background-color:rgba(0,0,0,.02)" role="alert">
      Ringkasan Ulasan
    </div>
    <div class="row">
    <div class="col-7">

      <?php
      $bintang_5 = $data['bintang_5'];
      $bintang_4 = $data['bintang_4'];
      $bintang_3 = $data['bintang_3'];
      $bintang_2 = $data['bintang_2'];
      $bintang_1 = $data['bintang_1'];

      ?>
      <!-- bintang 1 -->
      <div class="progress" style="height: 15px;">
        <p class="mx-2">5</p>
        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_5; ?>%;" aria-valuenow="<?= $bintang_5; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 2 -->
      <div class="progress my-2" style="height: 15px;">
        <p class="mx-2">4</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_4; ?>%;" aria-valuenow="<?= $bintang_4; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 3 -->
      <div class="progress mb-2" style="height: 15px;">
        <p class="mx-2">3</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_3; ?>%;" aria-valuenow="<?= $bintang_3; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 4 -->
      <div class="progress mb-2" style="height: 15px;">
        <p class="mx-2">2</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_2; ?>%;" aria-valuenow="<?= $bintang_2; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <!-- bintang 5 -->
      <div class="progress mb-2" style="height: 15px;">
        <p class="mx-2">1</p>

        <div class="progress-bar bg-success rounded" role="progressbar" style="width: <?= $bintang_1; ?>%;" aria-valuenow="<?= $bintang_1; ?>" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

    </div>
    <div class="col-5">
      <h5 class="text-center mt-4" style="font-size:50px;color:#00b74a"><?=$data['detail_menu'][0]->rating ?>
      <i class="fa fa-star" style="color:orange"></i>
    </h5>  
      
    </div>
  </div>
    <div class="alert mt-5" style="background-color:rgba(0,0,0,.02)" role="alert">
      Ulasan Pelanggan
    </div>
    <?php
    foreach ($data['reviews'] as $review) {
      $customer = $review->customer;
      echo "
      <table>
        <tbody>
          <tr class='align-top'>
            <td class='text-center' colspan='2' style='min-width: 50px!important'> 
              <img
                class='rounded-circle ml-2'
                width='30'
                src='https://ui-avatars.com/api/?name=$customer->name&amp;background=4e73df&amp;color=ffffff&amp;size=100'
              />
            </td>
            <td colspan='10'>
              <p>$customer->name</p>
            </td>
          </tr>
          <tr>
            <td colspan='2' style='min-width: 50px!important'>
              <p></p>
            </td>
            <td colspan='10'>
              <p>$review->review</p>
            </td>
          </tr>
        </tbody>
      </table>
    ";
    }
    ?>
  </div>
</div>