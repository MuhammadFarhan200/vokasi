<?php

namespace App\Http\Controllers\Office\FRK\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\FRK\CollegeLeadershipPositions as FRKCollegeLeadershipPositions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CollegeLeadershipPositions extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $college_leadership_position = FRKCollegeLeadershipPositions::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            // dd($college_leadership_position);
            return view('pages.app.frk.pendidikan.clp.list', ['collection' => $college_leadership_position]);
        }
    }

    public function create()
    {
        return view('pages.app.frk.pendidikan.clp.input', ['data' => new FRKCollegeLeadershipPositions()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position_name' => 'required',
            'expectation_time' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $year = session('tahunAjaran');
        $semester = session('semester');
        $college_leadership_position = new FRKCollegeLeadershipPositions;
        $college_leadership_position->user_id = Auth::user()->id;
        $college_leadership_position->position_name = $request->position_name;
        $college_leadership_position->expectation_time = $request->expectation_time;
        $college_leadership_position->sks = $request->sks;
        $college_leadership_position->status = $request->sks >= 3 ? 'M' : 'TM';
        $college_leadership_position->year = $year;
        $college_leadership_position->semester = $semester;
        $college_leadership_position->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(FRKCollegeLeadershipPositions $college_leadership_position)
    {
        return view('pages.app.frk.pendidikan.clp.input', ['data' => $college_leadership_position]);
    }

    public function update(Request $request, FRKCollegeLeadershipPositions $college_leadership_position)
    {
        $validator = Validator::make($request->all(), [
            'position_name' => 'required',
            'expectation_time' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $college_leadership_position->user_id = Auth::user()->id;
        $college_leadership_position->position_name = $request->position_name;
        $college_leadership_position->expectation_time = $request->expectation_time;
        $college_leadership_position->sks = $request->sks;
        $college_leadership_position->status = $request->sks >= 3 ? 'M' : 'TM';
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $college_leadership_position->proof = $file;
        }
        $college_leadership_position->update();

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
