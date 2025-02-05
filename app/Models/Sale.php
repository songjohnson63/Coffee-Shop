<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    // public function products(): BelongsToMany
    // {
    //     return $this->belongsToMany(Product::class);
    // }
    public function products()
{
    return $this->belongsToMany(Product::class)->withPivot('qty');
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
