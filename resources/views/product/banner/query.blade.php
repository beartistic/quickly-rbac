<?php
use App\Models\Product\Banner;

$categoryCollect = Banner::getFiledDistinct("id,category_name");
$categoryMap = Banner::format2Array($categoryCollect,'id','category_name');
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
                <?php if(in_array($v, array('comments','create_time','update_time','operator'))) continue; ?>
                <th><?php if(isset(Banner::$fieldsMap[$v])) echo Banner::$fieldsMap[$v]['name']; else echo $v; ?></th>
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
                <?php if(in_array($k1, array('comments','create_time','update_time','operator'))) : ?>
                <?php continue; ?>
                <?php elseif ($k1 == "img_item_map"): ?>
                <td title='<?= $v1 ?>'><?= substr($v1, 0, 50)?></td>
                <?php elseif ($k1 == "type"): ?>
                <?php if ($v1 == '1'): ?>
                <td>闪屏</td>
                <?php else :?>
                <td>Banner</td>
                <?php endif; ?>
                <?php elseif ($k1 == "is_display"): ?>
                <?php if ($v1 == '1'): ?>
                <td>是</td>
                <?php else :?>
                <td>否</td>
                <?php endif; ?>
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
             	<input type="hidden" id="requestUrl"  value="<?= url("banner/postquery") ?>">
             	<input type="hidden" id="tableColumns" value="<?=implode(',', $columns) ?>">
           </div>
