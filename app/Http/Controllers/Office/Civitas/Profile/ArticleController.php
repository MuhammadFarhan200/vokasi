<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profil\Article;
use App\Models\Civitas\User AS Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request, Dosen $dosen)
    {
        if($request->ajax()){
            $collection = Article::where('user_id', $dosen->id)->paginate(10);
            return view('pages.app.civitas.dosen.profile.article.list', compact('collection', 'dosen'));
        }
        return view('pages.app.civitas.dosen.profile.article.main', compact('dosen'));
    }

    public function create(Dosen $dosen)
    {
        return view('pages.app.civitas.dosen.profile.article.input', ['data' => new Article, 'dosen' => $dosen]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year' => 'required',
            'published' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Judul tidak boleh kosong',
            'year.required' => 'Tahun tidak boleh kosong',
            'published.required' => 'Tempat Penerbitan tidak boleh kosong',
            'desc.required' => 'Deskripsi tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $article = new Article;
        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->year = $request->year;
        $article->slug = strtolower(str_replace(' ', '-', $request->title));
        $article->published = $request->published;
        $article->desc = $request->desc;
        $article->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(Dosen $dosen, Article $article)
    {
        return view('pages.app.civitas.dosen.profile.article.input', ['data' => $article, 'dosen' => $dosen]);
    }

    public function update(Request $request, Article $article)
    {
        if ($request->is_active !== null) {
            $article->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $article->update();
            return response()->json([
                'alert' => 'success',
                'message' => $message,
            ]);
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'year' => 'required',
            'published' => 'required',
            'desc' => 'required',
        ],[
            'title.required' => 'Judul tidak boleh kosong',
            'year.required' => 'Tahun tidak boleh kosong',
            'published.required' => 'Tempat Penerbitan tidak boleh kosong',
            'desc.required' => 'Deskripsi tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->year = $request->year;
        $article->slug = strtolower(str_replace(' ', '-', $request->title));
        $article->published = $request->published;
        $article->desc = $request->desc;
        $article->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
