<?php

use App\Models\Zuimei\UserRole;

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
                <th><?php if(isset(UserRole::$fieldsMap[$v])) echo UserRole::$fieldsMap[$v]['name']; else echo $v; ?></th>
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
                <?php if ($k1 == "role_id"): ?>
                <td><?= $roleMap[$v1]['name'] ?></td>
                <?php else:?>
                <td><?= $v1 ?></td>
                <?php endif;?>
                <?php endforeach; ?>
                <td style="text-align:center;">
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
             	<input type="hidden" id="requestUrl" value="<?= url("userrole/postquery") ?>">
             	<input type="hidden" id="tableColumns" value="<?=implode(',', $columns) ?>">
           </div>