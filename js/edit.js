function InnerHTML(var text){
	document.getElementById("content").innerHTML = 'text';
}
function userSet() {
    var card = document.getElementsByClassName('userView')[0];
    var closebtn = document.getElementsByClassName('close')[0];
    var openbtn = document.getElementsByClassName('fa-info-circle')[0];

    openbtn.onclick = function () {
        card.style.display = "block";
    }
  
    closebtn.onclick = function (){
        card.style.animation='uptoremove 0.5s';
        setTimeout(function(){
            card.removeAttribute('style');
        },500);
    }
}