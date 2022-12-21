<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(){
        return view('createBook');
    }

    public function store(Request $request){

        $extension = $request->file('image')->getClientOriginalExtension();
        // $filename = $request->file('image')->getClientOriginalName();
        $filename = $request->Judul.'_'.$request->Author.'.'.$extension;
        $request->file('image')->storeAs('/public/Book/', $filename);

        Book::create([
            'Judul' => $request->Judul,
            'PublishDate' => $request->PublishDate,
            'Penulis' => $request->Author,
            'Stock' => $request->Stock,
            'image' => $filename
        ]);

        //  'nama dari model' => $request->name dari form
        // 'Judul' => $request->Judul

        return redirect('/home');
    }

    public function index(){
        $books = Book::all();

        return view('welcome', compact('books'));
    }

    public function show($id){
        $book = Book::findOrFail($id);

        return view('showBook', compact('book'));
    }

    public function edit($id){
        $book = Book::findOrFail($id);

        return view('editBook', compact('book'));
    }

    public function update(Request $request, $id){
        $extension = $request->file('image')->getClientOriginalExtension();
        // $filename = $request->file('image')->getClientOriginalName();
        $filename = $request->Judul.'_'.$request->Author.'.'.$extension;
        $request->file('image')->storeAs('/public/Book/', $filename);

        Book::findOrFail($id)->update([
            'Judul' => $request->title,
            'PublishDate' => $request->publishDate,
            'Stock' => $request->stock,
            'Penulis' => $request->author,
            'image' => $filename
        ]);

        return redirect('/home');
    }

    public function delete($id){
        Book::destroy($id);

        return redirect('/home');
    }
}
