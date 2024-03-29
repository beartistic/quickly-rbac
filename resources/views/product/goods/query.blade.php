<?php
use App\Models\Product\Goods;

$categoryCollect = Goods::getFiledDistinct("id,category_name");
$categoryMap = Goods::format2Array($categoryCollect,'id','category_name');
?>
          <table class="table table-bordered b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="checkbox m-n i-checks">
                    <input type="checkbox">
                    <i></i>
                  </label>
                </th>
                <?php foreach ($columns as $k=> $v): ?>
                <?php if(in_array($v, array('attrs','create_time','update_time','operator','storages','favorites','pageview','intro'))) continue; 
                ?>
                <th><?php if(isset(Goods::$fieldsMap[$v])) echo Goods::$fieldsMap[$v]['name']; else echo $v; ?></th>
                <?php endforeach; ?>
                <th style="text-align:center;">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($records as $k=> $v): ?>
              <tr>
                <td>
                  <label class="checkbox m-n i-checks">
                    <input type="checkbox" name="id[]" value="<?= $v->id ?>" >
                    <i></i>
                  </label>
                </td>
                <?php foreach ($v as $k1=> $v1): ?>
                <?php if(in_array($k1, array('attrs','create_time','update_time','operator','storages','favorites','pageview','intro'))) : ?>
                <?php continue; ?>
                <?php elseif($k1 == "thumbnail"): ?>
                <td align="center">
                <div class="previewimg">
                    <img src="<?= $v1 ?>" style="width:30px;height:30px;"/>
                </div>
                </td>
				<?php elseif($k1 == "detail_uri"): ?>
                <td>
                  <?php if($v1): ?>
                  <a href="<?= $v1 ?>" target='_blank'>查看</a>
                  <?php endif; ?>
                </td>
				<?php elseif($k1 == "video_uri"): ?>
                <td>
                  <?php if($v1): ?>
                  <a href="<?= $v1 ?>" target='_blank'>播放</a>
                  <?php endif;?>
                </td>
                <?php elseif($k1 == "slideimgs"): ?>
                <td>
                <div class="previewimg">
                <?php foreach (explode(',', 
                        str_replace(array(' ,',', ',' |','| '), ',', 
                            trim(base64_decode($v1)))) as $img) : ?>
                    <img src="<?= $img ?>" style="width:30px;height:30px;margin:1px;"/>
                <?php endforeach; ?>
                </div>
                </td>
                <?php elseif($k1 == "intro"): ?>
                <td>
                <div class="previewimg">
                <?php foreach (explode(',', 
                        str_replace(array(' ,',', ',' |','| '), ',', 
                            trim(base64_decode($v1)))) as $img) : ?>
                    <img src="<?= $img ?>" style="width:30px;height:30px;margin:1px;"/>
                <?php endforeach; ?>
                </div>
                </td>
                <?php elseif($k1 == "is_onsale"): ?>
                <td><?php if($v1 == 1) echo '是'; else echo '否'; ?></td>
				<?php elseif($k1 == "category_id"): ?>
                <td><? if(isset($categoryMap[$v1])) echo $categoryMap[$v1];else echo $v1; ?></td>
                <?php else : ?>
                <td><?= $v1 ?></td>
                <?php endif; ?>
                <?php endforeach; ?>
                <td style="text-align:center;">
                  <a class="btn btn-rounded btn-sm btn-icon btn-default editRecord"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-rounded btn-sm btn-icon btn-default removeRecord" data-toggle="modal" data-target="#mymodel"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <div style="display:none;" class='row'>
             	<input type="hidden" id="currentPage" value="<?= $page ?>">
             	<input type="hidden" id="rowsPerPage" value="<?= $pageSize ?>">
             	<input type="hidden" id="totalPages"  value="<?= $totalPages ?>">
             	<input type="hidden" id="totalRows"   value="<?= $total ?>">
             	<input type="hidden" id="requestUrl"  value="<?= url("goods/postquery") ?>">
             	<input type="hidden" id="tableColumns" value="<?=implode(',', $columns) ?>">
           </div>
