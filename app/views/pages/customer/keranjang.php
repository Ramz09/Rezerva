<meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-_0bji155hJ_YL7Pw"></script>
<!-- breadcrumb -->
<div class="row">
  <div class="col">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?=BASEURL?>/customer/home">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-dark" href="<?=BASEURL?>/customer/daftar_menu">Daftar Menu</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <strong>Keranjang</strong> 
        </li>
      </ol>
    </nav>
  </div>
</div>
<div class="container-fluid">
    <div class="fade-in">
    <div class="row" >
      <!-- jika data carts ada, maka tampilkan -->
      <div class="col-md-7">
        <div class="card border-0 rounded border-top-orange shadow-sm">
          <div class="card-body">
            <h5>DETAIL PESANAN</h5>
            <hr>
            <table class="table table-cart">
              <tbody>
                <client-only>
                  <?php
                  
                  $total_harga = 0; 
                  
                    # code...
                  $i = 0;
                  foreach ($data['menu'] as $menu) {
                   
                    $url = BASEURL;
                    $id = $menu->id;
                    $no = $i + 1;
                    $image = $menu->menu->image;
                    $title = $menu->menu->title;
                    $keterangan = htmlspecialchars($menu->keterangan);
                    $jumlah = $menu->jumlah;
                    $total = money_format($menu->price);
                    echo"
                    <tr>
                    <td class='b-none' width='25%'>
                      <div class='wrapper-image-cart'>
                        <img src='$url./img/menus/$image' style='width: 100%;border-radius: .5rem'>
                      </div>
                    </td>
                    <td class='b-none' width='50%'>
                      <h5><b></b></h5>
                      <table class='table-borderless table-font'>
                      <tr>
                        <td>$title</td>
                      </tr>
                      </table>
                      <table class='table-borderless table-font'>
                        <tr>
                          <td style='padding: .20rem'>Jumlah</td>
                          <td style='padding: .20rem'>:</td>
                          <td style='padding: .20rem'><b class='number-text'>$jumlah</b></td>
                        </tr>
                      </table>
                      <table class='table-borderless table-font'>
                      <tr>
                        <td>$keterangan</td>
                      </tr>
                      </table>

                    </td>
                    <td class='b-none text-right'>
                      <p class='m-0 number-text' style='font-weight: 500'>$total
                      </p>
                  
                    </td>
                      ";
        
                      echo <<<TEXT
                        <td class='td-actions text-center' style='min-width:50px;'>
                          <button type='button' rel='tooltip' title='' class='btn btn-icon btn-info px-2 py-1' data-original-title='Edit Kategori'>
                            <a class='text-dark' href='$url/customer/keranjang/edit/$id' style = 'font-size : 18px;'><i class='tim-icons icon-pencil text-white'></i></a>
                          </button>
                          <button type='button' rel='tooltip' title='' class='btn btn-icon btn-danger px-2 py-1' data-original-title='Hapus Kategori'>
                            <a onclick="alert_warning('data keranjang akan dihapus secara permanen', 'ANDA YAKIN INGIN MENGHAPUS KERANJANG?', 'HAPUS!', '$url/customer/keranjang/removeChart/$id')" class='text-dark' style = 'font-size : 18px;'><i class='tim-icons icon-trash-simple text-white'></i></a>
                          </button>
                        </td>
                      </tr>
                    TEXT;
                  }
                  
                  ?>
                 

                </client-only>
              </tbody>
            </table>

            <table class="table table-default">
              <tbody>
                <?php 
                $total_harga = money_format($data['total_price']);

                echo "<tr>
                <td class='set-td text-right' width='75%' align='right'>
                  <strong><p class='m-0'>TOTAL :</p></strong>
                </td>
                <td class='text-right set-td '>
                  <strong><p class='m-0 number-text' id='subtotal'>$total_harga</p></strong>
                </td>
              </tr>";
                
                ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card border-0 rounded border-top-orange shadow-sm">
          <div class="card-body">
            <h5>DETAIL CUSTOMER</h5>
            <hr>
            <div class="row">
              <form action="<?=BASEURL;?>/customer/checkout/store" method="post" class="mt-4" >
              <div class="col-md-12">
                <div class="form-group">
                  <label class="font-weight-bold">NAMA</label>
                  <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama" name="customer_name" required>
                  
                </div>
              </div>

              <div class="col-md-12 mt-2">
                <div class="form-group">
                  <label class="font-weight-bold">NO. Meja</label>
                  <input type="number" class="form-control" id="phone" name="no_meja" required placeholder="No. Meja">
                  
                </div>
              </div>
              <input type="text" class="form-control" value='<?= $data['total_price']; ?>' name="grand_total" hidden/>
              <div class="col-md-12 mt-3">
                <button type="submit"  class="btn btn-md btn-warning btn-lg btn-block">CHECKOUT</button>
              </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
 
    </div>
  </div>