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
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 私信首页
     */
    public function index()
    {
        $user_id = Auth::id();
        $user_message_model = new UserMessageModel();
        $user_message       = $user_message_model->findMessage($user_id);
        $message_data       = array();
        $default_message    = array();
        //私信列表
        foreach ($user_message as $message) {
            if ($message->to_user_id == $user_id) {
                $message_data[$message->from_user_id] = $message->message;
            } else {
                $message_data[$message->to_user_id] = $message->message;
            }
        }
        //默认聊天
        foreach ($message_data as $key => $value) {
            $default_message = $user_message_model->findTwoUserMessage($user_id,$key);
            break;
        }
        return view('user.user_info', [
                'message_data' => $message_data,
                'default_message' => $default_message,
            ]
        );
    }

    public function changeMessageUser(Request $request)
    {
        $data = $request->all();
        $target_user_id = $data['target_user_id'];
        $user_id        = Auth::id();
        $user_message_model = new UserMessageModel();
        $default_message = $user_message_model->findTwoUserMessage($user_id,$target_user_id);
        return json_encode([
            'code' => 0,
            'message' => 'success',
            'data' => $default_message
        ]);

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