<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:100:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/collect_case/law_affair_case.html";i:1520831343;}*/ ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>单项法律事务案件</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/xs-case.css">
</head>

<body>
<div class="weui-cells weui-cells_form">
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">案件名称</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="请选择" id="crime">
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">案源</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="请选择" id="case-source">
        </div>
    </div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">委托人姓名/名称</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="请填写" id="mandator" required>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">委托人联系方式</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="phone" placeholder="请填写" id="phone">
        </div>
    </div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">委托事项</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="请填写" id="commitment">
        </div>
    </div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">承办律师</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" id="user-ids" placeholder="请选择">
        </div>
    </div>

    <div class="margin-gray"></div>
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">收费金额</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="number" placeholder="单位（元）" id="money">
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">缴费方式</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="请选择" id="m_status">
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <textarea class="weui-textarea" placeholder="备注：请填写" rows="2" id="remake"></textarea>
            <div class="weui-textarea-counter">
                <span>0</span>/200</div>
        </div>
    </div>
    <div class="margin-gray"></div>

    <a class="weui-cell weui-cell_access" href="javascript:;" id="is_true_display">
        <div class="weui-cell__bd">
            <p>是否涉及以下事项</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
    <div class="weui-cells weui-cells_checkbox" id="select_display" style="display: none;">
        <label class="weui-cell weui-check__label" for="s11">
            <div class="weui-cell__hd">
                <input type="checkbox" class="weui-check" name="checkbox1" id="s11" value="0">
                <i class="weui-icon-checked"></i>
            </div>
            <div class="weui-cell__bd">
                <p>涉及国家安全</p>
            </div>
        </label>
        <label class="weui-cell weui-check__label" for="s12">
            <div class="weui-cell__hd">
                <input type="checkbox" name="checkbox1" class="weui-check" id="s12" value="1">
                <i class="weui-icon-checked"></i>
            </div>
            <div class="weui-cell__bd">
                <p>涉及公共利益</p>
            </div>
        </label>
        <label class="weui-cell weui-check__label" for="s13">
            <div class="weui-cell__hd">
                <input type="checkbox" class="weui-check" name="checkbox1" id="s13" value="2">
                <i class="weui-icon-checked"></i>
            </div>
            <div class="weui-cell__bd">
                <p>涉及其他案外干扰因素</p>
            </div>
        </label>

        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" placeholder="如有，请填写案情简介" rows="2" id="involve_content"></textarea>
                    <div class="weui-textarea-counter">
                        <span>0</span>/200</div>
                </div>
            </div>
        </div>
    </div>
    <div class="margin-gray"></div>
    <a class="weui-cell weui-cell_access" href="javascript:;" id="special_terms">
        <div class="weui-cell__bd">
            <p>特殊约定</p>
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
    <div class="weui-cells weui-cells_radio" id="terms_content" style="display: none;">
        <label class="weui-cell weui-check__label" for="x11" id="is_true">
            <div class="weui-cell__bd" >
                <p>有</p>
            </div>
            <div class="weui-cell__ft">
                <input type="radio" class="weui-check" name="radio1" id="x11" value="1">
                <span class="weui-icon-checked"></span>
            </div>
        </label>
        <label class="weui-cell weui-check__label" for="x12" id="is_none">

            <div class="weui-cell__bd">
                <p>无</p>
            </div>
            <div class="weui-cell__ft">
                <input type="radio" name="radio1" class="weui-check" id="x12" checked="checked" value="0">
                <span class="weui-icon-checked"></span>
            </div>
        </label>
        <div class="weui-cells weui-cells_form" style="display: none;" id="is_note">
            <div class="weui-cell" >
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" placeholder="备注：特殊约定将写入合同" rows="2" id="appoint_content"></textarea>
                    <div class="weui-textarea-counter">
                        <span>0</span>/200</div>
                </div>
            </div>
        </div>

    </div>
    <div class="margin-gray"></div>

    <div class="weui-btn-margin">
        <a href="javascript:;" class="weui-btn weui-btn_primary" id="submit">提交</a>
    </div>
</div>

<div id="picker-container"></div>
</body>
<script src='https://g.alicdn.com/dingding/open-develop/1.6.9/dingtalk.js?spm=a219a.7629140.0.0.t4bEpv&file=dingtalk.js'></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script src="/ding/lib/fastclick.js"></script>
<script>
    $(function () {
        FastClick.attach(document.body);
    });
</script>
<script>

    var code;

    dd.ready(function() {
        dd.runtime.permission.requestAuthCode({
            corpId: "<?php echo CORPID; ?>",
            onSuccess: function(result) {
                code = result.code;
                /*{
                    code: 'hYLK98jkf0m' //string authCode
                }*/
            },
            onFail : function(err) {}

        });
    });
</script>
<script src="/ding/js/select.js"></script>
<script>
    $(function(){

        $('#is_true_display').click(function(){
            $('#select_display').fadeToggle();
        })

        $('#special_terms').click(function () {
            $('#terms_content').fadeToggle();
        })


        $('#is_true').click(function () {
            $('#is_note').fadeIn();
        })

        $('#is_none').click(function () {
            $('#is_note').fadeOut();
        })

        $('#submit').click(function(){



            var case_source = $('#case-source').val();
            // var type = $('#type').val();
            var mandator = $('#mandator').val();
            var phone = $('#phone').val();
            var commitment = $('#commitment').val();

            var user_ids = $('#user-ids').val();
            var crime = $('#crime').val();
            var money = $('#money').val();
            var m_status = $('#m_status').val();
            var remake = $('#remake').val();
            // var involve = $('#involve').val();
            //
            var involve_content = $('#involve_content').val();
            //
            // var appoint = $('#appoint').val();
            var appoint_content = $('#appoint_content').val();


            // 获取多选的值

            var id_array = [];

            $('input[name="checkbox1"]:checked').each(function(){
                id_array.push($(this).val());//向数组中添加元素
            });
            var involve=id_array.join(',');//将数组元素连接起来以构建一个字符串

            console.log(involve);

            // 获取单选的值

            var radio1 = $('input[name="radio1"]:checked').val();



            //获取钉钉鉴权



            var data = {
                case_source:case_source,
                type:4,
                code:code,
                mandator:mandator,
                phone:phone,
                commitment:commitment,
                user_ids:user_ids,
                crime:crime,
                money:money,
                m_status:m_status,
                remake:remake,
                involve:involve,
                involve_content:involve_content,
                appoint:radio1,
                appoint_content:appoint_content
            }

            console.log(data);

            $.ajax({
                type:'POST',
                url:'/ding/api/add_case',
                data:data,
                dataType:'json',
                beforeSend:function () {

                    $.showLoading();
                },
                success:function(result){

                    // alert(result.code);
                    // console.log(result);
                    if (result.code == 1){
                        $.toast("操作成功")
                        window.location.href = "/ding/manage_case/index";
                    }else{

                    }
                },
                complete:function () {

                    setTimeout(function() {
                        $.hideLoading();
                    }, 2000);

                },
                error:function () {
                    console.log(data);
                }
            })
        })
    })
</script>
</html>