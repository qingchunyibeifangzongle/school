<html>
<head _tracker='{"pagetype":"index"}'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<title>【校园】二货网</title>
</head>
<link rel="stylesheet" href="{{ URL::asset('frontend/daigo/init.css')}}">
<link rel="stylesheet" href="{{ URL::asset('frontend/daigo/release.css')}}">

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<!-- 加载js/css-->
<script type="text/javascript" src="{{URL::asset('frontend/js/base.aafb2bc1791840d2768b_2.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('frontend/js/detail.a8cc07cb1ba1b3bd63ab.js')}}"></script>
<script type="text/javascript" src="js/index.366d681c7662a316cf81_3.js"></script>
<script src="{{ URL::asset('frontend/daigo/hm.js')}}"></script>
<script type="text/javascript" src="js/base.aafb2bc1791840d2768b_2.js"></script>


<body>

    <div class="header">
        <div class="hd-top clearfix">
            <img src="images/logo.jpg" class='logo' alt="校园直卖网">
                <div class="c2city">
                    <a href="javascript:;" class="choose-city" >
                        <span><?php echo $city["region_name"]; ?>
                            <i>&nbsp;</i>
                        </span>
                     </a>
                    <i class="maskline"></i>
                    <!-- 加载所有学校信息 -->
                    <div class="city-box" id="city-box" >
                        <div class="all-city">
                            <dl>
                               <!-- <dt>A</dt> -->
                               <dd>
                               <?php foreach ($school as $key => $value): ?>
                                   <a  href="<?php echo URL::asset('frontend/index')."?school_id=".$value['school_id']; ?>" title="点击查看当前学校下所有的商品"><?php echo $value['school_name']; ?> </a>
                               <?php endforeach ?>
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

            <!--头部搜索框 -->
            <div class="search-box">
                <div class="suggestion_widget" data-default-count="0" style='width:330px;'>
                    <form action="searchshow" id="login_form">
                            <input type="text" class="search-input js_search_input_index" style='float:left;' name="search" style='width:280px;height:30px; border:1px solid #22ac38;' placeholder="搜索您想要的宝贝"  data-role="keywordInput" name="keyword"  >
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                   </form>
                    <button class="search-btn search"  style=' float:left;' >搜索</button>
                    <input type="hidden" value="bj" name="hiddenCity">
                </div>
            </div>
        </div>

        <!-- menu s-->
       <div class="nav">
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
                <a class="fr " baidu_alog="pc_index_top_tab&click&pc_index_top_tab_carfina_c"
                       href="https://jr.guazi.com/bj/"  data-gzlog="tracking_type=click&eventid=0010000000000011" title="分期付款">分期乐</a>
                                <a class="fl active" baidu_alog="pc_index_top_tab&click&pc_index_top_tab_index_c"
                   href="/bj/"  data-gzlog="tracking_type=click&eventid=0010000000000007" title="校园">首页</a>
                <!-- 循环导航开始 -->
                <?php foreach ($nav as $key => $value): ?>
                    <a class="fl "  href="<?php echo URL::asset($value['url']); ?>"  title="北京个人"  >
                        <?php echo $value['name']; ?>
                    </a>
                <?php endforeach ?>
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


        $(document).on('keyup','.search-input',function(){
            var searchWhere = $(this).val();
            var chinese  = /^[\u4e00-\u9fa5]{1,20}|\w+/ ;
            if (!chinese.test(searchWhere)){
                login = 1;
                alert('亲,请填写中文或字母数字下划线');return false;
            }
        })

        $(document).on('click','.search',function(){
            login = 0;
            var searchWhere = $('.search-input').val();
            $('.search-input').keyup();
            if (login == 0) {
                $('#login_form').submit();
            }

        })

        
    </script> 