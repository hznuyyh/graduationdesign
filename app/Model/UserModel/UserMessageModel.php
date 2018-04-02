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
    public function insertMessage($insert_data)
    {
        return DB::table('user_message')->insert($insert_data);
    }

}