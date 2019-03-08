<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\categoryList;
use App\issueList;
use App\userAuthority;
use App\User;
class userController extends Controller
{
  public function index(){
    if(Auth::user()){
      $user=User::find(Auth::user()->id);
      return view('admin.user',[
        'user'=>$user
      ]);
    }
    else {
      return redirect('/');
    }

  }
  public function create(){

  }
  public function store(Request $request){


  }
  public function edit($id)
	{
		//

	}
  public function update(Request $request,$id){
    $this->validate($request, [
    'office' => 'required',
    ],[
    'office.required'=>'處室名稱欄位不能為空',
    ]);
    $this->validate($request, [
    'email' => 'required',
    ],[
    'emaul.required'=>'email欄位不能為空',
    ]);
    $name=User::find($id);
    $name->office=$request->office;
    $name->email=$request->email;
    $name->save();
    return back()
      ->with('success','更改成功');
  }
  public function destroy($id)
	{

	}


}
