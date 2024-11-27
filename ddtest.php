<?php
require_once 'includes/smarty_setup.php';  // Include the smarty_setup file

$smarty->assign('name', 'Ali');
$smarty->display('test.tpl');