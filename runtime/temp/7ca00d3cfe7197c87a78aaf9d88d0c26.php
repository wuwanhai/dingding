<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/new_lawsuit.html";i:1520822642;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>诉讼信息</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/case-use-paper.css">
</head>

<body ontouchstart>

<div class="weui-cells">
    <div class="margin-gray"></div>
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">对方当事人称呼</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" id="oppo" placeholder="请填写">
        </div>
    </div>
    <div class="margin-gray"></div>
    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">审理法院</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="hc" type="text" placeholder="请填写">
        </div>
    </div>

    <div class="margin-gray"></div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">案情简介</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="ci" type="text" placeholder="请填写">
        </div>
    </div>
    <div class="margin-gray"></div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">侦查机关</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="spy_office" type="text" placeholder="请填写">
        </div>
    </div>
    <div class="margin-gray"></div>

    <div class="weui-cell">
        <div class="weui-cell__hd">
            <label class="weui-label">检察机关</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" id="io" type="text" placeholder="请填写">
        </div>
    </div>

    <div class="margin-gray"></div>
    <div class="weui-btn-margin">
        <a href="javascript:;" class="weui-btn weui-btn_primary" id="submit">提交</a>
    </div>

</div>
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
            },
            onFail : function(err) {}

        });
    });
</script>
<script>

    $(function() {
        $('#submit').click(function(){
            var oppo = $('#oppo').val();
            var hc = $('#hc').val();
            var ci = $('#ci').val();
            var io = $('#io').val();
            var spy_office = $('#spy_office').val();

            var data;

            console.log('<?php echo \think\Request::instance()->get('case_id'); ?>');
            
            var id = '<?php echo \think\Request::instance()->get('case_id'); ?>';

            console.log(id,'-----');

            data = {
                code:code,
                case_id:id,
                opposite_name:oppo,
                hear_court:hc,
                case_intro:ci,
                inspect_office:io,
                spy_office:spy_office
            }

            console.log(data);

                $.ajax({
                    type:'POST',
                    url:'/ding/api/add_lawsuit',
                    data:data,
                    dataType:'json',
                    beforeSend:function () {

                        $.showLoading();
                    },
                    success:function(result){

                        // alert(result.code);
                         console.log(result);
                        if (result.code == 1){

                                $.toast("操作成功");
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