<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function test()
    {
        // $books = Book::all();
        // $books = Book::all()->first();
        // $books  = Book::query()->where('category_id', 1)->get();
        // $books  = Book::query()
        //     ->where('title','LIKE', '%Est%')
        //     ->get();
        $books = Book::sum('price');
        return $books;
    }
}
