<?php

namespace App\Http\Controllers;
// use resources\views;
use Illuminate\Http\Request;

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
    return view('goal_input',[
      'date' => $data,
    ]);
  }
  
}
