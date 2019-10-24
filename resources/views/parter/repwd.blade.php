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
<div class="">
    <div class="row"></div>
    @include('parter.nav')
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h5 class="grey-text text-darken-4">商户平台 - 安全中心</h5>
            <p class="grey-text text-darken-4">更改密码</p>
        </div>
    </div>

    <form action="<?= url("parter/repwd") ?>" method="post">
    <div class="form-group">{!! csrf_field() !!}</div>
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="password" type="password" name="password">
                <label for="password" class="">原始密码</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="password" type="password" name="password1">
                <label for="password" class="">新的密码</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="password2" type="password" name="password2">
                <label for="password" class="">确认密码</label>
            </div>
        </div>
    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <button class="btn btn-large waves-effect waves-light black col s12 l12 m12" type="submit" name="action">
                重置密码
                <i class="material-icons right">send</i>
            </button>
        </div>
    </div>
    </form>
</div>

<script src="/template/materialize/js/jquery.min.js"></script>
<script src="/template/materialize/js/materialize.min.js"></script>
<script>
$(document).ready(function(){$('.modal').modal();$('.sidenav').sidenav({draggable:true});});
</script>
</body>
</html>
