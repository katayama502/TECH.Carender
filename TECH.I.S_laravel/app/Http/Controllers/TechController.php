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
  //各ページへの移動
  public function index(){
    return view('start');
  }

  public function getLog(){
   
    session()->flash('flash_message', 'ログインに失敗しました');
    
    return view('Login');
  }

  public function Log(){
    
    return view('Login');
  }


  public function getNew(){
    session()->flash('flash_message', '登録に失敗しました');
    return view('New_sain');
  }

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

  public function getCalendar(){
    //セッションの処理//
    $user=$this->login();
    if(!$user){
      return view('');
    }
    session()->flash('flash_message', 'ログインが成功しました');
    return view('Calendar');
  }

  public function getAdmin(){
    return view('start_admin');
  }

  public function getAdmin_login(){
    session()->flash('flash_message', 'ログインに失敗しました');
    return view('Login_admin');
  }

  public function getAdmin_sain(){
    session()->flash('flash_message', '登録に失敗しました');
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
    $request->validate([
      'sain_User_name' => 'required|email|unique:administrators,email',
      'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
    ]);
    $sain_User_name = $request->sain_User_name;
    $sain_User_pass = password_hash($request->sain_User_pass,PASSWORD_DEFAULT);


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
      // session()->flash('flash_message', 'ログインに失敗しました');
      return redirect('Login');
    }

    $user = User::where('email',$login_User_name) -> first();
    $pass=$user->password ;

    if($pass == $login_User_pass){
      session(['user_id'=> $user->id]);
      return redirect('Calendar');
    }else{
      // session()->flash('flash_message', 'ログインに失敗しました');
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
  $admin_sain_pass = password_hash($request->admin_sain_pass,PASSWORD_DEFAULT);


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
    session(['user_id'=> $admin_date->id]);
    return redirect('Calendar');
  }else{
    return redirect('login_admin');
  }  
  
  }


}


