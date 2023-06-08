<?php

namespace App\Http\Controllers\Office\FRK;

use App\Http\Controllers\Controller;
use App\Models\FRK\TestedComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestedComponentController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $collection = TestedComponent::latest()->paginate(10);
            return view('pages.app.tested_component.list',compact('collection'));
        }
        return view('pages.app.tested_component.main');
    }

    public function create()
    {
        return view('pages.app.tested_component.input', ['data' => new TestedComponent]);
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
        $tested_component = new TestedComponent;
        $tested_component->name = $request->name;
        $tested_component->save();
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
        $data = TestedComponent::findOrFail($id);
        return view('pages.app.tested_component.input', ['data' => $data]);
    }

    public function update(Request $request, TestedComponent $tested_component)
    {
        if ($request->is_active !== null) {
            $tested_component->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $tested_component->update();
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
        $tested_component->name = $request->name;
        $tested_component->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(TestedComponent $tested_component)
    {
        $tested_component->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
