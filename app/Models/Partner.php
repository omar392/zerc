<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar','name_en','image','url','active'];

    public function getNameAttribute(){
        if(app()->getLocale() == 'ar'){
            return $this->name_ar;
        }
        return $this->name_en;
    }

    // public function getDescripotionAttribute(){
    //     if(app()->getLocale() == 'ar'){
    //         return $this->description_ar;
    //     }
    //     return $this->description_en;
    // }
}
