<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/template/materialize/css/materialize.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="row"></div>

<div class="">
    @include('parter.nav')
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h5 class="grey-text text-darken-4 s6 m6 l6">
            常见问题
            </h5>
            <p class="grey-text">最近修改于 2019/07/31</p>
        </div>
    </div>
</div>

<div class="">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
        <p><h6>商户平台有没有APP端？</h6></p>
        <p class="grey-text">答：有，点击左上方红色的三条横杠按钮，在滑出菜单中选择“官方网站”选项，在新的页面点击二维码或者右下方悬浮的下载图标可进行下载。安装完成后从“我的”-“我是商户”进入。</p>
        <br>
        <p><h6>我怎么发布商品？</h6></p>
        <p class="grey-text">答：点击左上方红色的三条横杠按钮，在滑出菜单中选择“商品管理”选项，在打开的商品管理页面点击红色+号按钮，打开商品发布页面，填写信息完成发布。</p>
        <br>
        <p><h6>商品发布后APP上无法搜索到，什么原因？</h6></p>
        <p class="grey-text">答：搜索引擎未收录导致，索引每1小时会更新。</p>
        <br>
        <p><h6>商品发布页中无法选择多张图片？</h6></p>
        <p class="grey-text">答：原因是微信内置浏览器不支持多个文件上传。解决办法：1）请使用西柚民宿APP从“我的”-“我是商户”进入打开，且友好（极力推荐）；2）使用手机浏览器打开，网址是admin.seeyou.biz。</p>
        <br>
        <p><h6>商品发布页中属性如何填写？</h6></p>
        <p class="grey-text">答：一行一个属性，属性名和属性值用多个空格隔开即可；注意：最后的一个属性是标签集，APP以标签形式展示，多个标签用逗号隔开。举例：
        <pre class="grey-text">民宿位置    北京市朝阳区798艺术区<br/>品牌故事    xxxxxxxx<br/>特色标签    ins风格，简约，livingCoral</pre>
        </p>
        <br>
        <p><h6>我是自媒体，我有自己的图文和视频，怎么放上去？</h6></p>
        <p class="grey-text">答：平台有支持，需要在商品发布页中填写详情页h5地址、视频链接。</p>
        </div>
    </div>
</div>


<div class="row"></div>
<script src="/template/materialize/js/jquery.min.js"></script>
<script src="/template/materialize/js/materialize.min.js"></script>
<script>
$(document).ready(function(){$('.modal').modal();$('.sidenav').sidenav();});
</script>
</body>
</html>
