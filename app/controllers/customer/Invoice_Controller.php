<?php

use App\models\Invoice;

require '../vendor/autoload.php';

class Invoice_Controller extends Controller{


    public function index(){ 
        session_start();
        $customer_id = $_SESSION['customer_id'];
        $data =[
            'title' => 'Invoice',
            'invoices' =>Invoice::where('customer_id',$customer_id)->get()
        ];
        $this->view('invoice', $data, 'customer');

    }


    public function show($snap_token){
        session_start();
        $customer_id = $_SESSION['customer_id'];
        $data =[
            'title' => 'Detail Invoice',
            'invoices' =>Invoice::with('orders.menu','customer')->where('customer_id',$customer_id)->where('snap_token',$snap_token)->first(),
        ];
        $this->view('detail-invoice', $data, 'single');

    }
}