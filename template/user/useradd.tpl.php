<?php
$isEdit = isset($tpl_simpleUser);
?>
<form class="form-horizontal" role="form" action="/user/commit" method="post">
  <input type="hidden" name="uid" value="<?php echo $isEdit ? $tpl_simpleUser['uid'] : ''; ?>" />
  <div class="form-group">
    <label for="username" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="username" name="username" placeholder="用户名用于登录"
<?php if ($isEdit) : ?>
        value="<?php echo safeHtml($tpl_simpleUser['username']); ?>" readonly
<?php endif ?>
      />
    </div>
  </div>
<?php if (!$isEdit) : ?>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">密码</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="password" name="password" placeholder="登录密码" />
    </div>
  </div>
  <div class="form-group">
    <label for="pwd" class="col-sm-2 control-label">确认密码</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="pwd" placeholder="确认2次输入密码一致">
    </div>
  </div>
<?php endif ?>
  <div class="form-group">
    <label for="fullname" class="col-sm-2 control-label">全名</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="显示的名字"
<?php if ($isEdit) : ?>
        value="<?php echo safeHtml($tpl_userinfo['fullname']); ?>"
<?php endif ?>
      />
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
<?php foreach (array('MALE' => '男', 'FEMALE' => '女') as $gender => $name) : ?>
        <label class="radio-inline">
          <input type="radio" name="gender" value="<?php echo safeHtml($gender); ?>"
            <?php echo $isEdit && $gender == $tpl_userinfo['gender'] ? 'checked' : ''?> />
            <?php echo safeHtml($name); ?>
        </label>
<?php endforeach ?>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-Mail</label>
    <div class="col-sm-4">
      <input type="email" class="form-control" id="email" name="email" placeholder="address@example.com"
<?php if ($isEdit) : ?>
        value="<?php echo safeHtml($tpl_userinfo['email']); ?>"
<?php endif ?>
      />
    </div>
  </div>
  <div class="form-group">
    <label for="tel" class="col-sm-2 control-label">电话</label>
    <div class="col-sm-3">
      <input type="tel" class="form-control" id="tel" name="tel" placeholder="13xxxxxxxxx"
<?php if ($isEdit) : ?>
        value="<?php echo safeHtml($tpl_userinfo['tel']); ?>"
<?php endif ?>
      />
    </div>
  </div>
  <div class="form-group">
    <label for="tel" class="col-sm-2 control-label">角色</label>
    <div class="col-sm-2">
      <select class="form-control" name="rid">
      <?php foreach ($tpl_roles as $role) : ?>
        <option value="<?=$role['rid']?>"
<?php echo $isEdit && $role['rid'] == $tpl_userinfo['rid'] ? 'selected' : '' ?>
        >
          <?php echo safeHtml($role['rolename']); ?>
        </option>
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
