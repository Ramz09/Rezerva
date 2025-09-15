<?php 

require '../vendor/autoload.php';

use App\models\Admin;

class Login_Controller extends Controller{
  public function index()
  {
    session_start();
    if(isset($_SESSION['login'])){
      $_SESSION['alert'] = [
        'message' => 'Anda berhasil login',
        'type' => 'success',
      ];
      header('location:'. BASEURL. '/admin/dashboard');
    }
    $data = ['title' => 'Login',];
    $this->view('login-admin', $data, 'single');
  }

  public function login(){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin = Admin::where('email', $email)->where('password', $password)->first();

    if($admin){
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['admin'] = $admin->name;
      $_SESSION['alert'] = [
        'message' => 'Anda berhasil login',
        'type' => 'success',
      ];
      header('location:'. BASEURL. '/admin/dashboard');
    }else{
      $data = [
        'title' => 'Login',
        'email' => $email,
      ];
      session_start();
      $_SESSION['alert'] = [
        'message' => 'email dan password tidak ditemukan',
        'type' => 'error',
      ];
      $this->view('login-admin', $data, 'single');
    }
  }

  public function logout(){
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['admin']);
    $_SESSION['alert'] = [
      'message' => 'Anda berhasil logout',
      'type' => 'success',
    ];
    header('location:'. BASEURL. '/admin/login');
  }
}