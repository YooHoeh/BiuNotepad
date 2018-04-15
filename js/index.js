//************* */
//Author:YooHoeh
//Updata:2018.4.1
//RS:github.com/YooHoeh
//Version:0.2
//************ */


$(function () {
    //form验证
    var fm = document.getElementsByTagName('form')[0];
        fm.onsubmit= function() {
            //密码验证
            if (fm.password.value.length < 6) {
                alert("密码不能小于6位");
                fm.password.value = '';
                fm.password.focus();
                return false;
            }
            if (fm.password.value != fm.repassword.value) {
                alert("两次密码不一致");
                fm.repassword.value = '';
                fm.repassword.focus();
                return false;
            }
            
            //邮箱验证
            if (!/^[\w\-\.]+@[\.\-\w]+(\.\w+)+$/.test(fm.email.value)) {
                alert("电子邮箱格式错误");
                fm.email.value = '';
                fm.email.focus();
                return false;
            }
            
            return true;
        };
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
            $(".class5").css({ "transform": "translate(-50%,-50%)", "height": "330px" });
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
    // 表单项提示
    $('input[name=psk],input[name=setpsk]').click(function(){
        alarm('密码不含空格且长度大于6位');
    });
    $('input[name=id]').click(function(){
        alarm('ID为注册电子邮箱或用户名');
    });
    $('input[name=setname]').click(function(){
        alarm('用户名不可包含特殊字符');
    });
    $('input[name=setemail]').click(function(){
        alarm('一个电子邮箱只能注册一个账户！');
    });
    $('input[name=confirmpsk]').click(function(){
        alarm('请再次输入密码');
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

   setTimeout(function(){tip.fadeOut('1000')}, 1400);
}
function alarmDiv(str) {
    document.write(str);
}