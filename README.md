# uploadPage
字面意思，可用来收集各种图片

# 目录结构
- index.php       主页，写了一堆马蜂奇特的`html`，但能用  
- upload.php      用来对`post`来的图片进行检查并以`name-id.jpg`的统一格式保存图片  
- checker.php     配合`upload.php`使用，里面有检查文件、检查姓名的函数（可以在这里修改合法条件）  
- getImage.php    瞎写的接口，如果图片存在（已经上传）就返回图片目录，否则返回`图片不存在`  
- uplaod_files    用来存放传上来的图片  
- src   用来存放配置文件
  - config.js     主要的配置文件，可以在这个文件中修改页面
  - getConfig.php 解决`config.js`会被浏览器缓存造成更新不及时的问题，访问它会跳转到`config.js?ts=xxxxxxx`  


# 现存的问题
- 输入对应姓名就可以看到TA上传的图片，所以不建议在公共场合用来收集带有敏感信息的图片
- 因为`vue`的实时渲染问题，可能会导致对`getImage.php`的多次访问
- 某个巨说可以传木马上去，~~但我认为只能传不能运行~~ （有建议可以联系窝
