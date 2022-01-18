<?php

namespace App\Models\rangkitpc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shipping',
        'total',
        'purchase_at',
    ];

    public $timestamps = false;

    public function users() {
        return $this->belongsTo(User::class);
    }
}
