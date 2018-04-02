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
    /**
     * @param $user_id
     * @param $explore_id
     * @return mixed
     * 获取用户评论
     */
    public function findUserExplore($user_id,$explore_id)
    {
        return DB::table('user_explore_comment')->where('user_id',$user_id)
            ->where('explore_id',$explore_id)->first();
    }

    /**
     * @param $data
     * @return mixed
     * 新增用户评论
     */
    public function addUserExplore($data)
    {
        return DB::table('user_explore_comment')->insert($data);
    }

    /**
     * 查询所有评论
     */
    public function findExploreAllComment($explore_id)
    {
        return DB::table('user_explore_comment')->where('explore_id',$explore_id)->orderBy('updated_at','desc')->get();
    }


}