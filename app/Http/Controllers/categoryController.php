<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryList;
use App\issueList;
class categoryController extends Controller
{
  public function index()
  {
      $category= categoryList::all();
      $issue= issueList::all();
      return view('admin.category',[
        'category'=>$category,
        'issue'=>$issue,
      ]);
  }
  public function store(Request $request)
  {
    $category=new categoryList;
    $category->name=$request->name;
    $category->save();
    return redirect('/category');
  }
  public function edit($id)
	{
		//
		$category = categoryList::find($id);

		return view('admin.editCategory',[
      'category'=>$category,
    ]);
	}
  public function update(Request $request,$id){
    $category=categoryList::find($id);
    $category->name=$request->name;
    $category->save();
    return redirect('/category');
  }
  public function destroy($id)
	{
		categoryList::destroy($id);
		return back();
	}
}
