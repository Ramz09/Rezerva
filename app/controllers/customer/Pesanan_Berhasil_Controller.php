<?php

use App\models\Invoice;

require '../vendor/autoload.php';

class Pesanan_Berhasil_Controller extends Controller{
    public function index(){
        session_start();
        $customer_id = $_SESSION['customer_id'];

        $data =[
            'title' => "Pesanan Berhasil",
            'invoice' =>Invoice::with('orders.menu','customer')->where('customer_id',$customer_id)->first(),
            
        ];
        $this->view('pesanan-berhasil', $data, 'single');

    }
}