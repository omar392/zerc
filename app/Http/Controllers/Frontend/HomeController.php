<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Mail\ContactMail;
use App\Mail\Email;
use App\Mail\OfferMail;
use App\Models\Employment;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\News;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where(['active' => 1])->get();
        $jobs = Employment::where(['active' => 1])->take(3)->get();
        return view('frontend.home', compact('banners', 'jobs'));
    }

    public function aboutUs()
    {
        return view('frontend.about.index');
    }
    public function jobs()
    {
        return view('frontend.jobs.index');
    }
    public function jobDetails($url)
    {
        $job = Employment::where('url', $url)->first();
        return view('frontend.jobs.details', compact('job'));
    }
    public function contactUs()
    {

        // $locations = [

        //     ['جدة', 21.4491899,38.6506632],
        //     ['شارع الريل مجمع الشايع <br> صناع الحلول الدولية', 24.6438753,46.7273219],
        // ];
        $locations = Location::get([0, 1, 2, 3])->toArray();
        // post::pluck('title', 'id')->toArray();
        // dd($locations);
        return view('frontend.contact.index', compact('locations'));
    }

    public function faqs()
    {

        $faqs = Faq::where(['active' => 1])->paginate(20);
        return view('frontend.faqs.index', compact('faqs'));
    }
    public function blog()
    {

        return view('frontend.blogs.index');
    }
    public function blogDetails($url)
    {
        $blog = Blog::where('url', $url)->first();
        return view('frontend.blogs.details', compact('blog'));
    }

    public function services()
    {

        return view('frontend.services.index');
    }
    public function news()
    {

        return view('frontend.news.index');
    }
    public function gallery()
    {
        $gallery = Gallery::where(['active' => 1])->paginate(12);
        return view('frontend.gallery.index', compact('gallery'));
    }

    public function servicesDetails($url)
    {
        $service = Service::where('url', $url)->first();
        return view('frontend.services.details', compact('service'));
    }
    public function newsDetails($url)
    {
        $new = News::where('url', $url)->first();
        return view('frontend.news.details', compact('new'));
    }

    public function store(Request $request)
    {
        $email_sub = Setting::first();
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'email'         => 'required|email',
            'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'       => 'required',
            'message'       => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if ($validator->passes()) {

            $data = $request->all();
            Mail::to($email_sub->contact_mail)->send(new ContactMail($data));
            return response()->json(['success' => __('site.success'), 'status' => true]);
        }
        return response()->json(['error' => $validator->errors()]);
    }

    public function employmentOrders()
    {
        return view('frontend.employment.order');
    }

    public function offer(Request $request)
    {
        $email_sub = Setting::first();
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'alt_name'          => 'required',
            'date'         => 'required',
            'age'        => 'required|numeric',
            'passport_id'       => 'required',
            'national_id'       => 'required',
            'place_of_residence'       => 'required',
            'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'alt_phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'g-recaptcha-response' => 'required|captcha'
        ]);
        if ($validator->passes()) {

            $data = $request->all(); // it store data to the DB
            Mail::to($email_sub->job_mail)->send(new OfferMail($data));
            return response()->json(['success' => __('site.success'), 'status' => true]);
        }
        return response()->json(['error' => $validator->errors()]);
    }
    public function email(Request $request)
    {
        $email_sub = Setting::first();

        $validator = Validator::make($request->all(), [
            'email'         => 'required|email',
        ]);
        if ($validator->passes()) {

            $data = $request->all(); // it store data to the DB
            Mail::to($email_sub->sub_mail)->send(new Email($data));
            return response()->json(['success' => __('site.success'), 'status' => true]);
        }
        return response()->json(['error' => $validator->errors()]);
    }
}