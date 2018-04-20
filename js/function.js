/*function boldFunction(){
	var content = document.getElementByld("content");
	content.style.fontWeight = "bold";
}*/
/*	window.onload=function(){
	var icon01 = document.getElementByld("iconname");
	icon01.onclick = boldFunction();
}
*/
	/*function icon02Function(){
		var icon02 = document.getElementByld("icon02");
		icon02.style.fontStyle = "italic";
	}
	function icon02Function(){
		var icon03 = document.getElementByld("icon03");
		icon03.style.textDecoration = "underline";
	}
	function icon04Function(){
		var icon04 = document.getElementByld("icon04");
		icon04.style.textDecoration = "line-through";
	}
	*/	

/*function boldFunction(){
		alert("123");
		var boldfont = document.getElementByld("icon01");
		boldfont.style.fontWeight = "bold";
	}
*/
/*var selectionStart, selectionEnd;
var textarea = document.getElementById("content");
document.onkeyup = document.onmouseup = function(event){
	event = event || window.event;
	var keyCode = event.keyCode || event.which;
	var userSelection;
	if (window.getSelection){
		userSelection = window.getSelection();
	}else if (document.selection){
		userSelection = document.selection.createRange();
	}
	var getRangeIndex = function(selectionObject){
		if (window.getSelection)
		return [textarea.selectionStart, textarea.selectionEnd];
		else{
			var range = document.selection.createRange();
			var selectTextLength = range.text.length;
			textarea.select();
			range.setEndPoint("StartToStart",document.selection.createRange());
			var selectTextPosition = range.text.length;
			range.collapse(false);
			range.moveEnd("character", -selectTextLength);
			range.moveEnd("character", selectTextLength);
			range.select();
			return [selectTextPosition - selectTextLength, selectTextPosition];
		}
	}
	var rangeIndex =getRangeIndex(userSelection);
	selectionStart = rangeIndex[0];
	selectionEnd = rangeIndex[1];
}
document.getElementsById("icon01").onClick = function(){
	textarea.value = textarea.value.substring(0,selectionStart) + '<b>'
	+ textarea.value.substring(selectionStart,selectionEnd) + '<b>'
	+ textarea.value.substring(selectionEnd);                                      
}*/
window.onload=function(){
	document.getElementById('icon01').onclick=boldFunction;
	document.getElementById('icon02').onclick=italFunction;
	document.getElementById('icon03').onclick=lineFunction;
	document.getElementById('icon04').onclick=striFunction;
	document.getElementById('icon05').onclick=leftFunction;                                               
	document.getElementById('icon06').onclick=centFunction;
	document.getElementById('icon07').onclick=righFunction;
	document.getElementById('font01').onclick=font01Function;
	document.getElementById('font02').onclick=font02Function;
	document.getElementById('font03').onclick=font03Function;
	document.getElementById('size01').onclick=font03Function;
	document.getElementById('size02').onclick=font03Function;
	document.getElementById('size03').onclick=font03Function;
}
function boldFunction(){                             
	var content=document.getElementById("content");
  	content.style.fontWeight="bold";
}
function italFunction(){
  	var content=document.getElementById("content");
  	content.style.fontStyle = "italic";
}
function lineFunction(){
  	var content=document.getElementById("content");
  	content.style.textDecoration = "underline";
}
function striFunction(){
  	var content=document.getElementById("content");
  	content.style.textDecoration = "line-through";
}
function leftFunction(){
  	var content=document.getElementById("content");
  	content.style.textAlign = "left";
}
function centFunction(){
  	var content=document.getElementById("content");
  	content.style.textAlign = "center";
}
function righFunction(){
  	var content=document.getElementById("content");
  	content.style.textAlign = "right";
}
function font01Function(){
  	var content=document.getElementById("content");
  	content.style.fontFamily = "宋体";
}
function font01Function(){
  	var content=document.getElementById("content");
  	content.style.fontFamily = "Work Sans";
}
function font01Function(){
  	var content=document.getElementById("content");
  	content.style.fontFamily = "arial black";
}
function font01Function(){
  	var content=document.getElementById("content");
  	content.style.fontSize = "small";
}
function font01Function(){
  	var content=document.getElementById("content");
  	content.style.fontSize = "medium";
}
function font01Function(){
  	var content=document.getElementById("content");
  	content.style.fontSize = "large";
}

function labelFunction(){
		var label = document.getElementById("label").value;
		var newopt = document.getElementById("newopt");
		var option = new Option(label);      
   		newopt.options.add(option);     
		}	
