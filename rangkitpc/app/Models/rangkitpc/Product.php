<?php

namespace App\Models\rangkitpc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'stock',
        'price',
        'description',
    ];

    public function purchased_item() {
        return $this->hasMany(Purchased_Item::class);
    }

    // protected function serializeDate(DateTimeInterface $date) {
    //     return $date->format('Y-m-d');
    // }
}
