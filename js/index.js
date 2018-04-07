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
            $('.tab').text("Existing accounts? Login directly>>>");
            return false;
        } else {
            $(".class5").css({ "transform": "translate(-50%,-50%)", "height": "239px" });
            $('.register').fadeOut('400');
            $('.login').fadeIn('400');
            $('.tab').text("No acount?To register>>>");
            return false;
        }
    });
    //刷新验证码
    $('img.captcha').click(function () {
        var s = "include/captcha.php?tm="+Math.random();
        $('img.captcha').attr("src",s);
        rec();
    });
    $('#id').click(alarm("jjjj"));
});
function alarm(str) {
    borad = document.getElementsByClassName("notice")[0];
    borad.CSS.display = "block";
    borad.children.text=str;
    
}
// window.onload=function(){

//     document.getElementsByClassName('captcha')[0].onclick=function() {
//         this.src='include/captcha.php?tm='+Math.random();
//     };
// }