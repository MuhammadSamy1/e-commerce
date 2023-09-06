<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_address extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function countries(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function states(){
        return $this->belongsTo(State::class,'state_id');
    }
    public function cities(){
        return $this->belongsTo(City::class,'city_id');
    }
}
