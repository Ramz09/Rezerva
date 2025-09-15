<div class="container-fill">
  <!-- Laporan Pendapatan -->
  <div class="row">
    <div class="col-md-9 pb-0 mb-0 d-flex">
      <div class="card">
        <div class="card-body">
          <h3 class="text-center"><i class="material-icons">Pendapatan Bulanan Tahun <?=$data['year']?></i></h3>
          <canvas id="chartMonth"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-md-12">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Hari Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_hari_ini'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Minggu Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_minggu_ini'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Bulan Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_bulan_ini'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Tahun Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_tahun_ini'] ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-6 col-lg-3">
      <div class="card border-0 rounded shadow-sm overflow-hidden">
        <div class="card-body p-0 d-flex align-items-center">
          <div class="bg-info py-4 px-4 mfe-3">
            <i class="fas fa-circle-notch fa-spin fa-2x"></i>
          </div>
          <div class="pl-2" style="min-width: 100px;">
            <div class="text-value text-info font-weight-bold"><?= $data['pending'] ?> TRANSAKSI</div>
            <div class="text-info title text-uppercase font-weight-bold">PENDING</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 rounded shadow-sm overflow-hidden">
        <div class="card-body p-0 d-flex align-items-center">
          <div class="bg-success py-4 px-4 mfe-3">
            <i class="fas fa-check-square fa-2x"></i>
          </div>
          <div class="pl-2" style="min-width: 100px;">
            <div class="text-value text-success font-weight-bold"><?= $data['success'] ?> TRANSAKSI</div>
            <div class="text-success text-uppercase font-weight-bold">BERHASIL</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 rounded shadow-sm overflow-hidden">
        <div class="card-body p-0 d-flex align-items-center">
          <div class="bg-warning py-4 px-4 mfe-3">
            <i class="fas fa-exclamation-triangle fa-2x"></i>
          </div>
          <div class="pl-2" style="min-width: 100px;">
            <div class="text-value text-warning font-weight-bold"><?= $data['expired'] ?> TRANSAKSI</div>
            <div class="text-warning text-uppercase font-weight-bold">KEDALUWARSA</div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-6 col-lg-3">
      <div class="card border-0 rounded shadow-sm overflow-hidden">
        <div class="card-body p-0 d-flex align-items-center">
          <div class="bg-danger py-4 px-4 mfe-3">
            <i class="fas fa-times-circle fa-2x"></i>
          </div>
          <div class="pl-2" style="min-width: 100px;">
            <div class="text-value text-danger font-weight-bold"><?= $data['failed'] ?> TRANSAKSI</div>
            <div class="text-danger text-uppercase font-weight-bold">GAGAL</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card card-tasks" style='height : 600px;'>
        <div class="card-header ">
          <h3 style="margin : 0px 0px 0px 0px;">Laporan Menu</h3>
        </div>
        <div class="card-body">
          <form action="<?= BASEURL; ?>/admin/dashboard/show_laporan_menu" , method="POST">
            <div class="form-group-apend">
              <div class="row pb-3">
                <div class="col align-self-center pr-0">
                  <div class="input-group-prepended ">
                    <input type="text" class="form-control" name='search-laporan-menu' placeholder="cari berdasarkan nama menu">
                  </div>
                </div>
                <div class="col-md-auto align-self-center">
                  <div class="input-group-apend">
                    <button type="submit" class="btn btn-sm p-2 text-white"><i class="fa fa-search mx-1 text-white"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center" width="30px">
                  <p class="title">No</p>
                </th>
                <th class="text-center" width="80px">
                  <p class="title">Gambar</p>
                </th>
                <th class="text-left" width="200px">
                  <p class="title">Nama Menu</p>
                </th>
                <th class="text-center" width="80px">
                  <p class="title">Terjual</p>
                </th>
                <th class="text-center" width="80px">
                  <p class="title">Rating</p>
                </th>
                <th class="text-right">
                  <p class="title"></p>
                </th>
                <th class="text-center" width="100px">
                  <p class="title">Review</p>
                </th>
              </tr>
            </thead>
          </table>
          <div class="table-full-width table-responsive" >
            <table class="table" style="border-collapse:collapse;">
              <thead>
                <tr>
                  <th class="text-center py-0" width="30px">
                    <p></p>
                  </th>
                  <th class="text-center py-0" width="80px">
                    <p></p>
                  </th>
                  <th class="text-left py-0" width="200px">
                    <p></p>
                  </th>
                  <th class="text-center py-0" width="80px">
                    <p></p>
                  </th>
                  <th class="text-center py-0" width="80px">
                    <p></p>
                  </th>
                  <th class="text-right py-0">
                    <p></p>
                  </th>
                  <th class="text-center py-0" width="100px">
                    <p></p>
                  </th>
                </tr>
                <tr>
              </thead>
              <tbody>
                <!-- buat perulangan untuk menampilkan laporan menu -->
                <?php
                $menus = $data['menus'];
                $url = BASEURL;
                for ($i = 0; $i < count($menus); $i++) {
                  $menu = $menus[$i];
                  $reviews = $menus[$i]->reviews;
                  $no = $i + 1;
                  echo "
                    <tr>
                      <td><p class='text-center'>$no</p></td>
                      <td class='text-center'><img src='$url/img/menus/$menu->image' alt='' height = '40px' width = '40px'></td>
                      <td><p>$menu->title</p></td>
                      <td><p class='text-center'>$menu->sold</p></td>
                      <td><p class='text-center'>$menu->rating</p></td>
                      <td></td>
                      <td class='text-center'><h2 style='margin-bottom: 0;'><i class='bi-caret-down-fill text-mute accordion-toggle' data-toggle='collapse' data-target='#invoice$no'></i></h2></td>
                    </tr>
                    <tr>
                      <td colspan='12' class='py-0 hiddenRow'>
                        <div class='accordion accordion-flush collapse mx-4' id='invoice$no'>
                          <div class='accordion-item'>
                  ";

                  for ($j = 0; $j < count($reviews); $j++){
                    $name = $reviews[$j]->customer->name;
                    $review = htmlspecialchars($reviews[$j]->review);
                    echo "
                      <div class='card px-2 py-2 my-2 shadow'>
                        <div class='row'>
                          <div class='col-sm-2'>
                          <img
                            class='rounded-circle ml-2'
                            width='30'
                            src='https://ui-avatars.com/api/?name=$name&amp;background=4e73df&amp;color=ffffff&amp;size=100'
                          />
                          </div>
                          <div class='col-sm-10'>
                            <p>$name</p>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-sm-2'>
                            <p></p>
                          </div>
                          <div class='col-sm-10'>
                            <p>$review</p>
                          </div>
                        </div>
                      </div>
                    ";
                  }

                  echo "
                          </div>
                        </div>
                      </td>
                    </tr>
                  ";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card card-tasks" style='height : 600px;'>
        <div class="card-header ">
          <h3 style="margin : 0px 0px 0px 0px;">Daftar Pesanan</h3>
        </div>
        <div class="card-body">
          <form action="<?= BASEURL; ?>/admin/dashboard/show_daftar_pesanan" , method="POST">
            <div class="form-group-apend">
              <div class="row pb-3">
                <div class="col align-self-center pr-0">
                  <div class="input-group-prepended ">
                    <input type="text" class="form-control" name='search-daftar-pesanan' placeholder="cari berdasarkan nama menu">
                  </div>
                </div>
                <div class="col-md-auto align-self-center">
                  <div class="input-group-apend">
                    <button type="submit" class="btn btn-sm p-2 text-white"><i class="fa fa-search mx-1 text-white"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center" width="30px">No</th>
                <th class="text-left" width="150px">Name</th>
                <th class="text-center" width="70px">No meja</th>
                <th class="text-left"></th>
                <th class="text-center" width="100px">Daftar Menu</th>
                <th class="text-center" width="120px">Actions</th>
              </tr>
            </thead>
          </table>
          <div class="table-full-width table-responsive">
            <table class="table" style="border-collapse:collapse;">
              <thead>
                <tr>
                  <th class="text-center py-0" width="30px"></th>
                  <th class="text-left py-0" width="150px"></th>
                  <th class="text-center py-0" width="70px"></th>
                  <th class="text-left py-0"></th>
                  <th class="text-center py-0" width="100px"></th>
                  <th class="text-center py-0" width="120px"></th>
                </tr>
              </thead>
              <tbody class="table-striped">
                <?php
                for ($i = 0; $i < count($data['invoices']); $i++) {
                  $url = BASEURL;
                  $id = $data['invoices'][$i]->id;
                  $orders = $data['invoices'][$i]->orders;
                  $name = htmlspecialchars($data['invoices'][$i]->customer->name);
                  $no_table =  $data['invoices'][$i]->table_id;
                  $no = $i + 1;
                  echo "
                              <tr>

                                  <td class='text-center'>$no</td>
                                  <td class=''>$name</td>
                                  <td class='text-center'>$no_table</td>
                                  <td class=''></td>
                                  <td class='text-center'><h2 style='margin-bottom: 0;'><i class='bi-caret-down-fill text-mute accordion-toggle' data-toggle='collapse' data-target='#demo$no'></i></h2></td>
                                  ";

                  echo <<<TEXT
                                  <td class='td-actions text-center'>
                                      <button type='button' rel='tooltip' title='' class='btn btn-icon btn-info' data-original-title='Edit Kategori'>
                                          <a onclick="alert_warning('status pesanan akan diubah menjadi Diantar', 'ANDA YAKIN PESANAN SUDAH SIAP DIANTAR?', 'ANTAR!', '$url/admin/dashboard/antar_pesanan/$id')" class='text-light' style = 'font-size : 20px;'><i class='fas fa-paper-plane fa-2x text-white'></i></a>
                                      </button>
                                      <button type='button' rel='tooltip' title='' class='btn btn-icon btn-danger' data-original-title='Edit Kategori'>
                                          <a onclick="alert_warning('status pesanan akan diubah menjadi Ditolak', 'ANDA YAKIN INGIN MENOLAK PESANAN?', 'TOLAK!', '$url/admin/dashboard/tolak_pesanan/$id')" class='text-light' style = 'font-size : 20px;'><i class='tim-icons icon-simple-remove text-white'></i></a>
                                      </button>
                                  </td>
                                  TEXT;

                  echo "
                              </tr>
                              <tr>
                                  <td colspan='12' class='py-0 hiddenRow'>
                                      <div class='accordion accordion-flush collapse mx-4' id='demo$no'>
                                          <div class='accordion-item'>
                                              <table class='table'>
                                                  <thead>
                                                      <tr>
                                                          <th class='text-center' width = '30px'>no</th>
                                                          <th class='text-left' width = '120px'>nama makanan</th>
                                                          <th class='text-center' width = '70px'>jumlah</th>
                                                          <th class='text-left'>Keterangan</th>
                                                      </tr>
                                                  </thead>
                                              <tbody>
                                              ";

                  for ($j = 0; $j < count($orders); $j++) {
                    $order = $orders[$j];
                    $menu = $order->menu->title;
                    $qty = $order->qty;
                    $description = htmlspecialchars($order->description);
                    $no = $j + 1;
                    echo "
                                                      <tr>
                                                          <td class='text-center'>$no</td>
                                                          <td class='text-left'>$menu</td>
                                                          <td class='text-center'>$qty</td>
                                                          <td class='text-left'>$description</td>
                                                      </tr>
                                                  ";
                  }

                  echo "
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </td>
                          </tr>
                          ";
                }
                ?>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php 
chart_bulanan('chartMonth', $data['pendapatan_perbulan'], 'bar')
?>