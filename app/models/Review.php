<?php 
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Review extends Model{
  protected $guarded = ['id'];

  public function menu()
  {
    return $this->belongsTo(Menu::class);
  }

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
}