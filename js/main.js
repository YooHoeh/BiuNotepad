var card = [];
var icon = [];
card = document.getElementsByClassName('card');
icon = document.getElementsByClassName('hideicon');

window.onload = function () {
    var i = 0;
    var oTag = null;

    oDiv = document.getElementsByClassName('tags')[0];

    aA = oDiv.getElementsByTagName('a');

    for (i = 0; i < aA.length; i++) {
        oTag = {};

        oTag.offsetWidth = aA[i].offsetWidth;
        oTag.offsetHeight = aA[i].offsetHeight;

        mcList.push(oTag);
    }

    sineCosine(0, 0, 0);

    positionAll();

    oDiv.onmouseover = function () {
        active = true;
    };

    oDiv.onmouseout = function () {
        active = false;
    };

    oDiv.onmousemove = function (ev) {
        var oEvent = window.event || ev;

        mouseX = oEvent.clientX - (oDiv.offsetLeft + oDiv.offsetWidth / 2);
        mouseY = oEvent.clientY - (oDiv.offsetTop + oDiv.offsetHeight / 2);

        mouseX /= 5;
        mouseY /= 5;
    };

    setInterval(update, 30);
    refreshNavBGC();
    userSet();

    // console.log(card.length);
    // console.log(icon.length);
    // document.getElementsByClassName('totodo')[0].onclick = toPage(2);
    // function () {
    //     document.getElementsByClassName('todo')[0].style.display = 'block';
    //     document.getElementsByClassName('notes')[0].style.display = 'none';
    // }
    // document.getElementsByClassName('tonote')[0].onclick = function () {
    //     document.getElementsByClassName('notes')[0].style.display = 'block';
    //     document.getElementsByClassName('todo')[0].style.display = 'none';
    // }
};
// 刷新手机导航栏背景色
function refreshNavBGC() {
    card[0].style.display = 'block';
    for (let i = 0; i < 4; i++) {
        icon[i].onclick = (function (i) {
            return function () {
                toPage(i);
            }
        })(i);
    }
}


// 跳转至指定页
function toPage(index) {
    card[index].style.display = 'block';
    card[index].style.zIndex = '999999999999999';
    icon[index].style.backgroundColor = '#1485d5';

    for (let i = 0; i < 4; i++) {
        if (i == index) continue;
        card[i].style.display = 'none';
        card[i].style.zIndex = '1';
        icon[i].removeAttribute('style');
    }
}


// 返回最终样式函数，兼容IE和DOM，设置参数：元素对象、样式特性   
function getDefaultStyle(obj, attribute) {
    return obj.currentStyle ? obj.currentStyle[attribute] : document.defaultView.getComputedStyle(obj, false)[attribute];
}



// 跳转至指定笔记
function toedit(id) {
    var a = document.getElementById("id").value;
    document.getElementById('search_a').href = "edit.php?search_text=" + a;
}

// 用户中心的开启关闭
function userSet() {
    var card = document.getElementsByClassName('userView')[0];
    var closebtn = document.getElementsByClassName('close')[0];
    var openbtn = document.getElementsByClassName('openuser')[0];

    openbtn.onclick = function () {
        card.style.display = "block";
    }
  
    closebtn.onclick = function (){
        card.style.animation='uptoremove 0.5s';
        setTimeout(function(){
            card.removeAttribute('style');

        },500);
    }
    //   $(".close").bind("click", function () {
    //     $(".userView").removeAttr("style");
    //     $(".userView").fadeOut("4000");
    // });
}