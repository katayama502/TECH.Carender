<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning_plan extends Model
{
    use HasFactory;
    static public $genreArray = [
        "基礎課題" => "1",
        "応用課題" => "2",
        "開発課題" => "3"
    ];

    static public $categoryArray=[
        "01_はじめに" => "1",
        "02_HTML/CSS" => "2",
        "03_Git" => "3", 
        "04_ポートフォリオ" => "4",
        "05_PHP" => "5", 
        "06_JavaScript"=>"6",
        "07_SQL" => "7",
        "01_Twitterクローン開発初級" => "1",
        "02_Twitterクローン開発" => "2",
        "03_Laravel" => "3",
        "01_チーム開発" => "1",
        "02_自主制作" => "2"
    ];

    static public $lessonNumberArray=[
        "No1" => "1",
        "No2" => "2",
        "No3" => "3",
        "No4" => "4",
        "No5" => "5",
        "No6" => "6",
        "No7" => "7",
        "No8" => "8",
        "No9" => "9",
        "No10" => "10",
        "No11" => "11",
        "No12" => "12",
        "No13" => "13",
        "No14" => "14",
        "No15" => "15"
    ];
}
