<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Catalog;
use App\Models\Member;
use App\Models\Publisher;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;

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
        // $members = Member::with('user')->get();
        // $books = Book::with('publisher')->get();
        // $publisher = Publisher::with('books')->get();
        // $books = Book::with('author')->get();
        // $author = Author::with('books')->get();
        // $books = Book::with('catalog')->get();
        // $catalog = Catalog::with('books')->get();
        // $books = Book::with('transactiondetails')->get();
        // $transactiondetails = TransactionDetail::with('book')->get();
        // $transactiondetails = TransactionDetail::with('transaction')->get();
        // $transactions = Transaction::with('transactiondetails')->get();
        // $members = Member::with('transactions')->get();
        // $transactions = Transaction::with('member')->get();

        // Query builder
        // no 1
        $data = Member::select('*')->join('users', 'users.member_id','=', 'members.id')->get();

        // no 2
        $data2 = Member::select('*')->leftJoin('users', 'users.member_id','=','members.id')->where('users.id', NULL)->get();

        // no 3
        $data3 = Transaction::select('members.id', 'members.name')->rightJoin('members', 'transactions.member_id','=','members.id')->where('transactions.member_id', NULL)->get();

        // no 4
        $data4 = Member::select('members.id', 'members.name', 'members.phone_number')->Join('transactions', 'transactions.member_id', '=', 'members.id')->orderBy('members.id', 'ASC')->get();

        // no 5
        $data5 = Member::select('members.id', 'members.name', 'members.phone_number')->Join('transactions', 'transactions.member_id', '=', 'members.id')->where('transactions.id', '>', '2')->orderBy('members.id', 'ASC')->get();

        // no 6
        $data6 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')->Join('transactions', 'transactions.member_id', '=', 'members.id')->orderBy('members.name', 'ASC')->get();

        // no 7
        $data7 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')->Join('transactions', 'transactions.member_id', '=', 'members.id')->whereMonth('transactions.date_end', '=', '6')->orderBy('transactions.date_start', 'ASC')->get();

        // no 8
        $data8 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')->Join('transactions', 'transactions.member_id', '=', 'members.id')->whereMonth('transactions.date_start', '=', '5')->orderBy('transactions.date_start', 'ASC')->get();

        // no 9
        $data9 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')->Join('transactions', 'transactions.member_id', '=', 'members.id')->where('transactions.date_start','=',6)->whereMonth ('transactions.date_end', '=', '6')->orderBy('transactions.date_start', 'ASC')->get();

        $data10 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')->Join('transactions', 'transactions.member_id', '=', 'members.id')->where('members.address',"%Bandung%")->orderBy('transactions.date_start', 'ASC')->get();

        $data11 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')->Join('transactions', 'transactions.member_id', '=', 'members.id')->where('members.address',"%Bandung%")->where('members.gender','P')->orderBy('transactions.date_start', 'ASC')->get();

        $data12 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn')->Join('transactions', 'transactions.member_id', '=', 'members.id')->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')->Join('books','books.id', '=', 'transaction_details.book_id')->where('transaction_details.qty','>', 1)->orderBy('members.name')->get();

        $data13 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn', 'books.price', DB::raw('sum(transaction_details.qty * books.price) as total_price'))->Join('transactions', 'transactions.member_id', '=', 'members.id')->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')->Join('books','books.id', '=', 'transaction_details.book_id')->groupBy('members.name')->orderBy('total_price')->get();

        $data14 = Member::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'transaction_details.qty', 'books.isbn', 'books.price', 'authors.name', 'catalogs.name')->Join('transactions', 'transactions.member_id', '=', 'members.id')->Join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')->Join('books','books.id', '=', 'transaction_details.book_id')->Join('catalogs', 'catalogs.id', '=', 'books.catalog_id')->Join('authors', 'authors.id', '=', 'books.author_id')->orderBy('members.name')->get();

        $data15 = Catalog::select('catalogs.id', 'catalogs.name', 'books.title')->Join('books', 'books.catalog_id', '=', 'catalogs.id')->orderBy('catalogs.id')->get();

        $data16 = Book::select('*', 'publishers.name')->LeftJoin('publishers', 'publishers.id', '=', 'books.publisher_id')->Union( Book::select('*', 'publishers.name')->RightJoin('publishers', 'publishers.id', '=', 'books.publisher_id'))->get();

        $data17 = Book::select('authors.id', DB::raw('count(books.id) as total_author'))->Join('authors', 'authors.id', '=', 'books.author_id')->get();

        $data18 = Book::select('*')->where('books.price', '>', '10000')->get();

        $data19 = Book::select('*')->Join('publishers', 'publishers.id', '=', 'books.publisher_id')->where('publishers.name', '=', '"%Publisher01%"')->where('books.qty', '>', '10')->get();

        $data20 = Member::select('*')->whereMonth('members.created_at', '=', '6')->groupBy('members.name')->get();

<<<<<<< HEAD
        // return $data20;
=======
        return $data20;
>>>>>>> a3be113f71118c90d0d2bd664493c448231e0af8
        // return $transactions;
        // return $transactiondetails;
        // return $catalog;
        // return $author;
        // return $publisher;
        // return $books;
        // return $members;
        return view('home');
    }
}
