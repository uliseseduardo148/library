<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    //Permite obtener las categorías, con el resultado obtenido
    //poblamos el select con autocomplete
    public function search(Request $request)
    {
    	$categories = [];

        if($request->has('q')){
            $search = $request->q;
            $categories =Category::select("id", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($categories);
    }

    //Permite obtener los libros filtrados por categoría
    public function getBooks(Request $request){
        $nombres = $request->input('bookData');
        //verificamos si existen datos de entrada sino no se emite respuesta alguna
        $books = Book::where('name', 'LIKE', "%$nombres%")->paginate(10);
        $view = \View::make('books.booksList')->with('books',$books);
        if($request->ajax()){
            $sections = $view->renderSections();
            return \Response::json($sections['contentPanel']);
        }else return $view;
    }
}
