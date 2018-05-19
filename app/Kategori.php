<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table = 'Kategori';

    public function pengeluaran() {
        return $this->hasMany('App\Pengeluaran');
    }
}
