<?php
/**
 * Created by PhpStorm.
 * User: yeyuhang
 * Date: 2017/10/14
 * Time: 下午2:18
 */

namespace App\Http\Controllers;


use App\Model\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{

    public function avatar($user_id)
    {
        $avatar = Avatar::find($user_id);
        return $avatar['url'];
    }

    public function create()
    {
        return view('user.avatar.create_avatar');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $insert_data = [
            'user_id' => $data['user_id'],
            'url'     => $data['url']
        ];
        $avatar = new Avatar();
        $avatar->insert($insert_data);
    }

}