<p>
  <a href="/role/add" class="btn btn-primary" type="button">
    添加角色
  </a>
</p>

<table class="table table-hover">
  <thead>
    <tr>
      <th class='col-xs-1'>ID</th>
      <th>角色名称</th>
      <th class="col-xs-2">操作</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($tpl_roles as $role) : ?>
    <tr>
      <td><?php echo $role['rid']; ?></td>
      <td><?php echo safeHtml($role['rolename']); ?></td>
      <td>
        <a href="/role/edit/<?=$role['rid']?>" class="btn btn-success">编辑</a>
      </td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>
