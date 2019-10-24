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
            商品橱柜
            <a class="btn-floating waves-effect waves-light red right" href="<?= url('parter/add') ?>"><i class="material-icons">add</i></a>
            </h5>
            <p class="grey-text text-darken-4">编辑商品信息、快速发布。</p>
        </div>
    </div>
</div>

<div class="">
    <div class="row">
        <?php foreach($result as $one): ?>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card small">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator responsive-img lazyload" data-original="<?= $one->thumbnail ?>">
                </div>
                <div class="card-content">
                    <div class="card-title activator grey-text text-darken-4">
                        ￥<?= $one->price ?>
                        <span class="white right dropdown-trigger" data-target='dropdown<?= $one->id ?>'>
                            <i class="waves-effect waves-light grey-text material-icons">more_vert</i>
                        </span>
                        <ul id='dropdown<?= $one->id ?>' class='dropdown-content'>
                            <li><a class="black-text" href="<?= action('Parter\ParterController@edit', ['id' => $one->id]) ?>">编辑</a></li>
                            <li><a class="red-text modal-trigger product" data-durl="<?= action('Parter\ParterController@delete', ['id' => $one->id]) ?>" href="#modal">删除</a></li>
                            <li class="divider" tabindex="-1"></li>
                        </ul>
                    </div>
                    <p><?= $one->name ?></p>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>


<div class="row"></div>
<div class="row">
    <div id="modal" class="modal bottom-sheet">
        <div class="modal-content">
            <h6> 删除后不可恢复，是否确认？</h6>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-yellow red-text btn-flat dm-confirm">确认</a>
            <a href="#!" class="modal-close waves-effect waves-yellow black-text btn-flat dm-cancel">取消</a>
        </div>
    </div>
</div>

<script src="/template/materialize/js/jquery.min.js"></script>
<script src="/template/materialize/js/jquery.lazyload.min.js"></script>
<script src="/template/materialize/js/materialize.min.js"></script>
<script>
$("img.lazyload").lazyload();
$('.dropdown-trigger').dropdown();
$(document).ready(function(){$('.modal').modal();$('.sidenav').sidenav();});

////delete product
var delÚrl='';
$('.product').click(function(){
    delUrl = $(this).data("durl");
});
$('.dm-confirm').click(function(){
    if (delUrl=='') return false;
    window.location.href=delUrl;
});
</script>
</body>
</html>
