<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'CustomerController@show');

Route::get('/user', 'UserController@getUser');

Route::get('/admin/Admin', 'admin\AdminController@getAdmin');


/// BOOK CRUD
Route::get('/admin/books/view', 'admin\BookController@view')->name("view");

Route::get('/admin/books/insertForm', 'admin\BookController@insertForm')->name("insertForm");
Route::post("/admin/books/insert", "admin\BookController@insert")->name('insert');

Route::get('/admin/books/updateForm/{id}', 'admin\BookController@updateForm')->name("updateForm")->where(['id' => '[0-9]+']);
Route::post("/admin/books/update", "admin\BookController@update")->name('update');

Route::post('/admin/books/deleteForm', 'admin\BookController@deleteForm')->name("deleteForm");




/// authors CRUD
Route::get('/admin/author/view', 'admin\AuthorController@view')->name("authorView");

Route::get('/admin/author/insertForm', 'admin\AuthorController@AuthorInserForm')->name("AuthorinsertForm");
Route::post("/admin/author/authorInsert", "admin\AuthorController@AuthorInsert")->name('authorInsert');


Route::get('/admin/author/updateForm/{id}', 'admin\AuthorController@AuthorUpdateForm')->name("AuthorUpdateForm")->where(['id' => '[0-9]+']);
Route::post("/admin/author/authorUpdate", "admin\AuthorController@update")->name('authorUpdate');

Route::post('/admin/author/delete', 'admin\AuthorController@delete')->name("authorDelete");




Route::get('/admin/students/view', 'admin\StudentsController@getCutomerView')->name("customerView");

Route::get('/admin/students/insertForm', 'admin\StudentsController@insertForm')->name("StudentsinsertForm");
Route::post('/admin/students/studentsInsert', 'admin\StudentsController@insert')->name("studentsInsert");

Route::get('/admin/students/updateForm/{id}', 'admin\StudentsController@updateForm')->name("CustomerUpdateForm")->where(['id' => '[0-9]+']);
Route::post('/admin/students/updateStudents', 'admin\StudentsController@update')->name("updateStudents");

Route::post('/admin/students/deleteStudents', 'admin\StudentsController@delete')->name("deleteStudents");



Route::get('/admin/borrows/view', 'admin\BorrowsController@View')->name("customerView");

Route::get('/admin/borrows/insertForm', 'admin\BorrowsController@insertForm')->name("borrowsInsertForm");
Route::post('/admin/borrows/borrowsInsert', 'admin\BorrowsController@insert')->name("borrowsInsert");

Route::get('/admin/borrows/updateForm/{id}', 'admin\BorrowsController@updateForm')->name("borrowsUpdateForm")->where(['id' => '[0-9]+']);
Route::post('/admin/borrows/updateBorrows', 'admin\BorrowsController@update')->name("updateBorrows");

Route::post('/admin/borrows/deleteBorrows', 'admin\BorrowsController@delete')->name("deleteBorrows");
