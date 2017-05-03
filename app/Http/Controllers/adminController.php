<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\categoryList;
use App\issueList;
class adminController extends Controller
{
  public function index()
  {
    $issue= issueList::all();
    $category=categoryList::all();
    if(Auth::user()){
      return view('admin.admin',[
        'issue'=>$issue,
        'category'=>$category,
      ]);
    }
    else {
      return redirect('/');
    }
  }

}
