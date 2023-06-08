<?php

namespace App\Http\Controllers\Office\FRK\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\FRK\Subject;
use Illuminate\Http\Request;
use App\Models\FRK\Teaching;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeachingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teaching = Teaching::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            // dd($teaching);
            return view('pages.app.frk.pendidikan.pengajaran.list', ['teaching' => $teaching]);
        }
    }

    public function create()
    {
        $prodi = Auth::user()->position;
        // dd($prodi);
        $subjects = Subject::orderBy('semester', 'asc');
        if ($prodi !== null) {
            $subjects = $subjects->where('prodi', $prodi)->get();
        } else {
            $subjects = $subjects->get();
        }
        return view('pages.app.frk.pendidikan.pengajaran.input', ['data' => new Teaching(), 'subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
            'sks' => 'required',
            'meeting' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $year = session('tahunAjaran');
        $semester = session('semester');
        $teaching = new Teaching;
        $teaching->user_id = Auth::user()->id;
        $teaching->subject_id = $request->subject_id;
        $teaching->sks = $request->sks;
        $teaching->meeting = $request->meeting;
        $teaching->status = $request->sks >= 3 ? 'M' : 'TM';
        $teaching->year = $year;
        $teaching->semester = $semester;
        $teaching->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(Teaching $teaching)
    {
        $prodi = Auth::user()->position;
        // dd($prodi);
        $subjects = Subject::orderBy('semester', 'asc');
        if ($prodi !== null) {  
            $subjects = $subjects->where('prodi', $prodi)->get();
        } else {
            $subjects = $subjects->get();
        }
        return view('pages.app.frk.pendidikan.pengajaran.input', ['data' => $teaching, 'subjects' => $subjects]);
    }

    public function update(Request $request, Teaching $teaching)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
            'sks' => 'required',
            'meeting' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $teaching->user_id = Auth::user()->id;
        $teaching->subject_id = $request->subject_id;
        $teaching->sks = $request->sks;
        $teaching->meeting = $request->meeting;
        $teaching->status = $request->sks >= 3 ? 'M' : 'TM';
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $teaching->proof = $file;
        }
        $teaching->update();

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
