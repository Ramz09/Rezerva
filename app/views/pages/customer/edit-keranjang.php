<!-- breadcrumb -->
<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?=BASEURL?>/customer/home">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?=BASEURL?>/customer/daftar_menu">keranjang</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <strong>Edit Keranjang</strong> 
        </li>
      </ol>
    </nav>
  </div>
</div>
<div class="row row-cols-md-2 row-cols-md-1 mt-2">
  <div class="col-md-auto col-md-6 mb-3">
    <img src="<?=BASEURL?>/img/menus/<?=$data['detail_menu']->image?>" class="img-fluid shadow" alt="..." />
  </div>
  <div class="col-md-6 col-md-auto">
    <h2>
      <strong><?=$data['detail_menu']->title?></strong>
    </h2>
    <hr />

    <h4>
      Harga:
      <?php 
      $discount = $data['detail_menu']->discount;
      $price = money_format($data['detail_menu']->price);
      $final_price = money_format($data['detail_menu']->final_price);
      
      if($data['detail_menu']->discount > 0){
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
    <form class="mt-4" action = "<?=BASEURL;?>/customer/keranjang/update/<?=$data['detail_keranjang']->id?>", method = "POST">
      <div class="form-group mb-4">
        <label for="jumlah">Jumlah Pesanan</label>
        <input type="number" required class="form-control" name="jumlah" placeholder="Masukkan Jumlah Pesanan" value="<?=$data['detail_keranjang']['jumlah']?>" required>
      </div>
      <input type="text" name="price" value="<?=$data['detail_menu']->final_price?>" hidden>
      <div class="form-group mb-4">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan"  class="form-control" placeholder="Keterangan seperti: Pedas, Bungkus" style='height: 100px;' required><?=$data['detail_keranjang']['keterangan']?></textarea>
      </div>
      <button type="submit" class="btn btn-success">
        <i class='tim-icons icon-pencil text-white fs-6' style='margin-right: 5px;'></i>
        Edit
      </button>
    </form>
  </div>
</div>

