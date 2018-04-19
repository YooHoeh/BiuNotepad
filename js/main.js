window.onload = function () {
 refreshNavBGC();
 document.getElementsByClassName('totodo')[0].onclick=function(){
    document.getElementsByClassName('todo')[0].style.display='block';
    document.getElementsByClassName('todo')[0].style.zIndex='99999999999999';
 }
 document.getElementsByClassName('tonote')[0].onclick=function(){
    document.getElementsByClassName('notes')[0].style.display='block';
    document.getElementsByClassName('notes')[0].style.zIndex='99999999999999';
 }
}
// 刷新手机导航栏背景色
function refreshNavBGC(){
    var card = [];
    var icon = [];
    card = document.getElementsByClassName('card');
    icon = document.getElementsByClassName('hideicon');
    card[0].style.display = 'block';
    for (var i = 0; i < 4; i++) {
        if (getDefaultStyle(card[i], 'display') == 'block') {
            console.log("第" + i + "个显示");
            icon[i].style.backgroundColor = '#1485d5';
        } else {
            console.log("第" + i + "个没显示");
        }
        icon[i].onclick = function(){
            for(var j = 0; j < 4; j++){
                if (i == j) {
                    card[j].style.display='block';
                }else{
                    card[j].style.display='none';
                }

            }
        }
    }
}

function toPage(){
    
}
// 返回最终样式函数，兼容IE和DOM，设置参数：元素对象、样式特性   
function getDefaultStyle(obj, attribute) {
    return obj.currentStyle ? obj.currentStyle[attribute] : document.defaultView.getComputedStyle(obj, false)[attribute];
}




