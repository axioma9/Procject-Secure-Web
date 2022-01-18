<?php

namespace App\Models\rangkitpc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
    ];

    public $timestamps = false;

    protected $table = 'purchase_items';

    public function products() {
        return $this->belongsTo(Product::class);
    }
    public function purchases() {
        return $this->belongsTo(Purchase::class);
    }
}
