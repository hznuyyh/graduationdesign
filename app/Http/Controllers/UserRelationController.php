<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/4/2
 * Time: 下午3:07
 */

namespace App\Http\Controllers;


use App\Model\UserModel\UserMessageModel;
use App\Model\UserModel\UserRelationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRelationController extends Controller
{
    public function index()
    {
        return view('user.user_info');
    }

    /**
     * 关注或取消关注某人
     * 根据现有状态进行
     */
    public function relationOther(Request $request)
    {
        $data = $request->all();
        $target_user_id = $data['target_user_id'];
        $user_id        = Auth::id();
        $user_relation_model = new UserRelationModel();
        $user_relation_data  = $user_relation_model->findRelation($user_id,$target_user_id);
        if(empty($user_relation_data)) {
            $insert_data = [
                'user_id'        => $user_id,
                'target_user_id' => $target_user_id,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s')
            ];
            $user_relation_model->addRelation($insert_data);
            return json_encode(['code' => 0,'message' => 'success','data' => [
                'is_relation' => 1
            ]]);
        } else {
            $user_relation_model->deleteRelation($user_id,$target_user_id);
            return json_encode(['code' => 0,'message' => 'success','data' => [
                'is_relation' => 0
            ]]);
        }
    }

    /**
     * 收发私信
     */
    public function receiveMessage(Request $request)
    {
        $data = $request->all();
        $from_user_id = Auth::id();
        $to_user_id   = $data['target_user_id'];
        $message      = $data['message'];
        $user_message_model = new UserMessageModel();
        $insert_data = [
            'from_user_id' => $from_user_id,
            'to_user_id'   => $to_user_id,
            'message'      => $message,
            'has_read'     => 0,
            'created_at'   => date('Y-m-d H:i:s'),
            'updated_at'   => date('Y-m-d H:i:s')

        ];
        $data = $user_message_model->insertMessage($insert_data);
        return json_encode(['code' => 0,'message' => 'success','data' => $data]);

    }


}