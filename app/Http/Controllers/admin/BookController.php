<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('Isadmin');
    }

    public function view()
    {
        $books = Book::get();
        // print_r($books);
        return view('admin.books.view', compact('books'));
    }

    public function insertForm()
    {
        return view('admin.books.insertForm');
    }

    public function insert(Request $req)
    {
        $this->validate($req, [
            "name" => "required|string",
            "pageCount" => "required|regex:/^\d*(\.\d{1,2})?$/",
            'author_fk' => "required|numeric",

        ]);

        $name = $req->input('name');
        $pageCount = $req->input('pageCount');
        $author_fk = $req->input('author_fk');

        DB::table('books')->insert(
            [
                'name' => $name,
                'pageCount' => $pageCount,
                'author_fk' => $author_fk,


            ]
        );
        return redirect('admin/books/view');
    }



    public function updateForm($id)
    {
        // $this->validate($req, [
        //     "id" => "required|numeric",
        // ]);

        $toret = DB::table('books')
            ->where('id', $id)
            ->first();
        //axla tu erti mainc iqneba aseti idit davareturnebinot
        if (
            !DB::table('books')
                ->where('id', $id)
                ->count() > 0

        ) {
            exit();
        }
        return view('admin/books/updateForm', ["post" => $toret]);
    }

    protected function update(Request $req)
    {
        $this->validate($req, [
            "name" => "required|string",
            "pageCount" => "required|regex:/^\d*(\.\d{1,2})?$/",
            'author_fk' => "required|numeric",

        ]);


        $id = $req->input('id');
        $name = $req->input('name');
        $pageCount = $req->input('pageCount');
        $author_fk = $req->input('author_fk');





        $updated = DB::table('books')
            ->where('id', $id)
            ->update([
                'name' => $name,
                'pageCount' => $pageCount,
                'author_fk' => $author_fk,
            ]);


        return redirect()->route('view');
    }



    public function deleteForm(Request $req)
    {

        $this->validate($req, [
            "id" => "required|numeric",
        ]);

        $id = $req->input('id');

        DB::table('books')->where('id', $id)->delete();


        return back();
    }
}
