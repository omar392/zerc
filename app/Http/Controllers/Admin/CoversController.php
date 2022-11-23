<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;

class CoversController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:covers-read')->only(['index']);
        $this->middleware('permission:covers-update')->only(['update']);
    }
    public function index()
    {
        $cover = Cover::first();
        return view('admin.covers.edit', compact('cover'));
    }
    public function update(Request $request, $id)
    {

        $cover = Cover::findOrFail($id);

        if ($request->file('image_about')) {
            $file = $request->file('image_about');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_about'] = $filename;
        }
        if ($request->file('image_service')) {
            $file = $request->file('image_service');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_service'] = $filename;
        }
        if ($request->file('image_faqs')) {
            $file = $request->file('image_faqs');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_faqs'] = $filename;
        }
        if ($request->file('image_faqs_2')) {
            $file = $request->file('image_faqs_2');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_faqs_2'] = $filename;
        }
        if ($request->file('image_blog')) {
            $file = $request->file('image_blog');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_blog'] = $filename;
        }
        if ($request->file('image_about_2')) {
            $file = $request->file('image_about_2');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_about_2'] = $filename;
        }
        if ($request->file('image_about_3')) {
            $file = $request->file('image_about_3');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_about_3'] = $filename;
        }
        if ($request->file('image_gallery')) {
            $file = $request->file('image_gallery');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_gallery'] = $filename;
        }
        if ($request->file('image_offer')) {
            $file = $request->file('image_offer');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_offer'] = $filename;
        }
        if ($request->file('image_offer_single')) {
            $file = $request->file('image_offer_single');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_offer_single'] = $filename;
        }
        if ($request->file('image_contact')) {
            $file = $request->file('image_contact');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard');
            $file->move($destinationPath, $filename);
            $cover['image_contact'] = $filename;
        }

        $cover->save();
        return response()->json(['status' => 'success', 'data' => $cover]);
    }
}
