<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $guarded = ['id'];

  public function invoices()
  {
    return $this->hasMany(Invoice::class);
  }

  public function ratings()
  {
    return $this->hasMany(Rating::class);
  }
}
