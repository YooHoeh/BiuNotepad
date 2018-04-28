| 函数名                                          | 参数及返回值说明                                                                                               |
|-------------------------------------------------|----------------------------------------------------------------------------------------------------------------|
| \__construct(\$userid,\$markName,\$isStart = 0) | **labelClass的构造函数，新建标签时使用 \$userid用户的id，\$markName标签的名字，\$isStart是否加星，默认不加星** |
| updateLabel(\$userid,\$markName,\$newMarkName)  | **更新标签时使用，静态函数（static） \$userid，\$markName，\$newMarkName被修改后的内容**                       |
| deleteLabel(\$userid,\$markName)                | **删除标签时使用，静态函数（static）**                                                                         |
| isStart(\$userid,\$markName,\$isStart = 1)      | **标签加星时使用，静态函数（static） \$isStart默认为1，即加星，传0即去掉标记**                                 |
| timeSearch(\$userid)                            | **以时间最新排序，返回关联数组**                                                                               |
| fristSearch(\$userid)                           | **以首字排序，返回关联数组**                                                                                   |

注：\$userid是用户id，\$markName是标签的内容，除构造函数外均定义为静态函数，可使用
‘labelClass::函数名’ 调用。
