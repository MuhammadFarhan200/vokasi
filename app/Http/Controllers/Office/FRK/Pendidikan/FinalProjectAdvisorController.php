<?php

namespace App\Http\Controllers\Office\FRK\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\TestedComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FinalProjectAdvisorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $final_project_advisor = FinalProjectAdvisor::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            // dd($final_project_advisor);
            return view('pages.app.frk.pendidikan.pembimbing.list', ['collection' => $final_project_advisor]);
        }
    }

    public function create()
    {
        $komponen = TestedComponent::where('is_active', 1)->get();
        return view('pages.app.frk.pendidikan.pembimbing.input', ['data' => new FinalProjectAdvisor(), 'komponen' => $komponen]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_title' => 'required',
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
        $final_project_advisor = new FinalProjectAdvisor;
        $final_project_advisor->user_id = Auth::user()->id;
        $final_project_advisor->group_title = $request->group_title;
        $final_project_advisor->meeting_expectations = $request->meeting_expectations;
        $final_project_advisor->group_total = $request->group_total;
        $final_project_advisor->tested_component_id = $request->tested_component_id;
        $final_project_advisor->sks = $request->sks;
        $final_project_advisor->status = $request->sks >= 3 ? 'M' : 'TM';
        $final_project_advisor->year = $year;
        $final_project_advisor->semester = $semester;
        $final_project_advisor->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(FinalProjectAdvisor $final_project_advisor)
    {
        $komponen = TestedComponent::where('is_active', 1)->get();
        return view('pages.app.frk.pendidikan.pembimbing.input', ['data' => $final_project_advisor, 'komponen' => $komponen]);
    }

    public function update(Request $request, FinalProjectAdvisor $final_project_advisor)
    {
        $validator = Validator::make($request->all(), [
            'group_title' => 'required',
            'tested_component_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $final_project_advisor->user_id = Auth::user()->id;
        $final_project_advisor->group_title = $request->group_title;
        $final_project_advisor->meeting_expectations = $request->meeting_expectations;
        $final_project_advisor->group_total = $request->group_total;
        $final_project_advisor->tested_component_id = $request->tested_component_id;
        $final_project_advisor->sks = $request->sks;
        $final_project_advisor->status = $request->sks >= 3 ? 'M' : 'TM';
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $final_project_advisor->proof = $file;
        }
        $final_project_advisor->update();

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
