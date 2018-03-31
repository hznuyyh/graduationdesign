<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/30
 * Time: 上午10:27
 */

namespace App\Model\UserModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserExploreFollowModel extends Model
{
    public function addFollowToExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_follow')->insert([
            'user_id'    => $user_id,
            'explore_id' => $explore_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function deleteFollowToExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_follow')->where('user_id',$user_id)
            ->where('explore_id',$explore_id)->delete();
    }

    public function findFollowToExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_follow')->where('user_id',$user_id)
            ->where('explore_id',$explore_id)->first();
    }
}