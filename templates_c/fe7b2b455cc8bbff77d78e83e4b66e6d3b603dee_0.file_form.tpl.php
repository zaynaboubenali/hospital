<?php
/* Smarty version 5.4.2, created on 2024-11-27 17:25:07
  from 'file:patient/form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_674747e3a1f8c2_57517620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe7b2b455cc8bbff77d78e83e4b66e6d3b603dee' => 
    array (
      0 => 'patient/form.tpl',
      1 => 1732724691,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
))) {
function content_674747e3a1f8c2_57517620 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\project\\templates\\patient';
$_smarty_tpl->renderSubTemplate("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
<h2><?php echo $_smarty_tpl->getValue('title');?>
</h2>
<form method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Patient Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo (($tmp = $_smarty_tpl->getValue('patient')['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
    </div>
    <div class="mb-3">
        <label for="doctor" class="form-label">Doctor</label>
        <select name="doctor_id" id="doctor" class="form-control" required>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('doctors'), 'doctor');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('doctor')->value) {
$foreach0DoElse = false;
?>
            <option value="<?php echo $_smarty_tpl->getValue('doctor')['id'];?>
" ><?php echo $_smarty_tpl->getValue('doctor')['name'];?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
<?php $_smarty_tpl->renderSubTemplate("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
