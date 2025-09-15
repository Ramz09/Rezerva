<?php 

require '../vendor/autoload.php';
use App\models\Invoice;
use Illuminate\Support\Carbon;

class Laporan_Pendapatan_Controller extends Controller{
  public function index()
  {
    session_start();
    if(!isset($_SESSION['login'])){
      header('location:'. BASEURL. '/admin/login');
    }
    
    $_SESSION;
    $data_perbulan = [];
    for($i = 1; $i < 13; $i++){
      array_push($data_perbulan, Invoice::where('status_pembayaran', 'success')->whereYear('created_at', Carbon::today()->format('Y'))->whereMonth('created_at', $i)->sum('grand_total'));
    }

    $data = [
      'title' => 'Laporan Pendapatan',
      'pendapatan_hari_ini' => money_format(Invoice::where('status_pembayaran', 'success')->where('created_at', '>=', Carbon::today())->sum('grand_total')),
      'pendapatan_minggu_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total')),
      'pendapatan_bulan_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('grand_total')),
      'pendapatan_tahun_ini' => money_format(Invoice::where('status_pembayaran', 'success')->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('grand_total')),
      'pendapatan_perbulan' => $data_perbulan,
      'pending' => Invoice::where('status_pembayaran', 'pending')->count(),
      'success' => Invoice::where('status_pembayaran', 'success')->count(),
      'expired' => Invoice::where('status_pembayaran', 'expired')->count(),
      'failed' => Invoice::where('status_pembayaran', 'failed')->count(),
      'year' => Carbon::today()->format('Y'),
    ];
    $this->view('laporan-pendapatan', $data, 'admin');
  }
}