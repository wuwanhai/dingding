$('#format_text').click(function(){
    $('.weui-cells_radio').fadeToggle();
})

$('#x12').click(function(){
    $('#format_type').fadeOut();
})

$('#x11').click(function(){
    $('#format_type').fadeIn();
})

$('#open-popup').click(function(){
    $('#full').popup();
})

var xs_list = {
    '一、刑事案件': [
        '(1)待补充数据', '(2)待补充数据', '(3)待补充数据'
    ],

    '二、民事案件': [
        '(1)待补充数据', '(2)待补充数据', '(3)待补充数据'
    ],

    '三、行政案件': [
        '(1)待补充数据', '(2)待补充数据', '(3)待补充数据'
    ]
}

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


$('#text_type').click(function(){
    $('#full_text').popup();
})

var ws_list = {
    '一、律师事务刑事所函': [
        '文书一（律师）', '文书二（辩护人）', '文书三（诉讼代理人）'
    ],

    '二、刑事授权委托书': [
        '授权委托书（辩护人-法检）', '授权委托书（诉讼代理人）', '授权委托书（侦查阶段）'
    ]
}

for (var y in ws_list) {

    $('#full_ctn').append('<div class="demos-header"> </div>');
    var title_two = ' <h3 class="weui-cell weui-cell_access father">' + y + '</h3>';
    $('.demos-header').eq($('.demos-header').length-1).append(title_two);

    for (var z in ws_list[y]) {
        var ctn = '<p class="weui-cell weui-cell_access child close-popup" style="display: none;"> ' + ws_list[y][z] + ' </p>';
        $('.demos-header').eq($('.demos-header').length-1).append(ctn)
    }
}

$('#full_ctn').on('click','.demos-header',function(){
    $(this).children('p.child').fadeToggle();
})

$('#full_ctn').on('click','.child',function(){
    var child_type = $(this).text();
    var father_type = $(this).parent().children('h3.father').text();

    // console.log(child_text,father_text);

    $('#text_type').val(child_type);

    // localStorage.father = father_text;
    // localStorage.child = child_text;

})