<?php 

require '../vendor/autoload.php';
use App\models\Menu;
use App\models\Category;

class Home_Controller extends Controller{
  public function index()
  {
    session_start();
    $menu_andalan_id = Category::where('name', 'Menu Andalan')->first()->id ?? '';
    $menu_terbaru_id = Category::where('name', 'Menu Terbaru')->first()->id ?? '';
    $data = [
      'title' => 'Home',
      'menu_andalan' => Menu::with('category')->where('category_id', $menu_andalan_id)->get(),
      'menu_terbaru' => Menu::with('category')->where('category_id', $menu_terbaru_id)->get(),
    ];
    $this->view('home', $data, 'customer');
  }
}