<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use App\Models\Civitas\User AS Dosen;
use App\Models\Profil\Studies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudiesController extends Controller
{
    public function index(Request $request, Dosen $dosen)
    {
        if($request->ajax()){
            $collection = Studies::where('user_id', $dosen->id)->paginate(10);
            return view('pages.app.civitas.dosen.profile.studies.list', compact('collection', 'dosen'));
        }
        return view('pages.app.civitas.dosen.profile.studies.main', compact('dosen'));
    }

    public function create(Dosen $dosen)
    {
        return view('pages.app.civitas.dosen.profile.studies.input', ['data' => new Studies, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $studies = new studies;
        $studies->user_id = $request->user_id;
        $studies->code = $request->code;
        $studies->name = $request->name;
        $studies->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(Dosen $dosen, Studies $studies)
    {
        return view('pages.app.civitas.dosen.profile.studies.input', ['data' => $studies, 'dosen' => $dosen]);
    }

    public function update(Request $request, Studies $study)
    {
        // dd($study->id);
        if ($request->is_active !== null) {
            $study->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $study->update();
            return response()->json([
                'alert' => 'success',
                'message' => $message,
            ]);
        }
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $study->user_id = $request->user_id;
        $study->code = $request->code;
        $study->name = $request->name;
        $study->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(Studies $study)
    {
        $study->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
