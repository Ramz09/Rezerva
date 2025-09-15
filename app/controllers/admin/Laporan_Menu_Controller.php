<?php 

require '../vendor/autoload.php';
use App\models\Menu;

class Laporan_Menu_Controller extends Controller{
  public function index()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = [
      'title' => 'Laporan Menu',
      'menus' => Menu::with('reviews.customer')->get(),
    ];
    $this->view('laporan-menu', $data, 'admin');
  }

  public function show()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }
    
    $search = $_POST['search'];

    if($search){
      $data = [
        'title' => 'Laporan Menu',
        'menus' => Menu::with('reviews')->where('title', 'like', '%'.$search.'%')->get(),
      ];
      $this->view('laporan-menu', $data, 'admin');
    }else{
      header('Location: ' . BASEURL . '/admin/laporan_menu');
    }
  }
}