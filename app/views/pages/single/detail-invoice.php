
<?php

use App\models\Invoice;

require '../vendor/autoload.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="<?=BASEURL?>/assets/img/slack-logo-icon.png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
    rel="stylesheet"
    />
    <!-- local css -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Rezerva | Customer | <?=$data['title'];?></title>
    <!-- snap pay configuration -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-_0bji155hJ_YL7Pw"></script>
    <style>
       h5 {
    font-size: 1em;
    font-weight: 500;
  }

      @media (max-width: 600px) {
 
  p {
    font-size: 0.7em;
  }
  h5 {
    font-size: 0.7em;
    font-weight: 400;
  }
}
    </style>
</head>
<body>
  <div class="container ">
<div class="card border-0 rounded shadow mt-5">
            <div class="card-body">
              <h5><i class="fa fa-shopping-cart"></i> DETAIL ORDER</h5>
              <hr>
              <table class="table-responsive border-0">
                <client-only>
                  <tr>
                    <td style="width: 25%">
                    <h5>NO. INVOICE </h5>
                    </td>
                    <td style="width: 1%">:</td>
                    <td>
                        <h5><?= $data['invoices']->invoice; ?></h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <h5>NAMA</h5>
                    </td>
                    <td>:</td>
                    <td>
                        <h5><?= htmlspecialchars($data['invoices']->customer->name); ?></h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <h5>GRAND TOTAL</h5>
                    </td>
                    <td>:</td>
                    <td>
                        <h5><?= money_format($data['invoices']->grand_total); ?></h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                        <h5>STATUS</h5>
                    </td>
                    <td>:</td>
                    <td>
                      <button id="btn-status" class="btn btn-sm btn-info"> pending</button>
                      <button class="btn btn-sm btn-success"id="pay-button" onclick="openSnap()">Bayar Sekarang</button>


                    </td>
                  </tr>
                </client-only>
              </table>
            </div>
          </div>

          <div class="card border-0 rounded shadow border-top-orange mt-4 mb-5">
            <div class="card-header">
              <h5 class="font"><i class="fa fa-shopping-cart"></i> DETAIL ITEMS</h5>
            </div>
            <div class="card-body">
              <table class="mx-2 rounded" style='border-color: rgb(198, 206, 214) !important;'>
              <tr>
              <th><h5>Foto</h5> </th>
              <th><h5>Makanan</h5> </th>
              <th><h5>Jumlah</h5> </th>
              <th><h5>Keterangan</h5></th>
              <th><h5>Meja</h5> </th>
              <th><h5>Total</h5> </th>
              </tr>
              
              <?php
              $url = BASEURL;
              
              foreach($data['invoices']->orders as $orders){
                $image_menu = $orders->menu->image;
                $menu = $orders->menu;
                $price = money_format($orders->price);
                $description = htmlspecialchars($orders->description);

                echo "<tr style='background: #edf2f7; margin-bottom:5px; '>
                  <td class='b-none' width='15%'>
                  <div class='wrapper-image-cart'>
                  <img src='$url/img/menus/$image_menu' style='width: 80%;border-radius: .5rem'>
                </div>
                  </td>
                  <td class='b-none'>
                        <p>$menu->title</p>
                      </td>
                      <td class='b-none '>
                      <p class='m-0'>$orders->qty</p>
                    </td>
                      <td class='b-none '>
                      <p class='m-0'>$description</p>
                    </td>
                      <td class='b-none text-left'>
                      <p class='m-0'>$orders->table_id</p>
                    </td>
                      <td class='b-none text-right'>
                      <p class='m-0'>$price</p>
                    </td>
                </tr>";
              }
                ?>
                </table>
            </div>
          </div>
        </div>


<script type="text/javascript">

    function getURL() {
        url = window.location.href;
        const url_arr = url.split("/");
        let url_count = url_arr.length;
        snap_token = url_arr[url_count-1];
        console.log(snap_token);

        return snap_token;
    }

    function openSnap(){
        snap_token = getURL();
        console.log(snap_token);
        // window.snap.pay($snap_token);
        window.snap.pay(snap_token, {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            
            window.location.replace("<?= BASEURL;?>/customer/pesanan_berhasil")
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })

        
    }
    </script>
  
</body>
</html>
   

