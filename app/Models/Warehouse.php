<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = ['id_user_owner','name','deskripsi','alamat','luas_total','harga_m2','tipe'];

    public function detail_warehouse(){
        return $this->hasMany(DetailWarehouse::class);
    }

    public function user_owner(){
        return $this->belongsTo(UserOwner::class);
    }

}
