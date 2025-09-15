<div class="row">

    <div class="col-6 col-lg-3">
        <div class="card border-0 rounded shadow-sm overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-warning py-4 px-4 mfe-3">
                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                </div>
                <div class="pl-2" style="min-width: 100px;">
                    <div class="text-value text-warning font-weight-bold"><?= $data['dikonfirmasi'] ?> PESANAN</div>
                    <div class="text-warning text-uppercase font-weight-bold">DIKONFIRMASI</div>
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
                    <div class="text-value text-danger font-weight-bold"><?= $data['ditolak'] ?> PESANAN</div>
                    <div class="text-danger text-uppercase font-weight-bold">DITOLAK</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3">
        <div class="card border-0 rounded shadow-sm overflow-hidden">
            <div class="card-body p-0 d-flex align-items-center">
                <div class="bg-info py-4 px-4 mfe-3" data="blue">
                    <i class="fas fa-paper-plane fa-2x"></i>
                </div>
                <div class="pl-2" style="min-width: 100px;">
                    <div class="text-value text-info font-weight-bold"><?= $data['diantar'] ?> PESANAN</div>
                    <div class="text-info title text-uppercase font-weight-bold">DIANTAR</div>
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
                    <div class="text-value text-success font-weight-bold"><?= $data['diterima'] ?> PESANAN</div>
                    <div class="text-success text-uppercase font-weight-bold">DITERIMA</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card card-tasks" style='height : 100%;'>
    <div class="card-header ">
        <h3 style="margin : 0px 0px 0px 0px;"><?= $data['title'] ?></h3>
    </div>
    <div class="card-body">
        <form action="<?= BASEURL; ?>/admin/daftar_pesanan/show" , method="POST">
            <div class="form-group-apend">
                <div class="row pb-3">
                    <div class="col align-self-center pr-0">
                        <div class="input-group-prepended ">
                            <input type="text" class="form-control" name='search' placeholder="cari berdasarkan nama menu">
                        </div>
                    </div>
                    <div class="col-md-auto align-self-center">
                        <div class="input-group-apend">
                            <button type="submit" class="btn btn-sm p-2 text-white"><i class="fa fa-search mr-2 text-white"></i>SEARCH</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" width="30px">No</th>
                    <th class="text-left" width="300px">Name</th>
                    <th class="text-center" width="70px">No meja</th>
                    <th class="text-left"></th>
                    <th class="text-center" width="100px">Daftar Menu</th>
                    <th class="text-center" width="120px">Actions</th>
                </tr>
            </thead>
        </table>
        <div class="table-full-width table-responsive" style="border-collapse:collapse;">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="30px"></th>
                        <th class="text-left" width="300px"></th>
                        <th class="text-center" width="70px"></th>
                        <th class="text-left"></th>
                        <th class="text-center" width="100px"></th>
                        <th class="text-center" width="120px"></th>
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
                                    <a onclick="alert_warning('status pesanan akan diubah menjadi Diantar', 'ANDA YAKIN PESANAN SUDAH SIAP DIANTAR?', 'ANTAR!', '$url/admin/daftar_pesanan/antar_pesanan/$id')" class='text-light' style = 'font-size : 20px;'><i class='fas fa-paper-plane fa-2x text-white'></i></a>
                                </button>
                                <button type='button' rel='tooltip' title='' class='btn btn-icon btn-danger' data-original-title='Edit Kategori'>
                                    <a onclick="alert_warning('status pesanan akan diubah menjadi Ditolak', 'ANDA YAKIN INGIN MENOLAK PESANAN?', 'TOLAK!', '$url/admin/daftar_pesanan/tolak_pesanan/$id')" class='text-light' style = 'font-size : 20px;'><i class='tim-icons icon-simple-remove text-white'></i></a>
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
                                                    <th class='text-left' width = '270px'>nama makanan</th>
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
