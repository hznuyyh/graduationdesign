<?php

/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/10/3
 * Time: 下午8:30
 */
namespace App\Http\Controllers;
use App\Model\Explore;
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
        return view('document.explores_alone',compact('data'));
    }

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
        return redirect('/explore/index');

    }

}