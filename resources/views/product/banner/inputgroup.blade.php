<?php
use App\Models\Product\Banner;

//Menu Map
$cnt=0;
?>

        <div class="panel-body">
        <form action="<?= url('banner/postquery') ?>" method="post" id="query_form">
        	<input type="hidden" name="tableColumns"   value="<?= implode(',', $columns)?>">
        	
        	<div class="panel-group" id="accordion">
			<div class="panel panel-default">
			<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseexample">
					点击我进行折叠，再次点击我进行展开。
				</a>
			</h4>
			</div>
			
			<div id="collapseexample" class="panel-collapse collapse in">
			<div class="panel-body">
            <div class="form-group pull-in clearfix">
                <?php foreach ($columns as $k=> $v): ?>
                <?php 
                
                if(in_array($v, array('operator','create_time','update_time','img_item_map'))) {
                    continue;
                }
                if(isset(Banner::$fieldsMap[$v])) {       //Fields Map
                    $v1=Banner::$fieldsMap[$v]['name'];   //Fields Name
                    $desc=Banner::$fieldsMap[$v]['desc']; //Fields Desc
                    $v3="";
                    if (isset($fillData[0]->$v)) {         //Fill Data(from update)
                        $v3=$fillData[0]->$v;
                    }
                }
                ?>
                <?php if ($cnt%4 == 0 && $cnt != 0) {?>
                </div>
                <div class="form-group pull-in clearfix"><?php } ?>
                <?php if ($v == "is_display"):        //Judge is_display ?>			
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
                <?php elseif ($v == 'type'): ?>
                <div class="col-sm-3">
                <label><?= $v1 ?></label>
                <div class="">
                  <button data-toggle="dropdown" class="col-md-12 form-control btn btn-sm btn-default dropdown-toggle">
                    <span class="dropdown-label"><?= $desc ?></span>
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu dropdown-select">
                  	<?php if($v3 == 1) :?>
                  	<li class="active">
                      <input type="radio" name="<?= $v ?>" value="1">
                      <a href="#">首页闪屏</a>
                    </li>
                    <?php else: ?>
                  	<li class="active">
                      <input type="radio" name="<?= $v ?>" value="2">
                      <a href="#">Banner</a>
                    </li>
                    <?php endif; ?>
                	<li class="">
                      <input type="radio" name="<?= $v ?>" value="1">
                      <a href="#">首页闪屏</a>
                    </li>
                    <li class="">
                      <input type="radio" name="<?= $v ?>" value="2">
                      <a href="#">Banner</a>
                    </li>                 
                  </ul>
                  </div>
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
          </div>
          </div>
          </div>
          
          <div class="form-group pull-in clearfix">
          	<div class="">
                <label class="col-sm-12">图物映射。格式：图片   空格   商品id，多个请换行。</label>
                <div class="col-sm-12">
                    <textarea id="editor" class="form-control wysiwyg_content" 
                    placeholder="示例：http://7xussr.com1.z0.glb.clouddn.com/ic_start.png	22" style="overflow:scroll;height:260px;max-height:500px"><? if(!empty($fillData[0]->img_item_map)) {
                        echo Banner::array2str(json_decode($fillData[0]->img_item_map, true));
                    }
                    ?></textarea>
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