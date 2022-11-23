<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title_ar','title_en','description_ar','url','description_en','active','image'];

    public function getTitleAttribute(){
        if(app()->getLocale() == 'ar'){
            return $this->title_ar;
        }
        return $this->title_en;
    }

    public function getDescriptionAttribute(){
        if(app()->getLocale() == 'ar'){
            return $this->description_ar;
        }
        return $this->description_en;
    }
}
