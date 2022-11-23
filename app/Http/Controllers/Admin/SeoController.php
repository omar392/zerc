<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:seos-read')->only(['index']);
        $this->middleware('permission:seos-update')->only(['update']);
    }

    public function index()
    {
        $seo = Seo::first();
        return view('admin.seos.edit', compact('seo'));
    }

    public function update(Request $request, $id)
    {

        $seo = Seo::findOrFail($id);
        $seo->update([
            'url'                => $request->input('url'),
            'title_ar'           => $request->input('title_ar'),
            'title_en'           => $request->input('title_en'),
            'key_ar'             => $request->input('key_ar'),
            'key_en'             => $request->input('key_en'),
            'description_ar'     => $request->input('description_ar'),
            'description_en'     => $request->input('description_en'),
        ]);

        $seo->save();
        return response()->json(['status' => 'success', 'data' => $seo]);
    }
}
