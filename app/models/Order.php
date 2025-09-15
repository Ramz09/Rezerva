<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];


    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    // public function invoice()
    // {
    //     return $this->belongsTo(Invoice::class);
    // }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
