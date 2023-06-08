<?php

namespace App\Http\Controllers\Office\Dekan;

use App\Http\Controllers\Controller;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\ResearchResults;
use App\Models\FRK\ResultDevelopments;
use App\Models\FRK\ScientificWorks;
use App\Models\FRK\Teaching;
use Illuminate\Http\Request;

class DekanController extends Controller
{
    public function index()
    {
        $teaching = Teaching::paginate(5);
        $fpa = FinalProjectAdvisor::paginate(5);
        $fpt = FinalProjectTester::paginate(5);
        $sf = ScientificWorks::paginate(5);
        $research = ResearchResults::paginate(5);
        $rd = ResultDevelopments::paginate(5);
        // dd($teaching);
        return view('pages.app.dekan.main', [
            'teaching' => $teaching,
            'fpa' => $fpa,
            'fpt' => $fpt,
            'sf' => $sf,
            'research' => $research,
            'rd' => $rd,
        ]);
    }

    public function teaching_data(Request $request) {
        if ($request->ajax()) {
            $teaching = Teaching::paginate(5);
            return view('pages.app.dekan.teaching.list', compact('teaching'));
        }
    }

    public function edit_teaching(Teaching $teaching) {
        return view('pages.app.dekan.teaching.input', ['data' => $teaching]);
    }

    public function update_teaching(Request $request, Teaching $teaching) {
        $teaching->agreement = $request->agreement;
        $teaching->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Berhasil Diubah',
        ], 200);
    }

    public function fpa_data(Request $request) {
        if ($request->ajax()) {
            $fpa = FinalProjectAdvisor::paginate(5);
            return view('pages.app.dekan.fpa.list', compact('fpa'));
        }
    }

    public function edit_fpa(FinalProjectAdvisor $fpa) {
        return view('pages.app.dekan.fpa.input', ['data' => $fpa]);
    }

    public function update_fpa(Request $request, FinalProjectAdvisor $fpa) {
        $fpa->agreement = $request->agreement;
        $fpa->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Berhasil Diubah',
        ], 200);
    }

    public function fpt_data(Request $request) {
        if ($request->ajax()) {
            $fpt = FinalProjectTester::paginate(5);
            return view('pages.app.dekan.fpt.list', compact('fpt'));
        }
    }

    public function edit_fpt(FinalProjectTester $fpt) {
        return view('pages.app.dekan.fpt.input', ['data' => $fpt]);
    }

    public function update_fpt(Request $request, FinalProjectTester $fpt) {
        $fpt->agreement = $request->agreement;
        $fpt->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Berhasil Diubah',
        ], 200);
    }

    public function sf_data(Request $request) {
        if ($request->ajax()) {
            $sf = ScientificWorks::paginate(5);
            return view('pages.app.dekan.scientific_work.list', compact('sf'));
        }
    }

    public function edit_sf(ScientificWorks $sf) {
        return view('pages.app.dekan.scientific_work.input', ['data' => $sf]);
    }

    public function update_sf(Request $request, ScientificWorks $sf) {
        $sf->agreement = $request->agreement;
        $sf->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Berhasil Diubah',
        ], 200);
    }

    public function research_data(Request $request) {
        if ($request->ajax()) {
            $research = ResearchResults::paginate(5);
            return view('pages.app.dekan.research_result.list', compact('research'));
        }
    }

    public function edit_research(ResearchResults $research) {
        return view('pages.app.dekan.research_result.input', ['data' => $research]);
    }

    public function update_research(Request $request, ResearchResults $research) {
        $research->agreement = $request->agreement;
        $research->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Berhasil Diubah',
        ], 200);
    }

    public function rd_data(Request $request) {
        if ($request->ajax()) {
            $rd = ResultDevelopments::paginate(5);
            return view('pages.app.dekan.result_dev.list', compact('rd'));
        }
    }

    public function edit_rd(ResultDevelopments $rd) {
        return view('pages.app.dekan.result_dev.input', ['data' => $rd]);
    }

    public function update_rd(Request $request, ResultDevelopments $rd) {
        $rd->agreement = $request->agreement;
        $rd->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data Berhasil Diubah',
        ], 200);
    }
}
