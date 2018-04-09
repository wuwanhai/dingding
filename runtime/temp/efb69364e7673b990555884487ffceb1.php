<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/index/index.html";i:1519370510;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>葆菡律所2</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/index.css">
</head>

<body>

<div id='banner'>
</div>
<div id="announcement">
    <p>
        <img src="/ding/images/gg.png" class="gg-icon" alt="" >
        <span class="gg-color">2018年是一个丰收的年份</span>
        <span class="ant-more">
        <a href="#" style="color:#38ADFF">更多</a>
      </span>
    </p>
</div>
<div id="title-discription">常用应用</div>

<div class="weui-grids">
    <!--<a href="collect_case/index" class="weui-grid js_grid">-->
        <!--<div class="weui-grid__icon">-->
            <!--<img src="/ding/images/icon1.png" alt="">-->
        <!--</div>-->
        <!--<p class="weui-grid__label">-->
            <!--收案填报-->
        <!--</p>-->
    <!--</a>-->
    <!--<a href="manage_case/index" class="weui-grid js_grid">-->
        <!--<div class="weui-grid__icon">-->
            <!--<img src="/ding/images/icon2.png" alt="">-->
        <!--</div>-->
        <!--<p class="weui-grid__label">-->
            <!--案件管理-->
        <!--</p>-->
    <!--</a>-->

    <!--<a href="chapter_case/index" class="weui-grid js_grid">-->
        <!--<div class="weui-grid__icon">-->
            <!--<img src="/ding/images/icon3.png" alt="">-->
        <!--</div>-->
        <!--<p class="weui-grid__label">-->
            <!--办案用章-->
        <!--</p>-->
    <!--</a>-->
    <!--<a href="individual_account/index" class="weui-grid js_grid">-->
        <!--<div class="weui-grid__icon">-->
            <!--<img src="/ding/images/icon4.png" alt="">-->
        <!--</div>-->
        <!--<p class="weui-grid__label">-->
            <!--账户助手-->
        <!--</p>-->
    <!--</a>-->
    <!--<a href="notice/index" class="weui-grid js_grid">-->
        <!--<div class="weui-grid__icon">-->
            <!--<img src="/ding/images/icon5.png" alt="">-->
        <!--</div>-->
        <!--<p class="weui-grid__label">-->
            <!--律所公告-->
        <!--</p>-->
    <!--</a>-->
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$vo): ?>
    <a href="<?php echo $vo['ompLink']; ?>" class="weui-grid js_grid">
        <div class="weui-grid__icon">
            <img src="<?php echo $vo['appIcon']; ?>" alt="<?php echo $vo['appDesc']; ?>">
        </div>
        <p class="weui-grid__label">
            <?php echo $vo['name']; ?>
        </p>
    </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>

</body>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script src="https://g.alicdn.com/dingding/open-develop/1.6.9/dingtalk.js"></script>
<script>
    dd.ready(function() {
        dd.runtime.permission.requestAuthCode({
            corpId: <?php echo CORPID; ?>,
            onSuccess: function(result) {
                alert(result);
                console.log(result);
                /*{
                 code: 'hYLK98jkf0m' //string authCode
                 }*/
            },
            onFail : function(err) {}

        });
    });
</script>
</html>