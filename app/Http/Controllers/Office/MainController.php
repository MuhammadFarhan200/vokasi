<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\About\History;
use App\Models\About\Organization;
use App\Models\Civitas\User as Dosen;
use App\models\Civitas\User as Staff;
use App\models\Account\User;
use App\Models\Comment;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\ResearchResults;
use App\Models\FRK\ResultDevelopments;
use App\Models\FRK\ScientificWorks;
use App\Models\FRK\Teaching;
use App\Models\ProgramStudi;
use App\Models\Timeline\Activity;
use App\Models\Timeline\News;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if ($role == 1)
        {
            $civitas['dosen'] = User::where('role', 4)->count();
            $civitas['staff'] = User::where('role', 5)->count();

            $account['dekan'] = User::where('role', 2)->count();
            $account['kaprodi'] = User::where('role', 3)->count();
            $account['himpunan'] = User::where('role', 6)->count();

            $about['history'] = History::all()->count();
            $about['organization'] = Organization::all()->count();

            $news = News::all()->count();
            $activity = Activity::all()->count();
            $comment = Comment::all()->count();
            $prodi = ProgramStudi::all()->count();
            // dd($comment);
            return view('pages.app.dashboard.main', ['civitas' => $civitas, 'account' => $account, 'news' => $news, 'activity' => $activity, 'comment' => $comment, 'prodi' => $prodi, 'about' => $about]);
        } else if ($role == 4)
        {
            $dosen = Dosen::where('id', $id)->first();
            // dd($dosen);
            return view('pages.app.dashboard.dosen', ['data' => $dosen]);
        } else if ($role == 2)
        {
            $dekan = User::where('id', $id)->first();
            $j_teaching = Teaching::where('agreement', '')->orWhere('agreement', null)->count();
            $j_fpa = FinalProjectAdvisor::where('agreement', '')->orWhere('agreement', null)->count();
            $j_fpt = FinalProjectTester::where('agreement', '')->orWhere('agreement', null)->count();
            $j_sf = ScientificWorks::where('agreement', '')->orWhere('agreement', null)->count();
            $j_research = ResearchResults::where('agreement', '')->orWhere('agreement', null)->count();
            $j_rd = ResultDevelopments::where('agreement', '')->orWhere('agreement', null)->count();
            // dd($j_teaching, $j_fpa, $j_fpt, $j_sf, $j_research, $j_rd);

            $j_all_teaching = Teaching::all()->count();
            $j_all_fpa = FinalProjectAdvisor::all()->count();
            $j_all_fpt = FinalProjectTester::all()->count();
            $j_all_sf = ScientificWorks::all()->count();
            $j_all_research = ResearchResults::all()->count();
            $j_all_rd = ResultDevelopments::all()->count();
            // dd($j_all_teaching, $j_all_fpa, $j_all_fpt, $j_all_sf, $j_all_research, $j_all_rd);

            $total = $j_teaching + $j_fpa + $j_fpt + $j_sf + $j_research + $j_rd;
            $allTotal = $j_all_teaching + $j_all_fpa + $j_all_fpt + $j_all_sf + $j_all_research + $j_all_rd;
            return view('pages.app.dashboard.dekan', ['data' => $dekan, 'total_permintaan' => $total, 'allTotal' => $allTotal]);
        } else if ($role == 5)
        {
            $staff = Staff::where('id', $id)->first();
            return view('pages.app.dashboard.staf', ['data' => $staff]);
        } else if ($role == 6)
        {
            $himatek = User::where('id', $id)->first();
            $total_act_himatek = Activity::where('category', 'himatek')->count();
            return view('pages.app.dashboard.himatek', ['data' => $himatek, 'total_act_himatek' => $total_act_himatek]);
        } else if ($role == 7)
        {
            $himatif = User::where('id', $id)->first();
            $total_act_himatif = Activity::where('category', 'himatif')->count();
            return view('pages.app.dashboard.himatif', ['data' => $himatif, 'total_act_himatif' => $total_act_himatif]);
        } else if ($role == 8)
        {
            $himatera = User::where('id', $id)->first();
            $total_act_himatera = Activity::where('category', 'himatera')->count();
            return view('pages.app.dashboard.himatera', ['data' => $himatera, 'total_act_himatera' => $total_act_himatera]);
        } else if ($role == 3)
        {
            $kaprodi = User::where('id', $id)->first();
            $j_teaching = Teaching::where('agreement', '')->orWhere('agreement', null)->whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_fpa = FinalProjectAdvisor::where('agreement', '')->orWhere('agreement', null)->whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_fpt = FinalProjectTester::where('agreement', '')->orWhere('agreement', null)->whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_sf = ScientificWorks::where('agreement', '')->orWhere('agreement', null)->whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_research = ResearchResults::where('agreement', '')->orWhere('agreement', null)->whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_rd = ResultDevelopments::where('agreement', '')->orWhere('agreement', null)->whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();

            $j_all_teaching = Teaching::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_all_fpa = FinalProjectAdvisor::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_all_fpt = FinalProjectTester::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_all_sf = ScientificWorks::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_all_research = ResearchResults::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();
            $j_all_rd = ResultDevelopments::whereHas('user', function($q) {
                $q->where('position', auth()->user()->position);
            })->count();

            $total = $j_teaching + $j_fpa + $j_fpt + $j_sf + $j_research + $j_rd;
            $allTotal = $j_all_teaching + $j_all_fpa + $j_all_fpt + $j_all_sf + $j_all_research + $j_all_rd;
            return view('pages.app.dashboard.kaprodi', ['data' => $kaprodi, 'total_permintaan' => $total, 'allTotal' => $allTotal]);
        }
    }
}
