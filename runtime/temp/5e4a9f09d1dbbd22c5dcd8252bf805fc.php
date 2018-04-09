<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/materials_files_detail.html";i:1521773662;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>材料详情</title>

    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
    <link rel="stylesheet" href="/ding/css/case-details.css">
    <style>
        .head-border {
            padding-top: 0;
        }
    </style>
</head>

<body ontouchstart>

<div class="weui-tab">
    <div class="weui-tab__bd">
        <div id="tab4" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="weui-search-bar" id="searchBar">
                <form class="weui-search-bar__form" action="#">
                    <div class="weui-search-bar__box">
                        <i class="weui-icon-search"></i>
                        <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索"
                               required="">
                        <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
                    </div>
                    <label class="weui-search-bar__label" id="searchText"
                           style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
                        <i class="weui-icon-search"></i>
                        <span>搜索</span>
                    </label>
                </form>
                <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
            </div>

            <div class="case-menu">
                <select class="case-select">
                    <option value="0">全部</option>
                </select>
                <a class="case-new" href="/ding/manage_case/new_materials_files?id=<?php echo \think\Request::instance()->get('id'); ?>">新建</a>
            </div>
            <div id="container">

            </div>
        </div>
    </div>

</div>

</body>
<script src='https://g.alicdn.com/dingding/open-develop/1.6.9/dingtalk.js?spm=a219a.7629140.0.0.t4bEpv&file=dingtalk.js'></script>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script>
    var open_config = <?php echo $config; ?>;
    var user_img;
    var user_name;

    dd.config({
        agentId: '162790584', // 必填，微应用ID
        corpId: open_config.corpId,//必填，企业ID
        timeStamp: open_config.timeStamp, // 必填，生成签名的时间戳
        nonceStr: open_config.nonceStr, // 必填，生成签名的随机串
        signature: open_config.signature, // 必填，签名
        type:0,   //选填，0表示微应用的jsapi，1表示服务窗的jsapi，不填默认为0。该参数从dingtalk.js的0.8.3版本开始支持
        jsApiList : [ 'device.geolocation.get','biz.map.search','biz.user.get' ]
    });

    dd.ready(function(){

        dd.runtime.permission.requestAuthCode({
            corpId: "<?php echo CORPID; ?>",
            onSuccess: function(result) {
                code = result.code;
                console.log(code);
            },
            onFail : function(err) {}

        });

        dd.biz.user.get({
            onSuccess: function (info) {
                // logger.e('userGet success: ' + JSON.stringify(info));
                localStorage.user_img = info.avatar;
                localStorage.user_name = info.nickName;

            },
            onFail: function (err) {
                logger.e('userGet fail: ' + JSON.stringify(err));
            }
        });

    });
</script>
<script>

    $(function(){
        var case_id = <?php echo \think\Request::instance()->get('id'); ?>;
        user_img = localStorage.user_img;
        user_name = localStorage.user_name;

        $.ajax({
            type: 'GET',
            url: '/ding/api/materials_files_detail?case_id='+fm_id,
            dataType: 'json',
            beforeSend: function () {

            },
            success:function (result) {

                // let data = result.data;
                console.log(result);

                // for(let x in data){

                    // console.log(data)
                    // console.log(data[x].image_url);

            },
            error:function () {

            }
        })
    })
</script>
</html>
