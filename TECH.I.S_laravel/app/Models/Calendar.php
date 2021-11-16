<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $guarded = 'id';

    protected $fillable = ['id','body'];
    

    // public function getData() {
	// 	// $data = DB::table($this->table)->get();
    // 	$data = Calendar::select('select * from events');
    //     return $data;
	// }
}
