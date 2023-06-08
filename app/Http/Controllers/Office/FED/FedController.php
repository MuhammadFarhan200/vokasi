<?php

namespace App\Http\Controllers\Office\FED;

use App\Http\Controllers\Controller;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\ResearchResults;
use App\Models\FRK\ResultDevelopments;
use App\Models\FRK\ScientificWorks;
use App\Models\FRK\Subject;
use App\Models\FRK\Teaching;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FedController extends Controller
{
    public function index(Request $request)
    {
        $teaching = Teaching::where('user_id', Auth::user()->id)->paginate(5);
        $fpa = FinalProjectAdvisor::where('user_id', Auth::user()->id)->paginate(5);
        $fpt = FinalProjectTester::where('user_id', Auth::user()->id)->paginate(5);
        $sf = ScientificWorks::where('user_id', Auth::user()->id)->paginate(5);
        $research = ResearchResults::where('user_id', Auth::user()->id)->paginate(5);
        $rd = ResultDevelopments::where('user_id', Auth::user()->id)->paginate(5);
        // dd(date('Y').'/'.date('Y') + 1);
        return view('pages.app.fed.main', compact('teaching', 'fpa', 'fpt', 'sf', 'research', 'rd'));
    }

    public function teaching_data(Request $request) {
        if ($request->ajax()) {
            $teaching = Teaching::where('user_id', Auth::user()->id)->paginate(5);
            return view('pages.app.fed.teaching.list', compact('teaching'));
        }
    }

    public function edit_teaching(Teaching $teaching) {
        $prodi = Auth::user()->position;
        $subjects = Subject::where('prodi', $prodi)->get();
        // dd($teaching);
        return view('pages.app.fed.teaching.input', ['data' => $teaching, 'subjects' => $subjects]);
    }

    public function update_teaching(Request $request, Teaching $teaching) {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
        ], [
            'subject_id.required' => 'Mata Kuliah wajib diisi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $teaching->proof = $file;
        }
        $teaching->subject_id = $request->subject_id;
        $teaching->sks = $request->sks;
        $teaching->meeting = $request->meeting;
        $teaching->status = $teaching->sks >= 3 ? 'M' : 'TM';
        $teaching->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }

    public function fpa_data(Request $request) {
        if ($request->ajax()) {
            $fpa = FinalProjectAdvisor::where('user_id', Auth::user()->id)->paginate(5);
            return view('pages.app.fed.fpa.list', compact('fpa'));
        }
    }

    public function edit_fpa(FinalProjectAdvisor $fpa) {
        $prodi = Auth::user()->position;
        $subjects = Subject::where('prodi', $prodi)->get();
        return view('pages.app.fed.fpa.input', ['data' => $fpa, 'subjects' => $subjects]);
    }

    public function update_fpa(Request $request, FinalProjectAdvisor $fpa) {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
        ], [
            'subject_id.required' => 'Mata Kuliah wajib diisi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $fpa->proof = $file;
        }
        $fpa->subject_id = $request->subject_id;
        $fpa->group_title = $request->group_title;
        $fpa->group_name = $request->group_name;
        $fpa->status = 'M';
        $fpa->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }

    public function fpt_data(Request $request) {
        if ($request->ajax()) {
            $fpt = FinalProjectTester::where('user_id', Auth::user()->id)->paginate(5);
            return view('pages.app.fed.fpt.list', compact('fpt'));
        }
    }

    public function edit_fpt(FinalProjectTester $fpt) {
        $prodi = Auth::user()->position;
        $subjects = Subject::where('prodi', $prodi)->get();
        return view('pages.app.fed.fpt.input', ['data' => $fpt, 'subjects' => $subjects]);
    }

    public function update_fpt(Request $request, FinalProjectTester $fpt) {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
        ], [
            'subject_id.required' => 'Mata Kuliah wajib diisi',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $fpt->proof = $file;
        }
        $fpt->subject_id = $request->subject_id;
        $fpt->group_title = $request->group_title2;
        $fpt->group_name = $request->group_name2;
        $fpt->testing_time = $request->testing_time;
        $fpt->tester_team = $request->tester_team;
        $fpt->evaluation = $request->evaluation;
        $fpt->status = 'M';
        $fpt->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }

    public function sf_data(Request $request) {
        if ($request->ajax()) {
            $sf = ScientificWorks::where('user_id', Auth::user()->id)->paginate(5);
            return view('pages.app.fed.scientific_work.list', compact('sf'));
        }
    }

    public function edit_sf(ScientificWorks $sf) {
        return view('pages.app.fed.scientific_work.input', ['data' => $sf]);
    }

    public function update_sf(Request $request, ScientificWorks $sf) {
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $sf->proof = $file;
        }
        $sf->name = $request->activity_name1;
        $sf->journal_name = $request->journal_name;
        $sf->published = $request->published1;
        $sf->status = 'M';
        $sf->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }

    public function research_data(Request $request) {
        if ($request->ajax()) {
            $research = ResearchResults::where('user_id', Auth::user()->id)->paginate(5);
            return view('pages.app.fed.research_result.list', compact('research'));
        }
    }

    public function edit_research(ResearchResults $research) {
        return view('pages.app.fed.research_result.input', ['data' => $research]);
    }

    public function update_research(Request $request, ResearchResults $research) {
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $research->proof = $file;
        }
        $research->name = $request->activity_name2;
        $research->pages = $request->pages;
        $research->published = $request->published2;
        $research->status = 'M';
        $research->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }

    public function rd_data(Request $request) {
        if ($request->ajax()) {
            $rd = ResultDevelopments::where('user_id', Auth::user()->id)->paginate(5);
            return view('pages.app.fed.result_dev.list', compact('rd'));
        }
    }

    public function edit_rd(ResultDevelopments $rd) {
        return view('pages.app.fed.result_dev.input', ['data' => $rd]);
    }

    public function update_rd(Request $request, ResultDevelopments $rd) {
        if ($request->file('proof')) {
            $file = $request->file('proof')->store('public/bukti-dukungan');
            $rd->proof = $file;
        }
        if ($request->file('assignment_proof')) {
            $file = $request->file('assignment_proof')->store('public/pengembangan');
            $rd->assignment_proof = $file;
        }
        $rd->name = $request->name;
        $rd->location = $request->location;
        $rd->status = 'M';
        $rd->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbarui',
        ], 200);
    }
}
