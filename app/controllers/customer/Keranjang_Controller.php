<?php

use App\models\Cart;
use App\models\Menu;

require '../vendor/autoload.php';

class Keranjang_Controller extends Controller
{
    public function index()
    {
        session_start();
        if (isset($_SESSION['session_id'])) {
          $session = $_SESSION['session_id'];
          if(Cart::with('menu')->where('session_id', $session)->count() > 0){
            $carts = Cart::with('menu')->where('session_id', $session)->latest()->get();
            $totalPrice = Cart::with('menu')
                ->where('session_id', $_SESSION['session_id'])
                ->sum('price');
            $data = [
                "title" => 'keranjang',
                "menu" => $carts,
                "total_price" => $totalPrice
            ];
            $this->view('keranjang', $data, 'customer');
          }else{
            $data = ['title' => 'Keranjang Kosong',];
            $this->view('keranjang-kosong', $data, 'customer');
          }
        }else{
            $data = ['title' => 'Keranjang Kosong',];
            $this->view('keranjang-kosong', $data, 'customer');
        }
    }

    public function store($menu_id)
    {
        session_start();
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        if (isset($_SESSION['session_id'])) {
            // echo $_COOKIE['session_id'];
            $session_id = $_SESSION['session_id'];
            $item = Cart::where('menu_id', $menu_id)->where('session_id', $session_id);
            $price = Menu::where('id', $menu_id)->first()->final_price;


            if ($item->count()) {
                $total_item = $item->first()->jumlah + $jumlah;
                $item->update([
                    'jumlah' => $total_item,
                    'price' => $price * $total_item,
                    'keterangan' => $item->first()->keterangan . ", " . $keterangan,
                ]);

                header('Location: ' . BASEURL . '/customer/keranjang');
            } else {
                $cart = Cart::insert([
                    'menu_id' => $menu_id,
                    'session_id' => $session_id,
                    'price' => $price * $jumlah,
                    'jumlah' => $jumlah,
                    'keterangan' => $keterangan
                ]);
                if ($cart) {
                    $_SESSION['alert'] = [
                        'message' => 'menu berhasil dimasukkan ke keranjang',
                        'type' => 'success',
                    ];
                    // setcookie('session_id', $random);


                    header('Location: ' . BASEURL . '/customer/keranjang');
                }
            }
        } else {
            $price = Menu::where('id', $menu_id)->first()->final_price;
            $random = rand(0, 100000);
            $item = Cart::insert([
                'menu_id' => $menu_id,
                'session_id' => $random,
                'price' => $price * $jumlah,
                'jumlah' => $jumlah,
                'keterangan' => $keterangan
            ]);
            if ($item) {

                $_SESSION['alert'] = [
                    'message' => 'menu berhasil dimasukkan ke keranjang',
                    'type' => 'success',
                ];
                // setcookie('session_id', $random);
                $_SESSION['session_id'] = $random;

                header('Location: ' . BASEURL . '/customer/keranjang');
            }
        }
    }


    public function edit($id)
    {
        session_start();
        $cart = Cart::whereId($id)->first();
        $menu = Menu::where('id', $cart->menu_id)->first();
        $data = [
            'title' => 'Edit Keranjang',
            'detail_menu' => $menu,
            'detail_keranjang' => $cart,
        ];
        $this->view('edit-keranjang', $data, 'customer');
    }

    public function update($id)
    {
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        $cart = Cart::whereId($id);
        $price = $_POST['price'];
        $send = $cart->update([
            'jumlah' => $jumlah,
            'keterangan' => $keterangan,
            'price' => $jumlah * $price
        ]);
        if ($send) {
            session_start();
            $_SESSION['alert'] = [
                'message' => 'data keranjang berhasil diedit',
                'type' => 'success',
            ];
            header('location:' . BASEURL . '/customer/keranjang');
        }
    }

    public function removeChart($id)
    {
        $cart = Cart::with('menu')->whereId($id)->first();
        $cart->delete();
        session_start();
        $_SESSION['alert'] = [
            'message' => 'data keranjang berhasil dihapus',
            'type' => 'success',
        ];
        header('location:' . BASEURL . '/customer/keranjang');
    }

    public function countItems()
    {
        $items = Cart::where('session_id', $_SESSION['session_id'])->get()->count();
        setcookie('countChart', $items);
        return $items;
    }
}
