$( document ).ready(function() {

    'use strict';

    var size = 21;
    var columns = Array.from(document.getElementsByClassName('column'));
    var d = undefined,
        c = undefined;
    var classList = ['visible', 'close', 'far', 'far', 'distant', 'distant'];
    var use24HourClock = true;

    function padClock(p, n) {
        return p + ('0' + n).slice(-2);
    }

    function getClock() {
        d = new Date();
        return [use24HourClock ? d.getHours() : d.getHours() % 12 || 12, d.getMinutes(), d.getSeconds()].reduce(padClock, '');
    }

    function getClass(n, i2) {
        return classList.find(function (class_, classIndex) {
                return i2 - classIndex === n || i2 + classIndex === n;
            }) || '';
    }

    var loop = setInterval(function () {
        c = getClock();

        columns.forEach(function (ele, i) {
            var n = +c[i];
            var offset = -n * size;
            ele.style.transform = 'translateY(calc(12vh + ' + offset + 'px - ' + size / 2 + 'px))';
            Array.from(ele.children).forEach(function (ele2, i2) {
                ele2.className = 'num ' + getClass(n, i2);
            });
        });
    }, 200 + Math.E * 10);

    $('.input-password').keyup(function () {
        let len = this.value.length;
        $('.password .progress-bar_wrap').removeClass('hidden');

        if (len === 0) {
            $('.password .progress-bar_item').each(function () {
                $(this).removeClass('active')
            });
        } else if (len > 0 && len <= 4) {
            $('.password .progress-bar_item-1').addClass('active');
            $('.password .progress-bar_item-2').removeClass('active');
            $('.password .progress-bar_item-3').removeClass('active');
        } else if (len > 4 && len <= 8) {
            $('.password .progress-bar_item-2').addClass('active');
            $('.password .progress-bar_item-3').removeClass('active');
        } else {
            $('.password .progress-bar_item').each(function () {
                $(this).addClass('active');
            });
        }
    });
    $('.input-password-confirm').keyup(function () {
        let len = this.value.length;
        $('.password-confirm .progress-bar_wrap').removeClass('hidden');

        if (len === 0) {
            $('.password-confirm .progress-bar_item').each(function () {
                $(this).removeClass('active')
            });
        } else if (len > 0 && len <= 4) {
            $('.password-confirm .progress-bar_item-1').addClass('active');
            $('.password-confirm .progress-bar_item-2').removeClass('active');
            $('.password-confirm .progress-bar_item-3').removeClass('active');
        } else if (len > 4 && len <= 8) {
            $('.password-confirm .progress-bar_item-2').addClass('active');
            $('.password-confirm .progress-bar_item-3').removeClass('active');
        } else {
            $('.password-confirm .progress-bar_item').each(function () {
                $(this).addClass('active');
            });
        }
    });
    $('#bangong,#biancheng,#zhiye,#shenghuo,#yuyan').mouseover(function() {
        var id =  "." + this.id + "-menu";
        $(".menu-right").removeClass("active").addClass("hidden");
        $(id).addClass("active").removeClass("hidden");
        console.log(id);
    });

});
$('button#contact').click(function () {
    $('button#contact').toggleClass('active');
    $('div.title').toggleClass('active');
    $('nav#nav').toggleClass('active');
});

function getMessageList() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    return $.get('/user/messageList',{},
        function (data,status) {
            if(data.code === 0) {
                return data.data
            }
        },'json')
}
function getMessageInfo() {

}



