<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Category;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;

class Order extends Model
{
    use HasFactory ,Notifiable;
    protected $guarded = [];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
