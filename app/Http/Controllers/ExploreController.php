<?php

/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/10/3
 * Time: 下午8:30
 */
namespace App\Http\Controllers;
use App\Model\Explore;

class ExploreController extends Controller
{
    public function index()
    {
        $explore_model = new Explore();
        $explore_data['explore'] = $explore_model->getAllExplore();
        $explore_data['goods']   = $explore_model->getTheMostGoodExplore();
        return view('document.explores',compact('explore_data'));
    }

    public function create()
    {
        return view('document.explores_create');
    }

    public function exploreInfo($explore_id)
    {
        $data = Explore::find($explore_id);
        return view('document.explores_alone',compact('data'));
    }
}