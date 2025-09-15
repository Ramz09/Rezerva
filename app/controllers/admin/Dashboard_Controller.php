<?php 


require '../vendor/autoload.php';
use App\models\Invoice;
use App\models\Customer;
use App\models\Menu;
use Illuminate\Support\Carbon;

class Dashboard_Controller extends Controller{
  public function index()
  { 
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $data_perbulan = [];
    for($i = 1; $i < 13; $i++){
      array_push($data_perbulan, Invoice::where('status_pembayaran', 'success')->whereYear('created_at', Carbon::today()->format('Y'))->whereMonth('created_at', $i)->sum('grand_total'));
    }

    $data = [
      'title' => 'Dashboard',
      'pendapatan_hari_ini' => money_format(Invoice::where('status_pembayaran', 'success')->where('created_at', '>=', Carbon::today())->sum('grand_total')),
      'pendapatan_minggu_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total')),
      'pendapatan_bulan_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('grand_total')),
      'pendapatan_tahun_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('grand_total')),
      'pendapatan_perbulan' => $data_perbulan,
      'pending' => Invoice::where('status_pembayaran', 'pending')->count(),
      'success' => Invoice::where('status_pembayaran', 'success')->count(),
      'expired' => Invoice::where('status_pembayaran', 'expired')->count(),
      'failed' => Invoice::where('status_pembayaran', 'failed')->count(),
      'menus' => Menu::with('reviews.customer')->get(),
      'invoices' => Invoice::with('orders.menu','orders.table','customer')->where('status_pesanan', 'dikonfirmasi')->get(),
      'year' => Carbon::today()->format('Y'),
      'month' => Carbon::today()->format('F'),
      'dikonfirmasi' => Invoice::where('status_pesanan', 'dikonfirmasi')->count(),
      'ditolak' => Invoice::where('status_pesanan', 'ditolak')->count(),
      'diantar' => Invoice::where('status_pesanan', 'diantar')->count(),
      'diterima' => Invoice::where('status_pesanan', 'diterima')->count(),
    ];
    $this->view('dashboard', $data, 'admin');
  }

  public function show_laporan_menu()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $search = $_POST['search-laporan-menu'];

    if($search){
      $data_perbulan = [];
      for($i = 1; $i < 13; $i++){
        array_push($data_perbulan, Invoice::where('status_pembayaran', 'success')->whereYear('created_at', Carbon::today()->format('Y'))->whereMonth('created_at', $i)->sum('grand_total'));
      }

      $data = [
        'title' => 'Dashboard',
        'pendapatan_hari_ini' => money_format(Invoice::where('status_pembayaran', 'success')->where('created_at', '>=', Carbon::today())->sum('grand_total')),
        'pendapatan_minggu_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total')),
        'pendapatan_bulan_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('grand_total')),
        'pendapatan_tahun_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('grand_total')),
        'pendapatan_perbulan' => $data_perbulan,
        'pending' => Invoice::where('status_pembayaran', 'pending')->count(),
        'success' => Invoice::where('status_pembayaran', 'success')->count(),
        'expired' => Invoice::where('status_pembayaran', 'expired')->count(),
        'failed' => Invoice::where('status_pembayaran', 'failed')->count(),
        'menus' => Menu::with('reviews.customer')->where('title', 'like', '%'.$search.'%')->get(),
        'invoices' => Invoice::with('orders.menu','orders.table','customer')->where('status_pesanan', 'dikonfirmasi')->get(),
        'year' => Carbon::today()->format('Y'),
        'month' => Carbon::today()->format('F'),
        'dikonfirmasi' => Invoice::where('status_pesanan', 'dikonfirmasi')->count(),
        'ditolak' => Invoice::where('status_pesanan', 'ditolak')->count(),
        'diantar' => Invoice::where('status_pesanan', 'diantar')->count(),
        'diterima' => Invoice::where('status_pesanan', 'diterima')->count(),
      ];
      $this->view('dashboard', $data, 'admin');
    }else{
      header('Location: ' . BASEURL . '/admin/dashboard');
    }
  }

  public function show_daftar_pesanan()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }
    
    $search = $_POST['search-daftar-pesanan'];

    if($search){
      $data_perbulan = [];
      for($i = 1; $i < 13; $i++){
        array_push($data_perbulan, Invoice::where('status_pembayaran', 'success')->whereYear('created_at', Carbon::today()->format('Y'))->whereMonth('created_at', $i)->sum('grand_total'));
      }

      $customers_id = [];
      foreach(Customer::where('name', 'like', '%'.$search."%")->get() as $customer){
        array_push($customers_id, $customer->id); 
      }

      $data = [
        'title' => 'Dashboard',
        'pendapatan_hari_ini' => money_format(Invoice::where('status_pembayaran', 'success')->where('created_at', '>=', Carbon::today())->sum('grand_total')),
        'pendapatan_minggu_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total')),
        'pendapatan_bulan_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('grand_total')),
        'pendapatan_tahun_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('grand_total')),
        'pendapatan_perbulan' => $data_perbulan,
        'pending' => Invoice::where('status_pembayaran', 'pending')->count(),
        'success' => Invoice::where('status_pembayaran', 'success')->count(),
        'expired' => Invoice::where('status_pembayaran', 'expired')->count(),
        'failed' => Invoice::where('status_pembayaran', 'failed')->count(),
        'menus' => Menu::with('reviews.customer')->get(),
        'invoices' => Invoice::with('orders.menu','orders.table','customer')->where('status_pesanan', 'dikonfirmasi')->whereIn('customer_id', $customers_id)->get(),
        'year' => Carbon::today()->format('Y'),
        'month' => Carbon::today()->format('F'),
        'dikonfirmasi' => Invoice::where('status_pesanan', 'dikonfirmasi')->count(),
        'ditolak' => Invoice::where('status_pesanan', 'ditolak')->count(),
        'diantar' => Invoice::where('status_pesanan', 'diantar')->count(),
        'diterima' => Invoice::where('status_pesanan', 'diterima')->count(),
      ];
      $this->view('dashboard', $data, 'admin');
    }else{
      header('Location: ' . BASEURL . '/admin/dashboard');
    }
  }

  public function antar_pesanan($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $invoice = Invoice::where('id', $id)->update([
      'status_pesanan' => 'diantar'
    ]);

    if($invoice){
      $_SESSION['alert'] = [
        'message' => "status pesanan berhasil diubah menjadi Diantar",
        'type' => 'success',
      ];
      header('Location: ' . BASEURL . '/admin/dashboard');
    }
  }

  public function tolak_pesanan($id){
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }

    $invoice = Invoice::where('id', $id)->update([
      'status_pesanan' => 'ditolak'
    ]);

    if($invoice){
      $_SESSION['alert'] = [
        'message' => "status pesanan berhasil diubah menjadi Ditolak",
        'type' => 'success',
      ];
      header('Location: ' . BASEURL . '/admin/dashboard');
    }
  }
}

?>