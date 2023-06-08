<?php

namespace App\Http\Controllers\Office\FRK\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\TestedComponent;
use App\Models\FRK\TesterPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FinalProjectTesterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $final_project_tester = FinalProjectTester::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            // dd($final_project_tester);
            return view('pages.app.frk.pendidikan.penguji.list', ['collection' => $final_project_tester]);
        }
    }

    public function create()
    {
        $komponen = TestedComponent::where('is_active', 1)->get();
        $position = TesterPosition::where('is_active', 1)->get();
        return view('pages.app.frk.pendidikan.penguji.input', ['data' => new FinalProjectTester(), 'komponen' => $komponen, 'position' => $position]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_name' => 'required',
            'tested_component_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $year = session('tahunAjaran');
        $semester = session('semester');
        $final_project_tester = new FinalProjectTester;
        $final_project_tester->user_id = Auth::user()->id;
        $final_project_tester->activity_name = $request->activity_name;
        $final_project_tester->tested_component_id = $request->tested_component_id;
        $final_project_tester->tester_position_id = $request->tester_position_id;
        $final_project_tester->group_title = $request->group_title;
        $final_project_tester->sks = $request->sks;
        $final_project_tester->status = $request->sks >= 3 ? 'M' : 'TM';
        $final_project_tester->year = $year;
        $final_project_tester->semester = $semester;
        $final_project_tester->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(FinalProjectTester $final_project_tester)
    {
        $komponen = TestedComponent::where('is_active', 1)->get();
        $position = TesterPosition::where('is_active', 1)->get();
        return view('pages.app.frk.pendidikan.penguji.input', ['data' => $final_project_tester, 'komponen' => $komponen, 'position' => $position]);
    }

    public function update(Request $request, FinalProjectTester $final_project_tester)
    {
        $validator = Validator::make($request->all(), [
            'activity_name' => 'required',
            'tested_component_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $final_project_tester->user_id = Auth::user()->id;
        $final_project_tester->activity_name = $request->activity_name;
        $final_project_tester->tested_component_id = $request->tested_component_id;
        $final_project_tester->tester_position_id = $request->tester_position_id;
        $final_project_tester->group_title = $request->group_title;
        $final_project_tester->sks = $request->sks;
        $final_project_tester->status = $request->sks >= 3 ? 'M' : 'TM';
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $final_project_tester->proof = $file;
        }
        $final_project_tester->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }

    public function destroy($id)
    {
        //
    }
}
