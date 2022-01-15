<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $table = "company";
    public $timestamps = false;
    /*Accessor Functions*/
    function getNameAttribute($value){
        return ucfirst($value);
    }
    function getAddressAttribute($value){
        return $value.", USA";
    }
    /*Accessor Functions*/

    /*Mutator Functions*/
    function setNameAttribute($value){
        return $this->attributes["name"] = $value." Ltd.";
    }
    function setAddressAttribute($value){
        return $this->attributes["address"] = $value.", India";
    }
    /*Mutator Functions*/
}
