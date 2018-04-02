<?php

/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/10/3
 * Time: 下午8:30
 */
namespace App\Http\Controllers;
use App\Model\Explore;
use App\Model\UserModel\UserExploreCommentModel;
use App\Model\UserModel\UserExploreFollowModel;
use App\Model\UserModel\UserExploreGoodModel;
use App\Model\UserModel\UserRelationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示页
     */
    public function index()
    {
        $explore_model = new Explore();
        $explore_data['explore'] = $explore_model->getAllExplore();
        $explore_data['goods']   = $explore_model->getTheMostGoodExplore();
        return view('document.explores',compact('explore_data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 创建页
     */
    public function create()
    {
        return view('document.explores_create');
    }

    /**
     * @param $explore_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 单独搜索页
     */
    public function exploreInfo($explore_id)
    {
        $data = Explore::find($explore_id);
        $user_explore_good_model = new UserExploreFollowModel();
        $user_relation_model     = new UserRelationModel();
        $user_id = Auth::id();
        $user_explore   = $user_explore_good_model->findFollowToExplore($user_id,$explore_id);
        $target_user_id = $data['user_id'];
        $user_relation  = $user_relation_model->findRelation($user_id,$target_user_id);
        //用户关注性
        if(empty($user_explore)) {
            $is_follow = 0;
        } else {
            $is_follow = 1;
        }
        if(empty($user_relation)) {
            $is_relation = 0;
        } else{
            $is_relation = 1;
        }
        $data['is_follow']   = $is_follow;
        $data['is_relation'] = $is_relation;
        //用户评论
        $user_explore_comment_model = new UserExploreCommentModel();
        $user_explore_data          = $user_explore_comment_model->findExploreAllComment($explore_id);
        $data['user_explore']       = $user_explore_data;
        return view('document.explores_alone',compact('data'));
    }

    /**
     * @param Request $request
     * 问题存储
     */
    public function store(Request $request)
    {
        $data    = $request->all();
        $title   = $data['title'];
        $body    = $data['body'];
        $user_id = Auth::id();
        $insert_data = [
            'title'    => $title,
            'content'  => $body,
            'user_id'  => $user_id,
            'topic_id' => 1,
            'comments_count' => 0,
            'goods_count'    => 0,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s')
        ];
        $explore_model = new Explore();
        $explore_model->insertData($insert_data);
        return json_encode(['code' => 0,'message' => 'success','data' => '']);
    }

    /**
     * 对文章点赞
     */
    public function goodToExplore(Request $request)
    {
        $data    = $request->all();
        $explore_id = $data['explore_id'];
        $type       = $data['type'];
        $user_id    = Auth::id();
        $user_explore_good_model = new UserExploreGoodModel();
        $explore_model           = new Explore();
        //历史记录查询
        $user_explore = $user_explore_good_model->findGoodToExplore($user_id,$explore_id);
        $data = $explore_model->getExploreById($explore_id);
        //点赞
        if ($type) {
            if (empty($user_explore)) {
                $user_explore_good_model->addGoodToExplore($user_id,$explore_id);
                $explore_model->updateExplore(['id' => $explore_id],['goods_count' => $data->goods_count + 1]);
            }
        } else{
            //取消点赞
            if (!empty($user_explore)) {
                $user_explore_good_model->deleteGoodToExplore($user_id,$explore_id);
                $explore_model->updateExplore(['id' => $explore_id],['goods_count' => $data->goods_count - 1]);
            }
        }
        $data = $explore_model->getExploreById($explore_id);
        return json_encode(['code' => 0,'messages' => 'success','data'=>$data]);
    }

    /**
     * @param Request $request
     * @return string
     * 对文章进行关注
     */
    public function followToExplore(Request $request)
    {
        $data    = $request->all();
        $explore_id = $data['explore_id'];
        $user_id    = Auth::id();
        $user_explore_good_model = new UserExploreFollowModel();
        //历史记录查询
        $user_explore = $user_explore_good_model->findFollowToExplore($user_id,$explore_id);
        //关注
        if (empty($user_explore)) {
            $user_explore_good_model->addFollowToExplore($user_id,$explore_id);
            $return_data['is_follow'] = 1;
        } else {
            $user_explore_good_model->deleteFollowToExplore($user_id,$explore_id);
            $return_data['is_follow'] = 0;
        }
        return json_encode(['code' => 0,'messages' => 'success','data' => $return_data]);
    }

    /**
     * @param Request $request
     * 增加一条评论
     */
    public function addCommentToExplore(Request $request)
    {
        $data       = $request->all();
        $explore_id      = $data['explore_id'];
        $explore_comment = $data['explore_content'];
        $user_id         = Auth::id();
        $explore_model              = new Explore();
        $user_explore_comment_model = new UserExploreCommentModel();
        $insert_data = [
            'user_id'    => $user_id,
            'explore_id' => $explore_id,
            'user_explore_content' => $explore_comment,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ];
        $explore_data = $explore_model->getExploreById($explore_id);
        //新增评论
        $user_explore_comment_model->addUserExplore($insert_data);
        //更新评论数
        $explore_model->updateExplore(['id' => $explore_id],['comments_count' => $explore_data->comments_count + 1]);
        return json_encode(['code' => 0,'messages' => 'success','data' => '']);


    }


}