<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false){
            $query
                ->where('name','like','%' . request('search') . '%')
                ->orwhere('description','like','%' . request('search') . '%');

        }

    }

    public function categories(){
       return $this->belongsTo(Category::class,'category_id');
    }
}
