<?php

namespace App\Http\Controllers\Office\Civitas\Profile;

use App\Models\Profil\Books;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Civitas\User AS Dosen;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    public function index(Request $request, Dosen $dosen)
    {
        if($request->ajax()){
            $collection = Books::where('user_id', $dosen->id)->paginate(10);
            return view('pages.app.civitas.dosen.profile.book.list', compact('collection', 'dosen'));
        }
        return view('pages.app.civitas.dosen.profile.book.main', compact('dosen'));
    }

    public function create(Dosen $dosen)
    {
        return view('pages.app.civitas.dosen.profile.book.input', ['data' => new Books, 'dosen' => $dosen]);
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
            'published.required' => 'Penerbit tidak boleh kosong',
            'desc.required' => 'Deskripsi tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $book = new Books;
        $book->user_id = $request->user_id;
        $book->title = $request->title;
        $book->year = $request->year;
        $book->slug = strtolower(str_replace(' ', '-', $request->title));
        $book->published = $request->published;
        $book->desc = $request->desc;
        $book->save();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        //
    }

    public function edit(Dosen $dosen, Books $book)
    {
        return view('pages.app.civitas.dosen.profile.book.input', ['data' => $book, 'dosen' => $dosen]);
    }

    public function update(Request $request, Books $book)
    {
        if ($request->is_active !== null) {
            $book->is_active = $request->is_active;
            $message = 'Data berhasil diaktifkan';
            if ($request->is_active == 0) {
                $message = 'Data berhasil dinonaktifkan';
            }
            $book->update();
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
            'published.required' => 'Penerbit tidak boleh kosong',
            'desc.required' => 'Deskripsi tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ], 200);
        }

        $book->user_id = $request->user_id;
        $book->title = $request->title;
        $book->year = $request->year;
        $book->slug = strtolower(str_replace(' ', '-', $request->title));
        $book->published = $request->published;
        $book->desc = $request->desc;
        $book->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil diperbaharui',
        ], 200);
    }

    public function destroy(Books $book)
    {
        $book->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }
}
