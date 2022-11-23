<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faqs-read')->only(['index']);
        $this->middleware('permission:faqs-create')->only(['create', 'store']);
        $this->middleware('permission:faqs-update')->only(['edit', 'update']);
        $this->middleware('permission:faqs-delete')->only(['destroy']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::get();
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
                    if (Auth::guard('admin')->user()->hasPermission('faqs-update')){
                    $Btn = '<a href="' .route("faqs.edit", $row->id). '"><button type="button"
                    class="edit btn btn-success fa fa-edit" data-size="sm" title="Edit"></button></a> &nbsp';
                    }
                    if (Auth::guard('admin')->user()->hasPermission('faqs-delete')){
                    $Btn = $Btn.'<form class="delete"  action="' . route("faqs.destroy", $row->id) . '"  method="POST" id="sa-params"
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
        return view('admin.faqs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faqsStatus(Request $request)
    {
        $faq = Faq::find($request->faq_id);
        $faq->active = $request->active;
        $faq->save();
        return response()->json(['status' => 'success', 'data' => $faq]);
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
        'ask_ar' => 'required|string' ,
        'ask_en'=>'required|string',
        'answer_ar' => 'required|string' ,
        'answer_en'=>'required|string',
    ];

        $validator = Validator::make($request->all()  ,$rules );

        if ($validator->fails())
        {
            return response()->json(['status'=>'fails','errors'=>$validator->errors()->all()]);
        }
        $faq = Faq::create([
            'ask_ar'   => $request->input('ask_ar'),
            'ask_en'   => $request->input('ask_en'),
            'answer_ar'   => $request->input('answer_ar'),
            'answer_en'   => $request->input('answer_en'),
        ]);

        $faq->save();
        return response()->json(['status'=>'success','data'=>$faq]);
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
        $faq = Faq::findOrFail($id);
        return view('admin.faqs.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->update([
            'ask_ar'   => $request->input('ask_ar'),
            'ask_en'   => $request->input('ask_en'),
            'answer_ar'   => $request->input('answer_ar'),
            'answer_en'   => $request->input('answer_en'),
        ]);

        $faq->save();
        return response()->json(['status'=>'success','data'=>$faq]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return response()->json(['status'=>'success']);
    }
}
