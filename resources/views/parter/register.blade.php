<!DOCTYPE html>
<html>
<head>
<title>西柚民宿 | 商户平台</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/template/materialize/css/materialize.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="container">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
        <div class="col s12 l8 offset-l2">
            <h5 class="grey-text text-darken-4">商户平台</h5>
            <p class="grey-text text-darken-4"><span>Hi，欢迎注册</span><a class="right grey-text" href="<?= url("parter/manual") ?>">使用教程</a></p>
        </div>
    </div>

    <form action="<?= url("parter/doregister") ?>" method="post">
    <div class="form-group">{!! csrf_field() !!}</div>
    <div class="row">
        <div class="col s12 l8 offset-l2">
            <div class="input-field">
                <input id="username" type="text" name="username">
                <label for="username" class="">账号</label>
            </div>
        </div>
        <div class="col s12 l8 offset-l2">
            <div class="input-field">
                <input id="password" type="password" name="password">
                <label for="password" class="">密码</label>
            </div>
        </div>
        <div class="col s12 l8 offset-l2">
            <div class="input-field">
                <input id="password2" type="password" name="password2">
                <label for="password" class="">确认密码</label>
            </div>
        </div>
    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
        <div class="col s12 l8 offset-l2">
            <button class="btn btn-large waves-effect waves-light black col s12 l12 m12" type="submit" name="action">
                注册
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l8 offset-l2">
            <a class="grey-text" href="<?= url("parter/login")?>">去登录</a>
        </div>
    </div>
    </form>
</div>

<script src="/template/materialize/js/materialize.min.js"></script>
</body>
</html>
