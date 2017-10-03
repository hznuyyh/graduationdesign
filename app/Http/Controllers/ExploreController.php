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
        $explore_data  = $explore_model->getAllExplore();
        return view('document.explores',compact('explore_data'));
    }

    public function create()
    {

    }
}