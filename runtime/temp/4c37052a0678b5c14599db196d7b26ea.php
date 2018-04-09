<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/woke_note.html";i:1521604752;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>工作手记</title>

    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
    <link rel="stylesheet" href="/ding/css/case-details.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                <a class="case-new" href="/ding/manage_case/new_woke_note?id=<?php echo \think\Request::instance()->get('id'); ?>">新建</a>
            </div>
            <div id="container">

            </div>
            <div class="margin-bottom"></div>
        </div>
    </div>

    <div class="weui-tabbar">
        <a href="/ding/manage_case/info_case?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/gc.png" alt="">
            </div>
            <p class="weui-tabbar__label">案件概况</p>
        </a>
        <a href="/ding/manage_case/materials_files?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/cl.png" alt="">
            </div>
            <p class="weui-tabbar__label">案卷材料</p>
        </a>
        <a href="/ding/manage_case/course_case?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/jc.png" alt="">
            </div>
            <p class="weui-tabbar__label">案件进程</p>
        </a>
        <a href="/ding/manage_case/woke_note?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item weui-bar__item--on">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/Group 45.png" alt="">
            </div>
            <p class="weui-tabbar__label">工作手记</p>
        </a>
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

        user_img = localStorage.user_img;
        user_name = localStorage.user_name;

        $.ajax({
            type: 'POST',
            url: '/ding/api/woke_note_list',
            dataType: 'json',
            beforeSend: function () {

            },
            success:function (result) {

                let data = result.data;
                console.log(data);

                for(let x in data){

                    console.log(data[x])
                    // console.log(data[x].image_url);
                    var ctn = `<div class="weui-cell_access weui-cell_link">
    <div class="weui-panel">
        <div class="weui-panel__bd">
            <div class="weui-media-box weui-media-box_text weui-flex">
                <img src="${user_img}" class="head-portrait">
                <div class="work-record">
                    <div class="work-record-name">${user_name}</div>
                    <div class="work-record-address">
                        <span>${data[x].address}</span>
                        <span class="work-record-time">${data[x].create_time}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="head-border">
            <h4>${data[x].title}</h4>
            <p>${data[x].content}</p>
        </div>
        <div class="work-record-image">

        </div>
    </div>
</div>

<div class="margin-gray"></div>`

                    $('#container').append(ctn);

                    for (let h in data[x].image_url) {

                        let img = `<img class="work-record-images" src='${data[x].image_url[h]}'>`
                        $('.work-record-image').append(img);
                    }
                }

            },
            error:function () {

            }
        })
    })
</script>
</html>