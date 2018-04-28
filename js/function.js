
//  图标字体改变功能的实现

$(function () {
	$('#icon01').toggle(
		function () {
			$('#content').css("font-weight", "bold");},
		function() {
			$('#content').css("font-weight", "normal");},
	);
	$('#icon02').toggle(
		function () {
			$('#content').css("font-style", "italic");},
		function() {
			$('#content').css("font-style", "normal");},
	);
	$('#icon03').toggle(
		function () {
			$('#content').css("text-decoration","underline");},
		function() {
			$('#content').css("text-decoration", "none");},
	);
	$('#icon04').toggle(
		function () {
			$('#content').css("text-decoration","line-through");},
		function() {
			$('#content').css("text-decoration", "none");},
	);
	$('#icon05').toggle(
		function () {
			$('#content').css("text-align","left");},
		function() {
			$('#content').css("text-align", "");},
	);
	$('#icon06').toggle(
		function () {
			$('#content').css("text-align","center");},
		function() {
			$('#content').css("text-align", "");},
	);
	$('#icon07').toggle(
		function () {
			$('#content').css("text-align","right");},
		function() {
			$('#content').css("text-align", "");},
	);
	$('#font01').toggle(
		function () {
			$('#content').css("font-family","宋体");},
		function() {
			$('#content').css("font-family", "");},
	);
	$('#font02').toggle(
		function () {
			$('#content').css("font-family","Work Sans");},
		function() {
			$('#content').css("font-family", "");},
	);
	$('#font03').toggle(
		function () {
			$('#content').css("font-family","微软雅黑");},
		function() {
			$('#content').css("font-family", "");},
	);
	$('#size01').toggle(
		function () {
			$('#content').css("font-size","12px");},
		function() {
			$('#content').css("font-size", "");},
	);
	$('#size02').toggle(
		function () {
			$('#content').css("font-size","18px");},
		function() {
			$('#content').css("font-size", "");},
	);
	$('#size03').toggle(
		function () {
			$('#content').css("font-size","24px");},
		function() {
			$('#content').css("font-size", "");},
	);
});

// 屏蔽jq新版本toggle自动运行的问题
$.fn.toggle = function( fn ) {
	// Save reference to arguments for access in closure
	var args = arguments,
			guid = fn.guid || jQuery.guid++,
			i = 0,
			toggler = function( event ) {
				// Figure out which function to execute
				var lastToggle = ( jQuery._data( this, "lastToggle" + fn.guid ) || 0 ) % i;
				jQuery._data( this, "lastToggle" + fn.guid, lastToggle + 1 );

				// Make sure that clicks stop
				event.preventDefault();

				// and execute the function
				return args[ lastToggle ].apply( this, arguments ) || false;
			};

	// link all the functions, so any of them can unbind this click handler
	toggler.guid = guid;
	while ( i < args.length ) {
		args[ i++ ].guid = guid;
	}

	return this.click( toggler );
}

//  添加新标签的功能
function labelFunction(){
		var label = document.getElementById("label").value;
		var newopt = document.getElementById("newopt");
		var option = new Option(label);      
   		newopt.options.add(option);     
		}

// 文档信息弹窗

function DocInfoWindow() {
    var card = document.getElementsByClassName('userView')[0];
    var closebtn = card.getElementsByClassName('close')[0];
	var openbtn = document.getElementsByClassName('fa-info-circle')[0];
	var openshare = document.getElementsByClassName('fa-share-alt')[0];
	var st = document.getElementById('content').value;

	openshare.onclick = function (){
		card.getElementsByTagName('iframe')[0].setAttribute('src','http://qr.liantu.com/api.php?text='+st);
		card.style.display = "block";
		
	}
    openbtn.onclick = function () {
		document.getElementsByTagName('iframe')[0].setAttribute('src','documentInfo.php?content='+oldV);
        card.style.display = "block";

    }
    closebtn.onclick = function (){
        card.style.animation='uptoremove 0.5s';
        setTimeout(function(){
            card.removeAttribute('style');
        },500);
    }
    	// 笔记信息获取弹窗显示
		//  function showDocInfo() {
		// 	var infoIcon = document.getElementsByClassName('fa-info-circle')[0];
			
		// 	infoIcon.onclick = function(){

		//  	// <?php echo "<script> var content = \"\"</scipt>"?>
		// 	}
			
		//  }
}
// 笔记二维码分享
function noteShare(){
	

}
//  文本框数字长度指示器
$(function(){
  $("#content").keyup(function(event) {
     var current = $(this).val().length; //赋予变量current为该文本域输入的长度
     if(current >= 800){ //如果当输入长度大于140字时
        if(event.which!==0 && event.which!==8){ //如果允许删除键（ascll码为0）和退格键（ascll为8）工作
            event.preventDefault(); //阻止默认事件
        }
     }
     $("#word").text(800-current); 
  }); 

})
