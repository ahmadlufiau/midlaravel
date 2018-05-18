<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function pengeluarans() {
      return $this->hasMany('App\Pengeluaran');
    }

    public function spendings() {
      return $this->hasMany('App\Spending');
    }
}
