<?php 

require '../vendor/autoload.php';
use App\models\Menu;
use App\models\Category;
use App\models\Review;
use App\models\Order;
use Illuminate\Support\Str;

class Kelola_Menu_Controller extends Controller{
  public function index()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = [
      'title' => 'Kelola Menu',
      'menus' => Menu::with('category')->get(),
    ];
    $this->view('kelola-menu', $data, 'admin');
  }

  public function tambah_menu()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = [
      'title' => 'Tambah Menu',
      'categories' => Category::All(),
    ];
    $this->view('tambah-menu', $data, 'admin');
  }

  public function edit_menu($id)
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = [
      'title' => 'Edit Menu',
      'this_menu' => Menu::with('category')->where('id', $id)->get(),
      'categories' => Category::All(),
    ];
    $this->view('edit-menu', $data, 'admin');
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
        'title' => 'Kelola Menu',
        'menus' => Menu::with('category')->where('title', 'like', '%'.$search.'%')->get(),
      ];
      $this->view('kelola-menu', $data, 'admin');
    }else{
      header('Location: ' . BASEURL . '/admin/kelola_menu');
    }
  }

  public function store(){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $image_name = $_FILES['image']['name'];
    $allowed_extension = ['png', 'jpg', 'jpeg'];
    $x = explode('.', $image_name);
    $extension = strtolower(end($x));
    $size = $_FILES['image']['size'];

    $name = $_POST['name']; 

    $price = $_POST['price']; 

    $discount = $_POST['discount']; 

    $final_price = $price * (100 - $discount) / 100; 

    $category_id = $_POST['category_id'];
     
    $description = $_POST['description'];

    if($name != null && $image_name != null && $price != null && $category_id != null && $description !== null && $discount != null){
      if(in_array($extension, $allowed_extension) === true){
        // echo 'type true';
        if($size < 2000000){
          // echo 'ukuran true';
          $direktori = 'img/menus/';
          move_uploaded_file($_FILES['image']['tmp_name'], $direktori.$image_name);
          $menu = Menu::create([
            'image' => $image_name,
            'title' => $name,
            'slug' => Str::slug($name, '-'),
            'category_id' => $category_id,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
          ]);
          if($menu){
            $_SESSION['alert'] = [
              'message' => 'data menu berhasil ditambahkan',
              'type' => 'success',
            ];
            header('Location: ' . BASEURL . '/admin/kelola_menu');
          }
        }else{
          $_SESSION['alert'] = [
            'message' => 'ukuran file gambar tidak boleh lebih dari 2MB',
            'type' => 'error',
          ];
          header('Location: ' . BASEURL . '/admin/kelola_menu/tambah_menu');
        }
      }else{
        $_SESSION['alert'] = [
          'message' => 'format file gambar harus .jpg, .png, atau .jpeg',
          'type' => 'error',
        ];
        header('Location: ' . BASEURL . '/admin/kelola_menu/tambah_menu');
      }
    }else{
      header('Location: ' . BASEURL . '/admin/kelola_menu/tambah_menu');
    }  
  }

  public function update($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $image_name = $_FILES['image']['name'];
    $allowed_extension = ['png', 'jpg', 'jpeg'];
    $x = explode('.', $image_name);
    $extension = strtolower(end($x));
    $size = $_FILES['image']['size'];

    $name = $_POST['name']; 

    $price = $_POST['price']; 

    $discount = $_POST['discount']; 

    $final_price = $price * (100 - $discount) / 100; 

    $category_id = $_POST['category_id'];
     
    $description = $_POST['description'];

    if($name != null && $image_name != null && $price != null && $category_id != null && $description !== null && $discount != null){
      if(in_array($extension, $allowed_extension) === true){
        // echo 'type true';
        if($size < 2000000){
          // echo 'ukuran true';
          $direktori = 'img/menus/';
          $menu = Menu::where('id', $id)->get();
          unlink($direktori . $menu[0]->image);
          move_uploaded_file($_FILES['image']['tmp_name'], $direktori.$image_name);
          $menu = Menu::where('id', $id)->update([
            'image' => $image_name,
            'title' => $name,
            'slug' => Str::slug($name, '-'),
            'category_id' => $category_id,
            'description' => $description,
            'price' => $price,
            'discount' => $discount,
            'final_price' => $final_price,
          ]);
          if($menu){
            $_SESSION['alert'] = [
              'message' => 'data menu berhasil diedit',
              'type' => 'success',
            ];
            header('Location: ' . BASEURL . '/admin/kelola_menu');
          }
        }else{
          $_SESSION['alert'] = [
            'message' => 'ukuran file gambar tidak boleh lebih dari 2MB',
            'type' => 'error',
          ];
          header('Location: ' . BASEURL . '/admin/kelola_menu/edit_menu/' . $id);
        }
      }else{
        $_SESSION['alert'] = [
          'message' => 'format file gambar harus .jpg, .png, atau .jpeg',
          'type' => 'error',
        ];
        header('Location: ' . BASEURL . '/admin/kelola_menu/edit_menu/' . $id);
      }
    }else if($name != null && $price != null && $category_id != null && $description !== null && $discount != null){
      $menu = Menu::where('id', $id)->update([
        'title' => $name,
        'slug' => Str::slug($name, '-'),
        'category_id' => $category_id,
        'description' => $description,
        'price' => $price,
        'discount' => $discount,
        'final_price' => $final_price,
      ]);
      if($menu){
        $_SESSION['alert'] = [
          'message' => 'data menu berhasil diedit',
          'type' => 'success',
        ];
        header('Location: ' . BASEURL . '/admin/kelola_menu');
      }
    }else{
      header('Location: ' . BASEURL . '/admin/kelola_menu/edit_menu/' . $id);
    }  
  }

  public function destroy($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $direktori = 'img/menus/';
    $menu = Menu::where('id', $id)->get();
    unlink($direktori . $menu[0]->image);

    $orders =  Order::where('menu_id', $id)->get();
    $reviews = Review::where('menu_id', $id)->get();

    if(count($orders) > 0){
      Order::where('menu_id', $id)->delete();
    }

    if(count($reviews) > 0){
      Review::where('menu_id', $id)->delete();
    }

    $menu = Menu::where('id', $id)->delete();
    if($menu){
      $_SESSION['alert'] = [
        'message' => 'data menu berhasil dihapus',
        'type' => 'success',
      ];
      header('Location: ' . BASEURL . '/admin/kelola_menu');
    }
  }

  public function set_stock($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    if(Menu::where('id', $id)->first()->stock == 'tersedia'){
      $menu = Menu::where('id', $id)->update([
        'stock' => 'habis',
      ]);
    }else{
      $menu = Menu::where('id', $id)->update([
        'stock' => 'tersedia',
      ]);
    }

    if($menu){
      $_SESSION['alert'] = [
        'message' => 'stok menu berhasil diubah',
        'type' => 'success',
      ];
      header('Location: ' . BASEURL . '/admin/kelola_menu');
    }
  }
}