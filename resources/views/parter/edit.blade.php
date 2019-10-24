<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="/template/materialize/css/materialize.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php 
    $category = App\Models\Constant::$categoryMap;
?>
<div class="row"></div>

<div class="">
    @include('parter.nav')
    <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h5 class="grey-text text-darken-4 s6 m6 l6">商品编辑</h5>
        </div>
    </div>
</div>


<div class="">
<form id="my_form" action="<?= url('parter/doedit') ?>" method="post" enctype="multipart/form-data" >
    <div class="form-group">{!! csrf_field() !!}</div>
    <div class="row">
        <input id="id" type="hidden" name="id" value="<?=$one->id ?>">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="name" name="name" type="text" value="<?= $one->name ?>">
                <label for="name" class="">名称</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="price" type="number" name="book_max" value="<?= $one->book_max ?>">
                <label for="price" class="">最多预订</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="price" type="number" name="price" value="<?= $one->price ?>">
                <label for="price" class="">价格</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="contact" type="text" name="contact" value="<?= $one->contact ?>">
                <label for="contact" class="">联系电话</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="detail_uri" type="text" name="detail_uri" value="<?= $one->detail_uri ?>">
                <label for="detail_uri" class="">详情页h5</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
                <input id="video_uri" type="text" name="video_uri" value="<?= $one->video_uri ?>">
                <label for="video_uri" class="">视频地址</label>
            </div>
        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="input-field">
            <textarea id="attrs" name="attrs" class="materialize-textarea"><?= $one->attrs ?></textarea>
                <label for="attrs">属性</label>
            </div>
        </div>

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <img src="<?= $one->thumbnail ?>" class="responsive-img left materialboxed" width=120 height=120 style="margin:1px;">
        </div>

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="file-field input-field">
                <div class="btn white black-text waves-effect waves-yellow">
                    <span>上传缩略图</span>
                    <input type="file" name="thumbnail">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text" placeholder="上传一张照片">
                </div>
            </div>
        </div>

        <div class="row"></div>

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <?php $slideimgs = explode(',', base64_decode($one->slideimgs)); ?>
            <?php foreach ($slideimgs as $img): ?>
            <img src="<?= $img ?>" class="responsive-img left materialboxed" width=120 height=120 style="margin:1px;">
            <?php endforeach;?>
        </div>

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <div class="file-field input-field">
                <div class="btn white black-text waves-effect waves-yellow">
                    <span>上传滑动图</span>
                    <input type="file" multiple name="slideimgs[]">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path" type="text" placeholder="上传多张照片">
                </div>
            </div>
        </div>
        
        <div class="row"></div>
        <div class="col s12 m8 offset-m2 l6 offset-l3 input-field">
            <select class="" name="category_id">
                <option value="<?= $one->category_id ?>"><?= $category[$one->category_id] ?></option>
                <?php foreach($category as $key=> $value): ?>
                <option value="<?= $key ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>
            <label>商品分类</label>
        </div>

        <div class="row"></div>
        <div class="col s12 m8 offset-m2 l6 offset-l3 input-field">
            <select name="is_onsale">
                <?php if($one->is_onsale == 1): ?>
                <option value="1">已上线</option>
                <?php else: ?>
                <option value="0">已下线</option>
                <?php endif ?>
                <option value="1">上线</option>
                <option value="0">下线</option>
            </select>
            <label>上线状态</label>
        </div>

        <div class="row"></div>
        <div class="row"></div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <button class="btn btn-large waves-effect waves-yellow white red-text col s12 l12 m12" type="sumbit">更新</button>
        </div>
    </div>
    </form>
</div>


<div class="row"></div>
<div class="row">
    <div id="modal" class="modal bottom-sheet">
        <div class="modal-content">
            <div class="center-align">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>正在处理，请勿离开...</p>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script src="/template/materialize/js/jquery.min.js"></script>
<script src="/template/materialize/js/materialize.min.js"></script>

<script>
$('.fixed-action-btn').floatingActionButton();
$(function(){    
    $('.modal').modal({dismissible: false});
    $('select').formSelect();
    $('.materialboxed').materialbox();
    $('.sidenav').sidenav();
});
$("#my_form").submit(function(){
    $("#modal").modal('open');
    return true;
});
</script>
</body>
</html>
