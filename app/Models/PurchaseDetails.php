<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $fillable=[
        'purchase_id',
        'product_id',
        'quantily',
        'price',
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function product(){
        return $this->belongsTo((Product::class));
    }
}
