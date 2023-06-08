<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Civitas\User as Staff;
use App\Models\Profil\Experience;
use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    public function index(Request $request, Staff $staff)
    {
        if($request->ajax()){
            $collection = Experience::where('user_id', $staff->id)->paginate(10);
            return view('pages.app.civitas.staff.profile.experience.list', compact('collection', 'staff'));
        }
        return view('pages.app.civitas.staff.profile.experience.main', ['staff' => $staff]);
    }

    public function experience(Request $request)
    {
        $staff = Staff::find(auth()->user()->id);
        if($request->ajax()){
            $collection = Experience::where('user_id', $staff->id)->paginate(10);
            return view('pages.app.staff_profile.experience.list', compact('collection', 'staff'));
        }
        return view('pages.app.staff_profile.experience.main', ['staff' => $staff]);
    }

    public function create(Staff $staff)
    {
        return view('pages.app.civitas.staff.profile.experience.input', ['staff' => $staff, 'data' => new Experience()]);
    }
    public function create_experience(Staff $staff)
    {
        $staff = Staff::find(auth()->user()->id);
        return view('pages.app.staff_profile.experience.input', ['staff' => $staff, 'data' => new Experience()]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'subject' => 'required',
            'prodi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $experience = new Experience();
        $experience->user_id = $request->user_id;
        $experience->year = $request->year;
        $experience->subject = $request->subject;
        $experience->prodi = $request->prodi;
        $experience->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil ditambahkan',
        ], 200);
    }

    public function edit(Staff $staff, Experience $experience)
    {
        return view('pages.app.civitas.staff.profile.experience.input', ['staff' => $staff, 'data' => $experience]);
    }

    public function edit_experience(Experience $experience)
    {
        $staff = Staff::find(auth()->user()->id);
        return view('pages.app.staff_profile.experience.input', ['staff' => $staff, 'data' => $experience]);
    }

    public function update(Request $request, Experience $experience)
    {
        if ($request->is_active !== null) {
            $experience->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $experience->update();
            return response()->json([
                'alert' => 'success',
                'message' => $message,
            ]);
        }
        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'subject' => 'required',
            'prodi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        $experience->user_id = $request->user_id;
        $experience->year = $request->year;
        $experience->subject = $request->subject;
        $experience->prodi = $request->prodi;
        $experience->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
