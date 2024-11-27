<?php
/* Smarty version 5.4.2, created on 2024-11-27 17:25:03
  from 'file:patient/list.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_674747df0e29c7_94368496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97d8be03830be50b5bc9abf724e5ce2412007c29' => 
    array (
      0 => 'patient/list.tpl',
      1 => 1732724697,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
))) {
function content_674747df0e29c7_94368496 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\project\\templates\\patient';
$_smarty_tpl->renderSubTemplate("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<h2>Patient List</h2>
<a href="create.php" class="btn btn-primary mb-3">Add Patient</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Doctor</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('patients'), 'patient');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('patient')->value) {
$foreach0DoElse = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->getValue('patient')['id'];?>
</td>
            <td><?php echo $_smarty_tpl->getValue('patient')['patient_name'];?>
</td>
            <td><?php echo $_smarty_tpl->getValue('patient')['doctor_name'];?>
</td>
             <td><?php echo $_smarty_tpl->getValue('patient')['department_name'];?>
</td>
            <td>
                <a href="update.php?id=<?php echo $_smarty_tpl->getValue('patient')['id'];?>
" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete.php?id=<?php echo $_smarty_tpl->getValue('patient')['id'];?>
" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php $_smarty_tpl->renderSubTemplate("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
