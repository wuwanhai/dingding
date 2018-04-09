<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/expend_case/index.html";i:1521077266;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />

    <title>账号助手</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/account.css">
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
        <option value="1">已结清</option>
        <option value="2">未结清</option>
    </select>
    <a class="case-new" href="new-case-spend.html">新建</a>
</div>
<div class="weui-cell weui-cell_swiped">
    <div class="weui-cell__bd">
        <a href="case-spend-details.html">
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title">大连万达集团资产纠纷</h4>
                <ul class="weui-media-box__info">
                    <li class="weui-media-box__info__meta">承办人：</li>
                    <li class="weui-media-box__info__meta">孔明</li>
                    <div class="weui-cell__ft color-red">未结清</div>
                </ul>
            </div>
        </a>
    </div>
    <div class="weui-cell__ft">
        <a class="weui-swiped-btn weui-swiped-btn_warn delete-swipeout" href="javascript:">删除</a>
    </div>
</div>

<div class="weui-cell weui-cell_swiped">
    <div class="weui-cell__bd">

        <div class="weui-media-box weui-media-box_text">
            <h4 class="weui-media-box__title">大连万达集团资产纠纷</h4>
            <ul class="weui-media-box__info">
                <li class="weui-media-box__info__meta">承办人：</li>
                <li class="weui-media-box__info__meta">孔明</li>
                <div class="weui-cell__ft">已结清</div>
            </ul>
        </div>
    </div>
    <div class="weui-cell__ft">
        <a class="weui-swiped-btn weui-swiped-btn_warn delete-swipeout" href="javascript:">删除</a>
    </div>
</div>


</body>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>

<script>
    $(function () {
        FastClick.attach(document.body);
    });
</script>

</html>