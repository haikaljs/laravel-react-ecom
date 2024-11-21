<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['name', 'discount', 'valid_untill'];

    // Convert coupon name to uppercase
    public function setNameAttribute($value){
        $this->attributes['name'] = Str::upper($value);
    }

    // Check if coupon is valid
    public function checkIsValid(){
        if($this->valid_untill > Carbon::now()){
            return true;
        }else{
            return false;
        }
    }
}