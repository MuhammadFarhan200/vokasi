<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Civitas\User AS Staff;
use App\Models\Profil\StaffActivity;
use Illuminate\Support\Facades\Validator;

class StaffActivityController extends Controller
{
    public function index(Request $request, Staff $staff)
    {
        $staff = Staff::find($staff->id);
        // dd($staff);
        if($request->ajax()){
            $collection = StaffActivity::where('user_id', $staff->id)->paginate(10);
            return view('pages.app.civitas.staff.profile.staff_activity.list', compact('collection', 'staff'));
        }
        return view('pages.app.civitas.staff.profile.staff_activity.main', ['staff' => $staff]);
    }

    public function staff_activity(Request $request)
    {
        $staff = Staff::find(auth()->user()->id);
        // dd($staff);
        if($request->ajax()){
            $collection = StaffActivity::where('user_id', $staff->id)->paginate(10);
            return view('pages.app.staff_profile.staff_activity.list', compact('collection', 'staff'));
        }
        return view('pages.app.staff_profile.staff_activity.main', ['staff' => $staff]);
    }

    public function create(Staff $staff)
    {
        return view('pages.app.civitas.staff.profile.staff_activity.input', ['staff' => $staff, 'data' => new StaffActivity()]);
    }

    public function create_activity()
    {
        $staff = Staff::find(auth()->user()->id);
        return view('pages.app.staff_profile.staff_activity.input', ['staff' => $staff, 'data' => new StaffActivity()]);
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

        $staffActivity = new StaffActivity();
        $staffActivity->user_id = $request->user_id;
        $staffActivity->year = $request->year;
        $staffActivity->subject = $request->subject;
        $staffActivity->prodi = $request->prodi;
        $staffActivity->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil ditambahkan',
        ], 200);
    }

    public function edit(Staff $staff, StaffActivity $staffActivity)
    {
        return view('pages.app.civitas.staff.profile.staff_activity.input', ['staff' => $staff, 'data' => $staffActivity]);
    }

    public function edit_activity(StaffActivity $staffActivity)
    {
        $staff = Staff::find(auth()->user()->id);
        return view('pages.app.staff_profile.staff_activity.input', ['staff' => $staff, 'data' => $staffActivity]);
    }

    public function update(Request $request, StaffActivity $staffActivity)
    {
        if ($request->is_active !== null) {
            $staffActivity->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $staffActivity->update();
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

        $staffActivity->user_id = $request->user_id;
        $staffActivity->year = $request->year;
        $staffActivity->subject = $request->subject;
        $staffActivity->prodi = $request->prodi;
        $staffActivity->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(StaffActivity $staffActivity)
    {
        $staffActivity->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
