<?php

namespace App\Http\Controllers;
use App\Charts\bookChart;
use App\Models\books;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()   
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $october = books::whereMonth('created_at', '10')->count();
        $novermber = books::whereMonth('created_at', '11')->count();
        // dd($novermber);
    
        $chart = new bookChart;
        $chart->labels([ 'July', 'August', 'September', 'October', 'November', 'December']);
        $chart->dataset('Books Charts', 'line', [0,0,0,$october, $novermber,0]);
        return view ('Admin.admin',compact('chart'));
    }
}
