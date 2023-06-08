<?php

namespace App\Http\Controllers\Office\FRK;

use Carbon\Carbon;
use App\Models\Civitas\User;
use App\Models\FRK\Teaching;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\ResearchResults;
use App\Models\FRK\ResultDevelopments;
use App\Models\FRK\ScientificWorks;
use App\Models\FRK\Subject;

class FrkController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('pages.app.frk.main', ['data' => $user]);
    }

    public function check()
    {
        session()->remove('tahunAjaran');
        session()->remove('semester');

        return view('pages.app.frk.check');
    }

    public function checkResult(Request $request)
    {
        $tahunAjaran = $request->year;

        $tahunAwal = '';
        $tahunAkhir = '';

        if (strpos($tahunAjaran, '/') !== false) {
            list($tahunAwal, $tahunAkhir) = explode('/', $tahunAjaran);
        }

        if ($tahunAwal !== '' && $tahunAkhir !== '') {
            $waktuSekarang = Carbon::now();

            $bulanSekarang = $waktuSekarang->month;
            $tahunSekarang = $waktuSekarang->year;
            $batasWaktuPengisian = null;

            if (($tahunSekarang >= (int) $tahunAwal && $tahunSekarang <= (int) $tahunAkhir) && // (tahunSekarang >= tahunAwal && tahunSekarang <= tahunAkhir)
                ($bulanSekarang >= 9 && $bulanSekarang <= 12) || // (bulan >= 9 && bulan <= 12) || (bulan >= 9 && 10 <= 12) || (bulan >= 9 && 11 <= 12) || (bulan >= 9 && 12 <= 12)
                ($bulanSekarang >= 1 && $bulanSekarang <= 1))
            {
                $batasWaktuPengisian = Carbon::create((int) $tahunAkhir, 1, 31, 23, 59, 59);
            } elseif ($bulanSekarang >= 3 && $bulanSekarang <= 6) {
                $batasWaktuPengisian = Carbon::create((int) $tahunAkhir, 6, 30, 23, 59, 59);
            }

            if ($waktuSekarang <= $batasWaktuPengisian) {
                session(['tahunAjaran' => $request->year]);
                session(['semester' => $request->semester]);
                return response()->json([
                    'alert' => 'success',
                    'message' => '<span style="font-size: 13px;" class="fw-semibold">Masa pengisian masih berlangsung, Anda dapat melanjutkan proses pengisian FRK.</span>',
                ], 200);
            } else {
                return response()->json([
                    'alert' => 'error',
                    'message' => '<span style="font-size: 13px;" class="text-danger fw-semibold">Masa pengisian sudah berakhir, Anda sudah tidak dapat melanjutkan proses pengisian FRK!</span>',
                ], 200);
            }
        } else {
            return response()->json([
                'alert' => 'error',
                'message' => 'Data yang anda input tidak valid.',
            ], 200);
        }
    }

    public function menu()
    {
        $prodi = Auth::user()->position;
        // dd($prodi);
        $subjects = Subject::orderBy('semester', 'asc');
        if ($prodi !== null) {
            $subjects = $subjects->where('prodi', $prodi)->get();
        } else {
            $subjects = $subjects->get();
        }
        // dd($subjects);
        return view('pages.app.frk.menu', ['subjects' => $subjects]);
    }

    public function store_edu_impln(Request $request)
    {
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

        $advisor = new FinalProjectAdvisor;
        $advisor->user_id = Auth::user()->id;
        $advisor->subject_id = $request->subject_id2;
        $advisor->group_title = $request->group_title;
        $advisor->group_name = $request->group_name;
        $advisor->status = 'M';
        $advisor->year = $year;
        $advisor->semester = $semester;
        $advisor->save();

        $tester = new FinalProjectTester;
        $tester->user_id = Auth::user()->id;
        $tester->subject_id = $request->subject_id3;
        $tester->group_title = $request->group_title2;
        $tester->group_name = $request->group_name2;
        $tester->testing_time = $request->testing_time;
        $tester->tester_team = $request->tester_team;
        $tester->evaluation = $request->evaluation;
        $tester->status = 'M';
        $tester->year = $year;
        $tester->semester = $semester;
        $tester->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function store_research_impln(Request $request)
    {
        $year = session('tahunAjaran');
        $semester = session('semester');
        $sf = new ScientificWorks;
        $sf->user_id = Auth::user()->id;
        $sf->name = $request->activity_name1;
        $sf->journal_name = $request->journal_name;
        $sf->published = $request->published1;
        $sf->status = 'M';
        $sf->year = $year;
        $sf->semester = $semester;
        $sf->save();

        $research = new ResearchResults;
        $research->user_id = Auth::user()->id;
        $research->name = $request->activity_name2;
        $research->pages = $request->pages;
        $research->published = $request->published2;
        $research->status = 'M';
        $research->year = $year;
        $research->semester = $semester;
        $research->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function store_devotion_impln(Request $request)
    {
        // dd($request->all());
        $year = session('tahunAjaran');
        $semester = session('semester');
        $rd = new ResultDevelopments;
        $rd->user_id = Auth::user()->id;
        $rd->name = $request->name;
        $rd->location = $request->location;
        if ($request->file('assignment_proof')) {
            $file = $request->file('assignment_proof')->store('public/pengembangan');
            $rd->assignment_proof = $file;
        }
        $rd->status = 'M';
        $rd->year = $year;
        $rd->semester = $semester;
        $rd->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function teaching_data(Request $request) {
        if ($request->ajax()) {
            $teaching = Teaching::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            // dd($teaching);
            return view('pages.app.fed.teaching.list', ['teaching' => $teaching]);
        }
    }

    public function show_teaching(Teaching $teaching) {
        $prodi = Auth::user()->position;
        $subjects = Subject::where('prodi', $prodi)->get();
        // dd($teaching);
        return view('pages.app.fed.teaching.detail', ['data' => $teaching, 'subjects' => $subjects]);
    }

    public function fpa_data(Request $request) {
        if ($request->ajax()) {
            $fpa = FinalProjectAdvisor::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            return view('pages.app.fed.fpa.list', compact('fpa'));
        }
    }

    public function show_fpa(FinalProjectAdvisor $fpa) {
        $prodi = Auth::user()->position;
        $subjects = Subject::where('prodi', $prodi)->get();
        return view('pages.app.fed.fpa.detail', ['data' => $fpa, 'subjects' => $subjects]);
    }

    public function fpt_data(Request $request) {
        if ($request->ajax()) {
            $fpt = FinalProjectTester::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            return view('pages.app.fed.fpt.list', compact('fpt'));
        }
    }

    public function show_fpt(FinalProjectTester $fpt) {
        $prodi = Auth::user()->position;
        $subjects = Subject::where('prodi', $prodi)->get();
        return view('pages.app.fed.fpt.detail', ['data' => $fpt, 'subjects' => $subjects]);
    }

    public function sf_data(Request $request) {
        if ($request->ajax()) {
            $sf = ScientificWorks::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            return view('pages.app.fed.scientific_work.list', compact('sf'));
        }
    }

    public function show_sf(ScientificWorks $sf) {
        return view('pages.app.fed.scientific_work.detail', ['data' => $sf]);
    }

    public function research_data(Request $request) {
        if ($request->ajax()) {
            $research = ResearchResults::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            return view('pages.app.fed.research_result.list', compact('research'));
        }
    }

    public function show_research(ResearchResults $research) {
        return view('pages.app.fed.research_result.detail', ['data' => $research]);
    }

    public function rd_data(Request $request) {
        if ($request->ajax()) {
            $rd = ResultDevelopments::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
            return view('pages.app.fed.result_dev.list', compact('rd'));
        }
    }

    public function show_rd(ResultDevelopments $rd) {
        return view('pages.app.fed.result_dev.detail', ['data' => $rd]);
    }
}
