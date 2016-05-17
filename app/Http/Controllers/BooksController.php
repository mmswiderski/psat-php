<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Books;
use App\Authors;
use App\Bookstoauthors;
use App\Http\Requests;

class BooksController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        /*
            DB::table('books')->insert(
                ['title' => '', 'author' => '']
            );
        */
        return view('books.index', ['books' => Books::all()]);
    }

    public function authors()
    {
        /*
                DB::table('authors')->insert(
                    ['name' => '', 'surname' => '']
                );
        */
        return view('books.authors', ['authors' => Authors::all()]);
    }

    public function booktoauthors()
    {
        /*DB::table('bookstoauthors')->insert(
            ['author_id' => '2', 'book_id' => '4']
        );*/

        /*
             tak można wyciągnać dane ( w przypadku gdy jest dwóch autorów to będą w jednej kolumnie)
             trzeba to zaimplemnentowac(może na zajęciach ?) w modelu Bookstoauthors.

             SELECT
                    a.title,
                    GROUP_CONCAT(c.name ORDER BY c.name) authors
             FROM    books a
                INNER JOIN bookstoauthor b
                    ON a.id = b.book_id
                INNER JOIN authors c
                    ON b.author_id = c.id
             GROUP   BY a.book_id, a.title
         */


        return view('books.booktoauthors', ['books' => Bookstoauthors::all()]);
    }

    public function about()
    {
        return view('books.about');
    }
}
