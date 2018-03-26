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

    public function addUserClass($user_id,$class_id)
    {
        return DB::table("user_class")->insert([
            ['user_id' => $user_id,'class_id' => $class_id,'class_progress'=>1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),]
        ]);
    }

    public function updateUserClass($user_id,$class_id,$class_progress) {
        return DB::table("user_class")->where('user_id',$user_id)->where('class_id',$class_id)->update(['class_progress' => $class_progress,'updated_at' => date('Y-m-d H:i:s'),]);
    }

    public function getUserClassInfo($user_id)
    {
        return DB::table("user_class")->join('class','class.id','=','user_class.class_id')->where("user_id",'=',$user_id)->get();

    }

    public function getCountUserClass($class_id)
    {
        return DB::table("user_class")->where('class_id','=',$class_id)->count();
    }

    public function getUserClassProgress($user_id,$class_id)
    {
        return DB::table("user_class")->where('class_id','=',$class_id)->where('user_id','=',$user_id)->first();
    }
}