<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowsController extends Controller
{
    public function view()
    {

        $borrows = DB::table('borrows')->get();
        return view('admin.borrows.view', compact('borrows'));
    }



    public function insertForm()
    {


        return view("admin/borrows/insertForm");
    }

    public function insert(Request $req)
    {
        $this->validate($req, [
            "student_fk" => "required|numeric",
            "book_fk" => "required|numeric",
            // 'takenDate' => "required|numeric",

        ]);

        $student_fk = $req->input('student_fk');
        $book_fk = $req->input('book_fk');
        $takenDate = $req->input('takenDate');
        $broughtDate = $req->input('broughtDate');

        DB::table('borrows')->insert([
            'student_fk' => $student_fk,
            'book_fk' => $book_fk,
            'takenDate' => $takenDate,
            'broughtDate' => $broughtDate
        ]);

        return redirect('admin/borrows/view');
    }




    public function updateForm($id)
    {
        $borrows = DB::table('borrows')
            ->where('id', $id)
            ->first();
        //axla tu erti mainc iqneba aseti idit davareturnebinot
        if (
            !DB::table('borrows')
                ->where('id', $id)
                ->count() > 0

        ) {
            exit();
        }
        return view('admin/borrows/updateForm', ["post" => $borrows]);
    }



    public function update(Request $req)
    {

        $this->validate($req, [
            "student_fk" => "required|numeric",
            "book_fk" => "required|numeric",
            'takenDate' => "date",
            'broughtDate' => "date"

        ]);

        $id = $req->input('id');
        $student_fk = $req->input('student_fk');
        $book_fk = $req->input('book_fk');
        $takenDate = $req->input('takenDate');
        $broughtDate = $req->input('broughtDate');

        DB::table('borrows')
            ->where('id', $id)
            ->update([
                'student_fk' => $student_fk,
                'book_fk' => $book_fk,
                'takenDate' => $takenDate,
                'broughtDate' => $broughtDate
            ]);

        return redirect('admin/borrows/view');
    }



    public function delete(Request $req)
    {

        $this->validate($req, [
            "id" => "required|numeric",
        ]);

        $id = $req->input('id');
        $delete = DB::table('borrows')->where('id', $id)->delete();

        return back();
    }
}
