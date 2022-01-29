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

  public function getLog(){
    return view('Login');
  }

  public function getNew(){
    return view('New_sain');
  }



//グラフ関係の関数//
  public function main(){
    $user_id = session()->get('user_id');
    return view('graph_main',["user_id" => $user_id]);
  }




  public function calender_view(){
    return view('Calendar');
  }



//管理者用関数//
  public function getCalendar(){
    //セッションの処理//
    $user=$this->login();
    if(!$user){
      return view('/');
    }

    return redirect('Calendar_viwe')->with('flash_message', 'ログインが成功しました');
  }

  public function BackCalendar(){
    //セッションの処理//
    $user=$this->login();
    if(!$user){
      return view('/');
    }
    return redirect('Calendar_viwe');
  }


  public function getCalendar_admin(){
    //セッションの処理//
    $user=$this->adminlogin();
    if(!$user){
      return view('admin');
    }
    return redirect('Calendar_admin')->with('flash_message', 'ログインが成功しました');

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


  private function adminlogin(){
   
    $admin_id = session()->get('admin_id');
    if(empty($admin_id)){
      return false;
    }
    $user = Administrators::where('id',$admin_id) -> first();
    if($user === null){
      return false;
    }
    return $user;
  }





//ユーザー新規登録//

  public function add(Request $request){
    
    $sain_User_name = $request->sain_User_name;
    $sain_User_pass = $request->sain_User_pass;

    if(empty($sain_User_name)){
      session()->flash('flash_message', '登録に失敗しました');
      $request->validate([
        'sain_User_name' => 'required|email|unique:administrators,email',
        'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
      ]);
      return redirect('New_sain');
      }

    if(empty($sain_User_pass)){
        session()->flash('flash_message', '登録に失敗しました');
        $request->validate([
          'sain_User_name' => 'required|email|unique:administrators,email',
          'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
        ]);
        return redirect('New_sain');
      }

      // $request->validate([
      //   'sain_User_name' => 'required|email|unique:administrators,email',
      //   'sain_User_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
      // ]);

      $user = User::where('email',$sain_User_name) -> first();
      // $user_email=$user;
      if(!empty($user)){
        return redirect('New_sain')->with('flash_message', '既にそのユーザーは登録されています！');
      }
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
        return redirect('/')->with('flash_message', '登録が完了しました。');
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

    if(password_verify($login_User_pass,$pass)){
      session(['user_id'=> $user->id]);
      return redirect('Calendar')->with('flash_message', 'ログインに成功しました');
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

  $admin_sain_name = $request->admin_sain_name;
  $admin_sain_pass = $request->admin_sain_pass;

  if(empty($admin_sain_name)){

    return redirect('sain_admin')->with('flash_message', 'メールアドレスを記入してください！');
  }
  if(empty( $admin_sain_pass)){
    return redirect('sain_admin')->with('flash_message', '半角英数８文字で記入してください！');

  }

  $request->validate([
    'admin_sain_name' => 'required|email|unique:administrators,email',
    'admin_sain_pass' => 'min:8|regex:/\A(?=.?[a-z])(?=.?[A-Z])(?=.*?\d)[a-zA-Z\d]+\z/',
  ]);
  
  $user = Administrators::where('email',$admin_sain_name) -> first();
      $admin_email=$user;
      if(!empty($admin_email)){
        return redirect('sain_admin')->with('flash_message', '既にそのユーザーは登録されています！');
      }

  $admin_sain_name = $request->admin_sain_name;
  $admin_sain_pass = password_hash($request->admin_sain_pass,PASSWORD_DEFAULT);

  $date = [
    'email' => $admin_sain_name,
    'password' => $admin_sain_pass,
  ];
  Administrators::insert($date);   

  return redirect('admin')->with('flash_message', '登録が完了しました。');

}





//管理者認証//
public function admin_check(Request $request){

  $admin_login_name = $request->admin_login_name;
  $admin_login_pass = $request->admin_login_pass;

  if(empty($admin_login_name)){

    return redirect('login_admin')->with('flash_message', 'メールアドレスを記入してください！');
  }

  if(empty($admin_login_pass)){
    return redirect('login_admin')->with('flash_message', '正しくパスワードを記入してください！');

  }

  $request->validate([
    'admin_login_name' => 'required|min:8',
    'admin_login_pass' => 'required',
  ]);


  $admin_data = Administrators::where('email',$admin_login_name) -> first();
  if(empty($admin_data)){
    return redirect('login_admin')->with('flash_message', 'ログインに失敗しました');
  }
  $pass2 = $admin_data->password;
  if(password_verify($admin_login_pass,$pass2)){
    session(['admin_id'=> $admin_data->id]);
    return redirect('Calendar_admin')->with('flash_message', 'ログインに成功しました');

  }else{
    return redirect('login_admin')->with('flash_message', 'ログインに失敗しました');
  }  
  
  }


}


