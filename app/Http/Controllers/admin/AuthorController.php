<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('Isadmin');
    }



    public function view()
    {

        $authors = DB::table('authors')->get();
        // $authors = DB::table('authors')
        //     ->join('books', 'authors.book_fk', '=', 'books.id')
        //     ->select('title')
        //     ->get();
        // print_r($authors);
        // $authors = DB::table('authors')
        //     ->leftJoin('books', 'authors.id', '=', 'books.id');
        //     // ->select('title')
        //     ->get();
        return view('admin.author.view', compact('authors'));
    }

    public function AuthorInserForm()
    {


        return view('admin.author.insertForm');
    }

    public function AuthorInsert(Request $req)
    {

        $this->validate($req, [
            "first_name" => "required|string",
            "last_name" => "required|string",

            'file' => "required|mimes:svg,jpg,jpeg,png|max:2048"
        ]);

        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $book_fk = $req->input('book_fk');
        $file = $req->input('file');




        $fileName = time() . '.jpg';

        $req->file->move(public_path('uploads'), $fileName);


        DB::table('authors')->insert([
            'first_name' => $first_name,
            'last_name' => $last_name,

            'picture' => $fileName
        ]);

        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $fileName);
    }


    public function AuthorUpdateForm($id)
    {


        $toret = DB::table('authors')
            ->where('id', $id)
            ->first();

        if (
            !DB::table('authors')
                ->where('id', $id)
                ->count() > 0

        ) {
            exit();
        }
        return view('admin/author/updateForm', ["post" => $toret]);
    }


    public function update(Request $req)
    {
        $this->validate($req, [
            "id" => "required|numeric",
            "first_name" => "required|string",
            "last_name" => "required|string",


        ]);


        $id = $req->input('id');
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');

        $file = $req->input('file');


        if ($req->hasFile('picture')) {

            $req->validate([
                'file' => 'required|mimes:svg,jpg,jpeg,png|max:2048',
            ]);

            $fileName = time() . '.jpg';

            $req->picture->move(public_path('uploads'), $fileName);

            $data['picture'] =  $fileName;
        }

        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,


        ];

        $updated = DB::table('authors')
            ->where('id', $id)
            ->update($data);


        return redirect()->route('authorView');
    }



    public function delete(Request $req)
    {

        $this->validate($req, [
            "id" => "required|numeric",
        ]);

        $id = $req->input('id');

        DB::table('authors')->where('id', $id)->delete();


        return back();
    }
}
