<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use App\Models\Civitas\User AS Dosen;
use App\Models\Civitas\User AS Staff;
use App\Models\Profil\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Dosen $dosen)
    {
        return view('pages.app.civitas.dosen.profile.contact.input', ['dosen' => $dosen, 'data' => new Contact]);
    }

    public function store(Request $request, Dosen $dosen) {
        $contact = new Contact();
        $contact->user_id = $dosen->id;
        $contact->facebook_url = $request->facebook_url;
        $contact->instagram_url = $request->instagram_url;
        $contact->linkedin_url = $request->linkedin_url;
        $contact->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function edit(Dosen $dosen)
    {
        $contact = Contact::where('user_id', $dosen->id)->first();
        return view('pages.app.civitas.dosen.profile.contact.input', ['dosen' => $dosen, 'data' => $contact]);
    }

    public function update(Request $request, Dosen $dosen, Contact $contact)
    {
        $contact = Contact::where('user_id', $dosen->id)->first();
        $contact->facebook_url = $request->facebook_url;
        $contact->instagram_url = $request->instagram_url;
        $contact->linkedin_url = $request->linkedin_url;
        $contact->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function staff_contact(Staff $staff)
    {
        return view('pages.app.civitas.staff.profile.contact.input', ['staff' => $staff, 'data' => new Contact]);
    }

    public function store_staff_contact(Request $request, Staff $staff) {
        $contact = new Contact();
        $contact->user_id = $staff->id;
        $contact->facebook_url = $request->facebook_url;
        $contact->instagram_url = $request->instagram_url;
        $contact->linkedin_url = $request->linkedin_url;
        $contact->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function edit_staff_contact(Staff $staff)
    {
        $contact = Contact::where('user_id', $staff->id)->first();
        return view('pages.app.civitas.staff.profile.contact.input', ['staff' => $staff, 'data' => $contact]);
    }

    public function update_staff_contact(Request $request, Staff $staff, Contact $contact)
    {
        $contact = Contact::where('user_id', $staff->id)->first();
        $contact->facebook_url = $request->facebook_url;
        $contact->instagram_url = $request->instagram_url;
        $contact->linkedin_url = $request->linkedin_url;
        $contact->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }
}
