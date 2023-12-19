<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    // public function products(){
    //     return $this->hasMany(OrderedProduct::class);
    // } chat gpt zegt belongsToMany

    
    public function OrderedProduct()
    {
        return $this->hasMany(OrderedProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
