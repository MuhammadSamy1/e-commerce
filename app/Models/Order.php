<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory ,Notifiable;
    protected $guarded = [];

    public function categories(){
        $this->belongsTo(Category::class,'category_id');
    }
    public function products(){
        $this->belongsTo(Product::class,'product_id');
    }
    public function users(){
        $this->belongsTo(User::class,'user_id');
    }
    public function customers(){
        $this->belongsTo('Customer','customer_id');
    }
}
