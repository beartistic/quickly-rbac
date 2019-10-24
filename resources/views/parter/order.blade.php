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
            订单管理
            </h5>
            <p class="grey-text text-darken-4">管理用户入住的订单申请。</p>
        </div>
    </div>
</div>

<div class="">
    <div class="row">
        <?php foreach($result as $one): ?>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="card-panel z-depth-2 waves-effect">
                <div class="order-card" data-order-url="<?= action('Parter\ParterController@orderDetail', ['id' => $one->id]) ?>">
                    <p>
                        <span>订单日期：<?= $one->create_time ?></span>
                        <?php if($one->code == 1):?> 
                        <span class="right black-text order-status">已完成</span>
                        <?php elseif($one->code == 2 && $one->operator == 'usr'): ?>
                        <span class="right black-text order-status">用户取消</span>
                        <?php elseif($one->code == 2 && $one->operator == 'sys'): ?>
                        <span class="right black-text order-status">管家取消</span>
                        <?php else: ?>
                        <span class="right red-text order-status">未完成</span>
                        <?php endif ?>
                    </p>
                    <div class="divider" tabindex="-1"></div>
                    <div class="row"></div>
                    <div class="row valign-wrapper">
                        <div class="col s6">
                          <img src="<?= $one->thumbnail ?>" alt="" class="responsive-img">
                        </div>
                        <div class="col s6">
                          <span class="black-text">
                            ￥<?= $one->price ?>
                          </span>
                          <span class="black-text">
                            /晚
                          </span>
                          <br/>
                          <span class="grey-text">
                            <?= $one->name ?>
                          </span>
                        </div>
                    </div>
                    <p class="black-text"><?= $one->booker ?>，订于<span class=''><?= $one->book_date ?></span>，共<?= $one->book_count ?>晚</p>
                </div>
                <p>
                    <span>金额：</span><span class="red-text">&yen;<?= $one->money ?></span>
                    <span class="white right dropdown-trigger" data-target='dropdown<?= $one->id ?>'>
                        <i class="waves-effect waves-light black-text material-icons">more_vert</i>
                    </span>
                    <ul id='dropdown<?= $one->id ?>' class='dropdown-content'>
                        <?php if($one->code == 0): ?>
                        <li><a class="black-text deny-btn modal-trigger" href="#modal" data-deny-url="<?= action('Parter\ParterController@orderDeny', ['id' => $one->id, 'type'=>'ajax']) ?>">驳回申请</a></li>
                        <?php endif; ?>
                        <?php if($one->code == 2): ?>
                        <li><a class="black-text discard-btn" data-discard-url="<?= action('Parter\ParterController@orderDiscard', ['id' => $one->id, 'type'=>'ajax']) ?>">删除订单</a></li>
                        <?php endif; ?>
                        <li style="display:none;"><a class="black-text discard-btn" data-discard-url="<?= action('Parter\ParterController@orderDiscard', ['id' => $one->id, 'type'=>'ajax']) ?>">删除订单</a></li>
                         <li><a class="black-text" href="tel:<?= $one->cellphone ?>">电话联系</a></li>
                    </ul>
                </p>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<div class="row"></div>
<div class="row">
    <div id="modal" class="modal bottom-sheet ">
        <div class="modal-content">
            <h6>您将驳回用户的入住申请，是否确认？</h6>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-yellow grey-text btn-flat dm-cancel">取消</a>
            <a href="#!" class="modal-close waves-effect waves-yellow red-text btn-flat dm-confirm">确认</a>
        </div>
    </div>
</div>
<script src="/template/materialize/js/jquery.min.js"></script>
<script src="/template/materialize/js/materialize.min.js"></script>
<script>
$('.dropdown-trigger').dropdown();
$('.fixed-action-btn').floatingActionButton();
$(document).ready(function(){$('.modal').modal();$('.sidenav').sidenav({draggable:true});});

////order detail
$('.order-card').click(function(){
    window.location.href=$(this).data('order-url');
});

////order deny
var denyUrl;
var denyEle; 
$('.deny-btn').click(function(){
    denyEle = $(this);
    denyUrl = $(this).data('deny-url').trim();
    return true;
});
$('.dm-confirm').click(function(){
  $.ajax({
    "url": denyUrl,
    "type": "get",
    "dataType" : "html",
    "success" : function (data) {
       if (data==0) {M.toast({html: '驳回失败', displayLength: 2000});return;}
       M.toast({html: '驳回成功', displayLength: 2000});
       denyEle
       .parent()
       .parent()
       .parent()
       .siblings('.order-card')
       .find('.order-status')
       .html('管家取消');
       denyEle
       .parent()
       .siblings('li')
       .show();
       denyEle
       .parent()
       .remove();
    }
  });
});


////order discard
$('.discard-btn').click(function(){
  var element = $(this);
  $.ajax({
    "url": $(this).data('discard-url').trim(),
    "type": "get",
    "dataType" : "html",
    "success" : function (data) {
       if (data==0) {M.toast({html: '删除失败', displayLength: 2000});return;}
       M.toast({html: '删除成功', displayLength: 2000});
       element
       .parent()
       .parent()
       .parent()
       .parent()
       .fadeOut(400);
    }
  });
});
</script>
</body>
</html>
