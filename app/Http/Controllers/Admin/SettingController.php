<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:settings-read')->only(['index']);
        $this->middleware('permission:settings-update')->only(['update']);
    }

    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {

        $setting = Setting::findOrFail($id);
        $setting->update([
            'name_ar'          => $request->input('name_ar'),
            'name_en'          => $request->input('name_en'),
            'phone'          => $request->input('phone'),
            'whatsapp'          => $request->input('whatsapp'),
            'email'          => $request->input('email'),
            'facebook'          => $request->input('facebook'),
            'twitter'          => $request->input('twitter'),
            'instagram'          => $request->input('instagram'),
            'linkedin'          => $request->input('linkedin'),
            'address_ar'       => $request->input('address_ar'),
            'address_en'       => $request->input('address_en'),
            //
            'description_ar'       => $request->input('description_ar'),
            'description_en'       => $request->input('description_en'),
            'title_ar'       => $request->input('title_ar'),
            'title_en'       => $request->input('title_en'),
            //
            'mail_transport'          => $request->input('mail_transport'),
            'mail_host'          => $request->input('mail_host'),
            'mail_port'          => $request->input('mail_port'),
            'mail_username'          => $request->input('mail_username'),
            'mail_password'       => $request->input('mail_password'),
            'mail_encryption'       => $request->input('mail_encryption'),
            'mail_from'       => $request->input('mail_from'),
            //
            'contact_mail'       => $request->input('contact_mail'),
            'job_mail'       => $request->input('job_mail'),
            'sub_mail'       => $request->input('sub_mail'),
            //
            'brandtitle_ar'          => $request->input('brandtitle_ar'),
            'brandtitle_en'          => $request->input('brandtitle_en'),
            'welcometext_ar'          => $request->input('welcometext_ar'),
            'welcometext_en'       => $request->input('welcometext_en'),
            'msgtext_ar'       => $request->input('msgtext_ar'),
            'msgtext_en'       => $request->input('msgtext_en'),
            //
            'footer_ar'       => $request->input('footer_ar'),
            'footer_en'       => $request->input('footer_en'),
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $setting['image'] = $filename;
        }

        $setting->save();
        return response()->json(['status' => 'success', 'data' => $setting]);
    }
}