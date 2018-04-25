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
    iconBarSrcSet();

   
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
    var userbtn = document.getElementsByClassName('openuser')[0];
    var pskbtn = document.getElementsByClassName('openpsk')[0];

    userbtn.onclick = function () {
        card.getElementsByTagName('iframe')[0].setAttribute('src','user.php');
        card.style.display = "block";
    }
    pskbtn.onclick = function () {
        card.getElementsByTagName('iframe')[0].setAttribute('src','setpsk.php');
        card.style.display = "block";
    }
  
    closebtn.onclick = function (){
        card.style.animation='uptoremove 0.5s';
        setTimeout(function(){
            card.removeAttribute('style');

        },500);
    }
}

 //根据笔记链接获取笔记id对图标添加相应链接
function iconBarSrcSet() { 
    var bar =  document.getElementsByClassName('iconBar');
    for(let i=0; i<bar.length;i++){
     var a = bar[i].parentNode.getElementsByTagName('a')[0];
     var id = a.getAttribute('href').substring(12);
     var star = bar[i].getElementsByClassName('fa-star-o')[0];
     var del = bar[i].getElementsByClassName('fa-trash-o')[0];
     bar[i].setAttribute("noteid",id);
     star.parentNode.setAttribute('href','main.php?starnote='+id);
     del.parentNode.setAttribute('href','main.php?delenote='+id);
    }
    
 }