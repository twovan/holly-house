<?php

namespace App\Http\Controllers\WeChat;

use App\Models\Evaluate;
use App\Models\Service;
use App\Models\Store as TM;
use App\Models\User;
use App\Models\WorkLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Factory;
use Carbon\Carbon;

class StoreController extends BaseController
{


    public function index(){
        $map = [
            'status' => 1,
        ];
        $data = TM::where($map)->orderBy('id','desc')->get();
        return view('weChat.home.index', [
            'lists' => $data,
            'title_name' => '首页',
        ]);
    }

    public function info($id,Request $request){
        $user = $request->getUser;
        $work_hard = $request->input('work_hard');
        if ($user){
            $get_user = User::find($user['id']);
            if ($get_user['type'] == 1){
                // 理发师添加上班记录
                // 已经记录过
                $work_map2 = [
                    'barber_id' => $user['id'],
                    'store_id' => $id,
                ];
                $get_work2_ok = false;
                $get_work2 = WorkLog::where($work_map2)->orderBy('updated_at','asc')->first();
                if ($get_work2){
                    if ($get_work2->status < 2){
                        $get_work2_ok = true;
                    }
                }

                // 理发师已经打过卡
                $work_map3 = [
                    'barber_id' => $user['id'],
                    'status' => 1,
                ];

                // 理发师打卡了但没扫码有记录
                $work_map4 = [
                    'barber_id' => $user['id'],
                    'status' => 0,
                ];

                $get_work3 = WorkLog::where($work_map3)->orderBy('updated_at','asc')->first();
                $get_work4 = WorkLog::where($work_map4)->orderBy('updated_at','asc')->first();

                if ($get_work2_ok === false && empty($get_work3) && $work_hard == 1 && $get_work4 == null){
                    $work_data = [
                        'barber_id' => $user['id'],
                        'store_id' => $id,
                        'status' => 0,
                    ];
                    WorkLog::create($work_data);
                }
                elseif ($get_work2_ok === false && empty($get_work3) && $work_hard == 1 && $get_work4 != null) {
                     //如果已存在就更新时间 2018/8/11
                    WorkLog::where(['barber_id' => $user['id'] ,'status'=>0])->update(['updated_at' => Carbon::now(), 'store_id'=> $id]);
                }
                // 改需求：理发师扫码跳个人中心
                if ($work_hard == 1){
                    return redirect('wechat/user');
                }
            }
            $map = [
                'status' => 1,
                'id' => $id,
            ];
            $data = TM::where($map)->first();
            if ($data){
                $services = Service::where(['store_id' => $id, 'status' => 1])->orderBy('id','desc')->get();
                $evaluates = Evaluate::where(['store_id' => $id, 'status' => 1])->orderBy('id','desc')->limit(5)->get();
                return view('weChat.home.store_info', [
                    'list' => $data,
                    'service_lists' => $services,
                    'evaluate_lists' => $evaluates,
                    'title_name' => '门店详情',
                    'get_user' => $get_user,
                ]);
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function evaluate_list($id,Request $request){
        if ($id){
            $evaluates = Evaluate::where(['store_id' => $id, 'status' => 1])->orderBy('id','desc')->get();
                return view('weChat.home.evaluate_list', [
                    'evaluate_lists' => $evaluates,
                    'title_name' => '评价列表',
                ]);
        }else{
            abort(404);
        }
    }


}
