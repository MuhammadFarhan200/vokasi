<?php

namespace App\Http\Controllers\Office\KAProdi;

use App\Http\Controllers\Controller;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\ResearchResults;
use App\Models\FRK\ResultDevelopments;
use App\Models\FRK\ScientificWorks;
use App\Models\FRK\Teaching;
use Illuminate\Http\Request;

class KAProdiController extends Controller
{
    public function index()
    {
        $teaching = Teaching::whereHas('user', function($q) {
            $q->where('position', auth()->user()->position);
        })->paginate(5);
        $fpa = FinalProjectAdvisor::whereHas('user', function($q) {
            $q->where('position', auth()->user()->position);
        })->paginate(5);
        $fpt = FinalProjectTester::whereHas('user', function($q) {
            $q->where('position', auth()->user()->position);
        })->paginate(5);
        $sf = ScientificWorks::whereHas('user', function($q) {
            $q->where('position', auth()->user()->position);
        })->paginate(5);
        $research = ResearchResults::whereHas('user', function($q) {
            $q->where('position', auth()->user()->position);
        })->paginate(5);
        $rd = ResultDevelopments::whereHas('user', function($q) {
            $q->where('position', auth()->user()->position);
        })->paginate(5);
        // dd($teaching, $fpa, $fpt, $sf, $research, $rd);
        return view('pages.app.kaprodi.main', [
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
            $teaching = Teaching::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->paginate(5);
            return view('pages.app.kaprodi.teaching.list', compact('teaching'));
        }
    }

    public function edit_teaching(Teaching $teaching) {
        return view('pages.app.kaprodi.teaching.input', ['data' => $teaching]);
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
            $fpa = FinalProjectAdvisor::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->paginate(5);
            return view('pages.app.kaprodi.fpa.list', compact('fpa'));
        }
    }

    public function edit_fpa(FinalProjectAdvisor $fpa) {
        return view('pages.app.kaprodi.fpa.input', ['data' => $fpa]);
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
            $fpt = FinalProjectTester::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->paginate(5);
            return view('pages.app.kaprodi.fpt.list', compact('fpt'));
        }
    }

    public function edit_fpt(FinalProjectTester $fpt) {
        return view('pages.app.kaprodi.fpt.input', ['data' => $fpt]);
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
            $sf = ScientificWorks::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->paginate(5);
            return view('pages.app.kaprodi.scientific_work.list', compact('sf'));
        }
    }

    public function edit_sf(ScientificWorks $sf) {
        return view('pages.app.kaprodi.scientific_work.input', ['data' => $sf]);
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
            $research = ResearchResults::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->paginate(5);
            return view('pages.app.kaprodi.research_result.list', compact('research'));
        }
    }

    public function edit_research(ResearchResults $research) {
        return view('pages.app.kaprodi.research_result.input', ['data' => $research]);
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
            $rd = ResultDevelopments::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->paginate(5);
            return view('pages.app.kaprodi.result_dev.list', compact('rd'));
        }
    }

    public function edit_rd(ResultDevelopments $rd) {
        return view('pages.app.kaprodi.result_dev.input', ['data' => $rd]);
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
