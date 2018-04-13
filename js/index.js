//************* */
//Author:YooHoeh
//Updata:2018.4.1
//RS:github.com/YooHoeh
//Version:0.2
//************ */


$(function () {
    //点击login弹出登陆界面
    $(".class1").bind("click", function () {
        $('.register').fadeOut('400');
        $(".class5").css({
            'transform': 'rotate(0) translate(-50%,-50%)',
            'z-index': 999,
            'top': '50%',
            'left': '50%',
            'box-shadow': ' 0 0 100px  #999'
        })
            .children('.login,.tab').fadeIn("400"); //显示login表格
    });
    //关闭登陆界面
    $(".class5>.close").bind("click", function () {
        $(".class5").removeAttr("style");
        $(".class5").children("form,a").fadeOut("400");
    });
    //切换登录和注册
    $(".class5 .tab").click(function () {
        if ($('.register').css('display') == 'none') {
            $(".class5").css({ "transform": "translate(-50%,-50%)", "height": "300px" });
            $('.register').fadeIn('400');
            $('.login').fadeOut('400');
            $('.tab').text("已有账户？点此登录>>>");
            return false;
        } else {
            $(".class5").css({ "transform": "translate(-50%,-50%)", "height": "239px" });
            $('.register').fadeOut('400');
            $('.login').fadeIn('400');
            $('.tab').text("没有账户？点此注册>>>");
            return false;
        }
    });
    //刷新验证码
    $('img.captcha').click(function () {
        var s = "include/captcha.php?tm="+Math.random();
        $('img.captcha').attr("src",s);
        rec();
    });

});

// 显示文字通知
function alarm(str) {
   var tip =$(".notice");
   if (tip.css("display") == "block") {
    return false;
   }
   tip.fadeIn('1000')
   .children().text(str);

   setTimeout(tip.fadeOut('1000'), 1000);
}
