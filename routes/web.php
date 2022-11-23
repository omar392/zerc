<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes([
    'register'=>false,
    // 'login'=>false,
    ]);

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
        ], function(){

    Route::get('/',[HomeController::class,'index'])->name('front.home');

    Route::get('about-us',[HomeController::class,'aboutUs'])->name('front.about');

    Route::get('contact-us',[HomeController::class,'contactUs'])->name('front.contact');
    Route::post('submit-form', [HomeController::class, 'store'])->name('contact.save');

    Route::get('jobs', [HomeController::class, 'jobs'])->name('front.jobs');
    Route::get('jobs/{url}', [HomeController::class, 'jobDetails'])->name('front.job.details');

    Route::get('employment-orders', [HomeController::class, 'employmentOrders'])->name('front.employmment');
    Route::post('order-form',[HomeController::class,'offer'])->name('email.order');

    //
    Route::post('email-form',[HomeController::class,'email'])->name('email.email');


    Route::get('faqs',[HomeController::class,'faqs'])->name('front.faqs');

    Route::get('gallery',[HomeController::class,'gallery'])->name('front.gallery');

    Route::get('get-quote',[HomeController::class,'getQuote'])->name('front.quote');

    Route::get('blog',[HomeController::class,'blog'])->name('front.blog');
    Route::get('blog/{url}',[HomeController::class,'blogDetails'])->name('front.blog.details');

    Route::get('services',[HomeController::class,'services'])->name('front.services');
    Route::get('services/{url}',[HomeController::class,'servicesDetails'])->name('front.services.details');

    Route::get('news',[HomeController::class,'news'])->name('front.news');
    Route::get('news/{url}',[HomeController::class,'newsDetails'])->name('front.news.details');

});


Route::get('sitemap-generate', function () {
    File::delete(public_path("sitemap/sitemap.xml"));
    \Artisan::call('generate:sitemap');
    return "site map generated successfully !! ";
});