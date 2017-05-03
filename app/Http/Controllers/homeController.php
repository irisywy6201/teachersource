<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryList;
use App\issueList;
class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
        $issue= issueList::all();
        $category=categoryList::all();
        return view('home',[
          'issue'=>$issue,
          'category'=>$category,
        ]);
    }
    public function show($id){
      $issue=issueList::all();
      $thisissue=issueList::find($id);
      $category=categoryList::all();
      return view('issue',[
        'issue'=>$issue,
        'category'=>$category,
        'thisissue'=>$thisissue,
      ]);
    }
}
