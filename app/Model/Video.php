<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class Video extends Model
{
    //
    protected $table = 'video';
    protected $fillable =[
        'name','content','body'
    ];
    public function insert($data)
    {
        return DB::table('video')->insertGetId($data);
    }

    public function find()
    {
        return DB::table('video')->paginate(12);
    }
}
