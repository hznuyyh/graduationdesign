<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/29
 * Time: 下午3:35
 */

namespace App\Model\UserModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserExploreGoodModel extends Model
{
    public function addGoodToExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_good')->insert([
            'user_id'    => $user_id,
            'explore_id' => $explore_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function deleteGoodToExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_good')->where('user_id',$user_id)
            ->where('explore_id',$explore_id)->delete();
    }

    public function findGoodToExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_good')->where('user_id',$user_id)
            ->where('explore_id',$explore_id)->first();
    }

}