<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/chapter_case/chapter_other.html";i:1520999139;}*/ ?>
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

<div class="weui-tab">
    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="weui-cells">
                <div class="margin-gray"></div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">申请人</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" pattern="[0-9]*" placeholder="请填写">
                    </div>
                </div>
                <div class="margin-gray"></div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">用章事由</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" pattern="[0-9]*" placeholder="请填写">
                    </div>
                </div>

                <div class="margin-gray"></div>

                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">用章份数</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" id="select-number" type="number" pattern="[0-9]*" placeholder="最多同时申请三份">
                    </div>
                </div>
                <div class="margin-gray"></div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">申请日期</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="date" placeholder="请填写">
                    </div>
                </div>
                <div class="margin-gray"></div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">备注</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" pattern="[0-9]*" placeholder="请输入">
                    </div>
                </div>
                <div class="margin-gray"></div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">附件</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" id="case-source" type="file" placeholder="请选择">
                    </div>
                </div>
                <div class="margin-gray"></div>
                <div class="weui-btn-margin">
                    <a href="javascript:;" class="weui-btn weui-btn_primary margin-bottom">提交</a>
                </div>

            </div>
        </div>
    </div>
    <div id="full" class='weui-popup__container'>
        <div class="weui-popup__overlay"></div>
        <div class="weui-popup__modal">
            <header id='demos-header'>

            </header>
        </div>
    </div>
    <div class="weui-tabbar">
        <a href="/ding/chapter_case/index" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/ba1.png" alt="">
            </div>
            <p class="weui-tabbar__label">办案用章</p>
        </a>
        <a href="/ding/chapter_case/chapter_other" class="weui-tabbar__item weui-bar__item--on">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/Group 52.png" alt="">
            </div>
            <p class="weui-tabbar__label">其他用章</p>
        </a>
        <a href="/ding/chapter_case/chapter_blank" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/kb1.png" alt="">
            </div>
            <p class="weui-tabbar__label">空白函件</p>
        </a>
        <a href="/ding/chapter_case/chapter_record" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/yz1.png" alt="">
            </div>
            <p class="weui-tabbar__label">用章记录</p>
        </a>
    </div>
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