//自动日期显示
var date = document.getElementById("date");
document.write('<script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>');
var currentDate = new Date();
var day = currentDate.getDate().toString();
var month = currentDate.getMonth().toString();
var year = currentDate.getFullYear().toString();
// var kuud = ["January","February","March","April","May ","June","July","August","September","October","November","December"]
var kuud = ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"]
month = kuud[month];
date.innerText = year + " " + month + "月 " + day + "日";



//QQ空间分享
var p = {
    url: location.href,
    showcount: '1',/*是否显示分享总数,显示：'1'，不显示：'0' */
    desc: ' ',/*默认分享理由(可选)*/
    summary: '',/*分享摘要(可选)*/
    title: '',/*分享标题(可选)*/
    site: '',/*分享来源 如：腾讯网(可选)*/
    pics: '', /*分享图片的路径(可选)*/
    style: '203',
    width: 98,
    height: 22
};
var s = [];
for (var i in p) {
    s.push(i + '=' + encodeURIComponent(p[i] || ''));
}
s = "http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?" + s;
document.getElementsByClassName("fa-qq")[0].parentElement.setAttribute("href", s);

// 搜索部分
function _onclick() {
    var a = document.getElementById("search_text").value;
    document.getElementById('search_a').href = "main.php?search_text="+a;
}
