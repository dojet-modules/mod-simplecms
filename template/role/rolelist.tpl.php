<p>
  <a href="/role/add" class="btn btn-primary" type="button">
    添加角色
  </a>
</p>

<table class="table table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>角色名称</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($tpl_roles as $role) : ?>
    <tr>
      <td class='col-xs-1'><?php echo $role['rid']; ?></td>
      <td><?php echo safeHtml($role['rolename']); ?></td>
    </tr>
<?php endforeach ?>
  </tbody>
</table>

<style>
.tr-line .btn-hide { display:none;}
.tr-line:hover .btn-hide { display:inline;}
</style>

<script type="text/javascript">
$().ready(function() {
  $('a[role=delete]').click(function() {
    if (!confirm('确定删除吗？')) {
      return false;
    }
  });
});
</script>
