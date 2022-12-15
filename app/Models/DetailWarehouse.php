<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWarehouse extends Model
{
    use HasFactory;

    protected $fillable = ['warehouse_id','panjang_petak','lebar_petak','luas_petak','harga'];

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
