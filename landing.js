$(document).ready(function(){

    $('.home').hide();
    $('.about').hide();
    $('.event').hide();
    $('.home').fadeIn(1500);

    // Countdown Timer
    let Time = ("11:19:06:59").split(":"), Colon = ':';
    let Day = parseInt(Time[0], 10), Hour = parseInt(Time[1], 10), Min = parseInt(Time[2], 10), Sec = parseInt(Time[3], 10);

    setInterval(function () {
        Min = (--Sec < 0) ? --Min : Min;
        Hour = (Min < 0) ? --Hour : Hour;
        Day = (Hour < 0) ? --Day : Day;
        Sec = (Sec < 0) ? 59 : Sec;
        Min = (Min < 0) ? 59 : Min;
        Hour = (Hour < 0) ? 24 : Hour;
        Colon = (Sec % 2 == 0) ? "&nbsp;:" : "&nbsp;&nbsp;";
        (Sec < 10) ? $('#Secs').html("0" + Sec) : $('#Secs').html('&nbsp;' + Sec);
        (Min < 10) ? $('#Mins').html("0" + Min + Colon) : $('#Mins').html(Min + Colon);
        (Hour < 10) ? $('#Hours').html("0" + Hour + Colon) : $('#Hours').html(Hour + Colon);
        $('#Days').html(Day + Colon);
        if (Day < 0) return;
    }, 1000);

    $(window).scroll( function(){
        $('.scrollfade').each( function(){
            let elementBottom = $(this).offset().top + $(this).outerHeight();
            let windowBottom = $(window).scrollTop() + $(window).height();
            if( windowBottom > elementBottom ){
                $(this).animate({'opacity':'1'},500);
            }
        });
    });

    $('.menu').click(function() {
        $('.menu').removeClass('active');
        $(this).addClass('active');
        let menuFlag = ($(this).html().includes('Home')) ? 1 : ($(this).html().includes('About') ? 2 : ($(this).html().includes('Events') ? 3 : 0));
        switch(menuFlag) {
            case 1 : default: 
                $('.about').hide();
                $('.event').hide();
                $('.home').fadeIn(1500);
            break;
            case 2 :
                $('.home').hide();
                $('.event').hide();
                $('.about').fadeIn(1500);
            break;
            case 3 :
                $('.home').hide();
                $('.about').hide();
                $('.event').fadeIn(1500);
            break;
        }
    });

});

function logOut()
{
    let Status = 0;
    $(location).attr('href', './index.php?status=' + Status);
}