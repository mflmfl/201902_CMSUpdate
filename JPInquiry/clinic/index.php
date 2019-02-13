<?php
mb_language('Japanese');
mb_internal_encoding('UTF-8');

require __DIR__."/./app/const.php";
require __DIR__."/./app/libs/functions.php";
require __DIR__."/./app/libs/master.php";

$data = [];
$data['vars'] = (isset($_POST)) ? encodeFormValues($_POST) : [];
$data['pref_list'] = $pref_list;
$data['department_list'] = $department_list;
$data['capacity_list'] = $capacity_list;
$data['errors'] = [];
$mode = $data['vars']['mode'];

$router_config = array(
    "pages" => array( 'agree', 'input', 'confirm', 'thanks' ),
    "validator" => array( 'confirm' => 'validation' )
);

if(is_sp()) {
  $router_config = array(
      "pages" => array( 'agree', 'input', 'input2', 'confirm', 'thanks' ),
      "validator" => array( 'input2' => 'validation1', 'confirm' => 'validation2' )
  );
}

// router関数でview出力とvalidationを一括管理する
router($router_config, $data);