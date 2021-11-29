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


  //ユーザー用関数//
  public function index(){
    return view('start');
  }


  public function Log_mv(){
    return view('Login');
  }


  public function getLog(){
    session()->flash('flash_message', 'ログインに失敗しました');
    return view('Login');
  }


  // public function New_mv(){
  //   return view('New_sain');
  // }


  public function getNew(){
    session()->flash('flash_message', '登録に失敗しました');
    return view('New_sain');
  }



//グラフ関係の関数//
  public function main(){
    return view('graph_main');
  }


  public function basics(){
    return view('graph_basics');
  }


  public function application(){
    return view('graph_application');
  }


  public function development(){
    return view('graph_development');
  }



//管理者用関数//
  public function getCalendar(){
    //セッションの処理//
    $user=$this->login();
    if(!$user){
      return view('/');
    }
    session()->flash('flash_message', 'ログインが成功しました');
    return view('Calendar');
  }

  public function getCalendar_not(){
    //セッションの処理//
    $user=$this->login();
    if(!$user){
      return view('');
    }
    return view('Calendar');
  }


  public function getAdmin(){
    return view('start_admin');
  }


  public function getAdmin_login(){
    session()->flash('flash_message', 'ログインに失敗しました');
    return view('Login_admin');
  }

  public function Admin_login(){
    return view('Login_admin');
  }


  public function getAdmin_sain(){
    return view('New_sain_admin');
  }


  public function getgoal(Request $request){
    $data = $request->input('date');
    return view('goal_input')->with('day', $data);
  }




  //セッション確認//
  private function login(){
   
    $user_id = session()->get('user_id');
    if(empty($user_id)){
      return false;
    }
    $user = User::where('id',$user_id) -> first();
    if($user === null){
      return false;
    }
    return $user;
  }






//ユーザー新規登録//

  public function add(Request $request){

    if(empty('sain_User_name')){
      session()->flash('flash_message', '登録に失敗しました');
      $request->validate([
        'sain_User_name' => 'required|email|unique:administrators,email',
        'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
      ]);
      return redirect('New_sain');
      }

    if(empty('sain_User_pass')){
        session()->flash('flash_message', '登録に失敗しました');
        $request->validate([
          'sain_User_name' => 'required|email|unique:administrators,email',
          'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
        ]);
        return redirect('New_sain');
      }

      $request->validate([
        'sain_User_name' => 'required|email|unique:administrators,email',
        'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
      ]);
      $sain_User_name = $request->sain_User_name;
      $sain_User_pass = password_hash($request->sain_User_pass,PASSWORD_DEFAULT);
      $date = [
          'email' => $sain_User_name,
          'password' => $sain_User_pass,
      ];
      User::insert($date);

      $user_create = User::where('email',$sain_User_name) -> first();
      $id_pass=$user_create->id;

      $date_user = [
        'user_id' => $id_pass,
      ];

        learning_plan::insert($date_user);
        learning_record::insert($date_user);
        return redirect('/');
}







//ログイン認証//
  public function chtecktest(Request $request){
   
    $login_User_name = $request->login_User_name;
    $login_User_pass = $request->login_User_pass;

    if(empty($login_User_name))
      {
        session()->flash('flash_message', 'ログインに失敗しました');
        $request->validate([
          'login_User_name' => 'required',
          'login_User_pass' => 'required',
        ]);
        return view('Login');
      }
    if(empty($login_User_pass))
      {
        session()->flash('flash_message', 'ログインに失敗しました');
        $request->validate([
          'login_User_name' => 'required',
          'login_User_pass' => 'required',
        ]);
        return view('Login');
      }
//バリデーション//
      $request->validate([
        'login_User_name' => 'required',
        'login_User_pass' => 'required',
      ]);

    $user = User::where('email',$login_User_name) -> first();
    $pass=$user->password ;

    if($pass == $login_User_pass){
      session(['user_id'=> $user->id]);
      return redirect('Calendar');
    }else{
      session()->flash('flash_message', 'ログインに失敗しました');
      $request->validate([
        'login_User_name' => 'required',
        'login_User_pass' => 'required',
      ]);
      return view('Login');
    }  
    
    }
    
    




//管理者新規登録 //

public function admin_add_1(Request $request){

  if(empty('admin_sain_name')){
    session()->flash('flash_message', '登録に失敗しました');
    // $request->validate([
    //   'admin_sain_name' => 'required|email|unique:administrators,email',
    //   'admin_sain_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
    // ]);
    return view('sain_admin');
  }
  if(empty('admin_sain_pass')){
    session()->flash('flash_message', '登録に失敗しました');
    // $request->validate([
    //   'admin_sain_name' => 'required|email|unique:administrators,email',
    //   'admin_sain_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
    // ]);
    return view('sain_admin');
  }

  $request->validate([
    'admin_sain_name' => 'required|email|unique:administrators,email',
    'admin_sain_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
  ]);
  
  $admin_sain_name = $request->admin_sain_name;
  $admin_sain_pass = password_hash($request->admin_sain_pass,PASSWORD_DEFAULT);

  $date = [
    'email' => $admin_sain_name,
    'password' => $admin_sain_pass,
  ];
  Administrators::insert($date);   
  return view('admin');
  
}





//管理者認証//
public function admin_check(Request $request){

  $admin_login_name = $request->admin_login_name;
  $admin_login_pass = $request->admin_login_pass;

  if(empty($admin_login_name)){
    session()->flash('flash_message', 'ログインに失敗しました');
    $request->validate([
      'admin_login_name' => 'required|min:8',
      'admin_login_pass' => 'required',
    ]);
    return view('login_admin');
  }

  if(empty($admin_login_pass)){
    session()->flash('flash_message', 'ログインに失敗しました');
    $request->validate([
      'admin_login_name' => 'required|min:8',
      'admin_login_pass' => 'required',
    ]);
    return view('login_admin');
  }

  $request->validate([
    'admin_login_name' => 'required|min:8',
    'admin_login_pass' => 'required',
  ]);

  $admin_date = Administrators::where('email',$admin_login_name) -> first();
  $pass=$admin_date->password ;

  if($pass == $admin_login_pass){
    session(['user_id'=> $admin_date->id]);
    return redirect('Calendar');
  }else{
    return redirect('login_admin');
  }  
  
  }


}


