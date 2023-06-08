<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use App\Models\Civitas\User AS Dosen;
use App\Models\Profil\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    public function index(Request $request, Dosen $dosen)
    {
        if($request->ajax()){
            $collection = Publication::where('user_id', $dosen->id)->paginate(10);
            return view('pages.app.civitas.dosen.profile.publication.list', compact('collection', 'dosen'));
        }
        return view('pages.app.civitas.dosen.profile.publication.main', compact('dosen'));
    }

    public function create(Dosen $dosen)
    {
        return view('pages.app.civitas.dosen.profile.publication.input', ['data' => new Publication, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $publication = new Publication;
        $publication->user_id = $request->user_id;
        $publication->title = $request->title;
        $publication->year = $request->year;
        $publication->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(Dosen $dosen, Publication $publication)
    {
        return view('pages.app.civitas.dosen.profile.publication.input', ['data' => $publication, 'dosen' => $dosen]);
    }

    public function update(Request $request, Publication $publication)
    {
        if ($request->is_active !== null) {
            $publication->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $publication->update();
            return response()->json([
                'alert' => 'success',
                'message' => $message,
            ]);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $publication->user_id = $request->user_id;
        $publication->title = $request->title;
        $publication->year = $request->year;
        $publication->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(Publication $publication)
    {
        $publication->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
