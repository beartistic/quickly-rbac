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
            <p class="grey-text text-darken-4">Hi，欢迎登录</p>
        </div>
    </div>

    <form action="<?= url("parter/dologin") ?>" method="post">
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
    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
        <div class="col s12 l8 offset-l2">
            <button class="btn btn-large waves-effect waves-light black col s12 l12 m12" type="submit" name="action">
                登录
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l8 offset-l2">
            <a class="grey-text" href="<?= url("parter/register")?>">商家注册</a>
        </div>
    </div>
    </form>
</div>

<script src="/template/materialize/js/materialize.min.js"></script>
</body>
</html>
