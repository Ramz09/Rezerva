<?php 

use App\models\Invoice;
use App\models\Review;
use App\models\Menu;

require '../vendor/autoload.php';

class Review_Controller extends Controller {


    public function index() {
        session_start();
        $customer_id = $_SESSION['customer_id'];
        $data =[
            'title' => 'Review',
            'invoices' =>Invoice::with('orders.menu','customer')->where('customer_id',$customer_id)->first(),
        ];
        $this->view('review', $data, 'single');
    }

    public function store(){
        session_start();
        $menu_id = $_POST['menu_id'];
        $customer_id = $_POST['customer_id']; 
        $rating = $_POST['rating']; 
        $review = $_POST['review'];
         
        if(Review::where('customer_id', $customer_id)->where('menu_id', $menu_id)->first()){
            Review::where('customer_id', $customer_id)->where('menu_id', $menu_id)->update([
                'rate' => $rating,
                'review' => $review,
            ]);
        }else{
            Review::create([
                'menu_id' => $menu_id,
                'customer_id' => $customer_id,
                'rate' => $rating,
                'review' => $review,
            ]);
        }
        

        $final_rating = Review::where('menu_id', $menu_id)->avg('rate');

        if($final_rating){
            Menu::where('id', $menu_id)->update([
                'rating' => $final_rating,
            ]);
        }

        header('location:'. BASEURL. '/customer/review');
        // //SHOLAT SUBUH DULU GUYS!!!
    }
}