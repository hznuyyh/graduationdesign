<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/25
 * Time: 下午1:38
 */

namespace App\Model\ClassModel;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClassVideoModel extends Model
{
    protected $table = 'class_video';
    protected $fillable = [
        'class_id','video_id'
    ];
    public function getClassVideoByClassId($class_id)
    {
        return DB::table('class_video')
            ->join('video','video.id','=','class_video.video_id')
            ->where('class_id','=',$class_id)
            ->orderBy('video.updated_at','desc')
            ->paginate(12);
    }
}