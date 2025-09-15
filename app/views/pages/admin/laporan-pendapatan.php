

<!-- <h1>Halaman Laporan Penjualan</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Laporan Pendapatan Harian</h5>
            <canvas id="chartDay"></canvas>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">Laporan Pendapatan Bulanan</h5>
            <canvas id="chartMonth"></canvas>
        </div>
    </div> -->

<!-- <div class="row">
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
</div> -->

<div class="row">
  <div class="col-md-6 pb-0 mb-0 d-flex">
    <div class="card" style="min-height: 30vh !important;">
      <div class="card-body">
        <h3 class="text-center mb-1"><i class="material-icons">Pendapatan Tahun <?=$data['year']?> (Rupiah)</i></h3>
        <div class="mx-0 my-0 px-0 py-0" style="min-height: 30vh !important; max-height: 30vh !important;">
          <canvas id="chartMonth"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 pb-0 mb-0 d-flex" style="padding-bottom: 30px !important;">
  
    <div class="container mx-0 my-0 px-0 py-0" style="min-width: 100%;">
      <div class="row" style="height: 50%;">
        <div class="col-md-6" style="padding-bottom: 15px;">
          <div class="card card-stats" style="height: 100%; margin-bottom: 0px;">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Hari Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_hari_ini'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-6" style="padding-bottom: 15px;">
          <div class="card card-stats" style="height: 100%; margin-bottom: 0px;">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Minggu Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_minggu_ini'] ?></h3>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="height: 50%;">
        <div class="col-md-6" style="padding-top: 15px;">
          <div class="card card-stats" style="height: 100%; margin-bottom: 0px;">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">Pendapatan Bulan Ini</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title font-weight-bold" style="color: #2bffc6!important;"><?= $data['pendapatan_bulan_ini'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-md-6" style="padding-top: 15px;">
          <div class="card card-stats" style="height: 100%; margin-bottom: 0px;">
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.js'></script>
<?php 
chart_bulanan('chartMonth', $data['pendapatan_perbulan'], 'line');
?>