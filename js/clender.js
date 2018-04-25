layui.use('laydate', function () {
    var laydate = layui.laydate;

    laydate.render({
        elem: '#clender'
        , position: 'static'
        ,mark: {
            '2018-04-21': ''
            ,'2018-04-25': '' 
            ,'2018-05-02': ''
          }
          ,done: function(value, date, endDate){
            window.location.assign('main.php?date='+value);
          }
   
        // ,showBottom: false
        , theme: '#7eb3db'
    });
})