<?php
// $rolename = isset($tpl_role) ? $tpl_role['rolename'] : '';
// $rid = isset($tpl_role) ? $tpl_role['rid'] : '';
// $pids = isset($tpl_role) ? $tpl_role['pids'] : array();
?>
<form class="form-horizontal" role="form" action="/user/commit" method="post">
  <input type="hidden" name="rid" value="<?php echo safeHtml($rid); ?>" />
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="username" name="username" placeholder="用户名用于登录"
      value="<?php //echo safeHtml($username); ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="password" name="password" placeholder="登录密码">
    </div>
  </div>
  <div class="form-group">
    <label for="pwd" class="col-sm-2 control-label">确认密码</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="pwd" placeholder="确认2次输入密码一致">
    </div>
  </div>
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">全名</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="显示的名字">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
        <label class="radio-inline">
          <input type="radio" name="gender" value="MALE"> 男
        </label>
        <label class="radio-inline">
          <input type="radio" name="gender" value="FEMALE"> 女
        </label>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-Mail</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" name="email" placeholder="address@example.com">
    </div>
  </div>
  <div class="form-group">
    <label for="tel" class="col-sm-2 control-label">电话</label>
    <div class="col-sm-3">
      <input type="tel" class="form-control" id="tel" name="tel" placeholder="13xxxxxxxxx">
    </div>
  </div>
  <div class="form-group">
    <label for="tel" class="col-sm-2 control-label">角色</label>
    <div class="col-sm-2">
      <select class="form-control" name="rid">
      <?php foreach ($tpl_roles as $role) : ?>
        <option value="<?=$role['rid']?>"><?php echo safeHtml($role['rolename']); ?></option>
      <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">提交</button>
    </div>
  </div>
</form>
