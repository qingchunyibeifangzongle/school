<?php

namespace App\Http\Controllers\Frontend\Work;                     //使用命名空间申明是本类


use Illuminate\Http\Request;
use App\Http\Requests;                                    // 引用请求插件类
use App\Http\Controllers\Controller;                      // 引用控制器类
use DB;
use Illuminate\Support\Facades\Input;
use App\Model\Frontend\Work;
use Redirect;

class WorkController extends Controller
{
    /**
     * 招聘首页
     */
    public function work(Request $request)
    {
        $arr = Work::work();
        return view("frontend.work.work",['arr'=>$arr]);
    }

    /**
     * 发布招聘
     */
    public function information()
    {
        return view("frontend.work.information");
    }
    /**
     * 发布招聘
     */
    public function postInformation(Request $request)
    {
        $arr = $request->all();
        $arr['user_id'] = $request->session()->get("user_id");
        $res = Work::postInformation($arr);
        print_r($res);
    }

    /**
     * 报名
     */
    public function sign($job_id ,Request $request)
    {
        $user_id = $request->session()->get("user_id");
        $res = Work::selectSign($user_id,$job_id);
        if($res == 1){
            return view("frontend.work.sign",['job_id'=>$job_id]);
        }else{
            return view("frontend.work.500",['error'=>'已报名，禁止重复','url'=>"../work",'color'=>'red']);
        }

    }

    /**
     * 报名
     */
    public function postSign(Request $request)
    {
        $arr = $request->all();
        $arr['user_id'] = $request->session()->get("user_id");
        $res = Work::postSign($arr);
        if($res){
            return view("frontend.work.500",['error'=>'报名成功','url'=>'work','color'=>'green']);

        }else{
            return view("frontend.work.500",['error'=>'报名失败','url'=>"work",'color'=>'red']);
        }
    }

    /**
     * 发布管理
     */
    public function guanli(Request $request)
    {
        $user_id = $request->session()->get("user_id");
        $res = Work::guanli($user_id);
        return view("frontend.work.guanli",['res'=>$res]);
    }

    /**
     * 删除发布信息
     */
    public function delGuanli(Request $request)
    {
        $job_id = $request->input("id");
        $res = DB::table('job')->where('job_id',$job_id)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    /**
     * 查看回复的信息
     */
    public function selectInformation(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $arr = Work::selectInformation($user_id);
        return view('frontend.work.selectInformation',['arr'=>$arr]);     
    }
}