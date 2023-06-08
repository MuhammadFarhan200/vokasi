<?php

namespace App\Http\Controllers\Office\FRK;

use App\Http\Controllers\Controller;
use App\Models\FRK\TesterPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TesterPositionController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $collection = TesterPosition::latest()->paginate(10);
            return view('pages.app.tester_position.list',compact('collection'));
        }
        return view('pages.app.tester_position.main');
    }

    public function create()
    {
        return view('pages.app.tester_position.input', ['data' => new TesterPosition]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $tester_position = new TesterPosition;
        $tester_position->name = $request->name;
        $tester_position->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = TesterPosition::findOrFail($id);
        return view('pages.app.tester_position.input', ['data' => $data]);
    }

    public function update(Request $request, TesterPosition $tester_position)
    {
        if ($request->is_active !== null) {
            $tester_position->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $tester_position->update();
            return response()->json([
                'alert' => 'success',
                'message' => $message,
            ]);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $tester_position->name = $request->name;
        $tester_position->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(TesterPosition $tester_position)
    {
        $tester_position->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
