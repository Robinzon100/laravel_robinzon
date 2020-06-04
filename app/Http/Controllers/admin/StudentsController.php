<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('Isadmin');
    }


    public function getCutomerView()
    {

        $students = DB::table('students')->get();

        return view('admin.students.view', compact('students'));
    }

    public function insertForm()
    {


        return view('admin.students.insertForm');
    }

    public function insert(Request $req)
    {
        $this->validate($req, [
            "first_name" => "required|string",
            "last_name" => "required|string",
            'gender' => "required|string",
            'phone_number' => "required|numeric",
            "city" => "required|string",

        ]);

        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $birthdate = $req->input('birthdate');
        $gender = $req->input('gender');
        $phone_number = $req->input('phone_number');
        $city = $req->input('city');


        DB::table('students')->insert([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthdate' => $birthdate,
            'gender' => $gender,
            'phone_number' => $phone_number,
            'city' => $city

        ]);


        return redirect('admin/students/view');
    }



    public function updateForm($id)
    {
        $toret = DB::table('students')
            ->where('id', $id)
            ->first();


        if (
            !DB::table('students')
                ->where('id', $id)
                ->count() > 0

        ) {
            exit();
        }
        return view('admin/students/updateForm', ["post" => $toret]);
    }

    public function update(Request $req)
    {
        $this->validate($req, [
            "first_name" => "required|string",
            "last_name" => "required|string",
            'gender' => "required|string",
            'phone_number' => "required|numeric",
            "city" => "required|string",
            'birthdate' => "date"
        ]);

        $id = $req->input('id');
        $first_name = $req->input('first_name');
        $last_name = $req->input('last_name');
        $birthdate = $req->input('birthdate');
        $gender = $req->input('gender');
        $phone_number = $req->input('phone_number');
        $city = $req->input('city');



        DB::table('students')
            ->where('id', $id)
            ->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'birthdate' => $birthdate,
                'gender' => $gender,
                'phone_number' => $phone_number,
                'city' => $city

            ]);


        return redirect('admin/students/view');
    }


    public function delete(Request $req)
    {
        $id = $req->input('id');

        DB::table('students')->where('id', $id)->delete();


        return back();
    }
}
