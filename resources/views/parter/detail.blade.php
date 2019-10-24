<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="format-detection" content="telephone=yes"/>
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
            订单详情
            </h5>
            <p class="grey-text text-darken-4"></p>
        </div>
    </div>
</div>

<div class="">
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="divider" tabindex="-1"></div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <p><span class="">订单编号</span><span class="right"><?= $result->id ?></span></p>
            <p><span class="">创建时间</span><span class="right"><?= $result->create_time ?></span></p>
            <p>
                <span class="">订单状态</span><span class="right">
                <?php 
                if ($result->code == 1) echo "已完成"; 
                elseif($result->code == 2 && $result->operator == 'sys') echo "管家取消";
                elseif($result->code == 2 && $result->operator == 'usr') echo "用户取消";
                else echo "未完成";
                ?>
                </span>
            </p>
            <p><span class="">预订日期</span><span class="right"><?= $result->book_date ?></span></p>
            <p><span class="">预订时间</span><span class="right"><?= $result->book_time ?></span></p>
            <p><span class="">购买数量</span><span class="right"><?= $result->buy_count ?></span></p>
            <p><span class="">订单金额</span><span class="right">&yen;<?= $result->money ?></span></p>
            <p><span class="">备注信息</span><span class="right"><?= $result->remark ?></span></p>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="divider" tabindex="-1"></div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <p><span class="">预订人</span><span class="right"><?= $result->booker ?></span></p>
            <p><span class="">联系电话</span><span class="right"><a href="tel:<?= $result->cellphone ?>"><?= $result->cellphone ?></a></span></p>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="row"></div>
            <div class="row"></div>
            <div class="">
                <?php if($result->code == 0): ?>
                <a class="btn btn-large waves-effect waves-light white red-text col s12 l12 m12" href="<?= action('Parter\ParterController@orderDeny', ['id' => $result->id, 'type'=>'sync']) ?>">驳回申请</a>
                <?php else: ?>
                <?php if($result->discard == 0): ?>
                <a class="btn btn-large waves-effect waves-light white red-text col s12 l12 m12" href="<?= action('Parter\ParterController@orderDiscard', ['id' => $result->id, 'type'=>'sync']) ?>">删除订单</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<script src="/template/materialize/js/jquery.min.js"></script>
<script src="/template/materialize/js/jquery.lazyload.min.js"></script>
<script src="/template/materialize/js/materialize.min.js"></script>
<script>
$("img.lazyload").lazyload();
$('.fixed-action-btn').floatingActionButton();
$(document).ready(function(){$('.modal').modal();$('.sidenav').sidenav({draggable:true});});
</script>
</body>
</html>
