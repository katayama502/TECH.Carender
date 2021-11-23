<?php

namespace App\Http\Controllers;
// use resources\views;
use Illuminate\Http\Request;
use App\Models\Administrators;
use App\Models\learning_plan;
use App\Models\learning_record;
use App\Models\User;

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

  public function getAdmin(){
    return view('start_admin');
  }

  public function getAdmin_login(){
    return view('Login_admin');
  }

  public function getAdmin_sain(){
    return view('New_sain_admin');
  }

  public function getgoal(Request $request){
    $data = $request->input('date');
    return view('goal_input')->with('day', $data);
  }

//ユーザー新規登録//

  public function add(Request $request){
    $request->validate([
      'sain_User_name' => 'required|email|unique:administrators,email',
      'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
    ]);
    $sain_User_name = $request->sain_User_name;
    $sain_User_pass = $request->sain_User_pass;

    if(empty($sain_User_name)||empty($sain_User_pass)){
      return redirect('New_sain');
    }else{
        $date = [
          'email' => $sain_User_name,
          'password' => $sain_User_pass,
        ];
        $date_user = [
          'user_id' => $sain_User_name,
        ];
          User::insert($date);
          learning_plan::insert($date_user);
          learning_record::insert($date_user);
          return redirect('/');
    }
}



//ログイン認証//
  public function chtecktest(Request $request){
   
    //バリデーション//
    $request->validate([
      'login_User_name' => 'required',
      'login_User_pass' => 'required',
    ]);

    $login_User_name = $request->login_User_name;
    $login_User_pass = $request->login_User_pass;

    if(empty($login_User_name)||empty($login_User_pass)){
      return redirect('Login');
    }

    $youser_date = User::where('email',$login_User_name) -> first();
    $pass=$youser_date->password ;

    if($pass == $login_User_pass){
      return redirect('Carender');
    }else{
      return redirect('Login');
    }  
    
    }
    
    
//管理者新規登録 //

public function admin_add(Request $request){
  $request->validate([
    'admin_sain_name' => 'required|email|unique:administrators,email',
    'admin_sain_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
  ]);
  
  $admin_sain_name = $request->admin_sain_name;
  $admin_sain_pass = $request->admin_sain_pass;

  if(empty($admin_sain_name)||empty($admin_sain_pass)){
    return redirect('sain_admin');
  }else{
      $date = [
        'email' => $admin_sain_name,
        'password' => $admin_sain_pass,
      ];
     
      Administrators::insert($date);
        
     return redirect('admin');
  }
}

//管理者認証//
public function admin_check(Request $request){
   
  //バリデーション//
  $request->validate([
    'admin_login_name' => 'required|min:8',
    'admin_login_pass' => 'required',
  ]);

  $admin_login_name = $request->admin_login_name;
  $admin_login_pass = $request->admin_login_pass;

  if(empty($admin_login_name)||empty($admin_login_pass)){
    return redirect('login_admin');
  }

  $admin_date = Administrators::where('email',$admin_login_name) -> first();
  $pass=$admin_date->password ;

  if($pass == $admin_login_pass){
    return redirect('Carender');
  }else{
    return redirect('login_admin');
  }  
  
  }


}


