<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/4/2
 * Time: 下午7:29
 */

namespace App\Model\UserModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserMessageModel extends Model
{
    /**
     * @param $insert_data
     * @return mixed
     * 新增一条私信
     */
    public function insertMessage($insert_data)
    {
        return DB::table('user_message')->insert($insert_data);
    }

    /**
     * @param $user_id
     * 获取某用户所有的私信
     */
    public function findMessage($user_id)
    {
        return DB::table('user_message')->where('from_user_id',$user_id)->orWhere('to_user_id',$user_id)->get();
    }

    /**
     * @param $user_id
     * @param $target_user_id
     * 获取指定两个用户的聊天记录
     */
    public function findTwoUserMessage($user_id,$target_user_id)
    {
        $data_1 = DB::table('user_message')->where('from_user_id',$target_user_id)->where('to_user_id',$user_id)->get()->toArray();
        $data_2 = DB::table('user_message')->where('to_user_id',$target_user_id)->where('from_user_id',$user_id)->get()->toArray();
        foreach ($data_2 as $d) {
            array_push($data_1,$d);
        }
        rsort($data_1);
        return $data_1;
    }
}