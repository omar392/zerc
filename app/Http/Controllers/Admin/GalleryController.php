<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBanner;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:galleries-read')->only(['index']);
        $this->middleware('permission:galleries-create')->only(['create', 'store']);
        $this->middleware('permission:galleries-update')->only(['edit', 'update']);
        $this->middleware('permission:galleries-delete')->only(['destroy']);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($query) {
                    return '
                    <div align="center">
                    <img src="/dashboard/galleries/' . $query->image . '" border="0" style=" width: 150px; height: 90px;border-radius: 35px;" class="image-show" />
                    </div>
                    ';
                })
                ->editColumn('active', function ($query) {
                    if ($query->active) {
                        $btn = '
                        <div class="container">
                        <label class="switch">
                          <input type="checkbox" data-id="' . $query->id . '" type="checkbox" id="check"  checked>
                          <div class="slider round"></div>
                        </label>
                      </div>
                      ';

                    } else {
                        $btn = '
                        <div class="container">
                        <label class="switch">
                          <input type="checkbox" data-id="' . $query->id . '" type="checkbox" id="check">
                          <div class="slider round"></div>
                        </label>
                      </div>
                      ';
                    }
                 return $btn;
                })

                ->addColumn('action', function($row){
                    if (Auth::guard('admin')->user()->hasPermission('galleries-update')){
                    $Btn = '<a href="' .route("gallery.edit", $row->id). '"><button type="button"
                    class="edit btn btn-success fa fa-edit" data-size="sm" title="Edit"></button></a> &nbsp';
                    }
                    if (Auth::guard('admin')->user()->hasPermission('galleries-delete')){
                    $Btn = $Btn.'<form class="delete"  action="' . route("gallery.destroy", $row->id) . '"  method="POST" id="sa-params"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="delete btn btn-danger fa fa-trash" title=" ' . 'Delete' . ' "></button>
                        </form>';
                    }
                    return $Btn;
                })
                ->rawColumns(['action','active','image'])
                ->make(true);
        }
        return view('admin.gallery.index');
    }

    public function galleryStatus(Request $request)
    {
        $gallery = Gallery::find($request->gallery_id);
        $gallery->active = $request->active;
        $gallery->save();
        return response()->json(['status' => 'success', 'data' => $gallery]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'dashboard/galleries/';
            $profileImage = date('YmdHis') . "." . $image->hashName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Gallery::create($input);
        return response()->json(['status'=>'success','data'=>$input]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBanner $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update([
                'description_ar'       => $request->input('description_ar'),
                'description_en'       => $request->input('description_en'),
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard/galleries/');
            $file->move($destinationPath, $filename);
            $gallery['image'] = $filename;
        }
        $gallery->save();
        return response()->json(['status'=>'success','data'=>$gallery]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return response()->json(['status'=>'success']);
    }
}
