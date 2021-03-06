<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:103:"/home/wwwroot/dt.julongjinrong.top/public/../application/ding/view/manage_case/new_materials_files.html";i:1521687892;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新建材料</title>
    <link rel="stylesheet" href="/ding/lib/weui.min.css">
    <link rel="stylesheet" href="/ding/css/weui.css">
    <link rel="stylesheet" href="/ding/css/upload_img.css">
</head>

<body ontouchstart>
<div class="margin-gray"></div>

<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">材料标题</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="请填写标题" id="title">
        </div>
    </div>
    <div class="margin-gray"></div>

    <div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">备注</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="请填写备注" id="remake">
            </div>
        </div>
        <div class="margin-gray"></div>

        <div class="weui-cell">
            <div id="container">
                <a href="javascript:void(0)" class="file">选择图片
                    <input type='file' multiple accept = 'image/gif,image/jpeg,image/jpg,image/png,image/bmp' />
                    <input type="hidden" value=""/>
                </a>
            </div>
        </div>

        <div class="margin-gray"></div>
        <div class="weui-btn-margin">
            <a href="javascript:;" class="weui-btn weui-btn_primary" id="submit">提交</a>
        </div>
    </div>
</div>
</body>
<script src="https://g.alicdn.com/dingding/open-develop/1.9.0/dingtalk.js"></script>
<script src="/ding/lib/fastclick.js"></script>
<script src="/ding/lib/jquery-2.1.4.js"></script>
<script src="/ding/js/jquery-weui.min.js"></script>
<script src="/ding/js/uploadImg.js"></script>

<script>
    $(function () {
        FastClick.attach(document.body);
    });
</script>
<script>
    var code;
    var user_name;
    var user_img;
    var case_id = <?php echo \think\Request::instance()->get('id'); ?>;
    var open_config = <?php echo $config; ?>;

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
                user_img = info.avatar;
                user_name = info.nickName;
            },
            onFail: function (err) {
                logger.e('userGet fail: ' + JSON.stringify(err));
            }
        });

    });

</script>
<script type="text/javascript">
    $(function () {
        var images = [];
        var params = {
            container: '#container',
            url: '/ding/base/upload ',
            dragDrop: false,
            onDragLeave: function(target) {

            },
            onSuccess:function(data){
                console.log(data);
                images.push(data.imgData.data);
                console.log(images);
            },
            onFailure:function(file, XMLHttpRequest, textStatus, errorThrown){
                console.log(file, XMLHttpRequest, textStatus, errorThrown);
            }
        };

        var uploadImg1 = new UploadImg(params);

        $('#submit').click(function(){

            var title = $('#title').val();
            var remake = $('#remake').val();

            var data = {
                case_id:case_id,
                images:images,
                code:code,
                title:title,
                remake:remake,
                avatar:user_img,
                nickName:user_name
            }
            $.ajax({
                type: 'POST',
                url: '/ding/api/add_materials_files',
                data: data,
                dataType: 'json',
                beforeSend: function (result) {
                    console.log(data);
                    $.showLoading()
                },
                success:function (result) {
                    $.hideLoading()
                    console.log(result);
                    window.location.href = `/ding/manage_case/materials_files?id=${case_id}`
                },
                error:function () {
                    $.toast("操作失败", "forbidden");
                }
            })
        })
    })
</script>
</html>