<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;


class PaginationController extends Controller
{
    //pagination view
    public function show()
    {
         $datas=Book::paginate(5);
        $data=Book::simplePaginate(10);
        return view('pagination.books',['books'=>$datas]);
    }
}
