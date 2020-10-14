<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Http\Requests\BookRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('name', 'desc')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $authors = Author::pluck('name', 'id');
        return view('books.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //se validan los datos con el Request personalizado, incluido en el modelo
        $validatedData = $request->validated();

        $book = new Book();
        $book->name = $validatedData['name'];
        $book->author_id = $validatedData['author_id'];
        $book->category_id = $validatedData['category_id'];
        $book->published_date = $validatedData['published_date'];
        $book->status = 1;
        $book->save();
        return redirect('books')->with('success_msg', 'Registered Sucessfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $book = Book::find($id);
        $request->input('status') ? $book->status = 0 : $book->status = 1;
        //actualizamos el estado del libro, si es que fue prestado a alguien
        $request->input('user') ? $book->user = $request->input('user'): $book->user = null;
        $book->save();
        return redirect('books')->with('success_msg', 'Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect('books')->with('success_msg', 'Deleted Sucessfully');
    }


}
