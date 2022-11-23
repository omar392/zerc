<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBanner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class PartenerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:partners-read')->only(['index']);
        $this->middleware('permission:partners-create')->only(['create', 'store']);
        $this->middleware('permission:partners-update')->only(['edit', 'update']);
        $this->middleware('permission:partners-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Partner::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($query) {
                    return '
                    <div align="center">
                    <img src="/dashboard/partners/' . $query->image . '" border="0" style=" width: 150px; height: 90px;border-radius: 35px;" class="image-show" />
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
                    if (Auth::guard('admin')->user()->hasPermission('partners-update')){
                    $Btn = '<a href="' .route("partners.edit", $row->id). '"><button type="button"
                    class="edit btn btn-success fa fa-edit" data-size="sm" title="Edit"></button></a> &nbsp';
                    }
                    if (Auth::guard('admin')->user()->hasPermission('partners-delete')){
                    $Btn = $Btn.'<form class="delete"  action="' . route("partners.destroy", $row->id) . '"  method="POST" id="sa-params"
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
        return view('admin.partners.index');
    }


    public function partnersStatus(Request $request)
    {
        $partner = Partner::find($request->partner_id);
        $partner->active = $request->active;
        $partner->save();
        return response()->json(['status' => 'success', 'data' => $partner]);
    }

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

        $rules = [
        'name_ar' => 'required|string' ,
        'name_en'=>'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all()  ,$rules );

        if ($validator->fails())
        {
            return response()->json(['status'=>'fails','errors'=>$validator->errors()->all()]);
        }

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'dashboard/partners/';
            $profileImage = date('YmdHis') . "." . $image->hashName();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Partner::create($input);
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
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit',compact('partner'));
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
        $partner = Partner::findOrFail($id);
        $partner->update([
                'name_ar'       => $request->input('name_ar'),
                'name_en'       => $request->input('name_en'),
                'url'       => $request->input('url'),
                // 'description_ar'       => $request->input('description_ar'),
                // 'description_en'       => $request->input('description_en'),
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->hashName();
            $destinationPath = public_path('/dashboard/partners/');
            $file->move($destinationPath, $filename);
            $partner['image'] = $filename;
        }
        $partner->save();
        return response()->json(['status'=>'success','data'=>$partner]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();
        return response()->json(['status'=>'success']);
    }
}
