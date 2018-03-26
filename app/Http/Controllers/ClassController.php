<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/3/25
 * Time: 下午9:08
 */

namespace App\Http\Controllers;


use App\Model\UserModel\UserClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function classFollow(Request $request)
    {
        $data     = $request->all();
        $class_id = $data['class_id'];
        $user_id  = Auth::id();
        $user_class = new UserClassModel();
        $user_class_info = $user_class->getUserClassProgress($user_id,$class_id);
        if($user_class_info == null) {
            $user_class->addUserClass($user_id,$class_id);
        } else {
            $user_class->updateUserClass($user_id,$class_id,1);
        }
        $return_data = [
            'code' => 0,
            'message' => 'success',
        ];
        return json_encode($return_data);
    }

}