<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'category_name','category_id'
    ];

    public function properties(){
        return $this->hasMany(Property::class,'category_id','id');
    }

 
}
