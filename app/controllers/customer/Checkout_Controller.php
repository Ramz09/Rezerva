<?php

use Midtrans\Snap;
use App\models\Cart;
use App\models\Menu;
use App\models\Order;
use App\models\Invoice;
use App\models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

require '../vendor/autoload.php';

class Checkout_Controller extends Controller
{

    public function __construct()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-J8w5w1HZkc3QYjMNVpq-C1lf';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }


    public function store()
    {
        session_start();
        
    
            //create customer table
            $customer = Customer::create([
                'name' => $_POST['customer_name'],
                'email' => 'admin@gmail.com',
                'password' => 'admin',
            ]);

            // // create invoice number
            $length = 10;
            $random = '';

            for ($i = 0; $i < $length; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }
            // //generate no invoice
            $no_invoice = 'INV-' . Str::upper($random);
            $invoice = Invoice::create([
                'invoice' => $no_invoice,
                'customer_id' => $customer->id,
                'table_id' => $_POST['no_meja'],
                'grand_total' => $_POST['grand_total'],
                'status_pembayaran' =>'success',
                'status_pesanan' =>'dikonfirmasi',
            ]);

            foreach (Cart::where('session_id', $_SESSION['session_id'])->get() as $cart) {

                //insert product ke table order
                $invoice->orders()->create([
                    'invoice_id' => Invoice::latest('id')->first()->id,
                    'menu_id' => $cart->menu_id,
                    'qty' => $cart->jumlah,
                    'table_id'=>$_POST['no_meja'],
                    'description' =>$cart->keterangan,
                    'price' => $cart->price
                ]);   

                $sold = Menu::where('id', $cart->menu_id)->first()->sold;
                Menu::where('id', $cart->menu_id)->update([
                    'sold' => $sold + $cart->jumlah,
                ]);

            }
            // $menus = $_SESSION['keranjang']['menus'];
            // for ($i=0; $i < count($menus); $i++) { 
            //     $menu = $menus[$i];
            //     Order::create([
            //         'invoice_id' => Invoice::latest('id')->first()->id,
            //         'menu_id' => $menu['menu']['0']->id,
            //         'qty' => $menu['jumlah'],
            //         'table_id'=>$_POST['no_meja'],
            //         'description' =>$menu['keterangan'],
            //         'price'=>($menu['menu'][0]->price*(100-$menu['menu'][0]->discount)/100)*$menu['jumlah']
            //     ]);
            //     $sold = Menu::where('id', $cart->menu_id)->first()->sold;
            //     Menu::where('id', $cart->menu_id)->update([
            //         'sold' => $sold + $cart->jumlah,
            //     ]);
            // }

            //hapus keranjang
             //remove cart by customer
             Cart::with('menu')
             ->where('session_id', $_SESSION['session_id'])
             ->delete();

             $_SESSION['session_id'] = null;
            //create transaction to midtrans, then save snap token
            $payload = [
                'transaction_details' => [
                    'order_id'      => $invoice->invoice,
                    'gross_amount'  => $invoice->grand_total,
                ],
                'customer_details' => [
                    'first_name'       => Customer::whereId($customer->id)->first()->name,
                    'email'            => Customer::whereId($customer->id)->first()->email,
                    'phone'            => '081983744023',
                ]
            ];

            $snap_token = Snap::getSnapToken($payload);

            //update snap_token
            $invoice->snap_token = $snap_token;
            $invoice->save();
            
            session_start();
            $_SESSION['customer_id'] = $customer->id;
            header('location:'. BASEURL. '/customer/invoice/show/'.$snap_token);


            




            //store order by invoice
       
        



    }
}


