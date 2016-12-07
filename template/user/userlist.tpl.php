<p>
  <a href="/user/add" class="btn btn-primary" type="button">
    添加用户
  </a>
</p>

<table class="table table-hover">
  <thead>
    <tr>
      <th class='col-xs-1'>ID</th>
      <th>用户名</th>
      <th>角色名称</th>
      <th class="col-xs-2">操作</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($tpl_users as $user) : ?>
    <tr>
      <td><?php echo $user['rid']; ?></td>
      <td><?php echo safeHtml($user['username']); ?></td>
      <td>
        <a href="/user/edit/<?=$user['rid']?>" class="btn btn-success">编辑</a>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
