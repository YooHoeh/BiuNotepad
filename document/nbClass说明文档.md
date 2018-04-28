| 函数名                                          | 参数及返回值说明                                                              |
|-------------------------------------------------|-------------------------------------------------------------------------------|
| \__construct(\$userid,\$bookName,\$isStart = 0) | **构造函数，新建时使用**                                                      |
| updateNb(\$userid,\$bookName,\$newNbName)       | **更新时使用，静态函数（static） \$newNbName被修改后的内容**                  |
| deNb(\$userid,\$bookName)                       | **放入废纸篓时使用，静态函数（static） 会将该记事本下所有笔记一同放入废纸篓** |
| reNb(\$userid, \$bookName)                      | **从废纸篓恢复时使用，静态函数（static） 会将该记事本下所有笔记一同恢复**     |
| deleteNb(\$userid,\$bookName)                   | **从废纸篓删除时使用，静态函数（static） 会将该记事本下所有笔记一同删除**     |
| isStart(\$userid,\$bookName,\$isStart = 1)      | **加星标记**                                                                  |
| timeSearch(\$userid)                            | **以更新时间排序，返回关联数组**                                              |
| fristSearch(\$userid)                           | **以首字符排序，返回关联数组**                                                |
| Search(\$userid,\$str)                          | **模糊查询，\$为查询字段，返回关联数组**                                      |

注：\$userid是用户id，\$bookName是笔记本的名称，除构造函数外均定义为静态函数，可使用
‘nbClass::函数名’ 调用。
