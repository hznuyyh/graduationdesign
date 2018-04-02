<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/4/2
 * Time: 下午3:16
 */

namespace App\Model\UserModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserRelationModel extends Model
{
    public function addRelation($insert_data)
    {
        return DB::table('user_relation')->insert($insert_data);
    }

    public function deleteRelation($user_id,$target_user_id)
    {
        return DB::table('user_relation')->where('user_id',$user_id)->where('target_user_id',$target_user_id)->delete();
    }

    public function findRelation($user_id,$target_user_id)
    {
        return DB::table('user_relation')->where('user_id',$user_id)->where('target_user_id',$target_user_id)->first();
    }
}