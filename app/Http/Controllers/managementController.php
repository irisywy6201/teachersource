<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\categoryList;
use App\issueList;
use App\userAuthority;
use App\User;
class managementController extends Controller
{
  public function index(){
    $issue= issueList::all();
    $category=categoryList::all();
    $user=User::all();
    if(Auth::user()){
      return view('admin.manageMember',[
        'issue'=>$issue,
        'category'=>$category,
        'user'=>$user
      ]);
    }
    else {
      return redirect('/');
    }

  }
  public function create(){
    $category=categoryList::all();
    if(Auth::user()){
      return view('admin.createAuthority',[
        'category'=>$category
      ]);
    }
    else {
      return redirect('/');
    }

  }
  public function store(Request $request){
    $this->validate($request, [
    'categoryId' => 'required',
    ],[
    'categoryId.required'=>'請選擇種類權限',
    ]);
    $userAuthority=new userAuthority;
    $authory=userAuthority::where('userId', '=', $request->userId)->orderBy('userId', 'desc')->get();
    $i=1;
    foreach ($authory as $authory) {
        if($request->categoryId==$authory->categoryId){
          $i=0;
          return back()
            ->with('error','已新增過此權限');
        }
      }
      if($i==1){
        $userAuthority->categoryId=$request->categoryId;
        $userAuthority->userId=$request->userId;
        $userAuthority->save();
        return back()
      		->with('success','新增成功');
      }



  }
  public function edit($id)
	{
		//
		$user = User::find($id);
    $category=categoryList::all();
    $userAuthority=userAuthority::where('userId', '=', $id)->orderBy('userId', 'desc')->get();
    if(Auth::user()){
      return view('admin.createAuthority',[
        'user'=>$user,
        'category'=>$category,
        'userAuthority'=>$userAuthority,
      ]);
    }
    else {
      return redirect('/');
    }

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
    userAuthority::destroy($id);
		return back()
      ->with('successd','成功取消');
	}


}
