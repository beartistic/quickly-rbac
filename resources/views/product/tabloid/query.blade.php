<?php
use App\Models\Product\Tabloid;

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
                <?php if(in_array($v, array('operator','create_time','update_time',
                    'content','video','vimg','image','favorite','pageview','comment'))) continue; 
                ?>
                <th><?php if(isset(Tabloid::$fieldsMap[$v])) echo Tabloid::$fieldsMap[$v]['name']; else echo $v; ?></th>
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
                <?php if(in_array($k1, array('operator','create_time','update_time',
                    'content','video','vimg','image','favorite','pageview','comment'))) : ?>
                <?php continue; ?>
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
             	<input type="hidden" id="requestUrl"  value="<?= url("tabloid/postquery") ?>">
             	<input type="hidden" id="tableColumns" value="<?=implode(',', $columns) ?>">
           </div>