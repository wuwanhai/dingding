<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/course_case.html";i:1521784403;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>案件进程</title>

    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
    <link rel="stylesheet" href="/ding/css/case-details.css">
    <link rel="stylesheet" href="/ding/css/course_case.css">
    <style>
        .demos-header{
            padding: 0;
        }
    </style>
</head>
<body ontouchstart>

<div class="weui-tab">
    <div class="weui-tab__bd">
        <div id="tab3" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p>
                            <span>进程修改</span>
                            <span id="update_process">更新</span>
                        </p>
                    </div>
                </div>
            </div>
            <div style="padding:0 3%;background: white;margin:3% 0">
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">当前进程</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" readonly="readonly" placeholder="请选择" id="open-popup">
                    </div>
                </div>
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label class="weui-label">开始时间</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="date" placeholder="" id="start-time">
                    </div>
                </div>
            </div>
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p>进程记录</p>
                    </div>
                </div>
            </div>
            <div class="weui-cells">
                <div class="weui-cell">
                    <section id="cd-timeline" class="cd-container">


                    </section>
                </div>
            </div>

        </div>

        <div class="weui-tabbar">
            <a href="/ding/manage_case/info_case?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item ">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/gc.png" alt="">
                </div>
                <p class="weui-tabbar__label">案件概况</p>
            </a>
            <a href="/ding/manage_case/materials_files?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/cl.png" alt=""  >
                </div>
                <p class="weui-tabbar__label">案卷材料</p>
            </a>
            <a href="/ding/manage_case/course_case?id=<?php echo \think\Request::instance()->get('id'); ?>" class="weui-tabbar__item weui-bar__item--on">
                <div class="weui-tabbar__icon">
                    <img src="/ding/images/Group 40.png" alt="">
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
<div id="full" class='weui-popup__container'>
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal">
        <header id='demos-header'>

        </header>
    </div>
</div>

</body>
<script src='https://g.alicdn.com/dingding/open-develop/1.6.9/dingtalk.js?spm=a219a.7629140.0.0.t4bEpv&file=dingtalk.js'></script>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script>
    $(function(){

        var case_id = <?php echo \think\Request::instance()->get('id'); ?>;

        $.ajax({
            type: 'GET',
            url: '/ding/api/case_process_list',
            dataType: 'json',
            data:{case_id:case_id},
            beforeSend: function (data) {
                console.log(data,case_id);
            },
            success: function (result) {
                console.log(result);

                for (let x in result.data) {

                    var time_line = `
                        <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-movie">
                            </div>
                            <div class="cd-timeline-content">
                                <h1>${result.data[x].content}</h1>
                                <p>${result.data[x].title}</p>
                                <span class="cd-date">${result.data[x].submit_time.substring(0,4)}<br/>${result.data[x].submit_time.substring(5)}</span>
                            </div>

                        </div>
                     `;
                    $('#cd-timeline').prepend(
                        time_line
                    )
                }
            },
            error: function () {

            }
        })


        var xs_list = {
            '一、侦查阶段': [
                '(1)拘留', '(2)批准逮捕', '(3)起诉意见书日期'
            ],

            '二、审查起诉阶段': [
                '(1)审查起诉起算日', '(2)补充侦查起算日', '(3)补充侦查届满日', '(4)审查起诉重新起算日', '(5)告知委托辩护人及诉讼代理人的权利日期', '(6)起诉日期'
            ],

            '三、一审审理阶段': [
                '(1)立案日期', '(2)告知委托辩护人及诉讼代理人的权利日期', '(3)起诉书副本送达日'
            ]
        }

        $('#open-popup').click(function(){
            $('#full').popup();
        })

        for (var x in xs_list) {

            $('#demos-header').append('<div class="demos-header"> </div>');
            var title = ' <h3 class="weui-cell weui-cell_access father">' + x + '</h3>';
            $('.demos-header').eq($('.demos-header').length-1).append(title);

            for (var i in xs_list[x]) {
                var cont = '<p class="weui-cell weui-cell_access child close-popup" style="display: none;"> ' + xs_list[x][i] + ' </p>';
                $('.demos-header').eq($('.demos-header').length-1).append(cont)
            }
        }

        $('#demos-header').on('click','.demos-header',function(){
            $(this).children('p.child').fadeToggle();
        })

        $('#demos-header').on('click','.child',function(){
            var child_text = $(this).text();
            var father_text = $(this).parent().children('h3.father').text();

            console.log(child_text,father_text);

            $('#open-popup').val(child_text.substring(4));

            localStorage.father = father_text;
            localStorage.child = child_text;

        })

        $('#update_process').click(function(){

            alert(1);

            var child = localStorage.child.substring(4);
            var father = localStorage.father;
            var time = $('#start-time').val();

            console.log(child,father,time);

            let dt = {
                title:father,
                content:child,
                case_id:case_id,
                submit_time:time
            }
            $.ajax({
                type: 'POST',
                url: '/ding/api/new_case_process?case_id=' + case_id,
                dataType: 'json',
                data: dt,
                beforeSend: function () {
                    $.showLoading();
                },
                success: function (result) {
                    $.hideLoading()
                    window.location.reload();
                },
                error: function () {

                }
            })
        })
    })
</script>
</html>
