<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2018/4/2
 * Time: 下午3:07
 */

namespace App\Http\Controllers;


use App\Model\Avatar;
use App\Model\UserModel\UserMessageModel;
use App\Model\UserModel\UserRelationModel;
use App\User;
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
        $user_message_info  = $user_message_model->findMessage($user_id);
        $message_data       = array();
        //私信列表
        foreach ($user_message_info as $message) {
            if ($message->to_user_id == $user_id) {
                $message_data[$message->from_user_id] = array();
            } else {
                $message_data[$message->to_user_id]  = array();
            }
        }
        //默认聊天
        foreach ($message_data as $key => $value) {
            $default_message = $user_message_model->findTwoUserMessage($user_id,$key);
            array_push($message_data[$key],$default_message);
        }
        return view('user.user_info', ['message_data' => $message_data,]);
    }

    /**
     * @param Request $request
     * @return string
     * 获取指定的用户聊天内容
     */
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
     *获取登录用户的私信列表
     */
    public function getMessageList()
    {
        $user_id = Auth::id();
        $message_data_list  = array();
        $user_info_data     = array();
        $user_message_model = new UserMessageModel();
        $user_message_list  = $user_message_model->findMessage($user_id);
        //筛选
        foreach ($user_message_list as $message) {
            if ($message->to_user_id == $user_id) {
                $message_data_list[$message->from_user_id] = $message->message;
            } else {
                $message_data_list[$message->to_user_id] = $message->message;
            }
        }
        //拼装用户数据
        $user_model = new User();
        $avatar_model = new Avatar();
        foreach ($message_data_list as $key => $value) {
            $user_info   = $user_model->getName($key);
            $avatar_info = $avatar_model->getInfo($key);
            $user_info->avatar = empty($avatar_info->url) ? '/image/avatar/default_avatar.jpeg' : $avatar_info->url;
            array_push($user_info_data,$user_info);
        }
        return json_encode([
            'code'    => 0,
            'message' => 'success',
            'data'    => $user_info_data
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

    private function object_to_array($obj) {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)$this->object_to_array($v);
            }
        }

        return $obj;
    }


}