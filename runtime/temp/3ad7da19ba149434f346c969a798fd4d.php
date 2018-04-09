<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/info_case.html";i:1520833557;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>案件概况</title>

    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
    <link rel="stylesheet" href="/ding/css/case-details.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<style>
    .flex_content {
        display: flex;
        width: 100%;
        height: 2rem;
        background: white;
        text-align: center;
        line-height: 2rem;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        color: #38ADFF;
        padding: 8px 0;
        margin-top: 2rem;
        z-index: 1000;
        /*justify-content: center;
    align-items: center;*/
    }

    .flex_button_left {
        flex: 1;
        border-right: 1px solid #e5e5e5;
        /*border-color: black; */
    }

    .flex_button_right {
        flex: 1;
        border-left: 1px solid #e5e5e5;
    ;
        /*border: 1px solid black; */
    }
</style>
<body ontouchstart>

<div class="weui-tab">
    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="margin-gray"></div>
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p>基本信息</p>
                    </div>
                </div>
            </div>

            <div id="content_case">

            </div>
            <div id="content_default">

            </div>


            <div class="margin-gray"></div>
            <div id="litigation"></div>
            <div class="margin-bottom"></div>

        </div>
    </div>

    <div class="weui-tabbar">
        <a href="#tab1" class="weui-tabbar__item weui-bar__item--on">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/Group 24.png" alt="">
            </div>
            <p class="weui-tabbar__label">案件概况</p>
        </a>
        <a href="/ding/manage_case/materials_files?id=<?php echo $case_id; ?>" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/cl.png" alt="">
            </div>
            <p class="weui-tabbar__label">案卷材料</p>
        </a>
        <a href="/ding/manage_case/course_case?id=<?php echo $case_id; ?>" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/jc.png" alt="">
            </div>
            <p class="weui-tabbar__label">案件进程</p>
        </a>
        <a href="/ding/manage_case/woke_note?id=<?php echo $case_id; ?>" class="weui-tabbar__item">
            <div class="weui-tabbar__icon">
                <img src="/ding/images/sj.png" alt="">
            </div>
            <p class="weui-tabbar__label">工作手记</p>
        </a>
    </div>
</div>

<div id="flex_content" class="flex_content" style="display: none;">
    <div class="flex_button_left" id="is_agree">同意</div>
    <div class="flex_button_right" id="no_angree">拒绝</div>
</div>

</body>
<script src='https://g.alicdn.com/dingding/open-develop/1.6.9/dingtalk.js?spm=a219a.7629140.0.0.t4bEpv&file=dingtalk.js'></script>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script>

    $(function () {
        FastClick.attach(document.body);

        var code;

        dd.ready(function() {
            add();

            dd.runtime.permission.requestAuthCode({
                corpId: "<?php echo CORPID; ?>",
                onSuccess: function(result) {
                    code = result.code;
                    $.ajax({
                        type: 'POST',
                        url: '/ding/base/get_user',
                        data: {
                            code:code
                        },
                        dataType: 'json',
                        beforeSend: function () {

                        },
                        success:function (result) {
                            if(result == '141622563826067052' || result == '135331244821362564'){
                                $('#flex_content').css('display','flex');
                            }
                            console.log(result);
                            // $('#flex_content').css('display','block')
                        },
                        error:function () {

                        }
                    })
                },
                onFail : function(err) {}
            });
        });


        var id = '<?php echo $case_id; ?>';

        $('#is_agree').click(function () {
            is_agree(1,id);

        })

        $('#no_agree').click(function () {
            is_agree(2,id);
        });


        function is_agree(type,id) {
            dd.runtime.permission.requestAuthCode({
                corpId: "<?php echo CORPID; ?>",
                onSuccess: function(result) {
                    code = result.code;
                    $.ajax({
                        type: 'POST',
                        url: '/ding/api/is_case',
                        data: {
                            id:id,
                            is_true:type,
                            code:code
                        },
                        dataType: 'json',
                        beforeSend: function () {

                        },
                        success:function (result) {
                            console.log(result);

                        },
                        error:function () {

                        }
                    })
                },
                onFail : function(err) {}
            });
        }

        function add(){
            dd.runtime.permission.requestAuthCode({
                corpId: "<?php echo CORPID; ?>",
                onSuccess: function(result) {
                    code = result.code;

                    $.ajax({
                        type:'GET',
                        url:'/ding/api/case_info',
                        data:{id:id,code:code},
                        dataType:'json',
                        beforeSend:function () {

                        },
                        success:function(result){

                            var obj = result.data;
//                            console.log(result.law)
                            console.log(obj);

                            var aq,ly,yw,yd;

                            if(obj.involve.search("0") != -1){
                                aq = '有';
                            }else {
                                aq = '无';
                            }

                            if(obj.involve.search("1") != -1){
                                ly = '有';
                            }else {
                                ly = '无';
                            }

                            if(obj.involve.search("2") != -1){
                                yw = '有';
                            }else {
                                yw = '无';
                            }

                            if(obj.appoint.search("0") != -1){
                                yd = '无';
                            }else {
                                yd = '有';
                            }

                            var content_default = `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">涉及国家安全：</li>
                            <li class="weui-media-box__info__meta">${aq}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">涉及公共利益：</li>
                            <li class="weui-media-box__info__meta">${ly}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">涉及其他案外干扰因素：</li>
                            <li class="weui-media-box__info__meta">${yw}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注：</li>
                            <li class="weui-media-box__info__meta">${obj.involve_content}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">特殊约定：</li>
                            <li class="weui-media-box__info__meta">${yd}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注：</li>
                            <li class="weui-media-box__info__meta">${obj.appoint_content}</li>
                        </ul>

                    </div>
                    </div>
            </div>`;

                            var xs_litigation = `<div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p>
                            <span>诉讼信息</span>
                            <span class="bandcamp"><a href="/ding/manage_case/new_lawsuit?case_id=${id}">填写</a></span>
                        </p>
                    </div>
                </div>
            </div>`;

                            var ms_litigation = `<div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <p>
                            <span>诉讼信息</span>
                            <span class="bandcamp"><a href="/ding/manage_case/new_lawsuit?case_id=${id}">填写</a></span>
                        </p>
                    </div>
                </div>
            </div>`;
                            var xs_litigation_info;
                            if(result.data.lawsuit){
                                xs_litigation_info = `

            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">对方当事人姓名/名称：</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.opposite_name}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">审理法院</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.hear_court}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">侦查机关：</li>
                            <li class="weui-media-box__info__meta"> ${obj.lawsuit.spy_office}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">检查机关：</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.inspect_office}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案情简介：</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.case_intro}</li>
                        </ul>
                    </div>
                </div>
            </div>
           `;
                            }else {
                                xs_litigation_info = '没有添加诉讼';
                            }

                            var ms_litigation_info;
                            if(result.data.lawsuit) {
                                ms_litigation_info = `

            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">对方当事人姓名/名称：</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.opposite_name}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">审理法院</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.hear_court}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案情简介：</li>
                            <li class="weui-media-box__info__meta">${obj.lawsuit.case_intro}</li>
                        </ul>
                    </div>
                </div>
            </div>
           `;
                            }else {
                                ms_litigation_info = '没有添加诉讼';
                            }

                            var xs_case =  `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件名称：</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}涉嫌${obj.crime}案件</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件编号：</li>
                            <li class="weui-media-box__info__meta">${obj.case_num}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收案日期：</li>
                            <li class="weui-media-box__info__meta">${obj.create_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件类型：</li>
                            <li class="weui-media-box__info__meta">${obj.type}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件来源</li>
                            <li class="weui-media-box__info__meta">${obj.case_id}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人姓名</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人身份：</li>
                            <li class="weui-media-box__info__meta">${obj.identity}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人联系方式：</li>
                            <li class="weui-media-box__info__meta">${obj.phone}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">涉案罪名：</li>
                            <li class="weui-media-box__info__meta">${obj.crime}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">合同期限：</li>
                            <li class="weui-media-box__info__meta">${obj.case_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">承办律师：</li>
                            <li class="weui-media-box__info__meta">${obj.user_ids}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收费金额：</li>
                            <li class="weui-media-box__info__meta"> ${obj.money}元</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">缴费方式</li>
                            <li class="weui-media-box__info__meta">${obj.m_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注:</li>
                            <li class="weui-media-box__info__meta">${obj.remake}</li>
                        </ul>
                    </div>
                </div>
            </div>
`;

                            var ms_case =  `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件名称：</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}涉嫌${obj.reason}案件</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件编号：</li>
                            <li class="weui-media-box__info__meta">${obj.case_num}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收案日期：</li>
                            <li class="weui-media-box__info__meta">${obj.create_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件类型：</li>
                            <li class="weui-media-box__info__meta">${obj.type}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件来源</li>
                            <li class="weui-media-box__info__meta">${obj.case_id}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人姓名/名称</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人联系方式：</li>
                            <li class="weui-media-box__info__meta">${obj.phone}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案由：</li>
                            <li class="weui-media-box__info__meta">${obj.reason}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">合同期限：</li>
                            <li class="weui-media-box__info__meta">${obj.case_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">承办律师：</li>
                            <li class="weui-media-box__info__meta">${obj.user_ids}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收费金额：</li>
                            <li class="weui-media-box__info__meta"> ${obj.money}元</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">缴费方式</li>
                            <li class="weui-media-box__info__meta">${obj.m_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注:</li>
                            <li class="weui-media-box__info__meta">${obj.remake}</li>
                        </ul>
                    </div>
                </div>
            </div>
`;

                            var xz_case =  `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件名称：</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}涉嫌${obj.reason}案件</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件编号：</li>
                            <li class="weui-media-box__info__meta">${obj.case_num}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收案日期：</li>
                            <li class="weui-media-box__info__meta">${obj.create_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件类型：</li>
                            <li class="weui-media-box__info__meta">${obj.type}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件来源</li>
                            <li class="weui-media-box__info__meta">${obj.case_id}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人姓名</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人身份：</li>
                            <li class="weui-media-box__info__meta">${obj.identity}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人联系方式：</li>
                            <li class="weui-media-box__info__meta">${obj.phone}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案由</li>
                            <li class="weui-media-box__info__meta">${obj.reason}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">对方当事人姓名/名称</li>
                            <li class="weui-media-box__info__meta">${obj.opposite}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">合同期限：</li>
                            <li class="weui-media-box__info__meta">${obj.case_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">承办律师：</li>
                            <li class="weui-media-box__info__meta">${obj.user_ids}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收费金额：</li>
                            <li class="weui-media-box__info__meta"> ${obj.money}元</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">缴费方式</li>
                            <li class="weui-media-box__info__meta">${obj.m_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注:</li>
                            <li class="weui-media-box__info__meta">${obj.remake}</li>
                        </ul>
                    </div>
                </div>
            </div>
`;
                            var fl_case =  `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件名称：</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}涉嫌${obj.reason}案件</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件编号：</li>
                            <li class="weui-media-box__info__meta">${obj.case_num}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收案日期：</li>
                            <li class="weui-media-box__info__meta">${obj.create_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件类型：</li>
                            <li class="weui-media-box__info__meta">${obj.type}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件来源</li>
                            <li class="weui-media-box__info__meta">${obj.case_id}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人姓名/名称</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人联系方式：</li>
                            <li class="weui-media-box__info__meta">${obj.phone}</li>
                        </ul>

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">起始时间</li>
                            <li class="weui-media-box__info__meta">${obj.start_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">结束时间：</li>
                            <li class="weui-media-box__info__meta">${obj.end_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">承办律师：</li>
                            <li class="weui-media-box__info__meta">${obj.user_ids}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收费金额：</li>
                            <li class="weui-media-box__info__meta"> ${obj.money}元</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">缴费方式</li>
                            <li class="weui-media-box__info__meta">${obj.m_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注:</li>
                            <li class="weui-media-box__info__meta">${obj.remake}</li>
                        </ul>
                    </div>
                </div>
            </div>
`;

                            var dx_case =  `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件名称：</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}涉嫌${obj.crime}案件</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件编号：</li>
                            <li class="weui-media-box__info__meta">${obj.case_num}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收案日期：</li>
                            <li class="weui-media-box__info__meta">${obj.create_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件类型：</li>
                            <li class="weui-media-box__info__meta">${obj.type}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件来源</li>
                            <li class="weui-media-box__info__meta">${obj.case_id}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人姓名/名称</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人联系方式：</li>
                            <li class="weui-media-box__info__meta">${obj.phone}</li>
                        </ul>

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托事项</li>
                            <li class="weui-media-box__info__meta">${obj.commitment}</li>
                        </ul>

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">承办律师：</li>
                            <li class="weui-media-box__info__meta">${obj.user_ids}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收费金额：</li>
                            <li class="weui-media-box__info__meta"> ${obj.money}元</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">缴费方式</li>
                            <li class="weui-media-box__info__meta">${obj.m_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注:</li>
                            <li class="weui-media-box__info__meta">${obj.remake}</li>
                        </ul>
                    </div>
                </div>
            </div>
`;

                            var zc_case =  `<div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件名称：</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}涉嫌${obj.reason}案件</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件编号：</li>
                            <li class="weui-media-box__info__meta">${obj.case_num}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收案日期：</li>
                            <li class="weui-media-box__info__meta">${obj.create_time}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件类型：</li>
                            <li class="weui-media-box__info__meta">${obj.type}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案件来源</li>
                            <li class="weui-media-box__info__meta">${obj.case_id}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人姓名</li>
                            <li class="weui-media-box__info__meta">${obj.mandator}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">委托人联系方式：</li>
                            <li class="weui-media-box__info__meta">${obj.phone}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">对方当事人姓名：</li>
                            <li class="weui-media-box__info__meta">${obj.opposite}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">案由：</li>
                            <li class="weui-media-box__info__meta">${obj.reason}</li>
                        </ul>

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">合同期限：</li>
                            <li class="weui-media-box__info__meta">${obj.case_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">承办律师：</li>
                            <li class="weui-media-box__info__meta">${obj.user_ids}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="weui-panel">
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_text">

                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">收费金额：</li>
                            <li class="weui-media-box__info__meta"> ${obj.money}元</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">缴费方式</li>
                            <li class="weui-media-box__info__meta">${obj.m_status}</li>
                        </ul>
                        <ul class="weui-media-box__info">
                            <li class="weui-media-box__info__meta">备注:</li>
                            <li class="weui-media-box__info__meta">${obj.remake}</li>
                        </ul>
                    </div>
                </div>
            </div>
`;

                            if(obj.type == '刑事案件') {
                                $('#content_case').append(xs_case,content_default);
                                $('#litigation').append(xs_litigation,xs_litigation_info);
                            }else if( obj.type == '民事案件' ){
                                $('#content_case').append(ms_case,content_default);
                                $('#litigation').append(ms_litigation,ms_litigation_info);
                            }else if(obj.type == '行政案件') {
                                $('#content_case').append(xz_case,content_default);
                                $('#litigation').append(ms_litigation,ms_litigation_info);
                            }else if(obj.type == '法律顾问') {
                                $('#content_case').append(fl_case,content_default);
                            }else if(obj.type == '单项法律顾问') {
                                $('#content_case').append(dx_case,content_default);
                            }else if(obj.type == '仲裁案件') {
                                $('#content_case').append(zc_case,content_default);
                            }

                        },
                        complete:function () {
                            // console.log(window.location.href);
                            // console.log(id);
                        },
                        error:function () {
                            console.log(data);
                        }
                    })

                },
                onFail : function(err) {}
            });
        }

    });
</script>
</html>