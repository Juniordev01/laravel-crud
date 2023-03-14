<?php

namespace App\Repositry;
use App\Repositry\Interface\BookRepositryInterface;
use App\Charts\bookChart;
use Illuminate\Http\Request;
use App\Models\books;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
class BookFunLogics implements BookRepositryInterface
{
    public function fetch()
    {
       return $save_book =  books::where('status', '0')->orderBy('created_at', 'DESC')->paginate(5);
       
    }
}   