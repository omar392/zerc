<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $fillable = ['url','key_ar','key_en','title_ar','title_en','description_ar','description_en'];

    public function getKeyAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->key_ar;
        }
        return $this->key_en;
    }
    public function getTitleAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->title_ar;
        }
        return $this->title_en;
    }
    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->description_ar;
        }
        return $this->description_en;
    }
}
