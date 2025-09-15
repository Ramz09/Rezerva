<?php 

require '../vendor/autoload.php';
use App\models\Admin;

class Kelola_Admin_Controller extends Controller{
  public function index()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = [
      'title' => 'Kelola Admin',
      'admins' => Admin::All(),
    ];
    $this->view('kelola-admin', $data, 'admin');
  }

  public function tambah_admin()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = ['title' => 'Tambah Admin',];
    $this->view('tambah-admin', $data, 'admin');
  }

  public function edit_admin($id)
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data = [
      'title' => 'Edit Admin',
      'this_admin' => Admin::where('id', $id)->get(),
    ];
    $this->view('edit-admin', $data, 'admin');
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
        'title' => 'Kelola Admin',
        'admins' => Admin::where('name', 'like', '%'.$search.'%')->get(),
      ];
      $this->view('kelola-admin', $data, 'admin');
      
    }else{
      header('Location: ' . BASEURL . '/admin/kelola_admin');
    }
  }

  public function store(){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $name = $_POST['name']; 

    $email = $_POST['email'];

    $password = $_POST['password']; 

    $confirm_password = $_POST['confirm_password'];

    if($name != null && $email != null && $password != null && $confirm_password != null){
      if($password == $confirm_password){
        $admin= Admin::create([
          'name' => $name,
          'email' => $email,
          'password' =>$password
        ]);
        if($admin){
          $_SESSION['alert'] = [
            'message' => 'data admin berhasil ditambahkan',
            'type' => 'success',
          ];          
          header('Location: ' . BASEURL . '/admin/kelola_admin');
        }
      }else{
        $_SESSION['alert'] = [
          'message' => 'password dan konfirmasi password harus sama',
          'type' => 'error',
        ];
        header('Location: ' . BASEURL . '/admin/kelola_admin/tambah_admin');
      }   
    }else{
      header('Location: ' . BASEURL . '/admin/kelola_admin/tambah_admin');
    } 
  }

  public function update($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $name = $_POST['name']; 

    $email = $_POST['email'];

    $password = $_POST['password']; 

    $confirm_password = $_POST['confirm_password'];

    if($name != null && $email != null && $password != null && $confirm_password != null){
      if($password == $confirm_password){
        $admin= Admin::where('id', $id)->update([
          'name' => $name,
          'email' => $email,
          'password' =>$password
        ]);
        if($admin){
          $_SESSION['alert'] = [
            'message' => 'data admin berhasil diedit',
            'type' => 'success',
          ];
          header('Location: ' . BASEURL . '/admin/kelola_admin');
        }
      }else{
        $_SESSION['alert'] = [
          'message' => 'password dan konfirmasi password harus sama',
          'type' => 'error',
        ];
        header('Location: ' . BASEURL . '/admin/kelola_admin/edit_admin/' . $id);
      }   
    }else{
      header('Location: ' . BASEURL . '/admin/kelola_admin/edit_admin/' . $id);
    } 
  }

  public function destroy($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $admin = Admin::where('id', $id)->delete();
    if($admin){
      $_SESSION['alert'] = [
        'message' => 'data admin berhasil dihapus',
        'type' => 'success',
      ];
      header('Location: ' . BASEURL . '/admin/kelola_admin');
    }
  }
}