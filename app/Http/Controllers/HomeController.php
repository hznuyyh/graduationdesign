<?php

namespace App\Http\Controllers;

use App\Model\UserModel\UserClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $user_class_model = new UserClassModel();
        $user_class_info  = $user_class_model->getUserClassInfo($user_id);
        dump($user_class_info);
        return view('home',['user_class' => $user_class_info]);
    }
}
