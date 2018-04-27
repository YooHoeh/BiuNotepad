
//  实现上传文件的功能
$("#fileMutiply").change(function eventStart() {
    console.log("上传了" + this.files.length + "个文件")
    var ss = this.files; //获取当前选择的文件对象
    for (var m = 0; m < ss.length; m++) { //循环添加进度条
        efileName = ss[m].name;
        if (ss[m].size > 1024 * 1024) {
            sfileSize = (Math.round(ss[m].size / (1024 * 1024))).toString() + 'MB';
        } else {
            sfileSize = (Math.round(ss[m].size / 1024)).toString() + 'KB';
        }

        $("#test").append(
        	"<li  id="+ m
        	+ "file><div class='progress'<div id=" 
        	+ m + "barj class='progressbar'></div></div><span class='filename'>" 
        	+ efileName + "</span><span id=" 
        	+ m + "pps class='progressnum'>" 
        	+ (sfileSize) + "</span></li>");
    }
})
