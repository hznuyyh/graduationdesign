$( document ).ready(function() {

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
});
$('button#contact').click(function () {
    $('button#contact').toggleClass('active');
    $('div.title').toggleClass('active');
    $('nav#nav').toggleClass('active');
});