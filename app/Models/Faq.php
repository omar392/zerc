<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['ask_ar','ask_en','answer_ar','answer_en','active'];


    public function getAskAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->ask_ar;
        }
        return $this->ask_en;
    }
    public function getAnswerAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->answer_ar;
        }
        return $this->answer_en;
    }
}
