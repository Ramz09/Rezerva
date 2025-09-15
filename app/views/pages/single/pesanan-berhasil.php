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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- local css -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Rezerva | Customer | <?= $data['title']; ?></title>
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&family=Montserrat&family=Nunito:wght@200;300;400;500;600&family=Pacifico&display=swap');

        body {
            background-color: #00B74A;
            font-family: 'Nunito', sans-serif;
        }

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
    <div class="container">
        <div class="row">
            <div class="col">
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_8uupryy2.json" background="transparent" speed="1" style="width: 230px; height: 230px;margin:auto; transform:translateY(80px);" loop autoplay></lottie-player>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5">
                <h3 class="text-center text-white">Pembayaran Berhasil</h3>
                <p class="text-center text-white">Hore! Pembayaran Sudah Selesai</p>
                <hr>
                <p class="text-center text-white mt-2">JUMLAH PEMBAYARAN</p>
                <h4 class="text-center text-white mt-1"> <?= money_format($data['invoice']->grand_total); ?> </h4>

            </div>
            <div class="row">
                <div class="col">
                    <div class="card rounded shadow p-2">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th class="text-left">Menu</th>
                                <th class="text-left">Keterangan</th>
                                <th class="text-center">Jumlah</th>
                                <!-- <th class="text-center">Status</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            foreach($data['invoice']->orders as $orders){
                                $menu = $orders->menu;
                                $description = htmlspecialchars($orders->description);
                                echo "<tr>";
                                echo "<td>$menu->title</td>";
                                echo "<td class='text-left'>$description</td>";
                                echo "<td class='text-center'>$orders->qty</td>";
                                // echo "<td class='text-center'>$orders->status</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="row mt-2 mb-3">
                <div class="col d-flex justify-content-center">
                <!-- <a href="<?= BASEURL;?>/home" class="btn btn-info">Kembali Ke Home</a> -->
                <a href="<?= BASEURL;?>/customer/success/set_status_invoice/<?=$data['invoice']->customer_id?>" class="btn btn-info">Terima Pesanan</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>