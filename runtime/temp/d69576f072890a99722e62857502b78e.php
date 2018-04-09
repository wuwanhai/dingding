<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/chapter_case/chapter_record.html";i:1520999139;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>其他用章</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
    <style>
        .demos-header{
            padding: 0;
        }
    </style>
</head>
<body ontouchstart>
    <div class="weui-search-bar" id="searchBar">
        <form class="weui-search-bar__form">
            <div class="weui-search-bar__box">
                <i class="weui-icon-search"></i>
                <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="">
                <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
            </div>
            <label class="weui-search-bar__label" id="searchText">
                <i class="weui-icon-search"></i>
                <span>搜索</span>
            </label>
        </form>
        <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
    </div>
    <div class="case-menu">
        <select class="case-select">
            <option value="0">全部</option>
            <option value="1">空白公函</option>
            <option value="2">其他用章</option>
            <option value="3">刑事案件</option>
            <option value="4">民事案件</option>
            <option value="5">行政案件</option>
            <option value="6">非诉案件</option>


        </select>
        <a class="case-new" href="case-use-paper.html">新建</a>
    </div>

    <div class="weui-cells__title">刑事案件分类</div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="user-paper--record.html">
            <div class="weui-cell__bd">
                <p>刑事案件一</p>
            </div>
        </a>

    </div>
    <div class="weui-cells__title">民事案件</div>
    <div class="weui-cells">
        <a class="weui-cell weui-cell_access" href="javascript:;">
            <div class="weui-cell__bd">
                <p>武汉民事纠纷</p>
            </div>
        </a>

    </div>
    <div class="weui-tabbar">
        <a href="/ding/chapter_case/index" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/ba1.png" alt="">
            </div>
            <p class="weui-tabbar__label">办案用章</p>
        </a>
        <a href="/ding/chapter_case/chapter_other" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/qt.png" alt="">
            </div>
            <p class="weui-tabbar__label">其他用章</p>
        </a>
        <a href="/ding/chapter_case/chapter_blank" class="weui-tabbar__item ">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/kb1.png" alt="">
            </div>
            <p class="weui-tabbar__label">空白函件</p>
        </a>
        <a href="/ding/chapter_case/chapter_record" class="weui-tabbar__item weui-bar__item--on">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/yz.png" alt="">
            </div>
            <p class="weui-tabbar__label">用章记录</p>
        </a>
    </div>
</body>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/js/select.js"></script>
<script src="/ding/js/case-format.js"></script>
<script>
    $(function () {
        FastClick.attach(document.body);
    });
</script>
</html>