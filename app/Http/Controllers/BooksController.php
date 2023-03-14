<?php

namespace App\Http\Controllers;
use App\Charts\bookChart;
use Illuminate\Http\Request;
use App\Models\books;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositry\Interface\BookRepositryInterface;


class BooksController extends Controller
{
    //

    private $bookRepositry;
    public function __construct(BookRepositryInterface $bookRepositry)
    {
        $this->bookRepositry = $bookRepositry;
    }
    public function add()
    {
        return view('Admin.insert');
    }

    public function submit(Request $req)
    {
        $req->validate([
            'book_name' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'book_author' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'bookImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $save_book = new books();
        $save_book->BookName = $req->book_name;
        $save_book->BookAuthor = $req->book_author;

        $file = $req->file('bookImage');
        $name = $file->getClientOriginalName();

        $file->move('public/uploads', $name);
        $save_book->Pic = $name;

        if ($save_book->save()) {

            Alert::success('Alert', 'Book Addedd Successfully');
            return redirect()->route('display');
        }
    }

    public function fetch()
    {
        // $save_book =  books::where('status', '0')->orderBy('created_at', 'DESC')->paginate(5);
        
        $save_book = $this->bookRepositry->fetch();
         if ($save_book->count() >= 1) {
             return view('Admin.display', ['datas' => $save_book])->with('success', 'data feteched Successfully');
         }
    }                                                                                

    public function destroy(Request $req, $id)
    {
        $find = books::find($id);

        $find->status = 1;



        if ($find->update()) {
            Alert::success('Alert', 'Book Deleted Successfully');
            return redirect()->route('display');
        }
    }

    public function get(Request $req, $id)
    {
        $find = books::find($id);
        // dd($find);
        return view('Admin.edit', ['data' => $find]);
    }

    public function updateBook(Request $req)
    {


        $req->validate([
            'book_name' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/',
            'book_author' => 'required|max:40|regex:/^[a-zA-ZÑñ\s]+$/'
        ]);
        $find = books::find($req->id);
        $find->BookName = $req->book_name;
        $find->BookAuthor = $req->book_author;

        if ($req->file('bookImage')) {

            $file = $req->file('bookImage');

            $name = $file->getClientOriginalName();

            $file->move('public/uploads', $name);

            $find->Pic = $name;
            if ($find->update()) {
                $save_book =  books::all();
                if ($save_book->count() >= 1) {
                    Alert::success('Alert', 'Book Updated Successly');
                    return redirect()->route('display');
                }
            }
        } else {
            if ($find->update()) {
                $save_book =  books::all();
                Alert::success('Alert', 'Book Updated Successly');
                return redirect()->route('display');
            }
        }
    }

    public function show(Request $req, $id)
    {
        $find = books::find($id);
        return view('Admin.bookDetail', ['data' => $find]);
    }


    public function result(Request $req)
    {
        $query = $req->input('query');
        // dd($query);
        $data = books::where('BookName', 'like', '%' . $query . '%')->orWhere('BookAuthor', 'like', '%' . $query . '%')->where('status', '0')->get();
        return view('Admin.searchResult', ['data' => $data]);
    }


    public function filter(Request $req)
    {
        $initial_date = $req->input('start_date');
        $end_date = $req->input('end_date');
        $data = books::whereBetween('created_at', [$initial_date, $end_date])->orwhereDate('created_at', $initial_date)->get();
        return view('Admin.searchResult', ['data' => $data]);
    }

    public function index()
    {
        // dd('asdasd');
        $october = books::whereMonth('created_at', '10')->count();
        $novermber = books::whereMonth('created_at', '11')->count();
        // dd($novermber);
    
        $chart = new bookChart;
        $chart->labels([ 'July', 'August', 'September', 'October', 'November', 'December']);
        $chart->dataset('Books Charts', 'pie', [0,0,0,$october, $novermber,0])->options([
            'backgroundColor' => '#5e72e4',
        ]);;
        return view ('Admin.admin',compact('chart'));
    }
}
