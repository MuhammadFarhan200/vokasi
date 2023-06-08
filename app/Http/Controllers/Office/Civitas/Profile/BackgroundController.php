<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use App\Models\Civitas\User AS Dosen;
use Illuminate\Http\Request;
use App\Models\Profil\Background;

class BackgroundController extends Controller
{
    public function index(Dosen $dosen)
    {
        return view('pages.app.civitas.dosen.profile.background.input', ['dosen' => $dosen, 'data' => new Background]);
    }

    public function store(Request $request, Dosen $dosen)
    {
        $background = new Background();
        $background->user_id = $dosen->id;
        $background->keyword = $request->keyword;
        $background->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function edit(Dosen $dosen)
    {
        $data = Background::where('user_id', $dosen->id)->first();
        return view('pages.app.civitas.dosen.profile.background.input', ['dosen' => $dosen, 'data' => $data]);
    }

    public function update(Request $request, Dosen $dosen, Background $background)
    {
        $background = Background::where('user_id', $dosen->id)->first();
        $background->keyword = $request->keyword;
        $background->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }
}
