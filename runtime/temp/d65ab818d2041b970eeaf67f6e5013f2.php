<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:99:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/materials_files.html";i:1521697623;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>案件材料</title>

    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
    <link rel="stylesheet" href="/ding/css/case-details.css">
</head>

<body ontouchstart>

<div class="weui-tab">
    <div class="weui-tab__bd">
        <div id="tab2" class="weui-tab__bd-item weui-tab__bd-item--active">
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
                </select>
                <a class="case-new" href="/ding/manage_case/new_materials_files?id=<?php echo \think\Request::instance()->get('id'); ?>">新建</a>
            </div>
            <div class="weui-cells" id="content">


            </div>

        </div>

        <div class="weui-tabbar">
            <a href="/ding/manage_case/info_case?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item ">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/gc.png" alt="">
                </div>
                <p class="weui-tabbar__label">案件概况</p>
            </a>
            <a href="#/ding/manage_case/materials_files?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item weui-bar__item--on">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/Group 39.png" alt=""  >
                </div>
                <p class="weui-tabbar__label">案卷材料</p>
            </a>
            <a href="/ding/manage_case/course_case?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/jc.png" alt="">
                </div>
                <p class="weui-tabbar__label">案件进程</p>
            </a>
            <a href="/ding/manage_case/woke_note?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/sj.png" alt="">
                </div>
                <p class="weui-tabbar__label">工作手记</p>
            </a>
        </div>
    </div>
</div>

</body>
<script src='https://g.alicdn.com/dingding/open-develop/1.6.9/dingtalk.js?spm=a219a.7629140.0.0.t4bEpv&file=dingtalk.js'></script>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script>
    $(function () {
        var case_id = <?php echo \think\Request::instance()->get('id'); ?>;
        console.log(case_id);

        $.ajax({
            type: 'GET',
            url: '/ding/api/materials_files_list?case_id='+case_id,
            dataType: 'json',
            data:case_id,
            beforeSend: function () {

            },
            success:function (result) {
            console.log(result.data);

                for (let x in result.data) {
                    var ctn = `<a class="weui-cell weui-cell_access" href="/ding/manage_case/materials_files_detail?id=${case_id}">
                    <a href="/ding/manage_case/materials_files_detail?id=${case_id}" class="weui-panel__bd">
                        <div class="weui-media-box weui-media-box_text">
                            <h4 class="weui-media-box__title">${result.data[x].title} </h4>
                            <ul class="weui-media-box__info">
                                <li class="weui-media-box__info__meta">申请人：孔明</li>

                                <li class="weui-media-box__info__meta weui-media-box__info__meta_extra">${result.data[x].create_time}</li>
                            </ul>
                        </div>
                    </a>
                    <div class="weui-cell__ft margin-left">
                    </div>
                </a>`
                $('#content').append(ctn);
                }
            },
            error:function () {

            }
        })
    })
</script>
</html>