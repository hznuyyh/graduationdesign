<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/18
 * Time: 下午4:30
 */

namespace App\Model\UserModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserClassModel extends Model
{
    //
    protected $table = 'user_class';
    protected $fillable =[
        'user_id','class_id','class_progress'
    ];

    public function getUserClassInfo($user_id)
    {
        return DB::table("user_class")->join('class','class.id','=','user_class.class_id')->where("user_id",'=',$user_id)->get();

    }
}