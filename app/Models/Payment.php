<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['txid', 'user_customer_id', 'evidence_of_transfer', 'detail_warehouse_id', 'paid_date', 'pay','status'];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
