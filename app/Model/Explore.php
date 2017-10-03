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
}
