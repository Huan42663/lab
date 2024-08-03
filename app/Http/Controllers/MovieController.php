<?php

namespace App\Http\Controllers;

use App\Models\Gene;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        return view('books.index', compact('movies'));
    }
    public function formInsert()
    {
        $gene = Gene::all();
        return view('books.create', compact('gene'));
    }
    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'min:8'],
                'poster' => ['nullable', 'image'],
                'intro' => ['required', 'min:8'],
                'release_date' => ['required'],
                'gene_id' => ['required']
            ],
            [
                'title.required'        => 'tiêu đề không được để trống',
                'title.min'             => 'tiêu đề phải có ít nhất 8 ký tự',
                'poster.image'          => 'file ảnh không đúng định dạng',
                'intro.required'        => "Intro không được để trống",
                'intro.min'             => "Intro không được ngắn hơn 8 ký tự",
                'release_date.required' => "ngày phát hành không được để trống"
            ]
        );
        $data = $request->except('poster');
        $data['poster'] = "";
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('images');
            $data['poster'] = $path_poster;
        }
        Movie::query()->create($data);

        return redirect()->route('home')->with('message', 'Thêm dữ liệu thành công');
    }
    public function delete($id)
    {
        DB::table('movies')->delete($id);
        return redirect()->route('home')->with('message', 'xóa thành công');
    }
    public function edit(Movie $movie)
    {
        $gene = Gene::all();
        // dd($gene);
        return view('books.edit', compact('movie', 'gene'));
    }
    public function update(Request $request, Movie $movie)
    {
        $data = $request->except('poster');
        $old_poster = $movie->poster;
        $data['poster'] = $old_poster;
        // dd($request);
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('images');
            $data['poster'] = $path_poster;
        }
        $movie->update($data);
        if (isset($path_poster)) {
            if (file_exists('storage/' . $old_poster)) {
                unlink('storage/' . $old_poster);
            }
        }
        return redirect()->route('home')->with('message', 'Sửa thành công');
    }
    public function search()
    {
        $movies = Movie::query()->where('title', 'LIKE', "%" . $_GET['search'] . "%")->paginate(10);
        return view('books.index', compact('movies'));
    }
}
