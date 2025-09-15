<?php 

require '../vendor/autoload.php';
use App\models\Menu;
use App\models\Category;

class Documentation_Controller extends Controller{
  public function index()
  {
    session_start();
    $data = ['title' => 'Documentation',];
    $this->view('documentation', $data, 'customer');
  }
}