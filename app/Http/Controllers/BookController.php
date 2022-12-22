<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(){
        $categories = Category::all();

        return view('createBook', compact('categories'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'Judul' => 'required|unique:books|min:5|max:255',
            'PublishDate' => 'required',
            'Author' => 'required',
            'Stock' => 'required|integer|min:5',
            'image' => 'required|mimes:jpg,png'
        ]);


        $extension = $request->file('image')->getClientOriginalExtension();
        // $filename = $request->file('image')->getClientOriginalName();
        $filename = $request->Judul.'_'.$request->Author.'.'.$extension;
        $request->file('image')->storeAs('/public/Book/', $filename);

        Book::create([
            'Judul' => $request->Judul,
            'PublishDate' => $request->PublishDate,
            'Penulis' => $request->Author,
            'Stock' => $request->Stock,
            'image' => $filename,
            'category_id' => $request->category
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
