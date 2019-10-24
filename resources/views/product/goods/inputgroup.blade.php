<?php
use App\Models\Product\Goods;

//Menu Map
$cnt=0;
$categoryCollect = Goods::getFiledDistinct("id,category_name");
$categoryMap = Goods::format2Array($categoryCollect,'id','category_name');
?>

        <div class="panel-body">
        <form action="<?= url('goods/postquery') ?>" method="post" id="query_form">
        	<input type="hidden" name="tableColumns"   value="<?= implode(',', $columns)?>">
			<div class="panel-body">
            <div class="form-group pull-in clearfix">
                <?php foreach ($columns as $k=> $v): ?>
                <?php 
                if(in_array($v, array('operator','create_time','update_time','attrs')))
                {
                    continue;
                }
                if(isset(Goods::$fieldsMap[$v])) {       //Fields Map
                    $v1=Goods::$fieldsMap[$v]['name'];   //Fields Name
                    $desc=Goods::$fieldsMap[$v]['desc']; //Fields Desc
                    $v3="";
                    if (isset($fillData[0]->$v)) {       //Fill Data(from update)
                        $v3=$fillData[0]->$v;
                    }
                }
                ?>
                <?php if ($cnt%4 == 0 && $cnt != 0) {?>
                </div>
                <div class="form-group pull-in clearfix"><?php } ?>
                <?php if ($v == "category_id"):        //Judge category_pid ?>			
                <div class="col-sm-3">
                <label><?= $v1 ?></label>
                <div class="">
                  <button data-toggle="dropdown" class="col-md-12 form-control btn btn-sm btn-default dropdown-toggle">
                    <span class="dropdown-label"><?= $desc ?></span>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-select">
                  	<?php if($v3 == 0) :?>
                  	<li class="active">
                      <input type="radio" name="<?= $v ?>" value="0">
                      <a href="#">无</a>
                    </li>
                    <?php elseif ($v3 !== ""): ?>
                    <li class="active">
                      <input type="radio" name="<?= $v ?>" value="<?= $v3 ?>">
                      <a href="#"><?= "{$categoryMap[$v3]}" ?></a>
                    </li>
                    <?php endif; ?>
                    <?php foreach ($categoryCollect as $v2): ?>
                    <li class="">
                      <input type="radio" name="<?= $v ?>" value="<?= $v2->id ?>">
                      <a href="#"><?= "{$v2->category_name}" ?></a>
                    </li>
                	<?php endforeach; ?>
                	<li class="">
                      <input type="radio" name="<?= $v ?>" value="0">
                      <a href="#">无</a>
                    </li>
                  </ul>
                  </div>
                </div>
                <?php elseif ($v == "is_onsale"):        //Judge is_onsale ?>			
                <div class="col-sm-3">
                <label><?= $v1 ?></label>
                <div class="">
                  <button data-toggle="dropdown" class="col-md-12 form-control btn btn-sm btn-default dropdown-toggle">
                    <span class="dropdown-label"><?= $desc ?></span>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-select">
                  	<?php if($v3 == 0) :?>
                  	<li class="active">
                      <input type="radio" name="<?= $v ?>" value="0">
                      <a href="#">否</a>
                    </li>
                    <?php else: ?>
                  	<li class="active">
                      <input type="radio" name="<?= $v ?>" value="1">
                      <a href="#">是</a>
                    </li>
                    <?php endif; ?>
                	<li class="">
                      <input type="radio" name="<?= $v ?>" value="1">
                      <a href="#">是</a>
                    </li>
                    <li class="">
                      <input type="radio" name="<?= $v ?>" value="0">
                      <a href="#">否</a>
                    </li>                 
                  </ul>
                  </div>
                </div>
                <?php elseif(in_array($v, array('id'))) : ?>
                <?php $cnt--; ?>
            	<div class="col-sm-3" style="display:none;">
                    <label><?= $v1 ?></label>
                    <input class="form-control parsley-validated" name="<?= $v ?>" placeholder="<?= $desc ?>" value="<?= $v3 ?>" data-required="true" id="pwd">
                </div>
				<?php elseif(in_array($v, array('slideimgs', 'intro'))) : ?>
            	<div class="col-sm-3">
                    <label><?= $v1 ?></label>
                    <input class="form-control parsley-validated" name="<?= $v ?>" placeholder="<?= $desc ?>" value="<?= base64_decode($v3) ?>" data-required="true" id="pwd">
                </div>
                <?php else : ?>
            	<div class="col-sm-3">
                    <label><?= $v1 ?></label>
                    <input class="form-control parsley-validated" name="<?= $v ?>" placeholder="<?= $desc ?>" value="<?= $v3 ?>" data-required="true" id="pwd">
                </div>
                <?php endif; ?>
                <?php $cnt++; ?>
                <?php endforeach; ?>
          </div>
          </div>
          
          <div class="form-group pull-in clearfix">
          	<div class="">
                <label class="col-sm-3">商品属性</label>
                <div class="col-sm-12">
                    <textarea id="editor" class="form-control wysiwyg_content" placeholder="属性-值 kv格式（空格分隔），多个属性-值用换行符分隔" style="overflow:scroll;height:260px;max-height:500px"><? if(!empty($fillData[0]->attrs)) echo $fillData[0]->attrs; ?></textarea>
				</div>
          	</div>
		  </div>
        </form>
        </div>
		<footer class="panel-footer text-left bg-light lter">
            <button type="submit" class="btn btn-info btn-s-xs querySbtn">查询</button>
            <button type="submit" class="btn btn-info btn-s-xs newSbtn">新建</button>
            <button type="submit" class="btn btn-info btn-s-xs updateSbtn">更新</button>
        </footer>