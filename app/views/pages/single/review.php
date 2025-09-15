<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?=BASEURL?>/assets/img/slack-logo-icon.png" />
    <title>Rezerva | Customer | <?= $data['title']; ?></title>
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
    <link rel="stylesheet" type="text/css" href="<?=BASEURL?>/assets/css/custom.css">

</head>

<body>
    <div class="container-sm">
        <div class="fade-in">
            <div class="row">

                <div class="col-md-12">
                    <div class="card border-0 rounded shadow-sm border-top-orange">
                        <div class="card-body">
                            <p><i class="fa fa-shopping-cart"></i> DETAIL ORDER</p>
                            <hr>
                            <table class="table table-bordered">
                                <client-only>
                                    <tr>
                                        <td style="width: 35%">
                                            <p>NO. INVOICE </p>
                                        </td>
                                        <td style="width: 1%">:</td>
                                        <td>
                                            <p><?= $data['invoices']->invoice; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>NAMA</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <p><?= htmlspecialchars($data['invoices']->customer->name); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>GRAND TOTAL</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <p><?= money_format($data['invoices']->grand_total); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>STATUS</p>
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <button id="btn-status" class="btn btn-sm btn-info" disabled> success</button>
                                            <a href="<?= BASEURL;?>/home" class="btn btn-sm " style="background-color:#ffc107">kembali ke home</a>


                                        </td>
                                    </tr>
                                </client-only>
                            </table>

                        </div>
                    </div>

                    <div class="card border-0 rounded shadow-sm border-top-orange mt-4">
                        <div class="card-header">
                            <span class="font-weight-bold"><i class="fa fa-shopping-cart"></i> DETAIL ITEMS</span>
                        </div>
                        <div class="card-body">
                            <table class="mx-2 rounded" style='border-color: rgb(198, 206, 214) !important;'>


                                <?php
                                $url = BASEURL;
                                $customer_id = $_SESSION['customer_id'];

                                foreach ($data['invoices']->orders as $orders) {
                                    $image_menu = $orders->menu->image;
                                    $menu = $orders->menu;
                                    $price = money_format($orders->price);
                                    $menu_id = $menu->id;

                                    echo "<tr style='background: #edf2f7; border: 1px solid rgba(71, 71, 71, 0.67);border-radius: 25px; margin-bottom:5px; '>
                                        <td class='b-none' width='15%'>
                                        <div class='wrapper-image-cart'>
                                        <img class='mx-2' src='$url/img/menus/$image_menu' style='width: 80%;border-radius: .5rem'>
                                        </div>
                                        </td>
                                        <td class='b-none'>
                                                <p class='mt-2'>$menu->title</p>
                                                <p>Jumlah : $orders->qty</p>
                                                <button
                                                    type='button'
                                                    class='btn btn-sm btn-warning mb-3'
                                                    data-mdb-toggle='modal'
                                                    data-mdb-target='#exampleModal$menu->id'
                                                    id='btn-ulas$menu->id'
                                                    >
                                                    Beri Ulasan
                                                    </button>
                                            </td>
                                            <td class='b-none text-right'>
                                            <p class='text-right'>$price</p>
                                            </td>
                                            
                                            

                                            <!-- Modal -->
                                            <div
                                            class='modal fade'
                                            id='exampleModal$menu->id'
                                            tabindex='-1'
                                            aria-labelledby='exampleModalLabel'
                                            aria-hidden='true'
                                            >
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Beri Ulasan</h5>
                                                    <button
                                                    type='button'
                                                    class='btn-close'
                                                    data-mdb-dismiss='modal'
                                                    aria-label='Close'
                                                    ></button>
                                                </div>
                                                <form action= '$url/customer/review/store' method='POST'>
                                                <div class='modal-body'>
                                            
                                                <div class='text-center my-3'>
                                                    <span class='fa fa-star checked ' id='f_star_1_$menu_id' onClick='rate(1, $menu_id)'></span>
                                                    <span class='fa fa-star checked ' id='f_star_2_$menu_id' onClick='rate(2, $menu_id)'></span>
                                                    <span class='fa fa-star checked ' id='f_star_3_$menu_id' onClick='rate(3, $menu_id)'></span>
                                                    <span class='fa fa-star ' id='f_star_4_$menu_id' onClick='rate(4, $menu_id)'></span>
                                                    <span class='fa fa-star ' id='f_star_5_$menu_id' onClick='rate(5, $menu_id)'></span>
                                                </div>
                                                <input type='hidden' name='rating' id='rating' value='3'>
                                                <input type='hidden' name='menu_id' id='menu' value='$menu->id'>
                                                <input type='hidden' name='customer_id' id='customer' value='$customer_id'>
                                            <div class='form-group'>
                                            <textarea class='form-control' id='review' name='review' rows='3' placeholder='Masukkan Ulasan Menu'
                                            required></textarea>
                                            </div>
                                        </div>
                                        <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-mdb-dismiss='modal'>
                                        Close
                                    </button>
                                            <button class='btn btn-info mr-1 btn-submit' type='submit'><i class='fa fa-paper-plane'></i>
                                            Kirim</button>
                                        </div>
                                    </form>
                                            
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            console.log(document.getElementsByName('rating')[1].value);

            function rate(id, menu_id) {
                let rating = document.getElementsByName('rating');
                for(i = 0; i < rating.length; i++){
                    document.getElementsByName('rating')[i].value = id;

                    switch (id) {
                        case 1:
                            checked('f_star_1_' + menu_id);
                            unchecked('f_star_2_' + menu_id);
                            unchecked('f_star_3_' + menu_id);
                            unchecked('f_star_4_' + menu_id);
                            unchecked('f_star_5_' + menu_id);
                            break;
                        case 2:
                            checked('f_star_1_' + menu_id);
                            checked('f_star_2_' + menu_id);
                            unchecked('f_star_3_' + menu_id);
                            unchecked('f_star_4_' + menu_id);
                            unchecked('f_star_5_' + menu_id);
                            break;
                        case 3:
                            checked('f_star_1_' + menu_id);
                            checked('f_star_2_' + menu_id);
                            checked('f_star_3_' + menu_id);
                            unchecked('f_star_4_' + menu_id);
                            unchecked('f_star_5_' + menu_id);
                            break;
                        case 4:
                            checked('f_star_1_' + menu_id);
                            checked('f_star_2_' + menu_id);
                            checked('f_star_3_' + menu_id);
                            checked('f_star_4_' + menu_id);
                            unchecked('f_star_5_' + menu_id);
                            break;
                        case 5:
                            checked('f_star_1_' + menu_id);
                            checked('f_star_2_' + menu_id);
                            checked('f_star_3_' + menu_id);
                            checked('f_star_4_' + menu_id);
                            checked('f_star_5_' + menu_id);
                            break;
                        default:
                    }
                }
            }
                
                

            function checked(star_id) {
                var element = document.getElementById(star_id);
                element.classList.add('checked');
            }

            function unchecked(star_id) {
                var element = document.getElementById(star_id);
                element.classList.remove('checked');
            }
        </script>
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
</body>

</html>