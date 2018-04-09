<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/index.html";i:1520834002;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />

    <title>案件管理</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-manage.css">
</head>

<body ontouchstart>
<div class="weui-search-bar" id="searchBar">
    <form class="weui-search-bar__form" action="#">
        <div class="weui-search-bar__box">
            <i class="weui-icon-search"></i>
            <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="">
            <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
        </div>
        <label class="weui-search-bar__label" id="searchText" style="transform-origin: 0px 0px 0px; opacity: 1; transform: scale(1, 1);">
            <i class="weui-icon-search"></i>
            <span>搜索</span>
        </label>
    </form>
    <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
</div>
<div class="case-menu">
    <select class="case-select">
        <option value="0">全部</option>
        <option value="1">民事案件</option>
        <option value="2">刑事案件</option>
        <option value="3">行政案件</option>
        <option value="4">仲裁案件</option>
        <option value="5">法律顾问</option>
        <option value="6">单项法律事务</option>

    </select>

    <a class="case-new" href="/ding/collect_case/index">新建</a>
    </a>
</div>
<div id="content">

</div>


</body>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>

<script>
    $(function () {
        FastClick.attach(document.body);



        function add(){
            $.ajax({
                type:'POST',
                url:'/ding/api/case_list',
                dataType:'json',
                beforeSend:function () {

                },
                success:function(result){


                    var x,obj;
                    obj = result.data;

                    for (x in obj ) {

                        var a = obj[x].id;
var is_true = obj[x].audit;
var str
if (is_true == 1){
    str = '已收案'
}else if (is_true == 2){
    str = '已拒绝'
}else {
    str = '未收案'
}
var b;
if(obj[x].type == '民事案件' || obj[x].type == '行政案件'){
    b = obj[x].reason;
}else{
    b = obj[x].crime;
    console.log(b,'222');
}

                        $('#content').append(
                        `<a href="/ding/manage_case/info_case?id=${a}" class="weui-cell_access weui-cell_link">
                            <div class="weui-panel">
                            <div class="weui-panel__bd">
                            <div class="weui-media-box weui-media-box_text">
                            <h4 class="weui-media-box__title">
                            <span class="case-manage-title"> ${obj[x].mandator}涉嫌${b}案</span>
                            <span class="case-child-title">${str}</span>
                            </h4>
                            <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">${obj[x].case_num}</li>
                        <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">${obj[x].type}</li>
                            </ul>
                            <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人：${obj[x].mandator}</li>

                            </ul>
                            <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">${obj[x].create_time}</li>
                            <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">${obj[x].user_ids}，承办</li>
                            </ul>
                            </div>
                            </div>
                            </div>
                            </a>`
                        );

                    }


                },
                complete:function () {

                },
                error:function (result) {
                    console.log(result.data);
                }
            })
        }

        add();
    });
</script>
<script>

</script>
</html>