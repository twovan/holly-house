<?php

namespace App\Http\Controllers\WeChat;

use App\Models\HairStyle as TM;
use Illuminate\Http\Request;

class HairStyleController extends BaseController
{
    public function index(Request $request){
        $type = $request->input('type');
        $map = [
            'status' => 1,
        ];
        if ($type > 0){
            $map['hair_type'] = $type;
        }
        $data = TM::where($map)->orderBy('id','desc')->get();
        return view('weChat.home.hairstyle_list', [
            'lists' => $data,
            'type' => $type,
            'title_name' => '发型精选',
        ]);
    }
}
