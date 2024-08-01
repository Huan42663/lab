<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->get();
        $cate = DB::table('categories')->get();
        return view('books.edit', compact('book', 'cate'));
    }
    public function update(Request $request, $id)
    {
        $books = DB::table('books')->get();
        if (!empty($request)) {
            DB::table('books')->where('id', $id)->update(
                [
                    'title' => $_POST['title'],
                    'thumbnail' => $_POST['thumbnail'],
                    'author' => $_POST['author'],
                    'publisher' => $_POST['publisher'],
                    'publication' => $_POST['publication'],
                    'price' => $_POST['price'],
                    'quantity' => $_POST['quantity'],
                    'category_id' => $_POST['category_id'],
                ]
            );
        }
        return redirect()->route('home');
    }
    public function formInsert()
    {
        $cate = DB::table('categories')->get();
        return view('books.create', compact('cate'));
    }
    public function create(Request $request)
    {
        $data = $request->except('thumbnail');
        $data['thumbnail'] = "";
        if ($request->hasFile('thumbnail')) {
            $path_image = $request->file('thumbnail')->store('images');
            $data['thumbnail'] = $path_image;
        }
        Book::query()->create($data);

        return redirect()->route('home')->with('message', 'Thêm dữ liệu thành công');
    }
    public function delete($id)
    {
        DB::table('books')->delete($id);
        return redirect()->route('home')->with('message', 'xóa thành công');
    }
}
