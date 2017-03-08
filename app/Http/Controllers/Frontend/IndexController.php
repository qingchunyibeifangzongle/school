<?php
	namespace App\Http\Controllers\Frontend;                  //使用命名空间申明是本类
	use App\Model\Frontend\Index\Index;
	use Illuminate\Http\Request;
	use App\Http\Requests;                                    // 引用请求插件类
	use App\Http\Controllers\Controller;                      // 引用控制器类

	class IndexController extends Controller
	{
	
		   /**
			*-----------------------------------------------
			* 接受QQ登录信息
			*-----------------------------------------------
			* @param
			* @return
			*/ 
			public function xinxi()
			{
				 require_once app_path().'/class/Connect2.1/API/qqConnectAPI.php';
				 $oauth = new \oauth();   
					 //回调,获取token
					 $accesstoken = $oauth->qq_callback();
					 //获取openid  
				 $openid = $oauth->get_openid();
					 $oauth = new \QC($accesstoken,$openid); 
					 //获取QQ用户信息;
				 $user = $oauth->get_user_info();
				 $qq = new Login();
				 $user['code'] = $qq->qqLogin($openid);
				 //把用户信息存session里
				 session(['qq'=>$user]);
				 return redirect("frontend/binding");
			}

		  /**
			*-----------------------------------------------
			*判断跳转页面，绑定账号
			*-----------------------------------------------
			* @param
			* @return
			*/
			public function binding()
			{
			$user = session("qq"); 
				if ($user['code']==1) {
					//跳绑定账号页面
					return view('frontend.login.qqregister');
				}else{
					//跳主页面
					return redirect("frontend/index");
							
				}
			 require_once app_path().'/class/Connect2.1/API/qqConnectAPI.php';
			 $oauth = new \oauth();   
				 //回调,获取token
				 $accesstoken = $oauth->qq_callback();
				 //获取openid  
			 $openid = $oauth->get_openid();
				 $oauth = new \QC($accesstoken,$openid); 
				 //获取QQ用户信息;
			 $user = $oauth->get_user_info();
			 $qq = new Login();
			 $user['code'] = $qq->qqLogin($openid);
			 //把用户信息存session里
			 session(['qq'=>$user]);
			 return redirect("frontend/binding");
		}

		

		/**
		 *-----------------------------------------------
		 * 前台首页
		 *-----------------------------------------------
		 * @param
		 * @return
		 */

		public function index(Request $request)
		{
			$model = new Index();
			$goodsList = $model->getGoodsList();
//			var_dump($goodsList);die;
			foreach($goodsList as $k => $v){
				$goodsList[$k]['goods_img'] =explode(',',$v['goods_img']);
			}

//			        $sql['goods_img'] = substr($sql['goods_img'],0,strpos($sql['goods_img'],','));
//			var_dump($goodsList);die;
			return $this->top().view('frontend.index',['goodsList' => $goodsList]);

		}//首页结束

	}//类结束


?>