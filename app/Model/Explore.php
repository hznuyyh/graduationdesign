<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Explore extends Model
{
    //
    protected $table = 'explore';
    protected $fillable =[
        'title','content','user_id'
    ];

    public function getAllExplore()
    {
        return Explore::latest('updated_at')->get();
    }

    public function getTheMostGoodExplore()
    {
        $timeThreeDayAgo = date('Y-m-d',strtotime('-3 day',time()));
        return Explore::where('created_at','>',$timeThreeDayAgo)->orderBy('goods_count','desc')->first();
    }
}
