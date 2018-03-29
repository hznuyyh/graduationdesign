<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Explore extends Model
{
    //
    protected $table = 'explore';
    protected $fillable =[
        'title','content','user_id','comments_count','goods_count'
    ];

    /**
     * @return mixed
     * 获取所有文章
     */
    public function getAllExplore()
    {
        return Explore::latest('updated_at')->get();
    }

    /**
     * @return mixed
     * 获取热点文章
     */
    public function getTheMostGoodExplore()
    {
        $timeThreeDayAgo = date('Y-m-d',strtotime('-3 day',time()));
        return Explore::where('created_at','>',$timeThreeDayAgo)->orderBy('goods_count','desc')->first();
    }

    /**
     * @param $data
     * @return mixed
     * 新增发布文章
     */
    public function insertData($data)
    {
        return DB::table('explore')->insert($data);
    }

    /**
     * 更新文章
     */
    public function updateExplore($condition,$update)
    {
        return DB::table('explore')->where($condition)->update($update);
    }

    /**
     * 获取单个文章信息
     */
    public function getExploreById($explore_id)
    {
        return DB::table('explore')->where('id' , $explore_id)->first();
    }




}
