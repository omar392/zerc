<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CoversController;
use App\Http\Controllers\Admin\EmploymentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InsuranceController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PartenerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
    ], function(){
    Route::get('admin/home',[AdminController::class,'index'])->name('adminhome');
    Route::GET('admin-login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login',[LoginController::class,'login'])->name('login.admin');
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::resource('countries', CountryController::class);
    Route::get('countries_status',[CountryController::class,'countriesStatus'])->name('countries.status');


    //banners
    Route::resource('banners', BannerController::class);
    Route::get('banners_status',[BannerController::class,'bannersStatus'])->name('banners.status');

    //galleries
    Route::resource('gallery', GalleryController::class);
    Route::get('gallery_status',[GalleryController::class,'galleryStatus'])->name('gallery.status');

    //faqs
    Route::resource('faqs', FaqController::class);
    Route::get('faqs_status',[FaqController::class,'faqsStatus'])->name('faqs.status');

    //partners
    Route::resource('partners', PartenerController::class);
    Route::get('partners_status',[PartenerController::class,'partnersStatus'])->name('partners.status');

    //blog
    Route::resource('blog', BlogController::class);
    Route::get('blog_status',[BlogController::class,'blogStatus'])->name('blog.status');


    //services
    Route::resource('services',ServiceController::class);
    Route::get('services_status',[ServiceController::class,'servicesStatus'])->name('services.status');

    //employments
    Route::resource('employments',EmploymentController::class);
    Route::get('employments_status',[EmploymentController::class, 'employmentsStatus'])->name('employments.status');

    //news
    Route::resource('news',NewsController::class);
    Route::get('news_status',[NewsController::class,'newsStatus'])->name('news.status');

    //locations
    Route::resource('locations',LocationController::class);
    Route::get('locations_status',[LocationController::class,'locationsStatus'])->name('locations.status');

    //insurances
    Route::resource('insurances',InsuranceController::class);
    Route::get('insurances_status',[InsuranceController::class,'insurancesStatus'])->name('insurances.status');

    //roles
    Route::resource('roles', RoleController::class);

    //admins
    Route::resource('admins', AdminsController::class);

    //users
    Route::resource('users', UsersController::class);


    Route::resource('settings', SettingController::class)->except(['create', 'store','destroy']);
    Route::resource('covers', CoversController::class)->except(['create', 'store','destroy']);
    Route::resource('seo', SeoController::class)->except(['create', 'store','destroy']);
    Route::resource('abouts', AboutController::class)->except(['create', 'store','destroy']);
    Route::resource('counters', CounterController::class)->except(['create', 'store','destroy']);

    });
});
?>