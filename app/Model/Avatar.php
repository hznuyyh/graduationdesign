<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Avatar extends Model
{
    //
    protected $table = 'avatar';
    protected $fillable = [
        'user_id','url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function insert($data)
    {
        return DB::table('avatar')->insertGetId($data);
    }

    public static function getInfo($user_id)
    {
        return Avatar::where('user_id',$user_id)->first();
    }
}
