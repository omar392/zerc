<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLocation;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:locations-read')->only(['index']);
        $this->middleware('permission:locations-create')->only(['create', 'store']);
        $this->middleware('permission:locations-update')->only(['edit', 'update']);
        $this->middleware('permission:locations-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Location::get();
            return Datatables::of($data)
                ->addIndexColumn()
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
                    if (Auth::guard('admin')->user()->hasPermission('locations-update')){
                    $Btn = '<a href="' .route("locations.edit", $row->id). '"><button type="button"
                    class="edit btn btn-success fa fa-edit" data-size="sm" title="Edit"></button></a> &nbsp';
                    }
                    if (Auth::guard('admin')->user()->hasPermission('locations-delete')){
                    $Btn = $Btn.'<form class="delete"  action="' . route("locations.destroy", $row->id) . '"  method="POST" id="sa-params"
                    style="display: inline-block; right: 50px;" >
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <button type="submit" class="delete btn btn-danger fa fa-trash" title=" ' . 'Delete' . ' "></button>
                        </form>';
                    }
                    return $Btn;
                })
                ->rawColumns(['action','active'])
                ->make(true);
        }
        return view('admin.locations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function locationsStatus(Request $request)
    {
        $location = Location::find($request->location_id);
        $location->active = $request->active;
        $location->save();
        return response()->json(['status' => 'success', 'data' => $location]);
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
        '0' => 'required|string',
        '1'=>'required|string',
        '2'=>'required|string',
        '3'=>'required|string',
    ];

        $validator = Validator::make($request->all()  ,$rules );

        if ($validator->fails())
        {
            return response()->json(['status'=>'fails','errors'=>$validator->errors()->all()]);
        }
        $location = Location::create([
            '0'   => $request->input('0'),
            '1'   => $request->input('1'),
            '2'   => $request->input('2'),
            '3'   => $request->input('3'),
        ]);

        $location->save();
        return response()->json(['status'=>'success','data'=>$location]);
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
        $location = Location::findOrFail($id);
        return view('admin.locations.edit',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocation $request, $id)
    {
        $location = Location::findOrFail($id);
        $location->update([
            '0'   => $request->input('0'),
            '1'   => $request->input('1'),
            '2'   => $request->input('2'),
            '3'   => $request->input('3'),
        ]);

        $location->save();
        return response()->json(['status'=>'success','data'=>$location]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return response()->json(['status'=>'success']);
    }
}
