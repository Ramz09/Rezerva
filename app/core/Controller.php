<?php

require '../vendor/autoload.php';

use App\models\Cart;
use App\models\Category;

class Controller {
  public function view($view, $data = [], $layout = ""){
    $data['data_categories'] = Category::all();
    if (isset($_SESSION['session_id'])) {
      $data['countCarts'] = Cart::where('session_id',$_SESSION['session_id'])->get()->count();
    }else{
      $data['countCarts'] = 0;
    }
    if($layout == 'customer'){
      $this::getComponent('customer/header-customer', $data);
      require_once '../app/views/pages/customer/' . $view . '.php';
      $this::getComponent('customer/footer-customer', $data);
    }else if($layout == 'admin'){
      $this::getComponent('admin/header-admin', $data);
      require_once '../app/views/pages/admin/' . $view . '.php';
      $this::getComponent('admin/footer-admin', $data);
    }else{
      require_once '../app/views/pages/single/' . $view . '.php';
    }
  }

  private static function getComponent($view, $data = []){
    require_once '../app/views/components/' . $view . '.php';
  }

  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model;
  }
}