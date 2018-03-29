<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/29
 * Time: 下午3:25
 */

namespace App\Model\UserModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserExploreCommentModel extends Model
{
    public function findUserExplore($user_id,$explore_id)
    {
        return DB::table('user_explore')->where('user_id',$user_id)
            ->where('explore_id',$explore_id)->first();
    }

    public function addUserExplore($data)
    {
        return DB::table('user_explore')->insert($data);
    }


}