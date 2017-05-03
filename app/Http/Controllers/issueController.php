<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoryList;
use App\issueList;
use App\userAuthority;
class issueController extends Controller
{
  public function index(){
    $issue= issueList::all();
    $category=categoryList::all();
    $userAuthority=userAuthority::all();
    return view('admin.issue',[
      'issue'=>$issue,
      'category'=>$category,
      'userAuthority'=>$userAuthority,
    ]);
  }
  public function create(){
    $category=categoryList::all();
    return view('admin.createIssue',[
      'category'=>$category
    ]);
  }
  public function store(Request $request){
    $this->validate($request, [
    'categoryId' => 'required',
    'name' => 'required',
    'content'=>'required',
    ],[
    'categoryId.required'=>'請選擇文章種類',
    'name.required'=>'文章種類不可為空',
    'content.required'=>'文章內容不可為空'
    ]);
    $issue=new issueList;
    $issue->categoryId=$request->categoryId;
    $issue->name=$request->name;
    $issue->content=$request->content;
    $issue->save();
    return redirect('admin/issue');
  }
  public function edit($id)
	{
		//
		$issue = issueList::find($id);
    $category=categoryList::all();
		return view('admin.editIssue',[
      'issue'=>$issue,
      'category'=>$category
    ]);
	}
  public function update(Request $request,$id){
    $issue=issueList::find($id);
    $issue->categoryId=$request->categoryId;
    $issue->name=$request->name;
    $issue->content=$request->content;
    $issue->save();
    return redirect('admin/issue');
  }
  public function destroy($id)
	{
		issueList::destroy($id);
		return back();
	}


}
