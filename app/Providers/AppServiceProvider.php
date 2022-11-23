<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Cover;
use App\Models\Employment;

use App\Models\News;
use App\Models\Partner;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cover = Cover::first();
        $seo = Seo::first();
        $counter = Counter::first();
        $setting = Setting::first();
        $about = About::first();
        $partners = Partner::where(['active'=>1])->get();

        $blogs = Blog::where(['active'=>1])->paginate(10);
        $news = News::where(['active'=>1])->paginate(12);
        $employments = Employment::where(['active'=>1])->latest()->paginate(12);
        $services = Service::where(['active'=>1])->get();


        view()->share('cover', $cover);
        view()->share('seo', $seo);
        view()->share('counter', $counter);
        view()->share('setting', $setting);
        view()->share('about', $about);
        view()->share('partners', $partners);
        view()->share('blogs', $blogs);
        view()->share('services', $services);

        view()->share('news', $news);
        view()->share('employments', $employments);

        $mailsetting = Setting::first();
        if ($mailsetting) {
            $data = [
                'driver'            => $mailsetting->mail_transport,
                'host'              => $mailsetting->mail_host,
                'port'              => $mailsetting->mail_port,
                'encryption'        => $mailsetting->mail_encryption,
                'username'          => $mailsetting->mail_username,
                'password'          => $mailsetting->mail_password,
                'from'              => [
                    'address' => $mailsetting->mail_from,
                    'name'   => 'Zirikyashi'
                ]
            ];
            Config::set('mail', $data);
        }

        Paginator::useBootstrap();
    }
}