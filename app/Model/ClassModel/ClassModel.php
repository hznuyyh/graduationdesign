<?php

/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/18
 * Time: 下午4:29
 */
namespace App\Model\ClassModel;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
//
    protected $table = 'class';
    protected $fillable =[
        'class_name','class_description','class_img_src','class_teacher_id','class_teacher_name'
    ];
}