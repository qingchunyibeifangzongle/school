<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
    object {outline:none;}</style>

<title>校园二货招聘网页</title>
<meta name="description" content="校园二货招聘网页">
<meta name="keywords" content="校园二货招聘网页">
    <script type="text/javascript" src="./Scripts/ganji_sta.php"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/base.aafb2bc1791840d2768b_2.js"></script>
    <script type="text/javascript" src="js/index.366d681c7662a316cf81_3.js"></script>

</head>
<body class="jz-list">
     <div class="header">
        <div class="hd-top clearfix">
            <img src="images/logo.jpg" class='logo' alt="校园直卖网"  style='width:256px;height:78px;'>
                <div class="c2city">
                    <a href="javascript:;" class="choose-city" >  
                        <span>学校
                            <i>&nbsp;</i>
                        </span>  
                     </a> 
                    <i class="maskline"></i>
                    <!-- 加载所有学校信息 -->
                    <div class="city-box" id="city-box" >
                        <div class="all-city">
                            <dl>
                               <dt>学校名称</dt>
                               <dd>
                               @foreach ($school as $key => $value)
                                   <a href='{{URL("frontend/work")}}?school_id={{$value['school_id']}}' >{{$value['school_name']}}</a>
                               @endforeach
                               </dd>
                            </dl>
                        <p class="more-city">更多城市正在加紧筹备，敬请期待。</p>
                        </div>
                    </div>
                <!-- 加载所有学校信息结束 -->
                </div>
            
            <div class="uc">
                    <?php if(!isset($user_name)){?>
                                       <a class="" href="login">
                                       登录
                                   <?php }else{ ?>
                                       <a href="loginout" class="">
                                       <?php echo $user_name['user_nickname']?>
                                      退出</a>
                                   <?php }?>
                    <div class="app-guide">
                        <div class="guide-ewm">
                            <img src="picture/weixin.png" alt="关注公共号">
                        </div>
                        <div class="guide-txt">
                            <p class="guide-txt-1">下载APP使用更多功能</p>
                            <p class="guide-txt-2">收藏查看-更方便</p>
                            <p class="guide-txt-2">降价提醒-更及时</p>
                            <p class="guide-txt-2">账户管理-更智能</p>
                            <p class="guide-txt-2">新车上架-更实时</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="hot-phone" >
                <i></i>
                <!--电话判断，当页面处于校园金融则显示校园金融电话  -->
                <span><?php echo config('webconfig.tel'); ?></span>
            </div>
        </div>

        <!-- menu s-->
       <div class="nav" style="margin-top:0px; width:100%;margin-left:0px;">
            <div class="w">

                <a class="fr app-web" baidu_alog="pc_index_top_tab&click&pc_index_top_tab_appdownload_c"
                   target="_blank" href="/zq_app/" data-gzlog="tracking_type=click&eventid=0010190000000012" title="校园直卖网APP">关注公众号
                    <div class="app-guide">
                        <div class="guide-ewm">
                            <img src="picture/weixin.png" alt="关注公共号">
                        </div>
                        <div class="guide-txt">
                            <p class="guide-txt-1">下载APP使用更多功能</p>
                            <p class="guide-txt-2">收藏查看-更方便</p>
                            <p class="guide-txt-2">降价提醒-更及时</p>
                            <p class="guide-txt-2">账户管理-更智能</p>
                            <p class="guide-txt-2">新车上架-更实时</p>
                        </div>
                    </div>
                </a>
                <!-- <a class="fr " baidu_alog="pc_index_top_tab&click&pc_index_top_tab_carfina_c"
                       href="https://jr.guazi.com/bj/"  data-gzlog="tracking_type=click&eventid=0010000000000011" title="分期付款">分期乐</a> -->
                                <a class="fl" href="{{URL('frontend/index')}}" title="校园">首页</a>
                <!-- 循环导航开始 -->
                  @foreach ($nav as $key => $value)
                    <a class="fl "  href='{{URL("$value[url]")}}' >
                        <?php echo $value['name']; ?>
                    </a>
                 @endforeach
                <!-- 循环导航结束 --> 
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".choose-city").hover(function(){
            $(".city-box").show();
        });

        $("#city-box").mouseleave(function(){
            $("#city-box").hide();
        });
    </script>
  
    <div class="filterBar w mt10" style="margin-top:70px;">
        <div class="chkFilter"></div>
        <div>
            <a href="javascript:;"style="color:red;align-text:center" > <h2>建议同学们注意安全，学校以外的禁止工作</h2></a>
        </div>
    </div>
    <div class="filterBar w mt10"  style="margin-top:20px;">
        <div class="chkFilter"></div>
        <div class="sortFilter">
            <a href="{{URL('frontend/information')}}" class="cur"><h3>发布信息</h3></a>
            <a href="{{URL('frontend/selectInformation')}}"><h3>查看回复</h3></a>
            <a href="{{URL('frontend/guanli')}}"><h3>管理发布信息</h3></a>
        </div>
    </div>
   
        <div class="jzList-con w">
            @foreach($arr as $v)
            <div class="jzList-item clearfix">
            <div class="jzList-pic"><img src="{{$v['job_img']}}">
            </div>
                <div class="jzList-txt">
                    <div class="jzList-txt-t">
                        <h3>
                            <a target="_blank" href="#">
                            {{$v['job_name']}}
                            </a>
                        </h3>
                    </div>
                    <ul class="jzList-field clearfix">
                        <li><span>工作时间：</span> {{date("Y-m-d H:i:s"),strtotime($v['job_time'])}}</li>
                        <li><span>工作地点：</span>{{$v['school_name']}}</li>
                        <li><span>招聘人数：</span>{{$v['number']}}人</li>
                    </ul>
                </div>
                <div class="jzList-btn">
                        <a href='{{URL("frontend/sign/$v[job_id]")}}' class="apply_jz_class">报名参加</a>
                </div>
                <div class="jzList-salary">
                    <span class="money"><em>{{$v['job_salary']}}</em>元/天</span>
                    <span>{{$v['job_describe']}}</span>&nbsp;&nbsp;&nbsp;
                     <span class="money">联系人:<em>{{$v['user_nickname']}}</em></span>

                </div>
            </div>
        @endforeach
    <div class="w">
        <div class="pageBox" data-widget="app/ms_v2/common/list_page.js#pagination"><ul class="pageLink clearfix">{!! $arr->appends(['school_id'=>$school_id])->links() !!}</ul></div>    </div>
        </div>
</body>
</html>