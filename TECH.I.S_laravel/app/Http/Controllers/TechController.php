<?php

namespace App\Http\Controllers;
// use resources\views;
use Illuminate\Http\Request;

use App\Models\Administrators;
use App\Models\learning_plan;
use App\Models\learning_record;


class TechController extends Controller
{
  public function index(){
    return view('start');
  }

  public function getLog(){
    return view('Login');
  }

  public function getNew(){
    return view('New_sain');
  }


  public function getCarender(){
    return view('Carender');
  }


  public function getgoal(Request $request){
    $data = $request->input('date');
    return view('goal_input')->with('day', $data);
  }

//DBへのアドレス・PASSの登録 //

  public function add(Request $request){
    $request->validate([
      'Introduction_name' => 'required|email',
      'Introduction_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
    ]);
    $Introduction_name = $request->Introduction_name;
    $Introduction_pass = $request->Introduction_pass;

    if(empty($Introduction_name)||empty($Introduction_pass)){
      return redirect('New_sain');
    }else{
        $date = [
          'email' => $Introduction_name,
          'password' => $Introduction_pass,
        ];
        $date_user = [
          'user_id' => $Introduction_name,
        ];
          Administrators::insert($date);
          learning_plan::insert($date_user);
          learning_record::insert($date_user);
          return redirect('/');
    }
}



//ログイン認証//
  public function chtecktest(Request $request){
   
    //バリデーション//
    $request->validate([
      'Introduction_name2' => 'required',
      'Introduction_pass2' => 'required',
    ]);

    $Introduction_name2 = $request->Introduction_name2;
    $Introduction_pass2 = $request->Introduction_pass2;

    if(empty($Introduction_name2)||empty($Introduction_pass2)){
      return redirect('Login');
    }

    $youser_date = Administrators::where('email',$Introduction_name2) -> first();
    $pass=$youser_date->password ;

    if($pass == $Introduction_pass2){
      return redirect('Carender');
    }else{
      return redirect('Login');
    }  
    
    }
    
    
}



