<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;
    protected $fillable = [

        'image_about',
        'image_service',
        'image_faqs',
        'image_faqs_2',
        'image_blog',
        'image_about_2',
        'image_about_3',
        'image_gallery',
        'image_offer',
        'image_offer_single',
        'image_contact',
    ];
}
