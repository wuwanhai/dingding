
$("#case-source").picker({
    title: "请选择案源",
    cols: [
        {
            textAlign: 'center',
            values: ['律所', '承办律师']
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

$("#time-limit").picker({
    title: "请选择合同期限",
    cols: [
        {
            textAlign: 'center',
            values: ['侦察终结', '移送审查起诉', '一审终结', '二审终结', '申诉/再审终结', '执行终结', '再审终结']
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

$("#person-select").select({
    title: "请选择承办律师（钉钉接口调取）",
    multi: true,
    min: 2,
    max: 3,
    items: [
        {
            title: "晨星月",
            value: 1,
            description: "额外的数据1"
        },
        {
            title: "李江山",
            value: 2,
            description: "额外的数据2"
        },
        {
            title: "五里丰",
            value: 3,
            description: "额外的数据3"
        },
        {
            title: "稻花香",
            value: 4,
            description: "额外的数据4"
        },
        {
            title: "花满楼",
            value: 5,
            description: "额外的数据5"
        },
        {
            title: "陆小凤",
            value: 6,
            description: "额外的数据6"
        },
    ]

});