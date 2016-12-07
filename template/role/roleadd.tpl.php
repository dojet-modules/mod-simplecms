<?php
$rolename = isset($tpl_role) ? $tpl_role['rolename'] : '';
$rid = isset($tpl_role) ? $tpl_role['rid'] : '';
$pids = isset($tpl_role) ? $tpl_role['pids'] : array();
?>
<form class="form-horizontal" role="form" action="/role/commit" method="post">
  <input type="hidden" name="rid" value="<?php echo safeHtml($rid); ?>" />
  <div class="form-group">
    <label for="rolename" class="col-sm-2 control-label">角色名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="rolename" name="rolename" placeholder="角色名称"
      value="<?php echo safeHtml($rolename); ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">权限</label>
    <div class="col-sm-10">
      <?php foreach ($tpl_pms as $pid => $permission) : ?>
        <label class="checkbox-inline">
          <input type="checkbox" name="pids[]" id="pms<?php echo $pid; ?>" value="<?php echo $pid; ?>"
<?php echo in_array($pid, $pids) ? 'checked' : ''; ?>
          >
          <?php echo safeHtml($permission); ?>
        </label>
      <?php endforeach ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>
