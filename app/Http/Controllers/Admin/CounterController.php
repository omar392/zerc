<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCounter;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:counters-read')->only(['index']);
        $this->middleware('permission:counters-update')->only(['update']);
    }

    public function index()
    {
        $counter = Counter::first();
        return view('admin.counters.edit', compact('counter'));
    }
    public function update(UpdateCounter $request, $id)
    {

        $counter = Counter::findOrFail($id);
        $counter->update([
            'input0'          => $request->input('input0'),
            'input2'          => $request->input('input2'),
            'input3'          => $request->input('input3'),
        ]);


        $counter->save();
        return response()->json(['status' => 'success', 'data' => $counter]);
    }


}
