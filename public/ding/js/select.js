
$("#case-source").picker({
    title: "请选择案源",
    cols: [
        {
            textAlign: 'center',
            values: ['律所', '承办律师']
        }
    ]
});


$("#identity").select({
    title: "请选择委托人身份",
    items: [
        {
            title: "犯罪嫌疑人/被告人",
            value: "1",
        },

        {
            title:"被害人",
            value:"2",
        }
    ]
});

$("#case-id").picker({
    title: "请选择委托人身份",
    cols: [
        {
            textAlign: 'center',
            values: ['犯罪嫌疑人/被告人', '被害人']
        }
    ]
});
//
// $("#case-status").picker({
//     title: "请选择合同期限",
//     cols: [
//         {
//             textAlign: 'center',
//             values: ['侦察终结', '移送审查起诉', '一审终结', '二审终结', '申诉/再审终结', '执行终结', '再审终结']
//         }
//     ]
// });

$("#case-status").select({
    title: "请选择合同期限",
    items: [
        {
            title: "侦查终结",
            value: "1",
        },
        {
            title: "移送审查起诉",
            value: "2",
        },
        {
            title: "一审终结",
            value: "3",
        },
        {
            title: "二审终结",
            value: "4",
        },
        {
            title: "申诉、再审终结终结",
            value: "5",
        },
        {
            title: "申诉/再审终结",
            value: "4",
        },
        {
            title:"执行终结",
            value:"5",
        },
        {
            title:"再审终结",
            value:"6",
        }
    ]
});

$("#time-limit").picker({
    title: "请选择合同期限",
    cols: [
        {
            textAlign: 'center',
            values: ['侦查终结', '移送审查起诉', '一审终结', '二审终结', '申诉/再审终结', '执行终结', '再审终结']
        }
    ]
});

$("#m_status").picker({
    title: "请选择付费方式",
    cols: [
        {
            textAlign: 'center',
            values: ['一次性付清', '其他']
        }
    ]
});
$("#pay-method").picker({
    title: "请选择付费方式",
    cols: [
        {
            textAlign: 'center',
            values: ['一次性付清', '其他']
        }
    ]
});

$("#xz-case-sourse").picker({
    title: "请选择案由",
    cols: [{
        textAlign: 'center',
        values: ['作为类事件', '不作为类事件','行政赔偿类案件']
    }]
});

$('#case-origin').picker({
    title: "案由测试数据",
    cols: [{
        textAlign: 'center',
        values: ['民事', '法律', '特别']
    }]
});

$('#select-number').picker({
    title: "请选择份数",
    cols: [{
        textAlign: 'center',
        values: ['1', '2', '3']
    }]
});

$('#select-number-two').picker({
    title: "请选择份数",
    cols: [{
        textAlign: 'center',
        values: ['1', '2', '3']
    }]
});

$('#select-number-three').picker({
    title: "请选择份数",
    cols: [{
        textAlign: 'center',
        values: ['1', '2', '3']
    }]
});

$('#zc-case-origin').picker({
    title: "请选择案由",
    cols: [{
        textAlign: 'center',
        values: ['劳动争议', '商事仲裁', '民事仲裁']
    }]
});


    var us,x,abc;

    $.ajax({
        type:'POST',
        url:'/ding/user/user_list?dept_id=57602081',
        dataType:'json',
        beforeSend:function () {

        },
        success:function(result) {

            us = result.userlist;
            console.log(us);

            // items.title = us.name;
            // items.value = us.userid;

            user_select = [];

            for (x in us) {
                var title = us[x].name;
                var value = us[x].userid;
                console.log(title,value);
                // items.title = title;
                // items.value = value;
                // console.log(items.title);
                    abc = {
                    title,value
                }

                user_select[x]= abc;
            }

            $("#user-ids").select({
                title: "请选择承办律师",
                multi: true,
                min: 1,
                max: 3,
                items:user_select

            });
        },
        complete:function () {

        },
        error:function () {
            console.log();
        }
    })


