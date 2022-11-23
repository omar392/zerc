<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = ['about_ar','about_en','mission_ar','mission_en','vision_ar','vision_en','goals_ar','goals_en'];


    public function getAboutAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->about_ar;
        }
        return $this->about_en;
    }
    public function getMissionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->mission_ar;
        }
        return $this->mission_en;
    }
    public function getVisionAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->vision_ar;
        }
        return $this->vision_en;
    }
    public function getGoalsAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->goals_ar;
        }
        return $this->goals_en;
    }
}
