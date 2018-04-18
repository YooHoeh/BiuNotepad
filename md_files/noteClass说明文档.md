| 函数名                                            | 参数及返回值说明                                                                   |
|---------------------------------------------------|------------------------------------------------------------------------------------|
| \__construct(\$userid,\$content,\$notebookid = 0) | **构造函数，创建笔记时调用。 当笔记不属于任何笔记本时，\$notebokkid不填，默认为0** |
| updateNote(\$userid,\$content,\$newContent)       | **更新笔记内容。 \$newContent为要更新的内容**                                      |
| deNote(\$userid,\$content)                        | **放入废纸篓。**                                                                   |
| reNote(\$userid, \$content)                       | **从废纸篓还原**                                                                   |
| deleteNote(\$userid,\$content)                    | **从废纸篓删除**                                                                   |
| isStart(\$userid,\$content,\$isStart = 1)         | **加星标记，默认给标记加星，也可给\$isStart传0，代表去星**                         |
| timeSearch(\$userid)                              | **按更新时间降序排列用户所有的笔记，返回二维关联数组**                             |
| fristSearch(\$userid)                             | **按首字符升序排列用户所有的笔记，返回二维关联数组**                               |
| notebookFristSearch(\$userid,\$notebookid)        | **按更新时间降序排列用户某个笔记本的笔记，返回二维关联数组**                       |
| notebookTimeSearch(\$userid,\$notebookid)         | **按首字符升序排列用户某个笔记本的笔记，返回二维关联数组**                         |
| Search(\$userid,\$str)                            | **模糊查询，\$str是要查询的字段，返回二维关联数组**                                |

事件部分
========

| 函数名                                       | 参数及返回值说明                                                            |
|----------------------------------------------|-----------------------------------------------------------------------------|
| remindTime(\$userid, \$content,\$remindTime) | **加入提醒时间\$remindTime格式为 y-m-d h:m:s**                              |
| getState(\$userid, \$content)                | **获取事件状态，即完成或未完成，返回0为未完成，1为完成**                    |
| addMark(\$userid, \$content,\$markid)        | **给事件增加标签，\$markid 即为标签的id，可以同时增加多个，以英文逗号分割** |
| deleteMark(\$userid, \$content,\$markid)     | **给事件增加标签，\$markid 即为标签的id，每次仅能删除一个**                 |
| findMark(\$userid, \$content)                | **查找该事件被添加的标签，返回含有标签内容的二维关联数组**                  |

注：\$userid是用户id，\$content是标签的内容，除构造函数外均定义为静态函数，可使用
‘noteClass::函数名’ 调用。
