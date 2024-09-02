<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function cat()
    {
        $cats = Category::all();
        return response()->json($cats);
    }


}
